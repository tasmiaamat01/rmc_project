@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>PI list</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">LC</a></li>
      <li class=""><a href="#">PI list</a></li>
   </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
       <div class="col-md-8">
          <div class="box box-solid">
             <div class="box-header with-border">
                <h3 class="box-title">PI List</h3>
             </div>
             <div class="box-body">
               @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
               @endif
                {{-- Error message here    --}}
                <div class="col-md-12 table-responsive">
                   <table class="table table-bordered table-striped" id="datarec">
                      <thead class="text-uppercase">
                         <tr>
                            <th style="width:40px;">SN</th>
                            <th>PI Code</th>
                            <th>SPL Name</th>
                            <th>BYR Name</th>
                            <th>PI Date</th>
                            <th>Total Amount</th>
                            <th style="width:40px; text-align:center;">Action</th>
                         </tr>
                      </thead>
                      <tbody>
                             {{-- <tr>
                                 <td colspan="8">No data is available</td>
                             </tr> --}}
                             @php $i=1; @endphp
                             @foreach($pi as $data)
                              <tr>
                                 <td class="center">{{$i++}}</td>
                                 <td>{{$data->pi_code}}</td>
                                 <td>{{$data->supplier->name}}</td>
                                 <td>{{$data->buyer->name}}</td>
                                 <td>{{$data->pi_date}}</td>
                                 <td>{{$data->extra1}}</td>
                                 <td nowrap="">
                                    <a class="btn btn-flat bg-purple" href=""><i class="fa fa-edit"></i></a> 
                                    <a class="btn btn-flat bg-purple" href="{{route('lc-pi-delete',['id' => $data->pi_code])}}"><i class="fa fa-trash"></i></a>
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
                         <a href="{{route('lc-create-pi')}}" class="btn btn-flat bg-purple">Add PI</a>
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
                      {{-- History show here --}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- /.main content -->

@endsection
