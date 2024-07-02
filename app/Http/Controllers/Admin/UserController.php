<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $query = User::query();
        if($request->input('email')) {
            $query->where('email', 'like', '%' . $request->input('email') . '%');
        }
        
        if($request->input('status')) {
            $query->where('status',$request->input('status'));
        }
        $users = $query->orderBy('created_at','desc')->paginate(10);
        return view('admin.users.list',['users'=>$users]);
    }

    public function lock($id)
    {
        $user = User::findOrFail($id);
        $user->status = User::STATUS['DE_ACTIVE'];
        $user->save();
        return redirect()->route('admin.users.list');
    }

    public function unLock($id)
    {
        $user = User::findOrFail($id);
        $user->status = User::STATUS['ACTIVE'];
        $user->save();
        return redirect()->route('admin.users.list');
    }
}
