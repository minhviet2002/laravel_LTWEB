<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class routeFrontendController extends Controller
{
    public function index(){
        $infoUser = null;
        if(session('name')){
            $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
            $infoUser = $dataUser[0];
            return view('route.frontend.index', compact('infoUser'));
        }else {
            return view('route.frontend.index', compact('infoUser'));
        }
       
    }
}
