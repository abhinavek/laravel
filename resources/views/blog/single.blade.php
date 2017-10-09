@extends('main')
@section('tittle',' | New Post')
@section('content')
    <div class="row">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif
        <div class="col-md-8">
            <h1>{{$post->title}}</h1>
            <p class="lead">{{$post->body}}</p>
            <hr>
            <p>Posted in {{$post->category->category_name}}</p>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at : </dt>
                    <dt>{{$post->created_at}}</dt>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last update : </dt>
                    <dt>{{$post->updated_at}}</dt>
                </dl>
                <div class="row">
                    <div class="col-sm-6"><a href="/" class="btn btn-primary">All posts</a> </div>
                </div>

            </div>
        </div>
    </div>
    @endsection