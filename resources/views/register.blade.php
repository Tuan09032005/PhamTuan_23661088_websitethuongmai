@include('admin/template/header')

<body style="background-color:var(--bg);">
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card p-4 shadow-sm">
          <h3 class="fw-bold text-center mb-3">Đăng ký thành viên</h3>

          @if($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach($errors->all() as $err)
                  <li>{{ $err }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Tên đăng nhập</label>
              <input type="text" name="user_username" class="form-control" value="{{ old('user_username') }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Mật khẩu</label>
              <input type="password" name="user_password" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Họ và tên</label>
              <input type="text" name="user_fullname" class="form-control" value="{{ old('user_fullname') }}" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Địa chỉ (tùy chọn)</label>
              <input type="text" name="user_address" class="form-control" value="{{ old('user_address') }}">
            </div>

            <div class="d-grid gap-2">
              <button class="btn btn-primary">Đăng ký</button>
              <a href="/admin/login" class="btn btn-outline-secondary">Đã có tài khoản? Đăng nhập</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@include('admin/template/footer')

</body>