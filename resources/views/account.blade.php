@extends('template.layout')
@section('title', 'Cuenta')
@section('style')
    <style>
        #myAccount h3
        {
            color: #FFD000;
            font-weight: 600;
            border-right: 3px solid #FFD000;
            margin: 6% 0%;
            padding: 6% 0%;
        }

        @media screen and (max-width: 600px){
            #myAccount h3
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
            @component('account.account',[
                'cliente' => $cliente,
                'addreses' => $addreses,
                'pedidos' => $pedidos,
                'paises' => $paises,
                'distritos' => $distritos,
                'ciudades' => $ciudades,
                'distritosAddress' => $distritosAddress
            ])
            @endcomponent
        </div>
    </div>
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
        $("#countryModInfo").change(function(){
            var deparment= $(this).val();
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url: "{{url('Deparment')}}",
                data:{id:deparment,action:'deparment'},
                success:function(datos){
                    $('.opciones_d .opcioned').remove();
                    $.each(datos, function(index, d) {
                        $('.opciones_d').append('<option class="opcioned" value="'+d.DisCodigo+'">'+d.DisNombre+'</option> ');
                    });
                }
            });
        });

        $("#deparmentModInfo").change(function(){
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
        $('.submitModalAccountInfo').click(function () {
            $('#modalAccountInfoForm').submit();
        });
        $("#modalAccountInfoForm").on('submit', function (e) {
            e.preventDefault();
            validacionDatosUpdateInfo();

            if($.trim($("#nameModInfo").val()) == "" || $.trim($("#lastnameModInfo").val()) == "" ||
                $.trim($("#emailModInfo").val()) == "" || $.trim($("#bornModInfo").val()) == "" || $.trim($("#idModInfo").val()) == "" ||
                $.trim($("#addressModInfo").val()) == "" || $.trim($("#countryModInfo").val()) == "" || $.trim($("#deparmentModInfo").val()) == "" ||
                $.trim($("#cityModInfo").val()) == "" || $.trim($("#townModInfo").val()) == "" || $.trim($("#cellphoneModInfo").val()) == "" ||
                $.trim($("#phoneModInfo").val()) == "")
            {
                return false;
            }

            campo =  $('#emailModInfo').val();

            emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
            if (emailRegex.test(campo))
            {
                $('#emailModInfo').removeClass('error');
            }
            else
            {
                $('#emailModInfo').addClass('error');
                swal({
                    text: "Escriba un correo electrónico valido",
                    icon: imageURL,
                    button: "OK!",
                });
                return false;
            }

            // //var data = $(this).serialize();
            // var data = new FormData(this.form);
            // console.log(data);
            // $.ajax({
            //     url: "{{url('UpdateInfo')}}",
            //     method: "POST",
            //     data: data,
            //     success: function (data) {

            //         if ($.trim(data) == "1") {
            //             location.reload();
            //         }else if ($.trim(data) == "2") {
            //             swal({
            //                 title: "",
            //                 text: "¡Ese correo electronico ya existe, no se ha actualizado!",
            //                 icon: imageURL,
            //             });
            //             setTimeout(function () {
            //                 location.reload();
            //             },2500)
            //         }else {
            //             swal({
            //                 text: "Error, hubo problemas" + data,
            //                 icon: "warning",
            //                 button: "OK!",
            //             });
            //         }

            //     }

            // });

            $.ajax({
             url:"{{url('UpdateInfo')}}",
             method:"POST",
             data:new FormData(this),
             dataType:'JSON',
             contentType: false,
             cache: false,
             processData: false,
             success:function(data)
             {
              
                console.log(data);

                if ($.trim(data) == "1") {
                    location.reload();
                }else if ($.trim(data) == "2") {
                    swal({
                        title: "",
                        text: "¡Ese correo electronico ya existe, no se ha actualizado!",
                        icon: imageURL,
                    });
                    setTimeout(function () {
                        location.reload();
                    },2500)
                }else {
                    swal({
                        text: "Error, hubo problemas" + data,
                        icon: "warning",
                        button: "OK!",
                    });
                }
           

             }
            });

        });

        function validacionDatosUpdateInfo()
        {
            $('#nameModInfo').removeClass('error');
            $('#lastnameModInfo').removeClass('error');
            $('#emailModInfo').removeClass('error');
            $('#bornModInfo').removeClass('error');
            $('#idModInfo').removeClass('error');
            $('#addressModInfo').removeClass('error');
            $('#countryModInfo').removeClass('error');
            $('#deparmentModInfo').removeClass('error');
            $('#cityModInfo').removeClass('error');
            $('#townModInfo').removeClass('error');
            $('#cellphoneModInfo').removeClass('error');
            $('#phoneModInfo').removeClass('error');

            if( $.trim($("#nameModInfo").val()) == "" ) {
                $('#nameModInfo').addClass('error');
            }
            if( $.trim($("#lastnameModInfo").val()) == "" ) {
                $('#lastnameModInfo').addClass('error');
            }
            if( $.trim($("#emailModInfo").val()) == "" ) {
                $('#emailModInfo').addClass('error');
            }
            if( $.trim($("#bornModInfo").val()) == "" ) {
                $('#bornModInfo').addClass('error');
            }
            if( $.trim($("#idModInfo").val()) == "" ) {
                $('#idModInfo').addClass('error');
            }
            if( $.trim($("#addressModInfo").val()) == "" ) {
                $('#addressModInfo').addClass('error');
            }
            if( $.trim($("#countryModInfo").val()) == "" ) {
                $('#countryModInfo').addClass('error');
            }
            if( $.trim($("#deparmentModInfo").val()) == "" ) {
                $('#deparmentModInfo').addClass('error');
            }
            if( $.trim($("#cityModInfo").val()) == "" ) {
                $('#cityModInfo').addClass('error');
            }
            if( $.trim($("#townModInfo").val()) == "" ) {
                $('#townModInfo').addClass('error');
            }
            if( $.trim($("#cellphoneModInfo").val()) == "" ) {
                $('#cellphoneModInfo').addClass('error');
            }
            if( $.trim($("#phoneModInfo").val()) == "" ) {
                $('#phoneModInfo').addClass('error');
            }
        }
    </script>
    <script>
        $('.editAddress').click(function () {
            var id = this.id;
            editAddres(id)
        });

        function editAddres(id)
        {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url:"{{url('editAddres')}}",
                data:{id:id,action:'editAddres'},
                success:function(datos){
                    $('#idEditAddressInfo').val(id);
                    $('#nameEditAddressInfo').val(datos.name);
                    $('#descripcionEditAddressInfo').val(datos.descripcion);
                    $('#addressEditAddressInfo').val(datos.address);
                    $('#phoneEditAddressInfo').val(datos.phone);
                    var idDeparment = datos.deparment;
                    $('#deparmentEditAddressInfo').val(idDeparment);
                    var idCity = datos.city;
                    changeCityAddressEnvio(idDeparment,idCity);
                }
            });
        }

        function changeCityAddressEnvio(deparment,city)
        {
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url:"{{url('City')}}",
                data:{id:deparment,action:'city'},
                success:function(datos){
                    $('.opciones_c_editAddressInfo .opcionec_editAddressInfo').remove();
                    $.each(datos, function(index, c) {
                        $('.opciones_c_editAddressInfo').append('<option class="opcionec_editAddressInfo" value="'+c.CiuCodigo+'">'+c.CiuNombre+'</option> ');
                    });
                    $('#cityEditAddressInfo').val(city);
                    $('#modalEditAddressInfo').modal('open')
                }
            });
        }

        $('.deleteAddress').click(function () {
            var id = this.id;
            deletedAddres(id);
        });

        function deletedAddres(id){
            swal({
                title: "¿Seguro de hacer esto?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{url('deletedAddres')}}",
                            method: "POST",
                            data: {id:id,action:'deletedAddres'},
                            success: function (data) {
                                if ($.trim(data) == "1") {
                                    swal({
                                        title: "",
                                        text: "¡Eliminada con exito!",
                                        icon: imageURL,
                                    });
                                    setTimeout(function () {
                                        location.reload();
                                    },2000)
                                } else {
                                    swal({
                                        text: "error, hubo problemas",
                                        icon: imageURL,
                                        button: "OK!",
                                    });
                                }

                            }

                        });
                    } else {
                        return false;
                    }
            });
        }

        $("#deparmentAddAddressInfo").change(function(){
            var city= $(this).val();
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url:"{{url('City')}}",
                data:{id:city,action:'city'},
                success:function(datos){
                    $('.opciones_c_addAddressInfo .opcionec_addAddressInfo').remove();
                    $.each(datos, function(index, c) {
                        $('.opciones_c_addAddressInfo').append('<option class="opcionec_addAddressInfo" value="'+c.CiuCodigo+'">'+c.CiuNombre+'</option> ');
                    });
                }
            });
        });

        $("#deparmentEditAddressInfo").change(function(){
            var city= $(this).val();
            $.ajax({
                async:true,
                type: "POST",
                dataType: "json",
                url:"{{url('City')}}",
                data:{id:city,action:'city'},
                success:function(datos){
                    $('.opciones_c_editAddressInfo .opcionec_editAddressInfo ').remove();
                    $.each(datos, function(index, c) {
                        $('.opciones_c_editAddressInfo .opcionec_editAddressInfo ').append('<option class="editAddressInfo " value="'+c.CiuCodigo+'">'+c.CiuNombre+'</option> ');
                    });
                }
            });
        });
    </script>
    <script>
        $('.submitmModalAddAddressInfo').click(function () {
            $('#modalAddAddressInfoForm').submit();
        });

        $("#modalAddAddressInfoForm").on('submit', function (e) {
            e.preventDefault();
            validacionDatosNewAddress();

            if($.trim($("#nameAddAddressInfo").val()) == "" || $.trim($("#descripcionAddAddressInfo").val()) == "" ||
                $.trim($("#addressAddAddressInfo").val()) == "" || $.trim($("#deparmentAddAddressInfo").val()) == "" ||
                $.trim($("#cityAddAddressInfo").val()) == "" || $.trim($("#phoneAddAddressInfo").val()) == "")
            {
                return false;
            }

            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                url: "{{url('newAddress')}}",
                method: "POST",
                data: data,
                success: function (data) {

                    if ($.trim(data) == "1") {
                        swal({
                            title: "",
                            text: "¡Agregada con exito!",
                            icon: imageURL,
                        });
                        setTimeout(function () {
                            location.reload();
                        },2500)
                    } else {
                        swal({
                            text: "error, hubo problemas",
                            icon: imageURL,
                            button: "OK!",
                        });
                    }

                }

            });

        });

        function validacionDatosNewAddress()
        {
            $('#nameAddAddressInfo').removeClass('error');
            $('#descripcionAddAddressInfo').removeClass('error');
            $('#addressAddAddressInfo').removeClass('error');
            $('#deparmentAddAddressInfo').removeClass('error');
            $('#cityAddAddressInfo').removeClass('error');
            $('#phoneAddAddressInfo').removeClass('error');

            if( $.trim($("#nameAddAddressInfo").val()) == "" ) {
                $('#nameAddAddressInfo').addClass('error');
            }
            if( $.trim($("#descripcionAddAddressInfo").val()) == "" ) {
                $('#descripcionAddAddressInfo').addClass('error');
            }
            if( $.trim($("#addressAddAddressInfo").val()) == "" ) {
                $('#addressAddAddressInfo').addClass('error');
            }
            if( $.trim($("#deparmentAddAddressInfo").val()) == "" ) {
                $('#deparmentAddAddressInfo').addClass('error');
            }
            if( $.trim($("#cityAddAddressInfo").val()) == "" ) {
                $('#cityAddAddressInfo').addClass('error');
            }
            if( $.trim($("#phoneAddAddressInfo").val()) == "" ) {
                $('#phoneAddAddressInfo').addClass('error');
            }
        }
    </script>
    <script>
        $('.submitmModalEditAddressInfo').click(function () {
            $('#modalEditAddressInfoForm').submit();
        });

        $("#modalEditAddressInfoForm").on('submit', function (e) {
            e.preventDefault();
            validacionDatosEditAddresEnv();

            if($.trim($("#idEditAddressInfo").val()) == "" || $.trim($("#nameEditAddressInfo").val()) == "" ||
                $.trim($("#descripcionEditAddressInfo").val()) == "" || $.trim($("#addressEditAddressInfo").val()) == "" ||
                $.trim($("#deparmentEditAddressInfo").val()) == "" || $.trim($("#cityEditAddressInfo").val()) == "" ||
                $.trim($("#phoneEditAddressInfo").val()) == "")
            {
                return false;
            }

            var data = $(this).serialize();
            console.log(data);
            $.ajax({
                url: "{{url('editAddresEnv')}}",
                method: "POST",
                data: data,
                success: function (data) {

                    if ($.trim(data) == "1") {
                        swal({
                            title: "",
                            text: "¡Editado con exito!",
                            icon: imageURL,
                        });
                        setTimeout(function () {
                            location.reload();
                        },2500)
                    } else {
                        swal({
                            text: "error, hubo problemas",
                            icon: imageURL,
                            button: "OK!",
                        });
                    }

                }

            });

        });

        function validacionDatosEditAddresEnv()
        {
            $('#idEditAddressInfo').removeClass('error');
            $('#nameEditAddressInfo').removeClass('error');
            $('#descripcionEditAddressInfo').removeClass('error');
            $('#addressEditAddressInfo').removeClass('error');
            $('#deparmentEditAddressInfo').removeClass('error');
            $('#cityEditAddressInfo').removeClass('error');
            $('#phoneEditAddressInfo').removeClass('error');

            if( $.trim($("#idEditAddressInfo").val()) == "" ) {
                $('#idEditAddressInfo').addClass('error');
            }
            if( $.trim($("#nameEditAddressInfo").val()) == "" ) {
                $('#nameEditAddressInfo').addClass('error');
            }
            if( $.trim($("#descripcionEditAddressInfo").val()) == "" ) {
                $('#descripcionEditAddressInfo').addClass('error');
            }
            if( $.trim($("#addressEditAddressInfo").val()) == "" ) {
                $('#addressEditAddressInfo').addClass('error');
            }
            if( $.trim($("#deparmentEditAddressInfo").val()) == "" ) {
                $('#deparmentEditAddressInfo').addClass('error');
            }
            if( $.trim($("#cityEditAddressInfo").val()) == "" ) {
                $('#cityEditAddressInfo').addClass('error');
            }
            if( $.trim($("#phoneEditAddressInfo").val()) == "" ) {
                $('#phoneEditAddressInfo').addClass('error');
            }
        }
    </script>
@endsection