@extends('main')
@section('tittle',' | Login')
@section('content')
    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endif
        @if(isset($status))
                <div class="alert alert-success" role="alert">{{$status}}</div>
        @endif
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open() !!}
                {{Form::label('email',"Email")}}
                {{Form::email('email',null,['class'=>'form-control'])}}
                {{Form::label('Password',"Password")}}
                {{Form::password('password',['class'=>'form-control'])}}
                <br>
                {{Form::checkbox('remember')}}{{Form::label('remember',"Remember me")}}
                <br>
                {{Form::submit('Login',["class"=>"btn btn-primary","style"=>"float: right;"])}}
                <p><a href="{{url('password/email')}}">Forgot password</a> </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
