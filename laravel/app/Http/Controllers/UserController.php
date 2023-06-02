<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginpost(Request $request){
        // Request는 유저의 모든 걸 가져와줌 
        // 유효성 체크 
        $valCheck = $request->validate();
        
        $user = $request->all();

        return '왓';
    }
}
