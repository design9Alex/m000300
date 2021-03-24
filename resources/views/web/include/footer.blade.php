<footer>
    <div class="ft-top">
        <div class="content">
            <div class="logo"><a href="/"><img src="/styles/images/logo-ft.svg" alt=""></a></div>
            <div class="sitemap">



                @foreach($mainMenu as $item)
                    @if(array_get($item,'uri') != 'privacy')
                        <div class="item">
                            <a class="tag" href="{{array_get($item,'link')}}">
                                <span class="icon"><img class="svg" src="/styles/images/common/menu-icon-01-blue.svg" alt=""></span>
                                <span class="word fs_16">{{array_get($item,'title')}}</span>
                            </a>
                            @if(array_get($item,'uri') == 'contact')
                                <div class="contact-info">
                                    <div class="info">
                                        <a href="{{array_get($BaseWebData,'contact.map','https://goo.gl/maps/kqHXiGS2yonspLEc6')}}" target="_blank">
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-add.svg" alt=""></span>
                                            <span class="fs_16">{{array_get($BaseWebData,'contact.address','Block 61, Ubi Road 1, Oxley Bizhub 1, #02-19 , Singapore 408732')}}</span>
                                        </a>
                                        <a href="tel:+6584780262">
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-tel.svg" alt=""></span>
                                            <span class="fs_16">{{array_get($BaseWebData,'contact.phone','+65 84780262')}}</span>
                                        </a>
                                        <a href="mailto:info@dag-regen.com">
                                            <span class="icon"><img class="svg" src="/styles/images/common/icon-mail.svg" alt=""></span>
                                            <span class="fs_16">{{array_get($BaseWebData,'contact.email','info@dag-regen.com')}}</span>
                                        </a>
                                    </div>
                                </div>
                            @else
                            <div class="list">
                                @if(array_get($item,'children'))
                                    @foreach(array_get($item,'children') as $item2)
                                        <a href="{{array_get($item2,'link')}}" class="">{{array_get($item2,'title')}}</a>
                                    @endForeach
                                @else
                                    <a href="{{array_get($item,'link')}}" class="">{{array_get($item,'title')}}</a>
                                @endIf
                            </div>
                            @endIf
                        </div>
                    @endIf
                @endForeach

            </div>
        </div>
        <div class="goTop">
            <span class="icon"><img class="svg" src="/styles/images/common/icon-top-arrow.svg" alt=""></span>
        </div>
    </div>
    <div class="ft-bottom">
        <span class="copyright">Copyright © @php echo date('Y'); @endphp DAG Regenerative Engineering Pte Ltd. All rights reserved</span>
        <a class="link fs_14" href="/privacy">›&nbsp;&nbsp;プライバシーポリシー</a>

    </div>
</footer>
