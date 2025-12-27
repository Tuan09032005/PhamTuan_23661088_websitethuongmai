@include('admin/template/header')

<body style="background-color:#F8FAFC;">
    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold" style="color:#0f172a;">Thanh toán</h2>
            <div>
                <a href="/cart" class="btn btn-outline-secondary btn-sm">Quay lại giỏ hàng</a>
            </div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ url('order') }}">
            @csrf
            <div class="row">
                <div class="col-lg-7">
                    <div class="card p-3 mb-3">
                        <h5 class="fw-semibold">Thông tin người nhận</h5>
                        <div class="mb-3">
                            <label class="form-label">Tên</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ</label>
                            <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <div class="card p-3">
                        <h5 class="fw-semibold">Phương thức thanh toán</h5>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="pmCod" value="cod" checked>
                            <label class="form-check-label" for="pmCod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="pmCard" value="card">
                            <label class="form-check-label" for="pmCard">Thẻ (mô phỏng)</label>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card shadow-sm p-3 mb-3">
                        <h5 class="fw-semibold">Đơn hàng</h5>
                        <div class="mb-2 small text-muted">Sản phẩm</div>
                        <div class="list-group mb-3">
                            @foreach($cart as $item)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-semibold">{{ $item['name'] }}</div>
                                        <div class="small text-muted">Số lượng: {{ $item['quantity'] }}</div>
                                    </div>
                                    <div class="fw-bold text-danger">{{ number_format($item['price'] * $item['quantity'],0,',','.') }}₫</div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>Tổng</div>
                            <div class="fw-bold text-danger">{{ number_format($total,0,',','.') }}₫</div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg">Đặt hàng</button>
                        </div>
                    </div>

                    <div class="card p-3">
                        <h6 class="fw-semibold">Ghi chú</h6>
                        <p class="small text-muted mb-0">Vui lòng kiểm tra địa chỉ và số điện thoại trước khi đặt hàng. Chúng tôi sẽ liên hệ để xác nhận.</p>
                    </div>
                </div>
            </div>
        </form>

    </div>

@include('admin/template/footer')

</body>
