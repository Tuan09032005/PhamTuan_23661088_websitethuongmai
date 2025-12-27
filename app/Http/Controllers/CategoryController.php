<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private function ensureAdmin()
    {
        if (!Session::get('logged_in') || Session::get('user_role') != 1) {
            return redirect('/admin/login')->with('error', 'Bạn không có quyền truy cập');
        }
        return null;
    }

    public function get_all()
    {
        if ($resp = $this->ensureAdmin()) return $resp;
        $categories = CategoryModel::all();
        return view('admin.category_list', ['categories' => $categories]);
    }

    public function create()
    {
        if ($resp = $this->ensureAdmin()) return $resp;
        return view('admin.category_form', ['category' => null]);
    }

    public function store(Request $request)
    {
        if ($resp = $this->ensureAdmin()) return $resp;
        $data = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

        $cat = new CategoryModel();
        $cat->category_name = $data['category_name'];
        $cat->save();

        return redirect()->to('admin/danh-sach-danh-muc')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($id)
    {
        if ($resp = $this->ensureAdmin()) return $resp;
        $category = CategoryModel::where('category_id', $id)->first();
        return view('admin.category_form', ['category' => $category]);
    }

    public function update(Request $request)
    {
        if ($resp = $this->ensureAdmin()) return $resp;
        $data = $request->validate([
            'id' => 'required|integer',
            'category_name' => 'required|string|max:255'
        ]);

        CategoryModel::where('category_id', $data['id'])->update(['category_name' => $data['category_name']]);

        return redirect()->to('admin/danh-sach-danh-muc')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function del($id)
    {
        if ($resp = $this->ensureAdmin()) return $resp;
        CategoryModel::where('category_id', $id)->delete();
        return redirect()->to('admin/danh-sach-danh-muc')->with('success', 'Xóa danh mục thành công!');
    }
}
