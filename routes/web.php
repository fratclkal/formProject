<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\Panel\PanelUserController;
use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
});


Route::group(['prefix' => 'panel', 'middleware' => 'admin'], function (){
    Route::get('/', [PanelController::class,'app'])->name('panel');
    Route::get('/listUsers', [PanelController::class,'listUsers'])->name('listUsers');
    Route::get('/listForms', [PanelController::class,'listForms'])->name('listForms');
    Route::get('/fetchUsers', [PanelUserController::class,'fetch'])->name('panel.fetch.users');
    Route::post('/create-user', [PanelUserController::class, 'create'])->name('panel.create_user');
    Route::post('/update-user', [PanelUserController::class, 'update'])->name('panel.update_user');
    Route::post('/get-user', [PanelUserController::class, 'get'])->name('panel.get_user');
    Route::post('/delete-user', [PanelUserController::class, 'delete'])->name('panel.delete_user');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
