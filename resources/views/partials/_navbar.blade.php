<!-- NAVBAR COPIED FROM BS4 OFFICIAL PAGE -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">The Reminder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link {{Request::is('/') ? 'active': ""}}" href="/">Home</a>
            <a class="nav-item nav-link {{Request::is('blog') ? 'active': ""}}" href="/blog">Blog</a>
            <a class="nav-item nav-link {{Request::is('categories') ? 'active': ""}} " href="/categories">Categories</a>
            <a class="nav-item nav-link {{Request::is('faq') ? 'active': ""}} " href="/faq">Ask Question</a>
            <a class="nav-item nav-link {{Request::is('contact') ? 'active': ""}} " href="/contact">Contact</a>
        </div>
    </div>

    <ul class="nav navbar-nav navbar-right" >
        @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{route('post.index')}}">Posts</a>
                        <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
                        <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
                        <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        @csrf
                    </div>
                </li>
        @else
           <a href="{{route('login')}}" class="btn btn-sm nav-link">Login</a>
        @endif
    </ul>
</nav>