@if (Auth::check())
    @php
        $user = Auth::user();
        
        if ($user->role === 'influencer') {
            $redirectUrl = url('influencer/world');
        } else {
            $redirectUrl = url('/user/world');
        }
    @endphp

    <script>
        window.location.href = "{{ $redirectUrl }}";
    </script>

    @php
        exit;
    @endphp
@endif



@extends('layouts_direct_user.main')

@section('content_direct_user')
@php
    function format_number($number) {
        if ($number >= 1000 && $number < 1000000) {
            return round($number / 1000, 1) . 'K';
        } elseif ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } else {
            return $number;
        }
    }
@endphp

<style>
    .modal_input::placeholder {
        color: white;
    }

    .modal_input,
    .modal_input:focus {
        border: 2px solid white;
    }




    .new_button_hover1 {
        padding: 7px 11px !important;
        border: 2px solid black !important;
        background-color: #fff !important;
        color: black !important;
    }

    .new_button_hover1:hover {
        padding: 7px 11px !important;
        border: 2px solid black !important;
        background-color: #000 !important;
        color: #fff !important;
    }

    .new_button_hover2 {
        padding: 7px 11px !important;
        border: 2px solid black !important;
        color: #000 !important;
    }

    .new_button_hover2:hover {
        padding: 7px 11px !important;
        background: black !important;
        color: #fff !important;
    }

    .new_button3 {
        font-weight: bold !important;
    }

    .new_button3:hover {
        background: #000 !important;
        color: #fff !important;
    }

    .button_hover_underlined:hover {
        text-decoration: underline !important;

    }
        #tourModal .modal-dialog,
#tourModal .modal-content,
#tourModal .payment_modal {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
}

#tourModal *,
#tourModal *:focus,
#tourModal *:active {
    outline: none !important;
    box-shadow: none !important;
}
        .payment_modal {
        background: #8a2be2;
        color: white !important;
        text-align: center;
        border-radius: 7px;
        border: none;
        box-shadow: none;
    }

.payment_modal button {
    padding: 8px 20px;
    background: transparent !important;
        color: black;
        border: none;
        outline: none;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 35px !important;
        margin-top: 10px;
        transition: .3s;
    }

    .payment_modal button:hover {
        background: black;
        color: white;
    }
</style>

<style>
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
    
        .message-tag:hover {
    color: white !important;
    background: #5cb85c !important;
    border: 1px solid #409c40 !important;
    transition: 0.3s;
    text-decoration: none;
}

</style>

<style>
@media screen and (max-width: 480px) {
    .col-xxs-12 {
        float: right !important;
        width: 100% !important;
    }
}
</style>

<style>
    .world_after a:after {
        background-color: #ffc83d !important;
    }
    
.btn-dark {
    background:transparent; 
    border:3px solid black !important; 
    color:black; 
    font-weight:500; 
    font-size:14px; 
    padding:4px 10px; 
    text-decoration:none; 
    cursor:pointer;
}

.btn-dark:hover {
    background: #000;
    color: #fff;
    border: 3px solid #000;
}
</style>

<style>
.image-hover-wrapper:hover .report-button {
    display: block !important;
}

@media screen and (max-width: 880px) {
    .report-button {
        display:none !important;
    } 
    .image-hover-wrapper:hover .report-button {
    display: none !important;
}
    .report-mobile {
        position: relative;
        bottom: 2px;
        display: inline-block !important;
    }
}
</style>

<style>
.tooltip-container {
    position: relative;
    display: inline-block;
    cursor: help;
}

.tooltip-text {
    visibility: hidden;
    background-color: #333;
    color: #fff;
    font-size: 13px;
    text-align: center;
    border-radius: 4px;
    padding: 6px 10px;
    position: absolute;
    z-index: 10;
    top: 125%;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.1s;
    white-space: normal; 
    max-width: 350px;    
    width: max-content;  
    min-width: 200px;    
    word-wrap: break-word; 
    font-weight:700;
    line-height: 1.2;
}


.tooltip-container:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
}
.tooltip-container .tooltip-text {
    visibility: hidden;
    opacity: 0;
}

.tooltip-container.show .tooltip-text {
    visibility: visible;
    opacity: 1;
}

.tooltip-text a {
    color: #007bff !important;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}

.tooltip-text a:hover {
     color: #007bff !important;
}


@media screen and (max-width: 600px) {
  .tooltip-text {
    left: 80% !important;
    transform: translateX(-90%) !important;
    max-width: 300vw;
    min-width: unset;
    width: 200px;
  }
  h2#influencerTitle {
      font-size:25px !important;
  }
  .tooltip-container {
      bottom: 2px !important;
  }
}
</style>
<style>
a.ranking-btn:hover {
  background:black;
  color:white;
}

 .tittlei {
      margin-left: 16% !important;
  }

/* Mobile: button + tooltip above welcome text */
@media screen and (max-width: 1200px) {
  .welcome-row {
    flex-direction: column-reverse !important;
    align-items: center !important;
  }
  .tittlei {
      margin-left: 0 !important;
  }
}
</style>


    <div id="fh5co-page">
        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle play-sound"><i></i></a>

        <aside id="fh5co-aside" role="complementary" class="border js-fullheight" data-simplebar data-simplebar-auto-hide="false">
            <h1 id="fh5co-logo" style="margin-bottom: 0px;">
                <a href="{{ URL('/') }}">
                    <img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 54%;">
                </a>
            </h1>
            
             <p
                   style="margin-bottom: 0px !important;width: fit-content;margin-left: auto;margin-right: auto;
            border: 5px solid black;color: #c3c3c3;background-color: #585858;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
            padding-left: 6px;padding-right: 6px;font-size: 14px;width: 50%;position: relative;overflow-x: hidden;overflow-y: hidden;">
                    <span
                        style="width: 20px;height: 20px;background: #585858;position: absolute;z-index: 2;left: 0px;"></span>
                    <span
                        style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;z-index: 3;position: absolute;left: 5px;top: 5px;"></span>
                    <span
                        style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;"></span>
                    <span style="display: inline-block;" class="arrow">
        {{ __('content.superfans_world') }}</span>
                </p>
           

           <nav id="fh5co-main-menu" role="navigation">

                    <ul>

                      

                     

                  

<li>
							<div>
								<div id="slider_id" class="slider" style="width: 100%;margin: 0px;height: 120px;box-shadow: none;margin-top: 30px;">
									<div class="slider-control next play-sound2"><i class="fa fa-angle-right" aria-hidden="true" style="color: #060605"></i></div>
									<div class="slider-control prev play-sound2"><i class="fa fa-angle-left" aria-hidden="true" style="color: #060605"></i></div>
<audio id="clickSound" src="{{ asset('assets/music/open.mp3') }}"></audio>

<audio id="clickSound1" src="{{ asset('assets/music/stars_effect_subscription.mp3') }}"></audio>
<audio id="clickSound2" src="{{ asset('assets/music/close.mp3') }}"></audio>



<audio id="clickSound3" src="https://live.superfanss.app/assets/music/coin-sound.mp3"></audio>
<audio id="clickSound4" src="{{ asset('assets/music/Home-run-bat.mp3') }}"></audio>
<audio id="clickSound5" src="{{ asset('assets/music/woosh-260275.mp3') }}"></audio>
<audio id="clickSound6" src="{{ asset('assets/music/stars_effect_subscription.mp3') }}"></audio>
<audio id="clickSound7" src="{{ asset('assets/music/fast-woosh-230497.mp3') }}"></audio>
<audio id="clickSound9" src="{{ asset('assets/music/stars_effect_subscription.mp3') }}"></audio>
    <script>
     const pattern = [4, 9];
     let patternIndex = 0;
     let clickCount = 0;
     
     
        
         document.querySelectorAll('.play-sound').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound').play();
            });
        });
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
         document.querySelectorAll('.play-sound9').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound9').play();
            });
        });
    </script>                  





									<div class="item  active" data-id="0">
										<div class="item-content">
											<a href="https://www.tiktok.com/"><img src="assets/images/b05db292060a4b42799ad7abaf5d6130.png" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>TikTok</b></a>
										</div>

									</div>



									<div class="item    " data-id="1">
										<div class="item-content">
											<a href="https://www.twitch.tv/"><img src="assets/images/twitch_.png" width="69px" style="width: 75px;margin-top: -6px;"><br>&nbsp;&nbsp;<b>Twitch</b></a>
										</div>

									</div>







									<div class="item  " data-id="2">
										<div class="item-content">
											<a href="https://www.youtube.com/"><img src="assets/images/Youtube_logo.png" width="69px" style="max-width: 69px;max-height: 69px;margin-top: 10px;"><br>&nbsp;&nbsp;<b>Youtube</b></a>
										</div>

									</div>



									<div class="item  " data-id="3">
										<div class="item-content">
											<a href="https://twitter.com/"><img src="assets/images/twitter-logo-6.png" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>Twitter</b></a>
										</div>

									</div>




									<div class="item  " data-id="4">
										<div class="item-content">
											<a href="https://www.netflix.com/"><img src="assets/images/netflix_logo_icon_170919.png" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>Netflix</b></a>
										</div>

									</div>



									<div class="item  " data-id="5">
										<div class="item-content">
											<a href="https://www.spotify.com/"><img src="assets/images/spotify-logoEdited.png" width="69px" style="width: 75px;margin-top: -6px;"><br>&nbsp;&nbsp;<b>Spotify</b></a>
										</div>

									</div>



									<div class="item  " data-id="6">
										<div class="item-content">
											<a href="https://www.apple.com/itunes/"><img src="assets/images/ituneslogo.png" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>iTunes</b></a>
										</div>

									</div>


									<div class="item  " data-id="7">
										<div class="item-content">
											<a href="https://www.21buttons.com/"><img src="assets/images/cbd6803ce32d2bbc9b4f00a6a92932bf.jpg" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>21Buttons</b></a>
										</div>

									</div>

									<div class="item  " data-id="8">
										<div class="item-content">
											<a href="https://discord.com/"><img src="assets/images/Discord-Logo.png" width="69px" style="width: 75px;margin-top: 4px;"><br>&nbsp;&nbsp;<b>Discord</b></a>
										</div>

									</div>



									<div class="item  " data-id="9">
										<div class="item-content">
											<a href="https://www.amazon.com/"><img src="assets/images/Logotipo-Amazon.jpg" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>Amazon</b></a>
										</div>

									</div>
									
									
										<div class="item  " data-id="9">
										<div class="item-content">
											<a href="https://www.instagram.com/"><img src="assets/images/Instagram_icon.png" width="69px" style="max-width: 69px;max-height: 69px;"><br>&nbsp;&nbsp;<b>Instagram</b></a>
										</div>

									</div>
									



								</div>

							</div>
						</li>
                                        


                               
 <hr style="margin-bottom: 20px; margin-top: 10px;">

                                                    <li class="login_btn world_after" style="margin-top: -5px;margin-bottom: 20px;">
                                <a href="/world"><b>{{ __('nav.world') }}</b></a>
                            </li>

                        


                        


                        


                        <hr style="margin-top: -10px;margin-bottom: 20px;">

                        


                       <!-- SEARCH BOX -->
                <li>  
                
                
                    
                
                            
                    <div class="wrapper" style="position: relative;">
                 <input type="text" id="influencer_search" class="" placeholder="{{ __('nav.search_influencer') }}" style="width: 100%;" autocomplete="off">
                 <span class="wrapper_span" id="search_icon" style="outline: 0;">🔍</span>
    

                <div id="suggestion-box" style="position: absolute; top: 100%; left: 0; right: 0; z-index:1000;">
                <ul id="suggestions" style="background: #fff; border: 1px solid #ccc; width: 100%; margin: 0; z-index: 1000; display: none; max-height: 150px; overflow-y: auto;"></ul>
               </div>
               </div>
                </li>
                        <br>
                        <hr style="margin-top: -10px;">


                    </ul>

                </nav>

            
                <div class="fh5co-footer" style="position:relative; bottom:0;">

                    <ul>
                        @if (Auth::check())
                            <li class="nav-item mx-2">
                                <a class="btn btn-danger"
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
                                <a class="btn btn-outline"
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
                                   href="https://live.superfanss.app/login"><i class="fa fa-power-off"
                                                                          aria-hidden="true"></i>
                                </a>
                            </li>
                        @endif


                        {{--                <li><a href="{{$user->instagram_link}}"><i class="icon-instagram" style="font-size: 2.1em;"></i></a></li> --}}

                        <!--<li><a href="https://www.twitch.com/" target="_blank"><i class="icon-twitch" style="font-size: 2.1em;"></i></a></li>

                                                <li><a href="https://www.youtube.com/" target="_blank"><i class="icon-youtube" style="font-size: 2.1em;"></i></a></li>-->

                    </ul>
                    <br>

                    <p><small><span><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </span><br>&copy; 2025 Superfans World S.L <br>All Rights
                            Reserved.</span> <span>{{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a> </span>
                        </small></p>
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
                </div>
        </aside>

        <div id="fh5co-main">
            <div class="fh5co-narrow-content">
<center>

  <img src="{{ url('assets/images/SUPERHEROINA.svg') }}" style="width:12.9em;">

  <div class="welcome-row" style="display:flex; align-items:center; justify-content:center; gap:10px; margin-top:10px; flex-wrap:wrap;">
    
    <!-- Welcome Text -->
    <h2 class="fh5co-heading animate-box tittlei"
        data-animate-effect="fadeInLeft"
        style="font-family:'Roboto Slab', serif; color:#dd2110; margin:0;">
      <span>
        <img src="{{ url('assets/images/Captura de pantalla 2025-04-28 011318.png') }}" style="width:1.15em;">
        {{ __('content.superfans_world_welcome') }}<br>
        {{ __('content.superfans_world') }}
      </span>
    </h2>

    <div style="display:flex; align-items:center; gap:5px; margin-left: 40px;">
         <a href="/rankings" 
         class="btn-dark btn">
        🏆 {{ __('content.see_rankings') }}
      </a>

    
    <span class="tooltip-container" 
           style="font-size:20px;  font-weight: 700; color: #000">
        ⓘ
        <span class="tooltip-text">
          {!! __('content.rank_msg') !!}
        </span>
      </span>
    </div>

  </div>
</center>
        <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".tooltip-container").forEach(function (el) {
        el.addEventListener("click", function (e) {
            // close other tooltips
            document.querySelectorAll(".tooltip-container").forEach(function (other) {
                if (other !== el) other.classList.remove("show");
            });
            // toggle current
            el.classList.toggle("show");
            e.stopPropagation();
        });
    });

    // close if clicked outside
    document.addEventListener("click", function () {
        document.querySelectorAll(".tooltip-container").forEach(function (el) {
            el.classList.remove("show");
        });
    });
});
</script>


                
                <div class="row animate-box" style="display: block;flex-wrap: wrap;" data-animate-effect="fadeInLeft">
                   <!--start here-->


@if (count($posts) > 0)
<div id="post-container">
    @foreach ($posts as $post)
    
           @if (isset($post->is_ad) && $post->is_ad)
{{-- AD BLOCK --}}
 @if (isset($post->content) && isset($post->content->media))
<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
   
        <a href="{{ $post->content->link }}" target="_blank">
              <p class="feed_posts_heading_p" style="position: relative; font-size:14px" >
                    <span>Super Ads</span>
                </p>
            {{-- Check if the media is a video or an image --}}
            @php
                $media_extension = pathinfo($post->content->media, PATHINFO_EXTENSION);
                $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
            @endphp

            @if (in_array(strtolower($media_extension), $video_extensions))
                {{-- Display video if media is a video --}}
                <video controlsList="nodownload" style="max-width: 100%;" controls loop 
    @if(isset($post->thumbnail) && $post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif>
                    <source src="{{ asset('assets/images/' . $post->content->media) }}" type="video/mp4">
                </video>
            @else
                {{-- Display image if media is an image --}}
                <img src="{{ asset('assets/images/' . $post->content->media) }}"
                     alt="Advertisement"
                     class="img-responsive"
                     style="border-radius: 26px; border: 7px solid lightgray; width: 100%;">
            @endif
        </a>
        </div>
    @else
       
 @endif

        @else 
        
        @php
            $post_id = $post->id;
            $image_video = $post->image_video;
            $thumbnail = $post->thumbnail;
            $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
            $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
            $tagged_users = $post->tags;
            $tagged_profiles = $post->tagged_profile_pictures;
                  
                       $tagged_userz = explode(',', $post->tags); 
                           $verified_statuses = DB::table('users')
                           ->whereIn('username_URL', $tagged_userz)
                           ->pluck('verified', 'username_URL');
    
            $post_user = DB::table('users')->where('id', $post->influencer_id)->first();
            $profile_picture = $post_user->profile_picture ?? 'output-onlinepngtools (2).png';
            $username_URL = $post_user->username_URL ?? 'unknown';

            $post_likes_count = $post->no_of_likes ?? 0;
            $check_post_like = DB::table('likes')->where('post_id', $post_id)->where('user_id', Auth::id())->count();
        @endphp

        <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item" style="margin-bottom: 20px;">

@php
    $taggedProfilesArray = explode(',', $post->tagged_profile_pictures);
    $taggedUsersArray = explode(',', $post->tags);
@endphp

@if (!empty($tagged_users))
<p class="feed_posts_heading_p" style="overflow: hidden; position: relative; width: 70%; height: 55px; top:25px; font-size:14px">
    <span class="marquee-text" style="display: inline-block; white-space: nowrap; animation: scroll-left 10s linear infinite;">
        <a style="color:black; display:inline-flex; align-items:center; margin-right: 10px;" href="/{{ $username_URL }}">
        <img class="feed_posts_heading_img" src="{{ asset('assets/images/' . $profile_picture) }}" alt="" style="margin-right: 10px;  margin-bottom: 0;">
                <span>@</span>{{ $username_URL }}
                </a>
   <span>@if($post_user->verified)
             <img src="https://live.superfanss.app/assets/images/verified.png" alt="Verified" width="18" height="18" style="position:relative; right:15px; bottom: 8px;">
    @endif</span>
        @php
            $taggedUsersArray = explode(',', $tagged_users);
            $taggedProfilesArray = explode(',', $tagged_profiles);
        @endphp

        @foreach ($taggedUsersArray as $index => $tagged)
            @php
                $trimmed = trim($tagged);
                $profileImage = trim($taggedProfilesArray[$index] ?? '');
                $isVerified = $verified_statuses[$trimmed] ?? false;
            @endphp

              @if ($profileImage && $trimmed)
                      
                <a style="color:black; display:inline-flex; align-items:center; margin-right: 10px;" href="/{{ $trimmed }}">
                    <img class="feed_posts_heading_img" src="{{ asset('assets/images/' . $profileImage) }}" alt="" style="margin-right: 10px;  margin-bottom: 0;">
                    <span>{{ '@' . $trimmed }}</span>
                </a>
                 <span>
                        @if ($isVerified)
                            <img src="https://live.superfanss.app/assets/images/verified.png" alt="Verified" width="18" height="18" style="position:relative; right:15px; bottom: 8px;">
                        @endif
                    </span>
                
            @endif
    

    @endforeach

        </span>
    </p>
@else
    {{-- Username only --}}
  <p class="feed_posts_heading_p" style="position: relative; top:25px; font-size:14px" >
      
                    <img class="feed_posts_heading_img" src="{{ asset('assets/images/' . $profile_picture) }}" alt="" >
                    <a style="color:black;" href="/{{$username_URL}}"><span>@</span>{{ $username_URL }} </span></a> <span>@if($post_user->verified)
        <img src="https://live.superfanss.app/assets/images/verified.png" alt="Verified" width="18" height="18" style="position:relative; right:5px; bottom: 1px;">
    @endif</span>
                </p>
@endif

         <div class="image-hover-wrapper" style="position: relative; display: inline-block; width: 100%;">

                {{-- Image or Video --}}
                 <a href="{{ URL('/post/' . $post_id) }}">
                @if (in_array(strtolower($file_extension), $video_extensions))
                
              <video controlsList="nodownload" style="max-width: 100%;" controls loop 
    @if(isset($post->thumbnail) && $post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif>
                        <source src="{{ asset('assets/images/' . $image_video) }}" type="video/mp4">
                    </video>
                @else
                    <img src="{{ asset('assets/images/' . $image_video) }}"
                         alt="Post Image"
                         class="img-responsive"
                         style="border-radius: 26px; border: 7px solid lightgray; width: 100%;">
                     </a>    
                                                  <!-- Report Button (hidden until hover) -->
    <button onclick="event.stopPropagation(); toggleReportOptions({{ $post->id }})"
        class="report-button"
            style="
                position: absolute;
                bottom: 20px;
                right: 20px;
                background-color: rgba(0,0,0,0.6);
                color: white;
                border: none;
                padding: 6px 10px;
                border-radius: 5px;
                font-size: 0.9rem;
                cursor: pointer;
                display: none;
            ">
    <img src="{{ asset('assets/images/arrowDown_.png') }}" alt="▼" style="width: 12px; height: 12px; position:relative; bottom:1px; right:2px;"> {{ __('report.title') }}
    </button>

    <!-- Report Options -->
    <div id="report-options-{{ $post->id }}"
          onclick="event.stopPropagation();"
         style="position: absolute; bottom: 45px; left: 50%; transform: translateX(-50%); background: white; border: 1px solid #ccc; border-radius: 6px; width: 90%; display: none; z-index: 10;">
  <ul style="list-style: none; margin: 0; padding: 0; background: #fff; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden; width: 100%; font-size:11px;">
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Excessive sensuality')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.sensuality') }}
        </a>
    </li>
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Impersonation')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.impersonation') }}
        </a>
    </li>
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Violence')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.violence') }}
        </a>
    </li>
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Racism')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.racism') }}
        </a>
    </li>
    <li>
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Other')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.other') }}
        </a>
    </li>
</ul>

    </div>
                @endif
            
            </div>

            {{-- Likes and Heart --}}
            
             <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats play-sound1" style="font-size: 0.69em; cursor:pointer;"><span
                            class="number_of_post_likes post_likes_{{ $post->id }}  play-sound1"  post_id="{{ $post->id }}" data-toggle="modal" data-target="#register_Modal">{{ format_number($post_likes_count ) }}</span></b><span
                    class="like_post play-sound1" style="cursor: pointer;" post_id="{{ $post->id }}"> <i
                        class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif  post_icon_{{ $post->id }} "
                        post_id="{{ $post->id }}" style="" data-toggle="modal" data-target="#register_Modal"></i>
            </span><span style="cursor: pointer;font-weight: 100;" class="indiviual_post_likes play-sound1"
                         post_id="{{ $post->id }}" data-toggle="modal" data-target="#register_Modal">{{ __('content.likes') }} </span></a>
                &nbsp;                                                   <!-- Report Button (hidden until hover) -->
    <button onclick="event.stopPropagation(); toggleReportOptions({{ $post->id }})"
        class="report-button report-mobile"
            style="
                background-color: transparent;
                border: none;
                padding: 6px 10px;
                border-radius: 5px;
                font-size: 0.9rem;
                cursor: pointer;
                display: none;
            ">
    <img src="{{ asset('assets/images/arrowDown_.png') }}" alt="▼" style="width: 12px; height: 12px; position:relative; bottom:1px; right:2px;">
    </button>

    <!-- Report Options -->
    <div id="report-options-{{ $post->id }}"
          onclick="event.stopPropagation();"
         style="position: absolute; bottom: 45px; left: 50%; transform: translateX(-50%); background: white; border: 1px solid #ccc; border-radius: 6px; width: 90%; display: none; z-index: 10;">
  <ul style="list-style: none; margin: 0; padding: 0; background: #fff; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden; width: 100%; font-size:11px;">
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Excessive sensuality')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.sensuality') }}
        </a>
    </li>
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Impersonation')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.impersonation') }}
        </a>
    </li>
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Violence')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.violence') }}
        </a>
    </li>
    <li style="border-bottom: 1px solid #eee;">
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Racism')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.racism') }}
        </a>
    </li>
    <li>
        <a href="#" onclick="event.stopPropagation(); submitReport({{ $post->id }}, 'Other')" 
           style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s;">
            {{ __('report.reasons.other') }}
        </a>
    </li>
</ul>

    </div>
                </b></center>
                
          
</script>

        </div>
@endif
    @endforeach
 </div>

@else
    <div style="text-align: center; margin-top: 50px;">
        <p>No posts available yet.</p>
    </div>
@endif

</div>







<!--End here-->
                </div>
                           {{-- Pagination Controls --}}
<div id="loaderz" style="
    display: none;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
    width: 100%;
    text-align: center;
    display: flex;
">
    
    <img src="{{ asset('/assets/images/spinner.gif') }}" alt="Loading..." style="width: 50px;" />
</div>



<!-- Tour Modal -->
<style>
    
    .hoverFlyer:hover{border:4px solid #000 !important;transition:0.5s;}
    .hoverFlyer:active{border:4px solid #000 !important;transition:0.5s;}
</style>
<!-- Tour Modal -->
@php
    $locale = app()->getLocale(); // get current app locale

$logos = [
        'en' => 'Superworld-13.svg',
        'it' => 'Superworld-14.svg',
        'es' => 'Superworld-15.svg',
        'pt' => 'Superworld-15.svg',
        'ca' => 'Superworld-16.svg',
        'fr' => 'Superworld-17.svg',
        'de' => 'Superworld-18.svg',
    ];

    $logo = $logos[$locale] ?? 'Superworld-13.svg';
@endphp
<div class="modal fade" id="tourModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
<div class="modal-content" style="background:#8a2be2;  box-shadow:none;">       <div class="modal-body payment_modal d-block">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity:1;">
          <span aria-hidden="true">&times;</span>
          
        </button>
        <br>
        <h3 style="color:#fff;">✈️  {{ __('content.tourModalTitle') }}</h3>
        <p style="color:#fff;">{!! __('content.tourModalDescription') !!} </p>
        
        
        <div style="margin-top:10px;">
          <a href="#">
            <img src="{{ url('assets/images/VUELING_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" class="logo hoverFlyer"
              style="display:inline-block; width:29%; margin:4px; border-radius:2px; border:4px solid #222;">
          </a>

          <a href="#">
            <img src="{{ url('assets/images/American_Airlines_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" class="logo hoverFlyer"
              style="display:inline-block; width:29%; margin:4px; border-radius:2px; border:4px solid #222;">
          </a>

          <a href="#">
            <img src="{{ url('assets/images/IBERIA_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" class="logo hoverFlyer"
              style="display:inline-block; width:29%; margin:4px; border-radius:2px; border:4px solid #222;">
          </a>
        </div>
      </div>
       
      </div>
    </div>
  </div>
</div>





<script>
function openTourModal() {
    $('#tourModal').modal('show');
}
</script>

<script>
let page = 1;
let isLoading = false;
let noMorePosts = false;

window.addEventListener('scroll', () => {
    if (isLoading || noMorePosts) return;

    const nearBottom = window.innerHeight + window.scrollY >= document.body.offsetHeight - 300;

    if (nearBottom) {
        loadMorePosts();
    }
});

function loadMorePosts() {
    isLoading = true;
    document.getElementById('loaderz').style.display = 'block';

    page++;

    fetch(`?page=${page}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.text())
    .then(html => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const newPosts = doc.querySelectorAll('.work-item');

        if (newPosts.length === 0) {
            noMorePosts = true;
            document.getElementById('loaderz').style.display = 'none';
            return;
        }
        
        

        newPosts.forEach(post => {
            document.getElementById('post-container').appendChild(post);
        });

        isLoading = false;
        document.getElementById('loaderz').style.display = 'none';
    })
    .catch(() => {
        isLoading = false;
        document.getElementById('loaderz').style.display = 'none';
    });
}
</script>

 <!--<hr style="margin-bottom: 0px;">-->

 <!--           <div class="fh5co-narrow-content">-->


 <!--               <center>-->
 <!--                   <img src="{{ asset('assets/images/Superfans Titulo-01.svg') }}" style="width: 11.1em;">-->
 <!--                   <p>© 2025 Superfans World S.L<br>-->
 <!--                       {{ __('footer.all_rights_reserved') }} <br>-->
 <!--                       {{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a></p>-->
 <!--               </center>-->


 <!--           </div>-->
            </div>
            
 



            
        </div>
        
    </div>
    
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const isiPhone = /iPhone|iPad/i.test(navigator.userAgent);

    const scrollContainer = document.querySelector('.js-fullheight');
    if (!scrollContainer) return;

    if (isiPhone) {
      scrollContainer.setAttribute('data-simplebar', '');
      scrollContainer.setAttribute('data-simplebar-auto-hide', 'false');
    } else {
      scrollContainer.removeAttribute('data-simplebar');
      scrollContainer.removeAttribute('data-simplebar-auto-hide');
    }
  });
</script>


    <script>
    function toggleReportOptions(postId) {
        const box = document.getElementById('report-options-' + postId);
        box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
    }

    function submitReport(postId, reason) {
        fetch("{{ route('report.post') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ post_id: postId, reason: reason })
        }).then(res => {
            if (res.ok) {
                Swal.fire({
                    icon: 'success',
                    title: `{{ __('report.sent_title') ?? 'Report Sent' }}`,
                    html: `{{ __('report.thank_you') ?? 'Thank you for reporting this content. Our team will review it shortly.' }}`,
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'swal2-rounded',
                        confirmButton: 'swal2-confirm '
                    }
                });

                document.getElementById('report-options-' + postId).style.display = 'none';
            } else {
                Swal.fire({
                    icon: 'error',
                    title: `{{ __('report.failed_title') ?? 'Oops!' }}`,
                    html: `{{ __('report.failed_message') ?? 'Something went wrong. Please try again later.' }}`,
                    confirmButtonText: 'OK',
                    customClass: {
                        popup: 'swal2-rounded',
                        confirmButton: 'swal2-confirm btn-danger'
                    }
                });
            }
        });
    }
</script>

            
            
@php
use App\Models\User;

// Get ALL users (not just influencers) but only those with a usable username_URL
$influencers = User::query()
    ->select(['username_URL', 'verified'])
    ->whereNotNull('username_URL')
    ->where('username_URL', '!=', '')
    ->get();
@endphp

<script>
    const influencers = @json($influencers);

    const searchInput = document.getElementById('influencer_search');
    const suggestionsBox = document.getElementById('suggestions');

    searchInput.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        suggestionsBox.innerHTML = '';

        if (query.length > 0) {
            const filtered = influencers.filter(user => {
                const handle = (user.username_URL || '').toLowerCase();
                return handle.includes(query);
            });

            filtered.forEach((user, index) => {
                const li = document.createElement('li');
                li.style.padding = '5px 10px';
                li.style.background = index === 0 ? '#337ab7' : '';
                li.style.cursor = 'pointer';

                const nameSpan = document.createElement('span');
                nameSpan.textContent = user.username_URL;

                if (user.verified) {
                    const badge = document.createElement('img');
                    badge.src = "https://live.superfanss.app/assets/images/verified.png";
                    badge.alt = "Verified";
                    badge.width = 18;
                    badge.height = 18;
                    badge.style.position = 'relative';
                    badge.style.bottom = '2px';
                    badge.style.marginLeft = '5px';
                    li.appendChild(nameSpan);
                    li.appendChild(badge);
                } else {
                    li.appendChild(nameSpan);
                }

                li.addEventListener('mouseenter', function() {
                    const allItems = suggestionsBox.querySelectorAll('li');
                    allItems.forEach(item => item.style.background = '');
                    this.style.background = '#337ab7';
                });

                li.addEventListener('click', function() {
                    searchInput.value = user.username_URL;
                    suggestionsBox.innerHTML = '';
                    suggestionsBox.style.display = 'none';
                    window.location.href = '/' + user.username_URL;
                });

                suggestionsBox.appendChild(li);
            });

            suggestionsBox.style.display = filtered.length ? 'block' : 'none';
        } else {
            suggestionsBox.style.display = 'none';
        }
    });

    document.getElementById('search_icon').addEventListener('click', function() {
        const name = searchInput.value.trim();
        if (name) window.location.href = '/' + name;
    });

    // FIX: make selector match the actual suggestions element id
    document.addEventListener('click', function(e) {
        if (!e.target.closest('#suggestions') && !e.target.closest('#influencer_search')) {
            suggestionsBox.style.display = 'none';
        }
    });
</script>

    <!-- Basic scripts needed -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-- Audio elements if needed -->
    <audio id="clickSound" src="{{ asset('assets/music/open.mp3') }}"></audio>
    <script>
        document.querySelectorAll('.play-sound').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound').play();
            });
        });
    </script>
    
    <script>
    $(document).ready(function() {

        // $("#search_influencer").click(function(){
        $("#influencer_select").change(function() {



            if ($("#influencer_select").val() == "All influencers") {
                $("#influencer_select").val("Buscar Influencer");
                window.location.href = "/influencer/influencers";
            } else if ($("#influencer_select").val() != "All influencers" && $("#influencer_select")
                .val() != "Buscar Influencer") {
                var current_value = $("#influencer_select").val();
                $("#influencer_select").val("Buscar Influencer");
                window.location.href = "/influencer/influencer/" + current_value + "";
            }


        });

        //$("#search_user").click(function(){
        $("#user_select").change(function() {



            if ($("#user_select").val() == "All users") {
                $("#user_select").val("Buscar User");
                window.location.href = "/user/users";
            } else if ($("#user_select").val() != "All Users" && $("#user_select").val() !=
                "Buscar User") {
                var current_value = $("#user_select").val();
                $("#user_select").val("Buscar User");
                window.location.href = "/influencer/user/" + current_value + "";
            }


        });
    });
</script>
@endsection