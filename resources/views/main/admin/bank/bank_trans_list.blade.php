@extends("layouts/admin/main")
@section("content")
<section class="content-header">
    <h1>Transaction Record</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>  
            <li><a href="#">Bank</a></li>
            <li class=""><a href="#">Transaction Record</a></li>
        </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">BANK TRANSACTION</h3>
            </div>
            <div class="box-body">
               {{-- Error messages show --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead>
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Date</th>
                           <th>Trans No</th>
                           <th>Amount</th>
                           <th>Note</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php
                             $i=1;
                         @endphp
                         @foreach ($results as $result)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$result->date}}</td>
                           <td>{{$result->trans_no}}</td>
                           <td>{{$result->amount}}</td>
                           <td>{{$result->note}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple details-invoice" href="{{route('banktransactionlist-view-route',['id'=>$result->trans_no])}}" ><i class="fa fa-eye cat-child"></i></a>
                              <!--<a class="btn btn-flat bg-purple" href="#"><i class="fa fa-edit"></i></a>-->
                              <a class="btn btn-flat bg-purple" href="{{route('banktransaction-destroy-route',['id'=>$result->trans_no])}}"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <div class="clearfix" ></div>
               <div class="row"style="margin-top: 15px" >
                  <div class="col-md-12 table-responsive">
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <a href="{{route('banktransaction-create-route')}}" class="btn btn-flat bg-purple">Create Transaction</a>
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
                     {{-- History show here  --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
