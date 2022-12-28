<?php

namespace App\Http\Controllers\personalPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class personalPageController extends Controller
{
    public function index()
    {
    }
    public function pageIndex($name)
    {
        $data = DB::select('select * from source.users where name = ? ', [session('name')]);
        $infoUser = $data[0];
        $data_user = DB::select('select * from source.users where name = ? ', [$name]);
        $data_user_detail = $data_user[0];
        $content = DB::select('SELECT * FROM source.users u,  comments cmt where u.id = cmt.id and u.name = ? ', [$name]);
        $content_reply = DB::select('SELECT * FROM source.users u, reply_comments replycmt  where u.id = replycmt.id_users and u.name = ? ', [$name]);
        return view('personal_page.index', compact('infoUser', 'content', 'content_reply', 'data_user_detail'));
    }
}
