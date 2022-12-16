<?php

namespace App\Http\Controllers\formadd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;

class formAddUserController extends Controller
{
    public function index(){
        return view('admin.formuser.formaddUser');
    }
    public function postUser(RegisterRequest $request)
    {
        $data = [
            $request->name,
            bcrypt($request->password),
            $request->fullname,
            $request->email,
            0
        ];
        DB::insert('INSERT INTO source.users ( name, password, fullname, email, is_admin ) VALUES ( ?, ?, ?, ?, ? )', $data);
        return redirect()->route('manage.users.index')->with('message', 'Thêm học viên thành công!');
    }
    public function delete ( $id ){
        if (!empty($id)) {
            $data = DB::select('Select * from source.users where id = ?', [$id]);
            if (!empty($data[0])) {
                DB::delete("Delete from source.users where id = ?", [$id]);
                return redirect()->route('manage.users.index')->with('message', 'Xóa tài khoản học viên thành công');
            } else {
                return redirect()->route('manage.users.index')->with('msg', 'Tài khoản học viên không tồn tại');

            }
        } else {
            return redirect()->route('manage.users.index')->with('msg', 'Liên kết không tồn tại');
        }
    }
}
