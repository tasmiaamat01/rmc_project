	
<?php $__env->startSection("content"); ?> 
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 5.8 - DataTables Server Side Processing using Ajax</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head> 
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
        <div class="table-responsive" style="width: 80%;">
            <form method="POST" id="dynamic_form">
            <div class="row">
                <div class="col-md-3">
                    <label>Company name</label>
                    <select class="form-control" name="pro_id">
                        <option selected>Choose Please.....</option>
                    
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Suppliar</label>
                    <select class="form-control" name="pro_id">
                        <option selected>Choose Please.....</option>
                    
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Color</label>
                    <select class="form-control" name="pro_id">
                        <option selected>Choose Please.....</option>
                    
                    </select>
                </div>
            </div>
            <br>
             <span id="result"></span>
             <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th>SN</th>
                <th>Item</th>
                <th>Oty</th>
                <th>Cost</th>
                <th>ASL</th>
                <th>Subtotal</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
           </thead>
           <tbody>

           </tbody>
           <tfoot>
            <tr>
                <td colspan="2">Total</td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Discount(%)</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">VAT (%)</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">TAX (%)</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Others Name:</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Others</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Speed Money:</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Freight:</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Fractional Discount:	</td>
                <td colspan="2"><input type="text" name="" class="form-control" readonly/></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">Grand total	</td>
                <td colspan="2"></td>
                <td><input type="text" name="" class="form-control" readonly/></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <select class="form-control" name="pro_id">
                        <option selected>Choose Please.....</option>
                    
                    </select>
                </td>
                <td colspan="2" align="right">
                                    
                </td>
                <td>
                <?php echo csrf_field(); ?>
                <input type="submit" name="save" id="save" class="btn btn-primary" value="Checkout" />
                </td>
            </tr>
           </tfoot>
       </table>
      </form>
</div>
<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {

  html = '<tr>';
        html += '<td><input type="text" name="" class="form-control" readonly/></td>';
        html += '<td> <select name="pro_id" class="form-control"><option selected>Choose Please.....</option></select></td>';
        html += '<td><input type="text" name="oty-[]" class="form-control" /></td>';
        html += '<td><input type="text" name="cost[]" class="form-control" /></td>';
        html += '<td><input type="text" name="asl[]" class="form-control" /></td>';
        html += '<td><input type="text" name="subtotal[]" class="form-control" /></td>';
        html += '<td><input type="text" name="price[]" class="form-control" /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
            $('tbody').html(html);
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'',
            method:'post',
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>
        
        <div class="row">
            <div class="col-md-12">
                
            </div>
        </div>
        <!--end same barcode-->       
    </section>
    <!-- /.main content -->

  
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver-3\resources\views/main/admin/new/purchase_checkout.blade.php ENDPATH**/ ?>