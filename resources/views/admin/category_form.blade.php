@include('admin/template/header')

<div class="admin-container">
  <div class="container">

    <div class="toolbar">
      <div>
        <h3 class="page-title"><i class="bi bi-tag"></i> {{ $category ? 'Sửa danh mục' : 'Thêm danh mục' }}</h3>
        <div class="page-subtitle">{{ $category ? 'Cập nhật thông tin danh mục' : 'Tạo danh mục mới' }}</div>
      </div>
    </div>

    <div class="content-box mt-3">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="p-4 bg-white rounded-4 shadow-sm">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ $category ? url('admin/xu-ly-cap-nhat-danh-muc') : url('admin/xu-ly-them-danh-muc') }}">
              @csrf
              @if($category)
                <input type="hidden" name="id" value="{{ $category->category_id }}">
              @endif

              <div class="mb-3">
                <label class="form-label">Tên danh mục</label>
                <input type="text" name="category_name" class="form-control" value="{{ old('category_name', $category->category_name ?? '') }}" placeholder="VD: Điện thoại">
              </div>

              <div class="d-flex justify-content-end">
                <a href="{{ url('admin/danh-sach-danh-muc') }}" class="btn btn-admin-outline me-2">Hủy</a>
                <button class="btn btn-admin btn-admin-primary">{{ $category ? 'Lưu' : 'Tạo' }}</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@include('admin/template/footer')
