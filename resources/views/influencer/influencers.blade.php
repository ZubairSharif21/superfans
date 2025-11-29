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
    .message-tag:hover {
    color: white !important;
    background: #5cb85c !important;
    border: 2px solid #5cb85c !important;
    transition: 0.3s;
    text-decoration: none;
}
</style>











<script>
    window.addEventListener('load', function () {
        const loader = document.getElementById('loader');
        loader.style.transition = 'opacity 2.6s ease';
        loader.style.opacity = 0;
       setTimeout(() => loader.style.display = 'none', 700);
    });
</script>

    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle play-sound1" ><i></i></a>

    <aside id="fh5co-aside" role="complementary" class="border js-fullheight">



        <h1 id="fh5co-logo" style="margin-bottom: 0px;"><a href="{{ URL('/influencer')}}"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 54%;"></a></h1>

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

        <ul style="list-style-type: none;font-size: 14px;width: 100%;padding: 0px 26%;">

          <li style="text-align: center;"> <a href="#" style="pointer-events: none;text-transform: uppercase;

            color: #222;

            font-size: 0.83em;

            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">{{ __('nav.wall') }}</a> </li>

          

        </ul>

        <center>

        <nav id="fh5co-main-menu" role="navigation">

            <ul>

                <li class="fh5co-active"><a href="{{ URL('/influencer/')}}">{{ __('nav.wall') }}</a></li>

                <li ><a href="{{ URL('/influencer/feed')}}">{{ __('nav.feed') }}</a></li>

                <li ><a href="{{ URL('/influencer/posts')}}">{{ __('nav.posts') }}</a></li><br>

                <hr style="margin-top: -17px;">

                

                {{-- <li class="username_li" style="font-size: 80%;"><p  style="cursor: pointer;white-space: nowrap;" data-toggle="modal" data-target="#exampleModalCenter"><b>@</b><b>{{Auth::user()->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p></li> --}}

                <li class="username_li" style="font-size: 80%;">

                  

                  <div class="dropdown">

                    <p id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="cursor: pointer;white-space: nowrap;transition: 0.3s;"><b>@</b><b>{{$user->username_URL}} <i class="far fa-user-circle" style="font-size: 20px;"></i></b></p>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: 12px;padding: 10px;position: relative;width: fit-content;float: none;box-shadow: none;border: 0px;">

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
                    <div class="wrapper_span">🔎</div>
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

{{--                <li><a href="{{Auth::user()->instagram_link}}"><i class="icon-instagram" style="font-size: 2.1em;"></i></a></li>--}}

                <!--<li><a href="https://www.twitch.com/" target="_blank"><i class="icon-twitch" style="font-size: 2.1em;"></i></a></li>

                    <li><a href="https://www.youtube.com/" target="_blank"><i class="icon-youtube" style="font-size: 2.1em;"></i></a></li>-->

            </ul><br>

            <p><small><span><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </span><br>&copy; 2021-2025  @if(Auth::user()->footer_name_username == "username") <span style="display: inline-block;">@</span>{{Auth::user()->username_URL}} @else {{Auth::user()->name}} {{Auth::user()->surname}} @endif  <br>{{ __('footer.all_rights_reserved') }}</span> <span>{{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a> </span> </small></p>

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



              <i class="fa fa-plus" data-toggle="modal" data-target="#exampleModalCenter" style="background: white;border-radius: 56px;position: absolute;right: 20px;bottom: 0;margin-bottom: -12px;cursor: pointer;z-index: 2;box-shadow: 2px 2px 3px #e78267;color: #333;font-size: 14px;padding: 5px 6px;" aria-hidden="true"></i>

            @else

              <img src="{{ asset('assets/images/coverYellow.png') }}" style="max-height: 50%;width: 100%;height: 50%;" alt="">

              

                  <i class="fa fa-plus" data-toggle="modal" data-target="#exampleModalCenter" style="background: white;border-radius: 56px;position: absolute;right: 20px;bottom: 0;margin-bottom: -12px;cursor: pointer;z-index: 2;box-shadow: 2px 2px 3px #e78267;color: #333;font-size: 14px;padding: 5px 6px;" aria-hidden="true"></i>

              

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





            

            <center>

              @if ($profile_picture != null)

              <img src="{{ asset('assets/images/'.$profile_picture.'') }}" style="width: 92px; height: 92px; border-radius: 74px;">    

              @else

              <img src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" style="width: 92px; height: 92px; border-radius: 74px;">

              @endif              



              

              



                <br><br><b>{{$user->name}}</b> 

                <br><?php echo '@' ?>{{$user->username_URL}}<br><br>

                <span data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary btn-outline"style="width: 226px !important;"><img src="{{ asset('assets/images/SUPERHEROINA.svg') }}" style="width: 17.47%; margin: 3px; position: relative; left: -4px;">{{ __('content.follow') }}  <b>+</b> | <b>${{$user->price_of_subscription}}</b></span><br>

                @php

                    $subscription_count = DB::table('subscriptions')->where('influencer_id',$user->id)->count();



                    $posts_count = DB::table('posts')->where('influencer_id',$user->id)->count();



                    $likes_count = DB::table('likes')->where('influencer_id',$user->id)->count();

                    $total_likes = DB::table('posts')->where('influencer_id', Auth::user()->id)->sum('no_of_likes');

                @endphp



                <b><a href="#" style="font-size: 0.69em;">{{$posts_count}}</b> {{ __('content.post') }}</a> | <b><a href="#" style="font-size: 0.69em;"><span class="number_of_likes">
                   {{thousandsCurrencyFormat(likes_count+$total_likes)}}ss
                </span></b> {{ __('content.likes') }} </a> | <b><a href="#" style="font-size: 0.69em;">{{thousandsCurrencyFormat($subscription_count)}}</b> {{ __('content.followers') }}</a>

                <!--<br>

                <b><a href="#" style="font-size: 0.69em;">11</b> {{ __('content.post') }}</a> | <b><a href="#" style="font-size: 0.69em;">26K</b> {{ __('content.likes') }} </a> | <b><a href="#" style="font-size: 0.69em;">4.6K</b> {{ __('content.followers') }}</a>-->

                <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft" style="font-family: 'Roboto Slab', serif; color: #dd2110;

                "></h2>

                </center>





                <section>

                    <div class="container-fluid">

                        <div class="row">

                            @foreach ($influencers as $influencer)

                                @php

                                    $profile_picture = $influencer->profile_picture;

                                    $id = $influencer->id;

                                    $username_URL = $influencer->username_URL;

                                @endphp

                                <div class="col-md-4">

                                  

                                        <div class="col-12 card my-2 " style="text-align: center;box-shadow: 0px 0px 2px 3px #e78267;">

                                            @if ($profile_picture != null)

                                                <a href="{{ URL('/influencer/influencer/'.$username_URL.'')}}"><img src="{{ asset('assets/images/'.$profile_picture.'') }}" style="margin-top: 30px;border-radius: 70px;height: 92px;width: 92px;" alt=""></a>    

                                            @else

                                            

                                            <a href="{{ URL('/influencer/influencer/'.$username_URL.'')}}"><img src="{{ asset('assets/images/coverYellow.png') }}" style="margin-top: 30px;height: 92px;width: 92px;border-radius: 70px;" alt=""></a>

                                            @endif

                                            

                                            <a href="{{ URL('/influencer/influencer/'.$username_URL.'')}}"><h4 style="text-align: center;margin-top: 30px;padding-bottom: 30px;" >{{ $influencer->name }}</h4></a>

                                        </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </section>



                        <div class="row animate-box" data-animate-effect="fadeInLeft">



                          

                          

                        </div>

                        <br>



                        

                

                

                        <center>

                               

                             </center>

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

                                <p style="font-weight: 300;">{!! __('footer.lead_paragraph_3') !!}</u>.</p>

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
            <p><b><a href="https://live.superfanss.app/super-ads" target="_blank" style="color:gray !important;">🏢: SUPER ADS CENTER</a> </b><br>© 2021-2025 Nueva Modelo <br>
              {{ __('footer.all_rights_reserved') }} <br>
              {{ __('footer.powered_by') }} <a href="https://live.superfanss.app/world">SUPERFANSS.APP</a></p>
          </center>


        </div>
                  </div>

                
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


?>


@endsection