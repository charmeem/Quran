<!doctype html>
<html lang="en">

    <!-- This also incluse link to common css file -->
    @include('partials._head')

    @yield('styles') <!-- for customized stylesheets for some pages -->

    <body>

       @include('partials._navbar')

        <div class="container">

            @include('partials._messages')

            @yield('content')

        </div>  <!-- .container -->

        @include('partials._scripts') <!--use this for scripts needs for all pages-->

        @yield('scripts') <!--This is for customized scripts needed on some pages -->

    </body>
</html>
