<div class="row rowAddress">
    <form action="" id="selectAddress">
        @foreach($addresses as $key => $add)
            <div class="col s12 m9 l5">
                <div class="divAddress" id="divAddress{{$key}}">
                    <p>
                        <label>
                            <input type="radio" class="with-gap" name="addressSelect" value="{{$add->adId}}"/>
                            <span onclick="choice({{$key}});">&ensp;</span>
                        </label>
                    </p>
                    <h6>Dirección: {{$add->name}}</h6>
                    <h5>Descripcion: {{$add->descripcion}}</h5>
                    <h5>Dirección: {{$add->address}}</h5>
                    <h5>Ciudad: {{$add->CiuNombre}}</h5>
                    <h5>Departamento: {{$add->DisNombre}}</h5>
                    <h5>Teléfono: {{$add->phone}}</h5> <br>
                </div>
            </div>
        @endforeach
    </form>
    <div class="col s12">
        <a class="waves-effect waves-light btn continuedBuy">Continuar con el pedido</a>
    </div>
</div>