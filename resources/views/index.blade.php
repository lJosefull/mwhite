@extends('template.layout')
@section('title', 'VideoJuegos Barranquilla')
@section('style')
  <link rel="stylesheet" href="{{  url(mix("css/app.css")) }}">
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" href="{{url('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/slick-theme.css')}}"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
       @yield('style')
    {!! MaterializeCSS::include_full() !!}
       
    <style>
        .aplicar{
            visibility: inherit;
            position: relative;
            transform: translateX(0%);
        }

        .desaplicar{
            visibility: hidden;
            position: absolute;
            transform: translateX(-100%);
        }
    </style>
@endsection

@section('content')
    @component('components.home.banner',[
        'banner' => $banner
    ])
    @endcomponent
    @component('components.home.marcas',[
        'marcas_home' => $marcas_home
    ])
    @endcomponent
    @component('components.home.navProducts',[
        'moreVendidos'=>$moreVendidos,
        'novedades' => $novedades,
        'promociones' => $promociones
    ])
    @endcomponent
    @component('components.home.categorias',[
        'categorias_home'=>$categorias_home
    ])
    @endcomponent
    @component('components.home.puntos',[
        'imagenes'=>$imagenes
    ])
    @endcomponent
    @component('components.home.hot-sale',[
        'moreVendidos'=>$moreVendidos,
        'novedades' => $novedades,
        'promociones' => $promociones
    ])
    @endcomponent
    @component('components.home.logos',[
        'logos'=>$logos
    ])
    @endcomponent
    @component('components.home.banner_down',[
        'banner_down'=>$banner_down
    ])
    @endcomponent
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#bannerHomeSlider').slick({
                dots: false,
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
                cssEase: 'linear',
                fade: true,
            });

            $('.sliderProducts').slick({
                dots: false,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('#sliderLogos').slick({
                dots: false,
                infinite: true,
                slidesToShow: 8,
                slidesToScroll: 1,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 1800,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>

@endsection