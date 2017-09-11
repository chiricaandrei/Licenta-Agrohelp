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
    return view('welcome');
});

Route::get('home', function () {
    return view('home');
});

Route::get('fields', function () {
    return view('crop');
});

Route::get('finance/purchases', function () {
    return view('purchases');
});

Route::get('finance/sales', function () {
    return view('sales');
});

Route::get('finance/bank', function () {
    return view('bank');
});

Route::get('documents', function () {
    return view('documents');
});

Auth::routes();
// Route::get('/loans', 'LoanController@viewLoanForm');

Route::resource('/home', 'HomeController');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');


Route::resource('/finance/loans','loanController');

Route::resource('/resources/lessors','arendatorController');

Route::resource('/resources/machines','carController');

Route::resource('/resources/employees','EmployeController');


Route::resource('/resources/deposit', 'depositController');

Route::post('/resources/deposit/store2','depositeditController@store2');

Route::post('/resources/deposit/store4','depositeditController@store4');

Route::post('/resources/deposit/store5','depositeditController@store5');

Route::resource('/resources/deposit/{id}/edit', 'depositeditController');


//Route::resource('loan','loanController');