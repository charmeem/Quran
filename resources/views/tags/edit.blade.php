@extends('main')

@section('title', '| Edit Tag')

@section('content')
    <div class="row">
        <div class="col-md-8">
    <form action= "{{ route('tags.update', $tag->id)}}" method="POST">
        @method('PUT')
        @csrf
        <label name="name"></label>
        <input type="text" name="name" class="form-control mb-3" value="{{$tag->name}}">
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
        </div>
    </div>
@endsection