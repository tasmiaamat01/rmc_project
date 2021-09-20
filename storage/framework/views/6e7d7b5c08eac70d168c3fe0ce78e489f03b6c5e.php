	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Bank Account List</h1>
            <ol class="breadcrumb">
                <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>  
                <li><a href="mas_brandcreate.php">Bank</a></li>
                <li class=""><a href="<?php echo e(route('create-bank-page')); ?>">Bank Account List</a></li>
            </ol>
    </section>
    <!-- Main content -->
<section class="content">
    
    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">All Account</h3>
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
            <th>Bank</th>
            <th>A/C No</th>
            <th>Title</th>
            <th>Branch</th>
            <th>Location</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>    
            <th style="width:40px; text-align:center;">Action</th>    
        </tr>
    </thead>    
        <tbody>
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="center"><?php echo e($data->id); ?></td>
                <td><?php echo e($data->bid); ?></td>       
                <td><?php echo e($data->acc_title); ?></td>
                <td><?php echo e($data->bbrname); ?></td>    
                <td><?php echo e($data->bbrcode); ?></td>      
                <td><?php echo e($data->bbrlocation); ?></td>
                <td><?php echo e($data->debit); ?></td>
                <td><?php echo e($data->credit); ?></td>
                <td><strong><?php echo e($data->balance); ?></strong></td>    
                <td nowrap="">
                    <a class="btn btn-flat bg-purple details-invoice" href=""><i class="fa fa-eye cat-child"></i></a>    
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('edit-bankaccount-page',$data->id)); ?>"><i class="fa fa-edit"></i></a> 
                    <a class="btn btn-flat bg-purple" href="<?php echo e(route('delete-bankaccount-page',$data->id)); ?>"><i class="fa fa-trash"></i></a>   
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
    <a href="<?php echo e(route('create-bankaccount-page')); ?>" class="btn btn-flat bg-purple">Add Account</a>
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
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver-3\resources\views/main/admin/bank/bankaccount_list.blade.php ENDPATH**/ ?>