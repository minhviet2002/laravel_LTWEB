<?php

namespace App\Http\Controllers\formadd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FormAddRequest;
use Illuminate\Support\Facades\DB;

class formAddHtmlController extends Controller
{
    public function index()
    {
        return view('admin.formlesson.formaddHTML');
    }
    public function postlesson(FormAddRequest $request)
    {
        $data = [
            $request->lessonname,
            $request->lessonlink,
            $request->title,
        ];
        DB::insert('INSERT INTO source.htmlcss ( lessonname , lessonlink, title) VALUES ( ?, ?, ?)', $data);
        return redirect()->route('formadd.html.index')->with('message', 'Thêm bài học thành công!');
    }
    public function update(Request $request, $id)
    {
        if (!empty($id)) {
            $data = DB::select('Select * from source.htmlcss where id = ?', [$id]);
            if (!empty($data[0])) {
                $lessonDetail = $data[0];
                $request->session()->put('idHTML', $id);
                return view('admin.formlesson.formupdateHTML', compact('lessonDetail'));
            } else {
                return redirect()->route('manage.html.index')->with('msg', 'Bài học không tồn tại');

            }
        } else {
            return redirect()->route('manage.html.index')->with('msg', 'Liên kết không tồn tại');
        }
    }
    public function postUpdate(FormAddRequest $request)
    {
        $id = session('idHTML');
        if(empty($id)){
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        {
            $data = [
                $request->lessonname,
                $request->lessonlink,
                $request->title,
                $id
            ];
            DB::update('Update source.htmlcss SET lessonname = ?, lessonlink = ?, title =? where id = ?', $data);
            return redirect()->route('manage.html.index')->with('message', 'Cập nhật bài học thành công!');
        }
    }
    public function delete( $id)
    {
        if (!empty($id)) {
            $data = DB::select('Select * from source.htmlcss where id = ?', [$id]);
            if (!empty($data[0])) {
                DB::delete("Delete from source.htmlcss where id = ?", [$id]);
                return redirect()->route('manage.html.index')->with('message', 'Xóa bài học thành công');
            } else {
                return redirect()->route('manage.html.index')->with('msg', 'Bài học không tồn tại');

            }
        } else {
            return redirect()->route('manage.html.index')->with('msg', 'Liên kết không tồn tại');
        }
    }
}
