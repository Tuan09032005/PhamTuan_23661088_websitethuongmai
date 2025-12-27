@include('admin/template/header')

<body style="background-color:var(--bg);">
    <div class="container my-5">
        <div class="card p-4 shadow-sm">
            <h2 class="fw-bold">Đặt hàng thành công</h2>
            <p>Mã đơn hàng: <strong>#{{ $order->id }}</strong></p>
            <p>Trạng thái: {{ $order->status }}</p>
            <p>Tổng: <span class="fw-bold text-danger">{{ number_format($order->total,0,',','.') }} VND</span></p>

            <h4 class="mt-3">Sản phẩm</h4>
            <ul class="list-unstyled">
                @foreach($order->items as $item)
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <div>{{ $item->product_name }} x {{ $item->quantity }}</div>
                        <div class="fw-semibold">{{ number_format($item->price * $item->quantity,0,',','.') }} VND</div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-3">
                <a href="/" class="btn btn-primary">Về trang chủ</a>
                <a href="/products" class="btn btn-outline-secondary ms-2">Xem tiếp sản phẩm</a>
            </div>
        </div>
    </div>

@include('admin/template/footer')

</body>
