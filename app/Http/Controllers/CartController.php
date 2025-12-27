<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = ProductModel::where('product_id', $id)->first();
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'product_id' => $product->product_id,
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'image' => $product->product_img ?? null,
            ];
        }

        session()->put('cart', $cart);
        // If caller requested immediate checkout, redirect there
        if ($request->input('redirect') === 'checkout') {
            return redirect()->route('checkout')->with('success', 'Đã thêm vào giỏ hàng');
        }

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');
    }

    public function update(Request $request)
    {
        $quantities = $request->input('quantities', []);
        $cart = session()->get('cart', []);
        foreach ($quantities as $productId => $qty) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = max(1, (int)$qty);
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Cập nhật giỏ hàng thành công');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Đã xóa sản phẩm');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được xoá');
    }
}
