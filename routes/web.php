<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// All Dashboard Component

Route::group(['middleware' => 'auth'],function(){

//Employee Controller
Route::resource('employee', App\Http\Controllers\Admin\EmployeeController::class);
//Customer Controller
Route::resource('customer', App\Http\Controllers\Admin\CustomerController::class);
//Supplier Controller
Route::resource('supplier', App\Http\Controllers\Admin\SupplierController::class);
//Salary Controller 
Route::resource('salary', App\Http\Controllers\Admin\SalaryController::class);
//PaidSalary Controller 
Route::get('pay_salary', [App\Http\Controllers\PaidSalaryController::class,'pay_salary'])->name('pay.salary');

//Category Controller
Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);

//Product Controller 
Route::resource('product', App\Http\Controllers\Admin\ProductController::class);



//Expense  Route are here 
Route::get('/add_expense', [App\Http\Controllers\Admin\ExpensesController::class,'add_expense'])->name('add.expense');

Route::post('/insert_expense', [App\Http\Controllers\Admin\ExpensesController::class,'insert_expense']);

Route::get('/today_expense', [App\Http\Controllers\Admin\ExpensesController::class,'today_expense'])->name('today.expense');

Route::get('/edit_today_expense/{id}', [App\Http\Controllers\Admin\ExpensesController::class,'edit_today_expense']);

Route::post('/update_today_expense/{id}', [App\Http\Controllers\Admin\ExpensesController::class,'update_today_expense']);

Route::delete('/delete_today_expense/{id}', [App\Http\Controllers\Admin\ExpensesController::class,'delete_today_expense']);

// Monthly Expense Route
Route::get('/monthly_expense', [App\Http\Controllers\Admin\ExpensesController::class,'monthly_expense'])->name('monthly.expense');

//Yearly Expense Route here
Route::get('/yearly_expense', [App\Http\Controllers\Admin\ExpensesController::class,'yearly_expense'])->name('yearly.expense');

// Monthly route are here
Route::get('/januray_expense', [App\Http\Controllers\Admin\ExpensesController::class,'januray_expense'])->name('januray.expense');

Route::get('/february_expense', [App\Http\Controllers\Admin\ExpensesController::class,'february_expense'])->name('february.expense');

Route::get('/march_expense', [App\Http\Controllers\Admin\ExpensesController::class,'march_expense'])->name('march.expense');

Route::get('/april_expense', [App\Http\Controllers\Admin\ExpensesController::class,'april_expense'])->name('april.expense');

Route::get('/may_expense', [App\Http\Controllers\Admin\ExpensesController::class,'may_expense'])->name('may.expense');

Route::get('/june_expense', [App\Http\Controllers\Admin\ExpensesController::class,'june_expense'])->name('june.expense');

Route::get('/july_expense', [App\Http\Controllers\Admin\ExpensesController::class,'july_expense'])->name('july.expense');

Route::get('/august_expense', [App\Http\Controllers\Admin\ExpensesController::class,'august_expense'])->name('august.expense');

Route::get('/sepemtember_expense', [App\Http\Controllers\Admin\ExpensesController::class,'sepemtember_expense'])->name('sepemtember.expense');

Route::get('/october_expense', [App\Http\Controllers\Admin\ExpensesController::class,'october_expense'])->name('october.expense');

Route::get('/november_expense', [App\Http\Controllers\Admin\ExpensesController::class,'november_expense'])->name('november.expense');

Route::get('/december_expense', [App\Http\Controllers\Admin\ExpensesController::class,'december_expense'])->name('december.expense');


// Attendance Routes are here

Route::get('/take_attendance', [App\Http\Controllers\Admin\AttendanceController::class,'take_attendance'])->name('take.attendance');

Route::post('/insert_attendance', [App\Http\Controllers\Admin\AttendanceController::class,'insert_attendance']);

Route::get('/all_attendance', [App\Http\Controllers\Admin\AttendanceController::class,'all_attendance'])->name('all.attendance');

Route::get('/edit_attendance/{edit_date}', [App\Http\Controllers\Admin\AttendanceController::class,'edit_attendance']);

Route::get('/view_attendance/{edit_date}', [App\Http\Controllers\Admin\AttendanceController::class,'view_attendance']);

Route::post('/update_attendance', [App\Http\Controllers\Admin\AttendanceController::class,'update_attendance']);

// Settings Profile Routes are here


Route::get('/setting', [App\Http\Controllers\Admin\SettingsController::class,'setting'])->name('setting.profile');

Route::get('/update_setting/{id}', [App\Http\Controllers\Admin\SettingsController::class,'update_setting']);

});