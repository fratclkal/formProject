<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\Panel\PanelUserController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Panel\PanelFormsController;

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
    Route::post('/', [LoginController::class, 'login'])->name('login');
    Route::post('/register', [LoginController::class,'register'])->name('register');
});

Route::group(['middleware' => 'is_former'], function (){
    Route::get('/form', [FormController::class,'index'])->name('index');
    Route::post('/form-create', [FormController::class,'createForm'])->name('create.form');
    Route::post('/form-update', [FormController::class,'update'])->name('update.form');
    Route::get('/form-fetch', [FormController::class,'fetch'])->name('front.fetch.forms');
    Route::get('/form-show/{id}', [FormController::class,'show'])->name('front.show.forms');
});


Route::group(['prefix' => 'panel', 'middleware' => 'admin'], function (){


    Route::get('/', [PanelController::class,'app'])->name('panel');
    Route::get('/listUsers', [PanelController::class,'listUsers'])->name('listUsers');
    Route::get('/listForms', [PanelFormsController::class,'listForms'])->name('listForms');
    Route::get('/fetchUsers', [PanelUserController::class,'fetch'])->name('panel.fetch.users');
    Route::post('/create-user', [PanelUserController::class, 'create'])->name('panel.create_user');
    Route::post('/update-user', [PanelUserController::class, 'update'])->name('panel.update_user');
    Route::post('/get-user', [PanelUserController::class, 'get'])->name('panel.get_user');
    Route::post('/delete-user', [PanelUserController::class, 'delete'])->name('panel.delete_user');


    Route::group(['prefix' => 'forms'], function(){
        Route::get('/form/{id}', [PanelFormsController::class, 'show'])->name('panel.forms.show');
        Route::get('/list', [PanelFormsController::class,'listForms'])->name('listForms');
        Route::get('/fetch/{user_id}/{start_date}/{end_date}/{start_start_date}/{start_end_date}/{end_start_date}/{end_end_date}/{endless}/{payment_type}', [PanelFormsController::class,'fetch'])->name('panel.fetch.forms');
        Route::post('/fetch/{user_id}/{start_date}/{end_date}/{start_start_date}/{start_end_date}/{end_start_date}/{end_end_date}/{endless}/{payment_type}', [PanelFormsController::class,'total_price']);
        Route::post('/delete', [PanelFormsController::class, 'delete'])->name('panel.delete.form');
        Route::get('/excel/{user_id}/{start_date}/{end_date}', [PanelFormsController::class,'download_excel'])->name('panel.excel.forms');
    });



});


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
