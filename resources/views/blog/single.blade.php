@extends('main')

@section('title', "| $post->title")

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <p>Posted In: {{$post->category->name}}</p>
        </div>
    </div>
@endsection