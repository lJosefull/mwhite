<div class="row rowAccountDivs">
    <div class="col s12 m4 l4">
        <div class="container-div">
            <h1>
                Perfil
            </h1>
            <h2>
                Correo <br>
                {{$cliente->email}}
            </h2>
            <h2>
                Nombre<br>
                {{$cliente->name}}
            </h2>
            <h2>
                Apellido<br>
                {{$cliente->lastName}}
            </h2>
            <h2>
                Cédula<br>
                {{$cliente->identi}}
            </h2>
            <h2>
                Celular<br>
                {{$cliente->cellphone}}
            </h2>
            <a class="waves-effect waves-light btn modal-trigger" href="#modalAccountInfo">EDITAR PERFIL</a>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="container-div">
            <h1>
                Direcciones
            </h1>
            <div class="scrollAccount">
                @foreach($addreses as $key => $add)
                    <h2>
                        {{$add->name}}
                        <a id="{{$add->id}}" class="deleteAddress">
                            <img class="delete" src="{{asset('img/cuenta/delete.png')}}" alt="">
                        </a>
                        <a id="{{$add->id}}" class="editAddress">
                            <img src="{{asset('img/cuenta/edit.png')}}" alt="">
                        </a>
                        <br>
                        {{$add->address}} <br>
                        {{$add->descripcion}}
                    </h2>
                @endforeach
            </div>
            <a class="waves-effect waves-light btn modal-trigger" href="#modalAddAddressInfo">AGREGAR DIRECCIÓN</a>
        </div>
    </div>
    <div class="col s12 m4 l4">
        <div class="container-div">
            <h1>
                mis pedidos
            </h1>
            <div class="scrollAccount">
                @foreach($pedidos as $key => $ped)
                    @php
                        $reference_ped = explode("5b", $ped->referencia);
                        $addres_ped = \App\AddresCliente::find($ped->addres_id);
                    @endphp
                    <div class="row">
                        <div class="col s8">
                            <h2>
                                Order {{$reference_ped[0]}} <br>
                                {{$addres_ped->address}}<br>
                                {{$ped->fecha}}
                            </h2>
                        </div>
                        <div class="col s4">
                            <h3>
                                ${{str_replace(",", ".", number_format($ped->total))}}
                            </h3>
                            <a class="waves-effect waves-light btn" href="{{url('resumen/'.$ped->id)}}">VER MÁS</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="waves-effect waves-light btn" href="{{Route('listPedidos')}}">VER MIS PEDIDOS</a>
        </div>
    </div>
</div>

@component('account.modals',[
    'cliente' => $cliente,
    'paises' => $paises,
    'distritos' => $distritos,
    'ciudades' => $ciudades,
    'distritosAddress' => $distritosAddress
])
@endcomponent