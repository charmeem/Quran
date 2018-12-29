@extends ('main')

@section ('title', '| Edit Post')

<!-- Adding client side js based form validation + select options plugin-->
@section('styles')
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/select2.min.css')}}">
@endsection

@section ('content')
    <div class="jumbotron">
        <h2>learn the Secrets of Success through Quran</h2>
    </div>

    <hr>
    <div class="row">
        <div class="col-md-12">
        <form method="post"  class="row form" action="{{route('post.update', $post->id)}}">
            @method('PUT')
            @csrf
        <div class="col-md-8">
                <div class="form-group">
                    <label name="title">Title:</label>
                    <input id="title" type='text' name="title" class="form-control" maxlength="50" required="true" value="{{old('title', $post->title)}}">
                </div>

                <div class="form-group">
                    <label name="slug">Slug:</label>
                    <textarea id="slug" name="slug" class="form-control" required="true" >{{old('slug', $post->slug)}}</textarea>
                </div>

                <div class="form-group">
                    <label name="category_id">Category:</label>
                    <select name="category_id" class="form-control">

                        <!-- Took some time to find below solution thanks to laracast -->
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$selcat==$category->id ? 'selected="selected"': ''}}> {{$category->name}}</option>
                        @endforeach

                    </select>
                </div>

            <div class="form-group">
                <label name="tags">Tags:</label>
                <select class="select2-multi form-control" name="tags[]" multiple="multiple">

                    <!-- Took some time to find below solution thanks to laracast -->
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}" }}>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

                <div class="form-group">
                    <label name="body">Content:</label>
                    <textarea id="body" name="body" class="form-control" required="true" >{{old('body', $post->body)}}</textarea>
                </div>
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
                        <input type="submit" value="Save me" class="btn btn-success btn-block">
                    </div>
                </div>
            </div>
        </div>

    </form>
    </div> <!-- col-12 -->
 </div> <!-- top row -->

@stop

<!-- client side js form validation plugin + Selecxt list Jquery plugin-->
@section('scripts')
    <script language="javascript" src="{{asset('js/select2.min.js')}}"></script>
    <script type="text/javascript">
        $('.select2-multi').select2();
        //Adding script to get old tag values set
        $('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
    </script>
@endsection