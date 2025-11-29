@extends('layouts_influencer.main')



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

</style>









<style>

  .slider{

position:relative;

}

.slider > .item_feed{

position: absolute;

opacity: 0;

z-index: 0;

width:100%;

height: 100%;

top:0;

left:0;

/* overflow:hidden; */

}

.slider > .item_feed.active_feed{

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

.slider .slider-nav a.active_feed{

  background: #fff;

opacity: 1;

}





/* For  Demo Only. */

/* The code below is not needed for slideshow to work. */



/*  Animations  */

/* .slider .item_feed.active .item_feed-content {

animation-name: fadeLeft;

animation-duration: 0.5s;

}

.slider .item_feed.active .item_feed-content p {

animation-name: fadeLeft;

animation-duration: .8s;

} */



.slider .item_feed.active-right .item_feed-content {

animation-name: fadeLeft;

animation-duration: 0.5s;

}

.slider .item_feed.active-right .item_feed-content p {

animation-name: fadeLeft;

animation-duration: .8s;

}



.slider .item_feed.active-left .item_feed-content {

animation-name: fadeRight;

animation-duration: 0.5s;

}

.slider .item_feed.active-left .item_feed-content p {

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

.slider > .item_feed {

text-align: center;

}

.slider > .item_feed .item_feed-content {

/* padding: 60px; */

padding: 0px;

}











::-webkit-input-placeholder { /* WebKit, Blink, Edge */

    color:    white !important;

}

:-moz-placeholder { /* Mozilla Firefox 4 to 18 */

   color:    white !important;

   opacity:  1;

}

::-moz-placeholder { /* Mozilla Firefox 19+ */

   color:    white !important;

   opacity:  1;

}

:-ms-input-placeholder { /* Internet Explorer 10-11 */

   color:    white !important;

}

::-ms-input-placeholder { /* Microsoft Edge */

   color:    white !important;

}



::placeholder { /* Most modern browsers support this now. */

   color:    white !important;

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
    .message-tag:hover {
    color: white !important;
    background: #5cb85c !important;
    border: 2px solid #5cb85c !important;
    transition: 0.3s;
    text-decoration: none;
}
</style>









<div id="fh5co-page">

    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle play-sound1" ><i></i></a>

    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">



      @php

      $user = DB::table('users')->where('id',$id)->first();

      @endphp

        <h1 id="fh5co-logo" style="margin-bottom: 0px;" ><a href="{{ URL('/influencer')}}"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 54%;"></a></h1>

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

        font-size: 14px;"><span style="width: 10px;

    height: 10px;

    background-color: #0ed145;

    display: inline-block;

    margin-right: 5px;

    border-radius: 30px;vertical-align: middle;"></span><span>@</span>{{$user->username_URL}}</p>

        <ul style="list-style-type: none;display: flex;font-size: 14px;width: 100%;justify-content: space-between;padding: 0px 26%;max-width: 300px;text-align: center;margin-left: auto;margin-right: auto;">

          @php

          $username_URL = $user->username_URL;

      @endphp

          <li> <a class="fh5co-active" href="{{ URL('/influencer/influencer/'.$username_URL.'')}}" style="text-decoration: underline;text-transform: uppercase;

            color: #222;

            font-size: 0.83em;

            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.wall') }}</a> </li>

          <li> <a href="{{ URL('/influencer/influencer_posts/'.$username_URL.'')}}" style="text-transform: uppercase;

            color: #222;

            font-size: 0.83em;

            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.posts') }}</a> </li>

        </ul>

        <center>

        <nav id="fh5co-main-menu" role="navigation">

            <ul>

              <li style="margin: 0 0 18px 0;"><a class="streaming_anchor" data-toggle="modal" data-target="#streamingModalCenter" style="cursor: pointer;margin-bottom: 0px;"><span style="width: 17px;height: 17px;background-color: red;display: inline-block;border-radius: 30px;border: 4px solid black;position: relative;top: 3px !important;"></span> Streaming<!--Subscribe <b>+</b>--></a></li>



                <li>

                    @php

                    $user = DB::table('users')->where('id',$id)->first();



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







                      </div>

                    </div>

                    @endif





                </li>

                <hr style="margin-top: -10px;margin-bottom: 20px;">

                <li ><a href="{{ URL('/influencer')}}">{{ __('nav.wall') }}</a></li>

                <li ><a href="{{ URL('/influencer/feed')}}">{{ __('nav.feed') }}</a></li>

                <li ><a href="{{ URL('/influencer/posts')}}">{{ __('nav.posts') }}</a></li><br>

                <hr style="margin-top: -17px;">



                {{-- data-toggle="modal" data-target="#exampleModalCenter" --}}

                {{-- <li class="username_li" style="font-size: 80%;"><p  style="cursor: pointer;white-space: nowrap;" data-toggle="modal" data-target="#exampleModalCenter"><b>@</b><b>{{Auth::user()->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p></li> --}}

                <li class="username_li" style="font-size: 80%;">

                  <div class="">
                    <p id="dropdownMenuButton" data-toggle="collapse" data-target="#demo" style="cursor: pointer;white-space: nowrap;transition: 0.3s;"><b>@</b><b>{{Auth::user()->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p>
                    <div class="collapse-div collapse" id="demo" style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;">

                    <p class="dropdown-item add_post_item" data-toggle="modal" data-target="#add_post_modal" style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;"><i class="fa fa-plus" ></i> {{ __('nav.add_post') }}</p>
                    
                      <p class="dropdown-item control_panel_item"  data-target="#exampleModalCenter" style="margin: 0px;cursor: pointer;border: 2px solid #585858;padding: 6px;"><i class="far fa-user-circle" ></i> {{ __('nav.control_panel') }}</p>

<p onclick="window.location.href='{{ URL('/influencer/messages') }}'" class="dropdown-item add_post_item message-tag" 
                                       style="margin: 0px;cursor: pointer;border: 2px solid #585858;margin-top: 10px;padding: 6px;">
                                         <i class="fa fa-envelope"></i> {{ __('nav.messages') }}
                                    </p>
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

                    <span class="input-group-addon" id="search_influencer" style="padding: 0px;padding-left: 6px;padding-right: 6px;background: transparent;border: 0px;cursor: pointer;">🔎</span>


                    <select class="form-control" id="influencer_select" style="padding: 0px;background: transparent;border: 0px;height: 39px;font-size: 15px;">

                      <option>Buscar Influencer</option>

                      <option value="All influencers">All influencers</option>



                      @foreach ($influencers as $influencer)

                      <option value="{{$influencer->username_URL}}">{{$influencer->username_URL}}</option>

                      @endforeach







                    </select>



                  </div>
 --}}
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


{{--                <li><a href="{{Auth::user()->instagram_link}}"><i class="icon-instagram" style="font-size: 2.1em;"></i></a></li>--}}

                <!--<li><a href="https://www.twitch.com/" target="_blank"><i class="icon-twitch" style="font-size: 2.1em;"></i></a></li>

                    <li><a href="https://www.youtube.com/" target="_blank"><i class="icon-youtube" style="font-size: 2.1em;"></i></a></li>-->

            </ul><br>

            <p><span><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </span><br><small><span><a href="https://live.superfanss.app/super-ads">SUPER ADS CENTER🏢</a> </span><br>&copy; 2021-2025 @if(Auth::user()->footer_name_username == "username") <span style="display: inline-block;">@</span>{{Auth::user()->username_URL}} @else {{Auth::user()->name}} {{Auth::user()->surname}} @endif <br>{{ __('footer.all_rights_reserved') }}</span> <span>{{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a> </span> </small></p>

        </div>



    </aside>







    <div id="fh5co-main">



        @php

            $profile_picture = $user->profile_picture;

            $cover_picture = $user->cover_picture;

        @endphp

        <div  style="text-align: right;position: relative;">

          @if ($cover_picture != null)

              <img src="{{ asset('assets/images/'.$cover_picture.'') }}" style="max-height: 50%;width: 100%;height: 50%;" alt="">



              {{-- <i class="fa fa-plus" data-toggle="modal" data-target="#exampleModalCenter" style="background: white;border-radius: 56px;position: absolute;right: 20px;bottom: 0;margin-bottom: -12px;cursor: pointer;z-index: 2;box-shadow: 2px 2px 3px #e78267;color: #333;font-size: 14px;padding: 5px 6px;" aria-hidden="true"></i> --}}

            @else

              <img src="{{ asset('assets/images/coverYellow.png') }}" style="max-height: 50%;width: 100%;height: 50%;" alt="">



                  {{-- <i class="fa fa-plus" data-toggle="modal" data-target="#exampleModalCenter" style="background: white;border-radius: 56px;position: absolute;right: 20px;bottom: 0;margin-bottom: -12px;cursor: pointer;z-index: 2;box-shadow: 2px 2px 3px #e78267;color: #333;font-size: 14px;padding: 5px 6px;" aria-hidden="true"></i> --}}



          @endif



        </div>

        <div class="fh5co-narrow-content" style="padding-top: 0px;margin-top: -54px;">



          @if(session()->has('duplicate_error'))

            <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

                {{ session()->get('duplicate_error') }}

            </div>

          @endif



          {{-- @if(session()->has('message'))

            <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

                {{ session()->get('message') }}

            </div>

          @endif --}}



          {{-- @if(session()->has('message_subscription'))

            <div class="alert alert-success" style="position: absolute;min-width: fit-content;width: 200px;right: 35%;top: 9%;">

                {{ session()->get('message_subscription') }}

            </div>

          @endif --}}







            <center>

              @if ($profile_picture != null)

              <img src="{{ asset('assets/images/'.$profile_picture.'') }}" style="width: 92px; height: 92px; border-radius: 74px;">

              @else

              <img src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" style="width: 92px; height: 92px; border-radius: 74px;">

              @endif





                <br><br><b>{{$user->name}}</b>

                <br><?php echo '@' ?>{{$user->username_URL}}<br><br>



                @php



                    $user_id = Auth::user()->id;

                    $subscription = DB::table('subscriptions')->where('user_id',$user_id)->where('influencer_id',$user->id)->first();



                @endphp



                @if ($subscription === null)

                    <span @if(Auth::user()->id == $user->id) data-toggle="modal" data-target="#exampleModalCenter" @else data-toggle="modal" data-target="#paymentModalCenter" @endif  class="btn btn-primary btn-outline" style="width: 226px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.follow') }}  <b>+</b> | <b>${{$user->price_of_subscription}}</b></span><br>

                @else

                {{-- <img src="{{ asset('assets/images/tick.PNG') }}" alt=""> --}}

                    <span data-toggle="modal" data-target="#cancelsubscriptionmodal" class="btn btn-primary btn-outline" style="width: 226px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.followed') }}  | <b><i class="fa fa-check" style="font-size: 17px;" aria-hidden="true"></i></b></span><br>



                    <div class="modal" id="cancelsubscriptionmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123122;">

                      <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content" style="border-radius: 20px;background: red;">

                          <div class="modal-header" style="border: 0px">

                            <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close" style="font-size: 45px;opacity: 12;color: white;margin-top: -15px;">

                              <span aria-hidden="true" >&times;</span>

                            </button>

                            <div style="text-align: center">

                            <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;" alt="">

                            <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.delete_subscription') }}</h5>

                          </div>

                          </div>

                          <div class="modal-body" style="border: 0px">

<div style="width:95%; margin-bottom:45px; color:white; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">
{{ __('content.subscription_warning') }}
</div>

                              <div class="container-fluid">



                                @php

                                    $subscription = DB::table('subscriptions')->where('influencer_id',$user->id)->where('user_id',Auth::user()->id)->first();

                                    $subscription_id = $subscription->id;

                                @endphp



                                <a class="btn btn-block mb-3" type="submit"





                                           href="{{url('user/delete_subscription/'.$subscription_id.'')}}" style="max-width: 180px;margin-left: auto;margin-right: auto;color: #333;-webkit-color: #333;-moz-color: #333;background: #efefef;-webkit-background: #efefef;-moz-background: #efefef;">{{ __('content.unsubscribe') }}</a>



                              </div>



                          </div>



                        </div>

                      </div>

                    </div>







                @endif







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

                        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 30px;text-align: center;color: white;display: inline-block;">Pay with Credit card:</h5>

                      </div>

                      </div>

                      <div class="modal-body" style="border: 0px">



                          <div class="container-fluid">

                            {{-- <h2 style="color: white;">Pay with card</h2> --}}

                            <div class="row">



                              <div class="col-md-2">



                              </div>



                              <div class="col-12 col-md-8 ">



                        <form role="form" action="{{ route('stripe.post') }}" method="post"

                                class="require-validation" data-cc-on-file="false"

                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form" style="text-align: left;color: white;">

                                @csrf





                                <input type="hidden" name="amount" value="{{$user->price_of_subscription}}">



                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">



                                <input type="hidden" name="influencer_id" value="{{$user->id}}">





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
                                🇪🇸 Usted se suscribirá a la tarifa mensual base de un Influencer con TRES meses de permanencia si se suscribe a una tarifa de oferta de bienvenida inferior a un dólar o un euro <br>
                                🇺🇸 You will be subscribed to the base monthly rate of an Influencer with a three-month commitment if you subscribe to a welcome offer rate of less than one dollar or one euro.</p>
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

                          // Sandbox account

                          // $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';

                          // $paypal_email = 'info@phpzag.com';



                          // Real account

                          $paypal_url = 'https://www.paypal.com/cgi-bin/webscr';

                          $paypal_email = 'subscriptions@superfanss.app';

                        @endphp





                  <form action="<?php echo $paypal_url; ?>" method="post">

                    <!-- Paypal business test account email id so that you can collect the payments. -->

                    <input type="hidden" name="business" value="<?php echo $paypal_email; ?>">

                    <!-- Buy Now button. -->

                    <input type="hidden" name="cmd" value="_xclick">

                    <!-- Details about the item that buyers will purchase. -->

                    <input type="hidden" name="item_name" value="">

                    <input type="hidden" name="item_number" value="">

                    <input type="hidden" name="amount" value="{{$user->price_of_subscription}}">

                    <input type="hidden" name="currency_code" value="USD">

                    <!-- URLs -->

                    @php

                         $username_URL = $user->username_URL;

                    @endphp

                    <input type='hidden' name='cancel_return' value='{{url('/influencer/influencer/'.$username_URL.'')}}'>

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





                @php

                    $subscription_count = DB::table('subscriptions')->where('influencer_id',$user->id)->count();



                    $posts_count = DB::table('posts')->where('influencer_id',$user->id)->count();



                    $likes_count = DB::table('likes')->where('influencer_id',$user->id)->count();

                    $total_likes = DB::table('posts')->where('influencer_id', Auth::user()->id)->sum('no_of_likes');


                @endphp



                <b><a href="{{ URL('/influencer/influencer_posts/'.$username_URL.'')}}" style="font-size: 0.69em;">{{$posts_count}}</b> {{ __('content.post') }}</a> | <b><a href="#" @if ($subscription === null) data-toggle="modal" data-target="#paymentModalCenter" @else  data-toggle="modal" data-target="#LikesModalCenter" @endif  style="font-size: 0.69em;"><span class="number_of_likes">
                    {{

                    thousandsCurrencyFormat($likes_count+$total_likes)

                    }}
                </span></b> Like(s)</a> | <b><a href="#" @if ($subscription === null) data-toggle="modal" data-target="#paymentModalCenter" @else  data-toggle="modal" data-target="#subcriberlistmodal" @endif class="direct_subscriber_list" style="font-size: 0.69em;">{{thousandsCurrencyFormat($subscription_count)}}</b> {{ __('content.followers') }}</a>

                @php

                    $other_influencer_user = "123";


                @endphp

                @php
                    $other_influencer_user_id = $user->id;
                @endphp

                <!--<br>

                <b><a href="#" style="font-size: 0.69em;">11</b> {{ __('content.post') }}</a> | <b><a href="#" style="font-size: 0.69em;">26K</b> {{ __('content.likes') }} </a> | <b><a href="#" style="font-size: 0.69em;">4.6K</b> {{ __('content.followers') }}</a>-->

                <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft" style="font-family: 'Roboto Slab', serif; color: #dd2110;

                "></h2>

                </center>

                        <div class="row animate-box" style="display: flex;flex-wrap: wrap;" data-animate-effect="fadeInLeft">



                          @if(count($last_three_posts) > 0)



                          @foreach($last_three_posts as $post)

                            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">

                              @php

                                  $post_id = $post->id;

                              @endphp

                              <a href="{{ URL('/influencer/post_detail/'.$post_id.'')}}">

                                @php

                                  $image_video = $post->image_video;



                                  $influencer_id = $post->influencer_id;

                                  $user_id = Auth::user()->id;

                                  $subscription = DB::table('subscriptions')->where('user_id',$user_id)->where('influencer_id',$influencer_id)->first();







                                @endphp



                                @if ($subscription === null)

                                  <img src="{{ asset('assets/images/blue24.png') }}" alt="Nueva Modelo Superfans - Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;max-height: 411px;">

                                @else



                                @php

                                  $image_video = $post->image_video;

                                  $file_extension = substr($image_video, strpos($image_video, ".") + 1);



                                @endphp

                                 @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp

               @if (in_array(strtolower($file_extension), $video_extensions))
                                        <video controlsList="nodownload"  style="max-width: 100%;" controls loop>

                                            <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    type="video/mp4">


                                        </video>
                                    @else
                                 
                                           <img src="{{ asset('assets/images/'.$image_video.'') }}" alt="Nueva Modelo Superfans - Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;max-height: 411px;">
                                    @endif





                                @endif







                              </a>

                              @php

                                  $post_likes_count = DB::table('likes')->where('post_id',$post->id)->count();



                                  $check_post_like = DB::table('likes')->where('post_id',$post->id)->where('user_id',Auth::user()->id)->count();


    $likes = DB::select("SELECT * FROM posts WHERE id = ". $post->id);

                                    foreach ($likes as $like) {
                                        $likes_no = $like->no_of_likes;
                                    }

                              @endphp

                              <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a class="post_stats" style="font-size: 0.69em;" @if ($subscription === null) data-toggle="modal" data-target="#paymentModalCenter" @endif><span class="number_of_post_likes post_likes_{{$post->id}}">
                                    {{
                                   format_number($post_likes_count+$likes_no);
                                   }}

                              </span></b><span @if ($subscription != null) class="like_post" @endif style="cursor: pointer;font-weight: 100;" post_id="{{$post->id}}" @if ($subscription === null) data-toggle="modal" data-target="#paymentModalCenter" @endif> <i @if ($subscription === null) class="icon-heart-o" data-toggle="modal" data-target="#paymentModalCenter" @else  class="@if($check_post_like == null) icon-heart-o @else icon-heart  @endif  post_icon_{{$post->id}} " post_id="{{$post->id}}"   @endif style=""></i> </span><span   style="cursor: pointer;" class="indiviual_post_likes" post_id="{{$post->id}}" @if ($subscription != null) data-toggle="modal" data-target="#PostLikesModalCenterindividual_another_influencer_user" @endif >{{ __('content.likes') }} </span></a> &nbsp; </b></center>


                            </div>

                          @endforeach




                          <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item" style="display: flex;align-items: center;">

                            <center style="width: 100%;margin-bottom: 0.29em;">

                              @if (count($last_three_posts) > 0)

                                <a href="{{ URL('/influencer/influencer_posts/'.$username_URL.'')}}" class="btn btn-primary btn-outline">{{ __('content.all_posts') }}</a>

                              @else

                              {{-- <button data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-outline">{{ __('nav.add_post') }}</button> --}}

                              @endif



                                  </center>

                          </div>









                          {{-- <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">



                            @if ($Influencer_networks != null)

                              <div>

                                <div id="slider_id" class="slider" style="width: 100%;margin: 0px;box-shadow: none;">

                                    <div class="slider-control next_feed play-sound2" style="right: 0;"><i class="fa fa-angle-right" aria-hidden="true" style="color: #060605"></i></div>

                                     <div class="slider-control prev_feed play-sound2"><i class="fa fa-angle-left" aria-hidden="true" style="color: #060605"></i></div>
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



                                    @foreach($Influencer_network_ids as $Influencer_network_id)



                                    @php

                                        $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();

                                        $socialnetwork_feedimage = $socialnetwork->feed_image;

                                        $socialnetwork_name = $socialnetwork->name;

                                    @endphp



                                        <div class="item_feed @if($first_network == 1) active_feed @endif " >

                                            <div class="item-content">

                                            <a href="{{$Influencer_networks_profile_links[$index]}}"><img src="{{ asset('assets/images/'.$socialnetwork_feedimage.'') }}" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;"><br>&nbsp;&nbsp;</a>

                                            <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="https://www.mipriv.com" style="font-size: 0.69em;">{{ $socialnetwork_name }}</b> </a></center>

                                          </div>

                                        </div>

                                        @php

                                        $first_network = 0;

                                        $index = $index + 1;

                                        @endphp



                                        @endforeach







                                </div>

                              </div>

                            @endif



                          </div> --}}





                          @else

                              <br>

                              <div class="col-12" style="width: 100%;">

                          <p style="text-align: center;color: color: rgba(0, 0, 0, 0.5);;"><img src="{{url('assets/images/time_icon.PNG')}}" style="margin-top: -7px;height: 32px;width: 25px;" alt="">{{ __('content.no_posts_yet') }}&nbsp;&nbsp;</p>

                        </div>

                          @endif



                          {{-- <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">

                            <a href="pics/01.html">

                              <img src="{{ asset('assets/images/blue24.png') }}" alt="Nueva Modelo Superfans - Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;">



                            </a>

                            <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="https://www.mipriv.com" style="font-size: 0.69em;">3.8K</b> <i class="icon-heart" style="font-size: 0.92em !important;"></i> {{ __('content.likes') }} </a> &nbsp; <b><a href="https://www.mipriv.com" style="font-size: 0.69em;">711</b> <i class="icon-comment"></i> Comentarios</a></center>

                          </div>

                          <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">

                            <a href="pics/02.html">

                              <img src="{{ asset('assets/images/blue24.png') }}" alt="Nueva Modelo Superfans - Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;">



                            </a>

                            <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="https://www.mipriv.com" style="font-size: 0.69em;">4.6K</b> <i class="icon-heart" style="font-size: 0.92em !important;"></i> {{ __('content.likes') }} </a> &nbsp; <b><a href="https://www.mipriv.com" style="font-size: 0.69em;">711</b> <i class="icon-comment"></i> Comentarios</a></center>

                          </div>

                          <div class="clearfix visible-sm-block"></div>

                          <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">

                            <a href="pics/03.html">

                              <img src="{{ asset('assets/images/blue24.png') }}" alt="Nueva Modelo Superfans - Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;">



                            </a>

                            <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="https://www.mipriv.com" style="font-size: 0.69em;">2.6K</b> <i class="icon-heart" style="font-size: 0.92em !important;"></i> {{ __('content.likes') }} </a> &nbsp; <b><a href="https://www.mipriv.com" style="font-size: 0.69em;">711</b> <i class="icon-comment"></i> Comentarios</a></center>

                          </div>





                          <div class="clearfix visible-md-block"></div> --}}

                          @php





                          $Influencer_networks = $user->Influencer_networks;



                          if($Influencer_networks != null) {





                                $Influencer_network_ids = explode(",", $Influencer_networks);



                                $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;

                                $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);

                            }



                          @endphp



                          @php

                            $index = 0;

                          @endphp



                          @foreach($Influencer_network_ids as $Influencer_network_id)

                            <div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">



                              @php

                                  $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();

                                  $socialnetwork_feedimage = $socialnetwork->feed_image;

                                  $socialnetwork_image = $socialnetwork->image;

                                  $socialnetwork_name = $socialnetwork->name;

                              @endphp

                              <a href="{{$Influencer_networks_profile_links[$index]}}">



                                <img src="{{ asset('assets/images/'.$socialnetwork_feedimage.'') }}" alt="Nueva Modelo Superfans - Â¡Bienvenid@ a mi Portfolio!" class="img-responsive" style="border-radius: 26px !important; border: 7px solid lightgray;width: 100%;max-height: 411px;">



                              </a>

                              <center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="{{$Influencer_networks_profile_links[$index]}}" style="font-size: 0.92em;"><span style="color: #da1212;">

                                <b>

                                  <span><img @if ($socialnetwork->id == "1")
                                    src="{{ asset('assets/images/twitch_article.png') }}"
                                  @else
                                  src="{{ asset('assets/images/'.$socialnetwork_image.'') }}"
                                  @endif  style="width: 34px;display: inline-block;position: fixed;border: 5px solid transparent;@if($socialnetwork->id == 3) margin-top: 3px; @endif @if($socialnetwork->id == 73) margin-top: 3px; @endif @if($socialnetwork->id == 81) margin-top: 3px; @endif @if($socialnetwork->id == 41) margin-top: 3px; @endif @if($socialnetwork->id == 4) margin-top: 3px; @endif" alt=""></span><b style="margin-left: 34px;"> <span style="font-weight: normal;">{{ __('content.go_to') }}</span> {{ $socialnetwork_name }}</b></b></b>

                              </a></center>

                            </div>

                            @php

                                $index = $index + 1;

                            @endphp

                          @endforeach





                        </div>

                        <br>











                      </div>





                      <!--<div class="fh5co-testimonial" >

                        <div class="fh5co-narrow-content">

                          <div class="owl-carousel-fullwidth animate-box" data-animate-effect="fadeInLeft">

                                <div class="item">

                                  <figure>

                                    <img src="images/testimonial_person2.jpg" alt="Free HTML5 Bootstrap Template">

                                  </figure>

                                    <p class="text-center quote">&ldquo;Design must be functional and functionality must be translated into visual aesthetics, without any reliance on gimmicks that have to be explained. &rdquo; <cite class="author">&mdash; Ferdinand A. Porsche</cite></p>

                                </div>

                                <div class="item">

                                  <figure>

                                    <img src="images/testimonial_person3.jpg" alt="Free HTML5 Bootstrap Template">

                                  </figure>

                                    <p class="text-center quote">&ldquo;Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didnâ€™t really do it, they just saw something. It seemed obvious to them after a while. &rdquo;<cite class="author">&mdash; Steve Jobs</cite></p>

                                </div>

                                <div class="item">

                                  <figure>

                                    <img src="images/testimonial_person4.jpg" alt="Free HTML5 Bootstrap Template">

                                  </figure>

                                    <p class="text-center quote">&ldquo;I think design would be better if designers were much more skeptical about its applications. If you believe in the potency of your craft, where you choose to dole it out is not something to take lightly. &rdquo;<cite class="author">&mdash; Frank Chimero</cite></p>

                                </div>

                              </div>

                        </div>

                        </div>-->





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

                            <p><a href="{{url('/creador')}}" target="_blank" class="btn btn-primary btn-outline"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 14.47%; position: relative; left: -11px;"><font style="position: relative; left: -6px;">{{ __('footer.start_now_button') }}</font></a></p>

                          </div>

                          <div class="col-md-7 col-md-push-1">

                            <div class="row">

                              <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">

                                <p style="font-weight: 300;">{{ __('footer.lead_paragraph_2') }}</p>

                              </div>

                              <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">

                                <p style="font-weight: 300;">{!! __('footer.lead_paragraph_3') !!}</p>

                              </div>

                            </div>

                        </div>



                      </div>







                    </div>


<hr style="margin-bottom: 0px;">

        <div class="fh5co-narrow-content">



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
            <p><b><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </b><br>© 2021-2025 SUPER WORLD <br>
              {{ __('footer.all_rights_reserved') }} <br>
              {{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a></p>
          </center>


        </div>

                  </div>





                  <!-- Modal user settings -->

  {{-- <div class="modal" id="userModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123122;">

    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content" style="border-radius: 20px;background: red;">

        <div class="modal-header" style="border: 0px">

          <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close" style="font-size: 45px;opacity: 1;color: white;">

            <span aria-hidden="true" >&times;</span>

          </button>

          <div style="text-align: center">

          <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;" alt="">

          <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('nav.control_panel') }}:</h5>

        </div>

        </div>

        <div class="modal-body" style="border: 0px">



          <div >

          @php

              $id = Auth::user()->id;

              $subscriptions = DB::table('subscriptions')->where('user_id',$id)->get();

          @endphp



          @foreach ($subscriptions as $subscription)



          @php

                $influencer_id = $subscription->influencer_id;

                $influencer = DB::table('users')->where('id',$influencer_id)->first();

          @endphp



            <div style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">



              <p style="margin: 0px">{{$influencer->username_URL}}</p>



            </div>







          @endforeach



        </div>



        </div>



      </div>

    </div>

  </div> --}}









<!-- Modal -->

{{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content" style="border-radius: 20px;background: red;">

      <div class="modal-header" style="border: 0px">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px;opacity: 1;color: white;">

          <span aria-hidden="true" >&times;</span>

        </button>

        <h5 class="modal-title" id="exampleModalCenterTitle" style="font-size: 30px;text-align: center;color: white;">{{ __('nav.control_panel') }}:</h5>



      </div>

      <div class="modal-body" style="border: 0px">

        <form action="{{ url('/influencer/add_post') }}" method="post" enctype="multipart/form-data">

          @csrf

          <input type="hidden" name="influencer_id" value="{{$user->id}}">

          <div class="custom-file" style="display: flex;">

            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('nav.add_post') }}</label>

            <input type="file" class="custom-file-input" name="post_image_video" id="validatedCustomFile" style="color: white;margin-top: 3px;" required>

            <button type="submit" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.post') }}</button>



          </div>

        </form>

      </div>



    </div>

  </div>

</div>











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



    setTimeout(function(){

 	     $(".alert").css("display","none")

    }, 2000);



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

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>



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



var userRoute = "{{ url('autocomplete-user-search') }}";
$('.user_search').typeahead({
    source: function (query, process) {
        return $.get(userRoute, {
            query: query
        }, function (data) {
            return process(data);
        });
    },
    afterSelect: function(item) {
     // window.location.href = "/influencer/user/"+item.name+"";
     window.location.href = "/"+item.name+"";
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

              url: '{{URL::to('/influencer/like_dislike_post')}}',

              type: 'GET',

              data: { 'post_id':post_id },

              success: function(response)

              {



                if(response == "post liked") {



                  $(".post_icon_"+post_id+"").removeClass("icon-heart-o");

                  $(".post_icon_"+post_id+"").addClass("icon-heart");


                  var post_likes = $(".post_likes_value_"+post_id+"").text();

                  var post_likes = parseInt(post_likes);

                  post_likes = post_likes + 1;

 //                 $(".post_likes_"+post_id+"").text("");

                 $(".post_likes_"+post_id+"").text(post_likes);

                  var number_of_likes = $(".likes_value").text();

                 // alert(number_of_likes);

                  var number_of_likes = parseInt(number_of_likes);

                //  number_of_likes = number_of_likes + 1;

//                 $(".number_of_likes").text("");

                 $(".number_of_likes").text(number_of_likes);



                } else if(response == "post disliked") {

                  $(".post_icon_"+post_id+"").removeClass("icon-heart");

                  $(".post_icon_"+post_id+"").addClass("icon-heart-o");


                 var post_likes = $(".post_likes_value_"+post_id+"").text();

                  var post_likes = parseInt(post_likes);

                 // post_likes = post_likes - 1;

      //            $(".post_likes_"+post_id+"").text("");

               $(".post_likes_"+post_id+"").text(post_likes);


                  var number_of_likes = $(".likes_value").text();

                  var number_of_likes = parseInt(number_of_likes);

                 number_of_likes = number_of_likes - 1;

     //             $(".number_of_likes").text("");

               $(".number_of_likes").text(number_of_likes);


                }



              }

          });









      });

  });

</script>

<?php
function thousandsCurrencyFormat($num) {

  if($num>1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;

  }

  return $num;
}


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
