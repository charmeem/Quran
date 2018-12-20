@extends('main')
@section('title', '| Create new post')


<!-- Adding client side js based form validation -->
@section('styles')
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
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
                    <label name="body">Content:</label>
                    <textarea id="body" name="body" class="form-control" required="true"></textarea>
                </div>

                <input type="submit" class="btn btn-success" value ="Send Message">

            </form>
        </div>
    </div>

@endsection

<!-- client side js form validation plugin -->
@section('scripts')
    <script language="javascript" src="{{asset('js/parsley.min.js')}}"></script>
@endsection