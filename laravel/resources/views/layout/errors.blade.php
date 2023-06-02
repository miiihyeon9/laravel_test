@if( $errors->any() )
    {{-- $errors 객체이기 때문에 all()해서 불러오아와와와와와와ㅏ아아아아아ㅏ아아아아아 --}}
    @foreach($errors->all() as $error)
        <div style=" color:red ">{{$error}}</div>
    @endforeach
@endif


