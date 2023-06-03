<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardsController;
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

// $action => 해당 컨트롤러의 메소드 
// url이 변경되었을 때 route의 url만 변경하기 위해서 name 설정
// [UserController::class,'login'] => 튜플 문법 (UserController에 login메소드 이용)
Route::get('/users/login',[UserController::class,'login'])->name('user.login');
Route::post('/users/loginpost',[UserController::class,'loginpost'])->name('user.login.post');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/boards/list',[BoardsController::class,'index'])->name('boards.index');
Route::get('/boards/write',[BoardsController::class,'write'])->name('boards.write');
Route::post('/boards/store',[BoardsController::class,'store'])->name('boards.store');