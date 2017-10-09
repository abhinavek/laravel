@extends('main')
@section('title',' | Tags')
@section('content')
    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead><th>#</th><th>Name</th><th>Created On</th></thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr><td>{{$tag->id}}</td><td>{{$tag->name}}</td><td>{{$tag->created_at}}</td></tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $tags->links() !!}
            </div>
        </div>
        <div class="col-md-3">
            <div class="well">
                {!! Form::open(['route'=>'tags.store','method'=>'post']) !!}
                <h2>New Tags</h2>
                {{Form::label('name','Tag Name')}}
                {{Form::text('name','',['class'=>'form-control'])}}
                <br>
                {{Form::submit('Create',['class'=>'btn btn-primary btn-block'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection