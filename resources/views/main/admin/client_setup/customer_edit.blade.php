@extends("layouts/admin/main")
@section("content")
<section class="content-header">
   <h1>Customer Edit</h1>
   <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
      <li><a href="mas_brandcreate.php">Client</a></li>
      <li class=""><a href="#">Customer Edit</a></li>
   </ol>
</section>
<!-- Main content -->
<section class="content">
   <div class="row">
      <div class="col-md-9">
         <div class="box box-solid">
            <div class="box-header with-border">
               <h3 class="box-title">Edit Customer</h3>
            </div>
            <div class="box-body">
               {{-- Error mess show here  --}}
               <form action="{{route('customer-update-route',$customer->id)}}" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                  @csrf
                  @method('patch')
                  <div class="col-md-12 popup_details_div">
                     <div class="col-md-1"></div>
                     <div class="col-md-10">
                        <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" maxlength="45" value="{{$customer->name}}" id="name" class="form-control" placeholder="e.g. Md.Sumon Rahman"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status" id="status">
                                       <option value="1">Acive</option>
                                       <option value="0">De-Acive</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Code</label>
                                    <input type="text" name="code" maxlength="15" value="{{$customer->code}}" id="code" class="form-control" placeholder="e.g. ABA/CU/001" readonly/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Father / Contact Name</label>
                                    <input type="text" name="c_name" maxlength="45" value="{{$customer->c_name}}" id="cperson" class="form-control" placeholder="e.g. Md.Rahman Sumon(CEO)"/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mother Name</label>
                                    <input type="text" name="m_name" maxlength="45" value="{{$customer->m_name}}" id="mname" class="form-control" placeholder="e.g. Begum Anowera"/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>National ID (NID)</label>
                                    <input type="text" name="nid" maxlength="17" value="{{$customer->nid}}" id="nid" class="form-control" placeholder="e.g. 1982145678956"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="c_number" maxlength="18" value="{{$customer->c_num}}" id="cnumber" class="form-control" placeholder="e.g. +88016161xxxxx70"/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Contact Phone</label>
                                    <input type="text" name="c_phone" maxlength="14" value="{{$customer->c_phone}}" id="cphone" class="form-control" placeholder="e.g. +88-02-721xxx1"/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Contact Email</label>
                                    <input type="text" name="c_email" maxlength="45" value="{{$customer->c_email}}" id="cemail" class="form-control" placeholder="e.g. info@axesgl.com"/>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" id="address" maxlength="200" rows="4" placeholder="Address">{{$customer->address}}</textarea>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Shipping Address</label>
                                    <textarea class="form-control" name="s_address" id="faddress" maxlength="200" rows="4" placeholder="Shipping Address">{{$customer->s_address}}</textarea>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Select District</label>
                                    <select class="form-control select2" name="district_id" id="district_id" onchange="getAllSubgroup(this.value)">
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}" @php echo ($customer->district_id == $district->id ? "selected" : ""); @endphp>{{$district->district}}</option>
                                    @endforeach
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>Select Group</label>
                                    <select class="form-control select2" name="grp_id" id="grp_id">
                                    @foreach($groups as $group)
                                    <option value="{{$group->id}}" @php echo ($customer->grp_id == $group->id ? "selected" : ""); @endphp>{{$group->name}}</option>
                                    @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Select Zone</label>
                                    <select class="form-control select2" name="zone_id" id="zone_id">
                                    @foreach($zones as $zone)
                                    <option value="{{$zone->id}}" @php echo ($customer->zone_id == $zone->id ? "selected" : ""); @endphp>{{$zone->zone}}</option>
                                    @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Credit Limit</label>
                                    <input type="text" name="credit" maxlength="12" value="{{$customer->credit}}" id="climit" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 350000.00"/>
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label>Ranking</label>
                                    <input type="text" name="ranking" maxlength="3" value="{{$customer->ranking}}" id="rank" class="form-control" onkeypress="return isNumberKey(event)" placeholder="e.g. 127"/>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-1"></div>
                  </div>
                  <div class="clearfix" ></div>
                  <div class="col-md-12 nopadding widgets_area"></div>
                  <div class="row"style="margin-top: 15px" >
                     <div class="col-md-8 ">
                     </div>
                     <div class="col-md-4 text-right" >
                        <input type="submit" name="save_customer" id="submit" class="btn btn-flat bg-purple btn-sm" value="Update"/> <a href="main_cutomerlist.php" class="btn btn-flat bg-gray  ">Close</a>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="row">
            <div class="col-md-12">
               <div class="box box-solid">
                  <div class="box-header">
                     <h3 class="box-title">History </h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" >
                     {{-- history show here --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- /.main content -->
@endsection
