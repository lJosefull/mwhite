<div class="col s12 m3 l2 menuLeftCategorias">
    <h1>
        Filtros
    </h1>
    @if($cat_id >= 1)
        <div>
            <a class="waves-effect waves-light btn-small etiquetas" href="{{url('categoria/'.$cat_id)}}"><!--<i class="material-icons right">clear</i>-->{{$categoria->name}}</a>
        </div>
    @endif
    @if($subcat_id >= 1)
        <div>
            <a class="waves-effect waves-light btn-small etiquetas" href="{{url('categoria/'.$cat_id.'/subcategoria/'.$subcat_id)}}">
                <!--<i class="material-icons right">clear</i>-->
                {{$subcategoria->name}}
            </a>
        </div>
    @endif
    @if($sub_subcat_id >= 1)
        <div>
            <a class="waves-effect waves-light btn-small etiquetas" href="{{url('categoria/'.$cat_id.'/subcategoria/'.$subcat_id.'/sub_subcategoria/'.$sub_subcat_id)}}">
                <!--<i class="material-icons right">clear</i>-->
                {{$sub_subcategoria->name}}
            </a>
        </div>
    @endif
    <a href="{{url('categoria/'.$cat_id)}}">
        <h6>Limpiar filtros</h6>
    </a>
    <h1>
        <img src="{{asset('img/product/icon_up.png')}}" alt="">categorías
    </h1>

    @if($subcat_id == 0)
        @foreach($subcategorias as $key => $sub_cat)
            @if($subcat_id == $sub_cat->id)
                <a href="{{url('categoria/'.$categoria->id.'/subcategoria/'.$sub_cat->id)}}">
                    <h2 class="active">
                        {{$sub_cat->name}}
                    </h2>
                </a>
            @else
                <a href="{{url('categoria/'.$categoria->id.'/subcategoria/'.$sub_cat->id)}}">
                    <h2>
                        {{$sub_cat->name}}
                    </h2>
                </a>
            @endif
        @endforeach
    @else
        @foreach($sub_subcategorias as $key => $sub_cat)
            @if($sub_subcat_id == $sub_cat->id)
                <a href="{{url('categoria/'.$categoria->id.'/subcategoria/'.$subcat_id.'/sub_subcategoria/'.$sub_cat->id)}}">
                    <h2 class="active">
                        {{$sub_cat->name}}
                    </h2>
                </a>
            @else
                <a href="{{url('categoria/'.$categoria->id.'/subcategoria/'.$subcat_id.'/sub_subcategoria/'.$sub_cat->id)}}">
                    <h2>
                        {{$sub_cat->name}}
                    </h2>
                </a>
            @endif
        @endforeach
    @endif

    <div class="row rowRange">
        <h1>Rango de precios</h1>
        <input type="hidden" class="caja" placeholder="Desde" id="min" value="100000">
        <input type="hidden" class="caja" placeholder="Hasta" id="max" value="1000000">
        <div class="range">
            <a class="waves-effect waves-light btn-small valuesPrice">
                $<span id="minimum"><?=number_format(10000, 0, ',', '.')?></span>
            </a>
            <span class="range__g">&ensp;&ensp;</span>
            <a class="waves-effect waves-light btn-small valuesPrice">
                $<span id="maximum"><?=number_format(3000000, 0, ',', '.')?></span>
            </a>
        </div>
        <div id="slider-range"></div>
    </div>

    <h1>
        <img src="{{asset('img/product/icon_up.png')}}" alt="">más categorias
    </h1>
    @foreach($categorias as $key => $cat)
        @if($cat_id == $cat->id)
            <a href="{{url('categoria/'.$cat->id)}}">
                <h2 class="active">
                    {{$cat->name}}
                </h2>
            </a>
        @else
            <a href="{{url('categoria/'.$cat->id)}}">
                <h2>
                    {{$cat->name}}
                </h2>
            </a>
        @endif
    @endforeach
</div>