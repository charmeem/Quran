@extends('main')

@section('title', '| All Categories')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Categories</h1>

            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th>{{$category->id}}</th>
                    <td>{{$category->name}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div> <!-- .col-md-8 -->

        <!-- Form -->
        <div class="col-md-3">
            <div class="well">

                <form action="{{route('categories.store')}}" method="POST">
                    {{csrf_field()}}
                    <label name="name">Enter Category name:</label>
                    <input id="name"  type='text' name="name" class="form-control" value="">

                    <input type="submit" class="btn btn-primary mb-5 mt-3" value ="Submit">
                </form>
            </div>
        </div>

    </div>
@endsection