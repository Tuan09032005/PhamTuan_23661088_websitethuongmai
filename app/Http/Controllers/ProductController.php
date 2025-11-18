<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductController extends Controller
{
    public function insert_form()
    {
        $categories = CategoryModel::all();
        return view('admin/product_insert_form', ['categories' => $categories]);
    }

    public function action_insert(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category = $request->input('category');

        if ($request->hasFile('img')) {
            $request->file('img')->move('img', $request->file('img')->getClientOriginalName());
            $img_name = 'img/' . $request->file('img')->getClientOriginalName();
        } else {
            $img_name = 'img/default.png';
        }

        $result = [
            'product_name' => $name,
            'product_img' => $img_name,
            'product_price' => $price,
            'product_category' => $category,
            'product_description' => $description
        ];

        ProductModel::insert($result);
        return redirect()->to('admin/danh-sach-san-pham')->with('success', 'Thêm sản phẩm thành công!');
    }

    public function action_update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category = $request->input('category');

        if ($request->hasFile('img')) {
            $request->file('img')->move('img', $request->file('img')->getClientOriginalName());
            $img_name = 'img/' . $request->file('img')->getClientOriginalName();
        } else {
            $img_name = $request->input('img_old');
        }

        $result = [
            'product_name' => $name,
            'product_img' => $img_name,
            'product_price' => $price,
            'product_category' => $category,
            'product_description' => $description
        ];

        ProductModel::where('product_id', $id)->update($result);
        return redirect()->to('admin/danh-sach-san-pham')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function get_all()
    {
        $products = ProductModel::join('category', 'product_category', '=', 'category_id')->get();
        return view('admin/product_list', ['products' => $products]);
    }

    public function del($id)
    {
        ProductModel::where('product_id', $id)->delete();
        return redirect()->to('admin/danh-sach-san-pham')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function show($id)
    {
        $products = ProductModel::join('category', 'product_category', '=', 'category_id')
            ->where('product_id', $id)
            ->get();
        $categories = CategoryModel::all();
        return view('admin/product_info_form', ['products' => $products, 'categories' => $categories]);
    }
}
