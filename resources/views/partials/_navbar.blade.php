<!-- NAVBAR COPIED FROM BS4 OFFICIAL PAGE -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">The Reminder</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link {{Request::is('/') ? 'active': ""}}" href="/">Home</a>
            <a class="nav-item nav-link {{Request::is('categories') ? 'active': ""}} " href="/categories">Categories</a>
            <a class="nav-item nav-link {{Request::is('faq') ? 'active': ""}} " href="/faq">Ask Question</a>
            <a class="nav-item nav-link {{Request::is('contact') ? 'active': ""}} " href="/contact">Contact</a>
        </div>

    </div>
</nav>