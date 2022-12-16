<?php

namespace App\Http\Controllers\adminManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReactController extends Controller
{
    public function index (){
        $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
        $infoUser = $dataUser[0]; 
        return view('admin.course.react', compact('infoUser'));
    }
}
