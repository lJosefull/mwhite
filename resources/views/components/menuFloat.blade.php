@foreach($categorias as $key => $cat)
    <ul id='{{$cat->id}}Menu' class='dropdown-content'>
        <div class="row">
            <div class="col s5">
                <img src="{{asset($cat->img)}}" alt="">
            </div>
            @php
                $subcategorias = \App\SubCategorias::whereNull('deleted_at')
                    ->where('categorias_id',$cat->id)
                    ->where('priorizar','SI')
                    ->limit(4)
                    ->get();
                $sub_subcategorias = \App\Sub_SubCategorias::whereNull('deleted_at')
                    ->where('categorias_id',$cat->id)
                    ->where('priorizar','SI')
                    ->get();
            @endphp
            <div class="col s4">
                <div class="categories">
                    <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[0]->id)}}">
                        <h1>
                             {{$subcategorias[0]->name}}
                        </h1>
                    </a>
                    @php
                        $validatioMenu = 1;
                    @endphp
                    @foreach($sub_subcategorias as $key_sub_sub => $sub_sub)
                        @if($validatioMenu <= 6 && $sub_sub->subcategorias_id == $subcategorias[0]->id && $sub_sub->categorias_id == $cat->id)
                            <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[0]->id.'/sub_subcategoria/'.$sub_sub->id)}}">
                                <h2>
                                   {{$sub_sub->name}}
                                </h2>
                            </a>
                            @php
                                $validatioMenu = $validatioMenu + 1;
                            @endphp
                        @endif
                    @endforeach
                </div>

                <div class="categories">
                    <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[1]->id)}}">
                        <h1>
                            {{$subcategorias[1]->name}}
                        </h1>
                    </a>
                    @php
                        $validatioMenu = 1;
                    @endphp
                    @foreach($sub_subcategorias as $key_sub_sub => $sub_sub)
                        @if($validation <= 6 && $sub_sub->subcategorias_id == $subcategorias[1]->id && $sub_sub->categorias_id == $cat->id)
                            <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[1]->id.'/sub_subcategoria/'.$sub_sub->id)}}">
                                <h2>
                                    {{$sub_sub->name}}
                                </h2>
                            </a>
                            @php
                                $validatioMenu = $validatioMenu + 1;
                            @endphp
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="col s3 colum-3">
                <div class="categories categories-one">
                    <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[2]->id)}}">
                        <h1>
                             {{$subcategorias[2]->name}}
                        </h1>
                    </a>
                    @php
                        $validatioMenu = 1;
                    @endphp
                    @foreach($sub_subcategorias as $key_sub_sub => $sub_sub)
                        @if($validation <= 6 && $sub_sub->subcategorias_id == $subcategorias[2]->id && $sub_sub->categorias_id == $cat->id)
                            <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[2]->id.'/sub_subcategoria/'.$sub_sub->id)}}">
                                <h2>
                                    {{$sub_sub->name}}
                                </h2>
                            </a>
                            @php
                                $validatioMenu = $validatioMenu + 1;
                            @endphp
                        @endif
                    @endforeach
                </div>


                <div class="categories categories-two">
                    <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[3]->id)}}">
                        <h1>
                             {{$subcategorias[3]->name}}
                        </h1>
                    </a>
                    @php
                        $validatioMenu = 1;
                    @endphp
                    @foreach($sub_subcategorias as $key_sub_sub => $sub_sub)
                        @if($validation <= 6 && $sub_sub->subcategorias_id == $subcategorias[3]->id && $sub_sub->categorias_id == $cat->id)
                            <a href="{{url('categoria/'.$cat->id.'/subcategoria/'.$subcategorias[3]->id.'/sub_subcategoria/'.$sub_sub->id)}}">
                                <h2>
                                    {{$sub_sub->name}}
                                </h2>
                            </a>
                            @php
                                $validatioMenu = $validatioMenu + 1;
                            @endphp
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </ul>
@endforeach
<!--
<ul id='xboxOneMenu' class='dropdown-content'>
    <div class="row">
        <div class="col s5">
            <img src="{{asset('img/header/xbox.png')}}" alt="">
        </div>
        <div class="col s4">
            <div class="categories">
                <a href="">
                    <h1>
                        Xbox one Juegos
                    </h1>
                </a>
                <a href="">
                    <h2>
                        All games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Action
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Figthing
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Kinect Games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Music & Party
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Role-Playing
                    </h2>
                </a>
            </div>

            <div class="categories">
                <a href="">
                    <h1>
                        Xbox one Consolas
                    </h1>
                </a>
                <a href="">
                    <h2>
                        Xbox Digital
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Xbox Live
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Digital
                    </h2>
                </a>
                <a href="">
                    <h2>
                        In-Game
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Season
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Add-Ons
                    </h2>
                </a>
            </div>
        </div>
        <div class="col s3 colum-3">
            <div class="categories categories-one">
                <a href="">
                    <h1>
                        Xbox one Accesorios
                    </h1>
                </a>
                <a href="">
                    <h2>
                        All Accessories
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Batterie Chargers
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Cables Adaptors
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Controllers
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Headsets Mic
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Memory
                    </h2>
                </a>
            </div>


            <div class="categories categories-two">
                <a href="">
                    <h1>
                        Xbox one Preventas
                    </h1>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Consoles
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Accessories
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Bundles
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Live
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Digital
                    </h2>
                </a>
            </div>

        </div>
    </div>
</ul>


<ul id='ps4Menu' class='dropdown-content'>
    <div class="row">
        <div class="col s5">
            <img src="{{asset('img/header/ps4.png')}}" alt="">
        </div>
        <div class="col s4">
            <div class="categories">
                <a href="">
                    <h1>
                        Ps4 Juegos
                    </h1>
                </a>
                <a href="">
                    <h2>
                        All games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Action
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Figthing
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Kinect Games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Music & Party
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Role-Playing
                    </h2>
                </a>
            </div>

            <div class="categories">
                <a href="">
                    <h1>
                        PS4 Consolas
                    </h1>
                </a>
                <a href="">
                    <h2>
                        PS4 Digital
                    </h2>
                </a>
                <a href="">
                    <h2>
                        PS4 Live
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Digital
                    </h2>
                </a>
                <a href="">
                    <h2>
                        In-Game
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Season
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Add-Ons
                    </h2>
                </a>
            </div>
        </div>
        <div class="col s3 colum-3">
            <div class="categories categories-one">
                <a href="">
                    <h1>
                        Ps4 Accesorios
                    </h1>
                </a>
                <a href="">
                    <h2>
                        All Accessories
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Batterie Chargers
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Cables Adaptors
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Controllers
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Headsets Mic
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Memory
                    </h2>
                </a>
            </div>


            <div class="categories categories-two">
                <a href="">
                    <h1>
                        Ps4 Preventas
                    </h1>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Consoles
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Accessories
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Bundles
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Live
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Digital
                    </h2>
                </a>
            </div>

        </div>
    </div>
</ul>

<ul id='switchMenu' class='dropdown-content'>
    <div class="row">
        <div class="col s5">
            <img src="{{asset('img/header/switch.png')}}" alt="">
        </div>
        <div class="col s4">
            <div class="categories">
                <a href="">
                    <h1>
                        switch Juegos
                    </h1>
                </a>
                <a href="">
                    <h2>
                        All games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Action
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Figthing
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Kinect Games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Music & Party
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Role-Playing
                    </h2>
                </a>
            </div>

            <div class="categories">
                <a href="">
                    <h1>
                        switch Consolas
                    </h1>
                </a>
                <a href="">
                    <h2>
                        switch Digital
                    </h2>
                </a>
                <a href="">
                    <h2>
                        switch Live
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Digital
                    </h2>
                </a>
                <a href="">
                    <h2>
                        In-Game
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Season
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Add-Ons
                    </h2>
                </a>
            </div>
        </div>
        <div class="col s3 colum-3">
            <div class="categories categories-one">
                <a href="">
                    <h1>
                        switch Accesorios
                    </h1>
                </a>
                <a href="">
                    <h2>
                        All Accessories
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Batterie Chargers
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Cables Adaptors
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Controllers
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Headsets Mic
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Memory
                    </h2>
                </a>
            </div>


            <div class="categories categories-two">
                <a href="">
                    <h1>
                        switch Preventas
                    </h1>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Games
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Consoles
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Accessories
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Bundles
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Live
                    </h2>
                </a>
                <a href="">
                    <h2>
                        Pre-Owned Digital
                    </h2>
                </a>
            </div>

        </div>
    </div>
</ul>
-->