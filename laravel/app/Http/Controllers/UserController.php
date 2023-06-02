<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginpost(Request $request){
        // 값이 제대로 들어왔는지 확인
        Log::debug("Login Start",$request->only('email','password'));
        // Request는 유저의 모든 걸 가져와줌 
        // 유효성 체크 
        Log::debug("Validate Start");
        $validate = Validator::make($request->only('email','password'),[
            'email' => 'required|email|max:30'
            ,'password' =>'required|max:30|min:3'
        ]);
        
        Log::debug("Validate End");
        // validator를 했을 때 실패가 떴을 경우 fails()가 true 반환
        if($validate->fails()){
            Log::debug("Validate Fail");
            // withErrors하면 $errors라는 변수에 담겨져있음 
            return redirect()->back()->withErrors($validate);
        }
        // $user = $request->all();
        $user = DB::select('select id,email,password from users where email = :email', ['email' => $request->email]);
        // return var_dump($user);

        //$user[0] => stdclass인데 Log::debug 배열로 넘겨줘야함 
        
        // 유저가 존재하지 않거나 , 입력한 비밀번호와 데이터에 저장된 비밀번호가 일치하지 않을 경우
        if(!$user || $request->password !== $user[0]->password){
            // $errorMsg = "입력하신 정보가 일치하지 않습니다. 다시 입력해 주세요"
            return redirect()->back()->withErrors(["다시 적으쇼"]);
        }

        Log::debug("User Select ",[$user[0]]);
        //유저 인증 작업
        Auth::loginUsingId($user[0]->id);
        if(!Auth::check()){
            // session($user[0]->id);
            Log::debug("Select User FAIL");
            return redirect()->back()->withErrors('이히ㅣ히히ㅣ히히히히ㅣ히히히힣');
        }else{
            Log::debug("Select User OK");
            return redirect('/');
        }
        // return redirect()->back();

    }
}
