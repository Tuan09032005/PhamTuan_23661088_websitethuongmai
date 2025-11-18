@include('admin/template/header')

<body style="background-color:var(--bg);">

<!-- Hero Section -->
<div class="hero-section text-white text-center p-5" style="background-image: url('https://cdn.britannica.com/84/203584-050-57D326E5/speed-internet-technology-background.jpg');">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="display-4 fw-bold">Chào mừng đến với MyStore</h1>
    <p class="lead mb-4">Điện thoại chính hãng – Giá tốt – Giao nhanh trong ngày</p>
    <a href="#products" class="btn btn-primary btn-lg">
      <i class="bi bi-shop"></i> Xem sản phẩm
    </a>
  </div>
</div>

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
.hero-section{
  background-position:center;
  background-size:cover;
  border-radius:12px;
  box-shadow: 0 8px 30px rgba(2,6,23,0.08);
  position:relative;
  overflow:hidden;
}
.hero-overlay{
  position:absolute; inset:0; background:linear-gradient(180deg, rgba(2,6,23,0.45), rgba(2,6,23,0.25));
}
.hero-content{ position:relative; z-index:2; }
.hero-content h1{ color: #fff; text-shadow:0 6px 24px rgba(2,6,23,0.5); }
.hero-content p{ color: rgba(255,255,255,0.9); }

.product-card{ transition: transform .25s ease, box-shadow .25s ease; position:relative; overflow:hidden; }
.product-card:hover{ transform: translateY(-6px); box-shadow:0 18px 40px rgba(2,6,23,0.08); }
.ribbon{ position:absolute; top:10px; left:-12px; background:#ef4444; color:#fff; padding:6px 22px; transform:rotate(-15deg); font-size:13px; z-index:3; border-radius:4px; }
.product-thumb{ border-radius:14px; height:200px; object-fit:cover; }

.text-primary{ color: var(--primary) !important; }

/* small responsive adjustments */
@media(max-width:575px){
  .hero-content h1{ font-size:1.6rem; }
  .product-thumb{ height:160px; }
}

</style>

<!-- Icon Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</body>
</html>
