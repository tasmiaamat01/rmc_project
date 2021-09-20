	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Project Record Create</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Record Create</a></li>
        </ol>
    </section>
     <!-- Main content -->
     <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Add New Project</h3>
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
        <form action="<?php echo e(route('project-store-page')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         <?php echo csrf_field(); ?>
            <div class="col-md-12 popup_details_div">
        
        <div class="row ">
        <div class="col-md-12">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <div class="row">
        <div class="col-md-4">    
        <div class="form-group">
        <label>Project ID</label>
        <input type="text" name="project_id" maxlength="20" value="" id="prjid" class="form-control" placeholder="e. g. EDU487K" />
        </div>
        </div>
        <div class="col-md-8">
        <div class="form-group">
        <label>Project Name</label>
        <input type="text" name="name" maxlength="60" value="" id="name" class="form-control" placeholder="e.g Rapura Water Line"  />
        </div>    
        </div>
        </div>
        <div class="row">    
        <div class="col-md-4">
        <div class="form-group">
        <label>Select Group</label>
        <select class="form-control select2" name="pgid" id="pgid" >
        <option value="">-Select-</option>
            <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($groups->id); ?>"><?php echo e($groups->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </select>    
        </div>
        </div>    
        <div class="col-md-4">    
        <div class="form-group">
        <label>Sub-Group</label>      
        <select class="form-control select2" name="psgid" id="psgid">
        <option value="">-Select-</option>
            <?php $__currentLoopData = $subgroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subgroups): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($subgroups->id); ?>"><?php echo e($subgroups->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </select> 
        </div>    
        </div>    
        <div class="col-md-4">    
        <div class="form-group">
        <label>Project Status</label>   
        <select class="form-control" name="status" id="status">
        <option value="">-Select-</option>
        <option value="Start">Start</option>
        <option value="On-Process">On-Process</option>
        <option value="Done">Done</option>
        <option value="Apply">Apply</option>    
        </select>        
        </div>
        </div>    
        </div>
        <div class="row">
        <div class="col-md-3">
        <div class="form-group">
        <label>Contact Person</label>
        <input type="text" name="cperson" maxlength="35" value="" class="form-control" placeholder="e.g Mr.Enamul Haque"  />
        </div>    
        </div>    
        <div class="col-md-3">
        <div class="form-group">
        <label>Contact Number</label>
        <input type="text" name="cnumber" maxlength="18" value="" class="form-control" placeholder="e.g +880161xxxxx70"  />
        </div>    
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Project Value</label>
        <input type="text" name="prjamo" maxlength="12" value=""  class="form-control" placeholder="e.g 3,50,00,000"  />
        </div>    
        </div>
        <div class="col-md-3">
        <div class="form-group">
        <label>Target Expenses</label>
        <input type="text" name="expamo" maxlength="12" value=""  class="form-control" placeholder="e.g 2,50,00,000"  />
        </div>    
        </div>    
        </div>
        <div class="row">
        <div class="col-md-4">
        <div class="form-group">
        <label>Select Contractor</label>
        <select class="form-control select2" name="coid" id="coid">
        <option value="">-Select-</option>
            <?php $__currentLoopData = $contructor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contructors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($contructors->id); ?>"><?php echo e($contructors->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>    
        </div>
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Contact Amount</label>
        <input type="text" name="coamo" maxlength="12" value=""  class="form-control" placeholder="e.g 2,10,00,000"  />
        </div>    
        </div>
        <div class="col-md-4">
        <div class="form-group">
        <label>Select Client</label>
        <select class="form-control select2" name="client" id="client">
        <option value="">-Select-</option>
            <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($customers->id); ?>"><?php echo e($customers->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>    
        </div>
        </div>    
        </div>    
        <div class="row">
        <div class="col-md-6">    
        <div class="form-group">
        <label>Project Details</label>
        <textarea class="form-control" maxlength="250" rows="6" name="details" placeholder="e.g. Details"></textarea>
        </div>
        </div>
        <div class="col-md-6">    
        <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" maxlength="150" rows="6" name="address" placeholder="e.g. Address"></textarea>
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
        <input type="submit" name="save_project" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="<?php echo e(route('project-list-page')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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
    <!-- /.main content -->  

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver_9\resources\views/main/admin/manage_project/project_create.blade.php ENDPATH**/ ?>