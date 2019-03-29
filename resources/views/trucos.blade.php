@extends('template.layout')
@section('title', 'Trucos')
@section('style')
@endsection

@section('content')
    @component('components.trucos.banner',[
       'imagenes' => $imagenes
    ])
    @endcomponent
    @component('components.trucos.list',[
       'trucos'=>$trucos
    ])
    @endcomponent
@endsection

@section('script')
@endsection