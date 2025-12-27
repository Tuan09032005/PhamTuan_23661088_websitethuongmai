@include('admin/template/header')

<body style="background-color:#F8FAFC;">
    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color:#0f172a;">Giỏ hàng</h2>
            <div>
                <a href="/products" class="btn btn-outline-secondary btn-sm">Tiếp tục mua sắm</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(empty($cart))
            <div class="card p-4 text-center">
                <p class="mb-0">Giỏ hàng trống.</p>
                <a href="/products" class="btn btn-primary mt-3">Xem sản phẩm</a>
            </div>
        @else
            <form method="post" action="{{ route('cart.update') }}">
                @csrf

                <div class="row">
                    <div class="col-lg-8">
                        <div class="list-group">
                            @foreach($cart as $id => $item)
                                <div class="list-group-item d-flex gap-3 py-3">
                                    <img src="{{ asset($item['image'] ?? '/img/download.jfif') }}" alt="{{ $item['name'] }}" style="width:100px; height:80px; object-fit:cover; border-radius:8px;">
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <h6 class="mb-1">{{ $item['name'] }}</h6>
                                                <div class="text-muted small">Giá: {{ number_format($item['price'],0,',','.') }}₫</div>
                                            </div>
                                            <div class="text-end">
                                                <div class="mb-2 fw-bold text-danger">{{ number_format($item['price'] * $item['quantity'],0,',','.') }}₫</div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mt-2">
                                            <input type="number" name="quantities[{{ $id }}]" value="{{ $item['quantity'] }}" min="1" class="form-control me-3" style="width:100px">
                                            <a href="{{ url('cart/remove/'.$id) }}" class="btn btn-outline-danger btn-sm">Xóa</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card shadow-sm p-3">
                            <h5 class="fw-bold">Tóm tắt đơn hàng</h5>
                            <div class="d-flex justify-content-between my-2">
                                <div>Tổng tiền</div>
                                <div class="fw-bold text-danger">{{ number_format($total,0,',','.') }}₫</div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">Cập nhật giỏ hàng</button>
                                <a href="{{ route('cart.clear') }}" class="btn btn-outline-secondary">Xóa hết</a>
                                <a href="{{ route('checkout') }}" class="btn btn-success">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        @endif

    </div>

@include('admin/template/footer')

</body>
