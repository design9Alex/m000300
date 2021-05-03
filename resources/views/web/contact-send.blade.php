@section('mainClass', 'wp')
@section('mainID', 'contact')
@section('tagID', 'contact')
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
                {!! array_get($mainMenuData,'details.editor') !!}
            </div>
        </div>
        <div class="page-inner">
            <div class="guideline"></div>
            <div class="breadnav">
                <div class="w1300 navbox fs_16">
                    <a href="/">@lang('auth.home') {{--ホーム 首頁--}}</a>
                    <span class="separate">/</span>
                    <span>@lang('auth.contactUs') {{--お問い合わせ--}}</span>
                </div>
            </div>
            <div class="w1100 contact-send">
                <div class="icon-envelope" data-aos="fade"><img src="/styles/images/common/icon-envelope.svg" alt=""></div>
                <div class="send-textbox" data-aos="fade-up">
                    <h2 class="tag darkgray fs_24 fw_bold text-center">@lang('auth.sendOk') {{--成功に送りました--}}</h2>
                    <p class="text fs_16 text-center">@lang('auth.sendMessage1'){{--ご質問をいただき、ありがとうございます。お問い合わせの内容については、三日間以内回答いたします。何卒よろしくお願いいたします。--}}<br/>@lang('auth.sendMessage2'){{--ＤＡＧ敬具--}}</p>
                    <div class="btn-style">
                        <a href="/" class="">
                            <span class="word fs_16">@lang('auth.sendEdBtn'){{--確認--}}</span>
                            <span class="icon"><img src="/styles/images/common/icon-arrow-right-white.svg" alt=""></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection

@push('scripts')
<script>
</script>
@endpush
