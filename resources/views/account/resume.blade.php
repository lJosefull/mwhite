<div class="row followPedido">
    <div class="col s12">
        @php
            $reference_ped = explode("5b", $pedido->referencia);
            $precio = str_replace(",", ".", number_format($pedido->total));
            $status = \App\PedidoStatus::find($pedido->status);
            setlocale(LC_ALL,"es_ES");
            $fecha = strftime("%B %d ,%Y", strtotime($pedido->fecha));
            $status_progreso = \App\PedidoStatusProgreso::find($pedido->status_progreso);
            $total = str_replace(",", ".", number_format($pedido->total));
            $subtotal = str_replace(",", ".", number_format($pedido->subtotal));
            $envio = str_replace(",", ".", number_format($pedido->envio));
        @endphp
        <h1>
            Order # {{$reference_ped[0]}}
        </h1>
    </div>
    <div class="col s12">
        <div class="row container-all">
            <div class="col s12 m6 l3">
                <h6 class="price">
                    ${{$precio}}
                </h6>
            </div>
            <div class="col s12 m6 l3">
                <h6>
                    Estado: {{$status->name}}
                </h6>
            </div>
            <div class="col s12 m6 l3">
                <h6>
                    Fecha de entrega: {{$fecha}}
                </h6>
            </div>
            <div class="col s12 m6 l3">
                <a class="waves-effect waves-light btn">{{$status_progreso->name}}</a>
            </div>
        </div>
        <div class="row container-new">
            <div class="container-bull">
                <div class="divMore">

                </div>
                <div class="element">
                    <span>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" style="enable-background:new 0 0 10 10;" xml:space="preserve">
                        <style type="text/css">
                            @if($pedido->status_progreso >= 1)
                                .st1{fill:#FFD000;}
                            @else
                                .st1{fill:#8F8F8F;}
                            @endif
                        </style>
                        <defs>
                        </defs>
                        <circle class="st1" cx="5" cy="5" r="5"/>
                        </svg>
                    </span>
                    <h6> pedido recibido </h6>
                </div>
                <div class="element">
                    <span>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" style="enable-background:new 0 0 10 10;" xml:space="preserve">
                        <style type="text/css">
                            @if($pedido->status_progreso >= 2)
                                .st2{fill:#FFD000;}
                            @else
                                .st2{fill:#8F8F8F;}
                            @endif
                        </style>
                        <defs>
                        </defs>
                        <circle class="st2" cx="5" cy="5" r="5"/>
                        </svg>
                    </span>
                    <h6> pago recibido</h6>
                </div>
                <div class="element">
                    <span>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" style="enable-background:new 0 0 10 10;" xml:space="preserve">
                        <style type="text/css">
                            @if($pedido->status_progreso >= 3)
                                .st3{fill:#FFD000;}
                            @else
                                .st3{fill:#8F8F8F;}
                            @endif
                        </style>
                        <defs>
                        </defs>
                        <circle class="st3" cx="5" cy="5" r="5"/>
                        </svg>
                    </span>
                    <h6> en proceso </h6>
                </div>
                <div class="element">
                    <span>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" style="enable-background:new 0 0 10 10;" xml:space="preserve">
                        <style type="text/css">
                            @if($pedido->status_progreso >= 4)
                                .st4{fill:#FFD000;}
                            @else
                                .st4{fill:#8F8F8F;}
                            @endif
                        </style>
                        <defs>
                        </defs>
                        <circle class="st4" cx="5" cy="5" r="5"/>
                        </svg>
                    </span>
                    <h6> en distribución </h6>
                </div>
                <div class="element">
                    <span>
                        <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="10px" height="10px" viewBox="0 0 10 10" style="enable-background:new 0 0 10 10;" xml:space="preserve">
                        <style type="text/css">
                            @if($pedido->status_progreso >= 5)
                                .st5{fill:#FFD000;}
                            @else
                                .st5{fill:#8F8F8F;}
                            @endif
                        </style>
                        <defs>
                        </defs>
                        <circle class="st5" cx="5" cy="5" r="5"/>
                        </svg>
                    </span>
                    <h6> entregado </h6>
                </div>
            </div>
        </div>
        <div class="row orderResume">
            @foreach($productoPurchase as $key => $proP)
                @php
                    $producto = \App\Producto::find($proP->id_producto);
                    $precio_pro = str_replace(",", ".", number_format($proP->price_pro));
                    $total_pro = str_replace(",", ".", number_format($proP->total));
                @endphp
                <div class="products row">
                    <div class="col s6 m4 l2">
                        <img src="{{asset($producto->img)}}" alt="">
                    </div>
                    <div class="col s6 m4 l4" style="text-align: left;margin-top: -15px">
                        <h5>{{$producto->name}}</h5>
                        <h6>Precio: ${{$precio_pro}}
                            <br>Cantidad: {{$proP->cant}}
                            <br>Descuento: {{$proP->descuento}}%</h6>
                        <h6>Total: ${{$total_pro}}</h6>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row orderResume" id="resumeTotal">
            <section id="myAddresses">
                <div class="col s12 m9 l5">
                    <div class="divAddress">
                        <h6>Envio a domicilio <br>
                            Dirección: {{$address->name}}
                        </h6>
                        <h5>Descripción: {{$address->descripcion}}</h5>
                        <h5>Dirección: {{$address->address}}</h5>
                        <h5>Ciudad: {{$city->CiuNombre}}</h5>
                        <h5>Departamento: {{$deparment->DisNombre}}</h5>
                        <h5>Teléfono: {{$address->phone}}</h5> <br>
                    </div>
                </div>

                <div class="col s12 m9 l5">
                    <div class="divResume">
                        <div class="row">
                            <div class="col s6">
                                <h6>Subtotal</h6>
                            </div>
                            <div class="col s6">
                                <h6 class="h5 fr">${{$subtotal}}</h6>
                            </div>
                        </div>

                        <div class="row values">
                            <div class="col s6">
                                <h6>Envio</h6>
                            </div>
                            <div class="col s6">
                                <h6 class="h5 fr">${{$envio}}</h6>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col s6">
                                <h6>Total</h6>
                            </div>
                            <div class="col s6">
                                <h6 class="fr">${{$total}}</h6>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </div>
</div>