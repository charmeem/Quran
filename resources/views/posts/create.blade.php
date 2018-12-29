@extends('main')
@section('title', '| Create new post')


<!-- Adding client side js based form validation + select options plugin-->
@section('styles')
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2> Create New Post</h2>

            <hr>

            <form method="post" data-parsley-validate="true" action="{{route('post.store')}}">

                @csrf

                <div class="form-group">
                    <label name="title">Title:</label>
                    <input id="title" type='text' name="title" class="form-control" maxlength="50" required="true">
                </div>

                <div class="form-group">
                    <label name="slug">Slug:</label>
                    <input id="slug" type='text' name="slug" class="form-control" maxlength="255" required="true">
                </div>

                <div class="form-group">
                    <label name="category_id">Category:</label>
                    <select class="form-control" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
               </div>

                <div class="form-group">
                    <label name="tags">Tags:</label>
                    <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label name="body">Content:</label>
                    <textarea id="body" name="body" class="form-control" required="true"></textarea>
                </div>

                <input type="submit" class="btn btn-success" value ="Enter">

            </form>
        </div>
    </div>

@endsection

<!-- client side js form validation plugin + Selecxt list Jquery plugin-->
@section('scripts')
    <script language="javascript" src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection

