<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BoardsController extends Controller
{

    public function index(){
        $result =  DB::select("select id, title, write_user_id, content from boards ");
        
        return view('list')->with('data',$result);
    }

    public function write(){
        return view('listinsert');
    }
    public function store(Request $request){
        $validate = Validator::make($request->only('content','title'),[
            'title' => 'required|max:100'
            ,'content' => 'required|max:2000'
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        }
        // $result = new Boards(['title'=>]);
        $date = Carbon::now();
        $result = DB::insert('insert into boards ( title, content, created_at, updated_at, write_user_id ) values( ? , ? , ?, ?, ? )',[ $request->title, $request->content, $date , $date , 1 ]);
        // $result->save();
        return redirect()->route('boards.index');
    }
}
