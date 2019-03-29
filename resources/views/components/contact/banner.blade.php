<section class="sectionContactBanner" style="background-image: url({{asset($imagenes[6]->img)}})">
    <div class="row">
        <div class="col s12 m12 l6">
            <img class="texto align-center" src="{{asset('img/contact/text.png')}}" alt="">
            <form action="" id="formContacto">
                <div class="row">
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Nombres" id="nameCon" name="nameCon" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Email" id="emailCon" name="emailCon" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Telefono" id="phoneCon" name="phoneCon" type="text">
                    </div>
                    <div class="input-field col s12 m6 l6 inputs">
                        <input placeholder="Asunto" id="asunCon" name="asunCon" type="text">
                    </div>
                    <div class="input-field col s12 inputs">
                        <textarea id="mensajeCon" name="mensajeCon" class="materialize-textarea" placeholder="mensaje"></textarea>
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
                        <a class="waves-effect waves-light btn btnFormContacto">Start</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</section>