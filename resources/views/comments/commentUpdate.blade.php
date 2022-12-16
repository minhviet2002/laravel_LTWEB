@extends('master.index')
@section('title')
Sửa bình luận
@endsection
<style>
    .active-comments {
        background-color: #e8ebed !important;
        color: #1a1a1a !important;
    }

    .active-comment {
        background-color: #e8ebed !important;
        color: var(--primary-color) !important;
    }

    /* .active-admincomment {
        background-color: #e8ebed;
        color: var(--primary-color);
    } */
</style>
@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection

@if(session('name') != 'admin')
@section('sidebar')
<x-sidebar></x-sidebar>
@endsection

@else
@section('nav')
<x-nav-admin></x-nav-admin>
@endsection
@endif

@section('content-main')

<div class="content-comments">
    <div>
        <h1 class="comments-heading">Cùng nhau hỏi đáp:</h1>
    </div>
    @if(session('message'))
    <div class="alert alert-success text-center">{{session('message')}}</div>
    @endif
    @if(session('msg'))
    <div class="alert alert-success text-center">{{session('msg')}}</div>
    @endif
    <div class="form-wrap">
        <form action="{{ route('postUpdateComment.index') }}" method="post" class="commentBox_commentWrapper">
            @csrf
            <div class="form-body">
                <i class="comment-item-ava-cmt fa-sharp fa-solid fa-user-tie"></i>
                <div class="form-body-input">

                    <input class="text_text commentBox_commentInput" value="{{ old('comment') ?? $commentUpdateDetail->content}}" name="comment" type="text" placeholder="Bạn có thắc mắc gì không?">
                    @error('comment')
                    <div class="text-msg" class="form_input-message">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="commentBox_actionWrapper">
                <a href="{{ route('learn.comments.index') }}" class="commentBox_cancel">Hủy</a>
                <button class="commentBox_cmt">Sửa</button>
            </div>
        </form>
    </div>
    <div class="comment-list">

        @if(!empty($commentData) && !empty($replyCommmentData))
        @for( $i = 0; $i < count($commentData); $i++) @if(session('name')) @if($commentData[$i]->name == session('name'))
            <div class="comment-item">
                @if($commentData[$i]->id == 1)
                <div class="comment-item-author">
                @if($commentData[$i]->avatar != null)
                    <img class="avatar-user" src="{{asset('avatar')}}/{{$commentData[$i]->avatar}}" alt="">
                    @else
                    <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                    @endif
                    <h2 class="comment-item-name">Bạn</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                    <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                        <ul class="comment-option-list">
                            <li class="comment-option-item">
                                <a href="{{ route('AdminUpdateComment.index', ['idComment' => $commentData[$i]->idcomments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                            </li>
                            <li class="comment-option-item">
                                <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteComment', [ 'commentId' => $commentData[$i]->idcomments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <span class="comment-item-content"> {{$commentData[$i]->content}}</span>
                <span class="comment-hour">{{$commentData[$i]->created_at}}</span>
                @foreach($replyCommmentData as $key=>$item)
                @if($item->id_comments == $commentData[$i]->idcomments)
                @if($item->name == session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name == session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @endif
                @endif
                @endforeach
                <span class="reply_comment">Trả lời</span>

                <div class="form-wrap-reply">
                    <form action="{{ route('commentPage.replyComment', ['idCommented' => $commentData[$i]->idcomments]) }}" method="get" class="commentBox_commentWrapper-reply">
                        @csrf
                        <div class="form-body-reply">
                            <!-- <i class="comment-item-ava-cmt fa-sharp fa-solid fa-user-tie"></i> -->
                            <div class="form-body-input-reply">
                                <input class="text_text commentBox_commentInput-reply" value="{{ old('comment') }}" name="comment" type="text" placeholder="Bạn có thắc mắc gì không?">
                                @error('comment')
                                <div class="text-msg" class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="commentBox_actionWrapper-reply">
                            <span class="commentBox_cancel-reply">Hủy</span>
                            <button class="commentBox_cmt-reply">Bình luận</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="comment-item-author">
                @if($commentData[$i]->avatar != null)
                    <img class="avatar-user" src="{{asset('avatar')}}/{{$commentData[$i]->avatar}}" alt="">
                    @else
                    <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                    @endif
                    <h2 class="comment-item-name">Bạn</h2>
                    <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                        <ul class="comment-option-list">
                            <li class="comment-option-item">
                                <a href="{{ route('updateComment.index', ['idComment' => $commentData[$i]->idcomments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                            </li>
                            <li class="comment-option-item">
                                <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteComment', [ 'commentId' => $commentData[$i]->idcomments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <span class="comment-item-content"> {{$commentData[$i]->content}}</span>
                <span class="comment-hour">{{$commentData[$i]->created_at}}</span>
                @foreach($replyCommmentData as $key=>$item)
                @if($item->id_comments == $commentData[$i]->idcomments)
                @if($item->name == session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name == session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @endif
                @endif
                @endforeach
                <span class="reply_comment">Trả lời</span>

                <div class="form-wrap-reply">
                    <form action="{{ route('commentPage.replyComment', ['idCommented' => $commentData[$i]->idcomments]) }}" method="get" class="commentBox_commentWrapper-reply">
                        @csrf
                        <div class="form-body-reply">
                            <!-- <i class="comment-item-ava-cmt fa-sharp fa-solid fa-user-tie"></i> -->
                            <div class="form-body-input-reply">
                                <input class="text_text commentBox_commentInput-reply" value="{{ old('comment') }}" name="comment" type="text" placeholder="Bạn có thắc mắc gì không?">
                                @error('comment')
                                <div class="text-msg" class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="commentBox_actionWrapper-reply">
                            <span class="commentBox_cancel-reply">Hủy</span>
                            <button class="commentBox_cmt-reply">Bình luận</button>
                        </div>
                    </form>
                </div>
                @endif


            </div>
            @else
            <div class="comment-item">
                @if($commentData[$i]->is_admin == 1)
                <div class="comment-item-author">
                @if($commentData[$i]->avatar != null)
                    <img class="avatar-user" src="{{asset('avatar')}}/{{$commentData[$i]->avatar}}" alt="">
                    @else
                    <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                    @endif
                    <h2 class="comment-item-name">{{$commentData[$i]->fullname }}</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                </div>
                <span class="comment-item-content"> {{$commentData[$i]->content}}</span>
                <span class="comment-hour">{{$commentData[$i]->created_at}}</span>
                @foreach($replyCommmentData as $key=>$item)
                @if($item->id_comments == $commentData[$i]->idcomments)
                @if($item->name == session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name == session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @endif
                @endif
                @endforeach
                <span class="reply_comment">Trả lời</span>

                <div class="form-wrap-reply">
                    <form action="{{ route('commentPage.replyComment', ['idCommented' => $commentData[$i]->idcomments]) }}" method="get" class="commentBox_commentWrapper-reply">
                        @csrf
                        <div class="form-body-reply">
                            <!-- <i class="comment-item-ava-cmt fa-sharp fa-solid fa-user-tie"></i> -->
                            <div class="form-body-input-reply">
                                <input class="text_text commentBox_commentInput-reply" value="{{ old('comment') }}" name="comment" type="text" placeholder="Bạn có thắc mắc gì không?">
                                @error('comment')
                                <div class="text-msg" class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="commentBox_actionWrapper-reply">
                            <span class="commentBox_cancel-reply">Hủy</span>
                            <button class="commentBox_cmt-reply">Bình luận</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="comment-item-author">
                @if($commentData[$i]->avatar != null)
                    <img class="avatar-user" src="{{asset('avatar')}}/{{$commentData[$i]->avatar}}" alt="">
                    @else
                    <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                    @endif
                    <h2 class="comment-item-name">{{$commentData[$i]->fullname }}</h2>
                </div>
                <span class="comment-item-content"> {{$commentData[$i]->content}}</span>
                <span class="comment-hour">{{$commentData[$i]->created_at}}</span>
                @foreach($replyCommmentData as $key=>$item)
                @if($item->id_comments == $commentData[$i]->idcomments)
                @if($item->name == session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name == session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">Bạn</h2>
                        <div class="comment-item-btn icon-ellipsis fa-solid fa-ellipsis">
                            <ul class="comment-option-list">
                                <li class="comment-option-item">
                                    <a href="{{ route('updateReplyComment.index', ['idComment' => $item->idreply_comments ]) }}" class=""> <i class=" icon-option fa-solid fa-pen"></i>Sửa</a>
                                </li>
                                <li class="comment-option-item">
                                    <a onclick="return confirm('Bạn muốn xóa bình luận?')" href="{{ route('commentPage.deleteReplyComment', [ 'replyCommentId' => $item->idreply_comments ]) }}" class=""><i class="icon-option fa-solid fa-trash"></i>Xóa</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin == 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2><i class="comment-item-check fa-solid fa-circle-check"></i>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @elseif($item->name != session('name') && $item->is_admin != 1)
                <div class="reply_wrap">
                    <div class="comment-item-author">
                        <i class="icon_rorate fa-solid fa-arrow-turn-up"></i>
                        @if($item->avatar != null)
                        <img class="avatar-user" src="{{asset('avatar')}}/{{$item->avatar}}" alt="">
                        @else
                        <i class="comment-item-ava fa-sharp fa-solid fa-user-tie"></i>
                        @endif
                        <h2 class="comment-item-name-reply">{{$item->fullname}}</h2>
                    </div>
                    <span class="comment-item-content"> {{$item->content_reply}}</span>
                    <span class="comment-hour">{{$item->created_at}}</span>
                </div>
                @endif
                @endif
                @endforeach
                <span class="reply_comment">Trả lời</span>

                <div class="form-wrap-reply">
                    <form action="{{ route('commentPage.replyComment', ['idCommented' => $commentData[$i]->idcomments]) }}" method="get" class="commentBox_commentWrapper-reply">
                        @csrf
                        <div class="form-body-reply">
                            <!-- <i class="comment-item-ava-cmt fa-sharp fa-solid fa-user-tie"></i> -->
                            <div class="form-body-input-reply">
                                <input class="text_text commentBox_commentInput-reply" value="{{ old('comment') }}" name="comment" type="text" placeholder="Bạn có thắc mắc gì không?">
                                @error('comment')
                                <div class="text-msg" class="form_input-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="commentBox_actionWrapper-reply">
                            <span class="commentBox_cancel-reply">Hủy</span>
                            <button class="commentBox_cmt-reply">Bình luận</button>
                        </div>
                    </form>
                </div>
                @endif

            </div>
            @endif
            @endif
            @endfor
            @endif
    </div>
</div>

<script>
    var inputCmt = document.querySelector('.commentBox_commentInput');
    var cmtBtn = document.querySelector('.commentBox_cmt');
    var cancelBtn = document.querySelector('.commentBox_cancel');
    inputCmt.focus();
    if (inputCmt.value == '') {
        cmtBtn.style.backgroundColor = "#888";
        cmtBtn.style.cursor = "default";
    } else {
        cmtBtn.style.backgroundColor = "var(--primary-color)";
        cmtBtn.style.cursor = "pointer";
    }
    inputCmt.oninput = function(e) {
        if (e.target.value.trim() != '') {
            cmtBtn.style.backgroundColor = "var(--primary-color)";
            cmtBtn.style.cursor = "pointer";
        } else {
            cmtBtn.style.backgroundColor = "#888";
            cmtBtn.style.cursor = "default";
        }
    }

    cancelBtn.onclick = function() {
        inputCmt.value = "";
        inputCmt.focus();
        cmtBtn.style.backgroundColor = "#888";
        cmtBtn.style.cursor = "default";
    }
    var btnOptions = document.querySelectorAll('.comment-item-btn');
    var optionList = document.querySelectorAll('.comment-option-list');
    btnOptions.forEach((btnOption, index) => {
        btnOption.onclick = function() {
            if (optionList[index].style.display == "") {
                optionList[index].style.display = "block";
            } else if (optionList[index].style.display == "none") {
                optionList[index].style.display = "block";
            } else {
                optionList[index].style.display = "none";

            }
        }
    })

    var reply_comments = document.querySelectorAll('.reply_comment');
    var form_replys = document.querySelectorAll('.form-wrap-reply');
    var btn_cancel_reply = document.querySelectorAll('.commentBox_cancel-reply');
    var input_reply_comments = document.querySelectorAll('.commentBox_commentInput-reply');
    var cmt_reply = document.querySelectorAll('.commentBox_cmt-reply');
    reply_comments.forEach((reply_comment, index) => {
        reply_comment.onclick = function() {
            if (document.querySelector('.form-wrap-reply.active')) {
                (document.querySelector('.form-wrap-reply.active')).classList.remove('active');
            }
            form_replys[index].classList.toggle('active');
        }
    })
    btn_cancel_reply.forEach((item) => {
        item.onclick = function() {
            if (document.querySelector('.form-wrap-reply.active')) {
                (document.querySelector('.form-wrap-reply.active')).classList.remove('active');
            }
        }
    })
    input_reply_comments.forEach((item, index) => {
        cmt_reply[index].onclick = function(e) {
            if (item.value.trim() == '') {
                e.preventDefault();
            }
        }
    })
</script>
@endsection