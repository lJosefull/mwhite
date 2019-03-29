<div class="menuAccount">
    <img src="{{asset('img/cuenta/gif_big.gif')}}" alt="">
    <h1>
        {{$cliente->name}} {{$cliente->lastName}}
    </h1>
    <h2>
        {{$cliente->email}}
    </h2>
    <a href="{{Route('account')}}" id="myAccount">
        <h3>
            Mi cuenta
        </h3>
    </a>
    <a href="{{Route('carShop')}}" id="myCarSHop">
        <h3>
            carrito de compras
        </h3>
    </a>
    <a href="{{Route('FollowPedid')}}" id="followCar">
        <h3>
            Seguir mi pedido
        </h3>
    </a>
    <a href="{{Route('myPoints')}}" id="myPoints">
        <h3>
            Mis puntos
        </h3>
    </a>
    <a href="{{ url("/Logout") }}">
        <h3>
            Cerrar sesión
        </h3>
    </a>
</div>