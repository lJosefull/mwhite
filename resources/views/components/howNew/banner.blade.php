<section class="sectionBannerHome">
    <div class="bannerHome">
        @foreach($banner as $key => ban)
            <div class="divImg">
        <div>
             <img class="align-center" src="{{asset($ban->img)}}" alt="">
        </div>
        </a>
    </div>
        
        @endforeach
<div class="col s12">
    {{$ban->links()}}
</div>
</section>