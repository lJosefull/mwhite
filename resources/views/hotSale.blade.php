@extends('template.layout')
@section('title', 'Hot Sale')
@section('style')
    <link rel="stylesheet" href="{{url('/css/jquery-ui.css')}}">
@endsection

@section('content')
    @component('components.hotSale.banner',[
        'imagen' => $imagenes[10]->img
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