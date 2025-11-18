<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập hệ thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --bg:#0f172a; /* dark navy */
            --card:#0b1220;
            --indigo:#7c3aed;
            --orange:#fb923c;
            --muted:#cbd5e1;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, 'Helvetica Neue', Arial;
            background: #f8fafc; /* light background instead of dark */
            color: #0f172a;
            -webkit-font-smoothing:antialiased;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            margin: 60px auto;
            background: #ffffff; /* white card */
            border: 1px solid rgba(15,23,42,0.04);
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 8px 24px rgba(15,23,42,0.06);
        }

        /* center nicely on small screens */
        @media(min-width:992px){
            .login-container { margin-top: 100px; }
        }

        h3 {
            text-align: center;
            margin-bottom: 18px;
            color: var(--indigo);
            font-weight:700;
            letter-spacing:0.6px;
        }

        .form-label { color: #475569; }

        .form-control {
            background: #ffffff;
            border: 1px solid rgba(15,23,42,0.08);
            color: #0f172a;
            height:44px;
        }
        .form-control:focus{
            box-shadow: 0 6px 18px rgba(124,58,237,0.08);
            border-color: var(--indigo);
        }

        .btn-login {
            background: linear-gradient(90deg, var(--indigo), var(--orange));
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 10px;
            transition: transform .15s ease, box-shadow .15s ease;
            padding: 10px 14px;
        }

        .btn-login:hover{
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(124,58,237,0.18);
        }

        .login-help { display:flex; justify-content:space-between; align-items:center; margin-top:12px; }
        .login-help a{ color: var(--muted); text-decoration:none; }
        .login-help a:hover{ color: var(--orange); }

        .brand-logo {
            display:block; text-align:center; margin-bottom:8px; font-weight:800; color:var(--indigo);
        }

    </style>
</head>
@include('admin/template/header')
<body>
    <div class="login-container">
        <h3>ĐĂNG NHẬP</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/admin/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Nhập tên đăng nhập" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" required>
            </div>

            <button type="submit" class="btn btn-login w-100">Đăng nhập</button>
        </form>
    </div>
</body>

@include('admin/template/footer')
</html>
