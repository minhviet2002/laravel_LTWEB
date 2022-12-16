<?php

namespace App\Http\Controllers\adminManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index (){
        $users = DB::select('Select * from users where is_admin = 0') ; 
        $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
        $infoUser = $dataUser[0]; 
        return view('admin.users.index', compact('users' , 'infoUser'));
    }
}
