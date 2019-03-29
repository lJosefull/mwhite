@extends('template.layout')
@section('title', 'Contact')
@section('style')
@endsection

@section('content')
    @component('components.contact.banner',[
        'imagenes'=>$imagenes,
        'info'=>$info
    ])
    @endcomponent
    @component('components.contact.puntos',[
        'lugares'=>$lugares
    ])
    @endcomponent
@endsection

@section('script')
@endsection