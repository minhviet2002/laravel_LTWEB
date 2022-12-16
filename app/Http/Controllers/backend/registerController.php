<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    public function index(){
        return view('login.register');
    }
    public function postInfoRegister(RegisterRequest $request)
    {
        $data = [
            $request->name,
            bcrypt($request->password),
            $request->fullname,
            $request->email,
            0
        ];
        DB::insert('INSERT INTO source.users ( name, password, fullname, email, is_admin ) VALUES ( ?, ?, ?, ?, ? )', $data);
        return redirect()->route('login')->with('message', 'Đăng kí thành công!');
    }
}
