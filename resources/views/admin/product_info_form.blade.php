<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <!-- Link đến Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('admin/template/header')

<div class="container mt-5">
    <h2 class="mb-4">Cập nhật sản phẩm</h2>

    <form action="/admin/xu-ly-cap-nhat-san-pham" method="post" enctype="multipart/form-data">
        @csrf
        @foreach ($products as $product)
            <input type="hidden" name="id" value="{{ $product->product_id }}">

            <!-- Tên sản phẩm -->
            <div class="mb-3">
                <label for="fname" class="form-label">Tên:</label>
                <input type="text" id="fname" name="name" value="{{ $product->product_name }}" class="form-control" required>
            </div>

            <!-- Giá sản phẩm -->
            <div class="mb-3">
                <label for="fprice" class="form-label">Giá:</label>
                <input type="number" id="fprice" name="price" value="{{ $product->product_price }}" class="form-control" required>
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="mb-3">
                <label for="lcategory" class="form-label">Danh mục:</label>
                <select id="lcategory" name="category" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->category_id }}" {{ $category->category_id == $product->product_category ? 'selected' : '' }}>
                            {{ $category->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Ảnh sản phẩm -->
            <div class="mb-3">
                <label for="limg" class="form-label">Ảnh:</label>
                <input type="file" id="limg" name="img" class="form-control">
                <input type="hidden" id="limg_old" name="img_old" value="{{ $product->product_img }}">
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="mb-3">
                <label for="ldescription" class="form-label">Mô tả:</label>
                <textarea id="ldescription" name="description" class="form-control" cols="100" rows="8">{{ $product->product_description }}</textarea>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>

@include('admin/template/footer')

<!-- Link đến Bootstrap JS (nếu cần thiết) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
