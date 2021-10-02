<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles/extras.1.1.0.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles/shards-dashboards.1.1.0.min.css') }}" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body class="h-100">

  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
              <div class="d-table m-auto">
                <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="{{ asset( 'images/sea_fare_logo.png' ) }}" alt="SeaFare Dashboard">
                <span class="d-none d-md-inline ml-1">SeaFare Dashboard</span>
              </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
              <i class="material-icons">&#xE5C4;</i>
            </a>
          </nav>
        </div>
        <div class="nav-wrapper">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link {{ ( request()->route()->getName() == 'dashboard' ) ? 'active' : '' }}" href="{{ route( 'dashboard' ) }}">
                <i class="material-icons">dashboard</i>
                <span>Dashbboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( request()->route()->getName() == 'clients' ) ? 'active' : '' }}" href="{{ route( 'clients' ) }}">
                <i class="material-icons">people</i>
                <span>Clients</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( request()->route()->getName() == 'ships' ) ? 'active' : '' }}" href="{{ route( 'ships' ) }}">
                <i class="material-icons">directions_boat</i>
                <span>Ships</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( request()->route()->getName() == 'routes' ) ? 'active' : '' }}" href="{{ route( 'routes' ) }}">
                <i class="material-icons">map</i>
                <span>Routes</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( request()->route()->getName() == 'sails' ) ? 'active' : '' }}" href="{{ route( 'sails' ) }}">
                <i class="material-icons">sailing</i>
                <span>Sails</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ( request()->route()->getName() == 'graphs' ) ? 'active' : '' }}" href="{{ route( 'graphs' ) }}">
                <i class="material-icons">analytics</i>
                <span>Graphs</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End Main Sidebar -->
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- Main Navbar -->
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <ul class="navbar-nav border-left flex-row ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  <img class="user-avatar rounded-circle mr-2" src="{{ asset( 'images/avatars/myAvatar.png' ) }}" alt="User Avatar">
                  <span class="d-none d-md-inline-block">Sierra Brooks</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                  <a class="dropdown-item" href="user-profile-lite.html">
                    <i class="material-icons">&#xE7FD;</i> Profile</a>
                  <a class="dropdown-item" href="components-blog-posts.html">
                    <i class="material-icons">vertical_split</i> Blog Posts</a>
                  <a class="dropdown-item" href="add-new-post.html">
                    <i class="material-icons">note_add</i> Add New Post</a>
                  <div class="dropdown-divider"></div>
                  @guest
                  @else
                    <a 
                      class="dropdown-item text-danger" 
                      href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                      <i class="material-icons text-danger">&#xE879;</i> {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  @endguest
                </div>
              </li>
            </ul>
            <nav class="nav">
              <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
              </a>
            </nav>
          </nav>
        </div>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          @yield( 'content' )
        </div>
        <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
          <span class="copyright ml-auto my-auto mr-2">Copyright © {{ date( 'Y' ) }}
            <a href="#" rel="nofollow">TheThreeMembers</a>
          </span>
        </footer>
      </main>
    </div>
  </div>

</body>
</html>