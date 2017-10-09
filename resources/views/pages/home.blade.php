@extends('main')
@section('tittle',' | Home')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron">
            <h1>Welcome to My Blog!</h1>
            <p class="lead">Thank you so much for visiting. This is my test website built with Laravel. Please read my popular post!</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
        </div>
    </div>
</div>
<!-- end of header .row -->

<div class="row">
    @foreach($posts as $post)
    <div class="col-md-8">
        <div class="post">
            <h3>{{$post->title}}</h3>
            <p>{{$post->body}}</p>
            <a href="{{route('blog.single',$post->slug)}}" class="btn btn-primary">Read More</a>
        </div>
        <hr>
    </div>
    @endforeach
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>
        <div class="col-md-3 col-md-offset-1">
        <h2>Sidebar</h2>
    </div>
</div>
@endsection