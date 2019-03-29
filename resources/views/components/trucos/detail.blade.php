<section class="sectionTrucos">
    <div class="row rowPrincipal row-detail">
        <div class="col s12 m8 l8 border-right">
            <div class="detail">
                <h1>
                    {{$truco->title}}
                </h1>
                @php
                    setlocale(LC_ALL,"es_ES");
                    $fecha = strftime("%B %d", strtotime($truco->fecha));
                @endphp
                <h2>
                    {{$fecha}}
                </h2>
                <a>
                <span>
                    <a href="javascript:history.back(1)">
                        < atrás
                    </a>
                </span>
                </a>
                <img src="{{asset($truco->maxime)}}" alt="">
                <div class="detailBlog">
                    <p class="subtitle">
                        {!! $truco->subtitle !!}
                    </p>
                    <br>
                    <p>
                        {!! $truco->descripcion !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col s12 m4 l4">
            <div class="listBlogs rowList">
                <h1>
                    otros trucos
                </h1>
                @foreach($moreTrucos as $key => $truc)
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
                            $descripcion = substr($truc->descripcion,0,150);
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
                @endforeach

            </div>
        </div>
    </div>
</section>