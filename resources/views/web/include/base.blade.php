<!DOCTYPE html>
<html lang="ja">
<head>
@include('web.include.header-title')

@stack('styles')
</head>
<body>
{!! $BaseWebData->options['body'] !!}
<div class="@yield('mainClass')" id="@yield('mainID')" data-tag="@yield('tagID')">
    {{--id →主選單停駐效果--}}
    {{--data-tag →次選單停駐效果--}}
    @include('web.include.header')

    @yield('content')

    @include('web.include.footer')
</div>
@include('web.include.footer-js')
{!! $BaseWebData->options['foot'] !!}

@stack('scripts')
</body>
</html>
