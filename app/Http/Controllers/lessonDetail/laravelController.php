<?php

namespace App\Http\Controllers\lessonDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class laravelController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('lessons.laravel.index');
        }
        return redirect()->route('login')->with('msg', 'Đăng nhập để truy cập khóa học');
    }
}
