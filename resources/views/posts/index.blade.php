@extends('main')
@section('tittle',' | New Post')
@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-danger" role="alert">{{session('status')}}</div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif
            <div class="col-md-8">
                <h1>All Posts</h1>
                <hr>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Menu</h2>
                <a href="{{route('posts.create')}}" class="btn btn-success">Create a blog</a>
            </div>
            <hr>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Tittle</th>
                <th>Body</th>
                <th>Created At</th>
                <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr><td>{{$post->id}}</td>
                        <td><a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a></td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at}}</td>
                        <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a><a href="{{route('posts.destroy',$post->id)}}" class="btn btn-danger">Delete</a> </td></tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $posts->links() !!}
            </div>

        </div>
    </div>
@endsection