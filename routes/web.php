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
    return view('auth.login');
});

Auth::routes(['register' => false]);



Route::group( ['namespace' => 'Client', 'prefix' => 'client', 'as' => 'client.', 'middleware' => []], function () {
        
    Route::get('get', ['uses' =>'ClientController@get'])->name('get');
    Route::post('register', ['uses' =>'ClientController@register'])->name('register');
    Route::get('list', ['uses' =>'ClientController@list'])->name('list');
    Route::post('edit/{id}', ['uses' =>'ClientController@edit'])->name('edit');
    Route::delete('delete/{id}', ['uses' =>'ClientController@delete'])->name('delete');
    
});

