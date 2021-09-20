	
<?php $__env->startSection("content"); ?>  
    <section class="content-header">
        <h1>Payslip Generate</h1>
        <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            
        <li><a href="mas_brandcreate.php">Payroll</a></li>
        <li class=""><a href="#">Payslip Generate</a></li>
        </ol>
    </section>


    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div class="col-md-9">    
        <div class="box box-solid">
        <div class="box-header with-border">
        <h3 class="box-title">Salary Sheet</h3>
        </div>
        <div class="box-body">
        
        <div class="col-md-12 popup_details_div">    
        <div class="row">
        <input type="hidden" id="syear" name="year" value="" readonly> 
        <input type="hidden" id="smonth" name="month" value="" readonly>     
        <div class="table-responsive">
        <table class="table table-bordered table-striped" id="datarec">
        <thead>
        <tr>
        <th width="3%">#</th>
        <th width="18%">Name</th>
        <th width="14%">Designation</th>
        <th width="12%">G.Salary</th>
        <th width="7%">D.Absent</th>
        <th width="6%">D.Late</th>
        <th width="6%">A.Leave</th>
        <th width="6%">P.Day</th>
        <th width="6%">P.Amo</th>
        <th width="10%">Net.Pay</th>
        <th width="7%"></th>
        </tr>
        </thead>
        <tbody id="dataemploye">
                
        </tbody>    
        </table>    
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
        <h3 class="box-title">Salary Month</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" >
        <div class="col-md-12 popup_details_div">
        <div class="col-md-1"></div>
        <div class="col-md-10">    
        
        <div class="row">
        <div class="col-md-6">
        <label>Year</label>
        <select class="form-control" id="year" name="year">
        </select>
        </div>
        <div class="col-md-6">
        <label>Salary Month</label>
        <select class="form-control" id="month" name="month" onchange="getAllEmploye(this.value)">
        </select>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <label>Branch</label>
        <select class="form-control" name="pono" id="brid" onchange="getAllSalary(this.value)">
        <option value=" ">-Select Branch-</option>
        <option value="0">-No Branch-</option>
        <option value=""></option>
        </select>
        </div>    
        </div>
            
        </div>    
        <div class="col-md-1"></div>    
        </div>
        <div class="clearfix" ></div>
        <div class="col-md-12 nopadding widgets_area"></div>    
        <div class="row"style="margin-top: 15px" >
        <div class="col-md-6"></div>
        <div class="col-md-6 text-right" >
        <input type="button" id="reset" class="btn btn-flat bg-red btn-sm " value="Reset"/>    
        <input type="button" id="triview" class="btn btn-flat bg-purple btn-sm" value="Submit"/>
        </div> 
        </div>    
        </div>
        </div>
        </div>
        </div>    
        </div>
        </div>       
    </section>    
        <!-- /.main content -->

    <?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts/admin/main", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Projo\Construction\ver_9\resources\views/main/admin/payroll/payslip_list.blade.php ENDPATH**/ ?>