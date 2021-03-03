<div class="header-container" id="top">
    <header>
        <div class="header-primary-container container">
            <div class="open-mobile-nav">
                <div class="icone">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="opensearch">
                <i class="icon-search"></i>
            </div>
            <div class="logo-wrapper">
                <h1 class="logo">
                    <a class="display-only-desk" href="{{ route('home') }}" title="Café Odebrecht">
                        <picture>
                            <source media="(min-width: 770px)" srcset="{{secure_url(asset('/storage/images/header/logo.png'))}}" alt="@lang('Café Odebrecht')">
                            <img src="{{asset('/storage/images/header/logo_mobile.png')}}" alt="@lang('Café Odebrecht')">
                        </picture>
                    </a>
                </h1>
            </div>
            <div class="header-wrapper">
                <div class="display-none header-gutter header-gutter--1">
                    <div id="menu" class="show-fixed">
                        <span class="abremenu">
                            <div class="icone">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <small>Abrir</small>
                            <b>Menu</b>
                        </span>
                    </div>
                    <ul class="top-header-item hide-on-small-screens">
                        <li><a class="fw700" href="#">Login</a></li>
                        <li>or&nbsp;<a class="fw700" href="#">Register</a></li>
                    </ul>
                </div>
                <div class="header-gutter header-gutter--2">
                    <ul class="top-header-item central hide-on-small-screens">
                        <li class="fale">@lang("Central<br><a>Consumer</a>")
                            <ul class="tooltip">
                                <span>@lang("Contact us"):</span>
                                <li><i class="icon-phone"></i> <a href="#" onclick="return false">(43) 3377-4141</a></li>
                                <li><i class="icon-whatsapp"></i> <a class="whatsapp" href="https://web.whatsapp.com/send?phone=5543999848084&amp;text=Oi!%20Estou%20entrando%20em%20contato%20pelo%20chat%20Whatsapp%20da%20sua%20loja%20virtual.%20Poderia%20me%20ajudar?" target="_blank">43 99984-8084</a></li>
                                <li><i class="icon-newsletter-1"></i> <a class="maillink" href="mailto:sac@cafeodebrecht.com.br">sac@cafeodebrecht.com.br</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="header-gutter header-gutter--3">
                    <div class="mobile-search">
                        <section class="form-search">
                            <form id="search_mini_form" action="{{ route('product.search') }}" method="get">
                                <input id="product-search" type="text" name="q" value="{{ request('q') }}" class="input-text" placeholder="@lang('Search for a Product')">
                                <button id="form-search-button" type="submit"><span>@lang("Search")</span></button>
                            </form>
                        </section>
                    </div>
                </div>
                <div class="header-gutter header-gutter--4">
                    <ul class="hide-on-small-screens">
                        <li class="display-none top-header-item lojas"><a href="#"><span>Our</span>Stores</a></li>
                        <li class="display-none top-header-item favoritos"><i></i><a href="#" rel="nofollow"><span>My</span>Favourites</a></li>
                    </ul>
                    <ul class="language-switcher">
                        <li class="lang-choice"><a href="{{ route('locale', ['locale' => 'tr']) }}">Tr</a></li>
                        <li class="lang-choice"><a>|</a></li>
                        <li class="lang-choice"><a href="{{ route('locale', ['locale' => 'en']) }}">En</a></li>
                    </ul>
                    <div class="cart-container">
                        <a id="header-cart-container" class="icone" href="{{ route('cart.show') }}" title="Ir para Meu Carrinho">
                            @if (Session::has('cart') && Session::get('cart')->getCartCount() > 0)
                            <div class="cart-qtd">
                                <p class="amount">{{ Session::get('cart')->getCartCount() > 0 ? Session::get('cart')->getCartCount() : ''}}</p>
                            </div>
                            @endif
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="nav-container">
            <nav id="nav">
                <ul class="cat level1">
                    @foreach($categories as $category)
                        <li class="item1-1"><a href="{{ route('category.show', ['slug' => $category->slug ]) }}">{{ $category->categoryTranslations[0]->name }}</a></li>
                    @endforeach
                </ul>

            </nav>
        </div>
    </div>
</div>
<div class="nav-mobile-container">
    <nav id="navMobile">
        <ul class="cat level1">
            @foreach($categories as $category)
                <li class="item1-1"><a href="{{ route('category.show', ['slug' => $category->slug ]) }}">{{ $category->categoryTranslations[0]->name }}</a></li>
            @endforeach
        </ul>
        <ul class="language-switcher">
            <li class="lang-choice"><a href="{{ route('locale', ['locale' => 'tr']) }}">Tr</a></li>
            <li class="lang-choice"><a>|</a></li>
            <li class="lang-choice"><a href="{{ route('locale', ['locale' => 'en']) }}">En</a></li>
        </ul>
    </nav>
</div>
<div class="mobile-space"></div>
<div id="shadow-layer" class=""></div>
