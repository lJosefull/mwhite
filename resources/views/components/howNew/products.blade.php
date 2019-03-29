<div class="col l10 colProducts">
    <div class="container-principal">
        <h1><span>¡Como nuevo! </span>| <span>Juegos</span></h1>
    </div>
    <div class="row">
        @for($i=1;$i<=3;$i++)
            <div class="col l3 product">
                <div class="divImg">
                    <div>
                        <img class="align-center" src="{{asset('img/productos/2.png')}}" alt="">
                    </div>
                </div>
                <h1>
                    Call of Duty - Black Ops II
                </h1>
                <h2>
                            <span class="before">
                                $250,000
                            </span>
                    <span class="value">
                                $200,000
                            </span>
                    <span class="discount">
                                -20%
                            </span>
                </h2>
                <h3>
                    15pts
                </h3>
                <a class="waves-effect waves-light btn"><img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
            </div>
            <div class="col l3 product">
                <div class="divImg">
                    <div>
                        <img class="align-center" src="{{asset('img/productos/3.png')}}" alt="">
                    </div>
                </div>
                <h1>
                    Destiny
                </h1>
                <h2>
                            <span class="before">
                                $250,000
                            </span>
                    <span class="value">
                                $200,000
                            </span>
                    <span class="discount">
                                -20%
                            </span>
                </h2>
                <h3>
                    15pts
                </h3>
                <a class="waves-effect waves-light btn"><img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
            </div>
            <div class="col l3 product">
                <div class="divImg">
                    <div>
                        <img class="align-center" src="{{asset('img/productos/4.png')}}" alt="">
                    </div>
                </div>
                <h1>
                    Halo 4
                </h1>
                <h2>
                            <span class="before">
                                $250,000
                            </span>
                    <span class="value">
                                $200,000
                            </span>
                    <span class="discount">
                                -20%
                            </span>
                </h2>
                <h3>
                    15pts
                </h3>
                <a class="waves-effect waves-light btn"><img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
            </div>
            <div class="col l3 product">
                <div class="divImg">
                    <div>
                        <img class="align-center" src="{{asset('img/productos/5.png')}}" alt="">
                    </div>
                </div>
                <h1>
                    Batlefield Hardline
                </h1>
                <h2>
                            <span class="before">
                                $250,000
                            </span>
                    <span class="value">
                                $200,000
                            </span>
                    <span class="discount">
                                -20%
                            </span>
                </h2>
                <h3>
                    15pts
                </h3>
                <a class="waves-effect waves-light btn"><img src="{{asset('img/productos/icon_car.png')}}" alt="">Agregar</a>
            </div>
        @endfor
    </div>
    <ul class="pagination">
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        <li class="active"><a href="#!">1</a></li>
        <li class="waves-effect"><a href="#!">2</a></li>
        <li class="waves-effect"><a href="#!">3</a></li>
        <li class="waves-effect"><a href="#!">4</a></li>
        <li class="waves-effect"><a href="#!">5</a></li>
        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
</div>