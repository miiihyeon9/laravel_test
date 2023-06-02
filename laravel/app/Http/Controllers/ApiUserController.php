<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // 유저정보 가져올 때 보통 비밀번호는 가져오지 않음
    public function getuser($email)
    {
        $arr = [
            'code' => '0'
            ,'msg' => ''
        ];
        $user = DB::select('select name,email from users where email = ?', [$email]);
        if($user){
            $arr['code'] = '0';
            $arr['msg'] = 'Success Get User';
            $arr['data'] = $user[0];
        }else{
            $arr['code'] = 'E01';
            $arr['msg'] = 'No Data';
        }
        return $arr;
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postuser(Request $request)
    {
        $arr = [
            'code' => '0'
            ,'msg' => ''
        ];
        $result = DB::insert(
            'insert into users(name,email,password)valuse(?,?,?)',
            [$request->name,$request->email,Hash::make($request->password)]);

        if($result){
            $arr['code'] = '0';
            $arr['msg'] = 'Success Registration';
            $arr['data'] = [$request->email];
        }else{
            $arr['code'] = 'E01';
            $arr['msg'] = 'Failed Registration';
        }
        return $arr;
    

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putuser(Request $request, $email)
    {
        $arr = [
            'code' => '0'
            ,'msg' => ''
        ];
        $result = DB::update(
            'update users set name = ? where email = ?',
            [$request->name,$email]);

        if($result){
            $arr['code'] = '0';
            $arr['msg'] = 'Success update';
            $arr['data'] = [$request->name];
        }else{
            $arr['code'] = 'E01';
            $arr['msg'] = 'Failed update';
        }
        return $arr;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteuser($email)
    {
        $arr = [
            'code' => '0'
            ,'msg' => ''
        ];
        $date = Carbon::now();

        $result = DB::update(
            'update users set deleted_at = ?, deleted_flg = ? where email = ?',
            [   $date
                ,'1'
                ,$email]);

        if($result){
            $arr['code'] = '0';
            $arr['msg'] = 'Success delete';
            $arr['data'] = ['deleted_at'=> $date, 'email' => $email];
        }else{
            $arr['code'] = 'E01';
            $arr['msg'] = 'Failed delete';
        }

        return $arr;

    }
}
