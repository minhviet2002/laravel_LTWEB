<?php

namespace App\Http\Controllers\lessonDetail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class htmlController extends Controller
{
    public function index(){
        if (Auth::check()) {
            $html = DB::table('htmlcss')->paginate(1);
            $htmlLink = DB::select('select * from htmlcss');
            return view('lessons.html.index', compact('html', 'htmlLink'));
        }
        return redirect()->route('login')->with('msg', 'Đăng nhập để truy cập khóa học');
        
      
    }
}
