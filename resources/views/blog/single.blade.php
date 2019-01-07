@extends('main')

<!-- use e To avaoid XSS attack -->
@section('title', "|" . e($post->title))

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto my-5">
            <h1>{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <hr>
            <p>Posted In: {{$post->category->name}}</p>
        </div>
    </div>

<div class="row">
    <div class="comment-form mx-auto my-5">

        <h5 ><i class="fas fa-comment"></i>  {{$post->comments()->count()}} Comments:</h5>

        @foreach($post->comments as $comment)
            <div class="comment">
                <div class="author-info">
                    <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email)))}}"  class="author-image float-left">
                    <div class="author-name float-left">
                        <small><strong>{{$comment->name}}</strong></small>
                        <p class="author-date mb-3 ">{{$comment->created_at}} </p>
                    </div>

                </div>
                <div class="comment-content">
                    {{$comment->comment}}
                </div>
            </div>
            <hr>
        @endforeach

        <h5 class="my-5">Post your Comments below:</h5>
        <form action="{{route('comments.store', $post->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label name="name">Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label name="comment">Comment:</label>
                        <textarea name="comment" class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value ="Enter">
        </form>
    </div>
</div>
@endsection
