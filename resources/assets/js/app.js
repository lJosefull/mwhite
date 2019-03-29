'use strict';
var widthScreen = $(window).width();

var contLogin,campo,emailRegex;

var handler = ePayco.checkout.configure({
    key: 'c2744bb9cd234fd777bb285dfc73c4530e801009',
    test: true
});

$(document).ready(function(){
    function cargar(){
        setTimeout(function () {
            $('#loading').css('display','none');
            $('#content').css('visibility','initial');
            $('body').css('overflow-x','visible');
            $('body').css('overflow-y','visible');
        },3000);
    }
    window.onload = cargar();
    $('.modal').modal();
    $('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({
        hover: true
    });
    $('.tabs').tabs();
    $('select').formSelect();
});

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

$('.newsletter').on('click',function () {
    $('#formNewsletter').submit();
});

$("#formNewsletter").on('submit', function (e) {
    e.preventDefault();
    campo =  $('#emailNewsletter').val();
    if(campo == ""){
        swal({
            text: "Debe digitar un correo electrónico",
            icon: imageURL,
            button: "OK",
        });
    }
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo)) {
        //$('#emailNewsletter').css('color','inherit');
    } else {
        swal({
            text: "Debe digitar un correo electrónico valido",
            icon: imageURL,
            button: "OK",
        });
        document.getElementById("emailNewsletter").focus();
        return false;
    }

    var data = $(this).serialize();
    $.ajax({
        url: https + "newsletter",
        method: "POST",
        data: data,
        success: function (data) {
            if ($.trim(data) == "1") {
                swal({
                    text: "Gracias por suministrar tu correo",
                    icon: "success",
                    button: "OK!",
                });
                $("#formNewsletter")[0].reset();

            }else if($.trim(data) == "2"){
                swal({
                    text: "Este correo electrónico ya \n se encuentra registrado",
                    icon: imageURL,
                    button: "OK",
                });
            }else {
                swal({
                    text: "Error, hubo problemas",
                    icon: imageURL,
                    button: "OK!",
                });
            }

        }

    });

});

$('.btnFormContacto').on('click',function () {
    $('#formContacto').submit();
});

$("#formContacto").on('submit', function (e) {
    e.preventDefault();
    $('#nameCon').removeClass('error');
    $('#emailCon').removeClass('error');
    $('#phoneCon').removeClass('error');
    $('#asunCon').removeClass('error');
    $('#mensajeCon').removeClass('error');

    contLogin = 1;
    if ( $.trim($("#nameCon").val()) == "" ) {
        contLogin = 0;
        $('#nameCon').addClass('error');
    }

    if ( $.trim($("#emailCon").val()) == "" ) {
        contLogin = 0;
        $('#emailCon').addClass('error');
    }

    if ( $.trim($("#phoneCon").val()) == "" ) {
        contLogin = 0;
        $('#phoneCon').addClass('error');
    }

    if ( $.trim($("#asunCon").val()) == "" ) {
        contLogin = 0;
        $('#asunCon').addClass('error');
    }

    if ( $.trim($("#mensajeCon").val()) == "" ) {
        contLogin = 0;
        $('#mensajeCon').addClass('error');
    }

    if(contLogin == 0)
    {
        return false;
    }

    campo  = $("#emailCon").val();
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo)) {
        $('#emailCon').removeClass('error');
    } else {
        $('#emailCon').addClass('error');
        swal({
            text: "Debe digitar un correo electrónico valido",
            icon: imageURL,
            button: "OK",
        });
        document.getElementById("emailCon").focus();
        return false;
    }

    if ( !$("input[name='termsValidate']").is(':checked') ) {
        swal({
            text: "Debe aceptar los terminos y condiciones",
            icon: imageURL,
            button: "OK",
        });
        return false;
    }

    var data = $(this).serialize();
    $.ajax({
        url: https + "contact",
        method: "POST",
        data: data,
        success: function (data) {
            if ($.trim(data) == "1") {
                $("#formContacto")[0].reset();
                swal({
                    text: "Gracias por contactarnos",
                    icon: "success",
                    button: "OK!",
                });
            }else {
                swal({
                    text: "Error, hubo problemas",
                    icon: imageURL,
                    button: "OK!",
                });
            }
        }
    });

});

$('.modalBonoFormClick').click(function () {
    $('#ModalBonoForm').submit();
});

$("#ModalBonoForm").on('submit', function (e) {
    e.preventDefault();
    $('#nameBono').removeClass('error');
    $('#emailBono').removeClass('error');

    $('#nameBono2').removeClass('error');
    $('#emailBono2').removeClass('error');

    contLogin = 1;
    if ( $.trim($("#nameBono").val()) == "" ) {
        contLogin = 0;
        $('#nameBono').addClass('error');
    }

    if ( $.trim($("#emailBono").val()) == "" ) {
        contLogin = 0;
        $('#emailBono').addClass('error');
    }

    if ( $.trim($("#nameBono2").val()) == "" ) {
        contLogin = 0;
        $('#nameBono2').addClass('error');
    }

    if ( $.trim($("#emailBono2").val()) == "" ) {
        contLogin = 0;
        $('#emailBono2').addClass('error');
    }

    if(contLogin == 0)
    {
        return false;
    }

    if ( $.trim($("#bonoVal").val()) == "")
    {
        swal({
            text: "Debe digitar un valor",
            icon: imageURL,
            button: "OK",
        });
    }

    campo  = $("#emailBono").val();
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo)) {
        $('#emailBono').removeClass('error');
    } else {
        $('#emailBono').addClass('error');
        swal({
            text: "Debe digitar un correo electrónico valido",
            icon: imageURL,
            button: "OK",
        });
        document.getElementById("emailBono").focus();
        return false;
    }

    campo  = $("#emailBono2").val();
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo)) {
        $('#emailBono2').removeClass('error');
    } else {
        $('#emailBono2').addClass('error');
        swal({
            text: "Debe digitar un correo electrónico valido",
            icon: imageURL,
            button: "OK",
        });
        document.getElementById("emailBono2").focus();
        return false;
    }

    if (!/^([0-9])*$/.test($("#bonoVal").val())){
        swal({
            text: "Debe ingresar un valor númerico",
            icon: imageURL,
            button: "OK",
        });
        return false;
    }

    var data = $(this).serialize();
    $.ajax({
        url: https + "ModalBono",
        method: "POST",
        data: data,
        success: function (data) {
            if ($.trim(data) != "0") {
                var totalBono = $.trim($("#bonoVal").val());
                var nameBono = $.trim($("#nameBono").val());
                $("#ModalBonoForm")[0].reset();
                buyBono(data,totalBono,nameBono);
            }else {
                swal({
                    text: "Error, hubo problemas",
                    icon: "warning",
                    button: "OK!",
                });
            }
        }
    });

});

function buyBono(refBono,totalBono,nameBono)
{
    var data={
        //Parametros compra (obligatorio)
        name: "VideoJuegos BAQ",
        description: "Compra Bono en VideoJuegos BAQ",
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
        //Atributos opcionales
        confirmation: https + "/validarBono",
        response: https + "/validarBono",
    };
    handler.open(data);
}

$('.forgetPassword').on('click',function () {
    olvidePassword();
});

function olvidePassword() {

    campo =  $('#user').val();

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo))
    {
        $('#user').removeClass('error');
    }
    else
    {
        $('#user').addClass('error');
        swal({
            text: "Escriba un correo electrónico valido",
            icon: imageURL,
            button: "OK",
        });
        return false;
    }

    $.ajax({
        url: https + "forgetPassword",
        method: "POST",
        data: {data:campo,action:'forgetPassword'},
        success: function (data) {
            if ($.trim(data) == "1") {
                swal({
                    text: "Recibira una notificacion a su correo \n electrónico para recuperar su contraseña",
                    icon: imageURL,
                    button: "OK!",
                });
            }else if($.trim(data) == "2"){
                swal({
                    text: "Este usuario no se encuentra registrado",
                    icon: imageURL,
                    button: "OK!",
                });
            } else {
                swal({
                    text: "Error, hubo problemas",
                    icon: "warning",
                    button: "OK!",
                });
            }

        }
    });
}

$('.loginBtn').on('click',function () {
    Login();
});


function Login() {
    $('#user').removeClass('error');
    $('#pass').removeClass('error');
    var contLogin = 1;
    if ($.trim($("#user").val()) == "" ) {
        contLogin = 0;
        $('#user').addClass('error');
    }

    if ($.trim($("#pass").val()) == "" ) {
        contLogin = 0;
        $('#pass').addClass('error');
    }

    if(contLogin == 0)
    {
        return false;
    }

    campo =  $('#user').val();

    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(campo)) {
        $('#user').removeClass('error');
    } else {
        document.getElementById("user").focus();
        $('#user').addClass('error');
        return false;
    }
    var email = $('#user').val();
    var password = $('#pass').val();
    $.ajax({
        type: "post",
        url: https + "Login",
        data: {
            email: email,
            pass: password
        },
        success: function (data) {
            if ($.trim(data) == "1") {
                location.reload();
            } else {
                swal({
                    text: "" + data,
                    icon: imageURL,
                    button: "OK!",
                });
            }
        }
    });
}


$('#finderButton').on('click',function () {
    var word = $('#finder').val();
    word = getCleanedString(word);
    search(word);
});


$("#finder").keypress(function(e) {
    if(e.which == 13) {
        var word = $('#finder').val();
        word = getCleanedString(word);
        search(word);
    }
});

$("#finderMobile").keypress(function(e) {
    if(e.which == 13) {
        var word = $('#finderMobile').val();
        word = getCleanedString(word);
        search(word);
    }
});

$("#finderTruco").keypress(function(e) {
    if(e.which == 13) {
        var word = $('#finderTruco').val();
        word = getCleanedString(word);
        searchtrucos(word);
    }
});

function search(word){
    if(word == ""){
        swal({
            text: "Debe digitar algo a buscar",
            icon: imageURL,
            button: "OK!",
        });
    }else{
        location.href = https + 'buscar/'+word;
    }
}

function searchtrucos(word)
{
    if(word == ""){
        swal({
            text: "Debe digitar algo a buscar",
            icon: imageURL,
            button: "OK!",
        });
    }else{
        location.href = https + 'buscar-trucos/'+word;
    }
}

function getCleanedString(cadena){
    // Definimos los caracteres que queremos eliminar
    var specialChars = "!@#$^&%*()+=-[]\/{}|:<>?,.";

    // Los eliminamos todos
    for (var i = 0; i < specialChars.length; i++) {
        cadena= cadena.replace(new RegExp("\\" + specialChars[i], 'gi'), '');
    }

    // Lo queremos devolver limpio en minusculas
    cadena = cadena.toLowerCase();

    // Quitamos espacios y los sustituimos por _ porque nos gusta mas asi
    cadena = cadena.replace(/ /g,"-");

    // Quitamos acentos y "ñ". Fijate en que va sin comillas el primer parametro
    cadena = cadena.replace(/á/gi,"a");
    cadena = cadena.replace(/é/gi,"e");
    cadena = cadena.replace(/í/gi,"i");
    cadena = cadena.replace(/ó/gi,"o");
    cadena = cadena.replace(/ú/gi,"u");
    cadena = cadena.replace(/ñ/gi,"n");
    return cadena;
}

$('.buyProduct').click(function () {
   var id = this.id;
   buyProduct(id);
});
function buyProduct(id){
    $.ajax({
        url: https + 'buyProduct',
        method: "POST",
        data: {id:id,cant:1},
        success: function (data) {
            if ($.trim(data) > 0) {
                var num = $('.number_car').text();
                num = parseInt(num)+1;
                $('.number_car').text(''+num);
                $('#modalAddCar').modal('open');
            }else {
                swal({
                    text: "Error, hubo problemas",
                    icon: imageURL,
                    button: "OK!",
                });
            }
        }
    });
}