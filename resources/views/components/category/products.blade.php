<div class="col s12 m9 l10 colProducts">
    <div class="container-principal">
        <h1>
            @if($cat_id >= 1)
                <span>{{$categoria->name}}</span>
            @endif
            @if($subcat_id >= 1)
                | <span>{{$subcategoria->name}}</span>
            @endif
            @if($sub_subcat_id >= 1)
                | <span>{{$sub_subcategoria->name}}</span>
            @endif
        </h1>
    </div>
    <div id="loader" class="notProductos">
        <h6>
            Cargando ...
        </h6>
        <div class="progress">
            <div class="indeterminate">

            </div>
        </div>
    </div>
    <div id="productlist">

    </div>
</div>