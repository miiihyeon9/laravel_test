@extends('layout.layout')
@section('title','login')



@section('contents')
    <form action="{{route('user.login.post')}}" method="post">
        {{-- csrf하면 토큰 생성  --}}
        @csrf
        <input type="text" id="id" name="id" placeholder="ID">
        <br>
        <input type="text" name="password" id="pasword" placeholder="PASSWORD">
        <br>
        <button type="submit">Login</button>
    </form>
@endsection