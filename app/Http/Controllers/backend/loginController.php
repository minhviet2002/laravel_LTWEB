<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\backend\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
class loginController extends Controller
{
    public function index( )
    {   
        return view('login.index');
    }
    public function postInfoLogin(LoginRequest $request)
    {
        // dd($request);
        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        $request->session()->put('name', $request->name);
        if(Auth::attempt($data)){
            if(Auth::user()->is_admin == 1){
                return redirect()->route('manage.users.index');
            }
            else {
                return redirect()->route('home');
            }
        }
        else {
            return redirect()->route('login')->with('msg', 'Sai thông tin tài khoản hoặc mật khẩu');
        }
    }
}
