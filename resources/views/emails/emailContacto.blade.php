<?php
$info = \App\Info::find(1);
$lugares = \App\Lugares::all();
$http = url('/');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
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
                                    <span style="color: #FF820E; font-weight: bold; font-size: 15pt">Buenas, Este es un mensaje informativo.</span>
                                    <br>
                                    <br>
                                    Se ha contactado una persona desde el formulario de <a target="_blank" href='{{$http}}/' style='text-decoration: none'><span style='font-weight:700;font-size: 16px;color: #FF820E;'>{{$info->https}}</span></a>.<br>
                                    <br>
                                    <div style='background: #000000; color: #FFD000;width: 98%; padding: 5px 10px;'>INFORMACIÓN BÁSICA</div>
                                    <br>
                                    <div style='padding-left: 10px'>
                                        Nombres: {{$name}} <br>
                                        Email: {{$email}} <br>
                                        Telefono: {{$phone}} <br>
                                        Asunto: {{$asunt}} <br>
                                        Mensaje:
                                        <div style="text-align: justify">{{$msg}} <br></div>
                                        <br>
                                    </div>
                                    <span style="color: #FF820E">Mensaje automatico desde VideoJuegos Barranquilla.</span> <i></i>
                                </td>
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