<section class="sectionRegister" style="background-image: url({{asset($imagenes[4]->img)}})">
    <div class="row">
        <div class="col s12">
                <img class="texto align-center" src="{{asset('img/register/text.png')}}" alt="">
        </div>
        <div class="col s12">
            <form action="" id="registro">
                <div class="row">
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Nombres" name="nameRe" id="nameRe" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Apellidos" name="lastname" id="lastname" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Email" id="emailRe" name="emailRe" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Contraseña" id="password" name="password" type="password">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Repetir Contraseña" id="passRe" name="passRe" type="password">
                    </div>

                    <div class="input-field col s12 m6 l6 inputDateContainer">
                        <input placeholder="Nacimiento" id="born" name="born" type="text" class="datepicker inputDate">
                    </div>

                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Número de cédula" id="id" name="id" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Dirección" id="address" name="address" type="text">
                    </div>
                    <div class="col s12 m6 l6 select">
                        <select name="country" id="country" class="browser-default">
                            <option value="">Pais</option>
                            @foreach($paises as $key => $country)
                                <option value="{{$country->PaisCodigo}}">{{$country->PaisNombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col s12 m6 l6 select">
                        <select name="deparment" id="deparment" class="browser-default opciones_d">
                            <option value="">Departamento</option>
                        </select>
                    </div>
                    <div class="col s12 m6 l6 select">
                        <select name="city" id="city" class="browser-default opciones_c">
                            <option value="">Ciudad</option>
                        </select>
                    </div>

                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Barrio" id="town" name="town" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Celular" id="cellphone" name="cellphone" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Telefono" id="phone" name="phone" type="text">
                    </div>
                    <div class="col s12 align-center">
                        <p>
                            <label>
                                <input name="termsValidate" id="termsValidate" type="checkbox" class="filled-in"/>
                                <span>
                                Acepto
                                 <a href="{{url($info->terms)}}" target="_blank">
                                    términos y condiciones
                                </a>
                            </span>
                            </label>
                        </p>
                    </div>
                    <div class="align-center">
                        <a class="waves-effect waves-light btn submitRegister">Start</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>


