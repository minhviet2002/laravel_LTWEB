<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class routeController extends Controller
{
    public function index(){
        $infoUser = null;
        if(session('name')){
            $data = DB::select('select * from source.users where name = ? ' , [session('name')]);
            $infoUser = $data[0];
            return view('route.index', compact('infoUser'));
        }else {
            return view('route.index', compact('infoUser'));
        }
      
    }
}
