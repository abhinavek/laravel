@extends('main')
@section('tittle',' | '.$post->title)
@section('content')
    <div class="row">
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
        @endif
            <div class="col-md-8">
                <h1>{{$post->title}}</h1>
                <p class="lead">{{$post->body}}</p>
                <hr>
                <div class="col-lg-12">
                    <div class="col-md-4">
                        @foreach($post->images as $image)
                            <img src="{{ URL::asset($image->image) }}" class="img-responsive img-bordered well">
                        @endforeach
                    </div>
                </div>
                <div class="tags">
                <p>Tags : </p>
                @foreach($post->tags as $tag)
                    <span class="label label-default">{{$tag->name}}</span>
                @endforeach
                </p>
                </div>
            </div>
            <div class="col-md-4" style="padding-top: 20px;">
                <div class="well">
                    <dl class="dl-horizontal">
                        <dt>Slug : </dt>
                        <dd><a href="{{route('blog.single',$post->slug)}}">{{$post->slug}}</a> </dd>
                    </dl>
                    <p class="lead">Posted in <span style="color: #2e6da4;">{{$post->category->category_name}}</span></p>
                    <dl class="dl-horizontal">
                        <dt>Created at : </dt>
                        <dd>{{date('d-m-Y G:i',strtotime($post->created_at))}}</dd>
                    </dl>
                    <dl class="dl-horizontal">
                        <dt>Last update : </dt>
                        <dd>{{$post->updated_at}}</dd>
                    </dl>
                    <div class="row">
                        <div class="col-sm-6"><a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a></div>
                        {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
    </div>
@endsection