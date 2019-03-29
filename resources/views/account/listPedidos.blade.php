<div class="row listPedidos">
    <h6>
        <a href="javascript:history.back(1)">
            <!-- Generator: Adobe Illustrator 22.1.0, SVG Export Plug-In  -->
            <svg version="1.1"
                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                 x="0px" y="0px" width="7.5px" height="12.2px" viewBox="0 0 7.5 12.2" style="enable-background:new 0 0 7.5 12.2;"
                 xml:space="preserve">
                <style type="text/css">
                    .st0{fill:none;stroke:#FFD000;stroke-width:2;stroke-linecap:round;stroke-miterlimit:10;}
                </style>
                <defs>
                </defs>
                <polyline class="st0" points="6.5,11.2 1.4,6.1 6.5,1 "/>
            </svg>
            Atrás
        </a>
    </h6>
    <table class="responsive-table">
        <thead>
            <tr>
                <th>#orden</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $key => $ped)
                @php
                    $cont = $key;
                @endphp
            @endforeach
            @foreach($pedidos as $key => $ped)
                @php
                    $reference_ped = explode("5b", $ped->referencia);
                    $precio = str_replace(",", ".", number_format($ped->total));
                    $address = \App\AddresCliente::find($ped->addres_id);
                    setlocale(LC_ALL,"es_ES");
                    $fecha = strftime("%d/%m/%Y", strtotime($ped->fecha));
                @endphp
                @if($cont == $key)
                    <tr>
                        <td>
                            <h6 class="mayus">
                                Orden {{$reference_ped[0]}}
                            </h6>
                        </td>
                        <td>
                            <h6>
                                {{$address}}
                            </h6>
                        </td>
                        <td>
                            <h6>
                                {{$fecha}}
                            </h6>
                        </td>
                        <td>
                            <h6 class="precio">
                                ${{$precio}}
                            </h6>
                        </td>
                        <td>
                            <a class="waves-effect waves-light btn" href="{{url('resumen/'.$ped->id)}}">Ver más</a>
                        </td>
                    </tr>
                @else
                    <tr class="border-bottom">
                        <td>
                            <h6 class="mayus">
                                Orden {{$reference_ped[0]}}
                            </h6>
                        </td>
                        <td>
                            <h6>
                                {{$address->address}}
                            </h6>
                        </td>
                        <td>
                            <h6>
                                {{$fecha}}
                            </h6>
                        </td>
                        <td>
                            <h6 class="precio">
                                ${{$precio}}
                            </h6>
                        </td>
                        <td>
                            <a class="waves-effect waves-light btn" href="{{url('resumen/'.$ped->id)}}">Ver más</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>