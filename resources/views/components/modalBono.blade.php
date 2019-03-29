<div id="modalBono" class="modal" style="background-image: url({{asset($imagenes[8]->img)}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <div class="row">
        <div class="col s12">
            <img class="text align-center" src="{{asset('img/bono/text.png')}}" alt="">
            <form action="" id="ModalBonoForm">
                <div class="row rowTwo">
                    <div class="col s12 m2 l2">
                        <h1>De</h1>
                    </div>
                    <div class="input-field col s12 m10 l5">
                        <input type="text" placeholder="Nombre y apellido" id="nameBono" name="nameBono">
                    </div>
                    <div class="input-field col s12 m12 l5">
                        <input type="text" placeholder="Correo Electrónico" id="emailBono" name="emailBono">
                    </div>
                </div>
                <div class="row rowTwo">
                    <div class="col s12 m2 l2">
                        <h1>Para</h1>
                    </div>
                    <div class="input-field col s12 m10 l5">
                        <input type="text" placeholder="Nombre y apellido" id="nameBono2" name="nameBono2">
                    </div>
                    <div class="input-field col s12 m12 l5">
                        <input type="text" placeholder="Correo Electrónico" id="emailBono2" name="emailBono2">
                    </div>
                </div>
                <div class="row rowTwo">
                    <div class="col s3 m5 l5">
                        <img class="moneda" src="{{asset('img/bono/iconMoneda.png')}}" alt="">
                    </div>
                    <div class="input-field col s9 m5 l5">
                        <input class="value" type="number" placeholder="valor" id="bonoVal" name="bonoVal">
                    </div>
                </div>
                <div class="align-center">
                    <a class="waves-effect waves-light btn modalBonoFormClick">Regalar</a>
                </div>
            </form>
        </div>
    </div>
</div>