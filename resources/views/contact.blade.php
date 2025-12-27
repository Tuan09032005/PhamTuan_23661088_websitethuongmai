@include('admin/template/header')

<body style="background:var(--bg);">

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="p-4 bg-white rounded-4 shadow-sm">
                    <h2 class="fw-bold mb-3">Liên hệ với chúng tôi</h2>
                    <p class="text-muted">Gửi câu hỏi, góp ý hoặc yêu cầu hỗ trợ. Chúng tôi sẽ phản hồi trong thời gian sớm nhất.</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.send') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Nguyễn Văn A">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="you@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nội dung</label>
                            <textarea name="message" class="form-control" rows="6" placeholder="Nội dung tin nhắn...">{{ old('message') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Gửi liên hệ</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="p-4 bg-white rounded-4 shadow-sm">
                    <h5 class="fw-semibold">Thông tin liên hệ</h5>
                    <p class="mb-1 text-muted">Email: <strong class="text-primary">support@mystore.com</strong></p>
                    <p class="mb-1 text-muted">Hotline: <strong class="text-primary">0123 456 789</strong></p>
                    <hr>
                    <h6 class="fw-semibold">Địa chỉ</h6>
                    <p class="text-muted small">123 Đường Lớn, Quận 1, TP. HCM</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('admin/template/footer')

</body>
