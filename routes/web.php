<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');

Route::group(['middleware'=>'verified'],function(){
Route::get('/Typography', function(){

	echo "Typography";
		
})->name('Typography');

Route::get('/inbox', function(){

	echo "inbox";

})->name('inbox');

Route::get('/Calendar', function(){

	echo "calendar";

})->name('Calendar');




});


//employee routes..................
Route::get('/add-employee', 'EmployeeController@index')->name('add.employee');

Route::post('/insert-employee','EmployeeController@store');

Route::get('/all-employee', 'EmployeeController@AllEmployee')->name('all.employee');
Route::get('delete.employee/{id}', 'EmployeeController@Employeedelete');
Route::get('edit.employee/{id}', 'EmployeeController@EmployeeEdit');
Route::post('update.employee/{id}','EmployeeController@EmployeeUpdate');


//customers routes...........
Route::get('add-customer','CustomerController@index')->name('add.customer');
Route::post('/insert-customer','CustomerController@Store');
Route::get('all.customer','CustomerController@AllCustomer')->name('all.customer');

Route::get('view.customer/{id}','CustomerController@ViewCustomer');

Route::get('delete.customer/{id}','CustomerController@DeleteCustomer');
Route::get('edit.customer/{id}','CustomerController@EditCustomer');
Route::post('update.customer/{id}','CustomerController@updateCustomer');


//supplier routes........
Route::get('add-supplier','SupplierController@index')->name('add.supplier');

Route::post('/insert-supplier','SupplierController@Store');
Route::get('all.supplier','SupplierController@Allsupplier')->name('all.supplier');

Route::get('view.supplier/{id}','SupplierController@Viewsupplier');

Route::get('delete.supplier/{id}','SupplierController@Deletesupplier');
Route::get('edit.supplier/{id}','SupplierController@Editsupplier');
Route::post('update.supplier/{id}','SupplierController@updatesupplier');

//salary routes start from here.....
Route::get('add-advanced-salary','SalaryController@AddAdvancedSalary')->name('add.salary');

Route::post('/insert-advancedsalary','SalaryController@InsertAdvancedsalary');

Route::get('all.advancedsalary','SalaryController@Allsalary')->name('all.advancedsalary');

Route::get('pay.salary','SalaryController@PaySalary')->name('pay.salary');
//category routes here.............
Route::get('add.category','CategoryController@AddCategory')->name('add.category');
Route::get('all.category','CategoryController@AllCategory')->name('all.category');

Route::post('/insert-category','CategoryController@InsertCategory');
Route::get('delete.category/{id}','CategoryController@DeleteCategory');
Route::get('edit.category/{id}','CategoryController@EditCategory');
Route::post('update-category/{id}','CategoryController@UpdateCategory');

//products routes  are here.............

Route::get('add.product','ProductController@AddProduct')->name('add.product');
Route::get('all.product','ProductController@AllProduct')->name('all.product');
Route::post('/insert-product','ProductController@InsertProduct')->name('/insert-product');
Route::get('delete-product/{id}','ProductController@DeleteProduct');
Route::get('edit-product/{id}','ProductController@EditProduct');
Route::post('update-product/{id}','ProductController@UpdateProduct');
Route::get('view.product/{id}','ProductController@ViewProduct');


//Expense route are here............
Route::get('add.expense','ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-amount','ExpenseController@InsertExpense');
Route::get('todays.expense','ExpenseController@TodaysExpense')->name('todays.expense');

Route::get('delete.expense/{id}','ExpenseController@deleteExpense');
Route::get('edit.expense/{id}','ExpenseController@EditExpense');
Route::post('update.expense/{id}','ExpenseController@UpdateExpense');
Route::get('month.expense','ExpenseController@MonthExpense')->name('month.expense');
Route::get('yearly.expense','ExpenseController@YearlyExpense')->name('yearly.expense');
//monthly expense more routes are here.........
Route::get('month.expense','ExpenseController@MonthExpense')->name('month.expense');
Route::get('singleMonth.expense/{month}','ExpenseController@singleMonthExpense');

// attendence routes are here..........

Route::get('take.attendence','AttendenceController@TakeAttendence')->name('take.attendence');

Route::post('insert-attendence','AttendenceController@InsertAttendence');
Route::get('all.attendence','AttendenceController@AllAttendence')->name('all.attendence');

Route::get('edit.attendence/{att_date}','AttendenceController@EditAttendence')->name('edit.attendence');

Route::post('update-attendence/{edit_date}','AttendenceController@UpdateAttendence');
Route::get('delete.attendence/{edit_date}','AttendenceController@DeleteAttendence');
Route::get('view.attendence/{edit_date}','AttendenceController@ViewAttendence');

Route::get('monthly.attendence','AttendenceController@MonthlyAttendence')->name('monthly.attendence');
Route::get('singleMonth.attendence/{month}','AttendenceController@singleMonthAttendence');


// setting routes are here....
Route::get('website-setting','AttendenceController@Setting')->name('website-setting');
Route::post('update.setting/{id}','AttendenceController@UpdateSetting');

//excel file import/export routes are here...........

Route::get('import.product','ProductController@ImportProduct')->name('import.product');
Route::get('export','ProductController@export')->name('export');
Route::POST('/import','ProductController@import')->name('/import');

//point of sell routes are here.......

Route::get('pos','PosController@Index')->name('pos');

//cart routes are here........
Route::post('add.cart','CartController@index')->name('add.cart');
Route::post('/update.cart/{id}','CartController@UpdateCart');

Route::get('/cart-remove/{id}','CartController@CartRemove');

Route::post('/invoice','CartController@invoice');

Route::post('/final-invoice','CartController@FinalInvoice');




