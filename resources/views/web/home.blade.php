@section('mainClass', 'wp')
@section('mainID', 'index')
@section('tagID', 'index')
@extends('web.include.base')

@section('content')
    <main class="main">

        <div class="home-banner">
            <div class="banner">
                <div class="slider" data-aos="fade">
                    <!-- 圖片尺寸 w1920 * h820 -->
                    @foreach($bannerData as $key => $item)
                        <div class="item jqimgFill rellax" data-rellax-speed="3" data-rellax-xs-speed="1" data-rellax-mobile-speed="2"
                             data-rellax-tablet-speed="2">
                            <img src="{{array_get($item,'details.pic.0.path')}}" alt="">
                            {!! array_get($item,'details.editor') !!}
                        </div>
                    @endForeach
                </div>
            </div>
        </div>


        @foreach($articleElements as $key => $item)
            {!! array_get($item,'details.editor') !!}
        @endForeach
    </main>


@endsection
@push('scripts')
    <script>
        $(function() {
            $('.home-banner .slider').slick({
                dots:true,
                arrows:true,
                fade: true,
                speed:1200,
                autoplay:true,
                autoplaySpeed: 3000,
                prevArrow: "<div class='slick-arrow slick-prev'><img src='styles/images/common/icon-arrow-left.svg' alt='arrow'/></div>",
                nextArrow: "<div class='slick-arrow slick-next'><img src='styles/images/common/icon-arrow-right.svg' alt='arrow'/></div>",
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows:false,
                        }
                    },
                ]

            });

            var rellax = new Rellax('.rellax', {
                // center: true
                callback: function (position) {
                    // callback every position change
                    console.log(position);
                },
                breakpoints: [576, 768, 1024]
            });

        });
        window.addEventListener('load', function() {
            setTimeout(function() {
                AOS.refresh();
            }, 100);
        }, false);
    </script>
@endpush
