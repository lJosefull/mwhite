@extends('template.layout')
@section('title', 'Registro')
@section('style')
    <style>
        .dropdown-content li > a, .dropdown-content li > span{
            color: #FFD000 !important;
        }
    </style>
@endsection

@section('content')
    @component('components.register.banner',[
        'imagenes'=>$imagenes,
        'paises'=>$paises,
        'info'=>$info
    ])
    @endcomponent
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                selectMonths: true, // Creates a dropdown to control month
                yearRange: 80, // Creates a dropdown of 15 years to control year,
                format: 'yyyy/mm/dd',
                i18n: {
                    clear: 'Limpiar',
                    cancel: 'Cancelar',
                    done: 'Guardar',
                    labelMonthNext: 'Próximo Mes',
                    labelMonthPrev: 'Mes Anterior',
                    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                    weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
                },
                closeOnSelect: true // Close upon selecting a date,
            });
        });
    </script>

    <script>
        var imageURL = '{{url('img/logo_small.png')}}';
        $('.submitRegister').click(function () {
            $('#registro').submit();
        });
        $("#registro").on('submit', function (e) {
            e.preventDefault();
            validacionDatosRegistro();

            if($.trim($("#nameRe").val()) == "" || $.trim($("#lastname").val()) == "" ||
                $.trim($("#password").val()) == "" || $.trim($("#passRe").val()) == "" ||
                $.trim($("#emailRe").val()) == "" || $.trim($("#born").val()) == "" || $.trim($("#id").val()) == "" ||
                $.trim($("#country").val()) == "" || $.trim($("#deparment").val()) == "" || $.trim($("#city").val()) == "" ||
                $.trim($("#address").val()) == "" || $.trim($("#town").val()) == "" || $.trim($("#cellphone").val()) == "" ||
                $.trim($("#phone").val()) == "")
            {
                return false;
            }

            var str = $.trim($("#password").val());
            var n = str.length;

            if(n<=5) {
                $('#password').addClass('error');
                swal({
                    text: "La contraseña debe tener minimo 6 caracteres",
                    icon: imageURL,
                    button: "OK!",
                });
                return false;
            }
            else
            {
                $('#password').removeClass('error');
            }

            if($.trim($("#password").val()) != $.trim($("#passRe").val())){
                $('#password').addClass('error');
                $('#passRe').addClass('error');
                swal({
                    text: "Las contraseñas no coinciden",
                    icon: imageURL,
                    button: "OK!",
                });
                return false;
            }else{
                $('#password').removeClass('error');
                $('#passRe').removeClass('error');
            }

            if($("input[name='termsValidate']").is(':checked') === false){
                swal({
                    text: "Debes aceptar los terminos y condiciones",
                    icon: imageURL,
                    button: "OK!",
                });
                return false
            }

            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                url: "{{url('Registro')}}",
                method: "POST",
                data: data,
                success: function (data) {

                    if ($.trim(data) == "1") {
                        swal({
                            text: "Gracias por registrarse \n ya puede iniciar sesión",
                            icon: "success",
                            button: "OK!",
                        });
                        $("#registro")[0].reset();
                        $("#modalLogin").modal("open");
                    }else if($.trim(data) == "2"){
                        $('#emailRe').addClass('error');
                        swal({
                            text: "Ese correo electrónico ya se encuentra registrado",
                            icon: imageURL,
                            button: "OK!",
                        });
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


        function validacionDatosRegistro()
        {
            $('#nameRe').removeClass('error');
            $('#lastname').removeClass('error');
            $('#password').removeClass('error');
            $('#passRe').removeClass('error');
            $('#emailRe').removeClass('error');
            $('#born').removeClass('error');
            $('#id').removeClass('error');
            $('#country').removeClass('error');
            $('#deparment').removeClass('error');
            $('#city').removeClass('error');
            $('#address').removeClass('error');
            $('#town').removeClass('error');
            $('#cellphone').removeClass('error');
            $('#phone').removeClass('error');

            if( $.trim($("#nameRe").val()) == "" ) {
                $('#nameRe').addClass('error');
            }
            if( $.trim($("#lastname").val()) == "" ) {
                $('#lastname').addClass('error');
            }
            if( $.trim($("#password").val()) == "" ) {
                $('#password').addClass('error');
            }
            if( $.trim($("#passRe").val()) == "" ) {
                $('#passRe').addClass('error');
            }
            if( $.trim($("#emailRe").val()) == "" ) {
                $('#emailRe').addClass('error');
            }
            if( $.trim($("#born").val()) == "" ) {
                $('#born').addClass('error');
            }
            if( $.trim($("#id").val()) == "" ) {
                $('#id').addClass('error');
            }
            if( $.trim($("#country").val()) == "" ) {
                $('#country').addClass('error');
            }
            if( $.trim($("#deparment").val()) == "" ) {
                $('#deparment').addClass('error');
            }
            if( $.trim($("#city").val()) == "" ) {
                $('#city').addClass('error');
            }
            if( $.trim($("#address").val()) == "" ) {
                $('#address').addClass('error');
            }
            if( $.trim($("#town").val()) == "" ) {
                $('#town').addClass('error');
            }
            if( $.trim($("#cellphone").val()) == "" ) {
                $('#cellphone').addClass('error');
            }
            if( $.trim($("#phone").val()) == "" ) {
                $('#phone').addClass('error');
            }
        }

        $("#country").change(function(){
            var deparment= $(this).val();
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url:"{{url('Deparment')}}",
                data:{id:deparment,action:'deparment'},
                success:function(datos){
                    $('.opciones_d .opcioned').remove();
                    $.each(datos, function(index, d) {
                        $('.opciones_d').append('<option class="opcioned" value="'+d.DisCodigo+'">'+d.DisNombre+'</option> ');
                    });
                }
            });
        });

        $("#deparment").change(function(){
            var city= $(this).val();
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url:"{{url('City')}}",
                data:{id:city,action:'city'},
                success:function(datos){
                    $('.opciones_c .opcionec').remove();
                    $.each(datos, function(index, c) {
                        $('.opciones_c').append('<option class="opcionec" value="'+c.CiuCodigo+'">'+c.CiuNombre+'</option> ');
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#nameRe').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#emailRe').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#lastname').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#password').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#passRe').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#born').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#id').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#address').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#town').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#cellphone').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });
            $('#phone').keypress(function(e) {
                if(e.which == 13) {
                    $('#registro').submit();
                }
            });

            $('#country').change(function(e) {
                $('#registro').submit();
            });

            $('#deparment').change(function(e) {
                $('#registro').submit();
            });
            $('#city').change(function(e) {
                $('#registro').submit();
            });
        });
    </script>
@endsection