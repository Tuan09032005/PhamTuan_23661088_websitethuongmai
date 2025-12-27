<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class AdminOrderController extends Controller
{
    // List orders (admin)
    public function index(Request $request)
    {
        $q = $request->input('q');
        $orders = Order::orderBy('order_date', 'desc');
        if ($q) {
            $orders = $orders->where('order_customer', 'like', "%{$q}%");
        }
        $orders = $orders->paginate(20)->withQueryString();
        return view('admin.orders.list', compact('orders', 'q'));
    }

    // Show single order
    public function show($id)
    {
        $order = Order::with('items.product')->where('order_id', $id)->firstOrFail();
        return view('admin.orders.show', compact('order'));
    }

    // Edit order (admin)
    public function edit($id)
    {
        $order = Order::with('items.product')->where('order_id', $id)->firstOrFail();
        return view('admin.orders.edit', compact('order'));
    }

    // Update order (admin)
    public function update(Request $request, $id)
    {
        $data = $request->only(['order_customer', 'order_status', 'order_note']);

        $order = Order::where('order_id', $id)->firstOrFail();
        $order->order_customer = $data['order_customer'] ?? $order->order_customer;
        $order->order_status = $data['order_status'] ?? $order->order_status;
        $order->order_note = $data['order_note'] ?? $order->order_note;
        $order->save();

        return redirect(url('/admin/danh-sach-don-hang'))->with('success', 'Cập nhật đơn hàng thành công');
    }

    // Delete order (admin)
    public function destroy($id)
    {
        // delete order items first
        OrderItem::where('order_id', $id)->delete();
        Order::where('order_id', $id)->delete();

        return redirect(url('/admin/danh-sach-don-hang'))->with('success', 'Đã xóa đơn hàng');
    }
}
