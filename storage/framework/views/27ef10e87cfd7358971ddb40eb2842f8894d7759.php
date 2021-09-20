<?php $__env->startSection("content"); ?>
    <section class="content-header">
    <h1>Cart List</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Purchase</a></li>
            <li class=""><a href="#">Cart List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Cart Information</h3>
        </div>
        <div class="box-body">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
        
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
        <thead>
        <tr>
        <th style="width:40px; text-align:center;">S.N</th>
        <th>PID</th>
        <th>Company Name</th>
        <th>Supplier Name</th>
        <th>Item Name</th>
        <th>Color</th>
        <th>Cost/unit</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php if($sales_cart): ?>
        	<?php $i=1; ?>
        <?php $__currentLoopData = $sales_cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
        <td><?php echo e($i++); ?></td>
        <td><?php echo e($data->purchase_track); ?></td>
        <td><?php echo e($data->company_name); ?></td>
        <td><?php echo e($data->supplier_name); ?></td>
        <td><?php echo e($data->item_name); ?></td>
        <td><?php echo e($data->color); ?></td>
        <td><?php echo e($data->price); ?></td>
        <td><?php echo e($data->quantity); ?></td>
        <td><?php echo e($data->total); ?></td>
        <td nowrap="">
            <a class="btn btn-flat bg-purple" href="<?php echo e(route('edit-to-sales-cart',$data->id)); ?>" ><i class="fa fa-edit"></i></a>
            <a class="btn btn-flat bg-purple" href="<?php echo e(route('delete_sales_cart_list',['id' => $data->id])); ?>"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>No data available.</p>
        <?php endif; ?>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        <a href="<?php echo e(route('view_sales_checkout_page')); ?>"  class="btn btn-flat bg-gray  ">Checkout</a> <a type="button" href="<?php echo e(route('sales-create-page')); ?>" class="btn btn-flat bg-gray  ">Add More</a>
        </div>
        </div>
        <div style="display: none;">
        <table id="expcsv"></table>
        </div>
    </section>
    <!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Construction_web\ver_10\resources\views/main/admin/sales/cart_details.blade.php ENDPATH**/ ?>