@extends('main')
@section('tittle',' | New Post')
@section('content')
    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endif
        <div class="col-md-8">
            <h1>Create New Post</h1>
            {!! Form::open(['route' => 'posts.store','enctype' => "multipart/form-data"]) !!}
                {{Form::label('title','Title:')}}
                {{Form::text('title',null,array('class'=>'form-control'))}}
                {{Form::label('body','Post:')}}
                {{Form::textarea('body',null,array('class'=>'form-control'))}}
                {{Form::label('slug','Slug:')}}
                {{Form::text('slug',null,array('class'=>'form-control'))}}
                {{Form::label('category','Category:')}}
                <select name="category" id="category" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                {{Form::label('tags','Tags:')}}
                <select id="tags" name="tags[]" class="form-control select2-multi" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
                </select>
            <hr>
            {!! Form::file('image1', array('class' => 'image','id'=>'image1' ,'onchange'=>'imageview(this)')) !!}
            <img src="#" id="image1image">
            {!! Form::file('image2', array('class' => 'image','id'=>'image2' ,'onchange'=>'imageview(this)')) !!}
            <img src="#" id="image2image">
            {!! Form::file('image3', array('class' => 'image','id'=>'image3' ,'onchange'=>'imageview(this)')) !!}
            <img src="#" id="image3image">
            <hr>
                {{Form::submit('submit',array('class'=>'btn btn-success btn-lg','style'=>'margin-top:10px;'))}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('styles')
    {{Html::style('css/select2.min.css')}}
@endsection
@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    {{Html::script('js/select2.full.min.js')}}
    {{Html::script('js/app/posts.js')}}
    {{Html::script('js/app/imageview.js')}}
@endsection