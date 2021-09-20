<aside class="main-sidebar">
    <section class="sidebar">
       <ul class="sidebar-menu tree" data-widget="tree">
          <li> <a href="<?php echo e(route('home')); ?>" class="active"><i class="fa fa-dashboard ani_icon"></i> <span>Dashboard</span></a></li>
         <?php if(Auth::User()->roles = 'manage_project' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-folder-open-o ani_icon"></i> <span>Manage Project</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('progroup-list-create')); ?>"><i class="fa fa-caret-right"></i> Project Group</a></li>
                <li><a href="<?php echo e(route('progroup-page-create')); ?>"><i class="fa fa-caret-right"></i> Project Group Create</a></li>
                <li><a href="<?php echo e(route('prosubgroup-list-create')); ?>"><i class="fa fa-caret-right"></i> Project Sub-Group</a></li>
                <li><a href="<?php echo e(route('prosubgroup-page-create')); ?>"><i class="fa fa-caret-right"></i> Project Sub-Group Create</a></li>
                <li><a href="<?php echo e(route('project-type-list-page')); ?>"><i class="fa fa-caret-right"></i> Project Type</a></li>
                <li><a href="<?php echo e(route('project-type-create-page')); ?>"><i class="fa fa-caret-right"></i> Project Type Create</a></li>
                <li><a href="<?php echo e(route('project-contructor-list-page')); ?>"><i class="fa fa-caret-right"></i> Contructor List</a></li>
                <li><a href="<?php echo e(route('project-contructor-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Contructor</a></li>
                <li><a href="<?php echo e(route('project-list-page')); ?>"><i class="fa fa-caret-right"></i> Project Record</a></li>
                <li><a href="<?php echo e(route('project-create-page')); ?>"><i class="fa fa-caret-right"></i> Add New Project </a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'daily_process' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-edit ani_icon"></i> <span>Daily Process</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu" style="display: none;">
                <li><a href="<?php echo e(route('expense-list')); ?>"><i class="fa fa-caret-right"></i> Expenses Record</a></li>
                <li><a href="<?php echo e(route('expense-create-route')); ?>"><i class="fa fa-caret-right"></i> Create Expenses</a></li>
                <li><a href="<?php echo e(route('expense-head-list')); ?>"><i class="fa fa-caret-right"></i> Expenses Head</a></li>
                <li><a href="<?php echo e(route('expense-head-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Expenses Head</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'purchase' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-shopping-basket ani_icon"></i> <span>Purchase</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('purchase-list-page')); ?>"><i class="fa fa-caret-right"></i> Purchase Invoice</a></li>
                <li><a href="<?php echo e(route('purchase-create-page')); ?>"><i class="fa fa-caret-right"></i> Purchase Invoice Create</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'material_use' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-shopping-bag ani_icon"></i> <span>Materials Use &amp; Sales</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('materialuse-create-page')); ?>"><i class="fa fa-caret-right"></i>Create Materials Use-Record</a></li>
                <li><a href="<?php echo e(route('view_material-cart_list')); ?>"><i class="fa fa-caret-right"></i> Materials Send For Use</a></li>
                <li><a href="<?php echo e(route('sales-list-page')); ?>"><i class="fa fa-caret-right"></i> Sales Invoice</a></li>
                <li><a href="<?php echo e(route('sales-create-page')); ?>"><i class="fa fa-caret-right"></i> Sales Invoice Create</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'inventory' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-barcode ani_icon"></i> <span>Inventory</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('branch-list')); ?>"><i class="fa fa-caret-right"></i> Branch</a></li>
                <li><a href="<?php echo e(route('warehouse-list')); ?>"><i class="fa fa-caret-right"></i> Warehouse</a></li>
                <li><a href="<?php echo e(route('warehouse-create-route')); ?>"><i class="fa fa-caret-right"></i> Warehouse Create</a></li>
                <li><a href="<?php echo e(route('prodelivery-list')); ?>"><i class="fa fa-caret-right"></i> Product Delivery</a></li>
                <li><a href="<?php echo e(route('proreceive-list')); ?>"><i class="fa fa-caret-right"></i> Product Received</a></li>
                <li><a href="<?php echo e(route('bstock-list')); ?>"><i class="fa fa-caret-right"></i> Branch Stock</a></li>
                <li><a href="<?php echo e(route('whstock-list')); ?>"><i class="fa fa-caret-right"></i> Warehouse Stock</a></li>
                
                <li><a href="<?php echo e(route('branch-transfer-stock-list')); ?>"><i class="fa fa-caret-right"></i> Transfer From Branch</a></li>
                <li><a href="<?php echo e(route('warehouse-transfer-stock-list')); ?>"><i class="fa fa-caret-right"></i> Transfer From Warehouse</a></li>
                
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'client' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-handshake-o ani_icon"></i> <span>Client Setup</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('customer-list')); ?>"><i class="fa fa-caret-right"></i> Customer List</a></li>
                <li><a href="<?php echo e(route('customer-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Customer</a></li>
                <li><a href="<?php echo e(route('supplier-list')); ?>"><i class="fa fa-caret-right"></i> Supplier List</a></li>
                <li><a href="<?php echo e(route('supplier-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Supplier</a></li>
                <li><a href="<?php echo e(route('group-list')); ?>"><i class="fa fa-caret-right"></i> All Group</a></li>
                <li><a href="<?php echo e(route('group-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Group</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'product' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-shopping-cart ani_icon"></i> <span>Product Setup</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('category-list')); ?>"><i class="fa fa-caret-right"></i> Category List</a></li>
                <li><a href="<?php echo e(route('category-create-route')); ?>"><i class="fa fa-caret-right"></i> Category Create</a></li>
                <li><a href="<?php echo e(route('subcategory-list')); ?>"><i class="fa fa-caret-right"></i> Sub-Category List</a></li>
                <li><a href="<?php echo e(route('subcategory-create-route')); ?>"><i class="fa fa-caret-right"></i> Sub-Category Create</a></li>
                <li><a href="<?php echo e(route('product-list')); ?>"><i class="fa fa-caret-right"></i> Product List</a></li>
                <li><a href="<?php echo e(route('product-create-route')); ?>"><i class="fa fa-caret-right"></i> Add New Product</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'master' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-sun-o ani_icon"></i> <span>Master Setup</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('brand-list')); ?>"><i class="fa fa-caret-right"></i> Brand List</a></li>
                <li><a href="<?php echo e(route('brand-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Brand</a></li>
                <li><a href="<?php echo e(route('manufacture-list')); ?>"><i class="fa fa-caret-right"></i> Manufacturer List</a></li>
                <li><a href="<?php echo e(route('manufacture-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Manufacturer</a></li>
                <li><a href="<?php echo e(route('unit-list')); ?>"><i class="fa fa-caret-right"></i> Unit List</a></li>
                <li><a href="<?php echo e(route('unit-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Unit</a></li>
                <li><a href="<?php echo e(route('currency-list')); ?>"><i class="fa fa-caret-right"></i> Currency List</a></li>
                <li><a href="<?php echo e(route('currency-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Currency</a></li>
                <li><a href="<?php echo e(route('country-list')); ?>"><i class="fa fa-caret-right"></i> Country List</a></li>
                <li><a href="<?php echo e(route('country-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Country</a></li>
                <li><a href="<?php echo e(route('transport-list')); ?>"><i class="fa fa-caret-right"></i> Transporter List</a></li>
                <li><a href="<?php echo e(route('transport-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Transporter</a></li>
                <li><a href="<?php echo e(route('color-list')); ?>"><i class="fa fa-caret-right"></i> Color List</a></li>
                <li><a href="<?php echo e(route('color-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Color</a></li>
                <li><a href="<?php echo e(route('district-list')); ?>"><i class="fa fa-caret-right"></i> District List</a></li>
                <li><a href="<?php echo e(route('district-create-route')); ?>"><i class="fa fa-caret-right"></i>Add District</a></li>
                <li><a href="<?php echo e(route('zone-list')); ?>"><i class="fa fa-caret-right"></i> Zone List</a></li>
                <li><a href="<?php echo e(route('zone-create-route')); ?>"><i class="fa fa-caret-right"></i>Add Zone</a></li>
                </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'account' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-money ani_icon"></i> <span>Accounts Setup</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
               <li><a href="<?php echo e(route('class-list')); ?>"><i class="fa fa-caret-right"></i> Class</a></li>
               <li><a href="<?php echo e(route('acc-group-list')); ?>"><i class="fa fa-caret-right"></i> Group List</a></li>
               <li><a href="<?php echo e(route('acc-group-create-route')); ?>"><i class="fa fa-caret-right"></i> Group Cteate</a></li>
               <li><a href="<?php echo e(route('subgroup-list')); ?>"><i class="fa fa-caret-right"></i> Sub-Group List</a></li>
               <li><a href="<?php echo e(route('subgroup-create-route')); ?>"><i class="fa fa-caret-right"></i> Sub-Group Create</a></li>
               <li><a href="<?php echo e(route('ledger-list')); ?>"><i class="fa fa-caret-right"></i>Ledger List</a></li>
               <li><a href="<?php echo e(route('ledger-create-route')); ?>"><i class="fa fa-caret-right"></i> Ledger Create</a></li>
               <li><a href="<?php echo e(route('paymentvouchar-list')); ?>"><i class="fa fa-caret-right"></i> Payment Voucher List</a></li>
               <li><a href="<?php echo e(route('paymentvouchar-create-route')); ?>"><i class="fa fa-caret-right"></i> Payment Voucher Create</a></li>
               <li><a href="<?php echo e(route('receivevoucher-list')); ?>"><i class="fa fa-caret-right"></i> Receive Voucher List</a></li>
               <li><a href="<?php echo e(route('receivevoucher-create-route')); ?>"><i class="fa fa-caret-right"></i> Receive Voucher Create</a></li>
               <li><a href="<?php echo e(route('journal-list')); ?>"><i class="fa fa-caret-right"></i> Journal Entry List</a></li>
               <li><a href="<?php echo e(route('journallist-create-route')); ?>"><i class="fa fa-caret-right"></i> Journal Entry Create</a></li>
            </ul>
          </li>
          <?php endif; ?>
          
          <li class="treeview">
            <a href="#">
            <i class="fa fa-credit-card ani_icon"></i> <span>LC Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               
               <li><a href="<?php echo e(route('lc-create-pi')); ?>"><i class="fa fa-caret-right"></i>PI Setup</a></li>
               <li><a href="<?php echo e(route('lc-list-pi')); ?>"><i class="fa fa-caret-right"></i>PI List</a></li>
               <li><a href="<?php echo e(route('create-lc-setup')); ?>"><i class="fa fa-caret-right"></i>LC Setup</a></li>
               <li><a href="<?php echo e(route('list-lc-setup')); ?>"><i class="fa fa-caret-right"></i>LC List</a></li>
            </ul>
         </li>
         <?php if(Auth::User()->roles = 'financial' || Auth::User()->status = '007'): ?>
         <li class="treeview">
            <a href="#">
            <i class="fa fa-bar-chart ani_icon"></i> <span>Finance Record</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="<?php echo e(route('finance_chart_of_account')); ?>"><i class="fa fa-caret-right"></i> Chart of Account</a></li>
               <li><a href="<?php echo e(route('finance_profit_and_loss')); ?>"><i class="fa fa-caret-right"></i> Profit And Loss</a></li>
               <li><a href="<?php echo e(route('finance_trial_balance')); ?>"><i class="fa fa-caret-right"></i>Trial Balance </a></li>
               <li><a href="<?php echo e(route('finance_balance_sheet')); ?>"><i class="fa fa-caret-right"></i> Balance Sheet</a></li>
               
            </ul>
         </li>
         <?php endif; ?>
          <?php if(Auth::User()->roles = 'manage_project' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-clock-o ani_icon"></i> <span>Payroll</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('department-list-page')); ?>"><i class="fa fa-caret-right"></i> Department List</a></li>
                <li><a href="<?php echo e(route('department-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Department</a></li>
                <li><a href="<?php echo e(route('designation-list-page')); ?>"><i class="fa fa-caret-right"></i> Designation List</a></li>
                <li><a href="<?php echo e(route('designation-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Designation</a></li>
                <li><a href="<?php echo e(route('employee-list-page')); ?>"><i class="fa fa-caret-right"></i> Employee List </a></li>
                <li><a href="<?php echo e(route('employee-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Employee</a></li>
                <li><a href="<?php echo e(route('leavetype-list-page')); ?>"><i class="fa fa-caret-right"></i> Leave Type</a></li>
                <li><a href="<?php echo e(route('leavetype-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Leave Type</a></li>
                <li><a href="<?php echo e(route('leaveapp-list-page')); ?>"><i class="fa fa-caret-right"></i> Leave Record</a></li>
                <li><a href="<?php echo e(route('leaveapp-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Leave Application</a></li>
                <li><a href="<?php echo e(route('payslip-list-page')); ?>"><i class="fa fa-caret-right"></i> Salary Sheet &amp; Payslip</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'bank'  || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-credit-card-alt ani_icon"></i> <span>Bank</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
               <li><a href="<?php echo e(route('create-bank-list')); ?>"><i class="fa fa-caret-right"></i> Bank List</a></li>
               <li><a href="<?php echo e(route('create-bank-page')); ?>"><i class="fa fa-caret-right"></i> Add Bank</a></li>
               <li><a href="<?php echo e(route('create-bankaccount-list')); ?>"><i class="fa fa-caret-right"></i> Account List</a></li>
               <li><a href="<?php echo e(route('create-bankaccount-page')); ?>"><i class="fa fa-caret-right"></i> Add Account</a></li>
               <li><a href="<?php echo e(route('mobileaccount-list')); ?>"><i class="fa fa-caret-right"></i> Mobile Account</a></li>
               <li><a href="<?php echo e(route('create-mobileaccount-page')); ?>"><i class="fa fa-caret-right"></i> Add Account</a></li>
               <li><a href="<?php echo e(route('banktransaction-list')); ?>"><i class="fa fa-caret-right"></i> All Transaction</a></li>
               <li><a href="<?php echo e(route('banktransaction-create-route')); ?>"><i class="fa fa-caret-right"></i> Add Transaction</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-user ani_icon"></i> <span>Personal</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-caret-right"></i> Personal Note</a></li>
                <li><a href="#"><i class="fa fa-caret-right"></i> Todo</a></li>
                <!--<li><a href="lon_installm.php" ><i class="fa fa-caret-right"></i> </a></li>-->
             </ul>
          </li>
          <?php if(Auth::User()->roles = 'report' || Auth::User()->status = '007'): ?>
          <li> <a href="axe_report.php"><i class="fa fa-pie-chart ani_icon"></i> <span>Report</span></a></li>
          <?php endif; ?>
          <?php if(Auth::User()->roles = 'user_role' || Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-address-card-o ani_icon"></i> <span>User &amp; Role</span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('role-list-page')); ?>"><i class="fa fa-caret-right"></i> Role List</a></li>
                <li><a href="<?php echo e(route('role-create-page')); ?>"><i class="fa fa-caret-right"></i> Add Role</a></li>
                <li><a href="<?php echo e(route('user-list-page')); ?>"><i class="fa fa-caret-right"></i> All User</a></li>
                <li><a href="<?php echo e(route('user-create-page')); ?>"><i class="fa fa-caret-right"></i> Add User</a></li>
             </ul>
          </li>
          <?php endif; ?>
          <?php if(Auth::User()->status = '007'): ?>
          <li class="treeview">
             <a href="#">
             <i class="fa fa-industry ani_icon"></i> <span>Company &amp; Setting </span>
             <span class="pull-right-container">
             <i class="fa fa-angle-left pull-right"></i>
             </span>
             </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo e(route('company-create-setup')); ?>"><i class="fa fa-caret-right"></i> Company Setup</a></li>
                <li><a href="<?php echo e(route('local-create-setup')); ?>"><i class="fa fa-caret-right"></i> Local Setting</a></li>
             </ul>
          </li>
          <?php endif; ?>
       </ul>
    </section>
 </aside>
<?php /**PATH /var/www/html/Version-15-Final/version_15_final/resources/views/layouts/admin/aside.blade.php ENDPATH**/ ?>