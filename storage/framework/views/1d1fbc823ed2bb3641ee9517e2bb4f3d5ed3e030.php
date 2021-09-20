<?php $__env->startSection("content"); ?>
<section class="content-header">
   <h1>Sales Delivery Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Sales Delivery Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Sales Product Delivery</h3>
            </div>
            <div class="box-body">
               
               <form action="inv_delivercre.php" id="save_frdeliver" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                  <div class="col-md-12">
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Select Invoice</label>
                              <select class="form-control select2" name="invno" id="invno">
                                 <option value="">-Select Invoice-</option>
                                 <option value=""></option>
                              </select>
                           </div>
                           <div class="form-group">
                              <div class="input-group">
                                 <span class="input-group-addon">CNo:</span>
                                 <input type="text" maxlength="15" class="form-control" value="" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                 <input type="text" class="form-control datetimepicker" name="dlidt" id="dlidt" value="" placeholder="Delivery Date" autocomplete="off" readonly>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label>Note</label>
                              <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Challan Note"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="cart cart-sm">
                           <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                              <thead>
                                 <th style="width:35px; text-align:center;">SN</th>
                                 <th style="width:60px; text-align:center;">Image</th>
                                 <th style="width:280px; text-align:left;">Product</th>
                                 <th style="width:100px; text-align:center;">Code</th>
                                 <th style="width:60px; text-align:center;">Sold</th>
                                 <th style="width:60px; text-align:center;">Delivered</th>
                                 <th style="width:60px; text-align:center;">Rest Qty</th>
                                 <th style="width:80px; text-align:center;">Now</th>
                              </thead>
                           </table>
                           <div class="cart-tra style-3 item" style="padding:0px;">
                              <table class="table table-bordered table-striped results" style="margin-bottom: 0;">
                                 <tbody id="traitem">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="cart cart-sm" id="serialdata">
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="hidden" name="save_deliver" class="form-control" value="0" readonly />
                        <input type="button" id="save_deliver" class="btn btn-flat bg-purple btn-sm " value="Deliver"/> <a href="inv_deliverlist.php" class="btn btn-flat bg-gray  ">Close</a>
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

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/rm_construction/ver-4_28-07/ver-4/resources/views/main/admin/inventory/delivery_create.blade.php ENDPATH**/ ?>