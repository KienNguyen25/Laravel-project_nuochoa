<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{

    //filter products by user requiment
    public function index(Request $request)
    {
        $query = Product::query();
        if($request->input('category')) {
            $query->where('category_id', $request->input('category'));
        }
        if($request->input('brand')) {
            $query->where('brand_id', $request->input('brand'));
        }
        if($request->input('price')) {
            if((int)$request->input('price') == (int)Product::KHOANG_GIA['100-500']){
                $query->whereBetween('sale_price', [100000, 500000]);
            }
            if((int)$request->input('price') == (int)Product::KHOANG_GIA['500-1tr']){
                $query->whereBetween('sale_price', [500000, 1000000]);
            }
            if((int)$request->input('price') == (int)Product::KHOANG_GIA['1tr-3tr']){
                $query->whereBetween('sale_price', [1000000, 3000000]);
            }
            if((int)$request->input('price') == (int)Product::KHOANG_GIA['3tr-5tr']){
                $query->whereBetween('sale_price', [3000000, 5000000]);
            }
            if((int)$request->input('price') == (int)Product::KHOANG_GIA['tren_5tr']){
                $query->where('sale_price', '>', 5000000);
            }
            if((int)$request->input('price') == (int)Product::KHOANG_GIA['5tr-10tr']){
                $query->where('sale_price', '>', [5000000, 10000000]);
            }
        }
        $products = $query->get();
        $categories = Category::all();
        $brands = Brand::all();
        return view('user.category.index')->with([
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
