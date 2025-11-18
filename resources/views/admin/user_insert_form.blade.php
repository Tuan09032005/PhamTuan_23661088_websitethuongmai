@include('admin/template/header')

<div class="admin-container">
  <div class="container">

    <div class="toolbar">
      <div class="left">
        <div>
          <h3 class="page-title">Đăng ký tài khoản người dùng</h3>
          <div class="page-subtitle">Tạo tài khoản mới cho hệ thống</div>
        </div>
      </div>

      <div class="right">
        <a href="{{ url('/admin/danh-sach-nguoi-dung') }}" class="btn btn-admin btn-admin-outline">⬅ Quay lại</a>
      </div>
    </div>

    <div class="content-box mt-3">
      <form action="{{ url('/admin/xu-ly-them-nguoi-dung') }}" method="POST">
        @csrf

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label fw-semibold">Tài khoản</label>
            <input type="text" name="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Họ tên</label>
            <input type="text" name="fullname" class="form-control" placeholder="Nhập họ và tên" required>
          </div>

          <div class="col-md-6">
            <label class="form-label fw-semibold">Địa chỉ</label>
            <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" required>
          </div>

          <div class="col-12 text-end mt-2">
            <button type="submit" class="btn btn-admin btn-admin-primary">Đăng ký</button>
            <a href="{{ url('/admin/danh-sach-nguoi-dung') }}" class="btn btn-admin btn-admin-outline ms-2">Hủy</a>
          </div>
        </div>

      </form>
    </div>

  </div>
</div>

@include('admin/template/footer')
