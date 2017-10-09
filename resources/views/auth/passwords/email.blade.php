@extends('main')
@section('title',' | Forgot password')
@section('content')
    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-success" role="alert">{{$error}}</div>
            @endforeach
        @endif
        @if (session('status'))
                <div class="alert alert-success" role="alert">{{session('status')}}</div>
        @endif
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'password/email', 'method'=>'POST']) !!}
                    {{Form::label('email','Email')}}
                    {{Form::email('email','',['class'=>'form-control'])}}
                    <br>
                    {{Form::submit('Reset Password',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection