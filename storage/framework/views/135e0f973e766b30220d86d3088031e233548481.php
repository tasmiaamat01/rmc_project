	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Constractor Create</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Constractor Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Add New Contractor</h3>
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
        <form action="<?php echo e(route('project-contructor-store-page')); ?>" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <?php echo csrf_field(); ?>
            <div class="col-md-12 popup_details_div">
                <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="col-md-12">
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>    
                                        <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman"/>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Status</label>    
                                        <select class="form-control" name="status" id="status">
                                        <option value="Active">Active</option> 
                                        <option value="De-Active">De-Active</option>     
                                        </select>
                                    </div>    
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Code</label>    
                                        <input type="text" name="code" maxlength="15" value="" id="code" class="form-control" placeholder="e.g. ABA/CO/001" />
                                    </div>    
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Contact Number</label>    
                                        <input type="text" name="mobile" maxlength="18" value="" id="mobile" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                    </div>    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Contact Email</label>    
                                        <input type="text" name="email" maxlength="45" value="" id="email" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                    </div>    
                                </div>    
                                <div class="col-md-3">    
                                
                                </div>    
                            </div>   
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group">    
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" id="address" maxlength="150" rows="4" placeholder="Address"></textarea>    
                                    </div>
                                </div>    
                                <div class="col-md-6">    
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea class="form-control" name="note" id="note" maxlength="150" rows="4" placeholder="About"></textarea>   
                                    </div>
                                </div>    
                            </div> 
                            
                        </div>    
                    </div>    
                    <div class="col-md-1"></div>    
                </div>
                <div class="clearfix" ></div>
                <div class="col-md-12 nopadding widgets_area"></div>    
                <div class="row"style="margin-top: 15px" >
                    <div class="col-md-8 ">
                    </div>
                    <div class="col-md-4 text-right" >
                        <input type="submit" name="save_contractor" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="<?php echo e(route('project-contructor-list-page')); ?>" class="btn btn-flat bg-gray">Close</a>
                    </div> 
                </div>     
        </form>    
        </div>
        </div>
        </div>
        <div class="col-md-3">
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver_9\resources\views/main/admin/manage_project/project_contructor_create.blade.php ENDPATH**/ ?>