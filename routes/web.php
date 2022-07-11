<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\Panel\PanelUserController;
use App\Http\Controllers\PanelController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/register', [PanelUserController::class,'register'])->name('register');
Route::group(['middleware' => 'is_not_auth'], function (){
    Route::get('/', [FormController::class,'login'])->name('login');
});

Route::group(['middleware' => 'is_former'], function (){
    Route::get('/form', [FormController::class,'index'])->name('index');
});


Route::group(['prefix' => 'panel', 'middleware' => 'admin'], function (){
    Route::get('/panel', [PanelController::class,'app'])->name('panel');
    Route::get('/panel/listUsers', [PanelController::class,'listUsers']);
    Route::get('/panel/listForms', [PanelController::class,'listForms']);
});
