@extends('main')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="display-4">Quran, Your Divine Guidance.</h1>

                    <p class="lead">This is a humble effort to introduce us, the last divine Message send to
                        us through the last divine Prophet Muhammad (may Allah's peace and blessing upon him).</p>

                    {{--<hr class="my-4">--}}

                    {{--<p>وَلَقَدْ خَلَقْنَاكُمْ ثُمَّ صَوَّرْنَاكُمْ ثُمَّ قُلْنَا لِلْمَلَائِكَةِ اسْجُدُوا لِآدَمَ فَسَجَدُوا إِلَّا إِبْلِيسَ لَمْ يَكُن مِّنَ السَّاجِدِينَ </p>--}}
                    {{--<p>And We have certainly created you, [O Mankind], and given you [human] form. Then We said to the angels, "Prostrate to Adam"; so they prostrated, except for Iblees. He was not of those who prostrated.</p>--}}

                        {{--<a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>--}}
                  </div>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-md-8">
            @foreach($posts as $post)
                <h3>{{$post->title}}</h3>
                <p>{{substr($post->body, 0, 300)}}{{strlen($post->body) > 300 ? ". . ." : ""}}</p>
                <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Continue reading</a>
                <hr>
            @endforeach


            </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2>
            </div>

        </div> <!-- row -->

@endsection