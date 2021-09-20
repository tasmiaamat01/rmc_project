<?php $__env->startSection("content"); ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
    <section class="content-header">
    <h1>Purchase Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Purchase Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php if($cart): ?>
            <center><h4>Now Fill Up The Fields Add To Cart</h4></center>
        <?php else: ?>
        <h3>Search Product And Add To Cart</h3>
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
        <form action="<?php echo e(route('add-to-cart')); ?>" method="POST" id="add_to_cart">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group" >
                        <label>Product Name</label>
                        <div class="input-group">
                            <span class="input-group-addon">Itm</span>
                            <select class="form-control select2" name="item_id" id="item_id" required>
                                <option value="">-Select-</option>
                                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Company Name</label>
                        <div class="input-group">
                            <span class="input-group-addon">CN</span>
                            <input type="text" maxlength="45" class="form-control" name="company_name" id="company_name" placeholder="e.g. Sumon" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Supplier</label>
                        <div class="input-group">
                            <span class="input-group-addon">SN</span>
                            <select class="form-control select2" name="supplier_id" id="supplier_id" required>
                                <option value="">-Select-</option>
                                <?php $__currentLoopData = $supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>"><?php echo e($data->id); ?>-<?php echo e($data->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group" >
                        <label>Color</label>
                        <div class="input-group">
                            <span class="input-group-addon">C</span>
                            <select class="form-control select2" name="color">
                                <option selected>Choose Please.....</option>
                                <option value="red">Red</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                                <option value="white">White</option>
                                <option value="black">Black</option>
                                <option value="yellow">Yellow</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center" >
                    <br>
                    <input type="submit" id="submit" class="btn btn-flat bg-purple btn-sm " value="ADD"/>
                </div>
            </div>
        </form>
        <?php endif; ?>
            <form method="POST" action="<?php echo e(route('update-to-cart')); ?>">
                <?php echo csrf_field(); ?>
            <br>
             <span id="result"></span>
        <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th>Item</th>
                <th>SN</th>
                <th>Oty</th>
                <th>Cost</th>
                <th>Price</th>
            </tr>
           </thead>

        <?php if($cart): ?>
           <tbody>
                    <input type="hidden" name="id" readonly="readonly" value="<?php echo e($cart->id); ?>" class="form-control">
            <tr>
                <td>
                    <input type="hidden" name="item_id" readonly="readonly" value="<?php echo e($cart->item_id); ?>" class="form-control">
                    <input type="test" name="item_name" readonly="" value="<?php echo e($cart->item_name); ?>" class="form-control">
                </td>
                <td><input type="text" name="supplier_id" value="<?php echo e($cart->supplier_id); ?>" readonly="readonly" class="form-control"></td>
                <td><input type="text" name="quantity" id="quantity" onchange="return set_quantity()" class="form-control"></td>
                <td><input type="text" name="cost" id="cost" value="<?php echo e($cart->cost); ?>" class="form-control"></td>
                <input type="hidden" name="asl" id="asl" value="1" class="form-control">
                <td><input type="text" name="price" id="price" class="form-control"></td>
            </tr>
           </tbody>
           <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td></td>
                <td><input type="text" name="total" id="total" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">Discount(%)</td>
                <td><input type="text" name="discount" id="discount" onchange="return set_discount()" onkeyup="return set_grand_total()" class="form-control"></td>
                <td><input type="text" name="discount_amount" id="discount_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">VAT (%)</td>
                <td><input type="text" name="vat" id="vat" class="form-control" onchange="return set_vat()"  onkeyup="return set_grand_total()"></td>
                <td><input type="text" name="vat_amount" id="vat_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">TAX (%)</td>
                <td><input type="text" name="tax" id="tax" class="form-control" onchange="return set_tax()"  onkeyup="return set_grand_total()"></td>
                <td><input type="text" name="tax_amount" id="tax_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">AIT (%)</td>
                <td><input type="text" name="ait" id="ait" class="form-control" onchange="return set_ait()"  onkeyup="return set_grand_total()"></td>
                <td><input type="text" name="ait_amount" id="ait_amount" class="form-control" readonly/></td>
            </tr>
            <tr>
                <td colspan="3">Others:</td>
                <td></td>
                <td><input type="text" name="other_amount" id="other_amount" class="form-control" onkeyup="return set_grand_total()"></td>
            </tr>
            <tr>
                <td colspan="3">Speed Money:</td>
                <td></td>
                <td><input type="text" name="speed_money_amount" id="speed_money_amount" class="form-control" onkeyup="return set_grand_total()"></td>
            </tr>
            <tr>
                <td colspan="3">Freight:</td>
                <td></td>
                <td><input type="text" name="freight_amount" id="freight_amount" class="form-control" onkeyup="return set_grand_total()"></td>
            </tr>
            <tr>
                <td colspan="3">Fractional Discount:    </td>
                <td></td>
                <td><input type="text" name="fraction_discount_amount" id="fraction_discount_amount" onkeyup="return set_grand_total()" class="form-control"></td>
            </tr>
            <tr>
                <td colspan="3">Grand total </td>
                <td></td>
                <td><input type="text" name="grand_total" id="grand_total" class="form-control" readonly/></td>
            </tr>
            <tr>
            </tr>
           </tfoot>
           <?php endif; ?>
       </table>
                <center align="center">
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Add To Cart" />
                <a href="<?php echo e(route('view_cart_list')); ?>" class="btn btn-flat bg-gray  ">Cart List</a>
                </center>
      </form>

        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <!--end same barcode-->
    </section>
    <!-- /.main content -->



<script>
    function set_quantity() {
        var quantity = $('#quantity').val();
        var cost = $('#cost').val();
        var price = $('#price').val();
        if (quantity) {
            var set_sub_total = parseInt(quantity) * parseInt(cost);
        } else {
            var quantity = 1;
            var set_sub_total = parseInt(quantity) * parseInt(cost);
        }
        $('#price').val(set_sub_total);
        $('#total').val(set_sub_total);
    }

    function set_discount() {
        var total = $('#total').val();
        var discount = $('#discount').val();
        if (discount) {
            var set_discount_amount = (parseInt(discount) * parseInt(total))/100;
        } else {
            var set_discount_amount = 0;
        }
        $('#discount_amount').val(set_discount_amount);
    }

    function set_vat() {
        var total = $('#total').val();
        var vat = $('#vat').val();
        if (vat) {
            var set_vat_amount = (parseInt(vat) * parseInt(total))/100;
        } else {
            var set_vat_amount = 0;
        }
        $('#vat_amount').val(set_vat_amount);
    }

    function set_tax() {
        var total = $('#total').val();
        var tax = $('#tax').val();
        if (tax) {
            var set_tax_amount = (parseInt(tax) * parseInt(total))/100;
        } else {
            var set_tax_amount = 0;
        }
        $('#tax_amount').val(set_tax_amount);
    }

    function set_ait() {
        var total = $('#total').val();
        var ait = $('#ait').val();
        if (ait) {
            var set_ait_amount = (parseInt(ait) * parseInt(total))/100;
        } else {
            var set_ait_amount = 0;
        }
        $('#ait_amount').val(set_ait_amount);
    }

    function set_grand_total() {
        var total = $('#total').val();
        var discount_amount = $('#discount_amount').val();
        var vat_amount = $('#vat_amount').val();
        var tax_amount = $('#tax_amount').val();
        var ait_amount = $('#ait_amount').val();
        var other_amount = $('#other_amount').val();
        var speed_money_amount = $('#speed_money_amount').val();
        var freight_amount = $('#freight_amount').val();
        var fraction_discount_amount = $('#fraction_discount_amount').val();
        var set_grand_total_amount = parseInt(total) - parseInt(discount_amount) + parseInt(vat_amount) + parseInt(tax_amount) + parseInt(ait_amount) + parseInt(other_amount) + parseInt(speed_money_amount) + parseInt(freight_amount) - parseInt(fraction_discount_amount);
        $('#grand_total').val(set_grand_total_amount);
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/rm_construction/purchase/ver-3/resources/views/main/admin/purchase/purchase_create.blade.php ENDPATH**/ ?>