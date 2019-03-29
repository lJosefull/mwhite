<div id="modalVideos" class="modal" style="background-image: url({{asset('img/bono/background.png')}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <ul id="svList">
        @foreach($galeria_videos as $key => $gv)
            <li class="svThumb ytVideo" data-videoID="{{$gv->id_youtube}}">{{$gv->name}}</li>
        @endforeach
    </ul>
</div>