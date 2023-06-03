@extends('layout.layout')
@section('title','List')



@section('contents')
    @include('layout.errors')
    <a href="{{route('boards.write')}}">작성하기</a>
    @forelse($data as $item)
        <p>{{$item->title}} : {{$item->content}} :{{$item->write_user_id}}</p>
    @empty
        <p>자료 없음</p>
    @endforelse
@endsection