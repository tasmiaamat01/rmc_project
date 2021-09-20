@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Branch</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Branch</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Branch List</h3>
            </div>
            <div class="box-body">
               {{-- Error message show here    --}}
               <div class="col-md-12 table-responsive">
                  <table class="table table-bordered table-striped" id="datarec">
                     <thead class="text-uppercase">
                        <tr>
                           <th style="width:40px;">SN</th>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Address</th>
                           <th style="width:40px; text-align:center;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                         @php $i=1; @endphp
                         @foreach ($branches ?? '' as $branch)
                        <tr>
                           <td class="center">{{$i++}}</td>
                           <td>{{$branch->name}}</td>
                           <td>{{$branch->phone}}</td>
                           <td>{{$branch->email}}</td>
                           <td>{{$branch->address}}</td>
                           <td nowrap="">
                              <a class="btn btn-flat bg-purple" href="{{route('branch-edit-route',['id' => $branch->id])}}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-flat bg-purple" href="{{route('branch-destroy-route',['id' => $branch->id])}}"><i class="fa fa-trash"></i></a>
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
                     <div class="col-md-4 text-right">
                        <a href="{{route('branch-create-route')}}" class="btn btn-flat bg-purple">Add Branch</a>
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
                     <h3 class="box-title">History</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
