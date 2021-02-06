@extends('layout.app')

@section('head-links-scripts')
<link rel="stylesheet" href="{{ asset('/owl-carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('/owl-carousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('content')
    <!-- Home Slider -->
    <section>
        <div class="home-slider owl-carousel" style="width: 100%;">
            <div><img src="{{asset('/storage/images/home-slider/banner_capsulas_odebrecht-ok-min.png')}}" alt="@lang('Café Odebrecht')"></div>
            <div><img src="{{asset('/storage/images/home-slider/banner_cafe_moido_graos_odebrecht-ok-min.png')}}" alt="@lang('Café Odebrecht')"></div>
            <div><img src="{{asset('/storage/images/home-slider/banner_cafeteiras_maquinas_odebrecht-ok-min.png')}}" alt="@lang('Café Odebrecht')"></div>
            <div><img src="{{asset('/storage/images/home-slider/banner_frete-gratis_odebrecht-min.png')}}" alt="@lang('Café Odebrecht')"></div>
        </div>
    </section>
    <!-- Coffee Favours -->
    <section class="coffee-favours">
        <div class="container coffee-favours-container">
            <div class="coffee-favours--title">
                <h3><span>escolha o sabor do</span>Seu Paladar</h3>
            </div>
            <div class="coffee-favours--items">
                <ul class="favours">
                    <li class="flex-column">
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=49"><img alt="Extraforte" title="Extraforte" src="{{asset('/storage/images/intensity/Extraforte.png')}}"></a>
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=49">Extraforte</a>
                    </li>
                    <li class="flex-column">
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=50"><img alt="Classico" title="Classico" src="{{asset('/storage/images/intensity/Classico.png')}}"></a>
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=50">Classico</a>
                    </li>
                    <li class="flex-column">
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=51"><img alt="Suave" title="Suave" src="{{asset('/storage/images/intensity/Suave.png')}}"></a>
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=51">Suave</a>
                    </li>
                    <li class="flex-column">
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=52"><img alt="Descafeinado" title="Descafeinado" src="{{asset('/storage/images/intensity/Descafeinado.png')}}"></a>
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=52">Descafeinado</a>
                    </li>
                    <li class="flex-column">
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=53"><img class="Intenso" alt="Intenso" title="Intenso" src="{{asset('/storage/images/intensity/Intenso.png')}}"></a>
                        <a href="https://www.cafeodebrecht.com.br/cafe-torrado-e-moido.html?intensidade=53">Intenso</a>
                    </li>
                    <li class="coffee-cup"><img src="{{asset('/storage/images/home/cafe.png')}}"></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Products -->
    <section class="products-section">
        <div class="container products-container">
            <div class="title-bar">
                <h2>
                    <span>os produtos</span>Mais Vendidos
                </h2>
            </div>
            <ul class="products-grid">
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior em Cápsula Compatível com Nespresso</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
                <li class="item">
                    <div class="product-image-wrapper">
                        <a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior" class="product-image">
                            <img src="https://www.cafeodebrecht.com.br/media/catalog/product/cache/1/small_image/240x290/9df78eab33525d08d6e5fb8d27136e95/7/8/7896295001012_12_1_1200_72_rgb.png" alt="Café Odebrecht Superior">
                        </a>
                    </div>
                    <div class="infobox">
                        <h3 class="product-name"><a href="https://www.cafeodebrecht.com.br/cafe-odebrecht-superior.html" title="Café Odebrecht Superior">Café Odebrecht Superior</a></h3>
                        <div class="no-ratings">
                            <div class="rating-box">
                                <div class="rating" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="price-box">
                            <p class="old-price">
                                <span class="price" id="old-price-116">R$ 15,00</span>
                            </p>
                            <p class="special-price">
                                <span class="price" id="product-price-116">R$ 9,90</span>
                            </p>
                        </div>
                        <div class="bt-add">
                            <button type="button" title="Comprar" data-id="52" class="btn-ajax ajax"><span>Comprar</span></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="recipes-slider">
        <div class="container">
            <div class="recipes-slider-wrapper owl-carousel">
                <div class="recipe-slide">
                    <ul>
                        <li>
                            <figure class="slide-img">
                                <a href="https://www.cafeodebrecht.com.br/receitas/shot_cappuccino/" title="Shot de cappuccino com baunilha e sal" tabindex="-1">
                                    <img src="{{asset('/storage/images/recipes-slider/shot-cappuccino-baunilha_4.jpg')}}" alt="Shot de cappuccino com baunilha e sal">
                                </a>
                            </figure>
                            <div class="title">conheça nossas</div>
                            <div class="subtitle">Deliciosas Receitas</div>
                            <a href="https://www.cafeodebrecht.com.br/receitas/shot_cappuccino/" tabindex="-1">Shot de cappuccino com baunilha e sal</a>
                            <div class="text-content"><p>Confira a receita deste delicioso&nbsp;Shot de cappuccino com baunilha e sal</p></div>
                            <a class="read-more" href="https://www.cafeodebrecht.com.br/receitas/shot_cappuccino/" tabindex="-1">Leia Mais</a>
                        </li>
                    </ul>
                </div>
                <div class="recipe-slide">
                    <ul>
                        <li>
                            <figure class="slide-img">
                                <a href="https://www.cafeodebrecht.com.br/receitas/shot_cappuccino/" title="Shot de cappuccino com baunilha e sal" tabindex="-1">
                                    <img src="{{asset('/storage/images/recipes-slider/shot-cappuccino-baunilha_4.jpg')}}" alt="Shot de cappuccino com baunilha e sal">
                                </a>
                            </figure>
                            <div class="title">conheça nossas</div>
                            <div class="subtitle">Deliciosas Receitas</div>
                            <a href="https://www.cafeodebrecht.com.br/receitas/shot_cappuccino/" tabindex="-1">Shot de cappuccino com baunilha e sal</a>
                            <div class="text-content"><p>Confira a receita deste delicioso&nbsp;Shot de cappuccino com baunilha e sal</p></div>
                            <a class="read-more" href="https://www.cafeodebrecht.com.br/receitas/shot_cappuccino/" tabindex="-1">Leia Mais</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('javascript-scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('/owl-carousel/owl.carousel.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){
  $(".owl-carousel.home-slider").owlCarousel(
    {
      loop:true,
      items:1,
      nav:true,
      autoplay:true,
      autoplayTimeout:10000,
      navText : ['<div class="prev"></div>','<div class="next"></div>'],
    }
  );

  $(".recipes-slider-wrapper").owlCarousel(
    {
      loop:true,
      items:1,
      nav:true,
      autoplay:true,
      smartSpeed: 600,
      autoplayTimeout:7000,
      navText : ['<div class="prev"></div>','<div class="next"></div>'],
    }
  );
});
</script>
@endsection
