<?php

namespace App\Http\Controllers\lessonDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class jsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $js = DB::table('js')->paginate(1);
            $jsLink = DB::select('select * from js');
            return view('lessons.js.index', compact('js', 'jsLink'));
        }
        return redirect()->route('login')->with('msg', 'Đăng nhập để truy cập khóa học');
      
    }
}
