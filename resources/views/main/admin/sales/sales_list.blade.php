@extends("layouts/admin/main")
@section("content")
    <section class="content-header">
    <h1>Sales List</h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="mas_brandcreate.php">Sales</a></li>
            <li class=""><a href="#">Sales List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Sales Record</h3>
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
        {{-- Error message here  --}}
        <div class="col-md-12 table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
        <thead>
        <tr>
        <th style="width:40px; text-align:center;">SN</th>
        <th>Date</th>
        <th>Branch</th>
        <th>Project</th>
        <th>Invoice</th>
        <th>Total</th>
        <th>Received</th>
        <th>Due</th>
        <th style="width:40px; text-align:center;">Action</th>
        </tr>
        </thead>
        <tbody>
        @php $i=0; @endphp
        @foreach($sale as $data)
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $data->created_at }}</td>
            <td>{{ $data->product_store }}</td>
            <td>{{ $data->project_name }}</td>
            <td>{{ $data->sales_invoice }}</td>
            <td>{{ $data->payable }}</td>
            <td>{{ $data->paid }}</td>
            <td>{{ $data->payable - $data->paid }}</td>
            <td nowrap="">
                <a class="btn btn-flat bg-purple details-invoice" href="{{route('sales-view-page',$data->id)}}"><i class="fa fa-eye cat-child"></i></a>
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
        <a href="{{route('sales-create-page')}}" class="btn btn-flat bg-purple">Create Sales</a>
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
        <a class=" pull-right" data-widget="collapse" style="margin-right: 5px;">
        <i class="fa fa-minus"></i></a>
        </div>
        <!-- /. tools -->
        <i class="fa fa-filter" aria-hidden="true"></i>
        <h3 class="box-title">Date Range Filter</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >

        <form action="#" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="col-md-12 popup_details_div">
        <div class="row">
        <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-10">

        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label>Date From</label>
        <div class="input-group date datetimepicker">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="text" name="tfdate" id="tfdate" value=""  class="form-control" placeholder="Date From" readonly="true">
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group" >
        <label>Date To</label>
        <div class="input-group date datetimepicker">
        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
        <input type="text" name="ttdate" id="tdate" value=""  class="form-control" placeholder="Date To" readonly="true">
        </div>
        </div>
        </div>
        </div>

        </div>
        <div class="col-md-1"></div>
        </div>
        </div>
        </div>

        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-2" >

        </div>
        <div class="col-md-10 text-right" >
        <input type="button" id="csvexp" class="btn btn-flat bg-purple btn-sm " value="Exp->CSV"/>
        </div>
        </div>
        </form>

        </div>
        </div>
        </div>

        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="box box-solid">
        <div class="box-header">
        <h3 class="box-title">History </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
        {{-- history --}}
        </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div style="display: none;">
        <table id="expcsv"></table>
        </div>
    </section>
    <!-- /.main content -->
@endsection
