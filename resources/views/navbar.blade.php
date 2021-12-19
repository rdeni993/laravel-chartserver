<nav class="navbar navbar-expand-md navbar-dark bg-primary d-flex">
    <div class="container justify-content-between">
        <div>
            <div class="navbar-brand">
                <a href="{{url('/')}}" class="text-white text-decoration-none">Graph</a>
            </div>
        </div>
        <div>
            <!-- Toogle -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ url('/logout') }}" class="nav-link text-light ms-3">Odjavi se</a>
                </li>
            </ul>
        </div>
    </div>
</nav>