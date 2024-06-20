<header class="mb-20">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ route('site.index') }}">My Website</a>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    @if (Auth::check())
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#">Profile</a>
                        <a class="nav-link" href="{{ route('site.logout') }}">Logout</a>
                        <a class="nav-link" href="{{ route('resume.create') }}">Create Resume</a>
                    </li>
                    @else
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="{{ route('site.login') }}">Login</a>
                        <a class="nav-link" href="{{ route('site.register') }}">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
<div class="container">
    @yield('content')
</div>
