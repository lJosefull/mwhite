@extends('template.layout')
@section('title', 'Seguir Pedido')
@section('style')
@endsection

@section('content')
    <div class="row rowAccount">
        <div class="col s12 m2 l2 menu">
            @component('account.menu',[
                'cliente' => $cliente
            ])
            @endcomponent
        </div>
        <div class="col s12 m2 l10">
            @component('account.resume',[
                'pedido' => $pedido,
                'productoPurchase' => $productoPurchase,
                'address' => $address,
                'deparment' => $deparment,
                'city' => $city
            ])
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
@endsection