@include('admin/template/header')

<body style="background-color:#F8FAFC;">
  <div class="container my-5">
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card border-0 shadow-sm">
          <img src="{{ asset($product->product_img) }}" class="img-fluid" alt="{{ $product->product_name }}" style="border-radius:8px; object-fit:cover; width:100%; height:420px;">
        </div>
      </div>

      <div class="col-md-6">
        <h2 class="fw-bold" style="color:#0f172a;">{{ $product->product_name }}</h2>
        <div class="mb-2 text-muted">Danh mục: {{ $product->category_name }}</div>
        <h3 class="text-danger fw-bold">{{ number_format($product->product_price,0) }}₫</h3>

        <p class="mt-4" style="white-space:pre-line;">{{ $product->product_description }}</p>

        <div class="d-flex gap-2 mt-4">
          <a href="#" class="btn btn-lg btn-primary">Thêm vào giỏ</a>
          <a href="#" class="btn btn-lg btn-outline-secondary">Mua ngay</a>
        </div>

        <hr class="my-4">

        <h5>Sản phẩm liên quan</h5>
        <div class="d-flex gap-3 mt-3 flex-wrap">
          @foreach($related as $r)
            <div style="width:140px; text-align:center;">
              <a href="{{ url('products/'.$r->product_id) }}">
                <img src="{{ asset($r->product_img) }}" alt="{{ $r->product_name }}" style="width:100%; height:90px; object-fit:cover; border-radius:8px;">
                <div class="small mt-2">{{ $r->product_name }}</div>
                <div class="small text-danger fw-semibold">{{ number_format($r->product_price,0) }}₫</div>
              </a>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>

@include('admin/template/footer')

</body>
