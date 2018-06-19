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

Route::middleware('guest:admin')->group(function (){
    Route::get('login', 'AuthController@getLogin')->name('login');
    Route::post('login', 'AuthController@doLogin')->name('do.login');
});

Route::middleware('auth:admin')->group(function (){

    Route::get('logout', 'AuthController@doLogout')->name('do.logout');

    Route::resource('left-stuff', 'LeftStuffController');
    Route::get('left-stuff/load/datatables', 'LeftStuffController@loadDatatables')->name('left-stuff.datatables');

    Route::resource('student-card', 'StudentCardController');
    Route::get('student-card/load/datatables', 'StudentCardController@loadDatatables')->name('student-card.datatables');

    Route::resource('admin', 'AdminController');
    Route::patch('admin/setup-akun/{id}', 'AdminController@setupAkun');

    Route::group(['prefix' => 'setting'], function (){
        Route::get('/', 'SettingController@index')->name('setting.index');
        Route::resource('location', 'LocationController');
        Route::get('location/load/datatables', 'LocationController@loadDatatables')->name('location.datatables');

        Route::resource('prodi', 'ProdiController');
        Route::get('prodi/load/datatables', 'ProdiController@loadDatatables')->name('prodi.datatables');
    });

    Route::get('list/location', 'LocationController@listLocation')->name('list.location');
    Route::get('list/prodi', 'ProdiController@listProdi')->name('list.prodi');
});