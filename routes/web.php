<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


//------------Master Setup
// Route::get('/brandlist', function () {
//     return view('main.admin.master.brandlist');
// });
// Route::get('/brandcreate', function () {
//     return view('main.admin.master.brandcreate');
// });
// Route::get('/brandedit', function () {
//     return view('main.admin.master.brandedit');
// });

// Route::get('/manufacturerlist', function () {
//     return view('main.admin.master.manufacturerlist');
// });
// Route::get('/manufacturercreate', function () {
//     return view('main.admin.master.manufacturercreate');
// });
// Route::get('/manufactureredit', function () {
//     return view('main.admin.master.manufactureredit');
// });

// Route::get('/unitlist', function () {
//     return view('main.admin.master.unitlist');
// });
// Route::get('/unitcreate', function () {
//     return view('main.admin.master.unitcreate');
// });
// Route::get('/unitedit', function () {
//     return view('main.admin.master.unitedit');
// });

// Route::get('/currencylist', function () {
//     return view('main.admin.master.currencylist');
// });
// Route::get('/createpurchase', function () {
//     return view('main.admin.new.purchase_create');
// });
// Route::get('/checkoutpurchase', function () {
//     return view('main.admin.new.purchase_checkout');
// });
// Route::get('/editpurchase', function () {
//     return view('main.admin.new.purchase_edit');
// });
// Route::get('/listpurchase', function () {
//     return view('main.admin.new.purchase_list');
// });
// Route::get('/currencyedit', function () {
//     return view('main.admin.master.currencyedit');
// });

// Route::get('/countrylist', function () {
//     return view('main.admin.master.countrylist');
// });
// Route::get('/countrycreate', function () {
//     return view('main.admin.master.countrycreate');
// });
// Route::get('/countryedit', function () {
//     return view('main.admin.master.countryedit');
// });

// Route::get('/transporterlist', function () {
//     return view('main.admin.master.transporterlist');
// });
// Route::get('/transportercreate', function () {
//     return view('main.admin.master.transportercreate');
// });
// Route::get('/transporteredit', function () {
//     return view('main.admin.master.transporteredit');
// });

// Route::get('/colorlist', function () {
//     return view('main.admin.master.colorlist');
// });
// Route::get('/colorcreate', function () {
//     return view('main.admin.master.colorcreate');
// });
// Route::get('/coloredit', function () {
//     return view('main.admin.master.coloredit');
// });


// Route::get('/districtlist', function () {
//     return view('main.admin.master.districtlist');
// });
// Route::get('/districtcreate', function () {
//     return view('main.admin.master.districtcreate');
// });
// Route::get('/districtedit', function () {
//     return view('main.admin.master.districtedit');
// });

// Route::get('/zonelist', function () {
//     return view('main.admin.master.zonelist');
// });
// Route::get('/zonecreate', function () {
//     return view('main.admin.master.zonecreate');
// });
// Route::get('/zoneedit', function () {
//     return view('main.admin.master.zoneedit');
// });

// Route::post('/logout','HomeController@logout')->name('logout_user');
//..............................Mastering.......................

//..............................Brand...........................
Route::get('/brandlist','Master\BrandController@index')->name('brand-list');
Route::get('/brand_create','Master\BrandController@create')->name('brand-create-route');
Route::post('/brand_store','Master\BrandController@store')->name('brand-store-route');
Route::get('/brand_edit/{id}','Master\BrandController@edit')->name('brand-edit-route');
Route::patch('/brand_update/{id}','Master\BrandController@update')->name('brand-update-route');
Route::get('/brand_destroy/{id}','Master\BrandController@destroy')->name('brand-destroy-route');

//..........................Manufacturing........................................
Route::get('/manufacturelist','Master\ManufactureController@index')->name('manufacture-list');
Route::get('/manufacture_create','Master\ManufactureController@create')->name('manufacture-create-route');
Route::post('/manufacture_store','Master\ManufactureController@store')->name('manufacture-store-route');
Route::get('/manufacture_edit/{id}','Master\ManufactureController@edit')->name('manufacture-edit-route');
Route::patch('/manufacture_update/{id}','Master\ManufactureController@update')->name('manufacture-update-route');
Route::get('/manufacture_destroy/{id}','Master\ManufactureController@destroy')->name('manufacture-destroy-route');

//...............................Unit..............................................................
Route::get('/unitlist','Master\UnitController@index')->name('unit-list');
Route::get('/unit_create','Master\UnitController@create')->name('unit-create-route');
Route::post('/unit_store','Master\UnitController@store')->name('unit-store-route');
Route::get('/unit_destroy/{id}','Master\UnitController@destroy')->name('unit-destroy-route');
Route::get('/unit_edit/{id}','Master\UnitController@edit')->name('unit-edit-route');
Route::patch('/unit_update/{id}','Master\UnitController@update')->name('unit-update-route');

//....................................Country.........................................
Route::get('/country_list','Master\CountryController@index')->name('country-list');
Route::get('/country_create','Master\CountryController@create')->name('country-create-route');
Route::post('/country_store','Master\CountryController@store')->name('country-store-route');
Route::get('/country_destroy/{id}','Master\CountryController@destroy')->name('country-destroy-route');
Route::get('/country_edit/{id}','Master\CountryController@edit')->name('country-edit-route');
Route::patch('/country_update/{id}','Master\CountryController@update')->name('country-update-route');

//....................................Transport...................................................
Route::get('/transportlist','Master\TransportController@index')->name('transport-list');
Route::get('/transport_create','Master\TransportController@create')->name('transport-create-route');
Route::post('/transport_store','Master\TransportController@store')->name('transport-store-route');
Route::get('/transport_destroy/{id}','Master\TransportController@destroy')->name('transport-destroy-route');
Route::get('/transport_edit/{id}','Master\TransportController@edit')->name('transport-edit-route');
Route::patch('/transport_update/{id}','Master\TransportController@update')->name('transport-update-route');

//......................................Color..............................................
Route::get('/colorlist','Master\ColorController@index')->name('color-list');
Route::get('/color_create','Master\ColorController@create')->name('color-create-route');
Route::post('/color_store','Master\ColorController@store')->name('color-store-route');
Route::get('/color_destroy/{id}','Master\ColorController@destroy')->name('color-destroy-route');
Route::get('/color_edit/{id}','Master\ColorController@edit')->name('color-edit-route');
Route::patch('/color_update/{id}','Master\ColorController@update')->name('color-update-route');

//......................................District..............................................
Route::get('/districtlist','Master\DistrictController@index')->name('district-list');
Route::get('/district_create','Master\DistrictController@create')->name('district-create-route');
Route::post('/district_store','Master\DistrictController@store')->name('district-store-route');
Route::get('/district_destroy/{id}','Master\DistrictController@destroy')->name('district-destroy-route');
Route::get('/district_edit/{id}','Master\DistrictController@edit')->name('district-edit-route');
Route::patch('/district_update/{id}','Master\DistrictController@update')->name('district-update-route');

//......................................Zone..............................................
Route::get('/zonelist','Master\ZoneController@index')->name('zone-list');
Route::get('/zone_create','Master\ZoneController@create')->name('zone-create-route');
Route::post('/zone_store','Master\ZoneController@store')->name('zone-store-route');
Route::get('/zone_destroy/{id}','Master\ZoneController@destroy')->name('zone-destroy-route');
Route::get('/zone_edit/{id}','Master\ZoneController@edit')->name('zone-edit-route');
Route::patch('/zone_update/{id}','Master\ZoneController@update')->name('zone-update-route');

//......................................Currency..............................................
Route::get('/currencylist','Master\CurrencyController@index')->name('currency-list');
Route::get('/currency_create','Master\CurrencyController@create')->name('currency-create-route');
Route::post('/currency_store','Master\CurrencyController@store')->name('currency-store-route');
Route::get('/currency_destroy/{id}','Master\CurrencyController@destroy')->name('currency-destroy-route');
Route::get('/currency_edit/{id}','Master\CurrencyController@edit')->name('currency-edit-route');
Route::patch('/currency_update/{id}','Master\CurrencyController@update')->name('currency-update-route');




//--------accounts-------------------

Route::get('/class','Accounts\ClassController@index')->name('class-list');

//...........................Group..............................
Route::get('/acc_grouplist','Accounts\GroupController@index')->name('acc-group-list');
Route::get('/acc_grouplist/create','Accounts\GroupController@create')->name('acc-group-create-route');
Route::post('/acc_grouplist/store','Accounts\GroupController@store')->name('acc-group-store-route');
Route::get('/acc_grouplist/edit/{id}','Accounts\GroupController@edit')->name('acc-group-edit-route');
Route::patch('/acc_grouplist/update/{id}','Accounts\GroupController@update')->name('acc-group-update-route');
Route::get('/acc_grouplist/destroy/{id}','Accounts\GroupController@destroy')->name('acc-group-destroy-route');

//...........................SubGroup..............................
Route::get('/subgrouplist','Accounts\SubGroupController@index')->name('subgroup-list');
Route::get('/subgrouplist/create','Accounts\SubGroupController@create')->name('subgroup-create-route');
Route::post('/subgrouplist/store','Accounts\SubGroupController@store')->name('subgroup-store-route');
Route::get('/subgrouplist/edit/{id}','Accounts\SubGroupController@edit')->name('subgroup-edit-route');
Route::patch('/subgrouplist/update/{id}','Accounts\SubGroupController@update')->name('subgroup-update-route');
Route::get('/subgrouplist/destroy/{id}','Accounts\SubGroupController@destroy')->name('subgroup-destroy-route');


//...........................Ledger..............................
Route::get('/ledgerlist','Accounts\LedgerController@index')->name('ledger-list');
Route::get('/ledgerlist/create','Accounts\LedgerController@create')->name('ledger-create-route');
Route::post('/ledgerlist/store','Accounts\LedgerController@store')->name('ledger-store-route');
Route::get('/ledgerlist/edit/{id}','Accounts\LedgerController@edit')->name('ledger-edit-route');
Route::patch('/ledgerlist/update/{id}','Accounts\LedgerController@update')->name('ledger-update-route');
Route::get('/ledgerlist/destroy/{id}','Accounts\LedgerController@destroy')->name('ledger-destroy-route');

//...................................Payment Vouchar...................................................
Route::get('/paymentvoucharlist','Accounts\PaymentVoucharController@index')->name('paymentvouchar-list');
Route::get('/paymentvoucharlist/create','Accounts\PaymentVoucharController@create')->name('paymentvouchar-create-route');
Route::get('/get-supplier-invoice/{supplier_id}','Accounts\PaymentVoucharController@getSupplierInvoice')->name('get-supplier-invoice-route');
Route::get('paymentvoucherlist/destroy/{id}','Accounts\PaymentVoucharController@destroy')->name('paymentvoucher-destroy-route');
Route::post('/paymentlist/store','Accounts\PaymentVoucharController@store')->name('paymentlist-store-route');

Route::get('paymentvoucherlist/view/{id}','Accounts\PaymentVoucharController@view')->name('paymentvoucher-view-route');


//......................................Receive Voucher..........................................................
Route::get('/receivevoucherlist','Accounts\ReceiveVoucharController@index')->name('receivevoucher-list');
Route::get('/receivevoucherlist/create','Accounts\ReceiveVoucharController@create')->name('receivevoucher-create-route');
Route::get('/get-supplier-rcv-invoice/{supplier_id}','Accounts\ReceiveVoucharController@getSupplierInvoice')->name('get-rcv-supplier-invoice-route');
Route::get('receivevoucherlist/destroy/{id}','Accounts\ReceiveVoucharController@destroy')->name('receivevoucher-destroy-route');
Route::post('/receivelist/store','Accounts\ReceiveVoucharController@store')->name('receivelist-store-route');

Route::get('receivevoucherlist/view/{id}','Accounts\ReceiveVoucharController@view')->name('receivevoucher-view-route');

//......................................journal......................................................................
Route::get('/journallist','Accounts\JournalController@index')->name('journal-list');
Route::get('/journallist/create','Accounts\JournalController@create')->name('journallist-create-route');
Route::post('/journallist/store','Accounts\JournalController@store')->name('journallist-store-route');
// Route::post('/ledgerlist/store','Accounts\LedgerController@store')->name('ledger-store-route');
// Route::get('/ledgerlist/edit/{id}','Accounts\LedgerController@edit')->name('ledger-edit-route');
// Route::patch('/ledgerlist/update/{id}','Accounts\LedgerController@update')->name('ledger-update-route');
// Route::get('/ledgerlist/destroy/{id}','Accounts\LedgerController@destroy')->name('ledger-destroy-route');
//...................................Product Setup...................................................

//...................................Product Setup...................................................

//............................Category...........................................................
Route::get('/categorylist','Product\CategoryController@index')->name('category-list');
Route::get('/categorylist/create','Product\CategoryController@create')->name('category-create-route');
Route::post('/categorylist/store','Product\CategoryController@store')->name('category-store-route');
Route::get('/categorylist/edit/{id}','Product\CategoryController@edit')->name('category-edit-route');
Route::patch('/categorylist/update/{id}','Product\CategoryController@update')->name('category-update-route');
Route::get('/categorylist/destroy/{id}','Product\CategoryController@destroy')->name('category-destroy-route');

//......................................SubCategory...............................................
Route::get('/subcategorylist','Product\SubCategoryController@index')->name('subcategory-list');
Route::get('/subcategorylist/create','Product\SubCategoryController@create')->name('subcategory-create-route');
Route::post('/subcategorylist/store','Product\SubCategoryController@store')->name('subcategory-store-route');
Route::get('/subcategorylist/edit/{id}','Product\SubCategoryController@edit')->name('subcategory-edit-route');
Route::patch('/subcategorylist/update/{id}','Product\SubCategoryController@update')->name('subcategory-update-route');
Route::get('/subcategorylist/destroy/{id}','Product\SubCategoryController@destroy')->name('subcategory-destroy-route');

//......................................Product...............................................
Route::get('/productlist','Product\ProductController@index')->name('product-list');
Route::get('/productlist/create','Product\ProductController@create')->name('product-create-route');
Route::post('/productlist/store','Product\ProductController@store')->name('product-store-route');
Route::get('/productlist/edit/{id}','Product\ProductController@edit')->name('product-edit-route');
Route::patch('/productlist/update/{id}','Product\ProductController@update')->name('product-update-route');
Route::get('/productlist/destroy/{id}','Product\ProductController@destroy')->name('product-destroy-route');

//......................................Clint Setup...............................................
//................................Customer.......................................................
Route::get('/clintlist','Client\CustomerController@index')->name('customer-list');
Route::get('/clintlist/create','Client\CustomerController@create')->name('customer-create-route');
Route::post('/clienttlist/store','Client\CustomerController@store')->name('customer-store-route');
Route::get('/clienttlist/edit/{id}','Client\CustomerController@edit')->name('customer-edit-route');
Route::patch('/clienttlist/update/{id}','Client\CustomerController@update')->name('customer-update-route');
Route::get('/clienttlist/destroy/{id}','Client\CustomerController@destroy')->name('customer-destroy-route');

//.....................................Supplier..........................................
Route::get('/supplierlist','Client\SupplierController@index')->name('supplier-list');
Route::get('/supplierlist/create','Client\SupplierController@create')->name('supplier-create-route');
Route::post('/supplierlist/store','Client\SupplierController@store')->name('supplier-store-route');
Route::get('/supplierlist/edit/{id}','Client\SupplierController@edit')->name('supplier-edit-route');
Route::patch('/supplierlist/update/{id}','Client\SupplierController@update')->name('supplier-update-route');
Route::get('/supplierlist/destroy/{id}','Client\SupplierController@destroy')->name('supplier-destroy-route');

//.....................................Group..........................................
Route::get('/grouplist','Client\GroupController@index')->name('group-list');
Route::get('/grouplist/create','Client\GroupController@create')->name('group-create-route');
Route::post('/grouplist/store','Client\GroupController@store')->name('group-store-route');
Route::get('/grouplist/edit/{id}','Client\GroupController@edit')->name('group-edit-route');
Route::patch('/grouplist/update/{id}','Client\GroupController@update')->name('group-update-route');
Route::get('/grouplist/destroy/{id}','Client\GroupController@destroy')->name('group-destroy-route');

//....................................Inventory..........................................

//..........................................Branch..........................................
Route::get('/branchlist','Inventory\BranchController@index')->name('branch-list');
Route::get('/branchlist/create','Inventory\BranchController@create')->name('branch-create-route');
Route::post('/branchlist/store','Inventory\BranchController@store')->name('branch-store-route');
Route::get('/branchlist/edit/{id}','Inventory\BranchController@edit')->name('branch-edit-route');
Route::patch('/branchlist/update/{id}','Inventory\BranchController@update')->name('branch-update-route');
Route::get('/branchlist/destroy/{id}','Inventory\BranchController@destroy')->name('branch-destroy-route');

//..........................................Branch Stock..........................................
Route::get('/branchstock/list','Inventory\Transfer_B_Controller@index')->name('branch-transfer-stock-list');
Route::get('/branchstock/create','Inventory\Transfer_B_Controller@create')->name('branch-transfer-stock-create');
Route::get('/branchstock/productfind/{branch_id_from}','Inventory\Transfer_B_Controller@find_product')->name('find_product_for_transfer_branch');
Route::post('/branchstock/store','Inventory\Transfer_B_Controller@store')->name('branch-transfer-stock-store');

//....................................Warehouse..........................................
Route::get('/warehouselist','Inventory\WarehouseController@index')->name('warehouse-list');
Route::get('/warehouselist/create','Inventory\WarehouseController@create')->name('warehouse-create-route');
Route::post('/warehouselist/store','Inventory\WarehouseController@store')->name('warehouse-store-route');
Route::get('/warehouselist/edit/{id}','Inventory\WarehouseController@edit')->name('warehouse-edit-route');
Route::patch('/warehouselist/update/{id}','Inventory\WarehouseController@update')->name('warehouse-update-route');
Route::get('/warehouselist/destroy/{id}','Inventory\WarehouseController@destroy')->name('warehouse-destroy-route');

//..........................................Warehouse Stock..........................................
Route::get('/warehousestock/list','Inventory\Transfer_WH_Controller@index')->name('warehouse-transfer-stock-list');
Route::get('/warehousestock/create','Inventory\Transfer_WH_Controller@create')->name('warehouse-transfer-stock-create');
Route::get('/warehousestock/productfind/{warehouse_id_from}','Inventory\Transfer_WH_Controller@find_product')->name('find_product_for_transfer_warehouse');
Route::post('/warehousestock/store','Inventory\Transfer_WH_Controller@store')->name('warehouse-transfer-stock-store');


//....................................Product  Receive..........................................
Route::get('/product/delivery_list','Inventory\ProDeliveryController@index')->name('prodelivery-list');
Route::get('/product/delivery_list/create','Inventory\ProDeliveryController@create')->name('prodelivery-create-route');
Route::get('/product/receive_list','Inventory\ProReceiveController@index')->name('proreceive-list');
Route::get('/product/receive','Inventory\ProReceiveController@create')->name('proreceive-create-route');
Route::post('/product/receive/store','Inventory\ProReceiveController@receipt_store')->name('product-receive-store');
Route::post('/product/stock/store','Inventory\ProReceiveController@stock_store')->name('product-stock-store');
Route::get('/product/receive_view/{id}','Inventory\ProReceiveController@show')->name('proreceive-view');
Route::get('/product/destroy/{id}','Inventory\ProReceiveController@destroy')->name('proreceive-destroy');
// Route::post('/branchlist/store','Inventory\BranchController@store')->name('branch-store-route');
// Route::get('/branchlist/edit/{id}','Inventory\BranchController@edit')->name('branch-edit-route');
// Route::patch('/branchlist/update/{id}','Inventory\BranchController@update')->name('branch-update-route');
// Route::get('/branchlist/destroy/{id}','Inventory\BranchController@destroy')->name('branch-destroy-route');




//....................................Product  Delivery..........................................
Route::get('/product/delivery_list','Inventory\ProDeliveryController@index')->name('prodelivery-list');
Route::get('/product/delivery','Inventory\ProDeliveryController@create')->name('prodelivery-create-route');
Route::post('/product/delivery/store','Inventory\ProDeliveryController@delivery_store')->name('product-delivery-store');
Route::post('/product/deliverystock/store','Inventory\ProDeliveryController@stock_store')->name('prodelivery-stock-store');
Route::get('/product/delivery_view/{id}','Inventory\ProDeliveryController@show')->name('prodelivery-view');
Route::get('/product/destroy/{id}','Inventory\ProDeliveryController@destroy')->name('prodelivery-destroy');

//....................................Stock..........................................
Route::get('/branchstocklist','Inventory\B_StockController@index')->name('bstock-list');
Route::get('/warehousestocklist','Inventory\WH_StockController@index')->name('whstock-list');
Route::get('/combinedstocklist','Inventory\Combined_StockController@index')->name('combinedstock-list');
// Route::get('/prodeliverylist/create','Inventory\ProDeliveryController@create')->name('prodelivery-create-route');
// Route::get('/proreceivelist','Inventory\ProReceiveController@index')->name('proreceive-list');
// Route::get('/proreceivelist/create','Inventory\ProReceiveController@create')->name('proreceive-create-route');
// Route::post('/branchlist/store','Inventory\BranchController@store')->name('branch-store-route');
// Route::get('/branchlist/edit/{id}','Inventory\BranchController@edit')->name('branch-edit-route');
// Route::patch('/branchlist/update/{id}','Inventory\BranchController@update')->name('branch-update-route');
// Route::get('/branchlist/destroy/{id}','Inventory\BranchController@destroy')->name('branch-destroy-route');


//....................................Payroll..........................................
//....................................Department Management..........................................
Route::get('/payroll/department','Department\DepartmentController@department_index')->name('department-list-page');
Route::get('/payroll/department/create','Department\DepartmentController@create_page')->name('department-create-page');
Route::post('/payroll/department/store','Department\DepartmentController@dept_store')->name('department-store-page');
Route::get('/payroll/department/edit/{id}','Department\DepartmentController@edit_page')->name('department-edit-page');
Route::post('/payroll/departmentupdate/{id}','Department\DepartmentController@update_store')->name('department-update-page');
Route::get('/payroll/department/delete/{id}','Department\DepartmentController@department_destroy')->name('department-delete-page');

//....................................Designation Management..........................................
Route::get('/payroll/designation','Designation\DesignationController@designation_index')->name('designation-list-page');
Route::get('/payroll/designation/create','designation\designationController@create_page')->name('designation-create-page');
Route::post('/payroll/designation/store','designation\designationController@dept_store')->name('designation-store-page');
Route::get('/payroll/designation/edit/{id}','designation\designationController@edit_page')->name('designation-edit-page');
Route::post('/payroll/designationupdate/{id}','designation\designationController@update_store')->name('designation-update-page');
Route::get('/payroll/designation/delete/{id}','designation\designationController@designation_destroy')->name('designation-delete-page');
//....................................Employee Management..........................................
Route::get('/payroll/employee','Employee\EmployeeController@employee_index')->name('employee-list-page');
Route::get('/payroll/employee/create','Employee\EmployeeController@create_page')->name('employee-create-page');
Route::post('/payroll/employee/store','Employee\EmployeeController@employee_store')->name('employee-store-page');
Route::get('/payroll/employee/edit/{id}','Employee\EmployeeController@edit_page')->name('employee-edit-page');
Route::post('/payroll/employee/update/{id}','Employee\EmployeeController@update_store')->name('employee-update-page');
Route::get('/payroll/employee/delete/{id}','Employee\EmployeeController@employee_destroy')->name('employee-delete-page');
//....................................Leave Type Management..........................................
Route::get('/payroll/leavetype','Payroll\LeaveController@leavetype_index')->name('leavetype-list-page');
Route::get('/payroll/leavetype/create','Payroll\LeaveController@leavetype_create')->name('leavetype-create-page');
Route::post('/payroll/leavetype/store','Payroll\LeaveController@leavetype_store')->name('leavetype-store-page');
Route::get('/payroll/leavetype/edit/{id}','Payroll\LeaveController@leavetype_edit')->name('leavetype-edit-page');
Route::post('/payroll/leavetype/update/{id}','Payroll\LeaveController@leavetype_update')->name('leavetype-update-page');
Route::get('/payroll/leavetype/delete/{id}','Payroll\LeaveController@leavetype_destroy')->name('leavetype-delete-page');

//....................................Leave Type Management..........................................
Route::get('/payroll/leaveapp','Payroll\LeaveController@leaveapp_index')->name('leaveapp-list-page');
Route::get('/payroll/leaveapp/create','Payroll\LeaveController@leaveapp_create')->name('leaveapp-create-page');
Route::post('/payroll/leaveapp/store','Payroll\LeaveController@leaveapp_store')->name('leaveapp-store-page');
Route::get('/payroll/leaveapp/edit/{id}','Payroll\LeaveController@leaveapp_edit')->name('leaveapp-edit-page');
Route::post('/payroll/leaveapp/update/{id}','Payroll\LeaveController@leaveapp_update')->name('leaveapp-update-page');
Route::get('/payroll/leaveapp/delete/{id}','Payroll\LeaveController@leaveapp_destroy')->name('leaveapp-delete-page');
Route::get('/payroll/payslip','Payroll\LeaveController@payslip_index')->name('payslip-list-page');

//....................................Purchase Management.........................................
Route::get('/purchase/list','Purchase\PurchaseController@purchase_index')->name('purchase-list-page');
Route::get('/purchase/create','Purchase\PurchaseController@purchase_create')->name('purchase-create-page');
Route::post('/cart/create','Purchase\PurchaseController@add_to_cart')->name('add-to-cart');
Route::post('/cart/addcart','Purchase\PurchaseController@update_to_cart')->name('update-to-cart');
Route::get('/cart/list','Purchase\PurchaseController@view_cart')->name('view_cart_list');
Route::get('/cart/delete/{id}','Purchase\PurchaseController@delete_cart')->name('delete_cart_list');
Route::get('/cart/edit/{id}','Purchase\PurchaseController@edit_cart')->name('edit-to-cart');

Route::get('/checkout/','Purchase\PurchaseController@checkout_page')->name('view_checkout_page');
Route::post('/purchase/store','Purchase\PurchaseController@purchase_store')->name('purchase-store-page');
Route::get('/purchase/edit/{id}','Purchase\PurchaseController@purchase_edit')->name('purchase-edit-page');
Route::post('/purchase/update/{id}','Purchase\PurchaseController@purchase_update')->name('purchase-update-page');
Route::get('/purchase/delete/{id}','Purchase\PurchaseController@purchase_destroy')->name('purchase-delete-page');
Route::get('/purchese/show/{id}','Purchase\PurchaseController@show')->name('purchese-view-page');





//....................................Sales Management.........................................
Route::get('/sales/list','Sales\salesController@sales_index')->name('sales-list-page');
Route::get('/sales/create','Sales\salesController@sales_create')->name('sales-create-page');
Route::post('/sales_cart/create','Sales\salesController@add_to_sales_cart')->name('add-to-sales-cart');
Route::post('/sales_cart/addcart','Sales\salesController@update_to_sales_cart')->name('update-to-sales-cart');
Route::get('/sales_cart/list','Sales\salesController@view_sales_cart')->name('view_sales_cart_list');
Route::get('/sales_cart/delete/{id}','Sales\salesController@delete_sales_cart')->name('delete_sales_cart_list');
Route::get('/sales_cart/edit/{id}','Sales\salesController@edit_sales_cart')->name('edit-to-sales-cart');

Route::get('/sales_checkout','Sales\salesController@sales_checkout_page')->name('view_sales_checkout_page');
Route::post('/sales/store','Sales\salesController@sales_store')->name('sales-store-page');
Route::get('/sales/edit/{id}','Sales\salesController@sales_edit')->name('sales-edit-page');
Route::post('/sales/update/{id}','Sales\salesController@sales_update')->name('sales-update-page');
Route::get('/sales/delete/{id}','Sales\salesController@sales_destroy')->name('sales-delete-page');
Route::get('/sales/show/{id}','Sales\salesController@show')->name('sales-view-page');


//....................................Material Use Management.........................................
Route::get('/materialuse/create','Materialrecord\MaterialUseRecordController@record_create')->name('materialuse-create-page');
Route::post('/materialuse/cart','Materialrecord\MaterialUseRecordController@record_cart_create')->name('add-to-record-cart');
Route::post('/materialuse/addcart','Materialrecord\MaterialUseRecordController@store_to_cart')->name('store-to-cart');
Route::get('/materialuse/cart/list','Materialrecord\MaterialUseRecordController@cart_list')->name('view_material-cart_list');
Route::get('/materialuse/checkout/','Materialrecord\MaterialUseRecordController@checkout_page')->name('materialuse-checkout-page');
Route::post('/materialuse/record/store','Materialrecord\MaterialUseRecordController@record_store')->name('record-store-update');
Route::get('/purchase/list','Purchase\PurchaseController@purchase_index')->name('purchase-list-page');

// Route::get('/checkout/','Purchase\PurchaseController@checkout_page')->name('view_checkout_page');
// Route::post('/purchase/store','Purchase\PurchaseController@purchase_store')->name('purchase-store-page');
// Route::get('/purchase/edit/{id}','Purchase\PurchaseController@purchase_edit')->name('purchase-edit-page');
// Route::post('/purchase/update/{id}','Purchase\PurchaseController@purchase_update')->name('purchase-update-page');
// Route::get('/purchase/delete/{id}','Purchase\PurchaseController@purchase_destroy')->name('purchase-delete-page');
// Route::get('/purchese/show/{id}','Purchase\PurchaseController@show')->name('purchese-view-page');


//....................................Role Management..........................................
Route::get('/role/list','Role\RoleController@role_index')->name('role-list-page');
Route::get('/role/create','Role\RoleController@role_create')->name('role-create-page');
Route::post('/role/store','Role\RoleController@role_store')->name('role-store-page');
Route::get('/role/edit/{id}','Role\RoleController@role_edit')->name('role-edit-page');
Route::post('/role/update/{id}','Role\RoleController@role_update')->name('role-update-page');
Route::get('/role/delete/{id}','Role\RoleController@role_destroy')->name('role-delete-page');
//....................................User Management..........................................
Route::get('/user/list','Role\UserController@user_index')->name('user-list-page');
Route::get('/user/create','Role\UserController@user_create')->name('user-create-page');
Route::post('/user/store','Role\UserController@user_store')->name('user-store-page');
Route::get('/user/edit/{id}','Role\UserController@user_edit')->name('user-edit-page');
Route::post('/user/update/{id}','Role\UserController@user_update')->name('user-update-page');
Route::get('/user/delete/{id}','Role\UserController@user_destroy')->name('user-delete-page');





///////////////////////////////////-----------BANK PART-------------//////////////////////////


//.................................Bank setup Management Section.....................................
Route::get('/create_bank', 'Bank\bankController@create_bank')->name('create-bank-page');
Route::post('/store_bank', 'Bank\bankController@store_bank')->name('create-bank-store');
Route::get('/bank_list', 'Bank\bankController@list_bank')->name('create-bank-list');
Route::get('/bank_edit/{id}', 'Bank\bankController@bank_edit')->name('edit-bank-page');
Route::post('/bank_update/{id}', 'Bank\bankController@update_bank')->name('edit-bank-update');
Route::get('/bank_delete/{id}', 'Bank\bankController@bank_destroy')->name('delete-bank');
//.................................Bank Account setup Management Section.....................................
Route::get('/create_bankaccount', 'Bank\bankaccountController@create_bankaccount')->name('create-bankaccount-page');
Route::post('/store_bankaccount', 'Bank\bankaccountController@store_bankaccount')->name('bankaccount_create_store');
Route::get('/create_listbankaccount', 'Bank\bankaccountController@list_bankaccount')->name('create-bankaccount-list');
Route::get('/bankaccount_edit/{id}', 'Bank\bankaccountController@bankaccount_edit')->name('edit-bankaccount-page');
Route::post('/bankaccount_update/{id}', 'Bank\bankaccountController@update_bankaccount')->name('edit-bankaccount-update');
Route::get('/bankaccount_delete/{id}', 'Bank\bankaccountController@bankaccount_destroy')->name('delete-bankaccount-page');

//.................................Mobile Acount setup Management Section.....................................
Route::get('/create_mobileaccount', 'Bank\mobileaccountController@create_mobileaccount')->name('create-mobileaccount-page');
Route::post('/store/mobileaccount', 'Bank\mobileaccountController@store_mobileaccount')->name('create-mobileaccount-store');
Route::get('/mobileaccount_list', 'Bank\mobileaccountController@list_maccount')->name('mobileaccount-list');
Route::get('/mobileaccount_edit/{id}', 'Bank\mobileaccountController@mobileaccount_edit')->name('edit-mobileaccount-page');
Route::post('/mobileaccount_update/{id}', 'Bank\mobileaccountController@update_mobileaccount')->name('edit-mobileaccount-update');
Route::get('/mobileaccount_delete/{id}', 'Bank\mobileaccountController@mobileaccount_destroy')->name('delete-mobileaccount');

//......................................Bank Transactions..........................................................
Route::get('/banktransactionlist','Bank\banktransactionController@index')->name('banktransaction-list');
Route::get('/banktransactionlist/create','Bank\banktransactionController@create')->name('banktransaction-create-route');
Route::get('/get-supplier-bnk-invoice/{supplier_id}','Bank\banktransactionController@getSupplierInvoice')->name('get-bnk-supplier-invoice-route');
Route::get('banktransactionlist/destroy/{id}','Bank\banktransactionController@destroy')->name('banktransaction-destroy-route');
Route::post('/banktransactionlist/store','Bank\banktransactionController@store')->name('banktransactionlist-store-route');


Route::get('banktransactionlist/view/{id}','Bank\banktransactionController@view')->name('banktransactionlist-view-route');

/////////////////////////-----------Manage Project-----------------//////////////////////

///.................................Project Group--------------/////

Route::get('/progroup_create', 'Project\progroupController@create_progroup')->name('progroup-page-create');
Route::post('/store/progroup', 'Project\progroupController@store_progroup')->name('progroup-store-create');
Route::get('/progroup_list', 'Project\progroupController@list_progroup')->name('progroup-list-create');
Route::get('/progroup_edit/{id}', 'Project\progroupController@progroup_edit')->name('progroup-page-edit');
Route::post('/progroup_update/{id}', 'Project\progroupController@update_progroup')->name('edit-progroup-update');
Route::get('/progroup_delete/{id}', 'Project\progroupController@progroup_destroy')->name('delete-progroup');

///.................................Project Group--------------/////

Route::get('/prosubgroup_create', 'Project\prosubgroupController@create_prosubgroup')->name('prosubgroup-page-create');
Route::post('/store/prosubgroup', 'Project\prosubgroupController@store_prosubgroup')->name('prosubgroup-store-create');
Route::get('/prosubgroup_list', 'Project\prosubgroupController@list_prosubgroup')->name('prosubgroup-list-create');
Route::get('/prosubgroup_edit/{id}', 'Project\prosubgroupController@prosubgroup_edit')->name('prosubgroup-page-edit');
Route::post('/prosubgroup_update/{id}', 'Project\prosubgroupController@update_prosubgroup')->name('edit-prosubgroup-update');
Route::get('/prosubgroup_delete/{id}', 'Project\prosubgroupController@prosubgroup_destroy')->name('delete-prosubgroup');

///.................................Project Type--------------/////

Route::get('/project/type/create', 'Project\protypeController@create_project_type')->name('project-type-create-page');
Route::post('/project/type/store', 'Project\protypeController@store_project_type')->name('project-type-store-page');
Route::get('/project/type', 'Project\protypeController@list_project_type')->name('project-type-list-page');
Route::get('/project/type/edit/{id}', 'Project\protypeController@project_type_edit')->name('project-type-edit-page');
Route::post('/project/type/update/{id}', 'Project\protypeController@update_project_type')->name('project-type-update-page');
Route::get('/project/type/delete/{id}', 'Project\protypeController@project_type_destroy')->name('project-type-delete-page');


///.................................Project Contructor--------------/////

Route::get('/project/contructor/create', 'Project\procontuctorController@create_project_contructor')->name('project-contructor-create-page');
Route::post('/project/contructor/store', 'Project\procontuctorController@store_project_contructor')->name('project-contructor-store-page');
Route::get('/project/contructor', 'Project\procontuctorController@list_project_contructor')->name('project-contructor-list-page');
Route::get('/project/contructor/edit/{id}', 'Project\procontuctorController@project_contructor_edit')->name('project-contructor-edit-page');
Route::post('/project/contructor/update/{id}', 'Project\procontuctorController@update_project_contructor')->name('project-contructor-update-page');
Route::get('/project/contructor/delete/{id}', 'Project\procontuctorController@project_contructor_destroy')->name('project-contructor-delete-page');


///.................................Project Record--------------/////

Route::get('/project/create', 'Project\projectController@create_project')->name('project-create-page');
Route::post('/project/store', 'Project\projectController@store_project')->name('project-store-page');
Route::get('/project', 'Project\projectController@list_project')->name('project-list-page');
Route::get('/project/edit/{id}', 'Project\projectController@project_edit')->name('project-edit-page');
Route::post('/project/update/{id}', 'Project\projectController@update_project')->name('project-update-page');
Route::get('/project/delete/{id}', 'Project\projectController@project_destroy')->name('project-delete-page');

//....................................Expense Head..........................................
Route::get('/expense_head_list','DailyProcess\ExpenseHeadController@index')->name('expense-head-list');
Route::get('/expense_head_list/create','DailyProcess\ExpenseHeadController@create')->name('expense-head-create-route');
Route::post('/expense_head_list/store','DailyProcess\ExpenseHeadController@store')->name('expense-head-store-route');
Route::get('/expense_head_list/edit/{id}','DailyProcess\ExpenseHeadController@edit')->name('expense-head-edit-route');
Route::patch('/expense_head_list/update/{id}','DailyProcess\ExpenseHeadController@update')->name('expense-head-update-route');
Route::get('/expense_head_list/destroy/{id}','DailyProcess\ExpenseHeadController@destroy')->name('expense-head-destroy-route');




//......................................Expense Voucher..........................................................
Route::get('/expensevoucherlist','DailyProcess\ExpenseController@index')->name('expense-list');
Route::get('/expensevoucherlist/create','DailyProcess\ExpenseController@create')->name('expense-create-route');
Route::get('/get-supplier-exp-invoice/{supplier_id}','DailyProcess\ExpenseController@getSupplierInvoice')->name('get-exp-supplier-invoice-route');
Route::get('expensevoucherlist/destroy/{id}','DailyProcess\ExpenseController@destroy')->name('expensevoucher-destroy-route');
Route::post('/expenselist/store','DailyProcess\ExpenseController@store')->name('expenselist-store-route');

Route::get('expensevoucherlist/view/{id}','DailyProcess\ExpenseController@view')->name('expensevoucher-view-route');


//....................................Finance Management.........................................
Route::get('/trial_balance/','Finance\FinanceController@trial_balance')->name('finance_trial_balance');
Route::get('/trial_balance_filter_by_date/','Finance\FinanceController@trial_balance_filter_by_date')->name('trial_balance_filter_by_date');
Route::get('/balance_sheet/','Finance\FinanceController@balance_sheet')->name('finance_balance_sheet');
Route::get('/profit_and_loss/','Finance\FinanceController@profit_and_loss')->name('finance_profit_and_loss');
Route::get('/chart_of_account/','Finance\FinanceController@chart_of_account')->name('finance_chart_of_account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');











//------------------------LC SETUP-----------------------------



// Route::get('/lc/port_setup', 'lc\lcController@port_setup')->name('lc-port-setup');
// Route::get('/lc/cost_type', 'lc\lcController@cost_type')->name('lc-cost-type');


Route::get('/lc/lc_setup', 'lc\lcController@lc_create')->name('create-lc-setup');
Route::get('/lc/lc_list', 'lc\lcController@lc_list')->name('list-lc-setup');
Route::post('/lc/lc_setup/insert', 'lc\lcController@lc_store')->name('lc-setup.insert');
Route::get('/lc/lc_delete/{id}', 'lc\lcController@destroy')->name('lc-setup-delete');
Route::get('get/details/{id}', 'lc\lcController@getDetails')->name('getDetails');


//------------------------PI SETUP-----------------------------

Route::get('/lc/pi_setup', 'lc\piController@pi_create')->name('lc-create-pi');
Route::post('/lc/pi_setup/insert', 'lc\piController@insert')->name('pi-setup.insert');
Route::get('/lc/pi_list', 'lc\piController@pi_list')->name('lc-list-pi');
Route::get('/lc/pi_delete/{id}', 'lc\piController@destroy')->name('lc-pi-delete');
Route::get('get/details1/{id}', 'lc\piController@getDetails1')->name('getDetails1');


//----------------------------Company Setup------------------------------

Route::get('/company/company_setup', 'Company\companyController@index')->name('company-create-setup');
Route::post('/company/company_store', 'Company\companyController@store')->name('company-store-create');
Route::post('/company/company_update/{id}', 'Company\companyController@update')->name('company-edit-store');



//----------------------------Local Setting------------------------------

Route::get('/local/local_setup', 'Company\localsettingController@index')->name('local-create-setup');
Route::post('/local/local_setup', 'Company\localsettingController@insert')->name('local-setup.insert');





// Route::get('/pay_voucher_list', function () {
//     return view('main.admin.accounts.pay_voucher_list');
// });
// Route::get('/pay_voucher_create', function () {
//     return view('main.admin.accounts.pay_voucher_create');
// });
// Route::get('/rev_voucher_list', function () {
//     return view('main.admin.accounts.rev_voucher_list');
// });
// Route::get('/rev_voucher_create', function () {
//     return view('main.admin.accounts.rev_voucher_create');
// });

// Route::get('/jour_list', function () {
//     return view('main.admin.accounts.jour_list');
// });
// Route::get('/jour_create', function () {
//     return view('main.admin.accounts.jour_create');
// });


//-----------Manage Project Type--------------

// Route::get('/project_group_create', function () {
//     return view('main.admin.manage_project.project_group_create');
// });

// Route::get('/project_group_list', function () {
//     return view('main.admin.manage_project.project_group_list');
// });
// Route::get('/project_group_edit', function () {
//     return view('main.admin.manage_project.project_group_edit');
// });
// Route::get('/project_subgroup_create', function () {
//     return view('main.admin.manage_project.project_subgroup_create');
// });

// Route::get('/project_subgroup_list', function () {
//     return view('main.admin.manage_project.project_subgroup_list');
// });
// Route::get('/project_subgroup_edit', function () {
//     return view('main.admin.manage_project.project_subgroup_edit');
// });
// Route::get('/project_type_create', function () {
//     return view('main.admin.manage_project.project_type_create');
// });

// Route::get('/project_type_list', function () {
//     return view('main.admin.manage_project.project_type_list');
// });
// Route::get('/project_type_edit', function () {
//     return view('main.admin.manage_project.project_type_edit');
// });

// Route::get('/project_constructor_create', function () {
//     return view('main.admin.manage_project.project_constructor_create');
// });

// Route::get('/project_constructor_list', function () {
//     return view('main.admin.manage_project.project_constructor_list');
// });
// Route::get('/project_constructor_edit', function () {
//     return view('main.admin.manage_project.project_constructor_edit');
// });

//---------------Daily Process--------------------



// Route::get('/expenses_create', function () {
//     return view('main.admin.dailyprocess.expenses_create');
// });

// Route::get('/expenses_list', function () {
//     return view('main.admin.dailyprocess.expenses_list');
// });
Route::get('/expenses_edit', function () {
    return view('main.admin.dailyprocess.expenses_edit');
});
// Route::get('/expenses_head_create', function () {
//     return view('main.admin.dailyprocess.expenses_head_create');
// });

// Route::get('/expenses_head_list', function () {
//     return view('main.admin.dailyprocess.expenses_head_list');
// });
Route::get('/expenses_head_edit', function () {
    return view('main.admin.dailyprocess.expenses_head_edit');
});

//---------------Product Process--------------------

Route::get('/product_category_create', function () {
    return view('main.admin.productsetup.product_category_create');
});

Route::get('/product_category_list', function () {
    return view('main.admin.productsetup.product_category_list');
});
Route::get('/product_category_edit', function () {
    return view('main.admin.productsetup.product_category_edit');
});
Route::get('/product_subcategory_create', function () {
    return view('main.admin.productsetup.product_subcategory_create');
});

Route::get('/product_subcategory_list', function () {
    return view('main.admin.productsetup.product_subcategory_list');
});
Route::get('/product_subcategory_edit', function () {
    return view('main.admin.productsetup.product_subcategory_edit');
});

Route::get('/product_create', function () {
    return view('main.admin.productsetup.product_create');
});

Route::get('/product_list', function () {
    return view('main.admin.productsetup.product_list');
});
Route::get('/product_edit', function () {
    return view('main.admin.productsetup.product_edit');
});

//---------------Material use--------------------
Route::get('/use_create', function () {
    return view('main.admin.materialuse.use_create');
});

Route::get('/use_list', function () {
    return view('main.admin.materialuse.use_list');
});
Route::get('/sales_invoice_create', function () {
    return view('main.admin.materialuse.sales_invoice_create');
});

Route::get('/sales_invoice_list', function () {
    return view('main.admin.materialuse.sales_invoice_list');
});
Route::get('/sales_invoice_edit', function () {
    return view('main.admin.materialuse.sales_invoice_edit');
});
//---------------Inventroy--------------------
Route::get('/branch_create', function () {
    return view('main.admin.inventory.branch_create');
});

Route::get('/branch_list', function () {
    return view('main.admin.inventory.branch_list');
});
Route::get('/branch_edit', function () {
    return view('main.admin.inventory.branch_edit');
});

Route::get('/warehouse_create', function () {
    return view('main.admin.inventory.warehouse_create');
});

Route::get('/warehouse_list', function () {
    return view('main.admin.inventory.warehouse_list');
});
Route::get('/warehouse_edit', function () {
    return view('main.admin.inventory.warehouse_edit');
});

Route::get('/branch_stock', function () {
    return view('main.admin.inventory.branch_stock');
});

Route::get('/warehouse_stock', function () {
    return view('main.admin.inventory.warehouse_stock');
});
Route::get('/combined_stock', function () {
    return view('main.admin.inventory.combined_stock');
});
Route::get('/delivery_list', function () {
    return view('main.admin.inventory.delivery_list');
});

Route::get('/delivery_create', function () {
    return view('main.admin.inventory.delivery_create');
});

Route::get('/receive_list', function () {
    return view('main.admin.inventory.receive_list');
});

Route::get('/receive_create', function () {
    return view('main.admin.inventory.receive_create');
});

