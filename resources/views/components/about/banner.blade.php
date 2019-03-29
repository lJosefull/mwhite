<section class="sectionAbout" style="background-image: url({{asset('img/about/background.png')}})">
    <div class="row">
        <div class="col s12 m12 l3">
            <h1 id="galery">
                <img src="{{asset('img/about/icon.png')}}" alt="">
                Fotos
            </h1>
        </div>

        <div class="col s12 m12 l6">
            <p>
               {{$textos[0]->texto}}
            </p>
        </div>

        <div class="col s12 m12 l3">
            <h1>
                <a class="modal-trigger" href="#modalVideos">
                    <img src="{{asset('img/about/icon.png')}}" alt="">
                    Videos
                </a>
            </h1>
        </div>
    </div>
</section>

<section class="sectionImagenesGaleria">
    <div class="row" id="galeryImagenes">
        @foreach($galeria_imagenes as $key => $gi)
            <a href="{{url($gi->img)}}">
                <div class="col s6 m3 l3 containerImagenesGaleria">
                    <img src="{{asset($gi->img)}}" alt="">
                </div>
            </a>
        @endforeach
    </div>
</section>

