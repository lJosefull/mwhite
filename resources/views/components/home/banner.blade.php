<section class="sectionBannerHome">
    <div class="bannerHome" id="bannerHomeSlider">
      
       <div class="slider">
    <ul class="slides">
          @foreach($banner as $ban)
      <li>
        <img src="{{asset($ban->img)}}"> <!-- random image -->
        <div class="caption left-align">
          <!--<h3>Left Aligned Caption</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
           <a href="https://dranitavergara.com/resultados" class="waves-effect waves-light btn">Galeria de resultados</a>-->
        </div>
      </li>
        @endforeach
      
    </ul>
  </div>
      
    </div>
    

</section>