@extends('template.layout')
@section('title', 'Epayco')
@section('style')
    <style>
        .contentImg{
            text-align: center;
            padding: 10% 0%;
            background-image: url({{asset('img/about/background.png')}});
            margin-bottom: 0px !important;
            background-repeat: no-repeat;
            background-position: top center;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content')
    <div class="row contentImg">
        <div class="col s12">
            <img src="{{asset('img/epayco.png')}}" alt="">
        </div>
    </div>
@endsection

@section('script')
    <script>
        var handler = ePayco.checkout.configure({
            key: '97d30e58e6cd8ce0dd9f462ee7d922ff',
            test: false
        });
        var refBono = '{{$pedido->referencia}}';
        var totalBono = '{{$pedido->total}}';
        var nameBono = '{{$cliente->name}}' + ' ' + '{{$cliente->lastName}}';
        var mobile = '{{$cliente->cellphone}}';
        var cedula = '{{$cliente->identi}}';
        var email = '{{$cliente->email}}';
        payEpayco(refBono,totalBono,nameBono);
        function payEpayco(refBono,totalBono,nameBono)
        {
            var data={
                //Parametros compra (obligatorio)
                name: "VideoJuegos Barranquilla",
                description: "Compra en VideoJuegos Barranquilla",
                invoice: refBono,
                currency: "cop",
                amount: totalBono,
                tax_base: "0",
                tax: "0",
                country: "co",
                lang: "en",

                //Onpage="false" - Standard="true"
                external: "false",

                name_billing: nameBono,
                email_billing: email,
                mobilephone_billing: mobile,
                number_doc_billing: cedula,

                confirmation: "{{url('validarPago')}}",
                response: "{{url('validarPago')}}",
            };
            handler.open(data);
        }
    </script>
@endsection