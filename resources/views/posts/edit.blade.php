@extends('main')

@section('title', '| Edit Blog Post')

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    {{--<script>--}}
        {{--tinymce.init({--}}
            {{--selector: 'textarea',--}}
            {{--plugins: 'link code',--}}
            {{--menubar: false--}}
        {{--});--}}
    {{--</script>--}}

@section('content')

    <div class="row">
        @if(count($errors)>0)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
            @endforeach
        @endif
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}
            {{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
            {{ Form::label('slug', "Body:", ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}
            {{ Form::label('category','Category:')}}
            {{ Form::select('category',$categories,$post->category_id,['class'=>'form-control'])}}
            {{ Form::label('tags','Tags:')}}
            {{ Form::select('tags[]',$tags,'',['class'=>'select2-multi form-control','multiple'=>'multiple'])}}
            <br>
            {{--<select id="tags" name="tags[]" class="form-control select2-multi" multiple="multiple">--}}
                {{--@foreach($tags as $tag)--}}
                    {{--<option value="{{$tag->id}}">{{$tag->name}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>	<!-- end of .row (form) -->

@endsection
@section('styles')
    {{Html::style('css/select2.min.css')}}
@endsection
@section('scripts')
    {!! Html::script('js/select2.full.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection