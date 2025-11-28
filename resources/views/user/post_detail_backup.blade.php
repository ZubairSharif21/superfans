@extends('layouts.main')

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/css/spotlight.min.css">
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

.btn-outline:hover {
  color: #da1212 !important;
  background: #fff !important; 
}

.btn-outline-default:hover {
  color: #fff !important;
  background: #da1212 !important; 
}

</style>




<div id="fh5co-page">
    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle play-sound1" ><i></i></a>
    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">

      @php
      $user = DB::table('users')->where('id',Auth::user()->id)->first();
      @endphp
        <h1 id="fh5co-logo" style="margin-bottom: 0px;" ><a href="{{ URL('/user')}}"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 54%;"></a></h1>
        @php
              

              if(Auth::user()->id != $current_post->influencer_id ) {

                  $other_user = DB::table('users')->where('id',$current_post->influencer_id)->first();
              }

          @endphp
        <p style="
        margin-bottom: 0px !important;
        width: fit-content;
        margin-left: auto;
        margin-right: auto;
        border: 5px solid black;
        color: #c3c3c3;
        background-color: #585858;
        font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
        padding-left: 6px;
        padding-right: 6px;
        font-size: 14px;">@if (Auth::user()->id != $current_post->influencer_id)
        <span style="width: 10px;
        height: 10px;
        background-color: #0ed145;
        display: inline-block;
        margin-right: 5px;
        border-radius: 30px;vertical-align: middle;"></span><span>@</span>{{$other_user->username_URL}}
    @else
    <span style="width: 10px;
        height: 10px;
        background-color: #0ed145;
        display: inline-block;
        margin-right: 5px;
        border-radius: 30px;vertical-align: middle;"></span><span>@</span>{{$user->username_URL}}
    @endif </p>
        
          
          @if (Auth::user()->id != $current_post->influencer_id)
          
          @php
            $username_URL = $other_user->username_URL;
          @endphp

          @php
            $influencer_id = $current_post->influencer_id;
            $influencer = DB::table('users')->where('id',$influencer_id)->first();
          @endphp

          <ul style="list-style-type: none;display: flex;font-size: 14px;width: 100%;justify-content: space-between;padding: 0px 26%;max-width: 300px;text-align: center;margin-left: auto;margin-right: auto;">
          <li> <a @if ($influencer->role == "influencer") 
            href="{{ URL('/user/influencer/'.$username_URL.'')}}"
            @else 
            href="{{ URL('/user/user/'.$username_URL.'')}}"
            @endif  style="text-transform: uppercase;
            color: #222;
            font-size: 0.83em;
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.wall') }}</a> </li>
          <li> <a @if ($influencer->role == "influencer")
            href="{{ URL('/user/influencer_posts/'.$username_URL.'')}}"
          @else
          href="{{ URL('/user/user_posts/'.$username_URL.'')}}"
          @endif  style="text-decoration: underline;text-transform: uppercase;
            color: #222;
            font-size: 0.83em;
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.posts') }}</a> </li>
          </ul>
          @else
          <ul style="list-style-type: none;font-size: 14px;width: 100%;padding: 0px 26%;">
            <li style="text-align: center;"> <a href="#" style="pointer-events: none;text-transform: uppercase;
              color: #222;
              font-size: 0.83em;
              font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.wall') }}</a> </li>
          </ul>
          @endif

        <center>
        <nav id="fh5co-main-menu" role="navigation">
            <ul>
              <li style="margin-bottom: 30px;"><a class="streaming_anchor" data-toggle="modal" data-target="#streamingModalCenter" style="cursor: pointer;margin-bottom: 0px;"><span style="width: 17px;height: 17px;background-color: red;display: inline-block;border-radius: 30px;border: 4px solid black;position: relative;top: 3px !important;"></span> Streaming<!--Subscribe <b>+</b>--></a></li>

              {{-- <li>
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
                  <div id="slider_id" class="slider" style="width: 100%;margin: 0px;height: 140px;box-shadow: none;">
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
                                  <a href="{{$Influencer_networks_profile_links[$index]}}"><img src="{{ asset('assets/images/'.$socialnetwork_image.'') }}" width="69px" @if ($socialnetwork->id == 3  )
                                    style="max-width: 69px;max-height: 69px;margin-top: 10px;"
                                  
                                  @elseif($socialnetwork->id == 1 || $socialnetwork->id == 41 || $socialnetwork->id == 71 )
                                    style="width: 75px;margin-top: -6px;"
                                    @elseif($socialnetwork->id == 73)
                                    style="width: 75px;margin-top: 4px;"  
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
                <hr style="margin-bottom: 40px;">               
                @endif
  
  
              </li> --}}
           


              <li >
                  @php
                  if(Auth::user()->id != $current_post->influencer_id) {
                    $user = DB::table('users')->where('id',$current_post->influencer_id)->first();
                  } else {
                    $user = DB::table('users')->where('id',Auth::user()->id)->first();
                  }
                  
                
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
                        
                                                    
                        

                        @php
                            $first_network = 1;
                            $index = 0;
                        @endphp

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
                        

                        
                    </div>
                  </div> 
                  <hr style="margin-bottom: 20px;">                       
                  @endif


              </li>
              <li ><a href="{{ URL('/user/')}}">{{ __('nav.wall') }}</a></li>
                <li ><a href="{{ URL('/user/feed')}}">{{ __('nav.feed') }}</a></li>
                <li @if (Auth::user()->id != $current_post->influencer_id) @else class="fh5co-active" @endif><a href="{{ URL('/user/posts')}}">{{ __('nav.posts') }}</a></li><br>
                <hr style="margin-top: -17px;">
                
                {{-- <li class="username_li" style="font-size: 80%;"><p data-toggle="modal" data-target="#exampleModalCenter" style="cursor: pointer;white-space: nowrap;"><b>@</b><b>{{$user->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p></li> --}}
                <li class="username_li" style="font-size: 80%;">
                  <div class="">
                    <p id="dropdownMenuButton" data-toggle="collapse" data-target="#demo" style="cursor: pointer;white-space: nowrap;transition: 0.3s;"><b>@</b><b>{{$user->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p>
                    <div class="collapse-div collapse" id="demo" style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;">  <p class="dropdown-item control_panel_item"  data-target="#exampleModalCenter" style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;"><i class="far fa-user-circle" ></i> {{ __('nav.control_panel') }}</p>
                       {{-- <p class="dropdown-item control_panel_item"  data-target="#userModalCenter" style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;"><i class="far fa-user-circle" ></i> {{ __('nav.control_panel') }}</p> --}}
                    <p class="dropdown-item add_post_item" data-toggle="modal" data-target="#add_post_modal" style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;"><i class="fa fa-plus" ></i> {{ __('nav.add_post') }}</p>
                    </div>
                  </div>
  
                </li>
                <hr style="margin-top: -1px;">
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
                
                <li><a href="{{Auth::user()->instagram_link}}"><i class="icon-instagram" style="font-size: 2.1em;"></i></a></li>
                <!--<li><a href="https://www.twitch.com/" target="_blank"><i class="icon-twitch" style="font-size: 2.1em;"></i></a></li>
                    <li><a href="https://www.youtube.com/" target="_blank"><i class="icon-youtube" style="font-size: 2.1em;"></i></a></li>-->
            </ul><br>
            <p><small><span><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </span><br>&copy; 2021-2025  @if(Auth::user()->footer_name_username == "username") <span style="display: inline-block;">@</span>{{Auth::user()->username_URL}} @else {{Auth::user()->name}} {{Auth::user()->surname}} @endif  <br>{{ __('footer.all_rights_reserved') }}</span> <span>{{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a> </span> </small></p>
        </div>

    </aside>

    

    <div id="fh5co-main">
      
        <div class="fh5co-narrow-content">
          @if(session()->has('duplicate_error'))
          <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">
              {{ session()->get('duplicate_error') }}
          </div>
        @endif

        <div class="row">
                
          <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
              <figure class="text-center">
                  @php
                      $image_video = $current_post->image_video;
                  @endphp
                  
                  @php
                    

                    $influencer_id = $current_post->influencer_id;
                    $influencer = DB::table('users')->where('id',$influencer_id)->first();
                    $user_id = Auth::user()->id;
                    if($influencer->role == "influencer") {
                      $subscription = DB::table('subscriptions')->where('user_id',$user_id)->where('influencer_id',$influencer_id)->first();
                    } else {
                      $subscription = DB::table('followerships')->where('follower_user_id',$user_id)->where('followed_user_id',$influencer_id)->first();
                    }

                    



                    @endphp

                    @if ($user_id == $influencer_id)
                            <center>
                              
                              @foreach($posts as $post) 
                              @php
                                      $image_video = $post->image_video;
                                      $file_extension = substr($image_video, strpos($image_video, ".") + 1);
                              @endphp        
                              
                              @if (($file_extension == "mp4" || $file_extension == "webm") && $image_video == $current_post->image_video)
                              <a class="spotlight" data-media="video"
                              data-src-mp4="{{ asset('assets/images/'.$image_video.'') }}"
                              data-poster="{{ asset('assets/images/superlogo.jpg') }}"
                              data-autoplay="true"
                              data-muted="true"
                              data-preload="true"
                              data-controls="true"
                              data-inline="true"
                              data-page="false" data-autofit="false" >
                            
                              <video controlsList="nodownload"  style="max-width: 100%;" controls muted>
                                <source src="{{ asset('assets/images/'.$image_video.'') }}" data-toggle="modal" data-target="#postimageModalCenter"  type="video/mp4" >
                                  
                              </video>
                              </a>  
                      @elseif (($file_extension == "mp4" || $file_extension == "webm") && $image_video != $current_post->image_video)
                                      <a class="spotlight" data-media="video" style="display: none;"
                                      data-src-mp4="{{ asset('assets/images/'.$image_video.'') }}"
                                      data-poster="{{ asset('assets/images/superlogo.jpg') }}"
                                      data-autoplay="true"
                                      data-muted="true"
                                      data-preload="true"
                                      data-controls="true"
                                      data-inline="false"
                                      data-page="false" data-autofit="false" >
                                      </a> 
                                      @endif

                                      
                                      @if($image_video == $current_post->image_video && ($file_extension == "jpg" || $file_extension == "jpeg" || $file_extension == "png" || $file_extension == "svg"))
                                      <a href="{{ asset('assets/images/'.$image_video.'') }}"  class="spotlight" data-page="false" data-autofit="false" />
                                        <img src="{{ asset('assets/images/'.$image_video.'') }}" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;max-width: 100%;max-height: 411px;"/>
                                      </a>
                                      @elseif($image_video != $current_post->image_video && ($file_extension == "jpg" || $file_extension == "jpeg" || $file_extension == "png" || $file_extension == "svg"))
                                      <a href="{{ asset('assets/images/'.$image_video.'') }}"  class="spotlight" data-page="false" data-autofit="false" style="display:none"/>
                                      <img src="{{ asset('assets/images/'.$image_video.'') }}" />
                                    </a>
                                      @endif

                                      @endforeach
                                      
                                    </center>
                                    
                                          
                              </figure>
                            </div>
                            
                            {{-- <center>
                              <span data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-outline"style="width: 226px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.follow') }}  <b>+</b> | <b>${{$influencer->price_of_subscription}}</b></span><br>
                            </center> --}}

                            @php
                            $post_likes_count = DB::table('likes')->where('post_id',$current_post->id)->count();

                            $check_post_like = DB::table('likes')->where('post_id',$current_post->id)->where('user_id',Auth::user()->id)->count();
                        @endphp
                            
                            <center>
                                <span class="btn btn-primary btn-outline like_post"target="_blank"style="width: 292px !important;"  post_id="{{$current_post->id}}">
                                    <img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 15.47%; position: relative; left: -7px;"> Like <b><i class="@if($check_post_like == null) icon-heart-o @else icon-heart  @endif  post_icon_{{$current_post->id}}" aria-hidden="true"></i></b>
                                </span>
                            </center>
           
                    @else

                            @if ($subscription === null)
                            <center><img src="{{ asset('assets/images/blue24.png') }}" alt="Nueva Modelo Superfans - Ã‚Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important;  border: 7px solid lightgray;">

                            </center>
                                        
                                              
                            </figure>
                          </div>
                          
                          
                            @php
                              $influencer_id = $current_post->influencer_id;

                              $influencer = DB::table('users')->where('id',$influencer_id)->first();
                            @endphp



                            @if ($influencer->role == "influencer")
                                
                                <center>
                                  <span data-toggle="modal" data-target="#paymentModalCenter" class="btn btn-primary btn-outline btn-outline-default" style="width: 364px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 38px; position: relative; left: -4px;">{{ __('content.subscribe') }} <b>+</b> To see this post | <b>${{$influencer->price_of_subscription}}</b></span><br>
                                </center>
                                <div class="modal" id="paymentModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123122;">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content" style="border-radius: 20px;background: red;">
                                      <div class="modal-header" style="border: 0px">
                                        <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close" style="font-size: 45px;opacity: 12;color: white;margin-top: -15px;">
                                          <span aria-hidden="true" >&times;</span>
                                        </button>
                                        <div style="text-align: center">
                                          <br>
                                        <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;" alt="">
                                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 30px;text-align: center;color: white;display: inline-block;">Pay with Credit card</h5>
                                      </div>
                                      </div>
                                      <div class="modal-body" style="border: 0px">
                                
                                          <div class="container-fluid">
                                            {{-- <h2 style="color: white;">Pay with card</h2> --}}
                                            <div class="row">
                    
                                              <div class="col-md-2">
                    
                                              </div>
                                          
                                              <div class="col-12 col-md-8 ">
                                        
                                                @php
                                                    $influencer_id = $current_post->influencer_id;
                    
                                                    $influencer = DB::table('users')->where('id',$influencer_id)->first();
                                                @endphp
                    
                                        <form role="form" action="{{ route('stripe.post') }}" method="post"
                                                class="require-validation" data-cc-on-file="false"
                                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" style="text-align: left;color: white;">
                                                @csrf
                    
                                                
                                                <input type="hidden" name="amount" value="{{$influencer->price_of_subscription}}">
                    
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    
                                                <input type="hidden" name="influencer_id" value="{{$influencer->id}}">
                    
                    
                                                <div class='form-row row'>
                                                    <div class='col-12 form-group required'>
                                                        <label class='control-label'>Name on Card</label> <input class='form-control'
                                                            size='4' type='text' style="color: white;border-color: white;">
                                                    </div>
                                                </div>
                    
                                                <div class='form-row row'>
                                                    <div class='col-12 form-group card required'>
                                                        <label class='control-label'>Card Number</label> <input autocomplete='off'
                                                            class='form-control card-number' size='20' type='text' style="color: white;border-color: white;">
                                                    </div>
                                                </div>
                    
                                                <div class='form-row row'>
                                                    <div class='col-12 col-md-12 form-group cvc required' style="padding: 0px;">
                                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                            class='form-control card-cvc' placeholder='CVC / CVV / Security number' size='4' type='text' style="color: white;border-color: white;">
                                                    </div>
                                                    <div class='col-12 col-md-12 form-group expiration required' style="padding: 0px;">
                                                        <label class='control-label'>Expiration Month</label> <input
                                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                                            type='text' style="color: white;border-color: white;">
                                                    </div>
                                                    <div class='col-12 col-md-12 form-group expiration required' style="padding: 0px;">
                                                        <label class='control-label'>Expiration Year</label> <input
                                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                            type='text' style="color: white;border-color: white;">
                                                    </div>
                                                </div>
                    
                                                <div style="margin-bottom: 30px; ">
                                                  <p style="margin: 0px;"><img src="{{ asset('assets/images/cardesecurity.png') }}" alt="" style="width: 50px;"> Your credit card payments will always be safe</p>
                                                </div>
                    
                    
                    
                                                <div class="row">
                                                    <div class="col-12">
                                                        <button class="btn btn-block mb-3" type="submit"
                                                            style="max-width: 80px;margin-left: auto;margin-right: auto;color: #333;-webkit-color: #333;-moz-color: #333;background: #efefef;-webkit-background: #efefef;-moz-background: #efefef;background: transparent;-webkit-background: transparent;-moz-background: transparent;color: white;-webkit-color: white;-moz-color: white;border: 2px solid white;">Pay</button>
                                                    </div>
                                                </div>
                    
                                        </form>
                    
                                        <p style="font-size:0.74em;">
                                ðŸ‡ªðŸ‡¸ Usted se suscribirÃ¡ a la tarifa mensual base de un Influencer con TRES meses de permanencia si se suscribe a una tarifa de oferta de bienvenida inferior a unÂ dÃ³larÂ oÂ unÂ euro <br>
                                ðŸ‡ºðŸ‡¸ You will be subscribed to the base monthly rate of an Influencer with a three-month commitment if you subscribe to a welcome offer rate of less than one dollarÂ orÂ oneÂ euro.</p>
                        <!--<hr style="border-top: 6px solid #eeeeee;">-->
                    
                                        <div style="text-align: center">
                                          <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;" alt="">
                                          <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 30px;text-align: center;color: white;display: inline-block;">Pay with Paypal</h5>
                                        </div>
                    
                                        {{-- <form action="{{ url('/user/charge') }}" method="post" style="text-align: end;">
                    
                                          <input type="hidden" id="paypal_amount" name="amount" value="{{$user->price_of_subscription}}" />
                    
                                          
                                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    
                                          <input type="hidden" name="influencer_id" value="{{$user->id}}">
                    
                    
                                          {{ csrf_field() }}
                                          <input type="submit" name="submit" class="mt-4 btn btn-primary"
                                              style=" cursor: pointer; "
                                              value="Pay with Paypal">
                                      </form> --}}
                    
                    
                                        @php
                                          $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
                                          $paypal_email = 'info@phpzag.com';
                                        @endphp 
                    
                    
                                  <form action="<?php echo $paypal_url; ?>" method="post">			
                                    <!-- Paypal business test account email id so that you can collect the payments. -->
                                    <input type="hidden" name="business" value="<?php echo $paypal_email; ?>">			
                                    <!-- Buy Now button. -->
                                    <input type="hidden" name="cmd" value="_xclick">			
                                    <!-- Details about the item that buyers will purchase. -->
                                    <input type="hidden" name="item_name" value="">
                                    <input type="hidden" name="item_number" value="">
                                    <input type="hidden" name="amount" value="{{$influencer->price_of_subscription}}">
                                    <input type="hidden" name="currency_code" value="USD">			
                                    <!-- URLs -->
                                    <input type='hidden' name='cancel_return' value='http://localhost/paypal_integration_php/cancel.php'>
                                    <input type='hidden' name='return' value='{{url('/user/success_payment_paypal')}}'>						
                                    <!-- payment button. -->
                                    {{-- <input type="image" name="submit" border="0"
                                    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online"> --}}
                                    <button type="submit" name="submit" class="btn btn-block mb-3"
                                    style="max-width: 80px;margin-left: auto;margin-right: auto;color: #333;-webkit-color: #333;-moz-color: #333;background: #efefef;-webkit-background: #efefef;-moz-background: #efefef;background: transparent;-webkit-background: transparent;-moz-background: transparent;color: white;-webkit-color: white;-moz-color: white;border: 2px solid white;">Pay</button>
                                    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >    
                                    </form>
                    
                    
                                      </div>
                    
                                      </div>
                    
                                      </div>
                    
                                      </div>
                                
                                    </div>
                                  </div>
                                </div>
                        
                              
                            @else

                              <form action="{{ url('/user/follow') }}" method="post" enctype="multipart/form-data">
                                @csrf                  
                                  <input type="hidden" name="followed_user_id" value="{{ $influencer_id }}">
                                  <input type="hidden" name="follower_user_id" value="{{ Auth::user()->id }}">
                                  <center>
                                    <button @if(Auth::user()->id == $user->id) data-toggle="modal" data-target="#userModalCenter" type="button" @endif class="btn btn-primary btn-outline" style="width: 226px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.follow') }}  <b>+</b></button><br>
                                  </center>
                              </form>

                                
                            @endif


                       
                    @else
                    <center>
                                  
                                @endphp

                                
                          @foreach($posts as $post) 
                          @php
                                  $image_video = $post->image_video;
                                  $file_extension = substr($image_video, strpos($image_video, ".") + 1);
                          @endphp        
                          
                          @if (($file_extension == "mp4" || $file_extension == "webm") && $image_video == $current_post->image_video)
                          <a class="spotlight" data-media="video"
                          data-src-mp4="{{ asset('assets/images/'.$image_video.'') }}"
                          data-poster="{{ asset('assets/images/superlogo.jpg') }}"
                          data-autoplay="true"
                          data-muted="true"
                          data-preload="true"
                          data-controls="true"
                          data-inline="true"
                          data-page="false" data-autofit="false" >
                        
                          <video controlsList="nodownload"  style="max-width: 100%;" controls muted>
                            <source src="{{ asset('assets/images/'.$image_video.'') }}" data-toggle="modal" data-target="#postimageModalCenter"  type="video/mp4" >
                              
                          </video>
                          </a>  
                          @elseif (($file_extension == "mp4" || $file_extension == "webm") && $image_video != $current_post->image_video)
                          <a class="spotlight" data-media="video" style="display: none;"
                          data-src-mp4="{{ asset('assets/images/'.$image_video.'') }}"
                          data-poster="{{ asset('assets/images/superlogo.jpg') }}"
                          data-autoplay="true"
                          data-muted="true"
                          data-preload="true"
                          data-controls="true"
                          data-inline="false"
                          data-page="false" data-autofit="false" >
                          </a> 
                          @endif

                          
                          @if($image_video == $current_post->image_video && ($file_extension == "jpg" || $file_extension == "jpeg" || $file_extension == "png" || $file_extension == "svg"))
                          <a href="{{ asset('assets/images/'.$image_video.'') }}"  class="spotlight" data-page="false" data-autofit="false" />
                            <img src="{{ asset('assets/images/'.$image_video.'') }}" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;max-width: 100%;max-height: 411px;"/>
                          </a>
                          @elseif($image_video != $current_post->image_video && ($file_extension == "jpg" || $file_extension == "jpeg" || $file_extension == "png" || $file_extension == "svg"))
                          <a href="{{ asset('assets/images/'.$image_video.'') }}"  class="spotlight" data-page="false" data-autofit="false" style="display:none"/>
                          <img src="{{ asset('assets/images/'.$image_video.'') }}" />
                        </a>
                          @endif

                          @endforeach
                          
                                {{-- @if ($file_extension == "mp4" || $file_extension == "webm" || $file_extension == "mov" || $file_extension == "MOV")
                                <video controlsList="nodownload"  style="max-width: 100%;"  controls>
                                  <source src="{{ asset('assets/images/'.$image_video.'') }}" data-toggle="modal" data-target="#postimageModalCenter" type="video/mp4" >
                                    
                                </video>
                                @else
                                    <img src="{{ asset('assets/images/'.$image_video.'') }}" data-toggle="modal" data-target="#postimageModalCenter" alt="Nueva Modelo Superfans - Ã‚Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;max-width: 100%;max-height: 411px;">    
                                @endif --}}
                      {{-- <img src="{{ asset('assets/images/'.$image_video.'') }}" alt="Nueva Modelo Superfans - Ã‚Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important;  border: 7px solid lightgray;"> --}}

                    </center>

                          
              </figure>
            </div>

            @php
            $post_likes_count = DB::table('likes')->where('post_id',$current_post->id)->count();

            $check_post_like = DB::table('likes')->where('post_id',$current_post->id)->where('user_id',Auth::user()->id)->count();
        @endphp
            
            <center>
                <span class="btn btn-primary btn-outline like_post"target="_blank"style="width: 292px !important;"  post_id="{{$current_post->id}}">
                    <img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 15.47%; position: relative; left: -7px;"> Like <b><i class="@if($check_post_like == null) icon-heart-o @else icon-heart  @endif  post_icon_{{$current_post->id}}" aria-hidden="true"></i></b>
                </span>
            </center>
           
                    @endif
                    
                    @endif
               
      </div>


            <div class="row work-pagination animate-box" data-animate-effect="fadeInLeft">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0">

                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                        @if (isset($prev_post_id))
                        <a href="{{ URL('/user/post_detail/'.$next_post_id.'')}}"><i class="icon-long-arrow-left"></i> <span>Anterior</span></a>    
                        @else
                        <p ><i class="icon-long-arrow-left"></i> <span>Anterior</span></p>
                        @endif
                        
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                        <a @if (Auth::user()->id != $current_post->influencer_id)
 
                          @php
                              $current_influencer = DB::table('users')->where('id',$current_post->influencer_id)->first();
                          @endphp
                          
                          @if ($current_influencer->role == "user")
                          href="{{ URL('/user/user_posts/'.$username_URL.'')}}"
                          @else
                          href="{{ URL('/user/influencer_posts/'.$username_URL.'')}}"    
                          @endif

                          

                        @else
                          href="{{ URL('/user/posts')}}"
                        @endif 
                        ><i class="icon-th-large"></i></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                        @if (isset($next_post_id))
                        <a href="{{ URL('/user/post_detail/'.$prev_post_id.'')}}"><span>Siguiente</span> <i class="icon-long-arrow-right"></i></a>    
                        @else
                        <p ><span>Siguiente</span> <i class="icon-long-arrow-right"></i></p>
                        @endif
                        
                    </div>
                </div>
            </div>

        </div>
                
                
                
                    </div>
                  </div>
                


                  
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="https://rawcdn.githack.com/nextapps-de/spotlight/0.7.8/dist/js/spotlight.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">

var route = "{{ url('autocomplete-influencer-search') }}";


let cachedResults = [];

$('.influencer_search').typeahead({
    source: function (query, process) {
        return $.get(route, { query: query }, function (data) {
            cachedResults = data; 
            return process(data.map(item => item.name));  Typeahead
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



$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                'input[type=text]', 'input[type=file]',
                'textarea'
            ].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('hide');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>




<script>
  $(document).ready(function(){
      $(".like_post").click(function(){

          var post_id =  $(this).attr("post_id");

          

          $.ajax({
              url: '{{URL::to('/user/like_dislike_post')}}',
              type: 'GET',
              data: { 'post_id':post_id },
              success: function(response)
              {

                if(response == "post liked") {

                  
                  $(".post_icon_"+post_id+"").removeClass("icon-heart-o");
                  $(".post_icon_"+post_id+"").addClass("icon-heart");

                  var number_of_likes = $(".number_of_likes").text();
                  var number_of_likes = parseInt(number_of_likes);
                  number_of_likes = number_of_likes + 1;
                  $(".number_of_likes").text("");
                  $(".number_of_likes").text(number_of_likes);


                  var post_likes = $(".post_likes_"+post_id+"").text();
                  var post_likes = parseInt(post_likes);
                  post_likes = post_likes + 1;
                  $(".post_likes_"+post_id+"").text("");
                  $(".post_likes_"+post_id+"").text(post_likes);



                } else if(response == "post disliked") {
                  $(".post_icon_"+post_id+"").removeClass("icon-heart");
                  $(".post_icon_"+post_id+"").addClass("icon-heart-o");

                  var number_of_likes = $(".number_of_likes").text();
                  var number_of_likes = parseInt(number_of_likes);
                  number_of_likes = number_of_likes - 1;
                  $(".number_of_likes").text("");
                  $(".number_of_likes").text(number_of_likes);


                  var post_likes = $(".post_likes_"+post_id+"").text();
                  var post_likes = parseInt(post_likes);
                  post_likes = post_likes - 1;
                  $(".post_likes_"+post_id+"").text("");
                  $(".post_likes_"+post_id+"").text(post_likes);

                } 

              }
          });




      });
  });
</script>



@endsection