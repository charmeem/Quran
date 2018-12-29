@extends('main')

@section('title', '| Tags and Posts')

@section('content')
<div class="row my-3">
    <div class="col-md-8">
        <h2>{{$tag->name}} <small> Tag - {{$tag->posts()->count()}} Posts</small> </h2>
    </div>
    <div class="col-md-2">
        <a href="{{route('tags.edit', $tag)}}" class="btn btn-primary">Edit</a>
    </div>
    <div class="col-md-2">
        <form action="{{route('tags.destroy', $tag)}}" class="form" method="POST">
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger">
            @csrf
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Post Title</th>
                <th>Tags</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tag->posts as $post)
            <tr>
                <th>{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>
                    @foreach($post->tags as $tag)
                        <span class="badge badge-dark">{{$tag->name}}</span>
                    @endforeach
                </td>
                <td><a href="{{route('post.show', $post)}}" class="badge badge-dark">View</a></td>
            </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection