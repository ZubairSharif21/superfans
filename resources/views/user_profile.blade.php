@extends('layouts_direct_user.main')

@section('og_title', $user->username_URL)
@section('og_description', $user->bio ?? $user->username_URL)
@section('og_url', url()->current())
@section('og_image', $user->profile_picture ? asset('assets/images/' . $user->profile_picture) : asset('assets/images/logosmall/pwa-app-logo.png'))


@section('content_direct_user')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>


    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.querySelector('.language-dropdown');
        if (dropdown) dropdown.remove();
      });
    </script>


<style>

    .message-tag:hover {
    color: white !important;
    background: #5cb85c !important;
    border: 2px solid #5cb85c !important;
    transition: 0.3s;
    text-decoration: none;
}
.btnswa-hover:hover {
    background: #fdd835 !important;
    border: 2px solid #fdd835 !important;
    transition: 0.3s;
    text-decoration: none;
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

<style>
    .world_after a:after {
        background-color: #ffc83d !important;
    }
</style>

<style>
.image-hover-wrapper:hover .report-button {
    display: block !important;
}

.user-report-op {
     width: 320px;
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

@media screen and (max-width: 400px) {
      .user-report-op {
     width: 230px;
}
  
}
</style>

    <div id="fh5co-page">

        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle play-sound"><i></i></a>

        <aside id="fh5co-aside" role="complementary" class="border js-fullheight" data-simplebar data-simplebar-auto-hide="false">


            <h1 id="fh5co-logo" style="margin-bottom: 0px;"><a
                    @if (Auth::check()) @if (Auth::user()->role == 'influencer')
                        href="{{ URL('/influencer') }}"
                    @else
                        href="{{ URL('/user') }}" @endif
                    @else href="{{ URL('/') }}" @endif><img
                        src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 54%;"></a></h1>

            @if (strlen($user->username_URL) > 13)

                <p class="animated_username"
                   style="margin-bottom: 0px !important;width: fit-content;margin-left: auto;margin-right: auto;
            border: 5px solid black;color: #c3c3c3;background-color: #585858;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
            padding-left: 6px;padding-right: 6px;font-size: 14px;width: 50%;position: relative;overflow-x: hidden;overflow-y: hidden;">
                    <span
                        style="width: 20px;height: 20px;background: #585858;position: absolute;z-index: 2;left: 0px;"></span>
                    <span
                        style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;z-index: 3;position: absolute;left: 5px;top: 5px;"></span>
                    <span
                        style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;"></span>
                    <span style="display: inline-block;" class="arrow"><span>@</span>{{ $user->username_URL }}</span>
                </p>
            @else
                <p
                    style="margin-bottom: 0px !important;width: fit-content;margin-left: auto;margin-right: auto;border: 5px solid black;
          color: #c3c3c3;background-color: #585858;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
          padding-left: 6px;padding-right: 6px;font-size: 14px;width: 50%;position: relative;overflow-x: hidden;overflow-y: hidden;">
                    <span
                        style="width: 20px;height: 20px;background: #585858;position: absolute;z-index: 2;left: 0px;"></span>
                    <span
                        style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;z-index: 3;position: absolute;left: 5px;top: 5px;"></span>
                    <span
                        style="width: 10px;height: 10px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;vertical-align: middle;"></span>
                    <span style="display: inline-block;"
                          class="arrow_small_username"><span>@</span>{{ $user->username_URL }}</span>
                </p>

            @endif

            <ul
                style="list-style-type: none;display: flex;font-size: 14px;width: 100%;justify-content: space-between;padding: 0px 26%;max-width: 300px;text-align: center;margin-left: auto;margin-right: auto;">

                @php

                    $username_URL = $user->username_URL;

                @endphp

                <li><a class="fh5co-active" href="{{ URL('' . $username_URL . '') }}"
                       style="text-decoration: underline;text-transform: uppercase;

    color: #222;

    font-size: 0.83em;

    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.wall') }}</a>
                </li>

                <li><a href="{{ URL('/posts/' . $username_URL . '') }}"
                       style="text-transform: uppercase;

    color: #222;

    font-size: 0.83em;

    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.posts') }}</a>
                </li>

            </ul>

            <center>

                <nav id="fh5co-main-menu" role="navigation">

                    <ul>

                        <li style="margin-bottom: 30px;"><a class="streaming_anchor" data-toggle="modal"
                                                            data-target="#streamingModalCenter"
                                                            style="cursor: pointer;margin-bottom: 0px;"><span
                                    style="width: 17px;height: 17px;background-color: red;display: inline-block;border-radius: 30px;border: 4px solid black;position: relative;top: 3px !important;"></span>
                                Streaming<!--Subscribe <b>+</b>--></a></li>


                        <li>

                            @php

                                $Influencer_networks = $user->Influencer_networks;

                                if ($Influencer_networks != null) {
                                    $Influencer_network_ids = explode(',', $Influencer_networks);

                                    $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;

                                    $Influencer_networks_profile_links = explode(
                                        ',',
                                        $Influencer_networks_profile_links,
                                    );
                                }

                            @endphp



                            @if ($Influencer_networks != null)

                                <div>

                                    <div id="slider_id" class="slider"
                                         style="width: 100%;margin: 0px;height: 120px;box-shadow: none;">

                                         <div class="slider-control next play-sound2"><i class="fa fa-angle-right" aria-hidden="true"
                                                                            style="color: #060605"></i></div>

                                         <div class="slider-control prev play-sound2"><i class="fa fa-angle-left" aria-hidden="true"
                                                                            style="color: #060605"></i></div>




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


                                        @php

                                            $first_network = 1;

                                            $index = 0;

                                        @endphp



                                        @if (isset($Influencer_network_ids))

                                            @foreach ($Influencer_network_ids as $Influencer_network_id)
                                                @php

                                                    $socialnetwork = DB::table('socialnetworks')
                                                        ->where('id', $Influencer_network_id)
                                                        ->first();

                                                    $socialnetwork_image = $socialnetwork->image;

                                                    $socialnetwork_name = $socialnetwork->name;

                                                @endphp



                                                <div class="item @if ($first_network == 1) active @endif ">

                                                    <div class="item-content">

                                                        <a href="{{ $Influencer_networks_profile_links[$index] }}"><img
                                                                src="{{ asset('assets/images/' . $socialnetwork_image . '') }}"
                                                                width="69px"
                                                                @if ($socialnetwork->id == 3 || $socialnetwork->id == 4) style="max-width: 69px;max-height: 69px;margin-top: 10px;"


                                                                @elseif($socialnetwork->id == 1)

                                                                    style="width: 75px;margin-top: -2px;"

                                                                @elseif($socialnetwork->id == 73)

                                                                    style="width: 75px;margin-top: 17px;"

                                                                @elseif($socialnetwork->id == 71)

                                                                    style="max-width: 69px;max-height: 69px;margin-right: 5px;"

                                                                @elseif($socialnetwork->id == 81)

                                                                    style="max-width: 69px;max-height: 69px;margin-top: 5px;"

                                                                @elseif($socialnetwork->id == 41)

                                                                    style="max-width: 69px;max-height: 69px;margin-top: 9px;"

                                                                @elseif($socialnetwork->id == 61)

                                                                    style="max-width: 69px;max-height: 69px;margin-top: 5px;"

                                                                @else

                                                                    style="max-width: 69px;max-height: 69px;" @endif><br>&nbsp;&nbsp;<b>{{ $socialnetwork_name }}</b></a>

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

                                <hr style="margin-bottom: 20px;">

                            @endif


                        </li>


                        @if (Auth::check())

                            @if (Auth::user()->role == 'influencer')
                               <li class="world_after"><a href="{{ URL('/influencer/world') }}">{{ __('nav.world') }}</a></li>
                                
                                <li><a href="{{ URL('/influencer/feed') }}">{{ __('nav.feed') }}</a></li>


                        <li style="margin-bottom: 5px; margin-top: -5px;"><span style="font-size:13px; color:#c3c3c3; font-family:  Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.my') }}</span></li>
                                
                                <li><a href="{{ URL('/influencer') }}">{{ __('nav.wall') }}</a></li>

                                <li><a href="{{ URL('/influencer/posts') }}">{{ __('nav.posts') }}</a></li><br>
                            @else

                                <li class="world_after"><a href="{{ URL('/user/world') }}">{{ __('nav.world') }}</a></li>

                                <li><a href="{{ URL('/user/feed') }}">{{ __('nav.feed') }}</a></li>


                        <li style="margin-bottom: 5px; margin-top: -5px;"><span style="font-size:13px; color:#c3c3c3; font-family:  Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.my') }}</span></li>
                                
                                <li><a href="{{ URL('/user') }}">{{ __('nav.wall') }}</a></li>

                                <li><a href="{{ URL('/user/posts') }}">{{ __('nav.posts') }}</a></li><br>
                            @endif


                            <hr style="margin-top: -1px;">





                            {{-- <li class="username_li" style="font-size: 80%;"><p  style="cursor: pointer;white-space: nowrap;" data-toggle="modal" data-target="#userModalCenter"><b>@</b><b>{{Auth::user()->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p></li> --}}

                            <li class="username_li" style="font-size: 80%;">


                                {{-- <div class="dropdown keep-open">

                    <p id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="cursor: pointer;white-space: nowrap;transition: 0.3s;"><b>@</b><b>{{Auth::user()->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;display:none;">
                    <p class="dropdown-item add_post_item" data-toggle="modal" data-target="#add_post_modal" style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;"><i class="fa fa-plus" ></i> {{ __('nav.add_post') }}</p>

                      <p class="dropdown-item control_panel_item" @if (Auth::user()->username_URL == 'influencer') data-target="#exampleModalCenter" @else data-target="#userModalCenter" @endif  style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;"><i class="far fa-user-circle" ></i> {{ __('nav.control_panel') }}</p>


                    </div>

                  </div> --}}

                                <div class="">
                                    <p id="dropdownMenuButton" data-toggle="collapse" data-target="#demo"
                                       style="cursor: pointer;white-space: nowrap;transition: 0.3s;">
                                        <b>@</b><b>{{ Auth::user()->username_URL }} <i class="far fa-user-circle"
                                                                                       style="font-size: 20px;"></i></b>
                                    </p>
                                    <div class="collapse-div collapse" id="demo"
                                         style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;">
                                         <p class="dropdown-item add_post_item" data-toggle="modal"
                                           data-target="#add_post_modal"
                                           style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;">
                                            <i class="fa fa-plus"></i> {{ __('nav.add_post') }}
                                        </p>
                                        
                                        <p class="dropdown-item control_panel_item" data-target="#exampleModalCenter"
                                           style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;">
                                            <i
                                                class="far fa-user-circle"></i> {{ __('nav.control_panel') }}</p>

                                       
                                        @if(Auth::user()->role == 'influencer')
                                        <p onclick="window.location.href='{{ URL('/influencer/messages') }}'" class="dropdown-item add_post_item message-tag" 
                                       style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;">
                                         <i class="fa fa-envelope"></i> {{ __('nav.messages') }}
                                    </p>
                                    @else
                                    <p onclick="window.location.href='{{ URL('/user/messages') }}'" class="dropdown-item add_post_item message-tag" 
                                       style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;">
                                         <i class="fa fa-envelope"></i> {{ __('nav.messages') }}
                                    </p>
                                    @endif

                                    </div>

                                </div>


                            </li>
                        @else
                            <li class="login_btn world_after" style="margin-top: -5px;margin-bottom: 26px;">
                                <a href="/world"><b>{{ __('nav.world') }}</b></a>
                            </li>

                        @endif



                        {{-- <hr style="margin-top: -1px;">
                        
                        

            <li>

              <div class="input-group" style="border: 2px solid #585858;margin-right: 10px;margin-left: 10px;max-width: 158px;margin-left: auto;margin-right: auto;">

                <span class="input-group-addon" id="search_influencer" style="padding: 0px;padding-left: 6px;padding-right: 6px;background: transparent;border: 0px;cursor: pointer;">🔎</span>





                <select class="form-control" id="influencer_select" style="padding: 0px;background: transparent;border: 0px;height: 39px;font-size: 15px;">

                  <option>Buscar Influencer</option>

                  <option value="All influencers">All influencers</option>



                  @foreach ($influencers as $influencer)

                  <option value="{{$influencer->username_URL}}">{{$influencer->username_URL}}</option>

                  @endforeach







                </select>



              </div>

            </li>
 --}}


                        {{-- <li>

              <div class="input-group" style="border: 2px solid #585858;margin-right: 10px;margin-left: 10px;">

                <span class="input-group-addon" id="search_user" style="padding: 0px;padding-left: 6px;padding-right: 6px;background: transparent;border: 0px;cursor: pointer;">🔎</span>





                <select class="form-control" id="user_select" style="padding: 0px;background: transparent;border: 0px;height: 39px;font-size: 15px;">

                  <option>Buscar User</option>

                  <option value="All Users">All users</option>




                  @foreach ($Users as $User)

                  <option value="{{$User->username_URL}}">{{$User->username_URL}}</option>

                  @endforeach







                </select>



              </div>

            </li> --}}


                        <hr style="margin-top: -10px;margin-bottom: 40px;">

                        <li>
                            <div class="wrapper">
                                <input type="text" class="influencer_search" placeholder="{{ __('nav.search_influencer') }}">
                                <div class="wrapper_span">🔎</div>
                            </div>
                            {{-- <div class="input-group" style="border: 2px solid #585858;margin-right: 10px;margin-left: 10px;max-width: 180px;margin-left: auto;margin-right: auto;">
              <div class="input-group" style="border: 2px solid #585858;margin-right: 10px;margin-left: 10px;max-width: 158px;margin-left: auto;margin-right: auto;">
                <span class="input-group-addon" id="search_influencer" style="padding: 0px;padding-left: 6px;padding-right: 6px;background: transparent;border: 0px;cursor: pointer;">🔎</span>


                <select class="form-control" id="influencer_select" style="padding: 0px;background: transparent;border: 0px;height: 39px;font-size: 15px;">
                  <option>Buscar Influencer</option>
                  <option value="All influencers">All influencers</option>

                  @foreach ($influencers as $influencer)
                  <option value="{{$influencer->username_URL}}">{{$influencer->username_URL}} </option>
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
                                   href="{{ '/login?username=' . $username_URL . '' }}"><i class="fa fa-power-off"
                                                                          aria-hidden="true"></i>
                                </a>
                            </li>
                        @endif


                        {{--                <li><a href="{{$user->instagram_link}}"><i class="icon-instagram" style="font-size: 2.1em;"></i></a></li> --}}

                        <!--<li><a href="https://www.twitch.com/" target="_blank"><i class="icon-twitch" style="font-size: 2.1em;"></i></a></li>

                                                <li><a href="https://www.youtube.com/" target="_blank"><i class="icon-youtube" style="font-size: 2.1em;"></i></a></li>-->

                    </ul>
                    <br>

                    <p><small>&copy; 2021-2025 @if ($user->footer_name_username == 'username')
                                <span
                                    style="display: inline-block;">@</span>{{ $user->username_URL }}
                            @else
                                {{ $user->name }} {{ $user->surname }}
                            @endif <br>All Rights
                            Reserved.</span> <span>{{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a></span>
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

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

@if(session('message_subscription'))
   
     <script>
        document.addEventListener('DOMContentLoaded', function () {
            confetti({
                particleCount: 200,
                spread: 100,
                origin: { y: 0.6 }
            });
        });
    </script>
@endif
            @php

                $profile_picture = $user->profile_picture;

                $cover_picture = $user->cover_picture;

            @endphp

            <div style="text-align: right;position: relative;">

                @if ($cover_picture != null)

                    <img src="{{ asset('assets/images/' . $cover_picture . '') }}"
                         style="max-height: 50%;width: 100%;height: 50%;" alt="">



                    {{-- <i class="fa fa-plus add_post_icon" data-toggle="modal" data-target="#add_post_modal" style="background: white;border-radius: 56px;position: absolute;right: 20px;bottom: 0;margin-bottom: -12px;cursor: pointer;z-index: 2;box-shadow: 2px 2px 3px #e78267;color: white;color: #9c46ec;font-size: 12px;padding: 5.5px 6.7px;@if (!Auth::check()) display: none; @endif" aria-hidden="true"></i> --}}
                @else
                       @if ($user->cover_color === 'purple')
    <img src="{{ asset('assets/images/image1718137360.png') }}"
         style="max-height: 129px; width: 100%; height: 129px;" alt="">
@else
    <img src="{{ asset('assets/images/coverYellow.png') }}"
         style="max-height: 129px; width: 100%; height: 129px;" alt="">
@endif




                @endif


            </div>

            <div class="fh5co-narrow-content" style="padding-top: 0px;margin-top: -54px;">


                {{-- @if (session()->has('duplicate_error'))

            <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

                {{ session()->get('duplicate_error') }}

            </div>

          @endif --}}




                {{-- @if (session()->has('message'))

            <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

                {{ session()->get('message') }}

            </div>

          @endif --}}


                <center>

                    @if ($profile_picture != null)

                        <img src="{{ asset('assets/images/' . $profile_picture . '') }}"
                             style="width: 92px; height: 92px; border-radius: 74px; border: 4px solid white; ">
                    @else
                        <img src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                             style="width: 92px; height: 92px; border-radius: 74px;">

                    @endif


                    <br><br><b style="color: gray !important;">{{ $user->name }} @if(!empty($user->bio))
          @php
    $bio = e($user->bio); // escape HTML for safety
    $bio = nl2br($bio);   // convert newlines to <br>
    $bio = preg_replace('/@(\w+)/', '<a href="/$1" style="color: #007bff;">@$1</a>', $bio);
@endphp

<div style="max-width: 100%; word-wrap: break-word;">
  <p style="color: gray !important; margin-bottom: 5px;">{!! $bio !!}</p>
</div>

    @endif </b> 

<div style="display: block; position: relative;">
  <span style="user-select: text;">
   <?php echo '@'; ?>{{ $user->username_URL }} @if($user->verified)
        <img src="https://live.superfanss.app/assets/images/verified.png" alt="Verified" width="18" height="18" style="position:relative; bottom:1px;">
    @endif
  </span>
 <button onclick="event.stopPropagation(); toggleUserReport(@js($user->username_URL))"
    style="border: none; background: transparent; cursor: pointer; padding: 0 4px; font-size: inherit;">
    <img src="{{ asset('assets/images/arrowDown_.png') }}" alt="▼" style="width: 12px; height: 12px; position:relative; bottom:1px; right:2px;">
</button>

<!-- Report Dropdown -->
<div id="user-report-options-{{ $user->username_URL }}"
     class="user-report-op"
     onclick="event.stopPropagation();"
     style="position: absolute; top: 120%; left: 50%; transform: translateX(-50%); background: white; border: 1px solid #ccc; border-radius: 6px; display: none; z-index: 100;">

<ul style="list-style: none; margin: 0; padding: 0; background: #fff; border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden; width: 100%;">
    @foreach (['sensuality', 'Impersonation', 'Violence', 'Racism', 'Other'] as $reason)
        <li style="border-bottom: 1px solid #eee;">
            <a href="#"
               onclick="event.stopPropagation(); submitUserReport('{{ $reason }}', '{{ $user->username_URL }}')"
               style="display: block; padding: 10px 15px; text-decoration: none; color: #333; transition: background 0.2s; font-size: 13px;">
               {{ __('report.reasons.' . Str::slug(strtolower($reason), '_')) ?? $reason }}
            </a>
        </li>
    @endforeach

    {{-- Block/Unblock Button as List Item --}}
    <li style="border-bottom: 1px solid #eee;">
        @auth
        <form method="POST" action="{{ auth()->user()->hasBlocked($user->id) ? route('user.unblock', $user->id) : route('user.block', $user->id) }}"
              style="margin: 0;"
              onsubmit="event.stopPropagation();"
        >
            @csrf
            <button type="submit"
                    style="width: 100%; padding: 10px 15px; border: none;  background: none; text-align: center; font-size: 13px; color: {{ auth()->user()->hasBlocked($user->id) ? '#856404' : 'red' }};">
                {{ auth()->user()->hasBlocked($user->id) ? 'Unblock User' : 'Block User' }}
            </button>
        </form>
        @endauth
    </li>
</ul>

</div>



</div>

<br>

                    @php
                        $other_user_username = $user->username_URL;
                    @endphp

                    @php

                        Session::put('other_user_username', $other_user_username);
                        //echo "other_user_username: ".Session::get('other_user_username');
                    @endphp

                    @if (Auth::check())

                        @if ($user->role == 'influencer')
                            @php
                                $user_id = Auth::user()->id;
                                $subscription = DB::table('subscriptions')
                                    ->where('user_id', $user_id)
                                    ->where('influencer_id', $user->id)
                                    ->first();
                            @endphp

                            @if ($subscription === null)

                                {{-- @dd("Auth::user()->id: ".$user_id."user->id: ".$user->id) --}}
                                <div class="col-12 d-flex justify-content-center align-items-center">

<!--                       @if(Auth::user()->id == $user->id)-->
<!--    {{-- Owner: open their edit modal --}}-->
<!--    <span-->
<!--        data-toggle="modal"-->
<!--        data-target="#exampleModalCenter"-->
<!--        class="btn btn-primary btn-outline play-sound1"-->
<!--        style="width: 226px !important;"-->
<!--    >-->
<!--        <img-->
<!--            src="{{ asset('assets/images/SUPERHEROINA.svg') }}"-->
<!--            style="width: 17.47%; margin: 3px; position: relative; left: -4px;"-->
<!--        >-->
<!--        {{ __('content.follow') }} <b>+</b> | <b>${{ $user->price_of_subscription }}</b>-->
<!--    </span>-->
<!--@else-->
<!--    {{-- Non-owner: redirect to Redsys --}}-->
<!--    <form action="{{ route('redsys.now') }}" method="POST" style="display:inline;">-->
<!--        @csrf-->
<!--        <input type="hidden" name="amount" value="{{ $user->price_of_subscription }}">-->
<!--        <input type="hidden" name="influencer_id" value="{{ $user->id }}">-->
<!--        <button type="submit" class="btn btn-primary btn-outline play-sound1" style="width: 226px !important;">-->
<!--            <img-->
<!--                src="{{ asset('assets/images/SUPERHEROINA.svg') }}"-->
<!--                style="width: 17.47%; margin: 3px; position: relative; left: -4px;"-->
<!--            >-->
<!--            {{ __('content.follow') }} <b>+</b> | <b>${{ $user->price_of_subscription }}</b>-->
<!--        </button>-->
<!--    </form>-->
<!--@endif-->

           <span
                                    data-toggle="modal"
                                    data-target="{{ Auth::user()->id == $user->id ? '#exampleModalCenter' : '#paymentModalCenter' }}"
                                    class="btn btn-primary btn-outline play-sound1"
                                    style="width: 226px !important;"
                                >
    <img
        src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
        style="width: 17.47%; margin: 3px; position: relative; left: -4px;"
    >
    {{ __('content.follow') }}  <b>+</b> | <b>${{ $user->price_of_subscription }}</b>
</span>




                                @if ((Auth::user()->id == $user->id))
                                    <button
                                        onclick="window.location.href='https://live.superfanss.app/influencer/messages'"
                                        class="btn btn-success play-sound1"
                                        style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;">
                                        ✉️
                                    </button>
                                    @else 
                                    @if (auth()->user()->hasBlocked($user->id) ||  (auth()->user()->isBlockedBy($user->id)) ) 
                                    <p></p>
                                    @else
                      <button
                                        data-toggle="modal"
                                        data-target="#paymentModalCenter"
                                        class="btn btn-success play-sound1"
                                        style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;">
                                        ✉️
                                    </button>
                                    
                                    @endif
                                    @endif
                                </div>


                               <div class="modal" id="paymentModalCenter" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
     style="z-index: 123122; @if (session()->has('subscribe_this_influencer')) display:block; @endif">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content" style="border-radius: 20px;background: #8a2be2;">

            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block" data-dismiss="modal"
                        aria-label="Close"
                        style="font-size: 45px;opacity: 12;color: white;margin-top: -5px;">
                    <span aria-hidden="true">&times;</span>
                </button>

                <div style="text-align: center" class="modal-payment-title">
                    <br>
                    <img src="{{ asset('assets/images/superman2.png') }}"
                         style="display: inline-block;height: 51px;" alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                         {{ __('content.subscribe_to') }} <span>@</span>{{ $user->username_URL }}:
                    </h5>
                </div>
            </div>

            <div class="modal-body" style="border: 0px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-12 col-md-8">

                            {{-- Simplified Redsys form --}}
                            <form action="{{ route('redsys.now') }}" method="POST" style="text-align:center; color:white;">
                                @csrf
                                <input type="hidden" name="amount" value="{{ $user->price_of_subscription }}">
                                <input type="hidden" name="influencer_id" value="{{ $user->id }}">
                                
                                <div style="margin: 20px 0;">
                                    <p style="margin: 0; font-size: 1.1em;">
                                         
                                       {!!__('content.secondary_message')!!} 
                                        
                                    </p>
                                </div>
                                
                                <div style="margin: 20px 0;">
                                    <p style="margin: 0; font-size: 0.9em;">
                                        <img src="{{ asset('assets/images/credit_card.png') }}"
                                             alt="" style="width: 50px;"> 
                                       {!!__('content.card_safety')!!}
                                        
                                    </p>
                                </div>
                                <div class="form-check" style="margin: 15px 0;">
                                    <input class="form-check-input" type="checkbox" id="termsCheckbox" name="termsCheckbox" required>
                                    <label class="form-check-label" for="termsCheckbox" style="color: white; font-size: 0.96em;">
                                        {!! __('content.terms', ['link' => '<a href="https://superfans.world/terminosdeuso" target="_blank" style="color:purple;">'.__('content.terms_link').'</a>']) !!}

                                    </label>
                                </div>
                                

                                

                                <center>
                                    <button class="btn btn-success" type="submit"
                                            style="border: 2px solid #409c40 !important; display: inline-block; margin-left: 10px;">
                                        ✨{{ __('content.subscribe') }}
                                    </button>
                                </center>
                            </form>

                            <br>
                            <p style="font-size:0.74em;">
                               {{ __('content.welcome_notice') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

                            @else
                                {{-- <img src="{{ asset('assets/images/tick.PNG') }}" alt=""> --}}

                                <div class="col-12 d-flex justify-content-center align-items-center">
                                    <!-- Existing span -->
                                    <span data-toggle="modal" data-target="#cancelsubscriptionmodal"
                                          class="btn btn-primary btn-outline" style="width: 226px !important;">
                                        <img src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                                             style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.followed') }}  |
                                        <b><i class="fa fa-check" style="font-size: 17px;" aria-hidden="true"></i></b>
                                    </span>

                                    <!-- New button/form section -->
                                    @if($user->role === 'influencer')
                                        @auth
                                            {{--  is not on own page and has subscription  --}}
                                            @if($user->id !== auth()->id() && isset($subscription) && $subscription !== null)
                                                <form style="display: none;" method="post" >
                                                    @csrf
                                                    <input type="hidden" name="user_id"
                                                           value="{{auth()->id()}}">
                                                    <input type="hidden" name="influencer_id"
                                                           value="{{$user->id}}">
                                                </form>
                                                @if (auth()->user()->hasBlocked($user->id) ||  (auth()->user()->isBlockedBy($user->id)) ) 
                                                
                                                <p></p>
                                                @else
                                                @if($user->chat_toggle == 1 || auth()->user()->hasPaidInfluencer($user->id))
                                                
                                                <button id="chat_with_me_btn" data-toggle="modal" data-target="#uchatmodal"  type="submit"
                                                        class="btn btn-success"
                                                        style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;">
                                                    ✉️
                                                </button>
                                                @else 
                                                 <button id="busy_with_me_btn" type="submit"
                                                        class="btn btn-success"
                                                        style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;">
                                                    ✉️
                                                </button>
                                                
                                                @endif
                                            @endif

                                            {{--  is not on own page and has no subscription  --}}
                                            @if($user->id !== auth()->id() && !isset($subscription))
                                                <button
                                                    data-toggle="modal"
                                                    data-target="#paymentModalCenter"
                                                    class="btn btn-success play-sound1"
                                                    style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;">
                                                    ✉️
                                                </button>
                                            @endif
                                        @endauth

                                        {{--  Is not logged in  --}}
                                        @if(auth()->user() === null)
                                            <button data-toggle="modal" data-target="#register_Modal"
                                                    class="btn btn-success"
                                                    data-toggle="modal" data-target="#userModalCenter"
                                                    style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;">
                                                ✉️
                                            </button>
                                        @endif
                                    @endif
                                </div>



@endif


                                @php
                                    $jsonSubscription = null;
                                    if (isset($subscription) && $subscription !== null) {
                                        $jsonSubscription = json_encode($subscription);
                                    }
                                    $userName = $user->username_URL;
                                @endphp

<div id="stripeFormContainer" style="display: none;">
    <form role="form" action="{{ route('stripe.premium') }}"  data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" method="post" id="payment-vip" data-cc-on-file="false">
        @csrf
        <input type="hidden" name="amount" value="10">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="hidden" name="influencer_id" value="{{ $user->id }}">
        <input type="hidden" name="stripeToken" id="stripeToken"> <!-- Hidden input for Stripe Token -->

        <!-- Name on Card -->
        <div class="form-group required">
            <label>Name on Card</label>
            <input type="text" class="form-control" name="name" required style="color:white; border-color:white;">
        </div>

        <!-- Card Number -->
        <div class="form-group required">
            <label>Card Number</label>
            <input type="text" class="form-control card-number" name="card_number" required style="color:white; border-color:white;">
        </div>

        <!-- CVC -->
        <div class="form-group required">
            <label>CVC</label>
            <input type="text" class="form-control card-cvc" name="cvc" placeholder="CVC" required style="color:white; border-color:white;">
        </div>

        <!-- Expiration -->
        <div class="form-group required">
            <label>Expiration Month</label>
            <input type="text" class="form-control card-expiry-month" name="exp_month" placeholder="MM" required style="color:white; border-color:white;">
        </div>

        <div class="form-group required">
            <label>Expiration Year</label>
            <input type="text" class="form-control card-expiry-year" name="exp_year" placeholder="YYYY" required style="color:white; border-color:white;">
        </div>

        <!-- Terms -->
        <div class="form-group required">
            <input type="checkbox" class="form-check-input" id="termsCheckbox" name="termsCheckbox" required>
            <label for="termsCheckbox" style="color: white;">
                I agree to the <a href="https://superfans.world/terminosdeuso" target="_blank" style="color: purple;">Terms and Conditions</a>
            </label>
        </div>

        <!-- Trust Note -->
        <div style="margin-bottom: 30px;">
            <p style="margin: 0;">
                <img src="{{ asset('assets/images/credit_card.png') }}" alt="" style="width: 50px;">
                Your credit card payments will always be safe
            </p>
        </div>

        <!-- Submit Button -->
        <div style="text-align: center;">
            <button type="submit" style="border: 2px solid #409c40 !important;" class="btn btn-block btn-success btn-pay-stripe">
                Pay
            </button>
        </div>
    </form>
</div>





<script>
 let subscription = {!! $jsonSubscription !!};
let username = "{{$userName}}";

if (subscription.id > 0) {
    document.getElementById('busy_with_me_btn').addEventListener('click', function () {
        Swal.fire({
            iconHtml: `<img src="{{ asset('assets/images/' . $profile_picture . '') }}" style="width: 92px; height: 92px; border-radius: 74px; border: 4px solid white;">`,
            title: `@${username} {!!__('content.titlebusy_premium_fan')!!}`,
            html: `
                {!!__('content.description_premium_fan')!!}
                <br>
                <button id="premiumFanBtn" class="swal2-styled btnswa-hover" style="background-color:#FFEB3B; border: 2px solid #e1be24; margin-right: 10px; color: #6A1B9A">{!!__('content.button_premium_fan')!!}</button>
            `,
            showCloseButton: true,
            showConfirmButton: false,
            didOpen: () => {
                document.getElementById('premiumFanBtn').addEventListener('click', () => {
                    Swal.fire({
                        title: "{!!__('content.titlepay_premium_fan')!!}",
                   html: `
  <form action="{{ route('redsys.now') }}" method="POST" style="display:inline;">
    @csrf
    <input type="hidden" name="amount" value="10">
    <input type="hidden" name="payment_type" value="one_time">
    <input type="hidden" name="influencer_id" value="{{ $user->id }}">

    <p>
        {!!__('content.descriptionpay_premium_fan')!!}
    </p>
    

    <button type="submit" class="btn btn-success" style="border: 2px solid #409c40 !important; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; font-weight: bold;">
        {!!__('content.buttonpay_premium_fan')!!}
    </button>
</form>

`,
showConfirmButton: false,

                        didOpen: () => {
                            document.getElementById('launchPaymentFormBtn').addEventListener('click', () => {
                                Swal.fire({
                                    title: 'Secure Payment',
                                    html: document.getElementById('stripeFormContainer').innerHTML,
                                    showConfirmButton: false,
                                    width: 700,
                                    background: '#1a1a1a',
                                    didOpen: () => {
                                        const $form = $('.swal2-container').find('form');

                                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                                        $form.on('submit', function (e) {
                                            e.preventDefault();

                                            if (!$form.data('cc-on-file')) {
                                                Stripe.createToken({
                                                    number: $form.find('.card-number').val(),
                                                    cvc: $form.find('.card-cvc').val(),
                                                    exp_month: $form.find('.card-expiry-month').val(),
                                                    exp_year: $form.find('.card-expiry-year').val()
                                                }, function stripeResponseHandler(status, response) {
                                                    if (response.error) {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Payment Error',
                                                            text: response.error.message
                                                        });
                                                    } else {
                                                        const token = response.id;
                                                        $form.find('#stripeToken').val(token);

                                                        $form.find('.card-number, .card-cvc, .card-expiry-month, .card-expiry-year').val('');
                                                        $form.get(0).submit();
                                                    }
                                                });
                                            }
                                        });
                                    }
                                });
                            });
                        }
                    });
                });
            }
        });
    });
}

</script>





                                     <script>
                                    let subscription = {!! $jsonSubscription !!};
                                    let username = "{{$userName}}";
                                    if (subscription.id > 0) {
                                        document.getElementById('busy_with_me_btn').addEventListener('click', function (e) {
    Swal.fire({
        iconHtml: '<img src="{{ asset('assets/images/' . $profile_picture . '') }}" style="width: 92px; height: 92px; border-radius: 74px; border: 4px solid white;">',
        title: `@${username} ¡A tope!`,
        html: `
            🇪🇸 Este influencer está respondiendo a muchos mensajes actualmente, estás en cola.
            <br><br>
            🇺🇸 This influencer is responding to a lot of messages right now, you're in the queue.
            <br><br>
            <button id="pay10Btn" class="swal2-styled btnswa-hover" style="background-color:#FFEB3B; border: 2px solid #fdd835; margin-right: 10px; color: #6A1B9A">🎖 ️PREMIUM FAN</button>
        `,
        showCloseButton: true,
        showConfirmButton: false,
        didOpen: () => {
            const payBtn = document.getElementById('pay10Btn');
            if (payBtn) {
                payBtn.addEventListener('click', () => {
                    // Toggle visibility of the form before passing it to SweetAlert
                    const stripeFormContainer = document.getElementById('stripeFormContainer');
                    stripeFormContainer.style.display = 'block';  // Make the form visible

                    Swal.fire({
                        title: "Priority Access – $10",
                        html: document.getElementById('stripeFormContainer').innerHTML,
                        showConfirmButton: false,
                        width: 700,
                        background: '#1a1a1a',
                        didOpen: () => {
                            // You can add more actions here if needed
                        }
                    });
                });
            }
        }
    });
});

                                </script>
                                
                                
         <script>
    document.addEventListener('DOMContentLoaded', () => {
        let subscription = {!! $jsonSubscription !!};
        let username = "{{$userName}}";
        let userId = "{{ auth()->id() }}";
        let influencerId = "{{$user->id}}";

        @php
        $userProfilePicture = Auth::user()->profile_picture;
        @endphp

        if (subscription.id > 0) {
            const chatBtn = document.getElementById('chat_with_me_btn');
            if (chatBtn) {
                chatBtn.addEventListener('click', async function () {
                    Swal.fire({
                        iconHtml: '<img src="{{ asset('assets/images/' . $profile_picture . '') }}" style="width: 92px; height: 92px; border-radius: 74px; border: 4px solid white;">',
                        title: `Chat with @${username}`,
                        html: `
<textarea 
    id="chatMessageInput" 
    placeholder="Send your message to your influencer" 
    style="width: 100%; padding: 15px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; color: #000; outline: none; font-size: 16px; height: 80px; resize: none;"
></textarea>
<div style="text-align: right;">
    <button id="sendMessageButton" class="swal2-styled btn-success" style="padding: 10px 20px; margin-top: 5px; border: 2px solid #409c40 !important;">Send</button>
</div>
<br />
<div id="chatbox" style="max-height: 300px; text-align: left; margin-bottom: 10px; padding: 10px; border-radius: 8px;"></div>
                        `,
                        showCloseButton: true,
                        showConfirmButton: false,
                        width: 600,
                        didOpen: async () => {
                            await fetchMessages(); 
                            const sendBtn = document.getElementById('sendMessageButton');
                            if (sendBtn) {
                                sendBtn.addEventListener('click', async () => {
                                    let msg = document.getElementById('chatMessageInput').value.trim();
                                    if (msg !== '') {
                                        await sendMessage(msg);
                                        document.getElementById('chatMessageInput').value = '';
                                        await fetchMessages();
                                    }
                                });
                            }
                        }
                    });
                });
            } else {
                console.warn('chat_with_me_btn not found in DOM');
            }
        }

        async function fetchMessages() {
            try {
                const response = await fetch('https://live.superfanss.app/api/chatbox/fetch', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        influencer_id: influencerId
                    })
                });

                const messages = await response.json();
                let chatbox = document.getElementById('chatbox');
                chatbox.innerHTML = '';

                messages.forEach(function(msg) {
                    let msgDiv = document.createElement('div');
                    let timestamp = new Date(msg.timestamp || msg.created_at); 
                    let day = timestamp.getDate();
                    let month = timestamp.toLocaleString('default', { month: 'long' }); 
                    let formattedDate = `${day} ${month}`;

                    msgDiv.innerHTML = (
                        msg.sender_id == userId
                            ? `${formattedDate} <br /><br />
<img 
    src="{{ $userProfilePicture ? asset('assets/images/' . $userProfilePicture) : 'https://live.superfanss.app/assets/images/SUPERHEROINA.svg' }}" 
    style="width: 32px; height: 32px; border-radius: 74px; border: 4px solid white;"
> 
you:<br />
`
                            : `${formattedDate} <br /><img src="{{ asset('assets/images/' . $profile_picture . '') }}" style="width: 32px; height: 32px; border-radius: 74px; border: 4px solid white;"> @${username} says: `
                    ) + '<br />' + msg.message;

                    msgDiv.style.marginBottom = '8px';
                    msgDiv.style.padding = '8px 12px';
                    msgDiv.style.borderRadius = '8px';
                    msgDiv.style.maxWidth = '70%';
                    msgDiv.style.wordBreak = 'break-word';

                    if (msg.sender_id == userId) {
                        msgDiv.style.borderLeft = '4px solid #E65100'; 
                        msgDiv.style.textAlign = 'left';
                        msgDiv.style.marginRight = 'auto';
                    } else {
                        msgDiv.style.borderRight = '4px solid #FFA500'; 
                        msgDiv.style.textAlign = 'right';
                        msgDiv.style.marginLeft = 'auto';
                    }

                    chatbox.appendChild(msgDiv);
                });

                chatbox.scrollTop = chatbox.scrollHeight;

            } catch (error) {
                console.error('Error fetching messages:', error);
            }
        }

        async function sendMessage(messageText) {
            try {
                const response = await fetch('https://live.superfanss.app/api/chatbox/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        sender_id: userId,
                        receiver_id: influencerId,
                        message: messageText
                    })
                });

                const result = await response.json();
                console.log('Message sent:', result);
            } catch (error) {
                console.error('Error sending message:', error);
            }
        }
    });
</script>



                                <div class="modal" id="cancelsubscriptionmodal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                                     style="z-index: 123122;">

                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content" style="border-radius: 20px;background: red;">

                                            <div class="modal-header" style="border: 0px">

                                                <button type="button" class="close d-block "
                                                        data-dismiss="modal"
                                                        aria-label="Close"
                                                        style="font-size: 45px;opacity: 12;color: white;margin-top: -15px;">

                                                    <span aria-hidden="true">&times;</span>

                                                </button>

                                                <div style="text-align: center">

                                                    <img src="{{ asset('assets/images/superman2.png') }}"
                                                         style="display: inline-block;height: 51px;" alt="">

                                                    <h5 class="modal-title" id="exampleModalCenterTitle"
                                                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                                                        {{ __('content.delete_subscription') }}</h5>

                                                </div>

                                            </div>

                                            <div class="modal-body" style="border: 0px">

<div style="width:95%; margin-bottom:45px; color:white; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">
{{ __('content.subscription_warning') }}
</div>
                                                <div class="container-fluid">


                                                    @php

                                                        $subscription = DB::table('subscriptions')
                                                            ->where('influencer_id', $user->id)
                                                            ->where('user_id', Auth::user()->id)
                                                            ->first();

                                                        $subscription_id = $subscription->id;

                                                    @endphp


                                                    <a class="btn btn-block mb-3 unfollow_unsubscribe_btn"
                                                       type="submit"
                                                       href="{{ url('user/delete_subscription/' . $subscription_id . '') }}"
                                                       style="max-width: 180px;margin-left: auto;margin-right: auto;color: #333;-webkit-color: #333;-moz-color: #333;background: #efefef;-webkit-background: #efefef;-moz-background: #efefef;">{{ __('content.unsubscribe') }}</a>


                                                </div>


                                            </div>


                                        </div>

                                    </div>

                                </div>

                            @endif
                        @else
                            @php

                                $user_id = Auth::user()->id;

                                $followership = DB::table('followerships')
                                    ->where('followed_user_id', $user->id)
                                    ->where('follower_user_id', Auth::user()->id)
                                    ->first();

                            @endphp



                            @if ($followership === null)
                         <div style="display: flex; justify-content: center; gap: 1px;">
                                <form action="{{ url('/user/follow') }}" method="post"
                                      enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="followed_user_id" value="{{ $user->id }}">

                                    <input type="hidden" name="follower_user_id"
                                           value="{{ Auth::user()->id }}">

                                    <button
                                        @if (Auth::user()->id == $user->id) data-toggle="modal"
                                        data-target="#exampleModalCenter" type="button" @endif
                                        class="btn btn-primary btn-outline "
                                        style="width: 226px !important;"><img
                                            src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                                            style="width: 17.47%; margin: 3px; position: relative; left: -4px;">Follow
                                        <b>+</b></button> 
                                    <br>
                                </form>
                                <button id="chat_with_me_btn" data-toggle="modal" data-target="#uchatmodal"  type="submit" class="btn btn-success" style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;"> ✉️ </button> 
                                </div>
                                
                            @else
                                {{-- <img src="{{ asset('assets/images/tick.PNG') }}" alt=""> --}}

                                <span data-toggle="modal" data-target="#cancelfollowershipmodal"
                                      class="btn btn-primary btn-outline"
                                      style="width: 226px !important;"><img
                                        src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                                        style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.followed') }}  | <b><i
                                            class="fa fa-check" style="font-size: 17px;"
                                            aria-hidden="true"></i></b></span> <button id="chat_with_me_btn" data-toggle="modal" data-target="#uchatmodal"  type="submit" class="btn btn-success" style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;"> ✉️ </button> 
                                <br>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let username = "{{$user->username_URL}}";
        let userId = "{{ auth()->id() }}";
        let influencerId = "{{$user->id}}";

        @php
        $userProfilePicture = Auth::user()->profile_picture;
        @endphp

        const chatBtn = document.getElementById('chat_with_me_btn');
        if (chatBtn) {
            chatBtn.addEventListener('click', async function () {
                Swal.fire({
                    iconHtml: '<img src="{{ asset('assets/images/' . $profile_picture . '') }}" style="width: 92px; height: 92px; border-radius: 74px; border: 4px solid white;">',
                    title: `Chat with @${username}`,
                    html: `
<textarea 
    id="chatMessageInput" 
    placeholder="Send your message to your influencer" 
    style="width: 100%; padding: 15px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; color: #000; outline: none; font-size: 16px; height: 80px; resize: none;"
></textarea>
<div style="text-align: right;">
    <button id="sendMessageButton" class="swal2-styled btn-success" style="padding: 10px 20px; margin-top: 5px; border: 2px solid #409c40 !important;">Send</button>
</div>
<br />
<div id="chatbox" style="max-height: 300px; text-align: left; margin-bottom: 10px; padding: 10px; border-radius: 8px;"></div>
                    `,
                    showCloseButton: true,
                    showConfirmButton: false,
                    width: 600,
                    didOpen: async () => {
                        await fetchMessages(); 
                        const sendBtn = document.getElementById('sendMessageButton');
                        if (sendBtn) {
                            sendBtn.addEventListener('click', async () => {
                                let msg = document.getElementById('chatMessageInput').value.trim();
                                if (msg !== '') {
                                    await sendMessage(msg);
                                    document.getElementById('chatMessageInput').value = '';
                                    await fetchMessages();
                                }
                            });
                        }
                    }
                });
            });
        } else {
            console.warn('chat_with_me_btn not found in DOM');
        }

        async function fetchMessages() {
            try {
                const response = await fetch('https://live.superfanss.app/api/chatbox/fetch', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        user_id: userId,
                        influencer_id: influencerId
                    })
                });

                const messages = await response.json();
                let chatbox = document.getElementById('chatbox');
                chatbox.innerHTML = '';

                messages.forEach(function(msg) {
                    let msgDiv = document.createElement('div');
                    let timestamp = new Date(msg.timestamp || msg.created_at); 
                    let day = timestamp.getDate();
                    let month = timestamp.toLocaleString('default', { month: 'long' }); 
                    let formattedDate = `${day} ${month}`;

                    msgDiv.innerHTML = (
                        msg.sender_id == userId
                            ? `${formattedDate} <br /><br /><img src="{{ asset('assets/images/' . $userProfilePicture . '') }}" style="width: 32px; height: 32px; border-radius: 74px; border: 4px solid white;"> you:<br />`
                            : `${formattedDate} <br /><img src="{{ asset('assets/images/' . $profile_picture . '') }}" style="width: 32px; height: 32px; border-radius: 74px; border: 4px solid white;"> @${username} says: `
                    ) + '<br />' + msg.message;

                    msgDiv.style.marginBottom = '8px';
                    msgDiv.style.padding = '8px 12px';
                    msgDiv.style.borderRadius = '8px';
                    msgDiv.style.maxWidth = '70%';
                    msgDiv.style.wordBreak = 'break-word';

                    if (msg.sender_id == userId) {
                        msgDiv.style.borderLeft = '4px solid #E65100'; 
                        msgDiv.style.textAlign = 'left';
                        msgDiv.style.marginRight = 'auto';
                    } else {
                        msgDiv.style.borderRight = '4px solid #FFA500'; 
                        msgDiv.style.textAlign = 'right';
                        msgDiv.style.marginLeft = 'auto';
                    }

                    chatbox.appendChild(msgDiv);
                });

                chatbox.scrollTop = chatbox.scrollHeight;

            } catch (error) {
                console.error('Error fetching messages:', error);
            }
        }

        async function sendMessage(messageText) {
            try {
                const response = await fetch('https://live.superfanss.app/api/chatbox/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({
                        sender_id: userId,
                        receiver_id: influencerId,
                        message: messageText
                    })
                });

                const result = await response.json();
                console.log('Message sent:', result);
            } catch (error) {
                console.error('Error sending message:', error);
            }
        }
    });
</script>


                                <div class="modal" id="cancelfollowershipmodal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                                     style="z-index: 123122;">

                                    <div class="modal-dialog modal-dialog-centered" role="document">

                                        <div class="modal-content"
                                             style="border-radius: 20px;background: red;">

                                            <div class="modal-header" style="border: 0px">

                                                <button type="button" class="close d-block "
                                                        data-dismiss="modal"
                                                        aria-label="Close"
                                                        style="font-size: 45px;opacity: 12;color: white;margin-top: -15px;">

                                                    <span aria-hidden="true">&times;</span>

                                                </button>

                                                <div style="text-align: center">

                                                    <img src="{{ asset('assets/images/superman2.png') }}"
                                                         style="display: inline-block;height: 51px;" alt="">

                                                    <h5 class="modal-title" id="exampleModalCenterTitle"
                                                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                                                        Delete Followership</h5>

                                                </div>

                                            </div>
                                      

                                            <div class="modal-body" style="border: 0px">


                                                <div class="container-fluid">


                                                    @php

                                                        $followerships = DB::table('followerships')
                                                            ->where('followed_user_id', $user->id)
                                                            ->where('follower_user_id', Auth::user()->id)
                                                            ->first();

                                                        $followership_id = $followership->id;

                                                    @endphp


                                                    <a class="btn btn-block mb-3 unfollow_unsubscribe_btn"
                                                       type="submit"
                                                       href="{{ url('user/delete_followership/' . $followership_id . '') }}"
                                                       style="max-width: 180px;margin-left: auto;margin-right: auto;color: #333;-webkit-color: #333;-moz-color: #333;background: #efefef;-webkit-background: #efefef;-moz-background: #efefef;">Unfollow</a>


                                                </div>


                                            </div>


                                        </div>

                                    </div>

                                </div>

                            @endif

                        @endif
                    @else
                    
                    
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            @if ($user->role == 'influencer')
                                <span data-toggle="modal" id="open_fan_modal_directly"
                                      data-target="#register_Modal"
                                      class="btn btn-primary btn-outline play-sound1"
                                      style="width: 226px !important; display: inline-block;"><img
                                        src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                                        style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.follow') }}  <b>+</b> |
                                <b>${{ $user->price_of_subscription }}</b></span>

                                <!-- New button/form section -->
                                {{--  Is not logged in  --}}
                                @if(auth()->user() === null)
                                    <button data-toggle="modal" data-target="#register_Modal"
                                            class="btn btn-success play-sound1"
                                            style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;"
                                            data-toggle="modal" data-target="#userModalCenter">✉️
                                    </button>
                                @endif
                            @else
                                <span data-toggle="modal" data-target="#register_Modal"
                                      class="btn btn-primary btn-outline play-sound1"
                                      data-toggle="modal" data-target="#userModalCenter"
                                      style="width: 226px !important;"><img
                                        src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                                        style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.follow') }}  <b>+</b></b></span> 
                                          @if(auth()->user() === null)
                                    <button data-toggle="modal" data-target="#register_Modal"
                                            class="btn btn-success play-sound1"
                                            style="border: 2px solid #409c40 !important; width:65px; height: 59px; display: inline-block; margin-left: 1px;"
                                            data-toggle="modal" data-target="#userModalCenter">✉️
                                    </button>
                                @endif
                                <br>
                            @endif
                        </div>
                    @endif







                    @php

                        $other_user_id = $user->id;

                        $subscription_count = DB::table('followerships')
                            ->where('followed_user_id', $user->id)
                            ->count();

                        $subscription_count =
                            $subscription_count +
                            DB::table('subscriptions')
                                ->where('influencer_id', $user->id)
                                ->count();

                        $posts_count = DB::table('posts')
                            ->where('influencer_id', $user->id)
                            ->count();

                        $likes_count = DB::table('likes')
                            ->where('influencer_id', $user->id)
                            ->count();

                        $followers_count = DB::select("SELECT * FROM users WHERE id = $other_user_id");

                        $total_likes = DB::table('posts')->where('influencer_id', $other_user_id)->sum('no_of_likes');

                        foreach ($followers_count as $count) {
                            $followers = $count->no_of_followers;
                        }

                    @endphp


                    <b><a href="{{ URL('/posts/' . $user->username_URL . '') }}"
                          style="font-size: 0.69em;">{{ $posts_count }}</b> {{ __('content.post') }}</a> | <b><a href=""
                                                                                              data-toggle="modal"
                                                                                              data-target=""
                                                                                              style="font-size: 0.69em;"><span
                                class="number_of_likes">{{ thousandsCurrencyFormat($likes_count + $total_likes) }}</span></b>
                    {{ __('content.likes') }} </a> | <b><a href="" data-toggle="modal" data-target=""
                                      class="direct_subscriber_list"
                                      style="font-size: 0.69em;">

                            <!--{{ $subscription_count }}-->


                        {{ thousandsCurrencyFormat($followers + $subscription_count) }}

                    </b> {{ __('content.followers') }}</a>

                    <!--data-target : #followerlistmodal
                                                #LikesModalCenter--->

                    <!--<br>

                                            <b><a href="#" style="font-size: 0.69em;">11</b> {{ __('content.post') }}</a> | <b><a href="#" style="font-size: 0.69em;">26K</b> {{ __('content.likes') }} </a> | <b><a href="#" style="font-size: 0.69em;">4.6K</b> {{ __('content.followers') }}</a>-->

                    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft"
                        style="font-family: 'Roboto Slab', serif; color: #dd2110;

                "></h2>

                </center>

                <div class="row animate-box" style="display: flex;flex-wrap: wrap;" data-animate-effect="fadeInLeft">
                    
          
@auth

@if (auth()->user()->hasBlocked($user->id))
    <div style="padding:15px" class="alert-warning d-flex justify-content-between align-items-center">
        <div>
            <strong>You have blocked this user.</strong><br>
            They cannot view your profile or interact with you until you unblock them.
        </div>
        <center>
            <form method="POST" action="{{ route('user.unblock', $user->id) }}">
            @csrf
            <button type="submit" class="btn btn-sm btn-secondary">Unblock</button>
        </form>
        </center>
    </div>
    
    @elseif (auth()->user()->isBlockedBy($user->id))
        <div style="padding:15px;  width: 90%; margin: auto;" class="alert-danger" >
            <strong>This user has blocked you.</strong><br>
            You can't access their profile or content.
        </div>
 @else
        @php $showElse = true; @endphp
    @endif
 
 @endauth   
@guest
    @php $showElse = true; @endphp
@endguest

@if(!empty($showElse))

                    @if (count($last_three_posts) > 0)


                        @foreach ($last_three_posts as $post)
                            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item" data-id="{{ $post->id }}">
<div class="animated-heart" id="heart-{{ $post->id }}"></div>
                                @php

                                    $post_id = $post->id;

                                @endphp

                                <!--<a href="{{ URL('/post/' . $post_id . '') }}">-->

                                    @php

                                        $image_video = $post->image_video;

                                        $file_extension = substr($image_video, strpos($image_video, '.') + 1);
                                        $tagged_users = $post->tags;
                                        $tagged_profiles = $post->tagged_profile_pictures;
                                                               
                       $tagged_userz = explode(',', $post->tags); 
                           $verified_statuses = DB::table('users')
                           ->whereIn('username_URL', $tagged_userz)
                           ->pluck('verified', 'username_URL');
    
                                    @endphp

                                    @if (Auth::check())
<!--here-->
                                        @if ($user->role == 'influencer')

                                            @if ($subscription === null && Auth::user()->id != $user->id)
                                            
                                              @if ($post->visible == 0)
                                                <img src="{{ asset('assets/images/blue24.png') }}"
                                                     alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"
                                                     class="img-responsive"
                                                     style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">
                                                     @else 
                                                     
@php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp
@php
    $taggedProfilesArray = explode(',', $post->tagged_profile_pictures);
    $taggedUsersArray = explode(',', $post->tags);
@endphp

@if (!empty($tagged_users))
<p class="feed_posts_heading_p" style="overflow: hidden; position: relative; top:25px; font-size:14px;  width:60%;">
    <span class="marquee-text" style="display: inline-block; white-space: nowrap; animation: scroll-left 10s linear infinite;">

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
    {{-- no upload --}}
    <br />
  
@endif


 {{-- Image or Video --}}
 <!--<a href="{{ URL('/influencer/post_detail/' . $post_id . '') }}">-->

               @if (in_array(strtolower($file_extension), $video_extensions))

                                    <video style="max-width: 100%;" controls loop controlsList="nodownload" 
                     @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif
    >

                                        <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                type="video/mp4">


                                    </video>
                                @else
                                <img src="{{ asset('assets/images/' . $image_video . '') }}"
                                         alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"
                                         class="img-responsive"
                                         style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">
                                    

                                  @endif
@endif

                                <!--</a>-->

                                @php

                                    $post_likes_count = DB::table('likes')
                                        ->where('post_id', $post->id)
                                        ->count();

                                    $check_post_like = DB::table('likes')
                                        ->where('post_id', $post->id)
                                        ->where('user_id', Auth::user()->id)
                                        ->count();

                                    $total_likes = DB::table('posts')
                                        ->where('influencer_id', Auth::user()->id)
                                        ->sum('no_of_likes');

                                    $likes = DB::select('SELECT * FROM posts WHERE id = ' . $post->id);

                                    foreach ($likes as $like) {
                                        $likes_no = $like->no_of_likes;
                                    }

                                @endphp

                                {{-- <center >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;"><span class="number_of_post_likes post_likes_{{$post->id}}">
                                            {{ format_number($post_likes_count+$likes_no);}}
                                           </span></b><span class="like_post" style="cursor: pointer;" post_id="{{$post->id}}"> <i class="@if ($check_post_like == null) icon-heart-o @else icon-heart  @endif  post_icon_{{$post->id}} " post_id="{{$post->id}}" style="font-size: 0.92em !important;"></i> </span><span  style="font-size: 0.92em !important;cursor: pointer;font-weight: 100;" class="indiviual_post_likes" post_id="{{$post->id}}" data-toggle="modal" data-target="#PostLikesModalCenterindividual">{{ __('content.likes') }} </span></a> &nbsp; </b></center> --}}
                                <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats"
                                                                            style="font-size: 0.69em;"
                                                                            @if ($subscription === null) data-toggle="modal"
                                                                            data-target="#paymentModalCenter" @endif><span
                                                class="number_of_post_likes post_likes_{{ $post->id }}">
                                                {{ format_number($post_likes_count + $likes_no) }}

                                            </span></b><span @if ($subscription != null) class="like_post" @endif
                                    style="cursor: pointer;font-weight: 100;" post_id="{{ $post->id }}"
                                                             @if ($subscription === null) data-toggle="modal"
                                                             data-target="#paymentModalCenter" @endif>
                                        <i @if ($subscription === null) class="icon-heart-o play-sound1" data-toggle="modal"
                                           data-target="#paymentModalCenter" @else  class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif
                                            post_icon_{{ $post->id }} " post_id="{{ $post->id }}"
                                           @endif
                                           style=""></i></span>
                                    <span style="cursor: pointer;" class="indiviual_post_likes play-sound1"
                                          post_id="{{ $post->id }}"
                                          @if ($subscription != null) data-toggle="modal"
                                          data-target="#PostLikesModalCenterindividual_another_influencer_user" @endif>{{ __('content.likes') }} </span></a>
                                    &nbsp; </b>
                                </center>

                            </div>
                      @else
                             @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp
@php
    $taggedProfilesArray = explode(',', $post->tagged_profile_pictures);
    $taggedUsersArray = explode(',', $post->tags);
@endphp

@if (!empty($tagged_users))
<p class="feed_posts_heading_p" style="overflow: hidden; position: relative; top:25px; font-size:14px; width:60%;">
    <span class="marquee-text" style="display: inline-block; white-space: nowrap; animation: scroll-left 10s linear infinite;">

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
    {{-- no upload --}}
    <br />
  
@endif
<div class="image-hover-wrapper" style="position: relative; display: inline-block; width: 100%;">
               @if (in_array(strtolower($file_extension), $video_extensions))

                                    <video style="max-width: 100%;" controls loop controlsList="nodownload" 
                     @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif
    >

                                        <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                type="video/mp4">


                                    </video>
                                @else
                              
    <img src="{{ asset('assets/images/' . $image_video) }}"
         alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"
         class="img-responsive"
         style="border-radius: 26px !important; border: 7px solid lightgray; width: 100%;">

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
                                    </a>

                                    @php

                                        $post_likes_count = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->count();

                                        $check_post_like = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->where('user_id', Auth::user()->id)
                                            ->count();

                                        $total_likes = DB::table('posts')
                                            ->where('influencer_id', Auth::user()->id)
                                            ->sum('no_of_likes');

                                        $likes = DB::select('SELECT * FROM posts WHERE id = ' . $post->id);

                                        foreach ($likes as $like) {
                                            $likes_no = $like->no_of_likes;
                                        }
                                    @endphp

                                    <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats"
                                                                                style="font-size: 0.69em;"><span
                                                    class="number_of_post_likes post_likes_{{ $post->id }}">
                                            {{ format_number($post_likes_count + $likes_no) }}</span></b><span
                                            class="like_post" style="cursor: pointer;" post_id="{{ $post->id }}" onclick="event.stopPropagation(); likePost(this)"> <i
                                                class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif  post_icon_{{ $post->id }} "
                                                post_id="{{ $post->id }}" style=""></i> <span
                                            style="cursor: pointer;font-weight: 100;" >{{ __('content.likes') }} </span> </span></a>
                                        &nbsp;                  <!-- Report Button (hidden until hover) -->
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

    </div></b> 
                                        <!--visible likes stay-->
                                    </center>


                </div>
                @endif
                @else
                    @if ($followership === null && Auth::user()->id != $user->id)
                        <!--<h1>Post visible ? : {{$post->visible}}</h1>   -->
                        <!--                        <h1>Auth::user()->id ? : {{Auth::user()->id}}</h1>   -->
                                                 @if ($post->visible == 0)
                        <img src="{{ asset('assets/images/blue24.png') }}"
                             alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!" class="img-responsive"
                             style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">
                                @else
                                
                                                                                     @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp


               @if (in_array(strtolower($file_extension), $video_extensions))

                    <video style="max-width: 100%;" controls loop controlsList="nodownload" 
                     @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif
    >

                        <source src="{{ asset('assets/images/' . $image_video . '') }}" type="video/mp4">


                    </video>
                @else
                    <img src="{{ asset('assets/images/' . $image_video . '') }}"
                         alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!" class="img-responsive"
                         style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">

                    @endif

                                
 <!--<img src="{{ asset('assets/images/' . $image_video . '') }}"-->
 <!--                                        alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"-->
 <!--                                        class="img-responsive"-->
 <!--                                        style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">-->
                                    @endif
                        </a>

                        @php

                            $post_likes_count = DB::table('likes')
                                ->where('post_id', $post->id)
                                ->count();

                            $check_post_like = DB::table('likes')
                                ->where('post_id', $post->id)
                                ->where('user_id', Auth::user()->id)
                                ->count();

                            $likes = DB::select('SELECT * FROM posts WHERE id = ' . $post->id);

                            foreach ($likes as $like) {
                                $likes_no = $like->no_of_likes;
                            }

                        @endphp

                        <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;"><span
                                        class="number_of_post_likes post_likes_{{ $post->id }}">{{ format_number($post_likes_count + $likes_no) }}</span></b><span
                                class="like_post" style="cursor: pointer;" post_id="{{ $post->id }}"> <i
                                    class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif  post_icon_{{ $post->id }} "
                                    post_id="{{ $post->id }}" style=""></i> </span><span
                                style="cursor: pointer;font-weight: 100;" class="indiviual_post_likes"
                                post_id="{{ $post->id }}" data-toggle="modal"
                                data-target="#PostLikesModalCenterindividual">Like</span></a> &nbsp; </b></center>

            </div>
            @else
                @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp


               @if (in_array(strtolower($file_extension), $video_extensions))

                    <video style="max-width: 100%;" controls loop controlsList="nodownload" 
                     @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif
    >

                        <source src="{{ asset('assets/images/' . $image_video . '') }}" type="video/mp4">


                    </video>
                @else
                    <img src="{{ asset('assets/images/' . $image_video . '') }}"
                         alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!" class="img-responsive"
                         style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">

                    @endif


                    </a>

                    @php

                        $post_likes_count = DB::table('likes')
                            ->where('post_id', $post->id)
                            ->count();

                        $check_post_like = DB::table('likes')
                            ->where('post_id', $post->id)
                            ->where('user_id', Auth::user()->id)
                            ->count();

                        $likes = DB::select('SELECT * FROM posts WHERE id = ' . $post->id);

                        foreach ($likes as $like) {
                            $likes_no = $like->no_of_likes;
                        }
                    @endphp

                    <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;"><span
                                    class="number_of_post_likes post_likes_{{ $post->id }}">{{ format_number($post_likes_count + $likes_no) }}</span></b><span
                            class="like_post" style="cursor: pointer;" post_id="{{ $post->id }}"> <i
                                class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif  post_icon_{{ $post->id }} "
                                post_id="{{ $post->id }}" style=""></i> </span><span
                            style="cursor: pointer;font-weight: 100;" class="indiviual_post_likes"
                            post_id="{{ $post->id }}"
                            data-toggle="modal" data-target="#PostLikesModalCenterindividual">{{ __('content.likes') }} </span></a>
                        &nbsp; </b>
                    </center>

        </div>
        @endif

        @endif
        @else
         @if ($post->visible == 0)
           <img src="{{ asset('assets/images/blue24.png') }}"
                 alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"
                 class="img-responsive"
                 style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">



            </a>

            @php

                $post_likes_count = DB::table('likes')
                    ->where('post_id', $post->id)
                    ->count();

                $check_post_like = DB::table('likes')
                    ->where('post_id', $post->id)
                    ->where('user_id', $user->id)
                    ->count();

                $likes = DB::select('SELECT * FROM posts WHERE id = ' . $post->id);

                foreach ($likes as $like) {
                    $likes_no = $like->no_of_likes;
                }

            @endphp

            <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;"><span
                            class="number_of_post_likes post_likes_{{ $post->id }}">{{ format_number($post_likes_count + $likes_no) }}</span></b><span
                    class="like_post play-sound1" style="cursor: pointer;" post_id="{{ $post->id }}"> <i
                        class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif  post_icon_{{ $post->id }} "
                        post_id="{{ $post->id }}" style="" data-toggle="modal" data-target="#register_Modal"></i>
            </span><span style="cursor: pointer;font-weight: 100;" class="indiviual_post_likes play-sound1"
                         post_id="{{ $post->id }}" data-toggle="modal" data-target="#register_Modal">{{ __('content.likes') }} </span></a>
                &nbsp;
                </b></center>
        @else
         @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp

               @if (in_array(strtolower($file_extension), $video_extensions))

                    <video style="max-width: 100%;" controls loop controlsList="nodownload" 
                     @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif
    >

                        <source src="{{ asset('assets/images/' . $image_video . '') }}" type="video/mp4">


                    </video>
                @else
                    <img src="{{ asset('assets/images/' . $image_video . '') }}"
                         alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!" class="img-responsive"
                         style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">

                    @endif
            </a>

            @php

                $post_likes_count = DB::table('likes')
                    ->where('post_id', $post->id)
                    ->count();

                $check_post_like = DB::table('likes')
                    ->where('post_id', $post->id)
                    ->where('user_id', $user->id)
                    ->count();

                $likes = DB::select('SELECT * FROM posts WHERE id = ' . $post->id);

                foreach ($likes as $like) {
                    $likes_no = $like->no_of_likes;
                }

            @endphp

            <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;"><span
                            class="number_of_post_likes post_likes_{{ $post->id }}">{{ format_number($post_likes_count + $likes_no) }}</span></b><span
                    class="like_post play-sound1" style="cursor: pointer;" post_id="{{ $post->id }}"> <i
                        class="@if ($check_post_like == null) icon-heart-o @else icon-heart @endif  post_icon_{{ $post->id }} "
                        post_id="{{ $post->id }}" style="" data-toggle="modal" data-target="#register_Modal"></i>
            </span><span style="cursor: pointer;font-weight: 100;" class="indiviual_post_likes play-sound1"
                         post_id="{{ $post->id }}" data-toggle="modal" data-target="#register_Modal">{{ __('content.likes') }} </span></a>
                &nbsp;
                </b></center>
        
        @endif
         

    </div>

    @endif
    @endforeach
    

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









    {{--    <script>--}}
    {{--        $.ajax({--}}
    {{--            url: '/chat/{{$user->id}}',  // Replace with your route URL--}}
    {{--            method: 'GET',          // Use 'POST' for sending data to the server--}}
    {{--            dataType: 'json',       // Expected response data type--}}
    {{--            success: function(response) {--}}
    {{--                // Handle the response data here--}}
    {{--                console.log(response);--}}
    {{--                // You can update the UI or do other things with the response--}}
    {{--            },--}}
    {{--            error: function(xhr, status, error) {--}}
    {{--                // Handle errors here--}}
    {{--                console.error(xhr.responseText);--}}
    {{--                // You can show error messages to the user, etc.--}}
    {{--            }--}}
    {{--        });--}}
    {{--    </script>--}}

    <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item" style="display: flex;align-items: center;">

        <center style="width: 100%;margin-bottom: 0.29em;">

            @if (count($last_three_posts) > 0)

                <a href="{{ URL('/posts/' . $username_URL . '') }}" class="btn btn-primary btn-outline">{{ __('content.all_posts') }}</a>
            @else
                {{-- <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-outline">{{ __('nav.add_post') }}</button> --}}

            @endif


        </center>

    </div>
    @else
        <div class="col-12" style="width: 100%;">

            <p style="text-align: center;color: rgba(0, 0, 0, 0.5);"><img src="{{ url('assets/images/time_icon.PNG') }}"
                                                                          style="margin-top: -7px;height: 32px;width: 25px;"
                                                                          alt=""> No hay posts todabía &nbsp;&nbsp; </p>

        </div>

    @endif



    @php

        $index = 0;

    @endphp



    @if (isset($Influencer_network_ids))



        @foreach ($Influencer_network_ids as $Influencer_network_id)
            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">


                @php

                    $socialnetwork = DB::table('socialnetworks')->where('id', $Influencer_network_id)->first();

                    $socialnetwork_feedimage = $socialnetwork->feed_image;

                    $socialnetwork_image = $socialnetwork->image;

                    $socialnetwork_name = $socialnetwork->name;

                @endphp

                <a href="{{ $Influencer_networks_profile_links[$index] }}">


                    <img src="{{ asset('assets/images/' . $socialnetwork_feedimage . '') }}"
                         alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!" class="img-responsive"
                         style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;">


                </a>

                <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="{{ $Influencer_networks_profile_links[$index] }}"
                                                            style="font-size: 0.92em;"><span style="color: #da1212;">

                                <b>

                                    <span><img
                                            @if ($socialnetwork->id == '1') src="{{ asset('assets/images/twitch_article.png') }}"
                                            @else
                                                src="{{ asset('assets/images/' . $socialnetwork_image . '') }}"
                                            @endif
                                            class="network_icon  @if (
                                                $socialnetwork->id == 73 ||
                                                    $socialnetwork->id == 72 ||
                                                    $socialnetwork->id == 81 ||
                                                    $socialnetwork->id == 71 ||
                                                    $socialnetwork->id == 41) small_network_icon @endif "
                                            style="width: 34px;display: inline-block;position: fixed;border: 7px solid transparent;@if ($socialnetwork->id == 3) margin-top: 3px; @endif @if ($socialnetwork->id == 73) margin-top: 3px; @endif @if ($socialnetwork->id == 81) margin-top: 3px; @endif @if ($socialnetwork->id == 41) margin-top: 3px; @endif @if ($socialnetwork->id == 4) margin-top: 3px; @endif @if (
                                                $socialnetwork->id == 73 ||
                                                    $socialnetwork->id == 72 ||
                                                    $socialnetwork->id == 81 ||
                                                    $socialnetwork->id == 71 ||
                                                    $socialnetwork->id == 41) width: 38px; @endif"
                                            style="width: 34px;display: inline-block;position: absolute;border: 7px solid transparent;@if ($socialnetwork->id == 3) margin-top: 3px; @endif @if ($socialnetwork->id == 73) margin-top: 3px; @endif @if ($socialnetwork->id == 81) margin-top: 3px; @endif @if ($socialnetwork->id == 41) margin-top: 3px; @endif @if ($socialnetwork->id == 4) margin-top: 3px; @endif @if (
                                                $socialnetwork->id == 73 ||
                                                    $socialnetwork->id == 72 ||
                                                    $socialnetwork->id == 81 ||
                                                    $socialnetwork->id == 71 ||
                                                    $socialnetwork->id == 41) width: 38px; @endif   "
                                            alt=""></span><b style="margin-left: 34px;"> <span
                                            style="font-weight: normal;">{{ __('content.go_to') }}</span> {{ $socialnetwork_name }}</b></b>


                        </a></b></center>

            </div>

            @php

                $index = $index + 1;

            @endphp
            @endforeach


            @endif


            </div>

            <br>









            <center>


            </center>

            </div>



@endif





            <hr style="margin-bottom: 0px;">

            <div class="fh5co-narrow-content">

                <div class="row">

                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">

                        <h1 class="fh5co-heading-colored">{{ __('footer.start_earning_header_2') }}</h1>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-4 animate-box" data-animate-effect="fadeInLeft">

                        <p class="fh5co-lead" style="font-weight: 300;">{{ __('footer.lead_paragraph_1') }}</p>

                        <p><a href="{{ url('/creador') }}" target="_blank" class="btn btn-primary btn-outline"><img
                                    src="{{ asset('assets/images/SUPERHEROINA.svg') }}"
                                    style="width: 14.47%;  position: relative; left: -11px;">
                                <font style="position: relative; left: -6px;">{{ __('footer.start_now_button') }}</font>
                            </a></p>

                    </div>

                    <div class="col-md-7 col-md-push-1">

                        <div class="row">

                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">

                                <p style="font-weight: 300;">{{ __('footer.lead_paragraph_2') }}</p>

                            </div>

                            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">

                                <p style="font-weight: 300;">{!! __('footer.lead_paragraph_3') !!}
                                </p>

                            </div>

                        </div>

                    </div>


                </div>


            </div>

            <hr style="margin-bottom: 0px;">

            <div class="fh5co-narrow-content">


                <center>
                    @php
                    $locale = app()->getLocale();
$logos = [
        'en' => 'Superworld-13.svg',
        'it' => 'Superworld-14.svg',
        'es' => 'Superworld-15.svg',
        'pt' => 'Superworld-15.svg',
        'ca' => 'Superworld-16.svg',
        'fr' => 'Superworld-17.svg',
        'de' => 'Superworld-18.svg',
    ];

    // default to English if locale not found
    $logo = $logos[$locale] ?? 'Superworld-13.svg';
@endphp

<img src="{{ asset('assets/images/' . $logo) }}" style="width: 11.1em;">
                    <p>© 2021-2025 @if ($user->footer_name_username == 'username')
                                <span
                                    style="display: inline-block;">@</span>{{ $user->username_URL }}
                            @else
                                {{ $user->name }} {{ $user->surname }}
                            @endif  <br>
                        {{ __('footer.all_rights_reserved') }} <br>
                        {{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a></p>
                </center>


            </div>


















            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script
                src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>


            <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
  function toggleUserReport(usernameUrl) {
    const el = document.getElementById('user-report-options-' + usernameUrl);
    if (!el) return;

    document.querySelectorAll('[id^="user-report-options-"]').forEach(div => {
      if (div !== el) div.style.display = 'none';
    });

    el.style.display = (el.style.display === 'none' || el.style.display === '') ? 'block' : 'none';
  }

  function submitUserReport(reason, username) {
    fetch("{{ route('report.user') }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify({ username: username, reason: reason })
    }).then(res => {
      if (res.ok) {
        Swal.fire({
          icon: 'success',
          title: `{{ __('report.sent_title') ?? 'Report Sent' }}`,
          html: `{{ __('report.thank_you') ?? 'Thank you for reporting this user.' }}`,
          confirmButtonText: 'OK'
        });
        const el = document.getElementById('user-report-options-' + username);
        if (el) el.style.display = 'none';
      } else {
        Swal.fire({
          icon: 'error',
          title: `{{ __('report.failed_title') ?? 'Oops!' }}`,
          html: `{{ __('report.failed_message') ?? 'Something went wrong. Please try again later.' }}`,
          confirmButtonText: 'OK'
        });
      }
    });
  }

  document.addEventListener('click', () => {
    document.querySelectorAll('[id^="user-report-options-"]').forEach(div => {
      div.style.display = 'none';
    });
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


<script>
document.addEventListener("DOMContentLoaded", function () {
    console.log('Script Loaded');

    const interval = setInterval(function() {
        const form = document.getElementById('payment-vip');
        const modal = document.getElementById('stripeFormContainer');

     
        if (form && modal && getComputedStyle(modal).display !== 'none') {
            console.log('Modal is visible!');
            console.log('Payment Form:', form);
            console.log('Busy with me button:', document.getElementById('busy_with_me_btn'));

           
            clearInterval(interval);
            console.log("Form is now visible");

   
            Stripe.setPublishableKey('{{ config('services.stripe.key') }}');
            console.log("Publishable Key Set");

            form.addEventListener('submit', function (e) {
                e.preventDefault();
                console.log('Submit event triggered');
                
                if (!form.dataset.ccOnFile || form.dataset.ccOnFile === 'false') {
                    console.log("No card on file, creating token");

                    Stripe.createToken({
                        number: document.querySelector('.card-number').value,
                        cvc: document.querySelector('.card-cvc').value,
                        exp_month: document.querySelector('.card-expiry-month').value,
                        exp_year: document.querySelector('.card-expiry-year').value
                    }, function (status, response) {
                        if (response.error) {
                            alert(response.error.message);
                            console.log(response.error.message);  
                        } else {
                            const tokenInput = document.getElementById('stripeToken');
                            tokenInput.value = response.id;
                            console.log('Token created:', response.id); 
                            form.submit();
                        }
                    });
                } else {
                    console.log("Card on file, submitting form");
                    form.submit();
                }
            });
        }
    }, 100); 
});

</script>






<script>
    $(function () {

                    var $form = $(".require-validations");

                    $(document).on('submit', 'form.require-validations', function (e) {



                        var $form = $(".require-validations"),

                            inputSelector = ['input[type=email]', 'input[type=password]',

                                'input[type=text]', 'input[type=file]',

                                'textarea'

                            ].join(', '),

                            $inputs = $form.find('.required').find(inputSelector),

                            $errorMessage = $form.find('div.error'),

                            valid = true;

                        $errorMessage.addClass('hide');


                        $('.has-error').removeClass('has-error');

                        $inputs.each(function (i, el) {

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

</script>







            <script type="text/javascript">
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

                

                $(function () {

                    var $form = $(".require-validation");

                    $('form.require-validation').bind('submit', function (e) {



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

                        $inputs.each(function (i, el) {

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

    $(document).ready(function () {
        $(".like_post").click(function () {
            var post_id = $(this).attr("post_id");

            $.ajax({
                url: '{{ URL::to('/influencer/like_dislike_post') }}',
                type: 'GET',
                data: { 'post_id': post_id },
                success: function (response) {
                    var icon = $(".post_icon_" + post_id);
                    var countSpan = $(".post_likes_" + post_id);
                    var countRaw = countSpan.text();
                    var count = parseFormattedLikes(countRaw);

                    if (isNaN(count)) count = 0;

                    if (response === "post liked") {
                        icon.removeClass("icon-heart-o").addClass("icon-heart");
                        count++;
                    } else if (response === "post disliked") {
                        icon.removeClass("icon-heart").addClass("icon-heart-o");
                        count = Math.max(0, count - 1);
                    }

                    // Update the count on screen with formatting
                    countSpan.text(formatNumber(count));
                }
            });
        });
    });
</script>




            <?php
            function thousandsCurrencyFormat($num)
            {
                if ($num > 1000) {
                    $x = round($num);
                    $x_number_format = number_format($x);
                    $x_array = explode(',', $x_number_format);
                    $x_parts = ['k', 'm', 'b', 't'];
                    $x_count_parts = count($x_array) - 1;
                    $x_display = $x;
                    $x_display = $x_array[0] . ((int)$x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                    $x_display .= $x_parts[$x_count_parts - 1];

                    return $x_display;
                }

                return $num;
            }

            function format_number($number)
            {
                $number_str = (string)$number;
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
