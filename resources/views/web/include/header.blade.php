<header id="header">
    <div class="headerbox">
        <div class="logo">
            <a href="/{{ ($rootUri == 'ja/') ? '' : 'en/' }}"><img src="/styles/images/logo.svg" alt=""></a>
        </div>
        <nav>
            <ul class="noneStyle menu">

                @foreach($mainMenu as $item)
                    @if(array_get($item,'uri') != 'privacy')
                    <li class="{{array_get($item,'children') ? 'has-sm' : ''}}" data-id="{{str_replace('manufacturings','manufacturing',array_get($item,'uri'))  }}">
                        <a href="{{array_get($item,'link')}}" class="link">
                            <span class="icon"><img class="svg" src="{{array_get($mainMenuIcon,array_get($item,'uri'))}}" alt="" data-uri="{{array_get($item,'uri')}}"></span>
                            <span class="fs_16">{{array_get($item,'title')}}</span>
                        </a>

                        @if(array_get($item,'children'))
                            <div class="submenu">
                                <div class="content">
                                    <div class="navtag">
                                        <span class="icon"><img src="{{array_get($mainMenuIcon,array_get($item,'uri').'_2')}}" alt=""></span>
                                        <span class="fs_20">{{array_get($item,'title')}}</span>
                                    </div>
                                    <ul class="noneStyle sublist">

                                        @foreach(array_get($item,'children') as $item2)
                                            <li data-tag="{{array_get($item2,'uri')}}">
                                                <a class="fs_16" href="{{array_get($item2,'link')}}">{{array_get($item2,'title')}}</a>
                                            </li>
                                        @endForeach
                                    </ul>
                                </div>
                            </div>
                        @endIf
                    </li>


                    @endIf
                @endForeach



                <li class="contactbox" data-id="">
                    <div class="contact-info">
                        <div class="info">
                            <a href="{{array_get($BaseWebData,'contact.map','https://goo.gl/maps/kqHXiGS2yonspLEc6')}}" target="_blank">
                                <span class="icon"><img class="svg" src="/styles/images/common/icon-add.svg" alt=""></span>
                                <span class="fs_14">{{array_get($BaseWebData,'contact.address','Block 61, Ubi Road 1, Oxley Bizhub 1, #02-19 , Singapore 408732')}}</span>
                            </a>
                            <a href="tel:+6584780262">
                                <span class="icon"><img class="svg" src="/styles/images/common/icon-tel.svg" alt=""></span>
                                <span class="fs_14">{{array_get($BaseWebData,'contact.phone','+65 84780262')}}</span>
                            </a>
                            <a href="mailto:{{array_get($BaseWebData,'contact.email','info@dag-regen.com')}}">
                                <span class="icon"><img class="svg" src="/styles/images/common/icon-mail.svg" alt=""></span>
                                <span class="fs_14">{{array_get($BaseWebData,'contact.email','info@dag-regen.com')}}</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="lang fs_15">
                <a href="{{($languageUri == '/en') ? '/' : $languageUri}}" class="lang-btn @if(Config::get('app.locale') != 'en') active @endIf">JP</a>
                <span class="fs_12">/</span>
                <a href="/en{{($languageUri == '/en') ? '/' : $languageUri}}" class="lang-btn @if(Config::get('app.locale') == 'en') active @endIf">EN</a>
            </div>
            <div class="menu-toggle">
                <div class="wrapper">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
        </nav>
        <div class="graymask"></div>
    </div>
</header>


