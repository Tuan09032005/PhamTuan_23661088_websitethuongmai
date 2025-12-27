@include('admin/template/header')

<body style="background-color:var(--bg);">

<!-- Hero Section (new layout) -->
<section class="hero-section py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 order-2 order-lg-1 animate-fade-up">
        <div class="px-3 px-lg-0">
          <h1 class="display-5 fw-bold mb-3" style="color:var(--primary);">MyStore — Chất lượng &amp; Tin cậy</h1>
          <p class="lead text-muted mb-4">Chọn điện thoại phù hợp với bạn. Ưu đãi mỗi ngày, giao nhanh trong nội thành và bảo hành chính hãng.</p>

          <div class="d-flex gap-2 mb-3">
            <a href="#products" class="btn btn-primary btn-lg">Xem sản phẩm</a>
            <a href="/lien-he" class="btn btn-outline-primary btn-lg">Liên hệ</a>
          </div>

          <div class="d-flex flex-wrap gap-3 mt-3 small text-muted">
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-light text-primary p-2 rounded-circle"><i class="bi bi-truck"></i></span>
              <div>Giao hàng nhanh</div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-light text-primary p-2 rounded-circle"><i class="bi bi-shield-check"></i></span>
              <div>Bảo hành chính hãng</div>
            </div>
            <div class="d-flex align-items-center gap-2">
              <span class="badge bg-light text-primary p-2 rounded-circle"><i class="bi bi-cash-stack"></i></span>
              <div>Giá cạnh tranh</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 order-1 order-lg-2 mb-4 mb-lg-0 animate-item">
        <div class="hero-showcase d-flex justify-content-center align-items-center position-relative">
          <div class="showcase-card shadow-lg rounded-4 p-4 bg-white border" style="border-color: rgba(15,23,42,0.04);">
            <div class="d-flex gap-4 align-items-center">
              <img src="{{ asset($products[0]->product_img ?? '/img/download.jfif') }}" alt="p1" class="showcase-main-img">
              <div>
                <div class="fw-semibold fs-5">{{ $products[0]->product_name ?? 'Sản phẩm A' }}</div>
                <div class="text-danger fw-bold fs-5">{{ number_format($products[0]->product_price ?? 0,0,',','.') }}₫</div>
                <div class="mt-2">
                  <a href="{{ url('products/'.($products[0]->product_id ?? '#')) }}" class="btn btn-outline-primary btn-sm me-2">Chi tiết</a>
                  <form method="POST" action="{{ route('cart.add', $products[0]->product_id ?? 0) }}" style="display:inline">
                    @csrf
                    <button class="btn btn-primary btn-sm">Mua ngay</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="showcase-floating" aria-hidden="true">
            <div class="floating-thumb shadow rounded-4"><img src="{{ asset($products[1]->product_img ?? '/img/download.jfif') }}" alt="p2" class="floating-img"></div>
            <div class="floating-thumb shadow rounded-4"><img src="{{ asset($products[2]->product_img ?? '/img/download.jfif') }}" alt="p3" class="floating-img"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SVG wave divider -->
  <div class="hero-divider" aria-hidden="true">
    <svg viewBox="0 0 1200 100" preserveAspectRatio="none" style="width:100%; height:70px; display:block;"><path d="M0,0 C300,100 900,0 1200,80 L1200,100 L0,100 Z" fill="var(--bg)"></path></svg>
  </div>
</section>

<!-- Danh mục -->
<div class="container mt-4">
  <div class="d-flex justify-content-center gap-3 flex-wrap">
    <button class="btn btn-outline-primary px-4 rounded-pill">iPhone</button>
    <button class="btn btn-outline-primary px-4 rounded-pill">Samsung</button>
    <button class="btn btn-outline-primary px-4 rounded-pill">Xiaomi</button>
    <button class="btn btn-outline-primary px-4 rounded-pill">Phụ kiện</button>
  </div>
</div>

<!-- Danh sách sản phẩm -->
<div class="container mt-5" id="products">
  <h2 class="text-center mb-4 fw-bold" style="color:#333;">
    🌟 Sản phẩm nổi bật
  </h2>

    <div class="row g-4">
    @foreach($products as $product)
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="card h-100 shadow-sm border-0 rounded-4 product-card">
        <span class="ribbon">HOT</span>
        <img src="{{ asset($product->product_img) }}" class="card-img-top p-3 product-thumb" alt="{{ $product->product_name }}">

        <div class="card-body text-center">
          <h6 class="card-title fw-bold">{{ $product->product_name }}</h6>
          <p class="text-danger fw-bold mb-2">{{ number_format($product->product_price, 0) }}₫</p>

          <div class="d-flex justify-content-center gap-2">
            <a href="/chi-tiet-san-pham/{{ $product->product_id }}" class="btn btn-outline-primary btn-sm"><i class="bi bi-info-circle"></i> Chi tiết</a>
            <a href="/mua-ngay/{{ $product->product_id }}" class="btn btn-primary btn-sm"><i class="bi bi-cart-check"></i> Mua ngay</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
</div>

<!-- Giới thiệu -->
<div class="container my-5">
  <div class="row align-items-center g-4">

    <div class="col-md-6">
      <img src="https://www.electromart.com.gh/wp-content/uploads/2025/01/Mobile-Accessories.jpg"
           alt="Store"
           class="img-fluid rounded shadow-lg">
    </div>

    <div class="col-md-6">
      <h3 class="fw-bold text-primary"><i class="bi bi-star-fill text-warning"></i> Vì sao chọn MyStore?</h3>

      <ul class="list-unstyled mt-3" style="font-size: 17px;">
        <li><i class="bi bi-check-circle-fill text-primary"></i> 100% chính hãng</li>
        <li><i class="bi bi-check-circle-fill text-primary"></i> Giá luôn rẻ</li>
        <li><i class="bi bi-check-circle-fill text-primary"></i> Giao hàng trong 2 giờ</li>
        <li><i class="bi bi-check-circle-fill text-primary"></i> Bảo hành 12 tháng</li>
      </ul>

      <a href="/lien-he" class="btn btn-primary btn-lg mt-3"><i class="bi bi-telephone-forward"></i> Liên hệ ngay</a>
    </div>

  </div>
</div>

@include('admin/template/footer')

<style>
/* Home page overrides (uses theme variables from theme.css) */
.hero-section{ background: linear-gradient(180deg, rgba(59,130,246,0.06), rgba(99,102,241,0.02)); border-radius:12px; position:relative; overflow:visible; }
.hero-section .container{ position:relative; z-index:2; }
.hero-showcase{ min-height:220px; }
.showcase-card{ width:420px; max-width:86%; transform: translateY(0); transition: transform .48s cubic-bezier(.22,.9,.21,1); }
.showcase-main-img{ width:160px; height:160px; object-fit:cover; border-radius:14px; }
.showcase-card img{ border-radius:12px; }
.showcase-floating{ position:absolute; right:6%; top:6%; display:flex; gap:14px; flex-direction:column; }
.floating-thumb{ width:120px; height:120px; overflow:hidden; display:flex; align-items:center; justify-content:center; }
.floating-img{ width:100%; height:100%; object-fit:cover; border-radius:10px; }

/* subtle parallax-like motion on hover */
.hero-showcase:hover .showcase-card{ transform: translateY(-10px) translateX(6px); box-shadow:0 28px 60px rgba(2,6,23,0.12); }
.hero-showcase:hover .floating-thumb:first-child{ transform: translateY(-18px) translateX(-10px) rotate(-4deg); }
.hero-showcase:hover .floating-thumb:last-child{ transform: translateY(14px) translateX(10px) rotate(4deg); }

/* Keep product card behavior consistent */
.product-card{ transition: transform .25s ease, box-shadow .25s ease; position:relative; overflow:hidden; }
.product-card:hover{ transform: translateY(-6px); box-shadow:0 18px 40px rgba(2,6,23,0.08); }
.ribbon{ position:absolute; top:10px; left:-12px; background:#ef4444; color:#fff; padding:6px 22px; transform:rotate(-15deg); font-size:13px; z-index:3; border-radius:4px; }
.product-thumb{ border-radius:14px; height:200px; object-fit:cover; }

.text-primary{ color: var(--primary) !important; }

/* Responsive adjustments */
@media(max-width:991px){
  .showcase-floating{ position:static; flex-direction:row; gap:10px; margin-top:14px; justify-content:center; }
  .showcase-card{ width:100%; }
}

@media(max-width:575px){
  .hero-section{ padding:1.5rem 0; }
  .product-thumb{ height:160px; }
  .hero-showcase{ min-height:180px; }
}

</style>

<!-- Icon Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</body>
</html>
