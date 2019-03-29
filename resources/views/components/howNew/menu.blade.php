<div class="col l2 menuLeftCategorias">
    <h1>
        <img src="{{asset('img/product/icon_up.png')}}" alt="">categorías
    </h1>
    <a href="">
        <h2>
            <span>90</span> Games
        </h2>
    </a>
    <a href="">
        <h2>
            <span>15</span> Consolas
        </h2>
    </a>
    <a href="">
        <h2>
            <span>46</span> headsets mic
        </h2>
    </a>
    <a href="">
        <h2>
            <span>10</span> Digital
        </h2>
    </a>
    <a href="">
        <h2>
            <span>47</span> memory
        </h2>
    </a>
    <a href="">
        <h2>
            <span>08</span> accesorios
        </h2>
    </a>
    <a href="">
        <h2>
            <span>34</span> game card
        </h2>
    </a>
    <a href="">
        <h2>
            <span>78</span> sin categoría
        </h2>
    </a>
    <div class="row rowRange">
        <h1>Rango de precios</h1>
        <input type="hidden" class="caja" placeholder="Desde" id="min" value="100000">
        <input type="hidden" class="caja" placeholder="Hasta" id="max" value="1000000">
        <div class="range">
            <a class="waves-effect waves-light btn-small valuesPrice">
                $<span id="minimum"><?=number_format(100000, 0, ',', '.')?></span>
            </a>
            <span class="range__g">&ensp;&ensp;</span>
            <a class="waves-effect waves-light btn-small valuesPrice">
                $<span id="maximum"><?=number_format(1000000, 0, ',', '.')?></span>
            </a>
        </div>
        <div id="slider-range"></div>
    </div>
</div>