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
                    <a href="/">>@lang('auth.home') {{--ホーム 首頁--}}</a>
                    <span class="separate">/</span>
                    <span>@lang('auth.contactUs') {{--お問い合わせ--}}</span>
                </div>
            </div>
            <div class="w1100">
                <div class="contact-textbox">
                    {!! array_get($articleElements[0],'details.editor') !!}
                </div>
                <div class="contact-form">
                    {{--<form action="contact-alert">--}}
                    <form action="{{ langRoute('web.contact.post.submit') }}" method="POST" id="contactForm" name="contactForm">
                        @csrf
                        <div class="form-box" >
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">アドバイザーリーサービス<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="details[諮詢服務]" title="選択して下さい" id="serviceItem">
                                            @foreach($serviceItem as $key => $item)
                                                <option {{ (old('details.serviceItem') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">参加カテゴリー <span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="details[參加類別]" title="選択して下さい" id="participation">
                                            @foreach($participation as $key => $item)
                                                <option {{ (old('details.participation') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">国<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" data-country="US" name="details[國家]" title="選択して下さい" id="country">
                                            @foreach($countrys as $key => $item)
                                                <option {{ (old('details.country') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">会社<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[公司]" id="company" placeholder="例）山田株式会社 / 山田クリニック" value="{{old('details.company')}}">
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">タイトル</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[標題]" id="position" placeholder="例）部長" {{old('details.position')}}>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">氏名</span>
                                    <span class="must fs_13">必須</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[firstname]" id="firstname" placeholder="例）山田" {{old('details.firstname')}}>
                                    </div>
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[lastname]" id="lastname" placeholder="例）太郎" {{old('details.lastname')}}>
                                    </div>
                                </div>
                            </div>
                            <div class="item phone-item">
                                <div class="tag">
                                    <span class="fs_16">連絡先<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col areacode">
                                        <input type="number" class="input-style fs_16" name="details[區碼]" id="areacode" {{old('details.areacode')}}>
                                    </div>
                                    <div class="col telnumber">
                                        <input type="number" class="input-style fs_16" name="details[電話]" id="tel" placeholder="例)8478-0262" {{old('details.tel')}}>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">E-メール<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="email" class="input-style fs_16" name="details[email]" id="email" placeholder="info@yamata.com" {{old('details.email')}}>
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item">
                                <div class="tag">
                                    <span class="fs_16">項目</span>
                                    <span class="must fs_13">必須</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="details[產品]" title="選択して下さい" id="contact_item">
                                            @foreach($contactItem as $key => $item)
                                                <option {{ (old('details.country') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="item textarea">
                                <div class="tag">
                                    <span class="fs_16">内容</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <textarea class="input-style fs_16" name="content" id="content" rows="10">{old('details.opinion')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="script-box">
                            {!! array_get($articleElements[1],'details.editor') !!}
                            <div class="techmarks">
                                <div class="g-recaptcha" data-sitekey="6Ldf4MMUAAAAACEjhzLRQ5YPucN5amDPxy-VUebw"></div>
                            </div>
                            <div class="submit-btn">
                                <button type="submit">
                                    <span class="word fs_16">送る</span>
                                    <span class="icon"><img src="/styles/images/common/icon-arrow-right-white.svg" alt=""></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>
    </main>


@endsection

@push('scripts')
<script>
</script>
@endpush
