@extends("layouts/admin/main")
@section("content")
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<section class="content-header">
   <h1>Journal Create</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Account</a></li>
      <li class=""><a href="#">Journal Create</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Journal</h3>
            </div>
            <div class="box-body">
               
               <form id="dynamic_form"   onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                  <div class="col-md-12 popup_details_div">
                     <div class="row">
                        <center>
                           <h3 class="page-title">JOURNAL VOUCHER</h3>
                        </center>
                     </div>
                     <div id='result'></div>
                     <br>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Journal No</b></span>
                                 <input type="text" class="form-control" maxlength="15" name="journal_no" id="invno" value="" placeholder="e.g. JOU010120101" autocomplete="off">
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Date:</b></span>
                                 <input type="text" class="form-control datetimepicker" name="date" id="apdate" value="" placeholder="Date:" autocomplete="off" readonly>
                              </div>
                           </div>
                           <div class="form-group" >
                              <div class="input-group">
                                 <span class="input-group-addon"><b>Project:</b></span>
                                 <select class="form-control select2" name="project_id" id="prjid">
                                    <option value="">-Select-</option>
                                    @foreach($projects as $project)
                                    <option value="{{$project->id}}" @if(old('project_id') == $project->id) selected @endif>{{$project->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-8">
                           <div class="form-group">
                              <label>Narration</label>
                              <textarea class="form-control" name="narration" id="note" maxlength="250" rows="5" placeholder="e.g. Narration"><?php if(isset($_SESSION['axes_joudata']['note'])){echo $_SESSION['axes_joudata']['note'];}?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <table class="table table-bordered table-striped">
                              <thead>
                                 <tr>
                                    <th colspan="2" style="text-align:center;">Debit</th>
                                    <th rowspan="2" style="text-align:center;">Amount</th>
                                    <th colspan="2" style="text-align:center;">Credit</th>
                                    <th colspan="2" style="text-align:center;">Cheque Details</th>
                                    <th rowspan="2" style="text-align:center;">Ref.</th>
                                    <th rowspan="2" style="text-align:center;">Option</th>
                                 </tr>
                                 <tr>
                                    <th style="text-align:center;">Sub-Group</th>
                                    <th style="text-align:center;">Ledger</th>
                                    <th style="text-align:center;">Ledger</th>
                                    <th style="text-align:center;">Sub-Group</th>
                                    <th style="text-align:center;">Cheque No</th>
                                    <th style="text-align:center;">Date</th>
                                 </tr>
                              </thead>
                              <tbody >
                              </tbody>
                              <tfoot >
                                 <th colspan="2" style="text-align:center;">Total</th>
                                 <th style="text-align:center;" ><div id="totalvalue"></div></th>
                                 <th style="text-align:center;"><input type="number"  class="form-control" name="total"   placeholder="Total"/></th>
                              </tfoot>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_journal" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/> <a href="acc_joulist.php" class="btn btn-flat bg-gray  ">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- page script -->
<script>
   var number=0;
   $(document).ready(function(){
   
    var count = 1;
   
    dynamic_field(count);
   
    function dynamic_field(number)
    {
   
     html = '<tr>';
           html += '<th style="width:200px;"><select class="form-control select2" name="debit_sub_group_id[]" ><option value="">-Select-</option>@foreach($sub_groups as $subgroup)<option value="{{$subgroup['id']}}" @if(old('debit_sub_group_id') == $subgroup['id']) selected @endif>{{$subgroup['name']}}</option>@endforeach</select></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="debit_ledger_id[]"><option value="">-Select-</option>@foreach($ledgers as $ledger)<option value="{{$ledger['id']}}" @if(old('debit_ledger_id') == $ledger['id']) selected @endif>{{$ledger['name']}}</option>@endforeach</select></th>';
           html += '<th style="width:120px;"><input type="text" maxlength="10" class="value" name="debit_amount[]"    placeholder="e.g. 500" autocomplete="off"></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="credit_ledger_id[]"><option value="">-Select-</option> @foreach($ledgers as $ledger)<option value="{{$ledger['id']}}" @if(old('credit_ledger_id') == $ledger['id']) selected @endif>{{$ledger['name']}}</option>@endforeach</select></th>';
           html += '<th style="width:200px;"><select class="form-control select2" name="credit_sub_group_id[]"><option value="">-Select-</option>@foreach($sub_groups as $subgroup)<option value="{{$subgroup['id']}}" @if(old('credit_sub_group_id') == $subgroup['id']) selected @endif>{{$subgroup['name']}}</option>@endforeach</select></th>';
           html += '<th style="width:150px;"><input type="text" maxlength="25" class="form-control" name="cheque_no[]"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
           html += '<th style="width:100px;"><input type="text" class="form-control datetimepicker" name="cheque_date[]" value="" placeholder="Date:" autocomplete="off" readonly></th>';
           html += '<th style="width:200px;"><input type="text" maxlength="35" class="form-control" name="ref[]"  placeholder="e.g. KA56458976" autocomplete="off"></th>';
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
               url:'{{ route("journallist-store-route") }}',
               method:'POST',
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

<script>
$(function() {
    $('.value').change(function() {
        var total = 0;

        $('.value').each(function() {
            if( $(this).val() != '' )
                total += parseInt($(this).val());
        });

        $('#totalvalue').html(total);
    });
}); 
</script>


<!-- /page script -->
@endsection
