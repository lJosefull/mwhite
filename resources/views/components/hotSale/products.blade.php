@if($products[0]->name == '')
    <div style="margin-top: 10%" class="notProductos">
        <h6>No hay productos</h6>
    </div>
@endif
@foreach($products as $key => $pro)
    <div class="col s6 m4 l2 product">
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
        </div>
        <a class="waves-effect waves-light btn buyProduct" id="{{$pro->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
    </div>
@endforeach
<div class="col s12">
    {{$products->links()}}
</div>