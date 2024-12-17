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
    return view('welcome');
});

//Auth::routes();
Auth::routes(['register' => false]);


Route::get('/home', 'HomeController@index')->name('home');
Route::post('login','LoginController@login')->name('login');
//Route::view('/admins','admins.layout');

Route::resource('/users','UserController');
Route::resource('/role','RoleController');
Route::resource('/customer','CustomerController');
Route::resource('/phaseProfile','PhaseProfileController');
Route::resource('/buildPhase','BuildPhaseController');
Route::resource('/machine','MachineController');
Route::resource('/parameter','ParameterController');
Route::resource('parameter/{parameter_id}/parameterOptions','ParameterOptionsController');

