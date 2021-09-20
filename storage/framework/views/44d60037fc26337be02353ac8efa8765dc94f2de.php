	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Employee List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class=""><a href="#">Employee List</a></li>
        </ol>
    </section>
  <!-- Main content -->
  <section class="content">
    
    <div class="row">
        <div class="col-md-8">
            <div class="box box-solid">
                <div class="box-header with-border">
                <h3 class="box-title">Employee List</h3>
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
                                <th style="width:40px;">SN</th>
                                <th>Image</th>    
                                <th>Id No</th>    
                                <th>Name</th>    
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Work Place</th>    
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Salary</th>    
                                <th style="width:40px; text-align:center;">Action</th>    
                            </tr>
                        </thead>    
                        <tbody>
                            <?php $i=0; ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="center"><?php $i++; echo $i; ?></td>
                                <td><img style="height: 80px; width: 80px; border-radius :50%;" src="<?php echo e(asset($emp->item)); ?>"></td>
                                <td><?php echo e($emp->id); ?></td>
                                <td><?php echo e($emp->name); ?></td>
                                <td><?php echo e($emp->desg_name); ?></td>
                                <td><?php echo e($emp->dept_name); ?></td>
                                <td><?php echo e($emp->br_name); ?></td>    
                                <td><?php echo e($emp->mobile); ?></td>
                                <td><?php echo e($emp->email); ?></td>    
                                <td><?php echo e($emp->salary); ?></td>    
                                <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('employee-edit-page',$emp->id)); ?>" ><i class="fa fa-edit"></i></a> 
                                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('employee-delete-page',$emp->id)); ?>"><i class="fa fa-trash"></i></a> 
                                </td>    
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                        </tbody>   
                    </table>
                </div>
                <div class="clearfix" ></div>  
                    <div class="row"style="margin-top: 15px" >
                        <div class="col-md-12 table-responsive">    
                            <div class="col-md-8"></div>
                            <div class="col-md-4 text-right" >
                                <a href="<?php echo e(route('employee-create-page')); ?>" class="btn btn-flat bg-purple">Add Employee</a>
                            </div>
                        </div>    
                    </div>    
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver-5\resources\views/main/admin/payroll/employee_list.blade.php ENDPATH**/ ?>