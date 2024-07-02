<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $product->view_count += 1;
        $product->save();
        return view('user.product.detail')->with([
            'product' => $product
        ]);
    }
}
