<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AdminController;
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
//Admin must first Enter through here 
Route::get('/', [PageController::class,'adminPage']);
//Route::post('insert',[LoginController::class, '']);
Route::get('/login', [LoginController::class,'show_login_form'])->name('login');
//Route::get('/signUp', [LoginController::class,'show_signUp_form'])->name('signup');
Route::post('login', [LoginController::class, 'process_login']);
Route::post('register', [LoginController::class,'process_signup']);
Route::group(["middleware" => ["auth"]], function() {
    Route::get('/home', [PageController::class, 'homePage'])->name('defaultHome');
    //Route::get('/reset', [LoginController::class, 'resetPassword']);
    Route::get('/logout', [LoginController::class, 'userlogout']);   
    //Route::post('newUser', [UserController::class, 'process_User']);    
});
Route::group(["middleware" => ["auth", "operator"]], function() {
    Route::get('/users', [OperatorController::class, 'userStatus']);
    Route::post('goUser', [OperatorController::class, 'findUser']);
    Route::get('/pending', [OperatorController::class, 'pendingApprove']);
    Route::get('/dis/{id}', [OperatorController::class, 'disableUser']);
    Route::get('/enab/{id}', [OperatorController::class, 'enableUser']);
    Route::post('findEstate', [OperatorController::class, 'findEstates']);
    Route::get('/accept/{id}', [OperatorController::class, 'approvePending']);
    Route::get('/contactList', [OperatorController::class, 'contactMessage']);
});
Route::group(["middleware" => ["auth", "admin"]],function() {
    Route::get('/reset', [AdminController::class, 'resetAdminPass'])->name('getBack');
    Route::get('/newRole/{id}/{role}', [AdminController::class, 'changeRole']);
    Route::get('/newPass/{id}', [AdminController::class, 'changePass']);
    Route::post('/newPass/changePass', [AdminController::class, 'editPass']);
    Route::get('/setting', [AdminController::class, 'addBackend'])->name('backendUser');
    Route::get('/rmBackend', [AdminController::class, 'remBackend'])->name('rmBack');
    Route::get('/viewHistory', [AdminController::class, 'vHistory']);
    Route::get('/rmUser', [AdminController::class, 'rmUser'])->name('rmUserBack');
    Route::get('/delAd/{id}', [AdminController::class, 'delAd']);
    Route::get('/rmUser/{id}', [AdminController::class, 'delUser']);
});
//Route::group(["middleware" => ["auth"]], function(){


    //form movies page
    //Route::get('/addmovie',
//
    //    [MoviesController::class, 'addmovie']
//
    //);
//
    //add movies page
//    Route::post('/savemovie',
//
//        [MoviesController::class, 'savemovie']
//
//    );
//
//
//});