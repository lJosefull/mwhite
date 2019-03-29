<div class="col s12 m9 l10 infoProductView">
    <div class="container-principal">
        <h1><span>{{$categoria->name}} </span>| <span>{{$subCategoria->name}}</span> | <span>{{$sub_subCategoria->name}}</span></h1>
    </div>
    <div class="row container-product">
        <div class="col s12">
            <h1>
                {{$product->name}}
            </h1>
        </div>
        @if($product->type_pro == 1)
            <div class="col s12 m12 l7">
                    @php
                        $urlVideo = str_replace("watch?v=", "embed/",$product->video);
                    @endphp
                    @php
                        if($product->video != ''){ @endphp
                            <iframe src="{{$urlVideo}}?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                    @php        
                        }
                    @endphp
            </div>
            <div class="col s12 m6 l2">
                <div class="imgProduct">
                    <div>
                        <img src="{{asset($product->img)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3 informacion">
                <h1>
                    {{$product->name}}
                </h1>
                @php
                    $precio = str_replace(".", "", $product->precio);
                    if($product->descuento > 0)
                    {
                        $descuento = $precio - ( $precio * $product->descuento / 100);
                        $descuento = str_replace(",", ".", number_format($descuento));
                    }
                    $precio = str_replace(",", ".", number_format($precio));
                @endphp
                @if($product->descuento > 0)
                    <h2>
                        <span class="before">
                            ${{$precio}}
                        </span>
                        <span class="value">
                            ${{$descuento}}
                        </span>
                        <span class="discount">
                            -{{$product->descuento}}%
                        </span>
                    </h2>
                @else
                    <h2>
                        <span class="value">
                            ${{$precio}}
                        </span>
                    </h2>
                @endif
                <h3>
                    {{$product->puntos}}pts
                </h3>
                <a class="waves-effect waves-light btn buyProduct" id="{{$product->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
            </div>
        @else
            <div class="col s12 m6 l4">
                <div class="imgProduct">
                    <div>
                        <img src="{{asset($product->img)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col s12 m6 l3 informacion">
                <h1>
                    {{$product->name}}
                </h1>
                @php
                    $precio = str_replace(".", "", $product->precio);
                    if($product->descuento > 0)
                    {
                        $descuento = $precio - ( $precio * $product->descuento / 100);
                        $descuento = str_replace(",", ".", number_format($descuento));
                    }
                    $precio = str_replace(",", ".", number_format($precio));
                @endphp
                @if($product->descuento > 0)
                    <h2>
                        <span class="before">
                            ${{$precio}}
                        </span>
                        <span class="value">
                            ${{$descuento}}
                        </span>
                        <span class="discount">
                            -{{$product->descuento}}%
                        </span>
                    </h2>
                @else
                    <h2>
                        <span class="value">
                            ${{$precio}}
                        </span>
                    </h2>
                @endif
                <h3>
                    {{$product->puntos}}pts
                </h3>
                <a class="waves-effect waves-light btn buyProduct" id="{{$product->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
            </div>
            <div class="col s12 m12 l5">
                <div class="description">
                    <div>
                        <p>
                            {!! $product->descripcion !!}
                        </p>
                    </div>
                </div>
            </div>
        @endif
        <div class="col s12" style="font-size: 11px; line-height: 14px; padding-top: 15px;">
            {{ $product->descripcion }}
        </div>
        <div class="col s12 enviosMore">
            <h2>
                <div class="row">
                    <div class="col s12 m12 l4">
                        <img src="{{asset('img/product/icon_car.png')}}" alt="">
                    </div>
                    <div class="col s12 m12 l8">
                        Envío gratis
                        en Barranquilla
                    </div>
                </div>
            </h2>
            <h2>
                <div class="row">
                    <div class="col s12 m12 l4">
                        <img src="{{asset('img/product/icon_clock.png')}}" alt="">
                    </div>
                    <div class="col s12 m12 l8">
                        Productos
                        garantizados
                    </div>
                </div>
            </h2>
            <h2>
                <div class="row">
                    <div class="col s12 m12 l4">
                        <img class="daimond" src="{{asset('img/product/icon_diamond.png')}}" alt="">
                    </div>
                    <div class="col s12 m12 l8">
                        Entregas <br>
                        ágiles
                    </div>
                </div>
            </h2>
            <h2>
                <disv class="row">
                    <div class="col s12 m12 l4">
                        <img class="daimond" src="{{asset('img/product/icon_tarjet.png')}}" alt="">
                    </div>
                    <div class="col s12 m12 l8">
                        Pago <br>
                        seguro
                    </div>
                </disv>
            </h2>
        </div>

        <div class="col s12 datos">
            @if($product->type_pro == 1)
                <div class="row">
                    <div class="containers container-border">
                        <h1>Plataforma</h1>
                        <h2>
                            {!! $product->plataforma !!}
                        </h2>
                    </div>
                    <div class="containers container-border">
                        <h1 class="padding">Editorial</h1>
                        <h2 class="padding">{{$product->editorial}}</h2>
                    </div>
                    <div class="containers container-border">
                        <h1 class="padding">Desarollador</h1>
                        <h2 class="padding">{{$product->desarollador}}</h2>
                    </div>
                    <div class="containers container-border">
                        <h1 class="padding">Categoria</h1>
                        <h2 class="padding">{{$sub_subCategoria->name}}</h2>
                    </div>
                    <div class="containers">
                        <h1 class="padding-17">Fecha de Lanzamiento</h1>
                        <h2 class="padding-17">{{$product->fecha_lanzamiento}}</h2>
                    </div>
                </div>
            @endif
        </div>

        <div class="col s12 sectionHomeNavProducts">
            <div class="row rowPrincipal">
                <nav class="navTop">
                    <div class="nav-content">
                        <ul class="tabs tabs-transparent">
                            <li class="tab" onclick="intereses();"><a class="active" href="">Te puede interesar</a></li>
                            <li class="tab" onclick="promociones();"><a href="">Promociones</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="col s12 aplicar" id="intereses">
                    <div class="row sliderProducts">
                        @foreach($interesar as $key => $pro)
                            <div class="product">
                                <a href="{{url('producto/'.$pro->id)}}">
                                    <div class="divImg">
                                        <div>
                                            <img class="align-center" src="{{asset($pro->img)}}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <div onclick="location.href = '{{url('producto/'.$pro->id)}}';">
                                    @php
                                        $cont = strlen($pro->name);
                                        if($cont > 31){
                                            $name = substr($pro->name,0,31);
                                        }else{
                                            $name = $pro->name;
                                        }
                                    @endphp
                                    <h1>
                                        @if($cont > 31)
                                            {{ $name }}...
                                        @else
                                            {{ $name }}
                                        @endif
                                    </h1>
                                    @php
                                        $precio = str_replace(".", "", $pro->precio);
                                        if($pro->descuento > 0)
                                        {
                                            $descuento = $precio - ( $precio * $pro->descuento / 100);
                                            $descuento = str_replace(",", ".", number_format($descuento));
                                        }
                                        $precio = str_replace(",", ".", number_format($precio));
                                    @endphp
                                    @if($pro->descuento > 0)
                                        <h2>
                                            <span class="before">
                                                ${{$precio}}
                                            </span>
                                                        <span class="value">
                                                ${{$descuento}}
                                            </span>
                                                        <span class="discount">
                                                -{{$pro->descuento}}%
                                            </span>
                                        </h2>
                                    @else
                                        <h2>
                                            <span class="value">
                                                ${{$precio}}
                                            </span>
                                        </h2>
                                    @endif
                                    <h3>
                                        {{$pro->puntos}}pts
                                    </h3>
                                </div>
                                <a class="waves-effect waves-light btn buyProduct" id="{{$pro->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col s12 desaplicar" id="promociones">
                    <div class="row sliderProducts">
                        @foreach($promociones as $key => $pro)
                            <div class="product">
                                <a href="{{url('producto/'.$pro->id)}}">
                                    <div class="divImg">
                                        <div>
                                            <img class="align-center" src="{{asset($pro->img)}}" alt="">
                                        </div>
                                    </div>
                                </a>
                                <div onclick="location.href = '{{url('producto/'.$pro->id)}}';">
                                    @php
                                        $cont = strlen($pro->name);
                                        if($cont > 31){
                                            $name = substr($pro->name,0,31);
                                        }else{
                                            $name = $pro->name;
                                        }
                                    @endphp
                                    <h1>
                                        @if($cont > 31)
                                            {{ $name }}...
                                        @else
                                            {{ $name }}
                                        @endif
                                    </h1>
                                    @php
                                        $precio = str_replace(".", "", $pro->precio);
                                        if($pro->descuento > 0)
                                        {
                                            $descuento = $precio - ( $precio * $pro->descuento / 100);
                                            $descuento = str_replace(",", ".", number_format($descuento));
                                        }
                                        $precio = str_replace(",", ".", number_format($precio));
                                    @endphp
                                    @if($pro->descuento > 0)
                                        <h2>
                                            <span class="before">
                                                ${{$precio}}
                                            </span>
                                                        <span class="value">
                                                ${{$descuento}}
                                            </span>
                                                        <span class="discount">
                                                -{{$pro->descuento}}%
                                            </span>
                                        </h2>
                                    @else
                                        <h2>
                                            <span class="value">
                                                ${{$precio}}
                                            </span>
                                        </h2>
                                    @endif
                                    <h3>
                                        {{$pro->puntos}}pts
                                    </h3>
                                </div>
                                <a class="waves-effect waves-light btn buyProduct" id="{{$pro->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function intereses() {
        $('#intereses').removeClass('desaplicar');
        $('#intereses').addClass('aplicar');
        $('#promociones').addClass('desaplicar');
    }
    function promociones() {
        $('#promociones').removeClass('desaplicar');
        $('#promociones').addClass('aplicar');
        $('#intereses').addClass('desaplicar');
    }
</script>
