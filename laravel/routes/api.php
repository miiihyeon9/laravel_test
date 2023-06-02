<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiUserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// 유저 api의 경우 인증되어있는 사람이여야 
// 인증이 되었을 경우 token을 주고 
// 토큰을 확인하고 
// 넘겨줘야함 


//{email} : 유저가 우리한테 주는 값이기 때문에 유저가 우리에게 주는 값인가 생각을 해야함
// 리소스 조회
Route::get('/users/{email}',[ApiUserController::class,'getuser']);
// 리소스 생성
// form은 body에 저장되어 넘어옴
Route::post('/users',[ApiUserController::class,'postuser']);
// 리소스 수정 
Route::put('/users/{email}',[ApiUserController::class,'putuser']);
// 리소스 삭제
Route::delete('/users/{email}',[ApiUserController::class,'deleteuser']);

