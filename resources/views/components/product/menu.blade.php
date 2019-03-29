<div class="col s12 m3 l2 menuLeftCategorias">
    <h1>
        Filtros
    </h1>
    <div>
        <a class="waves-effect waves-light btn-small etiquetas">{{$categoria->name}}</a>
    </div>
    <div>
        <a class="waves-effect waves-light btn-small etiquetas">{{$sub_subCategoria->name}}</a>
    </div>
    <h1>
        <img src="{{asset('img/product/icon_up.png')}}" alt="">categorías
    </h1>
    @foreach($sub_SubCategorias as $key => $sub_cat)
        @if($sub_subCategoria->id == $sub_cat->id)
            <a href="{{url('categoria/'.$categoria->id.'/subcategoria/'.$subCategoria->id.'/sub_subcategoria/'.$sub_cat->id)}}">
                <h2 class="active">
                    {{$sub_cat->name}}
                </h2>
            </a>
        @else
            <a href="{{url('categoria/'.$categoria->id.'/subcategoria/'.$subCategoria->id.'/sub_subcategoria/'.$sub_cat->id)}}">
                <h2>
                    {{$sub_cat->name}}
                </h2>
            </a>
        @endif
    @endforeach

    <h1>
        <img src="{{asset('img/product/icon_up.png')}}" alt="">más categorias
    </h1>
    @foreach($categorias as $key => $cat)
        @if($categoria->id == $cat->id)
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