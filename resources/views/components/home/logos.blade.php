<section class="sectionHomeLogos">
    <div class="row" id="sliderLogos">
        @foreach($logos as $key => $log)
            <div>
                <a href="">
                    <div class="logo">
                        <div>
                            <img src="{{asset($log->img)}}" alt="">
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>