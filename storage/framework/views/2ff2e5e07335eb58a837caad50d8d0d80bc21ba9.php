	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Project Record List</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Record List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Project Record</h3>
        </div>
        <div class="box-body">
        
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
            <thead class="text-uppercase">
                <tr>
                    <th style="width:40px;">SN</th>   
                    <th>ID</th>    
                    <th>Name</th>
                    <th>Group</th>
                    <th>Sub-Group</th>
                    <th>Contact</th>
                    <th>Contractor</th>    
                    <th>Status</th>    
                    <th style="width:40px; text-align:center;">Action</th>    
                </tr>
            </thead>    
            <tbody>
                <?php $i=1; ?>
                <?php $__currentLoopData = $project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="center"><?php echo e($i++); ?></td>
                    <td><?php echo e($data->project_id); ?></td>    
                    <td><?php echo e($data->name); ?></td>
                    <td><?php echo e(data_get($data,'group.name')); ?></td>
                    <td><?php echo e(data_get($data,'subgroup.name')); ?></td>
                    <td><?php echo e($data->cperson); ?></td>
                    <td><?php echo e(data_get($data,'contructor.name')); ?></td>    
                    <td><?php echo e($data->status); ?></td>
                    <td nowrap="">
                        <a class="btn btn-flat bg-purple" href="<?php echo e(route('project-edit-page',$data->id)); ?>"><i class="fa fa-edit"></i></a> 
                        <a class="btn btn-flat bg-purple" href="<?php echo e(route('project-delete-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>    
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
        <a href="<?php echo e(route('project-create-page')); ?>" class="btn btn-flat bg-purple">Add Project</a>
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver-4\resources\views/main/admin/manage_project/project_list.blade.php ENDPATH**/ ?>