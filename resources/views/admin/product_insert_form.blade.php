<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm sản phẩm mới</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin/template/header')

<div class="container mt-5">
  <h2 class="mb-4 text-primary">Thêm sản phẩm mới</h2>

  <form action="{{ url('/admin/xu-ly-them-san-pham') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Tên sản phẩm -->
    <div class="mb-3">
      <label for="fname" class="form-label">Tên sản phẩm:</label>
      <input type="text" id="fname" name="name" class="form-control" placeholder="Nhập tên sản phẩm" required>
    </div>

    <!-- Giá sản phẩm -->
    <div class="mb-3">
      <label for="fprice" class="form-label">Giá (₫):</label>
      <input type="number" id="fprice" name="price" class="form-control" placeholder="Nhập giá sản phẩm" required>
    </div>

    <!-- Ảnh sản phẩm -->
    <div class="mb-3">
      <label for="fimg" class="form-label">Ảnh sản phẩm:</label>
      <input type="file" id="fimg" name="img" class="form-control" accept="image/*" onchange="previewImage(event)" required>
      <div class="mt-3 text-center">
        <img id="imgPreview" src="#" alt="Xem trước ảnh" class="img-fluid rounded shadow-sm d-none" style="max-height: 200px;">
      </div>
    </div>

    <!-- Danh mục -->
    <div class="mb-3">
      <label for="lcategory" class="form-label">Danh mục:</label>
      <select id="lcategory" name="category" class="form-select" required>
        <option value="">-- Chọn danh mục --</option>
        @foreach ($categories as $category)
          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
    </div>

    <!-- Mô tả -->
    <div class="mb-3">
      <label for="ldescription" class="form-label">Chi tiết sản phẩm:</label>
      <textarea id="ldescription" name="description" class="form-control" rows="5" placeholder="Nhập mô tả chi tiết..."></textarea>
    </div>

    <!-- Nút -->
    <div class="text-center">
      <button type="submit" class="btn btn-primary px-5">💾 Lưu sản phẩm</button>
      <a href="{{ url('/admin/danh-sach-san-pham') }}" class="btn btn-secondary px-4 ms-2">⬅ Quay lại</a>
    </div>

  </form>
</div>

@include('admin/template/footer')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
  function previewImage(event) {
    const imgPreview = document.getElementById('imgPreview');
    const file = event.target.files[0];
    if (file) {
      imgPreview.src = URL.createObjectURL(file);
      imgPreview.classList.remove('d-none');
    } else {
      imgPreview.src = '#';
      imgPreview.classList.add('d-none');
    }
  }
</script>

</body>
</html>
