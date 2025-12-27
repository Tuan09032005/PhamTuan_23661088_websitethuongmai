<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Hiển thị trang checkout
     */
    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout', compact('cart', 'total'));
    }

    /**
     * Xử lý đặt hàng (COD / mô phỏng thẻ)
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'payment_method' => 'required|string',
        ]);

        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }

        DB::beginTransaction();

        try {
            // 1️⃣ LƯU ĐƠN HÀNG
            $orderId = DB::table('orders')->insertGetId([
                'order_date'     => now(),
                'order_customer' => $request->name,
                'order_status'   => $request->payment_method === 'card' ? 'paid' : 'pending',
                'order_note'     => $request->address,
            ]);

            // 2️⃣ LƯU CHI TIẾT ĐƠN HÀNG
            foreach ($cart as $item) {
                DB::table('order_detail')->insert([
                    'order_id'               => $orderId,
                    'order_product_id'       => $item['product_id'],
                    'order_product_quantity' => $item['quantity'],
                    'order_product_price'    => $item['price'],
                ]);
            }

            DB::commit();

            // 3️⃣ XÓA GIỎ HÀNG
            session()->forget('cart');

            return redirect()->route('order.confirmation', ['id' => $orderId]);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Lỗi khi đặt hàng: ' . $e->getMessage());
        }
    }

    /**
     * Trang xác nhận đơn hàng
     */
    public function confirmation($id)
{
    // 1️⃣ Lấy đơn hàng
    $order = DB::table('orders')
        ->where('order_id', $id)
        ->first();

    if (!$order) {
        abort(404);
    }

    // 2️⃣ Lấy sản phẩm + join
    $items = DB::table('order_detail')
        ->join('product', 'product.product_id', '=', 'order_detail.order_product_id')
        ->where('order_detail.order_id', $id)
        ->select(
            'product.product_name',
            'order_detail.order_product_quantity as quantity',
            'order_detail.order_product_price as price'
        )
        ->get();

    // 3️⃣ TÍNH TỔNG TIỀN
    $total = 0;
    foreach ($items as $item) {
        $total += $item->price * $item->quantity;
    }

    // 4️⃣ TẠO OBJECT PHÙ HỢP BLADE CŨ
    $orderObj = (object) [
        'id'     => $order->order_id,
        'status' => $order->order_status,
        'total'  => $total,
        'items'  => $items,
    ];

    return view('order_confirmation', [
        'order' => $orderObj
    ]);
}



    public function paySuccess($id)
    {
        DB::table('orders')->where('id', $id)->update(['paid' => true, 'status' => 'paid', 'updated_at' => now()]);
        return redirect()->route('order.confirmation', ['id' => $id])->with('success', 'Thanh toán thành công');
    }
}
