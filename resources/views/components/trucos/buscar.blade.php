<section class="sectionTrucos">
    <div class="row rowPrincipal">
        <div class="col s12 m6 l3">
            <div class="input">
                <a>
                    <input type="text" placeholder="encuentra los trucos de tu juego" id="finderTruco" name="finderTruco" value="{{$name}}">
                    <div>
                        <img src="{{asset('img/header/icon_find.png')}}" alt="">
                    </div>
                </a>
            </div>
        </div>
        <div class="col s12 m12 l6 hide-on-med-and-down">

        </div>
        <div class="col s12 m6 l3">
        {{$trucos->links()}}
        <!--<ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>-->
        </div>
    </div>
    <div class="row rowPrincipal">
        <div class="col s12">
            <div class="row rowList">
                @if($trucos[0]->title == "")
                    <div class="col s12 notTrucos">
                        <h5>
                            NO HAY TRUCOS ..
                        </h5>
                    </div>
                @endif
                @foreach($trucos as $key => $truc)
                    <div class="col s12 m6 l3">
                        <div class="container-truco">
                            <div class="img">
                                <img src="{{asset($truc->min)}}" alt="">
                                <div class="info align-center">
                                    <a class="waves-effect waves-light btn" href="{{url('trucos/'.$truc->id)}}">Leer</a>
                                </div>
                            </div>
                            <h1>
                                {{$truc->title}}
                            </h1>
                            @php
                                $descripcion = substr($truc->descripcion,0,190);
                            @endphp
                            <p>
                                {!! $descripcion !!}...
                            </p>
                            @php
                                setlocale(LC_ALL,"es_ES");
                                $fecha = strftime("%d %B", strtotime($truc->fecha));
                            @endphp
                            <h2>
                                {{ $fecha }}
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>