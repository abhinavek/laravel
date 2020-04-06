@extends('main')
@section('title',' | Categories')
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
            <h1>Categories</h1>
            <table class="table" id="categoryTable">
                <thead><th>#</th><th>Name</th><th>Created On</th></thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr><td class="categoryId">{{$category->id}}</td><td class="categoryName">{{$category->category_name}}</td><td>{{$category->created_at}}</td>
                            <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
                            <td>{!! Form::open(['route'=>['categories.destroy',$category->id],'method'=>'DELETE']) !!}
                                {!! Form::submit('Delete',['class'=>'btn btn-danger','onclick' => 'return ConfirmDelete()']) !!}
                                {!! Form::close() !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $categories->links() !!}
            </div>
        </div>
        <div class="col-md-3">

            @if(isset($categoryone))
            <div class="well" id="edit">
                <h2>Edit Category</h2>
                {!! Form::open(['route'=>['categories.update',$categoryone->id],'method'=>'PUT']) !!}
                {{ Form::hidden('id',$categoryone->id) }}
                {{Form::label('category_name','Category Name')}}
                {{Form::text('category_name',$categoryone->category_name,['class'=>'form-control'])}}
                <br>
                {{Form::submit('Update',['class'=>'btn btn-primary btn-block updatebtn'])}}
                {{Form::close()}}
            </div>
            @else
            <div class="well" id="create">
                {!! Form::open(['route'=>'categories.store','method'=>'post']) !!}
                <h2>New Category</h2>
                {{Form::label('category_name','Category Name')}}
                {{Form::text('category_name','',['class'=>'form-control'])}}
                <br>
                {{Form::submit('Create',['class'=>'btn btn-primary btn-block'])}}
                {!! Form::close() !!}
            </div>
        @endif

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{!! asset('js/app/categories.js') !!}"></script>
@endsection