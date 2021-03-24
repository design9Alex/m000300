@section('mainClass', 'wp')
@section('mainID', 'privacy')
@section('tagID', 'privacy')
@extends('web.include.base')

@section('content')
    <main class="main">
        <div class="page-banner">
            <div class="bg-img jqimgFill" data-aos="fade">
                <picture>
                    <source media="(max-width: 768px)" srcset="{{asset(array_get($mainMenuDataPic,'mobile')) ?? asset('/styles/images/other/contact-banner.jpg')}}" />
                    {{--手機版圖片尺寸 w768 * h768--}}
                    <img src="{{asset(array_get($mainMenuDataPic,'desktop')) ?? asset('/styles/images/other/contact-banner.jpg')}}" alt="">
                    {{--電腦版圖片尺寸 w1920 * h540--}}
                </picture>
            </div>
            <div class="bn-textbox">
                <h1 class="bn-tit fs_36">{{array_get($articlePage,'title')}}</h1>
                <p class="en fs_16">Privacy Policy</p>
            </div>
        </div>
        <div class="page-inner">
            <div class="guideline"></div>
            <div class="breadnav">
                <div class="w1300 navbox fs_16">
                    <a href="/">@lang('auth.home') {{--ホーム 首頁--}}</a>
                    <span class="separate">/</span>
                    <span>{{array_get($articlePage,'title')}}</span>
                </div>
            </div>
            <div class="privacy-box">
                <div class="w1100">
                    {!! array_get($articlePage,'details.editor') !!}
                </div>

            </div>

        </div>
    </main>
@endsection
