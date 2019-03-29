<footer class="page-footer" style="background:#f2f2f2;">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l3">
                <div class="row">
                    <div class="col s12 m6 l5">
                        <h1 style=" width: 144px;
  height: 25px;
  font-family: Righteous;
  font-size: 20px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.25;
  letter-spacing: normal;
  text-align: left;
  color: #89007e;">
                            MWHITE STORE
                        </h1>
                        
                           
                                <a href="{{Route('contact')}}">
                                    <h2 style="color:#707070;">
                                       Sobre M+white
                                    </h2>
                                </a>
                                 <a href="{{Route('contact')}}">
                                    <h2 style="color:#707070;">
                                       Contacto
                                    </h2>
                                </a>
                            
<h3 style="  width: 101px;
  height: 19px;
  font-family: SourceSansPro;
  font-size: 15px;
  font-weight: normal;
  font-style: normal;
  font-stretch: normal;
  line-height: 1.27;
  letter-spacing: normal;
  text-align: left;
  color: #89007e;">Solicitar Crédito

</h3>
                        
                    </div>
                    <div class="col s12 m6 l7">
                        <h1>
                            &ensp;
                        </h1>
                        @foreach($categorias as $key => $cat)
                            @if($key >= 7 && $key <= 12)
                                <a href="{{url('categoria/'.$cat->id)}}">
                                    <h2>
                                        {{$cat->name}}
                                    </h2>
                                </a>
                            @endif
                        @endforeach
                        <a href="{{Route('hotSale')}}">
                            <h2>
                                Hot sale
                            </h2>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col s12 m6 l2">
                <h1>
                    INFORMACIÓN
                </h1>
                <!--
                <a href="{{url('/#promociones')}}">
                    <h2>
                        PROMOCIONES ESPECIALES
                    </h2>
                </a>
                <a href="{{url('/#novedades')}}">
                    <h2>
                        NOVEDADES
                    </h2>
                </a>
                <a href="{{url('/#masvendidos')}}">
                    <h2>
                        ¡LO MÁS VENDIDO!
                    </h2>
                </a>
                -->
                <a href="{{Route('contact')}}">
                    <h2>
                        NUESTRAS TIENDAS
                    </h2>
                </a>
                <a href="{{Route('contact')}}">
                    <h2>
                        CONTACTE CON NOSOTROS
                    </h2>
                </a>
                <a href="{{Route('register')}}">
                    <h2>
                        Registro
                    </h2>
                </a>
                <a href="{{Route('about')}}">
                    <h2>
                        ABOUT US
                    </h2>
                </a>
                <a href="{{Route('trucos')}}">
                    <h2>
                       Trucos
                    </h2>
                </a>
            </div>

            <div class="col s12 m6 l3">
                <h1>
                    MI CUENTA
                </h1>
                @if(session()->has('id'))
                    <a href="{{Route('listPedidos')}}">
                        <h2>
                            MIS COMPRAS
                        </h2>
                    </a>
                    <a href="{{Route('myPoints')}}">
                        <h2>
                            MIS PUNTOS
                        </h2>
                    </a>
                    <a href="{{Route('FollowPedid')}}">
                        <h2>
                            Seguir mi pedido
                        </h2>
                    </a>
                    <a href="{{Route('account')}}">
                        <h2>
                            MIS DIRECCIONES
                        </h2>
                    </a>
                    <a href="{{Route('account')}}">
                        <h2>
                            MIS DATOS PERSONALES
                        </h2>
                    </a>
                @else
                    <a class="modal-trigger" href="#modalLogin">
                        <h2>
                            MIS COMPRAS
                        </h2>
                    </a>
                    <a class="modal-trigger" href="#modalLogin">
                        <h2>
                            MIS PUNTOS
                        </h2>
                    </a>
                    <a class="modal-trigger" href="#modalLogin">
                        <h2>
                            Seguir mi pedido
                        </h2>
                    </a>
                    <a class="modal-trigger" href="#modalLogin">
                        <h2>
                            MIS DIRECCIONES
                        </h2>
                    </a>
                    <a class="modal-trigger" href="#modalLogin">
                        <h2>
                            MIS DATOS PERSONALES
                        </h2>
                    </a>
                @endif
            </div>

            <div class="col s12 l4">
                <div class="row rowSiguenos">
                    <div class="col s12 m12 l5">
                        <h1>
                            Síguenos
                        </h1>
                        <a href="{{$info->instagram}}" target="_blank">
                            <img src="{{asset('img/footer/instagram.png')}}" alt="">
                        </a>
                        <a href="{{$info->facebook}}" target="_blank">
                            <img src="{{asset('img/footer/facebook.png')}}" alt="">
                        </a>
                        <a href="{{$info->youtube}}" target="_blank">
                            <img src="{{asset('img/footer/youtube.png')}}" alt="">
                        </a>
                    </div>
                    <div class="col s12 m12 l7">
                        <h1>
                            newsletter
                        </h1>
                        <form id="formNewsletter">
                            <input placeholder="correo electrónico" id="emailNewsletter" name="emailNewsletter" type="text">
                            <a class="waves-effect waves-light btn newsletter">enviar</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2019 mwhite
            <a class="grey-text text-lighten-4 right" target="_blank" href="https://midsoluciones.com/">Desarrollado por Mid soluciones</a>
        </div>
    </div>
</footer>

@component('components.modalLogin',[
    'imagenes'=>$imagenes
])
@endcomponent
@component('components.modalBono',[
    'imagenes'=>$imagenes
])
@endcomponent
@component('components.modalAddCar',[
    'imagenes'=>$imagenes
])
@endcomponent