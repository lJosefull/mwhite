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
            @component('account.address',[
                'addresses'=>$addresses
            ])
            @endcomponent
        </div>
    </div>
@endsection

@section('script')
    <script>
        function choice(i)
        {
            $('.divAddress').css('outline','1px solid rgba(205,208,0,0.5)');
            $('#divAddress'+i).css('outline','2px solid #FFD000');
        }

        $(".continuedBuy").on('click',function () {
            if(!$("input:radio[name=addressSelect]").is(":checked"))
            {
                swal({
                    title: "",
                    text: "¡Debe escoger alguna dirección!",
                    icon: imageURL,
                });
                return false;
            }
            $("#selectAddress").submit();
        });

        $("#selectAddress").on('submit', function (e) {
            e.preventDefault();

            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                url: "{{url('selectAddress')}}",
                method: "POST",
                data: data,
                success: function (data) {

                    if ($.trim(data) == "1") {
                        location.href = "{{url('carrito')}}";
                    } else {
                        swal({
                            text: "Error, hubo problemas",
                            icon: imageURL,
                            button: "OK!",
                        });
                    }

                }

            });

        });
    </script>
@endsection