@extends("layouts/admin/main")	
@section("content")  
    <section class="content-header">
        <h1>Project Sub-Group Create</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Manage Project</a></li>
        <li class=""><a href="#">Project Sub-Group Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-8">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Create Sub-Group</h3>
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
        <form action="{{route('prosubgroup-store-create')}}"  enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
        <div class="col-md-12 popup_details_div">
        
            <div class="row ">
                <div class="col-md-12">
                    <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-8">    
                                    <div class="form-group">
                                        <label>Sub-Group Name</label>
                                        <input type="text" name="name" maxlength="45" value="" id="name" class="form-control" placeholder="e. g. LGED" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Group Code</label>
                                        <input type="text" name="code" maxlength="6" value="" class="form-control" placeholder="e.g 101020"  />
                                    </div>    
                                </div>
                            </div>    
                            <div class="form-group">
                                <label>Select Group</label>
                                <select class="form-control select2" name="pgid" id="pgid">
                                <option value="">-Select-</option>
                                @foreach($group as $groups)
                                    <option value="{{$groups->id}}">{{$groups->name}}</option>
                                @endforeach
                                </select>    
                            </div>    
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                            </div>   
                        </div>    
                    <div class="col-md-3"></div>    
                    </div>    
                </div>    
            
            </div>
            <div class="clearfix" ></div>
            <div class="col-md-12 nopadding widgets_area"></div>    
            <div class="row"style="margin-top: 15px" >
                <div class="col-md-8"></div>
                <div class="col-md-4 text-right" >
                <input type="submit" name="save_subgroup" id="submit" class="btn btn-flat bg-purple btn-sm " value="Save"/> <a href="prj_sgrouplist.php" class="btn btn-flat bg-gray  ">Close</a>
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