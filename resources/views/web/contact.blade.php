@section('mainClass', 'wp')
@section('mainID', 'contact')
@section('tagID', 'contact')
@extends('web.include.base')

@push('styles')
    <style>
        .contact__warn {
            width: calc(100% - 0px);
            padding: 10px 20px;
            border-radius: 5px;
            background: #fadcde;
            margin: 0 auto 20px auto;
            color: #782a2f;
        }
    </style>
@endpush

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
            <div class="w1100">
                <div class="contact-textbox">
                    {!! array_get($articleElements[0],'details.editor') !!}
                </div>
                <div class="contact-form">
                    {{--<form action="contact-alert">--}}
                    <div class="contact__warn" style="display:{{($errors->count())?'':'none'}};" id="position_page">
                        @if($errors->count())
                            {{ $errors->first() }}
                        @endif
                    </div>


                    <form action="{{ langRoute('web.contact.submit') }}" method="POST" id="contactForm" name="contactForm">
                        @csrf
                        <div class="form-box" >
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.諮詢服務')<span class="must fs_13">@lang('auth.required'){{--必須--}}</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="details[諮詢服務]" title="@lang('auth.please_select')" id="serviceItem">
                                            @foreach($serviceItem as $key => $item)
                                                <option {{ (old('details.諮詢服務') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.參加類別') <span class="must fs_13">@lang('auth.required'){{--必須--}}</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="details[參加類別]" title="@lang('auth.please_select')" id="participation">
                                            @foreach($participation as $key => $item)
                                                <option {{ (old('details.參加類別') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.國家')<span class="must fs_13">@lang('auth.required'){{--必須--}}</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker2 fs_16" data-country="US" name="details[國家]" title="@lang('auth.please_select')" id="country" data-live-search="true">
                                            @foreach($countrys as $key => $item)
                                                <option {{ (old('details.國家') == array_get($item,'name')) ? 'selected="selected"':''}} data-tpn="{{array_get($item,'options.tpn')}}">{{array_get($item,'name')}}</option>
                                            @endForeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.公司')<span class="must fs_13">@lang('auth.required'){{--必須--}}</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[公司]" id="company" placeholder="@lang('auth.company_sample')" value="{{old('details.公司')}}">
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.title')</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[標題]" id="title" placeholder="@lang('auth.title_sample')" value="{{old('details.標題')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.name')</span>
                                    <span class="must fs_13">@lang('auth.required'){{--必須--}}</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[firstname]" id="firstname" placeholder="@lang('auth.first_name')" value="{{old('details.firstname')}}">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="input-style fs_16" name="details[lastname]" id="lastname" placeholder="@lang('auth.last_name')" value="{{old('details.lastname')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="item phone-item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.contact_msg')<span class="must fs_13">@lang('auth.required'){{--必須--}}</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col areacode">
                                        <input type="number" class="input-style fs_16" name="details[區碼]" id="areacode" value="{{old('details.區碼')}}">
                                    </div>
                                    <div class="col telnumber">
                                        <input type="text" class="input-style fs_16" name="details[電話]" id="tel" placeholder="@lang('auth.phone_sample')" value="{{old('details.電話')}}">
                                    </div>

                                </div>
                            </div>
                            <div class="item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.email')<span class="must fs_13">@lang('auth.required'){{--必須--}}</span></span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <input type="email" class="input-style fs_16" name="details[email]" id="email" placeholder="info@yamata.com" value="{{old('details.email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="item list-item">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.item')</span>
                                    <span class="must fs_13">@lang('auth.required'){{--必須--}}</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <select class="selectpicker fs_16" name="details[產品]" title="@lang('auth.please_select')" id="contact_item">
                                            @foreach($contactItem as $key => $item)
                                                <option {{ (old('details.產品') == array_get($item,'title')) ? 'selected="selected"':''}}>{{array_get($item,'title')}}</option>
                                            @endForeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="item textarea">
                                <div class="tag">
                                    <span class="fs_16">@lang('auth.description')</span>
                                </div>
                                <div class="inData">
                                    <div class="col">
                                        <textarea class="input-style fs_16" name="content" id="content" rows="10">{{old('content')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="script-box">
                            {!! array_get($articleElements[1],'details.editor') !!}
                            <div class="techmarks"  id="Recaptcha">
                                <div class="g-recaptcha" data-sitekey="6Ldf4MMUAAAAACEjhzLRQ5YPucN5amDPxy-VUebw" data-callback="recaptchaCallback"></div>
                                <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                                {{--<div class="notice"></div>--}}
                            </div>
                            <div class="submit-btn">
                                <button type="submit">
                                    <span class="word fs_16">@lang('auth.send')</span>
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
    <script src="{{asset('/scripts/plugins/jquery.validate.js')}}"></script>
    <script src="{{asset('/scripts/plugins/additional-methods.min.js')}}"></script>
    <script src="{{asset('/scripts/plugins/messages.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js?hl={{app()->getLocale()}}' async defer></script>

    <script>
        function recaptchaCallback() {
            $('#hiddenRecaptcha').valid();
        };

        $(function(){

            $('.selectpicker2').selectpicker({
                liveSearchPlaceholder: "{{ __('auth.placeholder') }}",
                size: 5,
            });



            @if($errors->count())
            function pagePosition(id,positionPx=0) {
                let top = (document.querySelector('#' + id).getBoundingClientRect().top - document.querySelector('body').getBoundingClientRect().top + positionPx);
                top -= $(window).outerWidth() > 767 ? 100 : 70;
                $(window).scrollTop(top);
            }
            pagePosition('position_page',-100);
            @endif


            $('#country').change(function(){
              $('#areacode').val($('#country option:selected').attr('data-tpn'));
            });


            $('#contactForm').validate({
                debug: true,
                errorElement: 'em',
                ignore: '.ignore',

                rules: {

                   'details[諮詢服務]': {required: true},
                   'details[參加類別]': {required: true},
                   'details[國家]': {required: true},
                   'details[公司]': {required: true},
                   'details[firstname]': {required: true},
                   'details[lastname]': {required: true},
                   'details[區碼]': {required: true},
                   'details[電話]': {required: true},
                   'details[email]': {required: true , email: true,},
                   'details[產品]': {required: true},

                    hiddenRecaptcha: {
                        required: function () {
                            if (grecaptcha.getResponse() == '') {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    },

                },
                messages: {
                },


                success: function(element) {
                },


                errorPlacement: function (error, element) {
                },

                highlight: function(element){
                    if( $(element).is('select') ) {
                        $(element).closest('.bootstrap-select').css({'border': '1px solid #ff0000'});
                    }else if($(element).attr('name') == 'hiddenRecaptcha'){
                        //alert('aa');
                        $('#Recaptcha').css({'border': '1px solid #a90a06'});
                    }else{
                        $(element).css({'border': '1px solid #ff0000'});
                    }
                },

                unhighlight: function(element) {
                    if( $(element).is('select') ) {
                        $(element).closest('.bootstrap-select').css({'border': ''});
                    }else if($(element).attr('name') == 'hiddenRecaptcha'){
                        $('#Recaptcha').css({border: ''});
                    }else{
                        $(element).css({'border': ''});
                    }
                },

                submitHandler: function(form) {
                    $('button[type="submit"]').attr('disabled',true);
                    form.submit();
                },
            });
        })
    </script>
@endpush
