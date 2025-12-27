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
    /* NAVBAR - white theme, minimal & elegant */
    :root{
      --nav-bg: #ffffff;
      --nav-text: #1f2937; /* gray-800 */
      --nav-accent: #0d6efd; /* bootstrap primary */
      --nav-muted: rgba(15,23,42,0.04);
      --btn-border: rgba(15,23,42,0.06);
    }

    .navbar-custom{
      background: var(--nav-bg) !important;
      border-bottom: 1px solid var(--btn-border);
      box-shadow: 0 2px 8px rgba(15,23,42,0.04);
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    .navbar-custom .nav-link{
      color: var(--nav-text) !important;
      font-weight: 500;
      font-size: 0.98rem;
      padding: 8px 12px !important;
      transition: color 0.18s ease, background 0.12s ease;
      border-radius: 6px;
    }

    .navbar-custom .nav-link:hover,
    .navbar-custom .nav-link.active{
      color: var(--nav-accent) !important;
      background: var(--nav-muted);
    }

    .navbar-brand{
      font-size: 1.15rem;
      letter-spacing: 0.3px;
      color: var(--nav-text) !important;
      display: inline-flex;
      align-items: center;
      gap: 10px;
    }

    .brand-mark{
      width: 36px;
      height: 36px;
      display:inline-flex;
      align-items:center;
      justify-content:center;
      border-radius:8px;
      background: var(--nav-accent);
      color: #fff;
      font-weight:700;
      font-size:0.95rem;
    }

    .navbar-toggler{
      border-color: var(--btn-border);
    }

    .navbar-toggler-icon{
      filter: none;
      color: var(--nav-text);
    }

    /* Buttons inside navbar */
    .btn-navbar{
      background: transparent;
      color: var(--nav-text);
      border: 1px solid var(--btn-border);
      border-radius: 8px;
      padding-top: 6px;
      padding-bottom: 6px;
    }

    .btn-navbar:hover{
      background: var(--nav-accent);
      color: #fff;
      border-color: var(--nav-accent);
    }

    .badge-custom{
      background: var(--nav-accent);
      color: #fff;
      border-radius:12px;
      padding:4px 8px;
      font-size:0.78rem;
    }
  </style>
</head>

<body>

<!-- NAVIGATION -->
<nav class="navbar navbar-expand-lg navbar-custom py-2">
  <div class="container">

    <a class="navbar-brand fw-bold me-3" href="/home">
      <span class="brand-mark">PT</span>
      <span class="d-none d-sm-inline">Pham Tuan</span>
    </a>

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

        <li class="nav-item">
          <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact">Liên hệ</a>
        </li>

        @if(Session::get('user_role') == 1)
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Quản trị</a>
            <ul class="dropdown-menu" aria-labelledby="adminMenu">
              <li><a class="dropdown-item" href="/admin/danh-sach-nguoi-dung">Quản lí người dùng</a></li>
              <li><a class="dropdown-item" href="/admin/danh-sach-danh-muc">Quản lí danh mục</a></li>
              <li><a class="dropdown-item" href="/admin/danh-sach-san-pham">Quản lí sản phẩm</a></li>
              <li><a class="dropdown-item" href="/admin/danh-sach-don-hang">Quản lí đơn hàng</a></li>
            </ul>
          </li>
        @endif
      </ul>

      <div class="d-flex align-items-center">
        <form class="d-none d-lg-flex me-3" role="search" method="GET" action="{{ url('products') }}">
          <input name="q" class="form-control form-control-sm" type="search" placeholder="Tìm sản phẩm..." aria-label="Search">
        </form>

        <!-- Cart button -->
        <a href="{{ route('cart.index') }}" class="btn btn-navbar fw-semibold px-3 me-2 d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart3 me-2" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 14H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zM4.415 6l1.1 5h6.97l1.2-6H4.415z"/>
          </svg>
          Giỏ hàng
          <span class="badge-custom ms-2">{{ collect(session('cart', []))->sum('quantity') }}</span>
        </a>

        @if(Session::get('logged_in'))
          <a href="{{ url('profile') }}" class="text-warning fw-semibold me-3 d-none d-lg-inline text-decoration-none">{{ Session::get('user_fullname') }}</a>
          <a class="btn btn-danger btn-sm me-2" href="/admin/logout">Đăng xuất</a>
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
