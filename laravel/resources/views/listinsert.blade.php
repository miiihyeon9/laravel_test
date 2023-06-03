@extends('layout.layout')
@section('title','List')



@section('contents')
    @include('layout.errors')
    <form action="{{route('boards.store')}}" method="post">
        @csrf
        <label for="title">Title : </label>
        <input type="text" name="title" id="title" placeholder="제목">
        <br>
        <label for="content">Conetent : </label>
        <input type="text" name="content" id="content" placeholder="내용">
        <br>
        <button type="submit">작성하기</button>
    
    </form>
@endsection