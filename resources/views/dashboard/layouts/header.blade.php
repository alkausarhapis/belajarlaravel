<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Belajar laravel</a>
    <input class="form-control shadow-none w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav bg-black p-1">
      <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 border-0">Logout</button>
      </form>
    </div>
      
  </header>