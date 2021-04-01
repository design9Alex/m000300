@section('mainClass', 'wp')
@section('mainID', 'product')
@section('tagID', $tagID)
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
                    <a href="/cellregeneration">@lang('auth.cellregeneration') {{--私たちの製品  我們的產品--}}</a>
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

@push('scripts')
    <script>
        $(function(){
            $('.manufact-pdAdbox .pdlink').hover(function(){
                $(this).parents('.manufact-pdAdbox').toggleClass('hover');
            });
        });

        // youtube video
        var tag = document.createElement('script');
        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        var players = new Array();
        function onYouTubeIframeAPIReady() {
            for ( var i = 0; i < $('.youtube-video').length; i++ ) {
                players[i] = new YT.Player($('.youtube-video')[i]);
            }
        }

        $(function(){
            var wW = $(window).outerWidth();
            $(".cell-charbox").each(function(){
                var box_height = 0;
                $('.zoom .databox .item .wordbox').each(function(index) {
                    if ($(this).height() >= box_height)
                        box_height = $(this).height();
                });
                if( wW >= 751){
                    $('.zoom .databox .item .wordbox').height(box_height);
                }
            });

            var winW = $(window).width();
            var maxW;
            if(winW > 1068){
                maxW = 1050;
            }else{
                maxW = 100 + '%';
            }
            $(".picgallery, .gallery").colorbox({
                rel:'group4',
                slideshow:false,
                width:maxW,
                maxHeight:650,
                close: "閉じる",
                opacity: 0.72,
            });

            $(window).resize(function(){
                $.colorbox.close();
            });

            // lightcase
            $('[data-rel^="lightcase"]').lightcase({
                showCaption: false,
                showSequenceInfo: false,
                maxHeight: 800,
                labels: {
                    'close': '閉じる',
                    'navigator.prev': '',
                    'navigator.next': '',
                },
                onClose: {
                    grault: function() {
                        $(players).each(function(i){
                            this.stopVideo();
                        });
                    }
                }
            });

            $('.pd-slider').slick({
                dots:true,
                arrow:false,
                infinite:false,
            });

        });
    </script>
@endpush
