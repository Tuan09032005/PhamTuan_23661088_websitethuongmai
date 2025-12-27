@include('admin/template/header')

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Danh sách đơn hàng</h3>
    <form class="d-flex" method="GET" action="{{ url('/admin/danh-sach-don-hang') }}">
      <input name="q" value="{{ $q ?? '' }}" class="form-control me-2" placeholder="Tìm theo khách hàng..." style="width:260px;">
      <button class="btn btn-primary">Tìm</button>
    </form>
  </div>

  <div class="list-group">
    @foreach($orders as $order)
      <div class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <a href="{{ url('/admin/don-hang/'.$order->order_id) }}" class="text-decoration-none text-dark">
            <div class="fw-semibold">#{{ $order->order_id }} — {{ $order->order_customer }}</div>
          </a>
          <div class="small text-muted">
            {{ $order->formatted_date ?? (isset($order->order_date)?date('d/m/Y H:i', strtotime($order->order_date)):'-') }}
            • <span class="badge bg-info text-dark">{{ $order->order_status }}</span>
          </div>
        </div>

        <div class="text-end">
          <div class="fw-bold text-danger">{{ number_format($order->items->sum(function($i){ return ($i->order_product_price * $i->order_product_quantity); }),0,',','.') }}₫</div>
          <div class="small text-muted mb-2">{{ $order->items->sum('order_product_quantity') }} sản phẩm</div>
          <div class="d-flex justify-content-end gap-2">
            <a href="{{ url('/admin/don-hang/'.$order->order_id.'/edit') }}" class="btn btn-sm btn-outline-primary">Sửa</a>
            <a href="{{ url('/admin/don-hang/'.$order->order_id.'/delete') }}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xác nhận xóa đơn #'+{{ $order->order_id }}+'?')">Xóa</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-4">
    {{ $orders->links('pagination::bootstrap-5') }}
  </div>

</div>

@include('admin/template/footer')
