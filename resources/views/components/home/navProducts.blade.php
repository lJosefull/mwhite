<script>
    function moreVendidos() {
        $('#masvendidos').removeClass('desaplicar');
        $('#masvendidos').addClass('aplicar');
        $('#novedades').addClass('desaplicar');
        $('#promociones').addClass('desaplicar');
    }
    function novedades() {
        $('#novedades').removeClass('desaplicar');
        $('#novedades').addClass('aplicar');
        $('#masvendidos').addClass('desaplicar');
        $('#promociones').addClass('desaplicar');
    }

   
</script>
<section class="sectionHomeNavProducts">
    <div class="row rowPrincipal">
        <nav class="navTop">
            <div class="nav-content">
                <ul class="tabs tabs-transparent">
                    <li class="tab" onclick="moreVendidos();"><a class="active">RECIEN LLEGADOS</a></li>
                    <li class="tab" onclick="novedades();"><a id="sub" >MÁS VENDIDO</a></li>
                   
                </ul>
            </div>
        </nav>
        <div class="col s12 aplicar" id="masvendidos">
            <div class="row sliderProducts">
                @foreach($novedades as $key => $pro)
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
                                <span class="r">
                             {{$pro->descuento}}%
                           OFF
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
                            <h5 style="font-size: 10px; margin-top: 1px !important; margin-bottom: 1px !important;">Disponibles: {{$pro->stock}}</h5>
                        </div>
                        <a class="waves-light btn buyProduct" id="{{$pro->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col s12 desaplicar" id="novedades">
           
        <div class="row sliderProducts">
                @foreach($moreVendidos as $key => $pro)
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
                                <span class="r">
                             {{$pro->descuento}}%
                           OFF
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
                            <h5 style="font-size: 10px; margin-top: 1px !important; margin-bottom: 1px !important;">Disponibles: {{$pro->stock}}</h5>
                        </div>
                        <a class="waves-light btn buyProduct" id="{{$pro->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
                    </div>
                @endforeach
            </div>
    </div>
</section>