
<script>
    function cambiarPantalla(index) {


        if(index) {

            document.querySelector("#frm_botonePayco" + index).submit();

        } else {
            var p1 = document.querySelector("#pantalla1");
            var p2 = document.querySelector("#pantalla2");

            p1.style.display = "none"; 
            p2.style.display = "block"; 
        }
        
    }
</script>

    <style>
        
        .bn-row {
            display: table;
            table-layout: fixed;
            empty-cells: show;
            width: 100%;
        }
        
        .bn-row>div {
            display: table-cell;
            position: relative;
            vertical-align: top;
        }
        
        .planes {
            background: #F2F2F2;
            line-height:18px;
        }
        
        .planes>div {
            padding: 10px;
        }
        
        .planes .plan {
            padding: 20px;
            padding-bottom: 230px;
            position: relative;
            border-radius: 40px;
            color: #fff;
            text-align: center;
        }
        
        .planes .plan .button {
            display: inline-block;
            font-size: 18pt;
            line-height: 30px;
            padding: 12px 35px;
            border-radius: 30px;
            cursor: pointer;
        }
        
        .planes .plan .comprar {
            height: 140px;
            line-height: 140px;
            text-align: center;
            width: 100%;
            background: #fff;
            position: absolute;
            left: 0;
            bottom: 0;
            border-radius: 0 0 40px 40px;
        }
        .planes .plan .precio-cont {
            height: 140px;
            width: 100%;
            position: absolute;
            left: 0;
            line-height:140px;
            bottom: 120px;
        }
        .planes .plan .precio {
            font-size: 100pt;
            display: inline-block;
            position: relative;
            margin:0 auto;
            bottom:0;
        }
        
        .planes .plan .precio .simbolo {
            position: absolute;
            right: -20px;
            top: 0;
            font-size: 30pt;
        }
        
        .planes .plan .recomendado {
            box-shadow: 0 10px 20px 3px rgba(0, 0, 0, 0.3);
            margin: 20px 0;
            width: 100%;
            left: 0;
            top: 30px;
            position: absolute;
            background: #fff;
            height: 70px;
            color: #479A5C;
            font-size: 20pt;
            line-height: 70px;
        }
        
        .planes .plan .texto {
            background: url(img/bg.png) no-repeat;
            height:400px;
            overflow: auto;
            width: 80%;
            margin: auto;
        }
        
        
        
        .texto .titulo {
            font-size: 2rem;
            text-align: center;
            margin: 30px 0;
        }
        
        .texto ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        
        .texto ul li {
            padding: 0 5px 5px 30px;
            background: url(img/chulo.png) no-repeat left 5px;
            margin-bottom: 15px;
            text-align: left;
        }
        
        .planes .plan.gamer {
            background-image: linear-gradient(#ff6f15, #ffb700);
        }
        
        .planes .plan.elite {
            background-image: linear-gradient(#009b58, #92d059);
        }
        
        .planes .plan.pro {
            background-image: linear-gradient(#3258cd, #3eaad1);
        }
    </style>

<div class="row rowMypoints">

    <div id="pantalla1" style="padding:20px">
        

    <div class="bn-row container-info" style="border:1px solid #ccc; margin-bottom:30px; background:#fff; padding-right:20px;">
        <div style="width:10%">
            <h1>
                {{$cliente->puntos}} &nbsp; <span>PTS</span>
            </h1>
        </div>

        <div style="padding:0 30px; text-align:center; line-height:18px;  vertical-align:middle;">
    
                Actualmente cuentas con una <b style="font-weight:bold">membresia gratuita</b> que ter permitirá ganar puntos por tus compras. Si deseas más beneficios te invitamos a adquirir uno de los siguientes planes anuales:
     
        </div>

        <div style="cursor:pointer; width:20%; padding:15px; padding-right:5px; background:#000; color:#fff; line-height:18px; text-align:center; vertical-align:middle;" onclick="cambiarPantalla()">

               Continúa con la <br> membrecia actual 
           
        </div>
        <div style="cursor:pointer; width:30px; background:#000; color:#fff; line-height:18px; text-align:left; vertical-align:middle;" onclick="cambiarPantalla()">

               <i class="material-icons" style="vertical-align: middle;">chevron_right</i>
           
        </div>
    </div>

    <div class="row">
        <center>
            @foreach (DB::table('imagenes')->where('id', 13)->get() as $content)                
                <a href="{{ $content -> img }}" target="_blank" style="cursor: pointer;"><button style="background-color: black; padding: 10px 30px 10px 30px; border: none; border-radius: 20px; color: white; font-size: 11px; margin-top: 25px;">Descargar Politicas</button></a>
            @endforeach 
        </center>
    </div>

   
   <form id="frm_botonePayco1" name="frm_botonePayco" method="post" action="https://secure.payco.co/checkout.php" style="display:none"> 
    <input name="p_cust_id_cliente" type="hidden" value="23160">
    <input name="p_key" type="hidden" value="c2744bb9cd234fd777bb285dfc73c4530e801009">
    <input name="p_id_invoice" type="hidden" value="">
    <input name="p_description" type="hidden" value=" Membrecia GAMER">
    <input name="p_currency_code" type="hidden" value="COP">
    <input name="p_amount" id="p_amount" type="hidden" value="30000.00">
    <input name="p_tax" id="p_tax" type="hidden" value="0">
    <input name="p_amount_base" id="p_amount_base" type="hidden" value="0">

    <input name="p_url_response" type="hidden" value="http://videojuegosbaq.com.co/respuesta.html"> 
    <input name="p_url_confirmation" type="hidden" value="http://videojuegosbaq.com.co/confirmacion.php"> 
    <input name="p_signature" type="hidden" id="signature"  value="f111e7de36373122f39defa1bc61afca" />
    <input name="idboton"type="hidden" id="idboton"  value="6867" />  
    <input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn4.png" />
</form>

<form id="frm_botonePayco2" name="frm_botonePayco" method="post" action="https://secure.payco.co/checkout.php" style="display:none"> 
    <input name="p_cust_id_cliente" type="hidden" value="23160">
    <input name="p_key" type="hidden" value="c2744bb9cd234fd777bb285dfc73c4530e801009">
    <input name="p_id_invoice" type="hidden" value="">
    <input name="p_description" type="hidden" value=" Membrecia ELITE PRO">
    <input name="p_currency_code" type="hidden" value="COP">
    <input name="p_amount" id="p_amount" type="hidden" value="100000.00">
    <input name="p_tax" id="p_tax" type="hidden" value="0">
    <input name="p_amount_base" id="p_amount_base" type="hidden" value="0">

    <input name="p_url_response" type="hidden" value="http://videojuegosbaq.com.co/respuesta.html"> 
    <input name="p_url_confirmation" type="hidden" value="http://videojuegosbaq.com.co/confirmacion.php"> 
    <input name="p_signature" type="hidden" id="signature"  value="82d5041222d4c06e2d0b19bbe361fad9" />
    <input name="idboton"type="hidden" id="idboton"  value="6867" />  
    <input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn4.png" />
</form>

<form id="frm_botonePayco3" name="frm_botonePayco" method="post" action="https://secure.payco.co/checkout.php" style="display:none"> 
    <input name="p_cust_id_cliente" type="hidden" value="23160">
    <input name="p_key" type="hidden" value="c2744bb9cd234fd777bb285dfc73c4530e801009">
    <input name="p_id_invoice" type="hidden" value="">
    <input name="p_description" type="hidden" value=" Membrecia GAMER PRO">
    <input name="p_currency_code" type="hidden" value="COP">
    <input name="p_amount" id="p_amount" type="hidden" value="60000.00">
    <input name="p_tax" id="p_tax" type="hidden" value="0">
    <input name="p_amount_base" id="p_amount_base" type="hidden" value="0">

    <input name="p_url_response" type="hidden" value="http://videojuegosbaq.com.co/respuesta.html"> 
    <input name="p_url_confirmation" type="hidden" value="http://videojuegosbaq.com.co/confirmacion.php"> 
    <input name="p_signature" type="hidden" id="signature"  value="3568e59699061b5046942cb33a85457c" />
    <input name="idboton"type="hidden" id="idboton"  value="6867" />  
    <input type="image" id="imagen" src="https://369969691f476073508a-60bf0867add971908d4f26a64519c2aa.ssl.cf5.rackcdn.com/btns/btn4.png" />
</form>
    

        <div class="bn-row planes" style="background:#f2f2f2;" >

            <div>
                <div class="plan gamer" style="padding-top: 80px; margin-top: 50px;">
                    <div class="texto">
                        <div class="titulo">GAMER</div>
                        <ul>
                            <li>Acumula puntos en todas tus compras</li>
                            <li>Recibe el 5% de descuento en tu cumpleaños</li>
                            <li>Obtén 10.000 ptos por cada referido</li>
                            <li>10% de descuento en servicio técnico</li>
                            <li>Serás de los primeros en enterarte de las preventas</li>
                            <li>Promociones exclusivas de la membresía</li>
                        </ul>
                    </div>
                    <div class="precio-cont">
                        <div class="precio">30
                            <div class="simbolo">$</div>
                        </div>
                    </div>
                    <div class="comprar">
                        <div class="button" style="border: 2px solid #ff9400; color:#ff9400" onclick="cambiarPantalla(1)">COMPRAR</div>
                    </div>
                </div>
            </div>

            <div>
                <div class="plan elite" style="padding-top: 130px;">
                    <div class="recomendado">RECOMENDADO</div>
                    <div class="texto">
                        <div class="titulo">ELITE PRO</div>
                           <ul>
                            <li>Acumula puntos en todas tus compras</li>
                            <li>Recibe el 5% de descuento en tu cumpleaños</li>
                            <li>Obtén 20.000 ptos por cada referido</li>
                            <li>50% de descuento en servicio técnico</li>
                            <li>Serás de los primeros en enterarte de las preventas</li>
                            <li>Promociones exclusivas de la membresía</li>
                            <li>2 mantenimiento totalmente gratis para tu consola</li>
                        </ul>
                    </div>
                    <div class="precio-cont">
                        <div class="precio">100
                            <div class="simbolo">$</div>
                        </div>
                    </div>
                    <div class="comprar">
                        
                        <div class="button" style="background:linear-gradient(to right, #009b58, #92d059); color:#fff; border-radius:18px; padding:20px 40px" onclick="cambiarPantalla(2)">COMPRAR</div>
                    </div>
                </div>
            </div>

            <div>
                <div class="plan pro" style="padding-top: 80px; margin-top: 50px;">

                    <div class="texto">
                        <div class="titulo">GAMER PRO</div>
                       <ul>
                            <li>Acumula puntos en todas tus compras</li>
                            <li>Recibe el 5% de descuento en tu cumpleaños</li>
                            <li>Obtén 15.000 ptos por cada referido</li>
                            <li>15% de descuento en servicio técnico</li>
                            <li>Serás de los primeros en enterarte de las preventas</li>
                            <li>Promociones exclusivas de la membresía</li>
                            <li>Participas en todos los sorteos electrónicos</li>
                    
                        </ul>
                    </div>
                    <div class="precio-cont">
                        <div class="precio">60
                            <div class="simbolo">$</div>
                        </div>
                    </div>
                    <div class="comprar">
                        
                        <div class="button" style="border: 2px solid #3566cf; color:#3566cf" onclick="cambiarPantalla(3)">COMPRAR</div>
                    </div>
                </div>
            </div>
        </div>

     
    
        
        
    </div>


    <div id="pantalla2" class="col s12">

<iframe width=1024 height=600 src="https://www.odesywallet.net:1704/default.aspx?id={{$cliente->email}}" frameborder="0" allowfullscreen></iframe>

       <!-- <iframe src=""  ></iframe>-->

    </div>
</div>

<div id="ModalPoints" class="modal">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <h6>
        Redime tus puntos en compras
    </h6>
    <div class="element">
        <div class="row">
            <div class="col s5">
                <h1 class="flRight">
                    120
                </h1>
                <h2 class="flRight">
                    Puntos acumulados
                </h2>
            </div>
            <div class="col s2">
                <h1>
                    =
                </h1>
            </div>
            <div class="col s5">
                <h1 class="flLeft">
                    1.200
                </h1>
                <h2 class="flLeft">
                    Pesos en compras
                </h2>
            </div>
            <div class="col s12">
                <a class="waves-effect waves-light btn" onclick="$('.copyCode').css('visibility','inherit');$('#codeCopy').val('cod2331');">Redimir puntos</a>
            </div>
        </div>
    </div>
    <div class="row copy">
        <div class="col l7">
            <p>
                Copia y pega este código en tu carrito
                para descontar de tu compra >>
            </p>
        </div>
        <div class="col l5">
            <input type="text" id="codeCopy" name="codeCopy">
            <h2 class="copyCode">
                Copiar
            </h2>
        </div>
    </div>
</div>

<script>
    var boton = document.querySelector('.copyCode');

    boton.addEventListener('click', function(event) {
        try {
            // intentar copiar el contenido seleccionado
            var copyTextarea = document.querySelector('#codeCopy');
            copyTextarea.focus();
            copyTextarea.select();
            var resultado = document.execCommand('copy');
            if(resultado){
                swal({
                    text: "Codigo Copiado",
                    icon: imageURL,
                    button: "OK",
                });
            }else{
                swal({
                    text: "El codigo no se pudo copiar",
                    icon: imageURL,
                    button: "OK",
                });
            }
        } catch(err) {
            swal({
                text: "ERROR al intentar copiar",
                icon: imageURL,
                button: "OK",
            });
        }

        // eliminar el texto seleccionado
        window.getSelection().removeAllRanges();
        // cuando los navegadores lo soporten, habría
        // que utilizar: removeRange(range)
    });
</script>