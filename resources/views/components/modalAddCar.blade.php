<div id="modalAddCar" class="modal" style="background-image: url({{asset($imagenes[9]->img)}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <div class="row">
        <div class="col s12">
            <img class="diamond align-center" src="{{asset('img/addCar/diamond.png')}}" alt="">
        </div>
        <div class="col s12">
            <img class="text align-center" src="{{asset('img/addCar/texto.png')}}" alt="">
        </div>
        <div class="col s12 m6 l6 align-center">
            @if(session()->has('id'))
                <a class="waves-effect waves-light btn btnTwo" href="{{Route('carShop')}}">pagar</a>
            @else
                <a class="waves-effect waves-light btn btnTwo modal-close modal-trigger" href="#modalLogin">pagar</a>
            @endif
        </div>
        <div class="col s12 m6 l6 align-center">
            <a class="waves-effect waves-light btn modal-close">seguir comprando</a>
        </div>
    </div>
</div>