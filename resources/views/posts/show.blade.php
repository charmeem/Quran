@extends('main')

@section('title', '| View Posts')

@section('content')
    <div class="jumbotron">
        <h2>Listen and learn the Secrets of Success through Quran</h2>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-8">
            <h3>{{$post->title}}</h3>
            <p class="lead">{{$post->body}} </p>
        </div>

        <div class="col-md-4">
            <div class="card card-body bg-light">
                <dl classs="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{$post->created_at}}</dd>
                </dl>

                <dl classs="dl-horizontal">
                    <dt>Updated at:</dt>
                    <dd>{{$post->updated_at}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{route('post.edit', [$post->id])}}" class="btn btn-primary btn-block">Edit</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('post.destroy', [$post->id])}}" class="btn btn-danger btn-block">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- top row -->



@endsection