@include('admin/template/header')

<div class="admin-container">
  <div class="container">

    <div class="toolbar d-flex justify-content-between align-items-center">
      <div>
        <h3 class="page-title"><i class="bi bi-tags"></i> Danh sách danh mục</h3>
        <div class="page-subtitle">Quản lý danh mục hiện có</div>
      </div>
      <div>
        <a href="{{ url('admin/them-danh-muc') }}" class="btn btn-admin btn-admin-primary">+ Thêm danh mục</a>
      </div>
    </div>

    <div class="content-box mt-3">
      <div class="table-responsive">
        <table class="table table-admin mb-0">
          <thead>
            <tr>
              <th style="width:80px">#</th>
              <th>Tên danh mục</th>
              <th style="width:160px">Hành động</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $cat)
            <tr>
              <td>#{{ $cat->category_id ?? '' }}</td>
              <td class="fw-semibold">{{ $cat->category_name ?? '—' }}</td>
              <td>
                <div class="d-flex gap-2 justify-content-center">
                  <!-- edit not implemented yet -->
                  <button onclick="confirmDelete('{{ $cat->category_id }}')" class="btn btn-sm btn-admin-outline">Xóa</button>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

@include('admin/template/footer')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if(session('success'))
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 2200,
      timerProgressBar: true,
      width: '300px'
    });
  @endif

  function confirmDelete(id) {
    Swal.fire({
      title: 'Xác nhận xóa',
      text: 'Bạn có chắc chắn muốn xóa danh mục này? Các sản phẩm thuộc danh mục có thể bị ảnh hưởng.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Có, xóa!',
      cancelButtonText: 'Hủy'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/admin/xoa-danh-muc/' + id;
      }
    });
  }
</script>
