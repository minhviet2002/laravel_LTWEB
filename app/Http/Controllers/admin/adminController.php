<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function checkAdmin( Request $request )
    {
        if (Auth::check()) {
            if(Auth::user()->is_admin == 1){

                return view('admin.index');
            }
            else {
                Auth::logout();
                $request->session()->forget('name');
                return redirect()->route('login')->with('msg', 'Cần đăng nhập tài khoản có quyền admin');
            }
        }
        return redirect()->route('login')->with('msg', 'Cần đăng nhập tài khoản có quyền admin');
    }
}
