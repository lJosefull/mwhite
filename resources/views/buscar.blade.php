@extends('template.layout')
@section('title', 'Buscar')
@section('style')
@endsection

@section('content')
    @component('components.hotSale.banner',[
        'imagen' => $imagenes[11]->img
    ])
    @endcomponent
    <div class="row rowHotSale">
        @component('components.hotSale.products',[
            'products' => $products
        ])
        @endcomponent
    </div>
@endsection

@section('script')
@endsection