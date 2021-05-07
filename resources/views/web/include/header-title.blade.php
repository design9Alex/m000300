@php
    $PageTitle = (isset($PageTitle))?$PageTitle." - ".$BaseWebData->website_name : $BaseWebData->website_name;
    $SEO_keywords = (isset($SEO_keywords)) ? $SEO_keywords : '';
    $SEO_description = (isset($SEO_description)) ? $SEO_description : '';
@endphp

<!-- Title and Meta
================================================== -->
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<title>{{$PageTitle}}</title>
<meta name="author" content="MINMAX" />
<meta name="description" content="{{ $seo['description'] ? $seo['description'] : $BaseWebData->seo['meta_description'] }}" />
<meta name="keywords" content="{{ $seo['keywords'] ? $seo['keywords'] : $BaseWebData->seo['meta_keywords'] }}" />

<!-- Facebook Open Graph Meta
================================================== -->
<meta property="og:title" content="{{ $PageTitle }}" />
{{--<meta property="og:url" content="" />--}}
<meta property="og:site_name" content="{{$BaseWebData->website_name}}" />
<meta property="og:description" content="{{ $seo['description'] ? $seo['description'] : $BaseWebData->seo['meta_description'] }}" />
{{--<meta property="og:image" content="" />--}}

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="format-detection" content="telephone=no">
<link rel="icon" type="image/x-icon" href="{{asset('styles/images/favicon.png?20210427')}}" />
@if($rootUri == 'ja/')
    <link rel="stylesheet" type="text/css" href="{{asset('styles/style.css?2021')}}" />
@else
    <link rel="stylesheet" type="text/css" href="{{asset('styles/style_en.css?2021')}}" />
@endIf

<!--[if lt IE 9]>
<script src="{{asset('scripts/plugins/html5shiv.min.js')}}"></script>
<script src="{{asset('scripts/plugins/respond.min.js')}}"></script>
<![endif]-->

