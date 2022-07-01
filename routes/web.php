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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/proposals/index', 'ProposalController@index')->name('proposals.index');
    Route::get('/proposals/create', 'ProposalController@create')->name('proposals.create');
    Route::post('/proposals/create', 'ProposalController@store')->name('proposals.store');

    Route::middleware('admin')->group(function(){
        Route::get('/admin/index', 'ProposalController@adminIndex')->name('admin.index');
        Route::post('/proposals/update/{id}', 'ProposalController@update')->name('proposals.update');
    });
    
});