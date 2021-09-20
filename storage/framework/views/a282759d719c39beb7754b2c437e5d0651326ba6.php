<?php $__env->startSection("content"); ?>
<section class="side-cont">
   <?php echo $__env->make('layouts.admin.print_head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   <div class="box box-solid">
      <div class="box-body">
         <div class="row">
            <div class="col-md-12">
               <div class="col-md-3">
                  <div id="test-list" class="notebooks">
                     <input type="text" class="search">
                     <ul class="list" id="listitem">
                        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lists): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="">
                           <li class="invpiv active" id="pi_64">
                              <p><strong class="pino"><?php echo e($lists->voucher_no); ?></strong><br><br><strong><?php echo e($lists->date); ?></strong></p>
                              <div class="sname" style="margin-top: -52px;float: right; position: relative;top: 6px;"><strong>T: ৳ <?php echo e($lists->amount); ?></strong></div>
                           </li>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </ul>
                     <div class="whole">
                        <span>
                           <a class="pagination-prev disabled" href="#">
                           &lt;&lt;
                           </a>
                           <ul class="pagination-layout">
                              <li class="active"><a class="page" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li>
                           </ul>
                           <a class="pagination-next" href="#">
                           &gt;&gt;
                           </a>
                        </span>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="invhold scrol-y" id="invhold">
                      <?php echo $__env->make('layouts.admin.print_head2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="wrapper" style="width: 407.726px; height: 574.703px; overflow: hidden;">
                           <div id="wrap_invoice" class="page A4 portrait" style="transform: scale(0.51); transform-origin: 10px 0px 0px;">
                              <div class="invoice_header etat_header">
                                 <div class="row model1">
                                    <div class="col-xs-3 invoice-logo">
                                       <img src="<?php echo e(asset('public/frontend/img/no_logo_1589308197.png')); ?>" alt="Axes Business Automation" style="vertical-align:middle; width: 100%;">
                                    </div>
                                    <div class="col-xs-5 invoice-header-info" id="adheight" style="height: 140px;">
                                       <h4>Axes Business Automation</h4>
                                       <p>Banasree Staff Quarter Road, Nagdarpar (Police Box), Khilgaon, Dhaka - 1219<br><strong>Phone:</strong> 7217831<br><strong>Mobile:</strong> 01616170070<br><strong>Email:</strong> axes@gmail.com<br><strong>Web:</strong> http://www.axesgl.com</p>
                                    </div>
                                    <div class="col-xs-4 invoice-header-invoice" id="inheight" style="height: 140px;">
                                       <img src="data:image/png;base64,<?php echo e(DNS1D::getBarcodePNG($data->voucher_no, 'C39')); ?>" alt="barcode" style="margin-right: -10px;padding-bottom: 5px;"><br><strong>Paymnet N°:</strong> <?php echo e($data->voucher_no); ?>

                                       <br><strong>Date:</strong> <?php echo e($data->date); ?>

                                    </div>
                                 </div>
                                 <hr>
                                 <div class="clearfix"></div>
                              </div>
                              <center>
                                 <h3 class="page-title">PAYMENT VOUCHER</h3>
                              </center>
                              <div class="etat_content">
                                    <div class="page_split">
                                        <hr>
                                        <br>
                                        
                                        <table class="table_invoice table_invoice-condensed table_invoice-bordered table_invoice-striped" style="margin-bottom: 5px;" cellpadding="0" cellspacing="0" border="0">
                                            <thead>
                                                <tr>
                                                    <th style="width:5% !important;">N°</th>
                                                    <th style="width:33% !important;">Head of Accounts</th>
                                                    <th style="width:12% !important;">Mode</th>
                                                    <th style="width:12.5% !important;">Cheque</th>
                                                    <th style="width:12% !important;">Date</th>
                                                    <th style="width:12.5% !important; text-align:center;">Amount</th>
                                                    <th style="width:13% !important; text-align:center;">Reference</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                ?>
                                                <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td class="text-md-center"><?php echo e($i++); ?></td>
                                                        <td class="text-md-left"><?php echo e($detail->supplier_name); ?></td>
                                                        <td class="text-md-left"><?php echo e($detail->payment_source); ?></td>
                                                        <td style="text-align:left;"><?php echo e($detail->cheque_no); ?></td>
                                                        <td style="text-align:left;"><?php echo e($detail->cheque_date); ?></td>    
                                                        <td class="text-md-right"><?php echo e($detail->amount); ?></td> 
                                                        <td class="text-md-left"><?php echo e($detail->ref); ?></td>   
                                                    </tr>    
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="font-weight: bold;text-align:center;">-Total-</td>
                                                    <td id="total" style="text-align:right;"><?php echo e($data->amount); ?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td id="word_translate" colspan="7"><span style="font-weight: bold;">In Word: </span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="7"><span style="font-weight: bold;">Note:<?php echo e($data->note); ?> </span></td>
                                                </tr>
                                            </tfoot>    
                                        </table>    
                                    </div>    
                                </div>
                              <div style="clear: both;"></div>
                              <div class="etat_footer">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Received By</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Prepared By</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Checked By</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>    
                                        <p style="border-bottom: 1px dashed #666;">&nbsp;</p>
                                        <p class="text-md-center">Approved By</p>
                                    </div>
                                </div>
                                <p>&nbsp;</p>
                                <div style="clear: both;"></div>
                                </div>
                              <div class="invoice_footer">
                                 <hr>
                                 <p style="margin-top: -5px;">Axes Business Automation. © 2021</p>
                              </div>
                              <div style="clear: both;"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script>
    function numberToWords() {  
        var number = $('#total').val();
        var digit = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];  
        var elevenSeries = ['ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'];  
        var countingByTens = ['twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'];  
        var shortScale = ['', 'thousand', 'million', 'billion', 'trillion'];  
  
        number = number.toString(); 
        number = number.replace(/[\, ]/g, ''); 
        if (number != parseFloat(number)) 
        return 'not a number'; 
        var x = number.indexOf('.'); 
        if (x == -1) x = number.length; 
        if (x > 15) return 'too big'; 
        var n = number.split(''); 
        var str = ''; 
        var sk = 0; 
        for (var i = 0; i < x; i++) 
        { 
            if ((x - i) % 3 == 2) { 
                if (n[i] == '1') { 
                    str += elevenSeries[Number(n[i + 1])] + ' '; 
                    i++; sk = 1; 
                    } else if (n[i] != 0) {
                         str += countingByTens[n[i] - 2] + ' '; 
                         sk = 1; 
                         } 
            } else if (n[i] != 0) { 
                str += digit[n[i]] + ' '; 
                if ((x - i) % 3 == 0) 
                str += 'hundred '; sk = 1; 
            } 
            if ((x - i) % 3 == 1) { 
                if (sk) str += shortScale[(x - i - 1) / 3] + ' '; 
                sk = 0; 
            } 
        } 
        if (x != number.length) { 
            var y = number.length; 
            str += 'point '; 
            for (var i = x + 1; i < y; i++) 
            str += digit[n[i]] + ' '; 
        } 
        str = str.replace(/\number+/g, ' '); return str.trim() + ".";  

        var inwords = numberToWords(number)
        $('#word_translate').html(inwords);
    }
    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Construction_web\ver_10\resources\views/main/admin/accounts/pay_voucher_view.blade.php ENDPATH**/ ?>