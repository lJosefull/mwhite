@extends('template.layout')
@section('title', 'Cuenta')
@section('style')
    <style>
        #myCarSHop h3
        {
            color: #FFD000;
            font-weight: 600;
            border-right: 3px solid #FFD000;
            margin: 6% 0%;
            padding: 6% 0%;
        }

        @media screen and (max-width: 600px){
            #myCarSHop h3
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
            @component('account.carshop',[
                'valorEnvio' => $valorEnvio
            ])
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script>
        function lessMore(id,id_product,envio)
        {
            $(".productCant"+id).val(parseInt($.trim($(".productCant"+id).val())) - 1);
            var cant = $.trim($(".productCant"+id).val());

            $.ajax({
                url: "{{url('lessMoreOrder')}}",
                method: "POST",
                data: {id:id,id_product:id_product,action:'lessMoreOrder'},
                success: function (data) {
                    if(cant == 0){
                        location.reload();
                    }
                    if($.trim(data) == 0){
                        swal({
                            text: "Error, hubo problemas ¡intentelo nuevamente!",
                            icon: "warning",
                            button: "OK!",
                        });
                    }else if($.isEmptyObject(data)){
                        swal({
                            text: "Error, hubo problemas ¡intentelo nuevamente!",
                            icon: "warning",
                            button: "OK!",
                        });
                    }else{
                        $.each(data, function(index, c) {
                            var suma=0,total=0;
                            var precio = "" + c.precio;
                            precio = parseInt(precio.replace(".", ""));
                            if(c.descuento > 0){
                                suma = (precio - (precio * c.descuento / 100)) * cant;
                            }else{
                                suma = precio * cant;
                            }

                            total = new Intl.NumberFormat().format(suma);
                            total = total.replace(/,/g , ".");
                            $(".priceTotal"+id).html("$"+ total );
                        });
                        subtotal(envio);
                    }
                }

            });
        }

        function plusMore(id,id_product,envio)
        {
            $(".productCant"+id).val(parseInt($.trim($(".productCant"+id).val())) + 1);
            var cant = $.trim($(".productCant"+id).val());

            $.ajax({
                url: "{{url('plusMoreOrder')}}",
                method: "POST",
                data: {id:id,id_product:id_product,action:'plusMoreOrder'},
                success: function (data) {

                    if($.trim(data) == 0){
                        swal({
                            text: "Error, hubo problemas ¡intentelo nuevamente!",
                            icon: "warning",
                            button: "OK!",
                        });
                    }else if($.isEmptyObject(data)){
                        swal({
                            text: "Error, hubo problemas ¡intentelo nuevamente!",
                            icon: "warning",
                            button: "OK!",
                        });
                    }else{
                        $.each(data, function(index, c) {
                            var suma=0,total=0;
                            var precio = "" + c.precio;
                            precio = parseInt(precio.replace(".", ""));
                            if(c.descuento > 0){
                                suma = (precio - (precio * c.descuento / 100)) * cant;
                            }else{
                                suma = precio * cant;
                            }

                            total = new Intl.NumberFormat().format(suma);
                            total = total.replace(/,/g , ".");
                            $(".priceTotal"+id).html("$"+ total );
                        });
                        subtotal(envio);
                    }
                }

            });
        }

        function subtotal(envio)
        {
            $.ajax({
                url: "{{url('subtotalpay')}}",
                method: "POST",
                data: {id:envio,action:"subtotalpay"},
                success: function (data) {
                    if ($.trim(data) > 0){
                        var subtotal = data;
                        subtotal = new Intl.NumberFormat().format(subtotal);
                        subtotal = subtotal.replace(/,/g , ".");
                        $('.subtotal').html('$'+subtotal);
                        var total = parseInt(data) + envio;
                        total = new Intl.NumberFormat().format(total);
                        total = total.replace(/,/g , ".");
                        $('.total').html('$'+total);
                    }else if($.trim(data) == 0){
                        location.reload();
                    } else {
                        swal({
                            text: "Error, hubo problemas",
                            icon: imageURL,
                            button: "OK!",
                        });
                    }
                }
            });
        }
    </script>
    <script>
        $('.goPedido').on('click',function () {
            var id=1;
            $.ajax({
                url: "{{url('goPedido')}}",
                method: "POST",
                data: {id:id,action:"goPedido"},
                success: function (data) {
                    if ($.trim(data) == "complet"){
                        location.href = "{{url('epayco')}}";
                    } else {
                        swal({
                            text: "No tenemos la cantidad pedida de " + data,
                            icon: imageURL,
                            button: "OK!",
                        });
                    }
                }
            });
        });

        $('.notPedido').on('click',function () {
            swal({
                text: "No tiene productos para comprar",
                icon: imageURL,
                button: "OK!",
            });
        });


    </script>
@endsection