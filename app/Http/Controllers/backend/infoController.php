<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\postUpdateUserRequest;
use Spatie\Backtrace\File;

class infoController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 0) {
                $dataUser = DB::select('select * from source.users where name = ? ', [session('name')]);
                $infoUser = $dataUser[0];
                $userID = Auth::user()->id;
                $data = DB::select('Select * from source.users where id = ?', [$userID]);
                $dataDetail = $data[0];
                return view('personalInfo.index', compact('dataDetail', 'infoUser'));
            }
        }
        return redirect()->route('login')->with('msg', 'Bạn chưa đăng nhập');
    }
    public function updateIndex()
    {
        $userID = Auth::user()->id;
        $data = DB::select('Select * from source.users where id = ?', [$userID]);
        $dataDetail = $data[0];
        $dataUser = DB::select('select * from source.users where name = ? ', [session('name')]);
        $infoUser = $dataUser[0];
        return view('personalInfo.formUpdateUser', compact('dataDetail', 'infoUser'));
    }
    public function postUpdateIndex(postUpdateUserRequest $request)
    {

        if ($request->has('file_upload')) {
            $file = $request->file_upload;
            $extension = $request->file_upload->extension();
            $file_name = time() . '_avatarUser.' . $extension;
            $file->move(public_path('avatar'), $file_name);
            $request->merge(['avatar' => $file_name]);
            $userID = Auth::user()->id;
            $data = [
                $request->name,
                $request->fullname,
                $request->email,
                $request->avatar,
                $userID
            ];
            if ($request->has('file_old')) {
                $avatarOld = "avatar/"  . $request->file_old;
                if (file_exists($avatarOld)) {
                    unlink($avatarOld);
                }
            }

            DB::update('Update source.users SET name = ?, fullname = ?, email =?, avatar = ? where id = ?', $data);
            $request->session()->put('name', $request->name);
            return redirect()->route('learn.info.index')->with('message', 'Sửa thông tin thành công!');
        } else {
            $userID = Auth::user()->id;
            $data = [
                $request->name,
                $request->fullname,
                $request->email,
                $userID
            ];
            DB::update('Update source.users SET name = ?, fullname = ?, email =? where id = ?', $data);
            $request->session()->put('name', $request->name);
            return redirect()->route('learn.info.index')->with('message', 'Sửa thông tin thành công!');
        }
    }
}
