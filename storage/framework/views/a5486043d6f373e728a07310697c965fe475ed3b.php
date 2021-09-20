<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1>Received View</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Received</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Receive Record</h3>
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
                           <th style="width:40px; text-align:center;">Item Name</th>
                           <th style="width:40px; text-align:center;">Challan No</th>
                           <th style="width:40px; text-align:center;">Purchase nvoice No</th>
                           <th style="width:40px; text-align:center;">Receive Date</th>
                           <th style="width:40px; text-align:center;">Purchase Quantity</th>
                           <th style="width:40px; text-align:center;">Receive Quantity</th>
                           <th style="width:40px; text-align:center;">Rest Quantity</th>
                           <th style="width:40px; text-align:center;">Now Quantity</th>
                           <th style="width:40px; text-align:center;">Note</th>
                           
                        </tr>
                     </thead>
                     
                     

                     <tbody>
                         <tr>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->item_name); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->challan_no); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->pur_invoice); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->rcv_date); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->purchase_qty); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->rcv_qty); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->rest_qty); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->now_qty); ?></td>
                             <td style="width:40px; text-align:center;">
                                <?php echo e($receipt->note); ?></td>
                         </tr>
                     </tbody>
                  </table>
               </div>
               <div class="clearfix" ></div>
               <div class="row"style="margin-top: 15px" >
                  <div class="col-md-12 table-responsive">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <a href="<?php echo e(route('proreceive-list')); ?>" class="btn btn-flat bg-purple btn-sm btn btn-flat bg-gray">Close</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/rm_construction/ver-6/resources/views/main/admin/inventory/receive_view.blade.php ENDPATH**/ ?>