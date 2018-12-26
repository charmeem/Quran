@extends('main')

@section('title', '| Blog')

@section('content')
    <div class="row ml-3 mb-2">
        <div class="col-md-8">
            <h1>Blog</h1>
        </div>
    </div>

    <div class="row ml-3">
        <div class="col-md-8 ">
            @foreach($posts as $post)
                <h2>{{$post->title}}</h2>
                <h6>Published: {{date('M j, Y',strtotime($post->created_at)) }}</h6>

                <p>{{substr($post->body, 0, 255)}}{{strlen($post->body) > 250 ? "..." : ""}}</p>

                <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>
                <hr>
            @endforeach
        </div>
    </div>

    <div class="row ">
        <div class="col-md-12  ml-3 mt-4">
                {!! $posts->links() !!}
        </div>
    </div>
@endsection