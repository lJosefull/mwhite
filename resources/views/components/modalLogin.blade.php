<div id="modalLogin" class="modal" style="background-image: url({{asset($imagenes[7]->img)}})">
    <div class="headerLogin">
        <a class="modal-close">X</a>
    </div>
    <br>
    <div class="row">
        <div class="col s12 m4 l4">
            <img class="logo align-center" src="{{asset('img/logo_big.png')}}" alt="">
            <div class="row align-center">
                <div class="input-field col s12">
                    <input type="text" id="user" name="user" placeholder="Email:">
                </div>
                <div class="input-field col s12">
                    <input type="password" id="pass" name="pass" placeholder="Contraseña:">
                </div>
                <div class="align-center">
                    <a class="waves-effect waves-light btn loginBtn">Start</a>
                    <br>
                    <br>
                    <br>
                    <a class="forget forgetPassword">
                        ¿Olvidó su Usuario o Contraseña?
                    </a>
                </div>
                <br>
            </div>
            <div class="row align-center">
                <br><br>
                <a class="register" href="{{Route('register')}}">
                    Registrate
                </a>
            </div>
        </div>
        <div class="col s12 m8 l8">
            <img class="imgFloat align-center" src="{{asset('img/login/text.png')}}" alt="">
        </div>
    </div>
</div>