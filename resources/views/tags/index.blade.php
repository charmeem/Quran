@extends('main')

@section('title', '| All Tags')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Tags</h1>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tag</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td><a href="{{route('tags.show', $tag)}}">{{$tag->name}}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- .col-md-8 -->

        <!-- Form -->
        <div class="col-md-3">
            <div class="well">

                <form action="{{route('tags.store')}}" method="POST">
                    {{csrf_field()}}
                    <label name="name">Enter Tag name:</label>
                    <input id="name"  type='text' name="name" class="form-control" value="">

                    <input type="submit" class="btn btn-primary mb-5 mt-3" value ="Submit">
                </form>
            </div>
        </div>

    </div>
@endsection