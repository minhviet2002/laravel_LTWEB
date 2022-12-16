<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CommentRequest;

class commentsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $commentData = DB::select('select * from source.users u, source.comments cmt where u.id =  cmt.id  ORDER BY cmt.idcomments desc');
            $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
            $infoUser = $dataUser[0];
            $replyCommmentData = DB::select('select * from source.users u, source.comments cmt, source.reply_comments rcmt where u.id =  rcmt.id_users and cmt.idcomments = rcmt.id_comments');
            // dd($replyCommmentData);
            return view('comments.index', compact('commentData', 'replyCommmentData', 'infoUser'));
        }
        return redirect()->route('login')->with('msg', 'Đăng nhập để hỏi đáp');
    }
    public function updateIndex(Request $request, $idComment)
    {
        $request->session()->put('idComment', $idComment);
        $commentData = DB::select('select * from source.users u, source.comments cmt where u.id =  cmt.id  ORDER BY cmt.idcomments desc');
        $commentUpdate = DB::select('select cmt.content from source.comments cmt where idcomments = ? ', [$idComment]);
        $commentUpdateDetail = $commentUpdate[0];
        $replyCommmentData = DB::select('select * from source.users u, source.comments cmt, source.reply_comments rcmt where u.id =  rcmt.id_users and cmt.idcomments = rcmt.id_comments');
        $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
        $infoUser = $dataUser[0];
        return view('comments.commentUpdate', compact('commentData', 'commentUpdateDetail', 'replyCommmentData', 'infoUser'));
    }
    public function replyUpdateIndex(Request $request, $idComment)
    {
        $request->session()->put('idReplyComment', $idComment);
        $commentData = DB::select('select * from source.users u, source.comments cmt where u.id =  cmt.id ORDER BY cmt.idcomments desc');
        $commentUpdate = DB::select('select rcmt.content_reply from source.reply_comments rcmt where idreply_comments = ? ', [$idComment]);
        $commentUpdateDetail = $commentUpdate[0];
        $replyCommmentData = DB::select('select * from source.users u, source.comments cmt, source.reply_comments rcmt where u.id =  rcmt.id_users and cmt.idcomments = rcmt.id_comments ');
        $dataUser = DB::select('select * from source.users where name = ? ' , [session('name')]);
        $infoUser = $dataUser[0];
        return view('comments.replyCommentUpdate', compact('commentData', 'commentUpdateDetail', 'replyCommmentData', 'infoUser'));
    }
    public function postUpdateIndex(CommentRequest $request)
    {
        $idComment = session('idComment');
        if (Auth::user()->is_admin == 1) {
            if (empty($idComment)) {
                return back()->with('msg', 'Liên kết không tồn tại');
            } else {
                $data = [
                    $request->comment,
                    date('Y-m-d H:i:s'),
                    $idComment
                ];
                DB::update('Update source.comments SET content = ?, created_at = ? where idcomments = ?', $data);
                return redirect()->route('admin.comments.index')->with('message', 'Sửa bình luận thành công!');
            }
        } else {
            if (empty($idComment)) {
                return back()->with('msg', 'Liên kết không tồn tại');
            } else {
                $data = [
                    $request->comment,
                    date('Y-m-d H:i:s'),
                    $idComment
                ];
                DB::update('Update source.comments SET content = ?, created_at = ? where idcomments = ?', $data);
                return redirect()->route('learn.comments.index')->with('message', 'Sửa bình luận thành công!');
            }
        }
    }
    public function postReplyUpdateIndex(CommentRequest $request)
    {
        $idComment = session('idReplyComment');
        if (Auth::user()->is_admin == 1) {
            if (empty($idComment)) {
                return back()->with('msg', 'Liên kết không tồn tại');
            } else {
                $data = [
                    $request->comment,
                    date('Y-m-d H:i:s'),
                    $idComment
                ];
                DB::update('Update source.reply_comments SET content_reply = ?, created_at = ? where idreply_comments = ?', $data);
                return redirect()->route('admin.comments.index')->with('message', 'Sửa bình luận thành công!');
            }
        } else {
            if (empty($idComment)) {
                return back()->with('msg', 'Liên kết không tồn tại');
            } else {
                $data = [
                    $request->comment,
                    date('Y-m-d H:i:s'),
                    $idComment
                ];
                 DB::update('Update source.reply_comments SET content_reply = ?, created_at = ? where idreply_comments = ?', $data);
                return redirect()->route('learn.comments.index')->with('message', 'Sửa bình luận thành công!');
            }
        }
    }
}
