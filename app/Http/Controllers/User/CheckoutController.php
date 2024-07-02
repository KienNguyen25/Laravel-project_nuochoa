<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if(!auth()->guard('web')->check()) {
            $request->session()->flash('error', 'Bạn cần đăng nhập để tiến hành thanh toán');
            return redirect('/login');
        } else {
            $carts = Cart::content();
            return view('user.checkout.index')->with(['carts' => $carts]);
        }

    }
}
