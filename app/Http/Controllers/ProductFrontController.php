<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class ProductFrontController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $category = $request->query('category');
        $sort = $request->query('sort');

        $query = ProductModel::join('category', 'product_category', '=', 'category_id')
            ->select('product.*', 'category.category_name');

        if ($q) {
            $query->where(function ($w) use ($q) {
                $w->where('product_name', 'like', "%{$q}%")
                  ->orWhere('product_description', 'like', "%{$q}%");
            });
        }

        if ($category) {
            $query->where('product_category', $category);
        }

        if ($sort === 'price_asc') {
            $query->orderBy('product_price', 'asc');
        } elseif ($sort === 'price_desc') {
            $query->orderBy('product_price', 'desc');
        } else {
            $query->orderBy('product_id', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = CategoryModel::all();

        return view('products.index', compact('products', 'categories', 'q', 'category', 'sort'));
    }

    public function show($id)
    {
        $product = ProductModel::join('category', 'product_category', '=', 'category_id')
            ->select('product.*', 'category.category_name')
            ->where('product_id', $id)
            ->firstOrFail();

        $related = ProductModel::where('product_category', $product->product_category)
            ->where('product_id', '<>', $product->product_id)
            ->limit(4)
            ->get();

        return view('products.show', compact('product', 'related'));
    }
}
