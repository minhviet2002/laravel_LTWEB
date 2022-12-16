<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class lessonsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
                $infoUser = $dataUser[0];
           
            $data = DB::select('select * from source.users where name = ? ' , [session('name')]);
            $infoUser = $data[0];
            $dataJS = DB::select('SELECT * FROM js');
            return view('lessons.index', ['dataJS' => $dataJS, 'infoUser' => $infoUser, 'infoUser' => $infoUser]);
        }
        return redirect()->route('login')->with('msg', 'Đăng nhập để truy cập khóa học');
    }
}
