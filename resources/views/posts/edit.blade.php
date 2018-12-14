@extends ('main')

@section ('title', '| Edit Post')

@section ('content')
    <div class="jumbotron">
        <h2>learn the Secrets of Success through Quran</h2>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-8">

            <form method="post" data-parsley-validate="true" action="{{route('post.update', $post->id)}}">
                @csrf
                <div class="form-group">
                    <label name="title">Title:</label>
                    <input id="title" type='text' name="title" class="form-control" maxlength="50" required="true" value="{{old('title', $post->title)}}">
                </div>
                <div class="form-group">
                    <label name="body">Content:</label>
                    <textarea id="body" name="body" class="form-control" required="true" >{{old('body', $post->body)}}</textarea>
                </div>

            </form>

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
                        <a href="{{route('post.show', [$post->id])}}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('post.update', [$post->id])}}" class="btn btn-success btn-block">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- top row -->

@stop