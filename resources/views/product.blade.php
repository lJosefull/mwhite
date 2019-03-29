@extends('template.layout')
@section('title', 'Producto')
@section('style')
    <style>
        .aplicar{
            position: relative;
            transform: translateX(0%);
            visibility: inherit;
        }

        .desaplicar{
            visibility: hidden;
            position: absolute;
            transform: translateX(-100%);
        }
    </style>
@endsection

@section('content')
    @component('components.product.banner',[
        'categoria' => $categoria
    ])
    @endcomponent
    <div class="row rowMenuProducts">
        @component('components.product.menu',[
            'categoria' => $categoria,
            'subCategoria' => $subCategoria,
            'sub_subCategoria' =>$sub_subCategoria,
            'sub_SubCategorias'=>$sub_SubCategorias,
            'categorias'=>$categorias
        ])
        @endcomponent
        @component('components.product.info',[
            'product' => $product,
            'categoria' => $categoria,
            'subCategoria' => $subCategoria,
            'sub_subCategoria' => $sub_subCategoria,
            'interesar'=>$interesar,
            'promociones'=>$promociones
        ])
        @endcomponent

        <div class="row">
            <div class="container-full" style="text-align: center;">                            
                <img src="/img/pago-seguro-epayco.png">
            </div>
        </div>

    </div>


        
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.sliderProducts').slick({
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                adaptiveHeight: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 5000,
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
        });
    </script>
@endsection