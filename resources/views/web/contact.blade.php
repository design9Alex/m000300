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
                    <form action="contact-alert">
                        <div class="form-box" >
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">アドバイザーリーサービス<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="serviceItem" title="選択して下さい" id="serviceItem">
                                            @foreach($serviceItem as $key => $item)
                                                <option>{{array_get($item,'title')}}</option>
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
                                        <select class="selectpicker fs_16" name="participation" title="選択して下さい" id="participation">
                                            @foreach($participation as $key => $item)
                                                <option>{{array_get($item,'title')}}</option>
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
                                        <select class="selectpicker fs_16" data-country="US" name="country" title="選択して下さい" id="country">
                                            @foreach($countrys as $key => $item)
                                                <option>{{array_get($item,'title')}}</option>
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
                                        <input type="text" class="input-style fs_16" name="company" id="company" placeholder="例）山田株式会社 / 山田クリニック">
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">タイトル</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="position" id="position" placeholder="例）部長">
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
                                        <input type="text" class="input-style fs_16" name="firstname" id="firstname" placeholder="例）山田">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="lastname" id="lastname" placeholder="例）太郎">
                                    </div>
                                </div>
                            </div>
                            <div class="item phone-item">
                                <div class="tag">
                                    <span class="fs_16">連絡先<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col areacode">
                                        <input type="number" class="input-style fs_16" name="areacode" id="areacode" >
                                    </div>
                                    <div class="col telnumber">
                                        <input type="number" class="input-style fs_16" name="tel" id="tel" placeholder="例)8478-0262">
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">E-メール<span class="must fs_13">必須</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="email" class="input-style fs_16" name="email" id="email" placeholder="info@yamata.com">
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
                                        <select class="selectpicker fs_16" name="contact_item" title="選択して下さい" id="contact_item">
                                            @foreach($contactItem as $key => $item)
                                                <option>{{array_get($item,'title')}}</option>
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
                                        <textarea class="input-style fs_16" name="opinion" id="opinion" rows="10"></textarea>
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
                                <button>
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
