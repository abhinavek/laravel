@extends('main')
@section('tittle','| Register')
@section('content')
    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endif
        <div class="col-md6 col-md-offset-3">
            {!! Form::open() !!}
                {{Form::label('name','Name')}}
                {{Form::text('name','',["class"=>"form-control"])}}
                {{Form::label('email','Email','Email')}}
                {{Form::email('email','',["class"=>"form-control"])}}
                {{Form::label('password','Password')}}
                {{Form::password('password',["class"=>"form-control"])}}
                {{Form::label('password_confirmation','Confirm Password')}}
                {{Form::password('password_confirmation',["class"=>"form-control"])}}
                {{Form::submit('Register',["class"=>"btn btn-primary form-","style"=>"margin-top: 10px;"])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection