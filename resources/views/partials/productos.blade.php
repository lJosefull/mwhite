  <link rel="stylesheet" href="{{  url(mix("css/app.css")) }}">
    <link rel="stylesheet" href="{{url('css/animate.css')}}">
    <link rel="stylesheet" href="{{url('css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{url('css/slick-theme.css')}}"/>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<div class="row" style="padding-top: 30px;">
    <style scoped>
      .mediaprod {
         width: 25%;
         float: left; 
         min-width: 195px;
      }
      @media (max-width: 600px) {
        .mediaprod {
            width: 100%;
            float: unset; 
            min-width: unset;
        }
      }
   </style>
    @if($products[0]->name == '')
        <div style="margin-top: 10%" class="notProductos">
            <h6>No hay productos</h6>
        </div>
    @endif

    @php
        $nxpage = 12;
        $items = 0;
        $pagina = 1;
    @endphp

    
    <center>
    @foreach($products as $key => $pro)
        <div class="product mediaprod pagina" pageid="{{$pagina}}" style="margin-bottom: 80px;">
             
                <a href="{{url('')}}/producto/{{$pro->id}}">
                    <div class="divImg">
                        <div>
                            <img class="align-center" src="{{asset($pro->img)}}">
                        </div>
                    </div>   
                </a>
                <div onclick="location.href = '{{url('')}}/producto/{{$pro->id}}';">
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
                <h5 style="font-size: 10px; margin-top: 1px !important; margin-bottom: 1px !important;">Disponibles: {{$pro->stock}}</h5>
                </div>
                <a class="waves-effect waves-light btn buyProduct" id="{{$pro->id}}"> <img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
        </div>
        
        @php
            $items++;
            if($items == $nxpage){
                $items=0;
                $pagina++;
            }
        @endphp
        
    @endforeach
    </center>
</div>

<center>
@php
    $nxpage = 12;
    $mulp = 12;
    $items = 0;
    $pagina = 0;
@endphp

@foreach($products as $key => $product)
    @php
        $items++;
        if($items == $mulp){
            $pagina++;
            $mulp = $mulp + $nxpage;
            echo '<div class="col-xs-12 pagina" pageid="'.$pagina.'">Pagina '.$pagina.': '.(($items - $nxpage)+1).' - '.($items).' de '.count($products).' Productos</div>';
        }
    @endphp                  
@endforeach

@php
    $pagina++;
    echo '<div class="col-xs-12 pagina" pageid="'.$pagina.'">Pagina '.$pagina.': '.(($items - $nxpage)+1).' - '.($items).' de '.count($products).' Productos</div>';
@endphp

@if($pagina > 1)
    @php
        $items = 0;
        $pagina = 1;
        $pgid = 1;
    @endphp
    <ul class="pagination">
        <li class="linkpg" id="pg{{$pgid}}"><a onclick="showpage(1,{{$pgid}})"><i class="material-icons">chevron_left</i></a></li>
        @php
            $pgid++;
            echo '<li class="active linkpg" id="pg'.$pgid.'"><a onclick="showpage('.$pagina.','.$pgid.')">'.$pagina.'</a></li>';
            $pgid++;
        @endphp

        @foreach($products as $key => $product)
            @php
                $contador = $key;
            @endphp
        @endforeach
        @foreach($products as $key => $product)
            @php
                $items++;
                if($items == $nxpage && $key < $contador){
                    $items=0;
                    $pagina++;
                    echo '<li class="linkpg" id="pg'.$pgid.'"><a onclick="showpage('.$pagina.','.$pgid.')">'.$pagina.'</a></li>';
                    $pgid++;
                }
            @endphp
        @endforeach
        <li class="waves-effect linkpg" id="pg{{$pgid}}">
            <a onclick="showpage({{$pagina}},{{$pgid}})">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    </ul>
@endif
</center>
<script type="text/javascript">
    function showpage(page,idlink){
        $( ".linkpg" ).each(function() {
            $( this ).removeClass('active');
        });
        $( '#pg'+idlink ).addClass("active");
        $( ".pagina" ).each(function() {
            $( this ).show();
            id = $( this ).attr("pageid");
            if(id != page){
                $( this ).hide();
            }

        });
    }
    $( document ).ready(function() {
        //$( '#pg2' ).addClass("active");
        $( ".pagina" ).each(function() {
            $( this ).show();
            id = $( this ).attr("pageid");
            if(id != 1){
                $( this ).hide();
            }
        });
    });

    $('.buyProduct').click(function () {
        var id = this.id;
        buyProduct(id);
    });
    function buyProduct(id){
        $.ajax({
            url: https + 'buyProduct',
            method: "POST",
            data: {id:id,cant:1},
            success: function (data) {
                if ($.trim(data) > 0) {
                    $('#modalAddCar').modal('open');
                }else {
                    swal({
                        text: "Error, hubo problemas",
                        icon: imageURL,
                        button: "OK!",
                    });
                }
            }
        });
    }
</script>