@extends('layouts.main')



@section('content')





<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<style>

    .slider{

  position:relative;

}

.slider > .item{

  position: absolute;

  opacity: 0;

  z-index: 0;

  width:100%;

  height: 100%;

  top:0;

  left:0;

  overflow:hidden;

}

.slider > .item.active{

  opacity: 1;

  z-index:10;

}

.slider .slider-control{

  color: rgba(150,150,150,.6);

  position:absolute;

  top:calc(50% - 35px);

  height:60px;

  width:60px;

  line-height:60px;

  z-index: 100;

  text-align:center;

  cursor: pointer;

  opacity: .5;

}

.slider .slider-control:hover{

  opacity: 1;

}

.slider .slider-control.next{

  right:0;

}

.slider .slider-control.prev{

  left:0;

}

.slider .slider-nav{

  width:100%;

  height: 40px;

  position: absolute;

  z-index: 100;

  text-align:center;

  bottom:0;

  left:0;

}

.slider .slider-nav a{

  display: inline-block;

  margin:5px;

  width:15px;

  height:15px;

  background: rgba(150,150,150,.6);

  overflow: hidden;

  border-radius:50%;

  opacity: .5;

}

.slider .slider-nav a:hover{

  opacity: .9;

}

.slider .slider-nav a.active{

    background: #fff;

  opacity: 1;

}


.wrapper {
  position: relative;
  border: 2px solid #585858;margin-right: 10px;margin-left: 10px;max-width: 180px;margin-left: auto;margin-right: auto;
} 

.wrapper input{
	padding-left: 32px;
  background: transparent;border: 0px;height: 39px; width: 180px; font-size: 15px;
}

.wrapper input:focus{
    outline: none;
}

.wrapper_span {
  position: absolute;
  top: 4px;
  left: 2px;
}
.typeahead{
  width: 180px !important;
}
.typeahead .dropdown-item{
  font-size: 12px !important;
  font: normal;
  font-family:Arial, Helvetica, sans-serif !important;
}
@media (prefers-reduced-motion: reduce) {
    .collapsing {
        transition-property: height, visibility;
        transition-duration: .35s;
    }
}
.collapse-div{
  margin:auto !important;
  left: 0px !important;
  padding: 0px !important;
}
.spl-zoom-in{
  display: none !important;
}
.spl-zoom-out{
  display: none !important;
}



/* For  Demo Only. */

/* The code below is not needed for slideshow to work. */



/*  Animations  */ 

/* .slider .item.active .item-content {

  animation-name: fadeLeft;

  animation-duration: 0.5s;

}

.slider .item.active .item-content p {

  animation-name: fadeLeft;

  animation-duration: .8s;

} */



.slider .item.active-right .item-content {

  animation-name: fadeLeft;

  animation-duration: 0.5s;

}

.slider .item.active-right .item-content p {

  animation-name: fadeLeft;

  animation-duration: .8s;

}



.slider .item.active-left .item-content {

  animation-name: fadeRight;

  animation-duration: 0.5s;

}

.slider .item.active-left .item-content p {

  animation-name: fadeRight;

  animation-duration: .8s;

}



@keyframes fadeUp {

  0% {

    margin-top: 60px;

    opacity: 0;

  }

  100% {

    margin-top: 0;

    opacity: 1;

  }

}



@keyframes fadeLeft {

  0% {

    margin-left: 60px;

    opacity: 0;

  }

  100% {

    margin-left: 0;

    opacity: 1;

  }

}



@keyframes fadeRight {

  0% {

    margin-right: 60px;

    opacity: 0;

  }

  100% {

    margin-right: 0;

    opacity: 1;

  }

}



/*  General Styling  */ 



.slider {

  width: 960px;

  height: 300px;

  margin: 30px auto;

  background: #fff;

  color: #000;

  box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.8);

}

.slider > .item {

  text-align: center;

}

.slider > .item .item-content {

  /* padding: 60px; */

  padding: 0px;

}

   .feed_posts_heading_img  {
            max-width: 25px;
        }
        .feed_posts_heading_p  {
             padding: 10px;
        }
        
        @keyframes scroll-left {
    0% {
        transform: translateX(100%);
    }
    100% {
        transform: translateX(-100%);
    }
    
   

</style>

<style>
     .message-tag:hover {
    color: white !important;
    background: #5cb85c !important;
    border: 2px solid #5cb85c !important;
    transition: 0.3s;
    text-decoration: none;
}
</style>


<style>
    .world_after a:after {
        background-color: #ffc83d !important;
    }
</style>

<style>
.animated-heart {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0);
  width: 100px;
  height: 100px; 
  background-image: url('https://live.superfanss.app/assets/images/love.png');
  background-size: contain;
  background-repeat: no-repeat;
  background-position: center;
  opacity: 0;
  pointer-events: none;
  user-select: none;
  z-index: 1000;
}

.animated-heart.show {
  animation: HeartPop 0.8s forwards ease-out;
}

@keyframes HeartPop {
  0% {
    transform: translate(-50%, -50%) scale(0) rotate(0deg);
    opacity: 0;
  }
  20% {
    transform: translate(-50%, -50%) scale(1.3) rotate(10deg);
    opacity: 1;
  }
  30% {
    transform: translate(-48%, -55%) scale(1.1) rotate(0deg);
  }
  40% {
    transform: translate(-46%, -60%) scale(1.0) rotate(-10deg);
  }
  50% {
    transform: translate(-44%, -65%) scale(0.8) rotate(0deg);
  }
  60% {
    transform: translate(-42%, -80%) scale(0.6) rotate(-5deg);
  }
  70% {
    transform: translate(-49%, -150%) scale(1.0) rotate(0deg);
  }
  80% {
    transform: translate(-50%, -190%) scale(0.8) rotate(0deg);
    opacity: 0.7;
  }
  100% {
    transform: translate(-50%, -240%) scale(0.6) rotate(0deg); 
    opacity: 0;
  }

}

</style>



<div id="fh5co-page">

    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle play-sound1" ><i></i></a>

    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">



      @php

      $user = DB::table('users')->where('id',Auth::user()->id)->first();

      @endphp

        <h1 id="fh5co-logo" style="margin-bottom: 0px;" ><a href="{{ URL('/user')}}"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 54%;"></a></h1>

        @if (strlen($user->username_URL) > 13)
        
        
          <p class="animated_username" style="margin-bottom: 0px !important;width: fit-content;margin-left: auto;margin-right: auto;
          border: 5px solid black;color: #c3c3c3;background-color: #585858;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
          padding-left: 6px;padding-right: 6px;font-size: 14px;width: 50%;position: relative;overflow-x: hidden;overflow-y: hidden;">
          <span style="width: 20px;height: 20px;background: #585858;position: absolute;z-index: 2;left: 0px;"></span>
          <span style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;z-index: 3;position: absolute;left: 5px;top: 5px;"></span>
          <span style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;"></span>
          <span style="display: inline-block;" class="arrow"><span>@</span>{{$user->username_URL}}</span></p>
        
      @else
      
        <p style="margin-bottom: 0px !important;width: fit-content;margin-left: auto;margin-right: auto;border: 5px solid black;
        color: #c3c3c3;background-color: #585858;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
        padding-left: 6px;padding-right: 6px;font-size: 14px;width: 50%;position: relative;overflow-x: hidden;overflow-y: hidden;">
        <span style="width: 20px;height: 20px;background: #585858;position: absolute;z-index: 2;left: 0px;"></span>
        <span style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;z-index: 3;position: absolute;left: 5px;top: 5px;"></span>
        <span style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;"></span>
        <span style="display: inline-block;" class="arrow_small_username"><span>@</span>{{$user->username_URL}}</span></p>

      @endif

        <ul style="list-style-type: none;font-size: 14px;width: 100%;padding: 0px 26%;">

          <li style="text-align: center;"> <a href="#" style="pointer-events: none;text-transform: uppercase;

            color: #222;

            font-size: 0.83em;

            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('content.my_posts_title') }}</a> </li>

          

        </ul>

      <center>

      <nav id="fh5co-main-menu" role="navigation">

          <ul>

            <li style="margin-bottom: 30px;"><a class="streaming_anchor" data-toggle="modal" data-target="#streamingModalCenter" style="cursor: pointer;margin-bottom: 0px;"><span style="width: 17px;height: 17px;background-color: red;display: inline-block;border-radius: 30px;border: 4px solid black;position: relative;top: 3px !important;"></span> Streaming<!--Subscribe <b>+</b>--></a></li>

              

            <li>

              @php

              $user = DB::table('users')->where('id',Auth::user()->id)->first();

                  

              $Influencer_networks = $user->Influencer_networks;



              if($Influencer_networks != null) {





                    $Influencer_network_ids = explode(",", $Influencer_networks);



                    $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;

                    $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);

                }



              @endphp

              

              @if ($Influencer_networks != null)

              <div>

                <div id="slider_id" class="slider" style="width: 100%;margin: 0px;height: 120px;box-shadow: none;">

                    <div class="slider-control next play-sound2"><i class="fa fa-angle-right" aria-hidden="true" style="color: #060605"></i></div>

                    <div class="slider-control prev play-sound2"><i class="fa fa-angle-left" aria-hidden="true" style="color: #060605"></i></div>
                        <audio id="clickSound1" src="{{ asset('assets/music/open.mp3') }}"></audio>
<audio id="clickSound2" src="{{ asset('assets/music/close.mp3') }}"></audio>

<audio id="clickSound3" src="https://live.superfanss.app/assets/music/coin-sound.mp3"></audio>
<audio id="clickSound4" src="{{ asset('assets/music/Home-run-bat.mp3') }}"></audio>
<audio id="clickSound5" src="{{ asset('assets/music/woosh-260275.mp3') }}"></audio>
<audio id="clickSound6" src="{{ asset('assets/music/stars_effect_subscription.mp3') }}"></audio>
<audio id="clickSound7" src="{{ asset('assets/music/fast-woosh-230497.mp3') }}"></audio>
<audio id="clickSound8" src="{{ asset('assets/music/iPhoneLock-SoundEffect.mp3') }}"></audio>
    <script>
     const pattern = [4, 9];
     let patternIndex = 0;
     let clickCount = 0;
        document.querySelectorAll('.play-sound1').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound1').play();
            });
        });
          document.querySelectorAll('.play-sound2').forEach(button => {
            button.addEventListener('click', () => {
                clickCount++;
                if (clickCount >= pattern[patternIndex]) {
                document.getElementById('clickSound4').play();
                patternIndex = (patternIndex + 1) % pattern.length;
                clickCount = 0;
            } else {
                document.getElementById('clickSound2').play();
            }
            });
        });
          document.querySelectorAll('.play-sound3').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound3').play();
            });
        });
          document.querySelectorAll('.play-sound4').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound4').play();
            });
        });
          document.querySelectorAll('.play-sound5').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound5').play();
            });
        });
          document.querySelectorAll('.play-sound6').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound6').play();
            });
        });
          document.querySelectorAll('.play-sound7').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound7').play();
            });
        });
        document.querySelectorAll('.play-sound8').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound8').play();
            });
        });
    </script>   

                                                

                    



                    @php

                        $first_network = 1;

                        $index = 0;

                        

                    @endphp



                    @if (isset($Influencer_network_ids))

                        

                    



                        @foreach($Influencer_network_ids as $Influencer_network_id)



                            @php

                                $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();

                                $socialnetwork_image = $socialnetwork->image;

                                $socialnetwork_name = $socialnetwork->name;

                            @endphp



                            <div class="item @if($first_network == 1) active @endif " >

                                <div class="item-content">

                                <a href="{{$Influencer_networks_profile_links[$index]}}"><img src="{{ asset('assets/images/'.$socialnetwork_image.'') }}" width="69px" @if ($socialnetwork->id == 3 || $socialnetwork->id == 4 )

                                  style="max-width: 69px;max-height: 69px;margin-top: 10px;"

                                

                                @elseif($socialnetwork->id == 1 )

                                  style="width: 75px;margin-top: -2px;"

                                  @elseif($socialnetwork->id == 73)

                                  style="width: 75px;margin-top: 17px;"  

                                  @elseif($socialnetwork->id == 71)

                                  style="max-width: 69px;max-height: 69px;margin-right: 5px;"
                                  
                                  @elseif($socialnetwork->id == 81)

                                  style="max-width: 69px;max-height: 69px;margin-top: 5px;"

                                  @elseif( $socialnetwork->id == 41)

                                  style="max-width: 69px;max-height: 69px;margin-top: 9px;"

                                  @elseif( $socialnetwork->id == 61)

                                  style="max-width: 69px;max-height: 69px;margin-top: 5px;"

                                @else

                                style="max-width: 69px;max-height: 69px;"

                                @endif ><br>&nbsp;&nbsp;<b>{{ $socialnetwork_name }}</b></a>

                                </div>

                                

                            </div>

                            @php

                            $first_network = 0;

                            $index = $index + 1;    

                            @endphp

                            

                        @endforeach

                                  

                    @endif

                    

                </div>

                

              </div>       

                 

              @endif

        <hr style="margin-bottom: 20px;">    



            </li>

            

               <li class= "world_after" ><a href="{{ URL('user/world')}}">{{ __('nav.world') }}</a></li>
              <li><a href="{{ URL('/user/feed')}}">{{ __('nav.feed') }}</a></li>
              <li style="margin-bottom: 5px; margin-top: -5px;"><span style="font-size:13px; color:#c3c3c3; font-family:  Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.my') }}</span></li>
              <li ><a href="{{ URL('/user/')}}">{{ __('nav.wall') }}</a></li>
              <li class="fh5co-active"><a href="{{ URL('/user/posts')}}">{{ __('nav.posts') }}</a></li><br> 

              <hr style="margin-top: -17px;">           

              

              {{-- <li class="username_li" style="font-size: 80%;"><p data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;white-space: nowrap;"><b>@</b><b>{{$user->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p></li> --}}

              <li class="username_li" style="font-size: 80%;">

                <div class="">
                  <p id="dropdownMenuButton" data-toggle="collapse" data-target="#demo" style="cursor: pointer;white-space: nowrap;transition: 0.3s;"><b>@</b><b>{{$user->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p>
                  <div class="collapse-div collapse" id="demo" style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;">  <p class="dropdown-item control_panel_item"  data-target="#exampleModalCenter" style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;"><i class="far fa-user-circle" ></i> {{ __('nav.control_panel') }}</p>
                    
{{-- 
                <div class="dropdown">

                  <p id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="cursor: pointer;white-space: nowrap;transition: 0.3s;"><b>@</b><b>{{$user->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;">

                  
                    <p class="dropdown-item control_panel_item"  data-target="#userModalCenter" style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;"><i class="far fa-user-circle" ></i> {{ __('nav.control_panel') }}</p> --}}
                    
<p class="dropdown-item add_post_item" data-toggle="modal" data-target="#add_post_modal" style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;"><i class="fa fa-plus" ></i> {{ __('nav.add_post') }}</p>
                    
                     <p onclick="window.location.href='{{ URL('/user/messages') }}'" class="dropdown-item add_post_item message-tag" 
                       style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;">
                          <i class="fa fa-envelope"></i> {{ __('nav.messages') }}
                     </p>

                  </div>

                </div>



              </li>

              <hr style="margin-top: -1px;">

              {{-- <li><a data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer"><b>@</b><b>{{$user->username_URL}} <i class="fa fa-cog" aria-hidden="true"></i></b></a></li> --}}

  <li>

                            <div class="wrapper">
                                <input type="text" class="influencer_search" placeholder="{{ __('nav.search_influencer') }}">
                                <div class="wrapper_span">🔍</div>
                            </div>
                            {{-- <div class="input-group" style="border: 2px solid #585858;margin-right: 10px;margin-left: 10px;max-width: 158px;margin-left: auto;margin-right: auto;">

                  <span class="input-group-addon" id="search_influencer" style="padding: 0px;padding-left: 6px;padding-right: 6px;background: transparent;border: 0px;cursor: pointer;">🔍</span>

    

                  

                  <select class="form-control" id="influencer_select" style="padding: 0px;background: transparent;border: 0px;height: 39px;font-size: 15px;">

                    <option>Buscar Influencer</option>

                    <option value="All influencers">All influencers</option>

  

                    @foreach ($influencers as $influencer)

                    <option value="{{$influencer->username_URL}}">{{$influencer->username_URL}}</option>    

                    @endforeach

  

                    

                    

                  </select>

  

                </div> --}}

                        </li>

              <br>

              <hr style="margin-top: -10px;margin-bottom: 40px;">

              





          </ul>

      </nav>



      <div class="fh5co-footer" style="position: inherit !important;">

          <ul>


              @if(Auth::check())
                  <li class="nav-item mx-2">
                      <a  class="btn btn-danger"
                          style="padding: 6px !important;
    width: 35px;
    height: 35px;
    text-align: center;
    padding: 6px 0;
    font-size: 15px;
    line-height: 1.428571429;
    border-radius: 30px;"
                          href="/logout"><i class="fa fa-power-off" aria-hidden="true"></i>
                      </a>
                  </li>
              @else
                  <li class="nav-item mx-2">
                      <a  class="btn btn-outline"
                          style="padding: 6px !important; background-color: #724BB6;
                                    border-color: #724BB6;
                                    color: white;

    width: 35px;
    height: 35px;
    text-align: center;
    padding: 6px 0;
    font-size: 15px;
    line-height: 1.428571429;
    border-radius: 30px;"
                          href="https://live.superfanss.app/"><i class="fa fa-power-off" aria-hidden="true"></i>
                      </a>
                  </li>
              @endif
{{--              <li><a href="{{Auth::user()->instagram_link}}"><i class="icon-instagram" style="font-size: 2.1em;"></i></a></li>--}}

              <!--<li><a href="https://www.twitch.com/" target="_blank"><i class="icon-twitch" style="font-size: 2.1em;"></i></a></li>

                  <li><a href="https://www.youtube.com/" target="_blank"><i class="icon-youtube" style="font-size: 2.1em;"></i></a></li>-->

          </ul><br>

          <p><small><span><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </span><br>&copy; 2021-2025 @if(Auth::user()->footer_name_username == "username") <span style="display: inline-block;">@</span>{{Auth::user()->username_URL}} @else {{Auth::user()->name}} {{Auth::user()->surname}} @endif <br>{{ __('footer.all_rights_reserved') }}</span> <span>{{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a> </span> </small></p>

      </div>

@php
    $currentLocale = app()->getLocale();
@endphp

<footer>
  <div style="text-align: center; margin-top: 2rem;">
    <div class="footer-language-selector" style="position: relative; display: inline-block;">
      <button class="footer-lang-toggle" style="background: none; border: none; font-size: 14px; font-weight: 400; cursor: pointer; opacity: 1; color: #000;">
        Language:
        <img src="{{ 
          $currentLocale === 'en' ? asset('assets/images/euflag.png') : 
          ($currentLocale === 'es' ? asset('assets/images/spainflag.png') : 
          ($currentLocale === 'fr' ? asset('assets/images/fr.png') :
          ($currentLocale === 'de' ? asset('assets/images/de.png') :
          ($currentLocale === 'it' ? asset('assets/images/it.png') :
          ($currentLocale === 'pt' ? asset('assets/images/pt.png') :
          ($currentLocale === 'ca' ? asset('assets/images/ca.png') :
          ($currentLocale === 'cn' ? asset('assets/images/cn.png') : asset('assets/images/euflag.png')))))))) }}"
          alt="{{ $currentLocale }}" style="width: 20px; height: 20px; vertical-align: middle; margin-left: 5px;">
        <img src="{{ asset('assets/images/arrowDown_.png') }}" alt="▼" style="width: 12px; height: 12px; margin-left: 2px;">
      </button>

      <div class="footer-lang-menu" style="display: none; position: absolute; left: 75%; bottom: 30px; background: white; border: 1px solid #ccc; padding: 8px 12px; z-index: 10;">
        @foreach(['en', 'es', 'fr', 'de', 'it', 'pt', 'ca', 'cn'] as $locale)
          @if($locale !== $currentLocale)
            <a href="{{ route('lang.switch', $locale) }}" style="text-decoration: none; font-size: 14px; font-weight: 400; display: block; padding: 4px 0;">
              <img src="{{ 
                $locale === 'en' ? asset('assets/images/euflag.png') : 
                ($locale === 'es' ? asset('assets/images/spainflag.png') : 
                ($locale === 'fr' ? asset('assets/images/fr.png') : 
                ($locale === 'de' ? asset('assets/images/de.png') : 
                ($locale === 'it' ? asset('assets/images/it.png') : 
                ($locale === 'pt' ? asset('assets/images/pt.png') : 
                ($locale === 'ca' ? asset('assets/images/ca.png') :
                ($locale === 'cn' ? asset('assets/images/cn.png') : ''))))))) }}"
                alt="{{ $locale }}" style="width: 20px; height: 20px; vertical-align: middle; margin-right: 5px;">
             
            </a>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</footer>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const toggleBtn = document.querySelector('.footer-lang-toggle');
    const menu = document.querySelector('.footer-lang-menu');

    toggleBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function () {
      menu.style.display = 'none';
    });
  });
</script>

  </aside>



    <div id="fh5co-main">

        @php

            $profile_picture = $user->profile_picture;

            $cover_picture = $user->cover_picture;

        @endphp

        {{-- <div  style="text-align: center">

            <img src="{{ asset('assets/images/'.$cover_picture.'') }}" style="max-height: 129px;" alt="">

        </div> --}}

        <div class="fh5co-narrow-content" style="">

          {{-- @if(session()->has('duplicate_error'))

          <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

              {{ session()->get('duplicate_error') }}

          </div>

        @endif --}}

        {{-- @if(session()->has('message'))

          <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

              {{ session()->get('message') }}

          </div>

        @endif --}}

            



            

            <center>

              @if ($profile_picture != null)

              <img src="{{ asset('assets/images/'.$profile_picture.'') }}" style="width: 92px; height: 92px; border-radius: 74px;@if(Auth::user()->profile_picture_border_status == "1") border: 4px solid #d3d3d3; @endif">    

              @else

              <img src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" style="width: 92px; height: 92px; border-radius: 74px;">

              @endif

              



                <br><br><b>{{$user->name}}</b> 

                <br><?php echo '@' ?>{{$user->username_URL}}<br><br>

                <span  data-toggle="modal" data-target="#userModalCenter"  class="btn btn-primary btn-outline"style="width: 226px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.subscribe') }} <b>+</b></span>

                <!--<br>

                <b><a href="#" style="font-size: 0.69em;">11</b> {{ __('content.post') }}</a> | <b><a href="#" style="font-size: 0.69em;">26K</b> {{ __('content.likes') }} </a> | <b><a href="#" style="font-size: 0.69em;">4.6K</b> {{ __('content.followers') }}</a>-->



                <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft" style="font-family: 'Roboto Slab', serif; 

color: #dd2110;"><br><span></center>





            <div class="row animate-box" data-animate-effect="fadeInLeft">

             

              @if (count($posts) > 0)

                  

              



              @foreach($posts as $post) 

                <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item" data-id="{{ $post->id }}">
<div class="animated-heart" id="heart-{{ $post->id }}"></div>
                  @php

                      $post_id = $post->id;

                  @endphp

      

                    @php

                                  $image_video = $post->image_video;
                                  $tagged_users = $post->tags;
                                  $tagged_profiles = $post->tagged_profile_pictures;
                                  $file_extension = substr($image_video, strpos($image_video, ".") + 1);

                                  

                                @endphp


   @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp
@php
    $taggedProfilesArray = explode(',', $post->tagged_profile_pictures);
    $taggedUsersArray = explode(',', $post->tags);
@endphp

@if (!empty($tagged_users))
<p class="feed_posts_heading_p" style="overflow: hidden; position: relative; width: 70%; height: 55px; top:25px; font-size:14px">
    <span class="marquee-text" style="display: inline-block; white-space: nowrap; animation: scroll-left 10s linear infinite;">

        @php
            $taggedUsersArray = explode(',', $tagged_users);
            $taggedProfilesArray = explode(',', $tagged_profiles);
        @endphp

        @foreach ($taggedUsersArray as $index => $tagged)
            @php
                $trimmed = trim($tagged);
                $profileImage = trim($taggedProfilesArray[$index] ?? '');
            @endphp

            @if ($profileImage && $trimmed)
                <a style="color:black; display:inline-flex; align-items:center; margin-right: 10px;" href="/{{ $trimmed }}" onclick="event.stopPropagation();">
                    <img class="feed_posts_heading_img" src="{{ asset('assets/images/' . $profileImage) }}" alt="" style="margin-right: 10px;  margin-bottom: 0;">
                    <span>{{ '@' . $trimmed }}</span>
                </a>
            @endif
    

    @endforeach

        </span>
    </p>
@else
    {{-- no upload --}}
    <br />
  
@endif


     
                                @if ($file_extension == "mp4" || $file_extension == "webm" || $file_extension == "mov" || $file_extension == "MOV")

                                <video controlsList="nodownload"  style="max-width: 100%;"  controls loop @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif>

                                  <source src="{{ asset('assets/images/'.$image_video.'') }}" type="video/mp4" >

                                    

                                </video>

                                @else

                                    <img src="{{ asset('assets/images/'.$image_video.'') }}" alt="Nueva Modelo Superfans - Ã‚Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;php">    

                                @endif

                               

                    

       

                  @php

                                  $post_likes_count = DB::table('likes')->where('post_id',$post->id)->count();



                                  $check_post_like = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->count();

$likes = DB::select("SELECT * FROM posts WHERE id = ". $post->id);
                                  foreach ($likes as $like) {
                                            $likes_no = $like->no_of_likes;
                                        }
                                        
                              @endphp

                              <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;"><span class="number_of_post_likes post_likes_{{$post->id}}" onclick="event.stopPropagation();">
                                   {{format_number($post_likes_count+$likes_no)}}
                              </span>
                              <span class="number_of_post_likes post_likes_value_{{ $post->id }}"
                                              style="display:none">
                                              {{ $post_likes_count + $likes_no }}

                                          </span></b><span class="like_post" style="cursor: pointer;" post_id="{{$post->id}}" onclick="event.stopPropagation(); likePost(this)"> <i class="@if($check_post_like == null) icon-heart-o @else icon-heart  @endif  post_icon_{{$post->id}} " post_id="{{$post->id}}" style=""></i> <span  style="cursor: pointer;font-weight: 100;">{{ __('content.likes') }} </span> </span></a> &nbsp; <b></center>
                              <!--#PostLikesModalCenterindividual-->

                </div>

              @endforeach

              

              @else

                <br>

                <br>

                  <p style="text-align: center;"><img src="{{url('assets/images/time_icon.PNG')}}" style="margin-top: -7px;height: 32px;width: 25px;" alt=""> No hay posts todabÃƒÂ­a &nbsp;&nbsp; <span data-toggle="modal" data-target="#add_post_modal" class="btn btn-primary btn-outline">{{ __('nav.add_post') }}</span></p>

                  <div style="text-align: center">

                  

                </div>

                  @endif

              

            </div>



        </div>

        

    

<hr style="margin-bottom: 0px;">

        <div class="fh5co-narrow-content">



            <div class="row">

                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">

                    <h1 class="fh5co-heading-colored">{{ __('footer.start_earning_header_1') }}</h1>

                </div>

            </div>

            <div class="row">

                <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">

                    <p class="fh5co-lead" style="font-weight: 300;">{{ __('footer.lead_paragraph_1') }}</p>

                    <p><a href="{{url('/creador')}}" target="_blank" class="btn btn-primary btn-outline"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 14.47%; position: relative; left: -11px;"><font style="position: relative; left: -6px;">{{ __('footer.start_now_button') }}</font></a></p>

                </div>

                <div class="col-md-7 col-md-push-1">

                    <div class="row">

                        <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">

                            <p style="font-weight: 300;">{{ __('footer.lead_paragraph_2') }}</p>

                        </div>

                        <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">

                            <p style="font-weight: 300;">{!! __('footer.lead_paragraph_3') !!}</u>.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


<hr style="margin-bottom: 0px;">

        <div class="fh5co-narrow-content"  style="font-weight:normal !important;">



          <center>
  @php
    $locale = app()->getLocale(); // get the current locale

$logos = [
        'en' => 'Superworld-13.svg',
        'it' => 'Superworld-14.svg',
        'es' => 'Superworld-15.svg',
        'pt' => 'Superworld-15.svg',
        'ca' => 'Superworld-16.svg',
        'fr' => 'Superworld-17.svg',
        'de' => 'Superworld-18.svg',
    ];

    $logo = $logos[$locale] ?? 'Superworld-13.svg'; // fallback English
@endphp

<img src="{{ asset('assets/images/' . $logo) }}" style="width: 11.1em;">
<br><br>
            <p style="font-weight: 100;"><b><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </b><br>© 2021-2025 @if(Auth::user()->footer_name_username == "username") <span style="display: inline-block;">@</span>{{Auth::user()->username_URL}} @else {{Auth::user()->name}} {{Auth::user()->surname}} @endif <br>
              {{ __('footer.all_rights_reserved') }} <br>
              {{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a></p>
          </center>

        </div>

    </div>

</div>







<!-- Demo -->

{{-- <div id="slider_id" class="slider">

    <div class="slider-control next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

    <div class="slider-control prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>

    <div class="slider-nav"></div>

    <div class="item active" >

      <div class="item-content">

        <a href="https://www.tiktok.com"><img src="{{ asset('assets/images/b05db292060a4b42799ad7abaf5d6130.png') }}" width="69px"><br>&nbsp;&nbsp;<b>Tik Tok</b></a>

      </div>

    </div>

    <div class="item" >

      <div class="item-content">

        <a href="https://www.tiktok.com"><img src="{{ asset('assets/images/b05db292060a4b42799ad7abaf5d6130.png') }}" width="69px"><br>&nbsp;&nbsp;<b>Tik Tok</b></a>

      </div>

    </div>

    <div class="item" >

      <div class="item-content">

        <a href="https://www.tiktok.com"><img src="{{ asset('assets/images/b05db292060a4b42799ad7abaf5d6130.png') }}" width="69px"><br>&nbsp;&nbsp;<b>Tik Tok</b></a>

      </div>

    </div>

    <div class="item" >

      <div class="item-content">

        <a href="https://www.tiktok.com"><img src="{{ asset('assets/images/b05db292060a4b42799ad7abaf5d6130.png') }}" width="69px"><br>&nbsp;&nbsp;<b>Tik Tok</b></a>

      </div>

    </div>

</div> --}}





{{-- 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>







<script>

    $(document).ready(function() {

  var time = 600000000;

  var timeReset = time;

 

  setInterval(function() {

    time = time - 1000;

    var $activeItem = $(".slider > .item.active");

    var $nextItem = $activeItem.next();

    var $prevItem = $activeItem.prev();



    function nextSlide() {

      $activeItem.removeClass("active");

      $nextItem.addClass("active");

      setNav();

      time = timeReset;

    }

    function prevSlide() {

      $activeItem.removeClass("active");

      $prevItem.addClass("active");

      setNav();

      time = timeReset;

    }

    if($(".slider > .item").last().hasClass("active")) {

      $nextItem = $(".slider > .item").first();

    }

    if(time <= 0) {

      nextSlide();

    }

  }, 1000);



  // Build Slider Navigation

  $(".slider > .item").each(function(i) {

    $(this).attr("data-id", i);

    $(".slider-nav").append('<a href="#" data-id="' + i + '"></a>');

  });

 

  $('.slider-nav > a[data-id="' + $('.slider > .item.active').attr("data-id") + '"]').addClass('active');

  

  function setNav(){

    $('.slider-nav > a').removeClass('active');

    $('.slider-nav > a[data-id="' + $('.slider > .item.active').attr("data-id") + '"]').addClass('active');

  }

  

  $(".slider-nav > a").on("click", function(e) {

    e.preventDefault();

    $(".slider-nav > a").removeClass("active");

    $(".slider .item.active").removeClass("active");

    $('.slider-nav > a[data-id="' + $(this).attr("data-id") + '"]').addClass('active')

    $('.slider .item[data-id="' + $(this).attr("data-id") + '"]').addClass("active");

    time = timeReset;

  });

  $(".slider-control").on("click", function() {

    var $activeItem = $(".slider > .item.active");

    var $nextItem = $activeItem.next();

    var $prevItem = $activeItem.prev();

    if($(this).hasClass('prev')){

      if($('.slider > .item').first().hasClass('active')){

        $(".slider > .item").first().removeClass("active");

        $(".slider-nav > a").first().removeClass("active");

        $('.slider > .item').last().addClass('active');

        $('.slider-nav > a').last().addClass('active');

      }

      else{

        $activeItem.removeClass('active');

        $('.slider-nav > a').removeClass('active');

        $prevItem.addClass('active');

        $('.slider-nav a[data-id="' + $prevItem.attr("data-id") +'"]').addClass("active");

      }

    }

    if($(this).hasClass('next')){

      if($('.slider > .item').last().hasClass('active')){

        $(".slider > .item").last().removeClass("active");

        $(".slider-nav > a").last().removeClass("active");

        $('.slider > .item').first().addClass('active');

        $('.slider-nav > a').first().addClass('active');

      }

      else{

        $activeItem.removeClass('active');

        $('.slider-nav > a').removeClass('active');

        $nextItem.addClass('active');

        $('.slider-nav a[data-id="' + $nextItem.attr("data-id") +'"]').addClass("active");

      }

    }

    time = timeReset;

  });

  

});





</script>







<script>

  $(document).ready(function(){

    

    $(".next").click(function(){

      $(".item").removeClass("active-right");

      $(".item").removeClass("active-left");

      $(".active").addClass("active-right");

    });



    $(".prev").click(function(){

      $(".item").removeClass("active-right");

      $(".item").removeClass("active-left");

      $(".active").addClass("active-left");

    });



});

</script> --}}



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


<script>
function formatNumber(number) {
            const numberStr = String(number);
            const numberLen = numberStr.length;
            let formatted = '';

            for (let i = numberLen - 1; i >= 0; i--) {
                formatted = numberStr[i] + formatted;
                if ((numberLen - i) % 3 === 0 && i !== 0) {
                    formatted = '.' + formatted;
                }
            }

            return formatted;
        }

        function thousandsCurrencyFormat(num) {
            if (num > 1000) {
                const x = Math.round(num);
                const x_number_format = x.toLocaleString();
                const x_array = x_number_format.split(',');
                const x_parts = ['k', 'm', 'b', 't'];
                const x_count_parts = x_array.length - 1;
                let x_display = num;
                x_display = x_array[0] + (parseInt(x_array[1][0]) !== 0 ? '.' + x_array[1][0] : '');
                x_display += x_parts[x_count_parts - 1];

                return x_display;
            }

            return num;
        }

   var route = "{{ url('autocomplete-influencer-search') }}";


   let cachedResults = [];

$('.influencer_search').typeahead({
    source: function (query, process) {
        return $.get(route, { query: query }, function (data) {
            cachedResults = data; 
            const sorted = data.sort((a, b) => b.verified - a.verified);
            return process(sorted.map(item => item.name));
        });
    },
    highlighter: function (item) {
        const match = cachedResults.find(u => u.name === item);
        const badge = match && match.verified
            ? `<img src="https://live.superfanss.app/assets/images/verified.png" alt="Verified" width="18" height="18" style="position:relative; bottom:2px; margin-left:5px;">`
            : '';
        return item + badge;
    },
    updater: function (item) {
        return item; // sets the input value
    },
    afterSelect: function (item) {
        const match = cachedResults.find(u => u.name === item);
        if (match) {
            window.location.href = "/" + match.name;
        }
    }
});



            var userRoute = "{{ url('autocomplete-user-search') }}";
            $('.user_search').typeahead({
                source: function(query, process) {
                    return $.get(userRoute, {
                        query: query
                    }, function(data) {
                        return process(data);
                    });
                },
                afterSelect: function(item) {
                    // window.location.href = "/influencer/user/"+item.name+"";
                    window.location.href = "/" + item.name + "";
                }
            });


 
</script>

<!-- <script>
     $(document).ready(function(){

      $(".like_post").click(function(){



          var post_id =  $(this).attr("post_id");



          



          $.ajax({

              url: '{{URL::to('/user/like_dislike_post')}}',

              type: 'GET',

              data: { 'post_id':post_id },

              success: function(response)

              {

                if (response == "post liked") {

                $(".post_icon_" + post_id + "").removeClass("icon-heart-o");

                $(".post_icon_" + post_id + "").addClass("icon-heart");


                var post_likes_str = $(".post_likes_value_" + post_id + "").text();

                var post_likes = parseInt(post_likes_str);

                post_likes = Number(post_likes) + 1;

                $(".post_likes_" + post_id + "").text(formatNumber(post_likes));
                $(".post_likes_value_" + post_id + "").text(post_likes);

                var number_of_likes_str = $(".likes_value").text();

                var number_of_likes = parseInt(number_of_likes_str);
                number_of_likes = Number(number_of_likes) + 1;

                $(".number_of_likes").text(thousandsCurrencyFormat(number_of_likes));
                $(".likes_value").text(number_of_likes);
                } else if (response == "post disliked") {

                $(".post_icon_" + post_id + "").removeClass("icon-heart");

                $(".post_icon_" + post_id + "").addClass("icon-heart-o");


                var post_likes_str = $(".post_likes_value_" + post_id + "").text();

                var post_likes = parseInt(post_likes_str);
                post_likes = Number(post_likes) - 1;
                if (post_likes < 0) post_likes = 0;
                $(".post_likes_" + post_id + "").text(formatNumber(post_likes));
                $(".post_likes_value_" + post_id + "").text(post_likes);


                var number_of_likes_str = $(".likes_value").text();

                number_of_likes = parseInt(number_of_likes_str);
                number_of_likes = Number(number_of_likes) - 1;

                if (number_of_likes < 0) number_of_likes = 0;

                $(".number_of_likes").text(thousandsCurrencyFormat(number_of_likes));
                $(".likes_value").text(number_of_likes);

                }


              }

          });









      });

  });

</script> -->


 <script>
  const clickDelay = 350;
  const clickTimers = {};

  document.querySelectorAll('.work-item').forEach(item => {
    item.addEventListener('click', e => {
      const postId = item.dataset.id;

      if (clickTimers[postId]) {
        clearTimeout(clickTimers[postId]);
        clickTimers[postId] = null;
        triggerLikeEffect(postId);
      } else {
        clickTimers[postId] = setTimeout(() => {
          openMedia(postId);
          clickTimers[postId] = null;
        }, clickDelay);
      }
    });
  });

  function openMedia(postId) {
    if (!postId) return;
    window.location.href = `/post/${postId}`;
  }

  function triggerLikeEffect(postId) {
    likeOrDislikePost(postId);

    const heart = document.getElementById(`heart-${postId}`);
    if (heart) {
      heart.classList.add('show');
      setTimeout(() => heart.classList.remove('show'), 600);
    }
  }

  function parseFormattedLikes(text) {
    text = text.replace(/,/g, '').toLowerCase().trim();
    if (text.includes('k')) return parseFloat(text) * 1000;
    if (text.includes('m')) return parseFloat(text) * 1000000;
    return parseInt(text.replace(/\./g, ''));
  }

  function formatNumber(number) {
    if (number >= 1000000) return (number / 1000000).toFixed(3).replace(/\.0$/, '') + '';
    if (number >= 1000) return (number / 1000).toFixed(3).replace(/\.0$/, '') + '';
    return number.toString();
  }

  function likeOrDislikePost(postId) {
    $.ajax({
      url: '{{ URL::to("/user/like_dislike_post") }}',
      type: 'GET',
      data: { post_id: postId },
      success: function (response) {
        const icon = $(".post_icon_" + postId);
        const globalLikeCountSpan = $(".number_of_likes");
        const postLikeCountSpan = $(".post_likes_" + postId);

        let globalLikes = parseFormattedLikes(globalLikeCountSpan.text());
        let postLikes = parseFormattedLikes(postLikeCountSpan.text());

        if (isNaN(globalLikes)) globalLikes = 0;
        if (isNaN(postLikes)) postLikes = 0;

        if (response === "post liked") {
          icon.removeClass("icon-heart-o").addClass("icon-heart");
          globalLikes++;
          postLikes++;
        } else if (response === "post disliked") {
          icon.removeClass("icon-heart").addClass("icon-heart-o");
          globalLikes = Math.max(0, globalLikes - 1);
          postLikes = Math.max(0, postLikes - 1);
        }

        globalLikeCountSpan.text(formatNumber(globalLikes));
        postLikeCountSpan.text(formatNumber(postLikes));
      }
    });
  }

  $(".like_post").click(function () {
    const postId = $(this).attr("post_id");
    likeOrDislikePost(postId);
  });
</script>

<script>
  $(document).ready(function(){
  $(".feed_posts_heading_pi").click(function(event){
    event.preventDefault();
    var href = $(this).attr("href");
    window.location.href = href;
  });
});
</script>

<?php
function format_number($number) {
    $number_str = (string) $number;
    $number_len = strlen($number_str);
    $formatted = '';
    for ($i = $number_len - 1; $i >= 0; $i--) {
        $formatted = $number_str[$i] . $formatted;
        if (($number_len - $i) % 3 === 0 && $i !== 0) {
            $formatted = '.' . $formatted;
        }
    }
    return $formatted;
}

?>




@endsection