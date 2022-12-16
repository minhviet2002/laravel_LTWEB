<?php

namespace App\Http\Controllers\formadd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormAddRequest;
use Illuminate\Support\Facades\DB; 

class formAddJSController extends Controller
{
    public function index(){
        return view('admin.formlesson.formaddJS');
    }
    public function postlesson(FormAddRequest $request){
        $data = [
            $request->lessonname,
            $request->lessonlink,
            $request->title,
        ];
        DB::insert('INSERT INTO source.js ( lessonname , lessonlink, title) VALUES ( ?, ?, ?)', $data);
        return redirect()->route('formadd.js.index')->with('message', 'Thêm bài học thành công!');
    }
    public function update(Request $request, $id)
    {
        if (!empty($id)) {
            $data = DB::select('Select * from source.js where id = ?', [$id]);
            if (!empty($data[0])) {
                $lessonDetail = $data[0];
                $request->session()->put('idJS', $id);
                return view('admin.formlesson.formupdateJS', compact('lessonDetail'));
            } else {
                return redirect()->route('manage.js.index')->with('msg', 'Bài học không tồn tại');

            }
        } else {
            return redirect()->route('manage.js.index')->with('msg', 'Liên kết không tồn tại');
        }
    }
    public function postUpdate(FormAddRequest $request)
    {
        $id = session('idJS');
        if(empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        else{
            $data = [
                $request->lessonname,
                $request->lessonlink,
                $request->title,
                $id
            ];
            DB::update('Update source.js SET lessonname = ?, lessonlink = ?, title =? where id = ?', $data);
            return redirect()->route('manage.js.index')->with('message', 'Cập nhật bài học thành công!');
        }
    }
    public function delete( $id)
    {
        if (!empty($id)) {
            $data = DB::select('Select * from source.js where id = ?', [$id]);
            if (!empty($data[0])) {
                DB::delete("Delete from source.js where id = ?", [$id]);
                return redirect()->route('manage.js.index')->with('message', 'Xóa bài học thành công');
            } else {
                return redirect()->route('manage.js.index')->with('msg', 'Bài học không tồn tại');

            }
        } else {
            return redirect()->route('manage.js.index')->with('msg', 'Liên kết không tồn tại');
        }
    }
}
