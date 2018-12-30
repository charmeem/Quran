@extends('main')
@section('title', '| Contact')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Contact Us</h1>
                <hr>
                {{--<p>Your suggestion, queries are welcome :</p>--}}
            </div>

            <form action="{{url('contact')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label name="email">E mail:</label>
                    <input id="email" type='email' name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">
                    </textarea>
                </div>

                <input type="submit" class="btn btn-success" value ="Send Message">

            </form>


        </div>
    </div> <!-- .row -->
@endsection