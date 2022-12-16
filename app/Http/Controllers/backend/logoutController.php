<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
class logoutController extends Controller
{
    public function logout( Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->forget('name');
            return redirect()->route('login');
        }
        else { 
            echo "Đăng xuất không thành công";
        }
        
    }
}
