@section('mainClass', 'wp')
@section('mainID', 'about')
@section('tagID', 'about')
@extends('web.include.base')

@section('content')
    <main class="main">
        <div class="page-banner">
            <div class="bg-img jqimgFill" data-aos="fade">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{asset(array_get($mainMenuDataPic,'mobile')) ?? asset('/styles/images/manufacturing/banner.jpg')}}" />
                    {{--手機版圖片尺寸 w768 * h768--}}
                    <img src="{{asset(array_get($mainMenuDataPic,'desktop')) ?? asset('/styles/images/manufacturing/banner.jpg')}}" alt="">
                    {{--電腦版圖片尺寸 w1920 * h540--}}
                </picture>
            </div>
            <div class="bn-textbox">
                {!! array_get($mainMenuData,'details.editor') !!}
            </div>
        </div>
        <div class="page-inner">
            <div class="guideline"></div>
            <div class="breadnav">
                <div class="w1300 navbox fs_16">
                    <a href="/">@lang('auth.home') {{--ホーム 首頁--}}</a>
                    <span class="separate">/</span>
                    <span>{{array_get($seo,'title')}}</span>
                </div>
            </div>

            @foreach($articleElements as $key => $item)
                {!! array_get($item,'details.editor') !!}
            @endForeach
        </div>
    </main>


@endsection
