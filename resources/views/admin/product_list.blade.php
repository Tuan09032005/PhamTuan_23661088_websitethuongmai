@include('admin/template/header')

<div class="admin-container">
  <div class="container">

    <div class="toolbar">
      <div class="left">
        <div>
          <h3 class="page-title"><i class="bi bi-box-seam"></i> Danh sách sản phẩm</h3>
          <div class="page-subtitle">Quản lý tất cả sản phẩm đang kinh doanh tại MyStore</div>
        </div>
      </div>

      <div class="right d-flex align-items-center">
        <input id="productSearch" class="form-control form-control-sm search" placeholder="Tìm theo tên hoặc danh mục">
        <a href="{{ url('admin/them-san-pham') }}" class="btn btn-admin btn-admin-primary ms-2">+ Thêm sản phẩm</a>
      </div>
    </div>

    <div class="content-box mt-3">
      <div class="table-responsive">
        <table class="table table-admin mb-0">
          <thead>
            <tr>
              <th>Ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Danh mục</th>
              <th>Giá</th>
              <th style="width:140px">Hành động</th>
            </tr>
          </thead>
          <tbody id="productsTable">
            @foreach ($products as $product)
            <tr>
              <td>
                <div class="card-row">
                  <img src="{{ asset($product->product_img) }}" class="thumb" alt="{{ $product->product_name }}">
                </div>
              </td>
              <td>
                <div class="card-row fw-semibold">{{ $product->product_name }}
                  <div class="small text-muted">Mã: #{{ $product->product_id }}</div>
                </div>
              </td>
              <td>
                <div class="card-row">{{ $product->category_name }}</div>
              </td>
              <td class="text-danger fw-bold">
                <div class="card-row">{{ number_format($product->product_price, 0) }}₫</div>
              </td>
              <td>
                <div class="d-flex gap-2 justify-content-center">
                  <a href="{{ url('admin/thong-tin-san-pham/'.$product->product_id) }}" class="btn btn-sm btn-admin-outline">Sửa</a>
                  <button onclick="confirmDelete('{{ $product->product_id }}')" class="btn btn-sm btn-admin-outline">Xóa</button>
                  <a href="{{ url('products/'.$product->product_id) }}" class="btn btn-sm btn-admin-outline">Xem</a>
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

{{-- SweetAlert --}}
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
      text: 'Bạn có chắc chắn muốn xóa sản phẩm này?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#dc3545',
      cancelButtonColor: '#6c757d',
      confirmButtonText: 'Có, xóa!',
      cancelButtonText: 'Hủy'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/admin/xoa-san-pham/' + id;
      }
    });
  }

  // client-side search/filter
  document.getElementById('productSearch').addEventListener('input', function(e){
    const q = e.target.value.toLowerCase().trim();
    const rows = document.querySelectorAll('#productsTable tr');
    rows.forEach(r => {
      const name = r.querySelector('td:nth-child(2)').innerText.toLowerCase();
      const cat = r.querySelector('td:nth-child(3)').innerText.toLowerCase();
      if (!q || name.includes(q) || cat.includes(q)) r.style.display = '';
      else r.style.display = 'none';
    });
  });
</script>
