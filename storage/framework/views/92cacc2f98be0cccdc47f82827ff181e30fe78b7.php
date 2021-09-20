
<?php $__env->startSection("content"); ?>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
<section class="content-header">
   <h1>LC Setup</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC Setup</a></li>
      <li class=""><a href="#">LC Setup</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add LC Information</h3>
            </div>
            <div class="box-body">
               
               <form action="<?php echo e(route('lc-setup.insert')); ?>" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
                <?php echo csrf_field(); ?>
                <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label>LC NO</label>
                                      <input type="text" name="lc_no" maxlength="45" value="" placeholder="LC-000001" id="lc_no" class="form-control"/>
                                   </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Shipment date </label>
                                      <input type="date" name="ship_date"  value="" id="ship_date" class="form-control"/>
                                  </div>
                              </div>
                            </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>PI Code</label>
                                    <select class="form-control" name="pi_code" id="pi_code">
                                        <option selected>Choose Please.....</option>
                                        <?php $__currentLoopData = $pi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($pis->pi_code); ?>"><?php echo e($pis->pi_code); ?></option>	
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     </select>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label>Expiry date </label>
                                    <input type="date" name="exp_date"  value="" id="exp_date" class="form-control"/>
                                </div>
                            </div>
                           </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                        <input type="text" name="s_name"  value="" id="s_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Local Bank</label>
                                        <select class="form-control" name="local_bank" id="local_bank">
                                            <option selected>Choose Please.....</option>
                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($banks->id); ?>"><?php echo e($banks->name); ?></option>	
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Buyer name</label>
                                        <input type="text" name="b_name"  value="" id="b_name" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Beneficiary Bank</label>
                                        <select class="form-control" name="bene_bank" id="bene_bank">
                                            <option selected>Choose Please.....</option>
                                            <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banks): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($banks->id); ?>"><?php echo e($banks->name); ?></option>	
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" name="t_amount" maxlength="45" value="" id="t_amount" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <input type="text" name="note"  value="" id="note" class="form-control"/>
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
                        <?php echo csrf_field(); ?>
                        <input type="submit" name="save" id="save" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="<?php echo e(route('list-lc-setup')); ?>" class="btn btn-flat bg-gray  ">Close</a>
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

<script>

$('#pi_code').change(function(){
    var id = $(this).val();
    var url = '<?php echo e(route("getDetails", ":id")); ?>';
    url = url.replace(':id', id);

    $.ajax({
        url: url,
        type: 'get',
        dataType: 'json',
        success: function(response){
            if(response != null){
                $('#t_amount').val(response.extra1);
                $('#s_name').val(response.supplier.name);
                $('#b_name').val(response.buyer.name);
            }
        }
    });
});


</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bdwwsoft/rmc/resources/views/main/admin/lc_setup/lc_setup.blade.php ENDPATH**/ ?>