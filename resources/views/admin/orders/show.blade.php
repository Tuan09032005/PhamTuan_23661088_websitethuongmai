@include('admin/template/header')

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Chi tiết đơn hàng #{{ $order->order_id }}</h3>
    <a href="{{ url('/admin/danh-sach-don-hang') }}" class="btn btn-outline-secondary">Quay lại</a>
  </div>

  <div class="row g-4">
    <div class="col-lg-8">
      <div class="card p-3">
        <h5>Thông tin khách hàng</h5>
        <p class="mb-1"><strong>Khách:</strong> {{ $order->order_customer }}</p>
        <p class="mb-1"><strong>Ngày:</strong> {{ $order->formatted_date ?? (isset($order->order_date)?date('d/m/Y H:i', strtotime($order->order_date)):'-') }}</p>
        <p class="mb-1"><strong>Trạng thái:</strong> {{ $order->order_status }}</p>
        <p class="mb-1"><strong>Ghi chú:</strong> {{ $order->order_note }}</p>
      </div>

      <div class="card p-3 mt-3">
        <h5>Sản phẩm</h5>
        <table class="table">
          <thead>
            <tr>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Số lượng</th>
              <th>Tổng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order->items as $item)
              <tr>
                <td>{{ $item->product ? $item->product->product_name : $item->order_product_id }}</td>
                <td>{{ number_format($item->order_product_price,0,',','.') }}₫</td>
                <td>{{ $item->order_product_quantity }}</td>
                <td>{{ number_format($item->order_product_price * $item->order_product_quantity,0,',','.') }}₫</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-lg-4">
      <div class="card p-3 shadow-sm">
        <h5>Tóm tắt</h5>
        <div class="d-flex justify-content-between mb-2"><div>Tổng tiền</div><div class="fw-bold text-danger">{{ number_format($order->items->sum(function($i){ return ($i->order_product_price * $i->order_product_quantity); }),0,',','.') }}₫</div></div>
        <div class="d-flex justify-content-between mb-2"><div>Tổng sản phẩm</div><div>{{ $order->items->sum('order_product_quantity') }}</div></div>
      </div>
    </div>
  </div>

</div>

@include('admin/template/footer')
