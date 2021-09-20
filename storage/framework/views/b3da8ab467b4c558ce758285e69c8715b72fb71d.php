<?php $__env->startSection("content"); ?>
    <section class="content-header">
    <h1>Sales Delivery</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Inventory</a></li>
            <li class=""><a href="#">Sales Delivery</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Delivered Record</h3>
        </div>
        <div class="box-body">
        
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
        <thead>
        <tr>
        <th style="width:40px; text-align:center;">SN</th>
        <th>Date</th>
        <th>Challan No</th>
        <th>Invoice No</th>
        <th>From</th>
        <th>Note</th>
        <th style="width:40px; text-align:center;">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td class="text-center"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td nowrap="">
            <a class="btn btn-flat bg-purple details-invoice" href="#"><i class="fa fa-eye cat-child"></i></a>
            <a class="btn btn-flat bg-purple" href="#"><i class="fa fa-trash"></i></a>
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        <div class="clearfix" ></div>
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-12 table-responsive">
        <div class="col-md-8"></div>
        <div class="col-md-4 text-right" >
        <a href="<?php echo e(route('prodelivery-create-route')); ?>" class="btn btn-flat bg-purple">Create Delivery</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/rm_construction/ver-4_28-07/ver-4/resources/views/main/admin/inventory/delivery_list.blade.php ENDPATH**/ ?>