@section('mainClass', 'wp')
@section('mainID', 'product')
@section('tagID', 'cellregeneration')
@extends('web.include.base')

@section('content')

    <main class="main">
        <div class="page-banner">
            <div class="bg-img jqimgFill" data-aos="fade">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{asset(array_get($bannerData[0],'details.pic2.0.path')) ?? asset('styles/images/research/banner.jpg')}}" />
                    <!-- 手機版圖片尺寸 w768 * h768 -->
                    <img src="{{asset(array_get($bannerData[0],'details.pic2.0.path')) ?? asset('styles/images/research/banner.jpg')}}" alt="">
                    <!-- 電腦版圖片尺寸 w1920 * h540 -->
                </picture>
            </div>
            <div class="bn-textbox">
                {!! array_get($bannerData[0],'details.editor') !!}
            </div>
        </div>
        <div class="page-inner">
            <div class="guideline"></div>
            <div class="breadnav">
                <div class="w1300 navbox fs_16">
                    <a href="/">@lang('auth.home') {{--ホーム 首頁--}}</a>
                    <span class="separate">/</span>
                    <a href="/cellregeneration">@lang('auth.cellregeneration') {{--私たちの製品  我們的產品--}}</a>
                    <span class="separate">/</span>
                    <span>{{array_get($seo,'title')}}</span>
                </div>
            </div>

        @foreach($articleElements as $key => $item)
            {!! array_get($item,'details.editor') !!}
        @endForeach

            {{--此區每一頁的背景圖片都不同--}}
            {{--圖片尺寸 w1920 * h420--}}
            @foreach($advertising as $key => $item)
            <div class="page-bt-linkbox">
                <div class="bg-img jqimgFill"><img src="{{asset(array_get($item,'details.pic.0.path')) ?? asset('/styles/images/research/research-13.jpg')}}" alt=""></div>
                <div class="w1100 zoom">
                    <h2 class="hidden">{{array_get($item,'title')}}</h2>
                    <a href="{{array_get($item,'details.link')}}">
                        {!! array_get($item,'details.editor') !!}
                    </a>
                </div>
            </div>
            @endForeach

        </div>
    </main>


@endsection

@push('scripts')
    <script>
        $(function(){
            $('.manufact-pdAdbox .pdlink').hover(function(){
                $(this).parents('.manufact-pdAdbox').toggleClass('hover');
            });
        });
    </script>
@endpush
