@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Warehouse Edit</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Inventory</a></li>
      <li class=""><a href="#">Warehouse Edit</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Add Warehouse</h3>
            </div>
            <div class="box-body">
               {{-- Error message show --}}
               <form action="{{route('warehouse-update-route',$warehouse->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                @csrf
                @method('patch')
                <div class="col-md-12 popup_details_div">
                     <div class="row ">
                        <div class="col-md-12">
                           <div class="col-md-2"></div>
                           <div class="col-md-8">
                              <div class="col-md-12">
                                 <div class="row">
                                    <div class="form-group">
                                       <label>Branch</label>
                                       <select class="form-control select2" name="branch_id" id="branch_id">
                                          <option value="{{$warehouse->branch_id}}">-Select Invoice-</option>
                                          @foreach($branch as $data)
                                          <option value="{{ $data->id }}">{{ $data->name }}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="text" name="name" maxlength="45" value="{{$warehouse->name}}" id="name" class="form-control" placeholder="e.g. Taltola" />
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>Phone</label>
                                          <input type="text" name="phone" maxlength="18" value="{{$warehouse->phone}}" id="phone" class="form-control" placeholder="e. g. 0161xx700xx" />
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group" >
                                          <label>Email</label>
                                          <input type="text" name="email" maxlength="45" value="{{$warehouse->email}}" id="email" class="form-control" placeholder="e.g. info@axesgl.com" />
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="form-group">
                                       <label>Address (English)</label>
                                       <textarea class="form-control" maxlength="250" rows="6" name="address" id="address" placeholder="Address">{{$warehouse->address}}</textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8"></div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_whouse" id="submit" class="btn btn-flat bg-purple btn-sm " value="Update"/> <a href="inv_whouselist.php" class="btn btn-flat bg-gray">Close</a>
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
                     <h3 class="box-title">History</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- History show --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
