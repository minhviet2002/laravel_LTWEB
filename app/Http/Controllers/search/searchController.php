<?php

namespace App\Http\Controllers\search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function index()
    {
        return view('lessonSearch.index');
    }
    public function search(Request $request)
    {
        $infoUser = null;
        if (session('name')) {
            $data = DB::select('select * from source.users where name = ? ' , [session('name')]);
            $infoUser = $data[0];
            if ($request->search != null) {
                $request->session()->put('keysearch', $request->search);
                $keyword = '%' . $request->search . '%';
                $searchResultHTML = DB::select('Select * from source.htmlcss where lessonname like ? ', [$keyword]);

                // DB::table('htmlcss')->where('lessonname', 'like', $keyword)->paginate(6);  
                $searchResultJS = DB::select('Select * from source.js where lessonname like ? ', [$keyword]);
                $message = 'Tìm kiếm bài học thành công';
                return view('lessonSearch.index', compact('message', 'searchResultHTML', 'searchResultJS', 'infoUser'));
            } else {
                $msg = 'Vui lòng nhập từ khóa';
                return view('lessonSearch.index', compact('msg'));
            }
        } else {
            if ($request->search != null) {
                $request->session()->put('keysearch', $request->search);
                $keyword = '%' . $request->search . '%';
                $searchResultHTML = DB::select('Select * from source.htmlcss where lessonname like ? ', [$keyword]);

                // DB::table('htmlcss')->where('lessonname', 'like', $keyword)->paginate(6);  
                $searchResultJS = DB::select('Select * from source.js where lessonname like ? ', [$keyword]);
                $message = 'Tìm kiếm bài học thành công';
                return view('lessonSearch.index', compact('message', 'searchResultHTML', 'searchResultJS', 'infoUser'));
            } else {
                $msg = 'Vui lòng nhập từ khóa';
                return view('lessonSearch.index', compact('msg'));
            }
        }
    }
}
