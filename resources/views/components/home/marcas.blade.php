<section class="sectionHomeMarcas">
    <div class="row">
        @foreach($marcas_home as $key => $mH)
            <a href="{{url('categoria/'.$mH->cat_id)}}">
                <div class="col s4 m4 4">
                    <img src="{{asset($mH->img)}}" alt="">
                    <div class="info align-center">
                         <a class="btn" href="{{url('categoria/'.$mH->cat_id)}}">ver todo</a>
                         
                        <h1>
                            {{$mH->name}}
                        </h1>
                       
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>