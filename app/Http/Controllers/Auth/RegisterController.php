<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function registerUser(RegisterRequest $request){
        try{
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->status = User::STATUS['ACTIVE'];
            $user->address = $request->input('address');
            $user->gender = (int)$request->input('gender');
            $user->phone = $request->input('phone');
            $user->save();
            $request->session()->flash('success','Đăng ký tài khoản thành công!');
            return redirect()->route('user.login');
        } catch (\Exception $exception){
            // \Log::error([
            //     'method' => __METHOD__,
            //     'line' => __LINE__,
            //     'message' => $exception->getMessage(),
            //     'data' => $request->all()
            // ]);
            $request->session()->flash('error','Đăng ký tài khoản không thành công !');
            return redirect()->back()->withInput();
        }
    }
}
