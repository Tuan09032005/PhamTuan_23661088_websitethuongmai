@include('admin/template/header')

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">Chỉnh sửa đơn hàng #{{ $order->order_id }}</h3>
    <a href="{{ url('/admin/danh-sach-don-hang') }}" class="btn btn-outline-secondary">Quay lại</a>
  </div>

  <form method="POST" action="{{ url('/admin/don-hang/'.$order->order_id.'/update') }}">
    @csrf

    <div class="card p-3">
      <div class="mb-3">
        <label class="form-label">Khách hàng</label>
        <input type="text" name="order_customer" class="form-control" value="{{ old('order_customer', $order->order_customer) }}">
      </div>

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="order_status" class="form-select">
          <option value="{{ $order->order_status }}">{{ $order->order_status }}</option>
          <option value="pending">pending</option>
          <option value="processing">processing</option>
          <option value="completed">completed</option>
          <option value="cancelled">cancelled</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Ghi chú</label>
        <textarea name="order_note" class="form-control" rows="4">{{ old('order_note', $order->order_note) }}</textarea>
      </div>

      <div class="d-flex gap-2">
        <button class="btn btn-primary">Lưu thay đổi</button>
        <a href="{{ url('/admin/danh-sach-don-hang') }}" class="btn btn-outline-secondary">Hủy</a>
      </div>
    </div>
  </form>

</div>

@include('admin/template/footer')
