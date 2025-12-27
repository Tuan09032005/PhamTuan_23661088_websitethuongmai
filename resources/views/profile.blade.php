@include('admin/template/header')

<div class="container my-5">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 mx-auto">
            <div class="card p-4 shadow-sm">
                <div class="text-center">
                    <img src="{{ asset($user->user_img ?? '/img/download.jfif') }}" alt="avatar" class="rounded-circle mb-3" style="width:120px;height:120px;object-fit:cover;">
                    <h4 class="fw-bold mb-0">{{ $user->user_fullname ?? $user->user_username }}</h4>
                    <div class="text-muted small">{{ Session::get('user_role') == 1 ? 'Quản trị' : 'Khách hàng' }}</div>
                </div>

                <ul class="list-group list-group-flush mt-3">
                    <li class="list-group-item"><strong>Username:</strong> {{ $user->user_username ?? '-' }}</li>
                    <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $user->user_address ?? '-' }}</li>
                    <li class="list-group-item"><strong>Vai trò:</strong> {{ $user->user_role ?? '0' }}</li>
                </ul>

                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('cart.index') }}" class="btn btn-outline-primary flex-grow-1">Giỏ hàng</a>
                    <a href="/admin/logout" class="btn btn-danger">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/template/footer')

