@section('mainClass', 'wp')
@section('mainID', 'index')
@section('tagID', 'index')
@extends('web.include.base')

@section('content')
    <main class="main">

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
