@extends('master.index')

@section('title')
HTML CSS từ Zero đến Hero
@endsection
<style>
    .active-lessons {
        background-color: #e8ebed !important;
        color: #1a1a1a !important;
    }
</style>

@section('content-main')

<div class="lessonItem-body">
    <x-header-lesson title="HTML CSS từ Zero đến Hero"></x-header-lesson>
    <div class="tab-content">
        <div class="content-wrapper">
            @if(!empty($html))
            @foreach($html as $key=>$item)
            <div class="video-wrapper">
                <iframe width="100%" height="550" src="{{ $item->lessonlink }}" title="{{ $item->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="content-introduce-wrapper">
                <h1 class="heading-name-lesson">{{ $item->lessonname }}</h1>
                <div class="markdownParser_wrapper">
                    <p>Tham gia các cộng đồng để cùng học hỏi, chia sẻ và “thám thính” xem Fullstack sắp có gì mới nhé!</p>
                    <ul class="list_introduce">
                        <li>Fanpage: <a href="https://www.facebook.com/f8vnofficial" target="_blank" rel="noreferrer">https://www.facebook.com/f8vnofficial</a> </li>
                        <li>Group: <a href="https://www.facebook.com/groups/649972919142215" target="_blank" rel="noreferrer">https://www.facebook.com/groups/649972919142215</a></li>
                        <li>Youtube: <a href="/external-url?continue=https%3A%2F%2Fwww.youtube.com%2FF8VNOfficial" target="_blank" rel="noreferrer">https://www.youtube.com/F8VNOfficial</a></li>
                        <li>Sơn Đặng: <a href="/external-url?continue=https%3A%2F%2Fwww.facebook.com%2Fsondnf8" target="_blank" rel="noreferrer">https://www.facebook.com/sondnf8</a></li>
                    </ul>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        @if ($html->lastPage() > 1)

        <ul class="pagination ml-auto">
            <header>
                <h2 class="header-lesson-item">Nội dung khóa học</h2>
            </header>
            @foreach ($htmlLink as $key=>$value)
            <li class="{{ ($html->currentPage() == ++$key) ? ' active' : '' }} page-item">
                <a class=" page-link " href="{{ $html->url($key) }}">
                    <div class="less-head-text">{{ $key }}. {{ $value->lessonname }}</div>
                    <div class="stepItem_desc">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="compact-disc" class="svg-inline--fa fa-compact-disc StepItem_lesson-icon StepItem_active__a6dKx" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM80.72 256H79.63c-9.078 0-16.4-8.011-15.56-17.34C72.36 146 146.5 72.06 239.3 64.06C248.3 63.28 256 70.75 256 80.09c0 8.35-6.215 15.28-14.27 15.99C164.7 102.9 103.1 164.3 96.15 241.4C95.4 249.6 88.77 256 80.72 256zM256 351.1c-53.02 0-96-43-96-95.1s42.98-96 96-96s96 43 96 96S309 351.1 256 351.1zM256 224C238.3 224 224 238.2 224 256s14.3 32 32 32c17.7 0 32-14.25 32-32S273.7 224 256 224z"></path>
                        </svg>

                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-play" class="svg-inline--fa fa-circle-play StepItem_lesson-icon_not" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM176 168V344C176 352.7 180.7 360.7 188.3 364.9C195.8 369.2 205.1 369 212.5 364.5L356.5 276.5C363.6 272.1 368 264.4 368 256C368 247.6 363.6 239.9 356.5 235.5L212.5 147.5C205.1 142.1 195.8 142.8 188.3 147.1C180.7 151.3 176 159.3 176 168V168z"></path></svg>
                        <span style="font-size: 1.4rem;">{{ $value->timeLesson}}</span>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
    @if ($html->lastPage() > 1)
    <div class="actionBar_wrapper">
        <button class="{{ ($html->currentPage() == 1) ? ' actionBar_btn_pre-disabled' : 'actionBar_btn-pre' }}">
            <a class="page-link-a" href="{{ $html->url($html->currentPage()-1) }}" aria-label="Previous">
                <i class="fa-solid fa-chevron-left"></i>
                BÀI TRƯỚC
            </a>
        </button>
        <button class="{{ ($html->currentPage() == $html->lastPage()) ? ' actionBar_btn_next-disabled' : 'actionBar_btn-next' }}">
            <a class=" page-link-a" href="{{ $html->url($html->currentPage()+1) }}" aria-label="Previous">
                BÀI TIẾP THEO
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </button>
    </div>
    @endif
</div>
@endsection