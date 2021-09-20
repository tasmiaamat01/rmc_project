	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Payment Create</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Account</a></li>
        <li class=""><a href="#">Payment Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
<section class="content">

    <div class="row">
    <div class="col-md-8">
    <div class="box box-solid">
    <div class="box-header with-border">
    <h3 class="box-title">Add Payment</h3>
    </div>
    <div class="box-body">
     
    <form action="acc_paycreate.php" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="col-md-12 popup_details_div">
    <div class="row">    
    <center>
    <h3 class="page-title">PAYMENT VOUCHER</h3>
    </center>
    </div>
    <div class="row">    
    <div class="col-md-4 col-md-offset-8">
    <div class="form-group">
    <div class="input-group">
    <span class="input-group-addon"><b>Voucher No:</b></span>
    <input type="text" class="form-control" maxlength="15" name="invno" id="invno" value="" placeholder="e.g. PAV121119101" readonly>
    </div>
    </div>
    <div class="form-group" >
    <div class="input-group">
    <span class="input-group-addon"><b>Date:</b></span>
    <input type="text" class="form-control datetimepicker" name="apdate" id="apdate" value="" placeholder="Date:" autocomplete="off" readonly>
    </div>
    </div>
    <div class="form-group" >
    <div class="input-group">
    <span class="input-group-addon"><b>Project:</b></span>    
    <select class="form-control select2" name="prjid" id="prjid">
    <option value="">-Select-</option>
    <option value=""></option>
    </select>    
    </div>   
    </div>    
    </div>
    </div>
    <div class="row">    
    <div class="col-md-4">    
    <div class="form-group">
    <label>Payment Sourch</label>    
    <select class="form-control select2" name="cid" id="cid">
    <option value="">-Select-</option>
    <option value="LE_2">Cash</option>    
    <option value=""></option>
    <option value=""></option>   
    </select>
    </div>    
    </div>
    <div class="col-md-2">    
    <div class="form-group">
    <label>Balance</label>
    <div style="font-size: 20px;color: red;"><span>$ </span><span id="cbalance">0.00</span></div>    
    </div>    
    </div>    
    <div class="col-md-2">    
    <div class="form-group">
    <label>Cheque No</label>
    <input type="text" maxlength="20" class="form-control" name="chkno" id="chkno" value="" placeholder="e.g. KA7865467" autocomplete="off" disabled="disabled">
    </div>    
    </div>
    <div class="col-md-2">    
    <div class="form-group" >
    <label>Cheque Date</label>
    <input type="text" class="form-control datetimepicker" name="chkdt" id="chkdt" value="" placeholder="Cheque Date" autocomplete="off" disabled="disabled">
    </div>    
    </div>    
    <div class="col-md-4">    
        
    </div>    
    </div>    
    <div class="row">
    <div class="col-md-4">
    <div class="form-group" >
    <label>Payment To</label>
    <select class="form-control select2" name="did" id="did">
    <option value="">-Select-</option>
    <optgroup label="Supplier">
    <option value=""></option>
    </optgroup>
    <optgroup label="Contructor">
    <option value=""></option>
    </optgroup>    
    <optgroup label="Customer">
    <option value=""></option>
    </optgroup>
    <optgroup label="Employee">
    <option value=""></option>
    </optgroup>
    <optgroup label="Loan">
    <option value=""></option>
    </optgroup>     
    <optgroup label="Other">    
    <option value=""></option>
    </optgroup>    
    </select>   
    </div>
    </div>
    <div class="col-md-1">    
    <div class="form-group">
    <label>Bal.</label>
    <div style="font-size: 14px;color: red;"><span>$ </span><span id="balance">0.00</span></div>    
    </div>    
    </div>    
    <div class="col-md-2">
    <div class="form-group" >
    <label>Ref</label>
    <input type="text" maxlength="25" class="form-control" name="ref" id="ref" placeholder="e.g. Sumon" autocomplete="off">    
    </div>    
    </div>
    <div class="col-md-2">
    <div class="form-group">
    <label>Amount</label>    
    <input type="text" maxlength="10" class="form-control" name="amo" id="amo"  onkeypress="return isNumberKey(event)" placeholder="e.g. 500" autocomplete="off">    
    </div> 
    </div>
    <div class="col-md-2">
    <div class="form-group">
    <label>Type</label>    
    <select class="form-control select2" name="mtype" id="mtype">
    <option value="0">-Select-</option>
    <option value=""></option>
    </select>   
    </div> 
    </div>    
    <div class="col-md-1">
    <div class="form-group">
    <label>&nbsp;</label>    
    <input type="button" id="addpay" class="btn btn-flat bg-red" value="Add"/>    
    </div>
    </div>    
    </div>
    <div class="row">
    <div class="col-md-12">
    <table class="table table-bordered table-striped">
    <thead>    
    <th style="width:40px; text-align:center">SN</th>
    <th>Sourch</th>
    <th>Pay To</th>
    <th>Type</th>    
    <th>Amount</th>
    <th>Cheque</th>
    <th>Date</th>    
    <th>Ref</th>
    <th style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>    
    </thead>
    <tbody id="itemdata">
    
    </tbody>
    <tfoot id="itemfoot">
    
    </tfoot>    
    </table> 
    </div>    
    </div>
    <div class="row">
    <div class="col-md-12">
    <div class="form-group">
    <label>Note</label>
    <textarea class="form-control" name="note" id="note" maxlength="250" rows="3" placeholder="e.g. Note"><?php if(isset($_SESSION['axes_paydata']['note'])){echo $_SESSION['axes_paydata']['note'];}?></textarea>
    </div>    
    </div>   
    </div>    
        
    </div>    
        
    <div class="clearfix" ></div>
    <div class="col-md-12 nopadding widgets_area"></div>    
    <div class="row"style="margin-top: 15px" >
    <div class="col-md-8"></div>
    <div class="col-md-4 text-right" >
    <input type="button" id="payreset" class="btn btn-flat bg-red btn-sm " value="Reset"/>    
    <input type="submit" name="save_payment" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="acc_paylist.php" class="btn btn-flat bg-gray  ">Close</a>
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
    <!-- page script -->
<script type="text/javascript">
    $(document).ready(function (){ 
    var apdate = new LiveValidation('apdate');
    apdate.add(Validate.Presence);
    });
        
    $(document).on('change', '#cid', function() {
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
        
    ReadData();
    function ReadData(){
    $.ajax({
    url: "acc_payview.php",
    method: "POST",
    data:{ 
    body:1
    },
    success: function(data){
    $('#itemdata').html(data);
    }
    })
    
    $.ajax({
    url: "acc_payview.php",
    method: "POST",
    data:{ 
    foot:1
    },
    success: function(data){
    $('#itemfoot').html(data);
    }
    })    
    };    
    
    function ReadFoot(){
    $.ajax({
    url: "acc_payview.php",
    method: "POST",
    data:{ 
    foot:1
    },
    success: function(data){
    $('#itemfoot').html(data);
    }
    })	
    }
        
    $(document).on('click', '#addpay', function(e) {
    scid = $('#cid').val();
    chkno = $('#chkno').val();
    chkdt = $('#chkdt').val();    
    sdid = $('#did').val();
    amo = parseFloat($('#amo').val());
    mtype = $('#mtype').val();    
    ref = $('#ref').val();    
    toastr.options = {'positionClass': 'toast-top-center'};
    
    if(scid == '-Select-' || scid == ''){
    toastr.info('Please Select Payment Sourch!');
    return;
    };    
    
    ecid = scid.split("_");
    cty=ecid[0];
    cid=ecid[1];    
    
    if(cty=='BA'){    
    if(chkno.length>=0 && chkno.length<5){
    toastr.info('Please Enter Valid Cheque No!');
    return;    
    }    
    
    if(chkno.length>0){
    if(chkdt.length<=0){
    toastr.info('Please Enter Cheque Date!');
    return;    
    }    
    }    
    }
        
    if(sdid == '-Select-' || sdid == ''){
    toastr.info('Please Select Payment To!');
    return;
    }
        
    edid = sdid.split("_");
    dty=edid[0];
    did=edid[1];
        
    if(isNaN(amo) != false || amo <= 0){
    toastr.info('Please Enter Amount!');
    return;
    }    
    
    $.ajax({
    url: 'axe_cart.php',
    type: 'post',
    data: {getpayment:1,did:did,dty:dty,amo:amo,cty:cty,cid:cid,chkno:chkno,chkdt:chkdt,ref:ref,mtype:mtype},
    success:function(data) {
    $("#cid").val("").trigger("change");    
    $("#did").val("").trigger("change");
    $('#amo').val("");
    $('#chkno').val(""); 
    $('#chkdt').val("");     
    $('#ref').val("");
    ReadData();
    }
    });    
        
    e.preventDefault();     
    });
        
    $(document).on('blur change', '#apdate', function() {
    apdate=$(this).val();
    $.ajax({
    url: 'axe_cart.php',
    method: "POST",
    data:{ 
    paydate: apdate
    },
    dataType: 'json',
    success: function(data){
    $('#apdate').val(data[0]);
    }
    });     
    });    
    
    $(document).on('blur', '#note', function() {
    note = $(this).val();
    $.ajax({
    url: 'axe_cart.php',
    method: "POST",
    data:{ 
    paynote: note
    },
    dataType: 'json',
    success: function(data){
    $('#note').val(data[0]);
    }
    });     
    });    
    
    $(document).on('click','.empty',function() {
    $.ajax({
    url: 'axe_cart.php',
    method: "POST",
    data:{ 
    paydata: 1
    },
    success: function(data){
    ReadData();    
    }
    });    
    });    
    
    $(document).on('click', '.remove', function () {
    var id = $(this).attr('id');
    $.ajax({
    url: 'axe_cart.php',
    method: "POST",
    data:{ 
    payremove: id
    },
    success: function(data){
    ReadData();
    }
    });    
    });    
    
    $(document).on('click','#payreset',function() {
    $.ajax({
    url: 'axe_cart.php',
    method: "POST",
    data:{ 
    payclear: 1
    },
    success: function(data){
    $("#note").val("");   
    ReadData();    
    }
    });    
    });
    
    $(document).on('change', '#cid', function () {
    id = $(this).val();
    $.ajax({
    url: 'axe_cart.php',
    type: 'post',
    data: {checkbales:id},
    success:function(data){
    $('#cbalance').html(data);
    }
    });   
    });    
        
    $(document).on('change', '#did', function () {
    id = $(this).val();
    $.ajax({
    url: 'axe_cart.php',
    type: 'post',
    data: {checkbal:id},
    success:function(data){
    $('#balance').html(data);
    }
    });   
    });     
    </script>    
    <!-- /page script -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/rm_construction/ver-6/resources/views/main/admin/accounts/pay_voucher_create.blade.php ENDPATH**/ ?>