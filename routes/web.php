<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StatisticalController;
use App\Http\Controllers\AuthController;
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

//Route::get('/admin', function () {return view('admin/user/index');
//});
Route::post('/get-phone',[UserController::class, 'getPhone'])->name('get-phone');
Route::post('/get-email',[UserController::class, 'getEmail'])->name('get-email');
Route::post('/get-username',[UserController::class, 'getUsername'])->name('get-username');
Route::post('/get-districts',[UserController::class, 'getDistrict'])->name('get-districts');
Route::post('/get-wards',[UserController::class, 'getWard'])->name('get-wards');
Route::prefix('admin')->middleware('isAdmin')->group(function (){
    Route::group(['prefix' => 'user'], function (){
        Route::get('/candidate',[UserController::class, 'candidate'])->name('candidate-list');
        Route::get('/employer',[UserController::class, 'employer'])->name('employer-list');
        Route::get('/deleted',[UserController::class, 'deleted'])->name('deleted-list');
        Route::get('/create',[UserController::class, 'create'])->name('create-user');
        Route::post('/store',[UserController::class, 'store'])->name('store-user');
        Route::get('/edit/{id}',[UserController::class, 'edit'])->name('edit-user');
        Route::post('/update',[UserController::class, 'update'])->name('update-user');
        Route::get('/change-password/{id}',[UserController::class, 'changePassword'])->name('change-password');
        Route::post('/update-password',[UserController::class, 'updatePassword'])->name('update-password');

        Route::post('/get-certificate',[UserController::class, 'getCertificate'])->name('get-certificate');
        Route::get('/disable-user',[UserController::class, 'disableUser'])->name('disable-user');
        Route::get('/enable-user/{id}',[UserController::class, 'enableUser'])->name('enable-user');
    });

    Route::group(['prefix' => 'statistical'], function (){
        Route::get('/', [StatisticalController::class, 'index'])->name('statistical-index');
        Route::get('/user-statistical', [StatisticalController::class, 'getUser'])->name('statistical-user');
        Route::get('/revenue-statistical', [StatisticalController::class, 'getRevenue'])->name('statistical-revenue');
    });
});

Route::get('/', [ClientController::class, 'index'])->name('index');
Route::get('/search', [ClientController::class, 'search'])->name('search');
Route::get('/detail/{id}', [ClientController::class, 'show'])->name('detail')->middleware('checkUser');
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('checkLogout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/register', [AuthController::class, 'create'])->name('create-account');
Route::get('/apply', [ClientController::class, 'apply']);
Route::get('/ck', [ClientController::class, 'ck']);
Route::post('/ck', [ClientController::class, 'cks']);

