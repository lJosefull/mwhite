<?php
$info = \App\Info::find(1);
$lugares = \App\Lugares::all();
$http = url('/');

$pedido = \App\Pedido::find($id_pedido);
$productoPurchase = \App\ProductoPurchase::where('id_pedido','=',$id_pedido)
    ->get();

$reference_ped = substr($pedido->referencia, 2, 10);
setlocale(LC_ALL,"es_ES");
$date =  strftime("%#e %B  de %Y", strtotime($pedido->fecha));
$total = str_replace(",", ".", number_format($pedido->total));
$subtotal = str_replace(",", ".", number_format($pedido->subtotal));
$envio = str_replace(",", ".", number_format($pedido->envio));

$address = \App\AddresCliente::find($pedido->addres_id);
$deparment = \App\Distritos::find($address->deparment);
$city = \App\Ciudades::find($address->city);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href=""><style>
        .divAddress{
            float: left;
            width: 43%;
            text-align: left;
            margin-bottom: 10px;
            border: 1px solid rgba(153,153,153,0.2);
            background: white;
            padding: 10px 20px 0px 35px;
        }
        .divAddress h6 {
            text-transform: uppercase;
            line-height: 1.5em;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 10pt;
            color: #E87CA0;
            margin-bottom: -15px;
        }
        .divAddress h5 {
            line-height: 2px;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 10pt;
            color: #808080;
        }
    </style>
</head>
<body>
<table cellpadding="0" cellspacing="0" align="center" border="0" width="100%" >
    <tr>
        <td width="600" border="0"  align="center">
            <table cellpadding="0" cellspacing="0" border="0" width="600" style="font-family: Helvetica Neue, Helvetica, Arial, sans-serif">
                <tr>
                    <td width="100%" style="width:100%; text-align: center; border:0; padding: 0;">
                        <a target="_blank" href="{{$http}}"><img src="{{$http}}/img/bannerEmail.png" style="width:100%; display: block" alt="43-05"></a>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="middle" bgcolor="#F2F2F2" width="100%" style="width:100%; text-align: center; border:0; padding: 0; background-color: #F2F2F2;">
                        <table cellpadding="0" align="center" cellspacing="0" border="0" width="400">
                            <tr>
                                <td align="center" border="0" style="padding-top: 20px; padding-bottom: 20px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13pt; color: #808080; line-height: 1.5em;">
                                    <span style="color: #FF820E; font-weight: bold; font-size: 15pt">
                                        El cliente {{$cliente->name}}  {{$cliente->lastName}}<br>
                                        Identificado con {{$cliente->identi}}
                                    </span>
                                    <br>
                                    <br>
                                    Ha realizado un pedido en <a target="_blank" href='{{$http}}/' style='text-decoration: none'><span style='font-weight:700;font-size: 16px;color: #FF820E;'>{{$info->https}}</span></a>.<br>
                                    <br>
                                    <div style='background: #000000; color: #FFD000;width: 98%; padding: 5px 10px;'>INFORMACIÓN BÁSICA</div>
                                    <br>
                                    <div style='padding-left: 10px'>
                                        Referencia: {{$reference_ped}} <br>
                                        Fecha: {{$date}} <br>
                                        Total: ${{$total}} <br>
                                        Estado: {{$pedido->estado}} <br>
                                        <br>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table style="width: 100%;">
                                        <tr style="font-weight: 600;padding: 20px 0px;background: #F9F9F9;border: 1px solid rgba(244,244,244,1);border-right: none;border-left: none;">
                                            <td style="padding: 10px 0px">Producto</td>
                                            <td>Nombre</td>
                                            <td>Precio</td>
                                            <td>Descuento</td>
                                            <td>cant</td>
                                            <td>total</td>
                                        </tr>
                                        @foreach($productoPurchase as $key => $proP)
                                            @php
                                                $producto = \App\Producto::find($proP->id_producto);
                                                $precio_pro = str_replace(",", ".", number_format($proP->price_pro));
                                                $total_pro = str_replace(",", ".", number_format($proP->total));
                                            @endphp
                                            <tr style="color: #0a0a0a;font-weight: 400">
                                                <td>
                                                    <img style="width: 100px" src="{{$http}}/{{$producto->img}}" alt="">
                                                </td>
                                                <td>
                                                    {{$producto->name}}
                                                </td>
                                                <td>
                                                    ${{$precio_pro}}
                                                </td>
                                                <td>
                                                    {{$proP->descuento}} %
                                                </td>
                                                <td>
                                                    {{$proP->cant}}
                                                </td>
                                                <td>
                                                    ${{$total_pro}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="position: relative">
                                    <div class="divAddress">
                                        <h6>Envio a domicilio <br>
                                            Dirección: {{$address->name}}
                                        </h6>
                                        <h5>Descripcion: {{$address->descripcion}}</h5>
                                        <h5 style="line-height: inherit;margin-top: -10px;margin-bottom: -10px">Dirección: {{$address->address}}</h5>
                                        <h5>Ciudad: {{$city->CiuNombre}}</h5>
                                        <h5>Departamento: {{$deparment->DisNombre}}</h5>
                                        <h5>Teléfono: {{$address->phone}}</h5> <br>
                                    </div>
                                    <div style="width: 38%;position: absolute;top: 20px;left: 50%" class="divAddress">
                                        <h5 style="padding-bottom: 10px;text-align: center">Subtotal: ${{$subtotal}}</h5>
                                        <h5 style="text-align: center;padding: 20px 0px;border-bottom: 2px dotted rgba(185,180,178,0.2);border-top: 2px dotted rgba(185,180,178,0.2);">Envio: ${{$envio}}</h5>
                                        <h5 style="padding-top: 10px;text-align: center">Total: ${{$total}}</h5>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td border="0" style="padding-top: 20px; padding-bottom: 10px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 13pt; color: #E87CA0; line-height: 1.5em;">
                                    <span style="color: #FF820E">Mensaje automatico desde VideoJuegos Barranquilla.</span> <i></i>
                                </td>
                                <br>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" width="100%" bgcolor="#000000" style="width:100%; border:0; padding-top: 40px; padding-bottom: 40px; background-color: #000000">
                        <table cellpadding="0" cellspacing="0" align="center" border="0" width="550" style="width: 550px; border-collapse: collapse">
                            <tr>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #FFD000;">
                                    <a target="_blank" style="color: #FFD000; text-decoration: none" href="{{$http}}">INICIO</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #FFD000; text-decoration: none" href="{{$http}}/contacto">CONTACTO</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #FFD000; text-decoration: none" href="{{$http}}/sobre-nosotros">NOSOTROS</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #FFD000; text-decoration: none" href="{{$http}}/trucos">TRUCOS</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #FFD000; text-decoration: none" href="{{$http}}/hot-sale">HOT SALE</a>
                                </td>
                                <td width="5.2%" border="0" align="center" valign="center" style="width: 5.2%; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">|</td>
                                <td width="12.33%" border="0" align="center" valign="center" style="width: 12.33%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;">
                                    <a target="_blank" style="color: #FFD000; text-decoration: none" href="{{$http}}/registro">REGISTRO</a>
                                </td>

                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top" width="100%" bgcolor="#000000" style="width:100%; border:0; padding-bottom: 20px; background-image: url('{{$http}}/img/footer/background.png')">
                        <table cellpadding="0" cellspacing="0" align="center" border="0" width="550" style="width: 550px; border-collapse: collapse;">
                            <tr>
                                <td align="left" valign="bottom" width="50%" bgcolor="#ffffff" style="width: 50%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;background-image: url('{{$http}}/img/footer/background.png')">
                                    <a target="_blank" href="{{$http}}"><img style="padding-bottom: 20px;width: 120px;" src="{{$http}}/img/logo_small.png" alt="2-04"></a><br>
                                    SÍGUENOS
                                    <a target="_blank" href="{{$info->facebook}}"><img style="padding-left: 10px; vertical-align: middle;width: auto" src="{{$http}}/img/footer/facebook.png" alt="2-02"></a>
                                    <a target="_blank" href="{{$info->instagram}}"><img style="padding-left: 10px; vertical-align: middle;width: auto;" src="{{$http}}/img/footer/instagram.png" alt="2-03"></a>
                                    <a target="_blank" href="{{$info->youtube}}"><img style="padding-left: 10px; vertical-align: middle;width: auto;" src="{{$http}}/img/footer/youtube.png" alt="2-03"></a>
                                </td>
                                <td align="right" valign="bottom" width="50%" bgcolor="#ffffff" style="width: 50%; line-height: 1.3em; letter-spacing: 1px; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; font-size: 8pt; color: #ffffff;background-image: url('{{$http}}/img/footer/background.png');background-position: 24% 0%;">
                                    <a  style="color: #ffffff; text-decoration: none" href="{{$http}}/contact"><b>CONTÁCTENOS</b></a><br><br>
                                    Videojuegos Barranquila,<br>
                                    {{$lugares[0]->dir}}<br>
                                    Barranquilla,Colombia<br>
                                    +57 {{$lugares[0]->movil}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>