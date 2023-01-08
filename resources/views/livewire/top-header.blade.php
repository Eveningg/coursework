<div>
    
<header class="navbar navbar-expand-md navbar-light d-print-none sticky-top">
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3"></h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad amet consectetur exercitationem fugiat in ipsa ipsum, natus odio quidem quod repudiandae sapiente. Amet debitis et magni maxime necessitatibus ullam.
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url({{ $author->picture }})"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>{{ $author->name }}</div>
                  <div class="mt-1 small text-muted">{{ $author->username }}</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="{{ route('author.profile') }}" class="dropdown-item">Profile</a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('author.logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                <form action="{{ route('author.logout') }}" id="logout-form" method="POST">@csrf</form>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('author.categories') }}" >
                    <span class="nav-link-title">
                      Categories
                    </span>
                  </a>
                </li>

                @if( auth()->user()->type == 1)
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('author.authors') }}" >
                    <span class="nav-link-title">
                      Authors
                    </span>
                  </a>
                </li>
                @endif
         
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-title">
                      Posts
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('author.posts.add-post') }}" >
                      Add New
                    </a>
                    <a class="dropdown-item" href="{{ route('author.posts.all_posts') }}" >
                      All Posts
                    </a>
                  </div>
                </li>
                <li class="nav-item active dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                    <span class="nav-link-title">
                      Settings
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('author.settings')}}">
                        General Settings
                    </a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </header>

</div>
