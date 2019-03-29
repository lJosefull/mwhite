<div class="row carShowRow">
    <div class="col s12 m12 l8">
        <table class="responsive-table">
            <!--
            <thead>
            <tr>
                <th class="productTh">Producto</th>
                <th>Nombre</th>
                <th>Valor</th>
                <th>cantidad</th>
            </tr>
            </thead>
            -->
            <tbody>
            @if(session()->has('car'))
                @php
                    session_start();
                    $contarPro = 0;
                @endphp
                @for($i=1;$i<=session()->get('car');$i++)
                    @if($_SESSION['id_product'][$i] <> "")
                        @php
                            $contarPro = $contarPro + 1
                        @endphp
                        @php
                            $producto = \App\Producto::find($_SESSION['id_product'][$i]);
                            $precio = str_replace(".", "", $producto->precio);
                            if($producto->descuento > 0){
                                $suma = $precio - ($precio * $producto->descuento / 100);
                                $precio = str_replace(",", ".", number_format($precio - ($precio * $producto->descuento / 100)));
                            }else{
                                $suma = $precio;
                                $precio = str_replace(",", ".", number_format($precio));
                            }
                            $precioTotal = $suma * $_SESSION['cant'][$i];
                            $subtotal = $subtotal + $precioTotal;
                            $precioTotal = str_replace(",", ".", number_format($precioTotal));
                        @endphp
                        <tr>
                            <td class="img">
                                <a href="{{url('producto/'.$_SESSION['id_product'][$i])}}">
                                    <img src="{{asset($producto->img)}}" alt="">
                                </a>
                            </td>
                            <td class="name">
                                <h4>{{$producto->name}}</h4>
                            </td>
                            <td class="price">
                                <h5 class="priceTotal{{$i}}">${{$precioTotal}}</h5>
                            </td>
                            <td>
                                <div class="cant">
                                    <div onclick="lessMore({{$i}},{{$_SESSION['id_product'][$i]}},{{$valorEnvio}})">
                                        <div class="btns">
                                            <span>
                                                -
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <input class="productCant{{$i}}" style="width: 37px;text-align: center;" type="text" value="{{$_SESSION['cant'][$i]}}" disabled="disabled">
                                    </div>
                                    <div onclick="plusMore({{$i}},{{$_SESSION['id_product'][$i]}},{{$valorEnvio}})" class="btns">
                                        <div class="btns">
                                            <span>
                                                +
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endfor
            @endif
            </tbody>
        </table>
        @if($contarPro == 0)
            <h6 class="notPorducts">
                No tiene productos para comprar
            </h6>
        @endif
    </div>

    <div class="col s12 m12 l4">
        <div class="row resumen">
            <h1>
                Resumen del pedido
            </h1>
            @php
                $envio = $valorEnvio;
                $total = $subtotal + $envio;
                $subtotal = str_replace(",", ".", number_format($subtotal));
                $envio = str_replace(",", ".", number_format($envio));
                $total = str_replace(",", ".", number_format($total));
            @endphp
            <h2>
                Subtotal <span class="subtotal">${{$subtotal}}</span>
            </h2>
            <h2>
                Envio <span>${{$envio}}</span>
            </h2>
            <h2 class="descountCode">
                Dto. Código <span>- $1.200</span>
            </h2>
            <h2 class="totalResalt">
                Total <span class="total">${{$total}}</span>
            </h2>

            @if($contarPro >= 1)
                <a class="waves-effect waves-light btn haveCode modal-trigger" href="#ModalCodigo">Tengo un código</a>
                <a class="waves-effect waves-light btn goPedido">Realizar pedido</a>
            @else
                <a class="waves-effect waves-light btn notPedido">Realizar pedido</a>
            @endif
        </div>
    </div>

    <div id="ModalCodigo" class="modal">
        <div class="headerLogin">
            <a class="modal-close">X</a>
        </div>
        <br>
        <h6>
            Coloca tu código a continuación:
        </h6>
        <div class="element">
            <form id="descontMonto" action="">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="desMonToken" name="desMonToken">
                    </div>
                    <div class="col s12">
                        <a class="waves-effect waves-light btn modal-close" onclick="$('.descountCode').css('display','block');$('.haveCode').css('display','none')">Descontar monto</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>