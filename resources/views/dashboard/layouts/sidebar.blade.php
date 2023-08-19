<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary p-2">
    <div class="offcanvas-lg offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <h6 class="text-muted">User</h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'text-primary' : 'text-dark' }}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center {{ Request::is('dashboard/posts*') ? 'text-primary' : 'text-dark' }} gap-2" href="/dashboard/posts">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Post
            </a>
          </li>
          <hr>

          @canany(['petugas', 'admin'])
          <h6 class="text-muted">Administrator</h6>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'text-primary' : 'text-dark' }}" aria-current="page" href="/dashboard/categories">
                <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                Categories
              </a>
            </li>
          </ul>
          <hr>
          @endcan
          
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="/blog">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Home
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>