<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1>Warehouse Transfer Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Warehouse Transfer Create</a></li>
   </ol>
</section>


<section class="content">
        
        <div class="row">
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                    <h3 class="box-title">Add New Warehouse Transfer</h3>
                    </div>
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <div class="box-body">
                        <form action="<?php echo e(route('warehouse-transfer-stock-store')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-12 popup_details_div">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Warehouse Name(From)</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">FBN</span>
                                                 <select class="form-control select2" name="warehouse_id_from" id="warehouse_id_from" onchange="return find_product()">
                                                 <option value="">-Select-</option> 
                                                 <?php $__currentLoopData = $warehouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                 <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Warehouse Name(To)</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">TBN</span>
                                                 <select class="form-control select2" name="warehouse_id_to" id="warehouse_id_to">
                                                 <option value="">-Select-</option> 
                                                 <?php $__currentLoopData = $warehouse; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                                 <option value="<?php echo e($emp->id); ?>"><?php echo e($emp->name); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                         <div class="form-group" >
                                             <label>Product Name</label>
                                             <div class="input-group">
                                                 <span class="input-group-addon">PN</span>
                                                 <select class="form-control select2" name="product_id" id="product_id">
                                                 </select>
                                             </div>
                                         </div> 
                                    </div> 
                                    <div class="row">
                                       <div class="form-group">
                                             <label>Quantity</label>
                                             <div class="form-group">
                                               <div class="input-group">
                                                   <span class="input-group-addon">QT</span>    
                                                   <input type="number" data-minlength="8" name="quantity" class="form-control" id="pass" placeholder="Transfer Quantity" required="">
                                               </div>
                                           </div>
                                      </div>
                                   </div>
                                </div>    
                                <div class="col-md-2"></div>
                            </div>
                            
                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>    
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                <input type="submit" name="save_user" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="<?php echo e(route('warehouse-transfer-stock-list')); ?>" class="btn btn-flat bg-gray  ">Close</a>
                                </div> 
                            </div>     
                        </form>    
                    </div>
                </div>
            </div>
        <div class="col-md-4">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <h3 class="box-title">History </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
      
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>    
    </section>

<script type="text/javascript">
    function find_product() {
        var warehouse_id_from = $('#warehouse_id_from').val();
            $('#product_id').empty();
            $('#product_id').append('<option value="0" disabled selected >-Select-</option>');
            var url = '<?php echo e(route("find_product_for_transfer_warehouse", ":slug")); ?>';
            url = url.replace(':slug', warehouse_id_from);
            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                     $('#product_id').empty();
                     $('#product_id').append('<option value="0" disabled selected >-Select-</option>');
                    $.each(response.data, function(index, value) {
                        $('#product_id').append('<option value="'+value.product_id+'" selected >'+value.product_name+'</option>');
                        alert(value.product_id);
                    });
                }
            });
        };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Construction_web\ver_10\resources\views/main/admin/inventory/warehouse_tr_create.blade.php ENDPATH**/ ?>