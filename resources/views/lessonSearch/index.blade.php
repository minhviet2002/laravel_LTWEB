
@extends('master.index')

@section('title')
Kết quả tìm kiếm
@endsection
<style>
    .active-lessons {
        background-color: #e8ebed !important;
        color: #1a1a1a !important;
    }
    
</style>
@section('header')
<x-header :infoUser="$infoUser"></x-header>
@endsection
@section('sidebar')
<x-sidebar></x-sidebar>
@endsection
@section('content-main')
<div class="content-search">
    @if(!empty($msg))
    <div style="margin-top: 0px;" class="alert alert-danger text-center">{{ $msg }}</div>
    @else
    @if(!empty($message))
    <div style="margin-top: 0px;" class="alert alert-success text-center">{{ $message}}</div>
    @endif
    <h1 class="resultSearch_heading">KẾT QUẢ TÌM KIẾM:</h1>
    <h2 class="result_heading"> <i class="fa-brands fa-html5"></i> HTML-CSS</h2><br>
    @if(!empty($searchResultHTML))
    <div class="research-content">
        @foreach ($searchResultHTML as $key=>$item)
        <div class="research-content-wrap">
            <h3 class="lessonResult_heading"> {{ ++$key }} - {{$item->lessonname}}</h3>
            <iframe style="border: 2px solid #000;" width="350" height="200" src="{{ $item->lessonlink }}" title="{{ $item->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        @endforeach
    </div>
    
    @else
    <h3>Kết quả không tồn tại</h3>
    @endif


    <h2 class="result_heading"><i class="fa-brands fa-node-js"></i> JAVASCRIPT</h2><br>
    @if(!empty($searchResultJS))
    <div class="research-content">
        @foreach ($searchResultJS as $key=>$item)
        <div class="research-content-wrap">
            <h3 class="lessonResult_heading"> {{ ++$key }} - {{$item->lessonname}}</h3>
            <iframe style="border: 2px solid #000;" width="350" height="200" src="{{ $item->lessonlink }}" title="{{ $item->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        @endforeach
    </div>
    @else
    <h3>Kết quả không tồn tại</h3>
    @endif
    @endif

</div>


@endsection
@section('footer')
<x-footer></x-footer>
@endsection