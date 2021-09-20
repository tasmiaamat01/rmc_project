<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1>Warehouse Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Warehouse Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Warehouse</h3>
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
               
               <form action="<?php echo e(route('warehouse-store-route')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <label>Branch</label>
                                       <select class="form-control select2" name="branch_id" id="branch_id">
                                          <option value="">-Select Invoice-</option>
                                          <?php $__currentLoopData = $branch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. Taltola" />
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>Phone</label>
                                          <input type="text" name="phone" maxlength="18" value="" id="phone" class="form-control" placeholder="e. g. 0161xx700xx" />
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>Email</label>
                                          <input type="text" name="email" maxlength="45" value="" id="email" class="form-control" placeholder="e.g. info@axesgl.com" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group">
                                       <label>Address (English)</label>
                                       <textarea class="form-control" maxlength="250" rows="6" name="address" id="address" placeholder="Address"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_whouse" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="inv_whouselist.php" class="btn btn-flat bg-gray">Close</a>
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
                     <h3 class="box-title">History</h3>
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
<!-- /.main content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver_9\resources\views/main/admin/inventory/warehouse_create.blade.php ENDPATH**/ ?>