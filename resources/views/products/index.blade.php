@include('admin/template/header')

<body style="background-color:#F8FAFC;">
  <div class="container my-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold" style="color:#0f172a;">Sản phẩm</h2>

      <form class="d-flex" method="GET" action="{{ url('products') }}">
        <input name="q" value="{{ $q ?? '' }}" class="form-control me-2" placeholder="Tìm kiếm sản phẩm..." style="width:260px;">
        <select name="category" class="form-select me-2">
          <option value="">Tất cả</option>
          @foreach($categories as $cat)
            <option value="{{ $cat->category_id }}" {{ (isset($category) && $category==$cat->category_id)?'selected':'' }}>{{ $cat->category_name }}</option>
          @endforeach
        </select>
        <select name="sort" class="form-select me-2">
          <option value="">Mới nhất</option>
          <option value="price_asc" {{ (isset($sort) && $sort=='price_asc')?'selected':'' }}>Giá: thấp → cao</option>
          <option value="price_desc" {{ (isset($sort) && $sort=='price_desc')?'selected':'' }}>Giá: cao → thấp</option>
        </select>
        <button class="btn btn-primary" type="submit">Lọc</button>
      </form>
    </div>

    <div class="row g-4">
      @foreach($products as $product)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card h-100 shadow-sm border-0 rounded-4 product-card animate-item" style="overflow:hidden;">
          <a href="{{ url('products/'.$product->product_id) }}">
            <img src="{{ asset($product->product_img) }}" class="card-img-top p-3" alt="{{ $product->product_name }}" style="border-radius:12px; height:200px; object-fit:cover; width:100%;">
          </a>
          <div class="card-body text-center">
            <h6 class="card-title fw-semibold" style="min-height:42px;">{{ $product->product_name }}</h6>
            <p class="text-danger fw-bold mb-2">{{ number_format($product->product_price,0) }}₫</p>
            <div class="d-flex justify-content-center gap-2">
              <a href="{{ url('products/'.$product->product_id) }}" class="btn btn-outline-primary btn-sm">Chi tiết</a>
              <form method="POST" action="{{ route('cart.add', $product->product_id) }}" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Thêm vào giỏ</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-4">
      {{ $products->links('pagination::bootstrap-5') }}
    </div>

  </div>

@include('admin/template/footer')
</body>
