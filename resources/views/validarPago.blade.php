<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Videojuegos Barranquilla</title>
    <!-- Bootstrap -->
    <link rel="shortcut icon" type="image/png" href="{{ asset("img/favicon-32x32.png") }}" sizes="32x32" />
    <link rel="shortcut icon" type="image/png" href="{{ asset("img/favicon-16x16.png") }}" sizes="16x16" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    function getQueryParam(param) {
        location.search.substr(1)
            .split("&")
            .some(function(item) { // returns first occurence and stops
                return item.split("=")[0] == param && (param = item.split("=")[1])
            })
        return param
    }
    $(document).ready(function() {
        //llave publica del comercio
        //Referencia de payco que viene por url
        var ref_payco = getQueryParam('ref_payco');
        //Url Rest Metodo get, se pasa la llave y la ref_payco como paremetro
        var urlapp = "https://secure.epayco.co/validation/v1/reference/" + ref_payco;
        $.get(urlapp, function(response) {
            if (response.success) {
                if (response.data.x_cod_response == 1) {
                    //Codigo personalizado
                    validarPagoEpayco(1);
                }
                //Transaccion Rechazada
                if (response.data.x_cod_response == 2) {
                    validarPagoEpayco(2);
                }
                //Transaccion Pendiente
                if (response.data.x_cod_response == 3) {
                    validarPagoEpayco(3);
                }
                //Transaccion Fallida
                if (response.data.x_cod_response == 4) {
                    validarPagoEpayco(4);
                }
            } else {
                alert("Error consultando la información");
            }


        });
    });

    function validarPagoEpayco(value) {
        $.ajax({
            url: "validarPagoEpayco",
            method: "POST",
            data: {value:value},
            success: function (data) {
                if ($.trim(data) == "1") {
                    location.href = '{{url('/')}}';
                }else {
                    swal({
                        text: "Error, hubo problemas",
                        icon: "warning",
                        button: "OK!",
                    });
                }
            }
        });
    }

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
</body>

</html>