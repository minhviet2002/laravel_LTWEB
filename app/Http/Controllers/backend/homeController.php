<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index( ){  
       
        $infoUser = null;
        if(session('name')){
            $data = DB::select('select * from source.users where name = ? ' , [session('name')]);
            $infoUser = $data[0];
            return view('home.index', compact('infoUser'));
        }else {
            return view('home.index', compact('infoUser'));
        }
    }
}
