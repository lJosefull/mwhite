<div id="modalAccountInfo" class="modal" style="background-image: url({{asset('img/bono/background.png')}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <div class="row">
        <div class="col s12">
            <h1>
                Editar perfil
            </h1>
            <form action="" id="modalAccountInfoForm">
                <div class="row rowTwo">
                    <div class="input-field col s12 inputs">
                        <center>
                        <label for="frontal_file" class="text-center">                            
                            @if($cliente->avatar != '')
                                <img src="{{url('')}}/{{$cliente->avatar}}" id="imgFrontal" style="width: 150px; border-radius: 75px; height: 150px;">    
                            @else
                                <img src="{{url('')}}/img/profileimage.png" id="imgFrontal" style="width: 150px; border-radius: 75px; height: 150px;">    
                            @endif
                            <br>
                            <span class="waves-effect waves-light btn">Cambiar avatar</span>
                        </label>
                        <input type="file" name="frontal_file" id="frontal_file" accept=".jpg,.jpeg, .png, .gif" onchange="ValidateSize(this,'imgFrontal')"  style="display: none;" />    
                        </center>
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Nombres" id="nameModInfo" name="nameModInfo" value="{{$cliente->name}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Apellidos" id="lastnameModInfo" name="lastnameModInfo" value="{{$cliente->lastName}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Correo Electrónico" id="emailModInfo" name="emailModInfo" value="{{$cliente->email}}">
                    </div>
                    <div class="input-field col s12 date">
                        <input type="text" placeholder="Nacimiento" id="bornModInfo" name="bornModInfo" class="datepicker date-input" value="{{$cliente->born}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Documento de identidad" id="idModInfo" name="idModInfo" value="{{$cliente->identi}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Direccion" id="addressModInfo" name="addressModInfo" value="{{$cliente->address}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="countryModInfo" id="countryModInfo" class="browser-default">
                            <option value="">Seleccione</option>
                            @foreach($paises as $key => $country)
                                @if($cliente->country == $country->PaisCodigo)
                                    <option value="{{$country->PaisCodigo}}" selected>{{$country->PaisNombre}}</option>
                                @else
                                    <option value="{{$country->PaisCodigo}}">{{$country->PaisNombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="deparmentModInfo" id="deparmentModInfo" class="browser-default opciones_d">
                            <option value="">Seleccione</option>
                            @foreach($distritos as $key => $deparment)
                                @if($cliente->deparment == $deparment->DisCodigo)
                                    <option class="opcioned" value="{{$deparment->DisCodigo}}" selected>{{$deparment->DisNombre}}</option>
                                @else
                                    <option class="opcioned" value="{{$deparment->DisCodigo}}">{{$deparment->DisNombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="cityModInfo" id="cityModInfo" class="browser-default opciones_c">
                            <option value="">Seleccione</option>
                            @foreach($ciudades as $key => $city)
                                @if($cliente->city == $city->CiuCodigo)
                                    <option class="opcionec" value="{{$city->CiuCodigo}}" selected>{{$city->CiuNombre}}</option>
                                @else
                                    <option class="opcionec" value="{{$city->CiuCodigo}}">{{$city->CiuNombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <input placeholder="Barrio" id="townModInfo" name="townModInfo" type="text" value="{{$cliente->town}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input placeholder="Celular" id="cellphoneModInfo" name="cellphoneModInfo" type="text" value="{{$cliente->cellphone}}">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input placeholder="Telefono" id="phoneModInfo" name="phoneModInfo" type="text" value="{{$cliente->phone}}">
                    </div>
                </div>
                <div class="align-center">
                    <a class="waves-effect waves-light btn submitModalAccountInfo">Actualizar</a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="modalAddAddressInfo" class="modal" style="background-image: url({{asset('img/bono/background.png')}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <div class="row">
        <div class="col s12">
            <h1>
                Agregar Dirección
            </h1>
            <form action="" id="modalAddAddressInfoForm">
                <div class="row rowTwo">
                    <div class="input-field col s12 inputs">
                        <select name="nameAddAddressInfo" id="nameAddAddressInfo" class="browser-default">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="Casa">Casa</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Descripcion" id="descripcionAddAddressInfo" name="descripcionAddAddressInfo">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Dirección" id="addressAddAddressInfo" name="addressAddAddressInfo">
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="deparmentAddAddressInfo" id="deparmentAddAddressInfo" class="browser-default opciones_d_addAddressInfo">
                            <option value="">Seleccione</option>
                            @foreach($distritosAddress as $key => $deparment)
                                <option class="opcioned_addAddressInfo" value="{{$deparment->DisCodigo}}">{{$deparment->DisNombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="cityAddAddressInfo" id="cityAddAddressInfo" class="browser-default opciones_c_addAddressInfo">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Telefono" id="phoneAddAddressInfo" name="phoneAddAddressInfo">
                    </div>
                </div>
                <div class="align-center">
                    <a class="waves-effect waves-light btn submitmModalAddAddressInfo">Agregar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="modalEditAddressInfo" class="modal" style="background-image: url({{asset('img/bono/background.png')}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <div class="row">
        <div class="col s12">
            <h1>
                Editar Dirección
            </h1>
            <form action="" id="modalEditAddressInfoForm">
                <div class="row rowTwo">
                    <input type="hidden" id="idEditAddressInfo" name="idEditAddressInfo">
                    <div class="input-field col s12 inputs">
                        <select name="nameEditAddressInfo" id="nameEditAddressInfo" class="browser-default">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="Casa">Casa</option>
                            <option value="Oficina">Oficina</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Descripcion" id="descripcionEditAddressInfo" name="descripcionEditAddressInfo">
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Dirección" id="addressEditAddressInfo" name="addressEditAddressInfo">
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="deparmentEditAddressInfo" id="deparmentEditAddressInfo" class="browser-default opciones_d_editAddressInfo">
                            <option value="">Seleccione</option>
                            @foreach($distritosAddress as $key => $deparment)
                                <option class="opcioned_editAddressInfo" value="{{$deparment->DisCodigo}}">{{$deparment->DisNombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <select name="cityEditAddressInfo" id="cityEditAddressInfo" class="browser-default opciones_c_editAddressInfo">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                    <div class="input-field col s12 inputs">
                        <input type="text" placeholder="Telefono" id="phoneEditAddressInfo" name="phoneEditAddressInfo">
                    </div>
                </div>
                <div class="align-center">
                    <a class="waves-effect waves-light btn submitmModalEditAddressInfo">Actualizar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function ValidateSize(file,$object) {

        var validExt = ['jpg', 'jpeg', 'png'];
        var FileSize = file.files[0].size / 1024 / 1024;
        var extension = file.files[0].type.split('/')[1];
       
        if ((FileSize > 2) || validExt.indexOf(extension) == -1)  {            
            swal("Archivo invalido, Debe ser una imagen y no superar 2MB ", "error");
            $(file).val('');
        }else{
            document.getElementById($object).src = window.URL.createObjectURL(file.files[0]);
        }   

    }
</script>