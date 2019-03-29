@extends('template.layout')
@section('title', 'Cuenta')
@section('style')
    <style>
        #myPoints h3
        {
            color: #FFD000;
            font-weight: 600;
            border-right: 3px solid #FFD000;
            margin: 6% 0%;
            padding: 6% 0%;
        }

        @media screen and (max-width: 600px){
            #myPoints h3
            {
                border-right: none;
                padding: 0% 0%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row rowAccount">
        <div class="col s12 m2 l2 menu">
            @component('account.menu',[
                'cliente' => $cliente
            ])
            @endcomponent
        </div>
        <div class="col s12 m10 l10">
            @component('account.myPoints',[
             'cliente' => $cliente
            ])
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
@endsection