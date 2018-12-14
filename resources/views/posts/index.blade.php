@extends('main')

@section('title', '| All Posts')

@section('content')
    <div class="row my-4">
        <div class="col-md-10">
            <h3>List of all Posts</h3>
        </div>
        <div class="col-md-2">
            <a href="{{route('post.create')}}" class="btn btn-block btn-primary btn-sm">Create Post</a>
        </div>
    </div> <!-- end .row -->

    <div class="row">
        <table class="table">
            <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th></th>
            </thead>

            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{substr($post->body, 0, 50)}}{{strlen($post->body) > 50 ? " ...." : ""}}</td>
                        <td>{{date('M j,Y', strtotime($post->created_at))}}</td>
                        <td><a href="{{route('post.show', $post->id)}}" class="btn btn-success btn-sm">View</a> <a href="" class="btn btn-sm">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@stop  <!-- endsection can also be used here -->