<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::content();
        $cartTotals = Cart::subtotal();
        return view('user.cart.index')->with(['carts' => $carts, 'cartTotals' => $cartTotals]);
    }

    public function addCart(Request $request, $id){
        $data = $request->all();
        if(!empty($data['qty'])){
            $qty = $data['qty'];
        }else{
            $qty = 1;
        }
        $product = Product::find($id);
        if($qty>$product->quantity){
            $request->session()->flash('error', 'Mặt hàng chỉ còn '.$product->quantity.' sản phẩm');
            return back();

        }
        else{
            $cart = Cart::add($product->id, $product->name, $qty, $product->sale_price);
            $request->session()->flash('success', 'Thêm thành công vào giỏ hàng');
            return back();
        }
    }

    public function reset(Request $request)
    {
        Cart::destroy();
        $request->session()->flash('success', 'Làm mới giỏ hàng thành công');
        return redirect()->route('user.carts.list');
    }

    public function remove($rowId){
        Cart::remove($rowId);
        return redirect()->route('user.carts.list')->with('success', 'Xóa khỏi giỏ hàng thành công');
    }

    public function down($rowId, $qty)
    {
        Cart::update($rowId,$qty-1);
        return redirect()->route('user.carts.list');
    }

    public function up(Request $request, $rowId, $qty, $id)
    {
        $product = Product::findOrFail($id);
        if($qty >= $product->quantity) {
            $request->session()->flash('error', 'Mặt hàng chỉ còn '.$product->quantity.' sản phẩm');
            return back();
        }else {
            Cart::update($rowId,$qty+1);
            return redirect()->route('user.carts.list');
        }
    }
}
