<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

//Home page product display method
class HomeController extends Controller
{
    public function index()
    {
        $lastProducts = Product::where('status', Product::STILL_IN_BUSINESS)->limit(8)->orderBy('created_at','DESC')->get();
        $InspirationalProducts = Product::where('status', Product::STILL_IN_BUSINESS)->limit(8)->orderBy('view_count','DESC')->get();
        $outstandingProducts = Product::where('status', Product::STILL_IN_BUSINESS)->limit(3)->orderBy('sell_count','DESC')->get();
        return view('user.home')->with([
            'lastProducts' => $lastProducts,
            'InspirationalProducts' => $InspirationalProducts,
            'outstandingProducts' => $outstandingProducts
        ]);
    }
}
