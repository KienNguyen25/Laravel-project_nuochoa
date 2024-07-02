<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{   

    //View order details
    public function index(Request $request, $id)
    {
        $orders = Order::where('user_id',$id)->orderBy('created_at','DESC')->get();
        return view('user.order')->with([
            'orders' => $orders
        ]);
    }

    //Process create bew order request
    public function store(StoreOrderRequest $request){
        try{
            $data=$request-> all();
            $products = Cart::content();
            DB::beginTransaction();
            $order = new Order();
            $order->order_id = $this->ascendingCode();
            $order-> user_id = auth()->guard('web')->user()->id;
            $order->total = (int)str_replace( ',', '', Cart::total());
            $order->note = $data['note'];
            $order->receiver_name = $data['name'];
            $order->receiver_address = $data['address'];
            $order->save();
            foreach($products as $item){
                $data = Product::where('id','=',$item->id)->get();
                $data[0]->sell_count = $data[0]->sell_count + $item->qty ;
                $data[0]->quantity = $data[0]->quantity - $item->qty ;
                $data[0]->save();
                $order->products()->attach($item->id,
                    ['quantity'=>$item->qty ,
                        'price'=>$item->price]
                );
            }
            Cart::destroy();
            DB::commit();
        return redirect()->route('user.orders.list',auth()->user()->id);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([
                'method' => __METHOD__,
                'line' => __LINE__,
                'message' => $e->getMessage(),
                'data' => $request->all()
            ]);
            $request->session()->flash('error','Tạo đơn hàng không thành công');
            return back();
        }
    }


    //Generate incremental order code
    private function ascendingCode()
    {
        $code = 'TK-';
        $data = Product::orderBy('created_at', 'DESC')->count();
        $id = str_replace(':', '',$data);
        $code = $code. str_pad($id + 1, 7, 0,STR_PAD_LEFT);
        return $code;
    }
}
