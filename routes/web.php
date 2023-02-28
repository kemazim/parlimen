<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminQuestionController;
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
    Route::get('notification', [AdminController::class, 'notification']);
    Route::get('userApproval',[AdminController::class,'userApproval'])->name('admin.userApproval');
    Route::get('userApproval/edit/{id}',[AdminController::class,'edit'])->name('admin.userApprovalEdit');
    Route::put('userApprovalUpdateUser/{id}',[AdminController::class,'updateApprovalUser']);
    Route::get('userList',[AdminController::class,'userList'])->name('admin.userList');
    Route::get('userListEdit/{id}',[AdminController::class,'editUser']);
    Route::get('userListDelete/{id}',[AdminController::class,'deleteUser']); 
    Route::put('userListUpdateUser/{id}',[AdminController::class,'updateUser']);
   
});   

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth']],function(){
    Route::get('questionList',[AdminQuestionController::class,'questionList'])->name('admin.questionList');
    Route::get('questionCreate',[AdminQuestionController::class,'questionCreate'])->name('admin.questionCreate');
    Route::get('parlimen', [AdminQuestionController::class, 'getParlimen'])->name('parlimen');
    Route::get('sidang', [AdminQuestionController::class, 'getSidang'])->name('sidang');
    Route::get('penggal', [AdminQuestionController::class, 'getPenggal'])->name('penggal');
    Route::get('mesyuarat', [AdminQuestionController::class, 'getMesyuarat'])->name('mesyuarat');
    Route::post('questionSave',[AdminQuestionController::class,'questionSave'])->name('admin.questionSave');
    Route::get('answerCreate',[AdminQuestionController::class,'answerCreate'])->name('admin.answerCreate');
    Route::get('viewJawapan/{id}', [AdminQuestionController::class, 'viewJawapan']);
    Route::get('ybList', [AdminQuestionController::class, 'ybList']);
    Route::get('ybAdd', [AdminQuestionController::class, 'ybAdd']);
    Route::post('ybSave', [AdminQuestionController::class, 'ybSave']);
    Route::get('ybEdit/{id}', [AdminQuestionController::class, 'ybEdit']);
    Route::put('ybUpdateSave/{id}', [AdminQuestionController::class, 'ybUpdateSave']);

    Route::get('parlimenList', [AdminQuestionController::class, 'parlimenList']);
    Route::get('parlimenAdd', [AdminQuestionController::class, 'parlimenAdd']);
    Route::post('parlimenSave', [AdminQuestionController::class, 'parlimenSave']);

    Route::get('questionEdit', [AdminQuestionController::class, 'questionEdit'])->name('admin.questionEdit');
    Route::get('questionAddAnswer/{id}', [AdminQuestionController::class, 'questionAddAnswer']);
    Route::put('questionSaveAnswer/{id}', [AdminQuestionController::class, 'questionSaveAnswer']);

    Route::get('questionUpdate/{id}', [AdminQuestionController::class, 'questionUpdate']);
    Route::put('questionUpdateSave/{id}', [AdminQuestionController::class, 'questionUpdateSave']);

    Route::get('questionAnswerApproval',[AdminQuestionController::class,'questionAnswerApproval']);
    Route::get('questionAnswerApprovalID/{id}',[AdminQuestionController::class,'questionAnswerApprovalID'])->name('admin.questionAnswerApprovalID');
    Route::put('approveQuestionAnswer/{id}',[AdminQuestionController::class,'approveQuestionAnswer']);

    Route::get('questionShare/{id}',[AdminQuestionController::class,'questionShare'])->name('admin.questionShare');
    Route::get('questionApproval/distribute/{id}', [AdminQuestionController::class, 'distributeQuestion']);
    
}); 

Route::group(['prefix'=>'coordinator','middleware'=>['isCoordinator','auth','preventBackHistory']],function(){
    Route::get('dashboard',[CoordinatorController::class,'index'])->name('coordinator.dashboard');
    Route::get('profile',[CoordinatorController::class,'profile'])->name('coordinator.profile');
    Route::get('editProfile/{id}',[CoordinatorController::class,'editProfile']);
    Route::put('updateProfile/{id}',[CoordinatorController::class,'updateProfile']);
   
});
Route::group(['prefix'=>'coordinator','middleware'=>['isCoordinator','auth']],function(){
    Route::get('questionList',[CoordinatorController::class,'questionList']);
    Route::get('questionEdit',[CoordinatorController::class,'questionEdit']);
    Route::get('viewJawapan/{id}', [CoordinatorController::class, 'viewJawapan']);
    Route::get('questionAddAnswer/{id}', [CoordinatorController::class, 'questionAddAnswer']);
    Route::put('questionSaveAnswer/{id}', [CoordinatorController::class, 'questionSaveAnswer']);
});


Route::group(['prefix'=>'user','middleware'=>['isUser','auth','preventBackHistory']],function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('editProfile/{id}',[UserController::class,'editProfile']);
    Route::put('updateProfile/{id}',[UserController::class,'updateProfile']);
});
Route::group(['prefix'=>'user','middleware'=>['isUser','auth']],function(){
    Route::get('questionList',[UserController::class,'questionList']);
    Route::post('questionList/fetch',[UserController::class,'fetch']);
    Route::get('viewJawapan/{id}', [UserController::class, 'viewJawapan']);
});
