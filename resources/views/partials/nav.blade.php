<nav class="navbar bg-primary navbar-expand-lg sticky-top p-2 navbar-dark">
    <div class="container-fluid container">
        <a class="navbar-brand" href="/">
            <h4 class="p-1"><b>Laravel</b> coba</h4>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link fs-5 {{ $title === "Home" ? 'active' : '' }}" href="/">Home</a>
                <a class="nav-link fs-5 {{ $title === "About" ? 'active' : '' }}" href="/about">About</a>
                <a class="nav-link fs-5 {{ $title === "Blog" ? 'active' : '' }}" href="/blog">Blog</a>
                <a class="nav-link fs-5 {{ $title === "Categories" ? 'active' : '' }}" href="/categories">Category</a>

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout <i class="ms-2 bi bi-box-arrow-right"></i></button>
                        </form>
                      </li>
                    </ul>
                  </li>
                @else
                <a href="/login" class="nav-link fs-5 text-danger fw-bold"><i class="bi bi-box-arrow-in-right me-2"></i>Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>