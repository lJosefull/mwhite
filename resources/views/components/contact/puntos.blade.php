<section class="sectionContactPuntos">
    <div class="row">
        @foreach($lugares as $key => $lug)
            <div class="container-puntos">
                <div class="img">
                    <img src="{{asset($lug->img_1)}}" alt="">
                    <img src="{{asset($lug->img_2)}}" alt="">
                    <img src="{{asset($lug->img_3)}}" alt="">
                </div>
                <div class="info">
                    <h1>
                        visítanos
                    </h1>
                    <h2>
                    <span>
                        dir
                    </span>
                        {{$lug->dir}}
                    </h2>
                    <h2>
                    <span>
                        móvil
                    </span>
                        {{$lug->movil}}
                    </h2>
                    <h2>
                    <span>
                        horario
                    </span>
                        {{$lug->horario}}
                    </h2>

                    <h2>
                    <span>
                        Email
                    </span>
                        info@videojuegosbaq.com
                    </h2>
                </div>
            </div>
        @endforeach
    </div>
</section>