<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['middleware'=>'preventBackHistory'])->group(function() {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/logout', 'Auth\LoginController@logout');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','preventBackHistory']],function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('userApproval',[AdminController::class,'userApproval'])->name('admin.userApproval');
    Route::get('userList',[AdminController::class,'userList'])->name('admin.userList');
});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','preventBackHistory']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
});

Route::group(['prefix'=>'coordinator','middleware'=>['isCoordinator','auth','preventBackHistory']],function(){
    Route::get('dashboard',[CoordinatorController::class,'index'])->name('coordinator.dashboard');
    Route::get('profile',[CoordinatorController::class,'profile'])->name('coordinator.profile');
});