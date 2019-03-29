@extends('template.layout')
@section('title', 'Buscar Trucos')
@section('style')
@endsection

@section('content')
    @component('components.trucos.banner',[
       'imagenes' => $imagenes
    ])
    @endcomponent
    @component('components.trucos.buscar',[
       'trucos' => $trucos,
       'name' => $name
    ])
    @endcomponent
@endsection

@section('script')
@endsection