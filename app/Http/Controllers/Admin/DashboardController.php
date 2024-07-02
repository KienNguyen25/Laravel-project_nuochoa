<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::all();
        $users = User::all();
        // $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        // $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        // $turnover = Statistical::whereBetween('order_date',[$sub365days,$now])->sum('profit');

        return view('admin.dashboard')->with([
            'products'=>$products,
            'users'=>$users,
            // 'turnover' => $turnover,
        ]);
    }
    // public function fillterByDate(){
    //     $data = request()->all();
    //     $chart_data = [];
    //     $from_date = $data['from_date'];
    //     $to_date = $data['to_date'];
    //     $get = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
    //     foreach($get as $val){
    //         $chart_data[] = array(
    //             'period' => $val->order_date,
    //             'order'=> $val->total_order,
    //             'sales' => $val->sales,
    //             'profit'=> $val->profit,
    //             'quantity' => $val->quantity
    //         );
    //     }
    //     // dd($chart_data);
    //     echo $data = json_encode($chart_data);

    // }
    // public function dashboardFillter(Request $request){
    //     $chart_data = null;
    //     $data = $request->all();
    //     $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    //     $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    //     $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

    //     $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
    //     $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
    //     $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    //     if($data['dashboard_value']=='7ngay'){
    //         $get = Statistical::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_value']=='thangtruoc'){
    //         $get = Statistical::whereBetween('order_date',[$dau_thangtruoc,$cuoi_thangtruoc])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_value']=='thangnay'){
    //         $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
    //     }elseif($data['dashboard_value']=='365ngayqua'){
    //         $get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
    //     }

    //     foreach($get as $val){
    //         $chart_data[] = array(
    //             'period' => $val->order_date,
    //             'order'=> $val->total_order,
    //             'sales' => $val->sales,
    //             'profit'=> $val->profit,
    //             'quantity' => $val->quantity
    //         );
    //     }
    //     // dd($chart_data);
    //     echo $data = json_encode($chart_data);

    // }
}
