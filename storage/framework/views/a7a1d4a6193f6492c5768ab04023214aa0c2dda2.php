	
<?php $__env->startSection("content"); ?> 

  
<section class="content-header">
    <h1>Purchase Create</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li> 
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Purchase Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
     
        <div class="box box-solid">
            <div class="box-body">   
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="col-md-7 shortcuts" id="checkview">
                                <div class="addpurchase">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="pabamo">802</h3>
                                                    <p>Total Payable</p>
                                                </div>   
                                            </div>
                                            <input type="hidden" value="SU_0" id="customer" name="customer" readonly="">
                                            <input type="hidden" value="0" id="balance" name="balance" readonly="">
                                            <input type="hidden" name="addpurchase" readonly="">
                                            <input type="hidden" name="scusid" id="scusid" value="0" readonly="">    
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="paidamo">0</h3>
                                                    <p>Paid Amount</p>
                                                    <input type="hidden" value="" id="recamo" name="recamo" readonly="">    
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="dueamo">802</h3>
                                                    <p>Total Due</p>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-6">
                                            <div class="small-box">
                                                <div class="inner">
                                                    <h3 id="changamo">0</h3>
                                                    <p>Change</p>
                                                </div>
                                            
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-xs-6">
                                            <div class="form-group">
                                                <label>Balance (0)</label>    
                                                <input type="text" maxlength="10" class="form-control cashr" value="0" name="adjust" id="adjust" onkeypress="return isNumberKey(event)" placeholder="e.g. 500" autocomplete="off" disabled="">    
                                            </div>    
                                        </div>
                                        <div class="col-md-4 col-xs-6">
                                            <div class="form-group">
                                                <label>Cash</label>    
                                                <input type="text" maxlength="10" class="form-control cashr" name="cash" id="cash" onkeypress="return isNumberKey(event)" placeholder="e.g. 500" autocomplete="off">    
                                            </div>    
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group">
                                                <label>Purchase Date</label>
                                                <input type="text" class="form-control datetimepicker" name="purdt" id="purdt" value="2021-07-15" placeholder="Purchase Date" autocomplete="off" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-xs-6">
                                            <div class="form-group">
                                                <label>Next Due Date</label>
                                                <input type="text" class="form-control datetimepicker" name="nextdt" id="nextdt" value="2021-07-22" placeholder="Next Due Date" autocomplete="off" readonly="">
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="row" style="border-top: 2px solid red; border-bottom: 2px solid black;">
                                        <div class="col-xs-3">
                                            <!-- required for floating -->
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs tabs-left sideways">
                                                <li class=""><a href="#bankpay" data-toggle="tab" class="tabpoint" id="tbank" aria-expanded="false">Bank</a></li>
                                                <li class="active"><a href="#cardpay" data-toggle="tab" class="tabpoint" id="tcard" aria-expanded="true">Card</a></li>
                                                <li class=""><a href="#mobilepay" data-toggle="tab" class="tabpoint" id="tmobile" aria-expanded="false">Mobile</a></li>
                                            </ul>
                                        </div>
                                    
                                        <div class="col-xs-9">
                                            <!-- Tab panes -->
                                            <div class="tab-content" style="padding-top: 10px;">
                                                <div class="tab-pane" id="bankpay">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label>Select Bank</label>    
                                                                <select class="form-control select2 select2-hidden-accessible" name="baid" id="baid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>    
                                                                    <option value="BA_1">BBL - 1529101961870001</option>
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 292.859px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-baid-container"><span class="select2-selection__rendered" id="select2-baid-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>   
                                                            </div>    
                                                        </div>    
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Cheque No</label>
                                                                <input type="text" maxlength="20" class="form-control" name="chkno" id="chkno" value="" placeholder="e.g. KA7865467" autocomplete="off" disabled="">
                                                            </div>    
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Cheque Date</label>
                                                                <input type="text" class="form-control datetimepicker" name="chkdt" id="chkdt" value="" placeholder="Cheque Date" autocomplete="off" disabled="" readonly="">
                                                            </div>    
                                                        </div>    
                                                    </div>    
                                                </div>
                                                <div class="tab-pane active" id="cardpay">
                                                    <div class="row">
                                                        <div class="col-md-8">    
                                                            <div class="form-group">
                                                                <label>Card Holder Name</label>
                                                                <input type="text" maxlength="35" class="form-control" name="caname" id="caname" value="" placeholder="e.g. Md.Sumon" autocomplete="off">
                                                            </div> 
                                                        </div>     
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <label>Card Holder Bank</label>    
                                                                <select class="form-control select2 select2-hidden-accessible" name="chbid" id="chbid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>    
                                                                    <option value="BA_2">BRAC Bank Limited</option>
                                                                    <option value="BA_1">Dutch-Bangla Bank</option>
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-chbid-container"><span class="select2-selection__rendered" id="select2-chbid-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>   
                                                            </div>    
                                                        </div>    
                                                        <div class="col-md-6">    
                                                            <div class="form-group">
                                                                <label>Withdrwn Bank</label>    
                                                                <select class="form-control select2 select2-hidden-accessible" name="caid" id="caid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>    
                                                                    <option value="BA_1">BBL - 1529101961870001</option>
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-caid-container"><span class="select2-selection__rendered" id="select2-caid-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>   
                                                            </div>
                                                        </div>
                                                    </div>     
                                                </div>
                                                <div class="tab-pane" id="mobilepay">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Mobile Account</label>    
                                                                <select class="form-control select2 select2-hidden-accessible" name="mobid" id="mobid" tabindex="-1" aria-hidden="true">
                                                                    <option value="">-Select-</option>    
                                                                    <option value="MO_1">bKash - 01616170070</option>
                                                                    <option value="MO_2">bKash - 01706144766</option>
                                                                    <option value="MO_3">bKash Sohel (Personal) - 01727368164</option>
                                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-mobid-container"><span class="select2-selection__rendered" id="select2-mobid-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>   
                                                            </div>    
                                                        </div> 
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>TrxID</label>
                                                                <input type="text" maxlength="20" class="form-control" name="trxid" id="trxid" value="" placeholder="e.g. KA7865467" autocomplete="off">
                                                            </div>    
                                                        </div>     
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>    
                                    </div>
                                    <div class="row">
                                        <br>   
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Product Store</label>    
                                                <select class="form-control select2 select2-hidden-accessible" name="ivt" id="ivt" tabindex="-1" aria-hidden="true">
                                                    <optgroup label="Branch">
                                                        <option selected="" value="BR_0">-No Branch-</option>    
                                                            
                                                        <option value="BR_1">Lightmix BD Ltd.</option>    
                                                            
                                                        <option value="BR_2">Regency Homes &amp; Engineering Ltd.</option>    
                                                            
                                                        <option value="BR_3">Rm Construction</option>    
                                                        
                                                        
                                                    </optgroup>    
                                                    <optgroup label="Warehouse">    
                                                    <option value="WH_4">Tasma Amat Eva</option>
                                                    </optgroup> 
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 185.25px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-ivt-container"><span class="select2-selection__rendered" id="select2-ivt-container" title="-No Branch-">-No Branch-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>   
                                            </div>    
                                            <div class="form-group">
                                                <label>Ref</label>
                                                <input type="text" maxlength="25" class="form-control" name="ref" id="ref" value="" placeholder="e.g. #ORD8976453" autocomplete="off">    
                                            </div>
                                            <div class="form-group">
                                                <label>Purchase Person</label>    
                                                <select class="form-control select2 select2-hidden-accessible" name="purp" id="purp" tabindex="-1" aria-hidden="true">
                                                    <option value="">-Select-</option>    
                                                    <option value="32">A.N.M Salauddin</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 185.25px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-purp-container"><span class="select2-selection__rendered" id="select2-purp-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>    
                                            </div>
                                            <div class="form-group">
                                                <label>Project</label>        
                                                <select class="form-control select2 select2-hidden-accessible" name="prjid" id="prjid" tabindex="-1" aria-hidden="true">
                                                    <option value="">-Select-</option>
                                                    <option value="63">542821</option>
                                            
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 185.25px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-prjid-container"><span class="select2-selection__rendered" id="select2-prjid-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>      
                                            </div>    
                                        </div>
                                        <div class="col-md-8">    
                                            <div class="form-group">    
                                                <label>Note</label>
                                                <textarea class="form-control" name="note" id="note" maxlength="150" rows="5" placeholder="Invoice Note"></textarea>    
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>L/C No:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="lcno" id="lcno" value="" placeholder="e.g. #LC8976453" autocomplete="off">    
                                                </div>
                                                <div class="form-group">
                                                    <label>PI No:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="pino" id="pino" value="" placeholder="e.g. #PI8976453" autocomplete="off">    
                                                </div>
                                                <div class="form-group">
                                                    <label>L/C Value:</label>
                                                    <input type="text" maxlength="25" class="form-control" name="lcvlue" id="lcvlue" onkeypress="return isNumberKey(event)" value="" placeholder="e.g. 560" autocomplete="off">    
                                                </div>    
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>L/C Date:</label>
                                                    <input type="text" class="form-control datetimepicker" name="lcdate" id="lcdate" value="" placeholder="PI Date" autocomplete="off" readonly="">    
                                                </div>
                                                <div class="form-group">
                                                    <label>PI Data:</label>
                                                    <input type="text" class="form-control datetimepicker" name="pidate" id="pidate" value="" placeholder="PI Date" autocomplete="off" readonly="">    
                                                </div>
                                                <div class="form-group">
                                                    <label>L/C Bank:</label>
                                                    <select class="form-control select2 select2-hidden-accessible" name="lcbank" id="lcbank" tabindex="-1" aria-hidden="true">
                                                        <option value="">-Select-</option>    
                                                        <option value="2">BRAC Bank Limited</option>
                                                        <option value="1">Dutch-Bangla Bank</option>
                                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 170.25px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-lcbank-container"><span class="select2-selection__rendered" id="select2-lcbank-container" title="-Select-">-Select-</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>    
                                                </div>    
                                            </div>    
                                            
                                        </div>    
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="col-md-12 text-center side-checkhead">
                                        <button class="btn btn-flat bg-blue saveseinv" id="saveinv"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp;Save</button>    
                                        <button class="btn btn-flat bg-gray saveseinv" id="sinvprint"><i class="fa fa-floppy-o"></i>&nbsp;&nbsp; Invoice &nbsp;&nbsp;<i class="fa fa-print"></i></button>   
                                    </div>    
                                </div>
                                    <script type="text/javascript">
                                        function cashcalculation(){
                                        var pab = parseFloat($('#pabamo').html());
                                        var cash = parseFloat($('#cash').val());
                                        var adv = parseFloat($('#balance').val());
                                        var adj = parseFloat($('#adjust').val());    
                                        var paid=0; due=0; chang=0;
                                        if(isNaN(cash)){
                                        cash=0;    
                                        }
                                        if(isNaN(adj)){
                                        adj=0;    
                                        }
                                            
                                        if((cash+adj)<=pab){
                                        paid=cash;
                                        due=(pab-(cash+adj));
                                        chang=0;    
                                        }else{
                                        paid=pab;
                                        due=0;
                                        chang=((cash+adj)-pab);    
                                        }
                                        $('#paidamo').html(paid);
                                        $('#dueamo').html(due);
                                        $('#changamo').html(chang);   
                                        }
                                            
                                        $(document).on('keyup', '#cash', function() { 
                                        cashcalculation();
                                        });
                                            
                                        $(document).on('keyup', '#adjust', function() {
                                        var pab = parseFloat($('#pabamo').html());    
                                        var adv = parseFloat($('#balance').val());
                                        var adj = parseFloat($('#adjust').val());    
                                        var maxad = 0;
                                        if(pab<=adv){
                                        maxad=pab;
                                        }else{
                                        maxad=adv;    
                                        }
                                        if(adj>maxad){
                                        $('#adjust').val(maxad);    
                                        }    
                                        cashcalculation();
                                        });
                                            
                                        $(document).on('change', '#baid', function() {
                                        id_arr = $(this).val();
                                        id = id_arr.split("_");
                                        type=id[0];
                                        if(type=='BA'){
                                        document.getElementById("chkno").disabled=false; 
                                        document.getElementById("chkdt").disabled=false;     
                                        }else{
                                        $('#chkno').val('');
                                        $('#chkdt').val('');    
                                        document.getElementById("chkno").disabled=true; 
                                        document.getElementById("chkdt").disabled=true;    
                                        }    
                                        });    
                                            
                                        $(document).on('click', '.tabpoint', function() { 
                                        var tval=$(this).attr('id');
                                        if (tval=='tbank'){
                                        $("#caname").val("");    
                                        $("#chbid").val("").trigger("change");
                                        $("#caid").val("").trigger("change");
                                        $("#mobid").val("").trigger("change");
                                        $("#trxid").val("");    
                                        }else if(tval=='tcard'){
                                        $("#baid").val("").trigger("change");
                                        $("#chkno").val("");
                                        $("#chkdt").val("");    
                                        $("#mobid").val("").trigger("change");
                                        $("#trxid").val("");
                                        }else if(tval=='tmobile'){
                                        $("#baid").val("").trigger("change");
                                        $("#chkno").val("");
                                        $("#chkdt").val("");
                                        $("#caname").val("");    
                                        $("#chbid").val("").trigger("change");
                                        $("#caid").val("").trigger("change");    
                                        }
                                                
                                        });    
                                        
                                        function chek_error(){
                                        var result = true;    
                                        var baid = $('#baid').val();
                                        var chkno = $('#chkno').val();
                                        var chkdt = $('#chkdt').val();
                                            
                                        var caname = $('#caname').val();
                                        var chbid = $('#chbid').val();
                                        var caid = $('#caid').val();
                                            
                                        var mobid = $('#mobid').val();
                                        var trxid = $('#trxid').val(); 
                                        
                                        $('.LV_invalid_field').removeClass('LV_invalid_field');     
                                        $('.LV_validation_message').remove();    
                                            
                                        if(baid != ''){
                                        if(chkno.length>=0 && chkno.length<5){
                                        $('#chkno').addClass('LV_invalid_field');   
                                        $('#chkno').after("<span class='LV_validation_message LV_invalid'>Enter Valid Cheque No!</span>").addClass('has-error'); 
                                        result=false;
                                        }else{
                                        $('#chkno').removeClass('LV_invalid_field');
                                        result=true;    
                                        } 
                                        
                                        if(chkdt.length<=0){
                                        $('#chkdt').addClass('LV_invalid_field');   
                                        $('#chkdt').after("<span class='LV_validation_message LV_invalid'>Enter Cheque Date!</span>").addClass('has-error');
                                        result=false;    
                                        }else{
                                        $('#chkdt').removeClass('LV_invalid_field');
                                        result=true;    
                                        }    
                                        }    
                                        
                                        if(caname.length>0){
                                        if(chbid == '-Select-' || chbid == ''){
                                        $('#chbid').addClass('LV_invalid_field');   
                                        $('#chbid').after("<span class='LV_validation_message LV_invalid'>Can't be empty!</span>").addClass('has-error'); 
                                        result=false;
                                        } else {
                                        $('#chbid').removeClass('LV_invalid_field');
                                        result=true;    
                                        }
                                            
                                        if(caid == '-Select-' || caid == ''){
                                        $('#caid').addClass('LV_invalid_field');   
                                        $('#caid').after("<span class='LV_validation_message LV_invalid'>Can't be empty!</span>").addClass('has-error'); 
                                        result=false;
                                        } else {
                                        $('#caid').removeClass('LV_invalid_field');
                                        result=true;    
                                        }    
                                        }    
                                        
                                        if(mobid != ''){
                                        if(trxid.length>=0 && trxid.length<5){
                                        $('#trxid').addClass('LV_invalid_field');   
                                        $('#trxid').after("<span class='LV_validation_message LV_invalid'>Enter Valid TrxID No!</span>").addClass('has-error'); 
                                        result=false;
                                        }else{
                                        $('#trxid').removeClass('LV_invalid_field');
                                        result=true;    
                                        }    
                                        }    
                                        
                                        if(!result){
                                        return false;    
                                        }else{
                                        return true;     
                                        }    
                                            
                                        }
                                            
                                        $(".select2").select2();    
                                        $('.datetimepicker').datepicker({format: "yyyy-mm-dd", autoclose: true, clearBtn: true, orientation: 'auto bottom'});    
                                    </script>    
                        
                        </div>    
                        <div class="col-md-5">
                            <div class="invhold scrol-y" id="invhold">
                            
                                <div class="col-md-12 cart-border-left text-center">
                                    <div class="horizontal-scroll">
                                        <h5 class="text-center" style="font-size: 20px;">Purchase Details</h5> 
                                    <div>
                                    <div class="text-center header-line-height">
                                        <small class="text-center" style="font-size: 15px;">RMC</small>
                                        <br> <small class="text-center">15 Jul 2021</small>
                                        <br> <small class="text-center" style="font-size: 12px;"><strong>Purchase Receipt</strong></small>
                                        <!--<br> <small class="text-left">Sold By: John Doe</small>--> 
                                        <br> <small><span>Purchase From: Walk-In Customer</span></small> 
                                        <small class="text-left invoice-show" style="display: none;">Invoice ID:</small>
                                    </div> 
                                    <div class="invoice-table">
                                        <table class="table product-card-font" style="font-weight: 500;">
                                            <thead class="border-top-0">    
                                                <tr>
                                                    <th class="cart-summary-table text-left">Items</th> 
                                                    <th class="cart-summary-table text-left">Qty</th> 
                                                    <th class="cart-summary-table text-right">Price</th>
                                                    <th class="cart-summary-table text-right">Discount</th>
                                                    <th class="cart-summary-table text-right" width="80px;">Total</th>
                                                </tr>   
                                            </thead> 
                                            <tbody>
                                                
                                                <tr>
                                                    <td class="cart-summary-table text-left">Brick<br></td>
                                                    <td class="cart-summary-table">1</td> 
                                                    <td class="text-right cart-summary-table">7,000.00</td> 
                                                    <td class="text-right cart-summary-table">0 %</td> 
                                                    <td class="text-right cart-summary-table">800.00</td>
                                                    
                                                </tr>
                                            </tbody> 
                                            <tfoot>
                                                
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">Sub Total</td> 
                                                    <td class="cart-summary-table"></td>
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table">Tk 800.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">VAT(5%)</td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table ">Tk 36.00</td>
                                                </tr>    
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">TAX(5%)</td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table ">Tk 36.00</td>
                                                </tr>    
                                                    
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">Speed Money</td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table ">Tk 10.00</td>
                                                </tr>    
                                                
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">Freight</td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table ">Tk 10.00</td>
                                                </tr>    
                                            
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">Adjust</td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table ">Tk 10.00</td>
                                                </tr>    
                                                
                                                <tr>
                                                    <td class="cart-summary-table font-weight-bold text-left">Total</td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="cart-summary-table"></td> 
                                                    <td class="text-right cart-summary-table ">Tk 802.00</td>
                                                </tr> 
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                </div>     
            </div>
        </div>      
           
    </section>
    <!-- /.main content -->
  
<?php $__env->stopSection(); ?>




 
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver-3\resources\views/main/admin/new/purchase_create.blade.php ENDPATH**/ ?>