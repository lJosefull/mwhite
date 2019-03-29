@php
    $totalitems = 0;        
    if(Session::has('car')){     
        $car = \Session::get('car');    
        for($i=1;$i<=$car;$i++) {
            $totalitems ++;
        }
    }
@endphp
<nav class="header-top">
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="left hide-on-med-and-down">

             <li><a class="text_whatsapp"><img class="wpImg" src="{{asset('image/Grupo1.png')}}" alt="">{{$info->number_wp}}</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li><a><img class="wpImg" src="{{asset('image/Grupo2.png')}}" alt="">Solicita tu crédito Mwhite en minutos</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            <li><a id="Pf">Pregunta por nuestro Servicio Técnico</a></li>
        
            <li class="vhd"><a>&ensp;</a></li>
            <li class="vhd"><a>&ensp;</a></li>
            
            <!--
            <li class="vhd"><a>&ensp;</a></li>
            <li><a style="visibility: hidden" class="number" href="{{Route('howNew')}}">¡como nuevo!</a></li>
            -->
            <li class="vhd"><a>&ensp;</a></li>
        </ul>
    </div>
</nav>

<nav class="header head-2"> 
<div class="row">
    <div class="col 4  m4" style="background: white; left: 40px; padding-left: 8.5%; color:black;">
       
    <a class="izquierda">Envios nacionales e internacionales</a></div>
   <div class="col 4  m4"><a  class="text_whatsapp text-secondary" ><img class="imagen" width="163" heigth="75" src="{{asset('/image/Rectángulo2.png')}}"></a></div>
    <div class="col 4 m4 account">
   <div class="row">
     <div class="col s4"></div>
     <div class="col s4"> @if(session()->has('id'))
                    <a  href="#modalLogin" class="login">
                      {{$cliente->name}} {{$cliente->lastName}}
                    </a>    
                   

                @else
                    <a class="modal-trigger" href="#modalLogin">
                        Mi cuenta
               
                    </a>
                @endif

        
        <a href="{{Route('carShop')}}">
                        
                        <img class="img_car" src="{{asset('image/Grupo5.png')}}" alt="">
                        <span class="number_car">
                            {{$totalitems}}
                        </span>
        </a></div>
   <div class="col s4">
   
        </div>
   </div>

                
    </div>
</div>
   <!--  <div class="nav-wrapper">
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            <li><a href="">Envios nacionales e internacionales</a></li>
            <li>
                <a href="{{route('home')}}"> 
                 <div>
                        <img src="{{asset('image/logo.png')}}">
                    </div>
                </a>
            </li>
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            @if(session()->has('id'))
            @else
                
            @endif
            @if(session()->has('id'))
            <li>
                <a class="modal-trigger" href="{{Route('account')}}">  
                @if($cliente->avatar != '')
                    <img src="{{url('')}}/{{$cliente->avatar}}" id="imgFrontal" style="width: 50px; border-radius: 25px; height: 50px; margin-top: 16px; margin-left: 10px;">    
                @else
                    <img src="{{url('')}}/img/profileimage.png" id="imgFrontal" style="width: 50px; border-radius: 25px; height: 50px; margin-top: 16px; margin-left: 10px;">    
                @endif
                </a>
            </li>
            @endif
            <li>
                @if(session()->has('id'))
                    <a class="modal-trigger" href="{{Route('account')}}">                        
                        {{$cliente->name}} {{$cliente->lastName}}
                        <img class="img_down" src="{{asset('img/header/icon_down.png')}}" alt="">
                    </a>
                @else
                    <a class="modal-trigger" href="#modalLogin">
                        Mi cuenta
               
                    </a>
                @endif
            </li>
            @if(session()->has('id'))
            @else
               
            @endif
            @if(session()->has('id'))
                <li><a href="{{Route('carShop')}}">carrito</a></li>
                <li>
                    <a href="{{Route('carShop')}}">
                        <span class="number_car">
                            {{$totalitems}}
                        </span>
                        <img class="img_car" src="{{asset('img/header/icon_car.png')}}" alt="">
                    </a>
                </li>
            @else
               
                <li>
                    <a class="modal-trigger" href="#modalLogin">
                        
                        <img class="img_car" src="{{asset('image/Grupo5.png')}}" alt="">
                        <span class="number_car">
                            {{$totalitems}}
                        </span>
                    </a>
                </li>
            @endif
            @if(session()->has('id'))
            @else
                    
            @endif
        </ul>
    </div> -->
</nav>

  <nav class="nav2">
    <div class="nav-wrapper">
    

      <ul id="nav-mobile" class="left hide-on-med-and-down">
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            <li class="vhd"><a>&ensp;&ensp;</a></li>
            <li class="vhd"><a>&ensp;&ensp;</a></li>
         <li class="input">
         <img src="{{asset('image/Grupo7.png')}}" alt="" >
                <input style="
    width: 74px;
" type="text" placeholder="BUSCAR">
                    
                    
                
            </li>
        

         <li>
        </li>  
          @foreach($categorias as $key => $cat)
                <li><a href="{{url('categoria/'.$cat->id)}}" class="dropdown-trigger" data-target="{{$cat->id}}Menu">{{$cat->name}}</a></li>
            @endforeach  
             <li><a href="{{url('hot-sale')}}"  class="hot" data-target="menu">
                <img src="{{asset('image/Grupo23.png')}}" alt="" >
             hot-sale</a></li>  

      </ul>
    </div>
  </nav>
<!--<nav class="header-bottom">
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="left hide-on-med-and-down">  
            <li><img  src="{{asset('image/Grupo7.png')}}" alt="" style="width:17px; height: 17px;"><input type="text" class="dropdown-trigger" placeholder="BUSCAR" id="finder" name="finder"></li>
            @foreach($categorias as $key => $cat)
                <li><a href="{{url('categoria/'.$cat->id)}}" class="dropdown-trigger" data-target="{{$cat->id}}Menu">{{$cat->name}}</a></li>
            @endforeach            
        </ul>
    </div>
</nav>
-->

<div class="spaceador">

</div>
<script type="text/javascript">
    $(document).ready(function() {
    var triggerOpen     = $('#input');
    var triggerClose    = $('#dropdown-menu').find('li');
    var marka           = $('#icon');

    // set initial Marka icon
    var m = new Marka('#icon');
    m.set('triangle').size(10);
    m.rotate('down');

    // trigger dropdown
    triggerOpen.add(marka).on('click', function(e) {
        e.preventDefault();
        $('#dropdown-menu').add(triggerOpen).toggleClass('open');


        if($('#icon').hasClass("marka-icon-times")) {
            m.set('triangle').size(10);
        } else {
            m.set('times').size(15);
        }
    });

    triggerClose.on('click', function() {
        // set new placeholder for demo
        var options = $(this).find('a').html();
        triggerOpen.text(options);

        $('#dropdown-menu').add(triggerOpen).toggleClass('open');
        m.set('triangle').size(10);
    });

});
</script>
<script type="text/javascript">

     document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.slider').slider();
  });
     
</script>