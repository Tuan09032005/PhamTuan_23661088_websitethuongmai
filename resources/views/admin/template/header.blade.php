<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PhamTuan</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Theme overrides -->
  <link href="/css/theme.css" rel="stylesheet">
  <!-- Admin specific styles -->
  <link href="/css/admin.css" rel="stylesheet">

  <style>
    /* NAVBAR */
    .navbar-custom {
      background: linear-gradient(90deg, #0284c7, #6a5acd);
      box-shadow: 0 4px 16px rgba(0,0,0,0.12);
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    .navbar-custom .nav-link {
      color: #e0e7ff !important;
      font-weight: 500;
      font-size: 1rem;
      padding: 8px 14px !important;
      transition: 0.25s ease;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active {
      color: #facc15 !important;
      transform: translateY(-2px);
      text-shadow: 0 0 8px rgba(255,255,255,0.6);
    }

    .navbar-brand {
      font-size: 1.5rem;
      letter-spacing: 0.5px;
      color: white !important;
    }

    .navbar-toggler {
      border-color: rgba(255,255,255,0.5);
    }

    .navbar-toggler-icon {
      filter: brightness(0) invert(1);
    }
  </style>
</head>

<body>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-custom py-2">
  <div class="container">

    <a class="navbar-brand fw-bold me-3" href="/home">Pham Tuan</a>

    <!-- mobile search -->
    <form class="d-flex d-lg-none ms-auto" role="search" method="GET" action="{{ url('products') }}">
      <input name="q" class="form-control form-control-sm" type="search" placeholder="Tìm sản phẩm..." aria-label="Search">
    </form>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-lg-center">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="/products">Sản phẩm</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">Về chúng tôi</a>
        </li>

        @if(Session::get('logged_in'))
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Quản trị</a>
            <ul class="dropdown-menu" aria-labelledby="adminMenu">
              <li><a class="dropdown-item" href="/admin/danh-sach-nguoi-dung">Quản lí người dùng</a></li>
              <li><a class="dropdown-item" href="/admin/danh-sach-san-pham">Quản lí sản phẩm</a></li>
            </ul>
          </li>
        @endif
      </ul>

      <div class="d-flex align-items-center">
        <form class="d-none d-lg-flex me-3" role="search" method="GET" action="{{ url('products') }}">
          <input name="q" class="form-control form-control-sm" type="search" placeholder="Tìm sản phẩm..." aria-label="Search">
        </form>

        @if(Session::get('logged_in'))
          <span class="text-warning fw-semibold me-3 d-none d-lg-inline">{{ Session::get('user_fullname') }}</span>
          <a class="btn btn-danger btn-sm" href="/admin/logout">Đăng xuất</a>
        @else
          <a class="btn btn-light fw-semibold px-3" href="/admin/login">Đăng nhập</a>
        @endif
      </div>
    </div>
  </div>
</nav>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
