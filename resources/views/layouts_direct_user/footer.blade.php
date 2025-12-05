<style>
    .modal_input::placeholder {
        color: white;
    }

    .modal_input,
    .modal_input:focus {
        border: 2px solid white;
    }
</style>

<style>
    .modal_input::placeholder {
        color: white;
    }

    .modal_input,
    .modal_input:focus {
        border: 2px solid white;
    }

        #referralModal .modal-dialog,
#referralModal .modal-content,
#referralModal .payment_modal {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
}

#referralModal *,
#referralModal *:focus,
#referralModal *:active {
    outline: none !important;
    box-shadow: none !important;
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
        background: white;
        color: black;
        border: none;
        outline: none;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 15px;
        margin-top: 10px;
        transition: .3s;
    }

    .payment_modal button:hover {
        background: black;
        color: white;
    }
</style>


<!-- SUPER ADS UNDER DEVELOPMENT MODAL -->
<div class="modal fade" id="superAdsDevModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background:#8a2be2; border:none; color:#fff; border-radius:12px;">

            <div class="modal-header" style="border: none; padding: 0;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    style="font-size:32px; color:#fff; opacity:1; margin-left:auto; padding:15px;    position: relative;
    z-index: 9999999;">
                    <span aria-hidden="true">✖</span>
                </button>
            </div>

            <div class="modal-body text-center py-4">
                <h3 style="font-weight:800;">⚠️ SUPER ADS</h3>
                <p style="font-size:16px;">
                    Super Ads is currently under development and will be available soon.
                </p>
            </div>

        </div>
    </div>
</div>
@if(session('super_ads_message'))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $("#superAdsDevModal").modal("show");
    });
</script>
@endif


<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("a").forEach(link => {
        if (link.href.includes("/super-ads")) {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                $("#superAdsDevModal").modal("show");
            });
        }
    });
});
</script>
<!-- Referral Modal -->
<div class="modal fade" id="referralModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background:#8a2be2;  box-shadow:none;">

      <div class="modal-body payment_modal d-block"><br>
        <h2>🙋🏻‍♂️💰</h2>
        <h3 style="color:#fff;">{{ __('content.modal_invite_title') }}</h3  >
        <p style="color:#fff;">{{ __('content.modal_invite_text') }} <strong>{{ session('referral_username_url') }}</strong></p>
        <!--<input type="text" class="form-control" value="{{ session('referral_username_url') }}" readonly>-->
        <button class="btn btn-secondary mt-2" onclick="copyReferralLink()">{{ __('content.modal_invite_button_copy') }}</button>
        <button type="button" class="btn btn-primary mt-3" data-dismiss="modal">{{ __('content.modal_invite_button_close') }}</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    @if(session('show_referral_modal'))
        $('#referralModal').modal('show');
    @endif
});

function copyReferralLink() {
    var copyText = document.querySelector('#referralModal input');
    copyText.select();
    document.execCommand('copy');
    alert('Username copied!');
}
</script>


<!-- Modal Likes list -->
<div class="modal" id="LikesModalCenter" tabindex="-1" role="dialog" aria-labelledby="subcriberlistModalCenterTitle"
    aria-hidden="true" style="z-index: 1288912889;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: red;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="close d-block "  style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
          <span aria-hidden="true" ><i class="fas fa-arrow-left back_control_panel back_modal_event" style="font-size: 27px;"></i></span>
        </button> --}}
                <div style="text-align: center;height: 20px;margin-top: 35px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.likes') }} </h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">


                @php

                     $id = isset($other_user_id) ? $other_user_id : 100;

                    $likes = DB::table('likes')->where('influencer_id', $id)->get();
                    $likes_count = DB::table('likes')->where('influencer_id', $id)->count();
                    $influencer_user_ids = [];
                @endphp

                @if ($likes_count > 0)

                    <div class="container-fluid">
                        <div class="row" style="display: flex">



                            @foreach ($likes as $like)
                                @php
                                    $influencer_id = $like->user_id;
                                    $user = DB::table('users')->where('id', $influencer_id)->first();
                                @endphp

                                @if (!in_array($influencer_id, $influencer_user_ids))
                                    {{-- class="col-xs-3 "   --}}
                                    {{-- max-width: 225px; --}}
                                    <div style="padding-left: 5px;padding-right: 5px;display: inline-block;">
                                        <div
                                            style="background: white;padding: 10px 5px;margin-top: 10px;overflow-x: auto;max-width: 100%;">

                                            @php
                                                $profile_picture = $user?->profile_picture;
                                            @endphp
                                            <p
                                                style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                                <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
                  @else
                  src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                                    style="max-width: 32px;border-radius: 35px;" alt=""> <span
                                                    style="margin-left: 5px;">@</span>{{ $user?->username_URL }}
                                            </p>

                                        </div>
                                    </div>
                                @endif

                                @php
                                    array_push($influencer_user_ids, $influencer_id);
                                @endphp
                            @endforeach
                        </div>
                    </div>
                @else
                    <p style="margin: 0px;text-align: center;color: white;">This user have not likes yet</p>


                @endif




            </div>

        </div>
    </div>
</div>








<!-- Modal Subscribers list -->
<div class="modal" id="followerlistmodal" tabindex="-1" role="dialog" aria-labelledby="subcriberlistModalCenterTitle"
    aria-hidden="true" style="z-index: 1288912889;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: red;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="close d-block "
                    style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                    <span aria-hidden="true"><i
                            class="fas fa-arrow-left back_control_panel back_modal_event history_of_subscribers"
                            style="font-size: 27px;"></i></span>
                </button>
                <div style="text-align: center;height: 20px;margin-top: 35px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.followers') }}</h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">


                @php

                     $id = isset($other_user_id) ? $other_user_id : 100;
                    $direct_user = DB::table('users')->where('id', $id)->first();

                    if ($direct_user->role == 'influencer') {
                        $subscriptions = DB::table('subscriptions')->where('influencer_id', $id)->get();
                        $subscriptions_count = DB::table('subscriptions')->where('influencer_id', $id)->count();
                    } else {
                        $subscriptions = DB::table('followerships')->where('followed_user_id', $id)->get();
                        $subscriptions_count = DB::table('followerships')->where('followed_user_id', $id)->count();
                    }

                @endphp

                @if ($subscriptions_count > 0)
                    @foreach ($subscriptions as $subscription)
                        @php
                            if ($direct_user->role == 'influencer') {
                                $user_id = $subscription->user_id;
                            } else {
                                $user_id = $subscription->follower_user_id;
                            }

                            $user = DB::table('users')->where('id', $user_id)->first();
                        @endphp

                        <div style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                            @php
                                $profile_picture = $user?->profile_picture;
                            @endphp
                            <p
                                style="margin: 0px;display: flex;
              color: #333333;
              font-weight: bold;
              font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
              @else
              src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                    style="max-width: 32px;border-radius: 35px;" alt=""> <span
                                    style="margin-left: 10px;">@</span>{{ $user?->username_URL }}
                            </p>
                            <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">

                                @if ($user->role == 'influencer')
                                    <span href="/user/delete_subscription/{{ $subscription->id }}" class="delete"
                                        warning_message="Confirm delete subscription? - Yes or No"><i
                                            class="far fa-trash-alt"
                                            style="cursor: pointer;color: black;@if (Auth::check()) @if (Auth::user()->id != $other_user_id) visibility: hidden; @endif
@else
visibility: hidden;  @endif"></i></span>
                                @else
                                    <span href="/user/delete_followership/{{ $subscription->id }}" class="delete"
                                        warning_message="Confirm delete subscription? - Yes or No"><i
                                            class="far fa-trash-alt"
                                            style="cursor: pointer;color: black;@if (Auth::check()) @if (Auth::user()->id != $other_user_id) visibility: hidden; @endif
@else
visibility: hidden;  @endif"></i></span>
                                @endif

                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- @if (isset($other_influencer_user)) --}}
                    <p style="margin: 0px;text-align: center;color: white;">This user have no subscribers or followers
                        yet</p>
                    {{-- @else
            <p style="margin: 0px;text-align: center;color: white;">You have no subscribers or followers yet</p>
            @endif --}}


                @endif




            </div>

        </div>
    </div>
</div>




<div class="modal" id="PostLikesModalCenterindividual" tabindex="-1" role="dialog"
    aria-labelledby="subcriberlistModalCenterTitle" aria-hidden="true" style="z-index: 1288912889234;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: red;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{-- <button type="button" class="close d-block "  style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
          <span aria-hidden="true" ><i class="fas fa-arrow-left back_control_panel back_modal_event" style="font-size: 27px;"></i></span>
        </button> --}}
                <div style="text-align: center;height: 20px;margin-top: 35px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.likes') }} </h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">

                @php

                    // $influencer_id = Auth::user()->id;

                     $id = isset($other_user_id) ? $other_user_id : 100;

                    $posts = DB::table('posts')->where('influencer_id', $id)->get();

                    // $posts = DB::table('posts')->get();

                @endphp

                @if (!Auth::check())

                    @foreach ($posts as $post)

                        <div class="post_div post_div_{{ $post->id }}">
                            @php
                                $post_likes_count = DB::table('likes')
                                    ->where('post_id', $post->id)
                                    ->count();

                                $post_likes = DB::table('likes')
                                    ->where('post_id', $post->id)
                                    ->get();
                            @endphp


                            @if ($post_likes_count > 0)
                                @foreach ($post_likes as $post_like)
                                    @php

                                        $user_id = $post_like->user_id;
                                        $user = DB::table('users')->where('id', $user_id)->first();
                                        $profile_picture = $user?->profile_picture;
                                    @endphp

                                    <div
                                        style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                        <p
                                            style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                            <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
                      @else
                      src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                                style="max-width: 32px;border-radius: 35px;" alt=""> <span
                                                style="margin-left: 5px;">@</span>{{ $user?->username_URL }}
                                        </p>

                                    </div>
                                @endforeach
                            @else
                                <p style="margin: 0px;text-align: center;color: white;">Post don't have likes yet</p>
                            @endif


                        </div>

                    @endforeach

                @endif


                @if (Auth::check())


                    @php

                        $followerships = DB::table('followerships')
                            ->where('follower_user_id', Auth::user()->id)
                            ->get();

                        $subscriptions = DB::table('subscriptions')
                            ->where('user_id', Auth::user()->id)
                            ->get();

                    @endphp

                    @if (isset($followerships) && isset($subscriptions))

                        @foreach ($followerships as $followership)
                            @php
                                $posts = DB::table('posts')
                                    ->where('influencer_id', $followership->followed_user_id)
                                    ->orderBy('id', 'Desc')
                                    ->get();
                            @endphp


                            @foreach ($posts as $post)
                                <div class="post_div post_div_{{ $post->id }}">
                                    @php
                                        $post_likes_count = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->count();

                                        $post_likes = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->get();
                                    @endphp


                                    @if ($post_likes_count > 0)
                                        @foreach ($post_likes as $post_like)
                                            @php

                                                $user_id = $post_like->user_id;
                                                $user = DB::table('users')->where('id', $user_id)->first();
                                                $profile_picture = $user?->profile_picture;
                                            @endphp

                                            <div
                                                style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                                <p
                                                    style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                                    <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
                            @else
                            src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                                        style="max-width: 32px;border-radius: 35px;" alt="">
                                                    <span style="margin-left: 5px;">@</span>{{ $user?->username_URL }}
                                                    <span style="margin-left: 5px;">@</span>{{ $user?->username_URL }}
                                                </p>

                                            </div>
                                        @endforeach
                                    @else
                                        <p style="margin: 0px;text-align: center;color: white;">Post don't have likes
                                            yet</p>
                                    @endif


                                </div>
                            @endforeach
                        @endforeach







                        @foreach ($subscriptions as $subscription)
                            @php
                                $posts = DB::table('posts')
                                    ->where('influencer_id', $subscription->influencer_id)
                                    ->orderBy('id', 'Desc')
                                    ->get();
                            @endphp

                            @foreach ($posts as $post)
                                <div class="post_div post_div_{{ $post->id }}">
                                    @php
                                        $post_likes_count = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->count();

                                        $post_likes = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->get();
                                    @endphp


                                    @if ($post_likes_count > 0)
                                        @foreach ($post_likes as $post_like)
                                            @php

                                                $user_id = $post_like->user_id;
                                                $user = DB::table('users')->where('id', $user_id)->first();
                                                $profile_picture = $user?->profile_picture;
                                            @endphp

                                            <div
                                                style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                                <p
                                                    style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                                    <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
                          @else
                          src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                                        style="max-width: 32px;border-radius: 35px;" alt="">
                                                    <span style="margin-left: 5px;">@</span>{{ $user?->username_URL }}
                                                </p>
                                                {{-- <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                            <a href="/user/delete_subscription/{{$subscription->id}}"  onclick ="return confirm('Confirm delete subscription? - Yes or No')"><i class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></a>
                          </div> --}}
                                            </div>
                                        @endforeach
                                    @else
                                        <p style="margin: 0px;text-align: center;color: white;">Post don't have likes
                                            yet</p>
                                    @endif


                                </div>
                            @endforeach
                        @endforeach



                    @endif

                @endif





            </div>

        </div>
    </div>
</div>





<!-- Modal register -->
<div class="modal" id="register_Modal" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
    style="z-index: 123112311231;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: #8a2be2;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="text-align: center;height: 20px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">Regístrate</h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">
                <br>



                <div style="color: white">
                    <div class="justify-content-center align-items-center ">
                        <div style="max-width: 100%">
                            <div class="card p-4 " style="border-radius: 30px;border: 0;padding-top: 0px;">
                                <div class="card-body " style="padding-top: 0px;">
                                    {{-- <form method="POST" action="{{ route('login') }}">
                              @csrf
                              <h2 style="text-align: center;color: white;">Log in:</h2>
                              <h3 class="mb-3 " style="text-align: center;margin-bottom: 0.5rem !important;color: white;">Inicia sesión</h3>
                              <p  style="text-align: center;color: white;">Fill the form to login.</p>
                              <div class="form-group">
                                  <input id="email" type="email" placeholder="Enter your email" class="form-control modal_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                      @error('email')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                              </div>
                              <div class="form-group">
                                  <input id="password" type="password" placeholder="Enter your password" class="form-control modal_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                      @error('password')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                              </div>
                              <button type="submit" id="sendlogin" class="new_button3 btn btn-outline-primary" style="margin-left: auto;display: block;border-radius: 10 px;font-size: 20px;color: #000 !important;">Login</button>
                          </form> --}}


                                    <h1 class="mb-3"
                                        style="text-align: center;margin-bottom: 0.5rem !important;color: white;">
                                        Primero, crea tu cuenta</h1>
                                    <p style="text-align: center;">Es muy rápido. Elige un tipo de cuenta.</p>



                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span type="button" id="open_influencer_modal"
                                                    class="new_button_hover1 btn "
                                                    style="margin-left: auto;display: block;border-radius: 10 px;font-size: 20px;margin-left: auto;margin-right: auto;">Creador</span>
                                            </div>
                                            <div class="col-md-6">
                                                <span type="button" id="open_fan_modal"
                                                    class="new_button_hover2 btn "
                                                    style="margin-left: auto;display: block;border-radius: 10 px;font-size: 20px;padding-left: 30px;padding-right: 30px;margin-left: auto;margin-right: auto;">Fan</span>
                                            </div>
                                        </div>
                                    </div>






                                    <div class="text-center mt-4">
                                        <br>
                                        <p>Already Registered?
                                            <span id="open_login_modal" class="button_hover_underlined"
                                                style="text-align: center; font-weight: bold;">
                                                <span style="cursor: pointer;">Login</span>
                                            </span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>



<!-- Modal influencer -->
<div class="modal " id="register_influencer_Modal" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" style="z-index: 123112311231;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: #8a2be2;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="close d-block "
                    style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                    <span aria-hidden="true"><i class="fas fa-arrow-left back_register_modal"
                            style="font-size: 27px;"></i></span>
                </button>
                <div style="text-align: center;height: 20px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">Regístrate</h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">
                <br>



                <div style="color: white">
                    <div class="justify-content-center align-items-center ">
                        <div style="max-width: 100%">
                            <div class="card p-4 " style="border-radius: 30px;border: 0;padding-top: 0px;">
                                <div class="card-body " style="padding-top: 0px;">
@php
    use Illuminate\Support\Facades\Session;

    $other_user_username = $other_user_username ?? Session::get('other_user_username', 'default_username'); // you can set a default username if needed
@endphp
                                    <form method="POST" id="form_register2" action="{{ route('register') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="other_user_username"
                                            value="{{ $other_user_username }}">
                                        <input type="hidden" name="role" value="influencer">

                                        <h1 class="mb-3"
                                            style="text-align: center;color: white;margin-bottom: 0.5rem !important;">
                                            Como Influencer</h1>
                                        <p style="color: white;text-align: center;">Rellena los campos para el alta.
                                        </p>



                                        <div class="form-group">
                                            <input id="name2" style="" type="text"
                                                placeholder="Introduce tu nombre"
                                                class="form-control register_modal_input @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('Name') }}" required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="surname2" style="" type="text" placeholder="Introduce tus apellidos" class="form-control register_modal_input" name="surname" value="{{ old('Name') }}" required > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}

                                        <div class="form-group">
                                            <input id="email2" style="" type="email"
                                                placeholder="Introduce tu email"
                                                class="form-control register_modal_input @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                            <div class="">
                                                <input id="password2" style="" type="password"
                                                    placeholder="Introduce una contraseña"
                                                    class="form-control register_modal_input @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                                            <div class="">
                                                <input id="password-confirm2" style="" type="password"
                                                    placeholder="Confirma la contraseña"
                                                    class="form-control register_modal_input"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Social Networks</label>
                                            <select class="js-example-basic-multiple2 custom-select"
                                                id="social_networks2" style="border: 1px solid #000000;width: 100%;"
                                                placeholder="abc" name="networks[]" multiple="multiple">
                                                @php
                                                    $socialnetworks = DB::table('socialnetworks')->get();
                                                @endphp
                                                @foreach ($socialnetworks as $socialnetwork)
                                                    <option value="{{ $socialnetwork->id }}">
                                                        {{ $socialnetwork->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>


                                        <div class="form-group my-4">

                                            @foreach ($socialnetworks as $socialnetwork)
                                                <input type="text" name="{{ $socialnetwork->id }}"
                                                    id="{{ $socialnetwork->name }}2"
                                                    style="display: none; margin-top: 10px;"
                                                    class="form-control register_modal_input social_links2"
                                                    placeholder="Enter your {{ $socialnetwork->name }} Link"
                                                    value="{{ $socialnetwork->default_address }}" />
                                            @endforeach

                                        </div>

                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="nationality2" style="" type="text" placeholder="Introduce tu nacionalidad" class="form-control register_modal_input" name="nationality"  required > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}

                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="bank_account2" style="" type="text" placeholder="Cuenta bancaria (Octional)" class="form-control register_modal_input" name="bank_account"   > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}
                                        {{--  --}}
                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="paypal_account2" style="" type="text" placeholder="Cuenta Paypal (Opcional)" class="form-control register_modal_input" name="paypal_account"   > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}



                                        <div class="form-group">
                                            <input id="price_of_subscription2" style="" type="number"
                                                step="0.01" min="0.50"
                                                placeholder="Introduce tu precio de membresía"
                                                class="form-control register_modal_input" name="price_of_subscription"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" style=""
                                                    class="custom-file-input register_modal_input profile_picture"
                                                    name="profile_picture" id="profile_picture">
                                                <label class="custom-file-label" for="validatedCustomFile">Profile
                                                    picture...</label>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" style=""
                                                    class="custom-file-input register_modal_input cover_picture"
                                                    name="cover_picture" id="validatedCustomFile">
                                                <label class="custom-file-label" for="validatedCustomFile">Cover
                                                    picture...</label>

                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <input id="Choose_username_or_URL2" style="" type="text"
                                                placeholder="Choose your username or URL"
                                                class="form-control register_modal_input"
                                                name="Choose_username_or_URL" required>
                                        </div>

                                        <div
                                            class='col-12 col-md-12 form-group expiration required'
                                            style="padding: 0px;">

                                            <input class="form-check-input" type="checkbox" id="termsCheckbox" name="termsCheckbox"
                                                   required>

                                            <label class="form-check-label" for="termsCheckbox" style="color: white">
                                                I agree to the <a  style="color: purple" href="https://superfans.world/terminosdeuso" target="_blank">Terms and
                                                    Conditions</a>
                                            </label>
@error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @error('termsCheckbox')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>

                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="your_instagram_link2" style="" type="text" placeholder="Enter your instagram link" class="form-control register_modal_input" name="instagram_link" value="www.instagram.com/"   required> --}}
                                        {{--                          </div> --}}

                                        <button type="button" id="sendlogin2" class="btn new_button_hover2"
                                            style="margin-left: auto;display: block;border-radius: 10 px;font-size: 20px; font-weight: bold; border: 0px solid #000 !important;padding: 7px 11px !important">Aceptar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal fan -->
<div class="modal " id="register_fan_Modal" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" style="z-index: 123112311231;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: #8a2be2;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="close d-block "
                    style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                    <span aria-hidden="true"><i class="fas fa-arrow-left back_register_modal"
                            style="font-size: 27px;"></i></span>
                </button>
                <div style="text-align: center;height: 20px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">Regístrate</h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">
                <br>



                <div style="color: white">
                    <div class="justify-content-center align-items-center ">
                        <div style="max-width: 100%">
                            <div class="card p-4 " style="border-radius: 30px;border: 0;padding-top: 0px;">
                                <div class="card-body " style="padding-top: 0px;">

                                    <form method="POST" id="form_register" action="{{ route('register') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="other_user_username"
                                            value="{{ $other_user_username }}">
                                        <input type="hidden" name="role" value="user">

                                        <h1 class="mb-3"
                                            style="text-align: center;color: white;margin-bottom: 0.5rem !important;">
                                            Como Espectador</h1>
                                        <p style="color: white;text-align: center;">Rellena los campos.</p>





                                        <div class="form-group">
                                            <input id="name" style="" type="text"
                                                placeholder="Introduce tu nombre"
                                                class="form-control register_modal_input @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('Name') }}" required>

                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="surname" style="" type="text" placeholder="Introduce tus apellidos" class="form-control register_modal_input" name="surname" value="{{ old('Name') }}" required > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}

                                        <div class="form-group">
                                            <input id="email" style="" type="email"
                                                placeholder="Introduce tu email"
                                                class="form-control register_modal_input @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                                            <div class="">
                                                <input id="password" style="" type="password"
                                                    placeholder="Introduce una contraseña"
                                                    class="form-control register_modal_input @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

                                            <div class="">
                                                <input id="password-confirm" style="" type="password"
                                                    placeholder="Confirma la contraseña"
                                                    class="form-control register_modal_input"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                         <!-- <div style="position: relative;display: block;">
                                            <div class="form-group">
                                                <label for="">Social Networks (Si no tienes, elige una o déjala
                                                    vacía)</label>
                                                <select class="js-example-basic-multiple custom-select"
                                                    id="social_networks"
                                                    style="border: 1px solid #000000;width: 100%;position:relative;display: block;"
                                                    placeholder="abc" name="networks[]" multiple="multiple">
                                                    @php
                                                        $socialnetworks = DB::table('socialnetworks')->get();
                                                    @endphp
                                                    @foreach ($socialnetworks as $socialnetwork)
                                                        <option value="{{ $socialnetwork->id }}">
                                                            {{ $socialnetwork->name }}</option>
                                                    @endforeach


                                                </select>
                                            </div>
                                        </div> -->


                                        <div class="form-group my-4">

                                            @foreach ($socialnetworks as $socialnetwork)
                                                <input type="text" name="{{ $socialnetwork->id }}"
                                                    id="{{ $socialnetwork->name }}"
                                                    style="display: none; margin-top: 10px;"
                                                    class="form-control register_modal_input social_links"
                                                    placeholder="Enter your {{ $socialnetwork->name }} Link"
                                                    value="{{ $socialnetwork->default_address }}" />
                                            @endforeach

                                        </div>

                                        <!--
                          <div class="form-group">
                              <div class="custom-file">
                                  <input type="file" style="" class="custom-file-input register_modal_input profile_picture" name="profile_picture" id="profile_picture" >
                                  <label class="custom-file-label" for="validatedCustomFile">Profile picture...</label>

                                </div>
                          </div>

                          <div class="form-group">
                              <div class="custom-file">
                                  <input type="file" style="" class="custom-file-input register_modal_input cover_picture" name="cover_picture" id="validatedCustomFile" >
                                  <label class="custom-file-label" for="validatedCustomFile">Cover picture...</label>

                                </div>
                          </div>-->


                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="nationality" style="" type="text" placeholder="Introduce tu nacionalidad" class="form-control register_modal_input" name="nationality" > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}
                                        {{--                          --}}
                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="bank_account" style="" type="text" placeholder="Cuenta bancaria (Opcional)" class="form-control register_modal_input" name="bank_account"   > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}
                                        {{--  --}}
                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="paypal_account" style="" type="text" placeholder="Cuenta Paypal (Opcional)" class="form-control register_modal_input" name="paypal_account"   > --}}
                                        {{--  --}}
                                        {{--                          </div> --}}

                                        <div class="form-group">
                                            <input id="Choose_username_or_URL" style="" type="text"
                                                placeholder="Elige un nombre de usuario"
                                                class="form-control register_modal_input"
                                                name="Choose_username_or_URL" required>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="termsCheckbox1" name="termsCheckbox"
                                                   required>
                                            <label class="form-check-label" for="termsCheckbox1" style="color: white">
                                                I agree to the <a style="color: purple" href="https://superfans.world/terminosdeuso" target="_blank">Terms and
                                                    Conditions</a>
                                            </label>

                                            @error('termsCheckbox1')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        {{--                          <div class="form-group"> --}}
                                        {{--                              <input id="your_instagram_link" style="" type="text" placeholder="Enter your instagram link" class="form-control register_modal_input" name="instagram_link" value="www.instagram.com/"   required> --}}
                                        {{--                          </div> --}}



                                        <button type="button" id="sendlogin" class="btn new_button_hover2"
                                            style="margin-left: auto;display: block;border-radius: 10 px;font-size: 20px;font-weight: bold; border: 0px solid #000 !important; padding: 7px 11px !important;">Aceptar</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal login -->
<div class="modal " id="login_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" style="z-index: 123112311231;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: #8a2be2;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="text-align: center;height: 20px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">Login</h5>
                </div>
            </div>
            <div class="modal-body" style="border: 0px">
                <br>



                <div style="color: white">
                    <div class="justify-content-center align-items-center ">
                        <div style="max-width: 100%">
                            <div class="card p-4 " style="border-radius: 30px;border: 0;padding-top: 0px;">
                                <div class="card-body " style="padding-top: 0px;">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        {{-- @php

                                  Session::put('other_user_username', $other_user_username);
                                  echo "other_user_username: ".Session::get('other_user_username');
                              @endphp --}}
                              
                                        <input type="hidden" name="other_user_username"
                                            value="{{ $other_user_username }}">
                                        {{-- <h2 style="text-align: center;color: white;">Log in:</h2> --}}
                                        <h3 class="mb-3 "
                                            style="text-align: center;margin-bottom: 0.5rem !important;color: white;">
                                            Inicia sesión</h3>
                                        <p style="text-align: center;color: white;">Fill the form to login.</p>
                                        <div class="form-group">
                                            <input id="email" type="email" placeholder="Enter your email"
                                                class="form-control modal_input register_modal_input @error('email') is-invalid @enderror"
                                                style="border: 0px solid #000 !important;" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input id="password" type="password" placeholder="Enter your password"
                                                class="form-control modal_input register_modal_input @error('password') is-invalid @enderror"
                                                style="border: 0px solid #000 !important;" name="password" required
                                                autocomplete="current-password">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="termsCheckbox" name="termsCheckbox"
                                                   required>
                                            <label class="form-check-label" for="termsCheckbox">
                                                I agree to the <a href="https://superfans.world/terminosdeuso" target="_blank" style="color: purple">Terms and
                                                    Conditions</a>
                                            </label>

                                            @error('termsCheckbox')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                        <button type="submit" id="sendlogin"
                                            class="btn btn-outline-primary new_button3"
                                            style="margin-left: auto;display: block;border-radius: 10 px;font-size: 20px;color: #000;">Login</button>
                                    </form>
                                    <div class="text-center mt-4">
                                        <br>
                                        <p>Don't have an account?
                                            <span id="open_register_modal" class="button_hover_underlined"
                                                style="text-align: center; font-weight: bold;">
                                                <span style="cursor: pointer">Create One</span>
                                            </span>
                                        </p>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Modal Subscribers list -->
<div class="modal" id="subcriberlistmodal" tabindex="-1" role="dialog"
    aria-labelledby="subcriberlistModalCenterTitle" aria-hidden="true" style="z-index: 1288912889;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: red;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="close d-block "
                    style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                    <span aria-hidden="true"><i
                            class="fas fa-arrow-left back_control_panel back_modal_event history_of_subscribers"
                            style="font-size: 27px;"></i></span>
                </button>
                <div style="text-align: center;height: 20px;margin-top: 35px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.followers') }}</h5>
                </div>
            </div>
            @if (Auth::check())
                <div class="modal-body" style="border: 0px">


                    @php

                        if (isset($other_influencer_user)) {
                            $id = $influencer_user_id;
                        } else {
                            $id = Auth::user()->id;
                        }

                        $subscriptions = DB::table('subscriptions')->where('influencer_id', $id)->get();
                        $subscriptions_count = DB::table('subscriptions')->where('influencer_id', $id)->count();

                    @endphp

                    @if ($subscriptions_count > 0)
                        @foreach ($subscriptions as $subscription)
                            @php
                                $user_id = $subscription->user_id;
                                $user = DB::table('users')->where('id', $user_id)->first();
                            @endphp

                            <div style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                @php
                                    $profile_picture = $user?->profile_picture;
                                @endphp
                                <p
                                    style="margin: 0px;display: flex;
              color: #333333;
              font-weight: bold;
              font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                    <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
              @else
              src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                        style="max-width: 32px;border-radius: 35px;" alt="">
                                    {{ $user?->username_URL }}
                                </p>
                                <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                    <span href="/user/delete_subscription/{{ $subscription->id }}" class="delete"
                                        warning_message="Confirm delete subscription? - Yes or No"><i
                                            class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        {{-- @if (isset($other_influencer_user)) --}}
                        <p style="margin: 0px;text-align: center;color: white;">This user have no subscribers or
                            followers yet</p>
                        {{-- @else
            <p style="margin: 0px;text-align: center;color: white;">You have no subscribers or followers yet</p>
            @endif --}}


                    @endif




                </div>
            @endif

        </div>
    </div>
</div>



<!-- Modal influencer settings -->
<div class="modal" id="streamingModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123112311231;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: blueviolet;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                    style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="text-align: center;height: 20px;margin-top: 35px;">
                    <img src="{{ asset('assets/images/superman2.png') }}" style="display: inline-block;height: 51px;"
                        alt="">
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">Message </h5>
                </div>
            </div>
            <!--<div class="modal-body" style="border: 0px">-->
            <!--    <br>-->



            <!--    <h4 style="color: white;">La sección de Streaming está en fase de desarrollo y actualizandose.-->
            <!--        Pronto estará disponible.-->
            <!--    </h4>-->

            <!--    <h4 style="color: white;">The Streaming section is under development and being updated.-->
            <!--        It will be available soon-->
            <!--    </h4>-->

            <!--</div>-->
<div class="modal-body" style="border: 0px">
    <!--<form id="streamForm">-->
    <!--    <div class="form-group" style="display: flex;">-->
    <!--        <label style="color: white; width: 50px;">{{ __('content.stream_bio') }}:</label>-->
    <!--        <textarea class="form-control" name="bio" rows="3" required-->
    <!--            placeholder="{{ __('content.stream_bio_placeholder') }}"-->
    <!--            style="background-color: white; color: black;"></textarea>-->
    <!--    </div>-->

    <!--    <div class="form-group mt-3" style="display: flex; margin-top: 20px;">-->
    <!--        <label style="color: white; width: 50px;">{{ __('content.stream_tags') }}:</label>-->
    <!--        <input type="text" class="form-control" name="tags" required-->
    <!--            placeholder="{{ __('content.stream_tags_placeholder') }}"-->
    <!--            style="background-color: white; color: black;">-->
    <!--    </div>-->

    <!--    <div style="display: flex; justify-content: center; margin-top: 20px;">-->
    <!--        <button type="submit" class="btn btn-light" style="padding: 10px 20px;">-->
    <!--            🔴 {{ __('content.stream_start_button') }} 123-->
    <!--        </button> -->
    <!--    </div>-->
    <!--</form>-->
    <h3 style="color:white;text-align:center;margin-top:15px">
        THIS USER IS  NOT ON 🔴 AIR. 
    </h3>
</div>

        </div>
    </div>
</div>


@if (Auth::check())


    <style>
        label {
            margin-right: 10px;
        }

        .custom-file {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>



    <section>


        @php
            $user = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();

            $Influencer_networks = $user->Influencer_networks;

            if ($Influencer_networks != null) {
                $Influencer_network_ids = explode(',', $Influencer_networks);

                $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;
                $Influencer_networks_profile_links = explode(',', $Influencer_networks_profile_links);
            }

        @endphp

        @if ($Influencer_networks != null)
            <div>




                <div class="modal fade networkurlModal" id="networkurlModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                    style="z-index: 123122123122123122123122;">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 20px;background: red;">
                            <div class="modal-header" style="border: 0px">
                                <button type="button" class="close d-block " data-dismiss="modal"
                                    aria-label="Close" style="font-size: 45px;opacity: 1;color: white;">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <button type="button" class="close d-block "
                                    style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                                    <span aria-hidden="true"><i
                                            class="fas fa-arrow-left back_control_panel back_modal_event update_network"
                                            style="font-size: 27px;"></i></span>
                                </button>
                                <div style="text-align: center;margin-top: 35px;">
                                    <img src="{{ asset('assets/images/superman2.png') }}"
                                        style="display: inline-block;height: 51px;" alt="">
                                    <h5 class="modal-title" id="exampleModalCenterTitle"
                                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                                        Update Network</h5>
                                </div>
                            </div>
                            <div class="modal-body" style="border: 0px">
                                {{-- /influencer --}}
                                <form action="{{ url('/networks_url') }}" method="post"
                                    enctype="multipart/form-data" style="margin-top: 20px;">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">

                                    @php
                                        $first_network = 1;
                                        $index = 0;
                                    @endphp

                                    @foreach ($Influencer_network_ids as $Influencer_network_id)
                                        @php
                                            $socialnetwork = DB::table('socialnetworks')
                                                ->where('id', $Influencer_network_id)
                                                ->first();
                                            $socialnetwork_image = $socialnetwork->image;
                                            $socialnetwork_name = $socialnetwork->name;
                                        @endphp


                                        <div class="container-fluid networkurlsdiv networkurl{{ $socialnetwork_name }}"
                                            style="padding-left: 0px;">
                                            <div class="row pb-3">
                                                <div class="col-md-9">
                                                    <div class="form-group" style="display: flex">



                                                        <label for="email"
                                                            style="color: white">{{ $socialnetwork_name }} </label>
                                                        <input type="text" class="form-control" id="email"
                                                            style="background: white;height: 40px;"
                                                            name="network_urls[]"
                                                            value="{{ $Influencer_networks_profile_links[$index] }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                                    <button type="submit" class="save_btn"
                                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                                                </div>


                                            </div>

                                            {{-- onclick ="return confirm('Confirm delete network? - Yes or No')"  --}}
                                            <span href="/delete_network/{{ $Influencer_network_id }}"
                                                class="delete save_btn" type="network"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;text-decoration: none;padding-top: 6px;padding-bottom: 6px;display: block;width: fit-content;margin-left: auto;margin-right: 5px;margin-top: 10px;">Delete
                                                it</span>
                                        </div>




                                        @php
                                            $first_network = 0;
                                            $index = $index + 1;
                                        @endphp
                                    @endforeach




                                </form>

                            </div>

                        </div>
                    </div>
                </div>



            </div>
        @endif










        <div class="modal" id="PostLikesModalCenterindividual_another_influencer_user" tabindex="-1"
            role="dialog" aria-labelledby="subcriberlistModalCenterTitle" aria-hidden="true"
            style="z-index: 1288912889234;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 20px;background: red;">
                    <div class="modal-header" style="border: 0px">
                        <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{-- <button type="button" class="close d-block "  style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
          <span aria-hidden="true" ><i class="fas fa-arrow-left back_control_panel back_modal_event" style="font-size: 27px;"></i></span>
        </button> --}}
                        <div style="text-align: center;height: 20px;margin-top: 35px;">
                            <img src="{{ asset('assets/images/superman2.png') }}"
                                style="display: inline-block;height: 51px;" alt="">
                            <h5 class="modal-title" id="exampleModalCenterTitle"
                                style="font-size: 30px;text-align: center;color: white;display: inline-block;">Likes
                            </h5>
                        </div>
                    </div>
                    <div class="modal-body" style="border: 0px">

                        @if (isset($other_influencer_user_id))
                            @php

                                //$influencer_id = Auth::user()->id;

                                $posts = DB::table('posts')->where('influencer_id', $other_influencer_user_id)->get();

                                // $posts = DB::table('posts')->get();

                            @endphp

                            @foreach ($posts as $post)

                                <div class="post_div post_div_{{ $post->id }}">
                                    @php
                                        $post_likes_count = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->count();

                                        $post_likes = DB::table('likes')
                                            ->where('post_id', $post->id)
                                            ->get();
                                    @endphp


                                    @if ($post_likes_count > 0)
                                        @foreach ($post_likes as $post_like)
                                            @php

                                                $user_id = $post_like->user_id;
                                                $user = DB::table('users')->where('id', $user_id)->first();
                                                $profile_picture = $user?->profile_picture;
                                            @endphp

                                            <div
                                                style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                                <p
                                                    style="margin: 0px;    color: #333333;
                    font-weight: bold;
                    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
                ">
                                                    @if ($profile_picture != null)
                                                        <img src="{{ asset('assets/images/' . $profile_picture . '') }}"
                                                            style="width: 34px; height: 34px; border-radius: 74px;">
                                                    @else
                                                        <img src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                                                            style="width: 34px; height: 34px; border-radius: 74px;">
                                                    @endif <span>@</span>{{ $user?->username_URL }}
                                                </p>
                                                {{-- <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                      <a href="/user/delete_subscription/{{$subscription->id}}"  onclick ="return confirm('Confirm delete subscription? - Yes or No')"><i class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></a>
                    </div> --}}
                                            </div>
                                        @endforeach
                                    @else
                                        <p style="margin: 0px;text-align: center;color: white;">Post don't have likes
                                            yet</p>
                                    @endif


                                </div>

                            @endforeach




                        @endif


                    </div>

                </div>
            </div>
        </div>



        <!-- Add post Modal-->
        <div class="modal @if (session()->has('post_added')) fade in @else fade @endif  " id="add_post_modal"
            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
            style="z-index: 123122;@if (session()->has('post_added')) display: block; @endif">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 20px;background: red;">
                    <div class="modal-header" style="border: 0px">
                        <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div style="text-align: center;margin-top: 35px;">
                            <img src="{{ asset('assets/images/superman2.png') }}"
                                style="display: inline-block;height: 51px;" alt="">
                            <h5 class="modal-title" id="exampleModalCenterTitle"
                                style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('nav.add_post') }}
                            </h5>
                        </div>
                    </div>
                    <div class="modal-body" style="border: 0px">

                        <form action="{{ url('/influencer/add_post') }}" id="add_post_form" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">
                            <h3
                                style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                                {{ __('content.posts_label') }}</h3>
                            <div class="custom-file" style="display: flex;">
                                <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('nav.add_post') }}</label>
                                <!-- <input type="file" class="custom-file-input" name="post_image_video"
                                       id="post_image_video_input" style="color: white;margin-top: 3px;" required> -->
                                       <input type="file" id="converted_file" name="post_image_video" style="display: none;" required>

<input type="file" class="custom-file-input" id="post_image_video_input"
       accept="image/*,video/*" style="color: white;margin-top: 3px;" required>
                                <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.post') }}</button>

                            </div>
                            <audio id="audio"></audio>
                        </form>

                        <img src="{{ asset('assets/images/loading2.gif') }}" id="loading_bar"
                            style="max-width: 100%;margin-left: auto;margin-right: auto;display: none;width: 50px;">

                        <p style="color: white;font-weight: 600;margin: 0px;margin-top: 20px;">{{ __('content.my_posts') }}k</p>

                        @php
                            $posts = DB::table('posts')
                                ->where('influencer_id', Auth::user()->id)
                                ->orderBy('id', 'desc')
                                ->limit(6)
                                ->get();
                        @endphp

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9">
                                    @foreach ($posts as $post)
                                        @php
                                            $image_video = $post->image_video;
                                            $file_extension = substr($image_video, strpos($image_video, '.') + 1);

                                            $id = $post->id;
                                        @endphp

                                        <div
                                            style="padding-left: 3%;padding-right: 3%;display: inline-block;margin-top: 15px;">

                                              @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp

               @if (in_array(strtolower($file_extension), $video_extensions))
                                                <video
                                                    style="max-width: 100%;max-width: 70px;border: 0px;border-radius: 0px !important;margin-bottom: -6px;">
                                                    <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                        type="video/mp4">

                                                </video>
                                            @else
                                                <img src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    style="max-width: 70px;display: inline-block;"
                                                    alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"
                                                    class="img-responsive">
                                            @endif
                                            {{-- onclick ="return confirm('Are you sure?')" --}}
                                            <span href="{{ URL('/influencer/delete_post/' . $id . '') }}"
                                                class="delete" type="post"><i class="fa fa-trash"
                                                    style="position: absolute;margin-left: -8px;color: white;"></i></span>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <div style="display: inline-block;vertical-align: super;background: white;color: black;padding-left: 10%;padding-right: 10%;cursor: pointer;color: red;padding-top: 5px;padding-bottom: 5px;"
                                        class="launch_sub_modal open_all_post save_btn">
                                        <span style="text-decoration: none;">
                                            <p style="margin: 0px;font-weight: bold;">{{ __('content.all_posts') }}</p>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- All post Modal-->
        <div class="modal  fade  " id="all_post_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123122;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 20px;background: red;">
                    <div class="modal-header" style="border: 0px">
                        <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <button type="button" class="close d-block "
                            style="font-size: 45px;opacity: 1;color: white;float: left;">
                            <span aria-hidden="true"><i class="fas fa-arrow-left back_add_post_modal back_modal_event"
                                    style="font-size: 27px;"></i></span>
                        </button>
                        <div style="text-align: center;margin-top: 35px;">
                            <img src="{{ asset('assets/images/superman2.png') }}"
                                style="display: inline-block;height: 51px;" alt="">
                            <h5 class="modal-title" id="exampleModalCenterTitle"
                                style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.all_posts') }}</h5>
                        </div>
                    </div>
                    <div class="modal-body" style="border: 0px">



                        <p style="color: white;font-weight: 600;margin: 0px;margin-top: 20px;">{{ __('content.my_posts') }}k2</p>

                        @php
                            $posts = DB::table('posts')
                                ->where('influencer_id', Auth::user()->id)
                                ->orderBy('id', 'desc')
                                ->get();
                        @endphp

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach ($posts as $post)
                                        @php
                                            $image_video = $post->image_video;
                                            $file_extension = substr($image_video, strpos($image_video, '.') + 1);

                                            $id = $post->id;
                                        @endphp

                                        <div
                                            style="padding-left: 3%;padding-right: 3%;display: inline-block;margin-top: 15px;">
                                                                              @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp

               @if (in_array(strtolower($file_extension), $video_extensions))
                                                <video
                                                    style="max-width: 100%;max-width: 70px;border: 0px;border-radius: 0px !important;margin-bottom: -6px;">
                                                    <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                        type="video/mp4">

                                                </video>
                                            @else
                                                <img src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    style="max-width: 70px;display: inline-block;"
                                                    alt="Nueva Modelo Superfans - ¡Bienvenid@ a mi Portfolio!"
                                                    class="img-responsive">
                                            @endif
                                            <span href="{{ URL('/influencer/delete_all_post/' . $id . '') }}"
                                                class="delete" type="post"><i class="fa fa-trash"
                                                    style="position: absolute;margin-left: -8px;color: white;"></i></span>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    {{-- <div style="display: inline-block;vertical-align: super;background: white;color: black;padding-left: 10%;padding-right: 10%;">
                        <a href="" style="text-decoration: none;"><p style="margin: 0px;font-weight: bold;" >{{ __('content.all_posts') }}</p></a>
                      </div> --}}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        
    
        <!--user modal-->
     @if (Auth::user()->role != "influencer")
         <!--User Modal Post-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123122;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 20px;background: red;">
                    <div class="modal-header" style="border: 0px">
                        <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                                style="font-size: 45px;opacity: 1;color: white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div style="text-align: center;margin-top: 35px;">
                            <img src="{{ asset('assets/images/superman2.png') }}"
                                 style="display: inline-block;height: 51px;" alt="">
                            <h5 class="modal-title" id="exampleModalCenterTitle"
                                style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('nav.control_panel') }}:</h5>
                        </div>
                    </div>
                    <div class="modal-body" style="border: 0px">


                        {{-- <form action="{{ url('/user/add_post') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">
                          <h3  style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">{{ __('content.posts_label') }}</h3>
                          <div class="custom-file" style="display: flex;">
                            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('nav.add_post') }}</label>
                            <input type="file" class="custom-file-input" name="post_image_video" id="validatedCustomFile" style="color: white;margin-top: 3px;" required>
                            <button type="submit" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.post') }}</button>

                          </div>
                        </form> --}}
                       
                        <form action="{{ route('user.update_bio') }}" method="post" style="margin-top: 20px;" onsubmit="return validateBioLength();">
    @csrf
    <input type="hidden" name="influencer_id" value="{{ $user->id }}">
        <label for="bio" style="color: white">{{ __('content.bio') }}</label>
    <div class="container-fluid" style="padding-left: 0px;">
        <div class="row pb-3">
            <div class="col-md-9">
                <div class="form-group" style="display: flex; flex-direction: column;">
            
                    <textarea class="form-control" id="bio" name="bio" rows="3"
                              placeholder="{{ __('content.bio_placeholder') }}"
                              style="background: white;" required
                              maxlength="290">{{ Auth::user()->bio }}</textarea>
                    <small id="charCount" style="color: white; margin-top: 5px;">0 / 290</small>
                </div>
            </div>
            
            <div class="col-md-3" style="padding-right: 22px;">
                <button type="submit" class="save_btn"
                        style="background: white; color: red; padding: 3px 15px; font-weight: bold; border: 0px;">
                    {{ __('content.save_button_cpanel') }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    const bioTextarea = document.getElementById('bio');
    const charCount = document.getElementById('charCount');

    function updateCharCount() {
        const length = bioTextarea.value.length;
        charCount.textContent = `${length} / 290`;

        if (length > 290) {
            charCount.style.color = 'red';
        } else {
            charCount.style.color = 'white';
        }
    }

    bioTextarea.addEventListener('input', updateCharCount);

    function validateBioLength() {
        if (bioTextarea.value.length > 290) {
            alert("Bio must not exceed 290 characters.");
            return false;
        }
        return true;
    }

    updateCharCount();
</script>

<br />


                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.profile_info') }}</h3>

                        <form action="{{ url('/user/update_profile_image') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                              <div class="custom-file" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                            <label for="validatedCustomFile" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.profile_picture') }}</label>
                            <input type="file" class="custom-file-input profile_picture" name="profile_image"
                                   id="profile_picture" style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px; overflow: hidden; text-overflow: ellipsis;" accept="image/*" required>
                            <button type="submit" class="save_btn"
                                    style="padding: 8px 20px; background-color: white; color: red; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s ease; align-self: flex-start;">{{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                        </form>

                        <form action="{{ url('/user/update_cover_image') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                              <div class="custom-file" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                            <label for="validatedCustomFile" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.cover_picture') }}</label>
                            <input type="file" class="custom-file-input cover_picture" name="cover_image"
                                   id="validatedCustomFile"
                                   style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px;"
                                   accept="image/*"
                                   required>
                            <button type="submit" class="save_btn"
                                    style="padding: 8px 20px; background-color: white; color: red; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s ease; align-self: flex-start;">
                                {{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                        </form>

                        <form action="{{ url('/user/update_username_url') }}" method="post"
                              enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">


                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.username_url') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="username_url"
                                                   value="{{Auth::user()->username_URL}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/influencer/update_profile_picture_border_status') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('content.profile_picture_border') }}</label>
                                        <div class="form-check" style="display: inline-block">
                                            <input class="form-check-input" type="radio"
                                                   name="profile_picture_border_status" value="1" id="flexRadioDefault1"
                                                   @if(Auth::user()->profile_picture_border_status == "1") checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault"
                                                   style="color: white;">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check" style="display: inline-block">
                                            <input class="form-check-input" type="radio"
                                                   name="profile_picture_border_status" value="0" id="flexRadioDefault2"
                                                   @if(Auth::user()->profile_picture_border_status == "0") checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked"
                                                   style="color: white;">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/user/footer_name_username') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <div class="custom-file" style="display: flex;">
                                <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">Footer
                                    Credits</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="footer_name_username"
                                        style="color: white;border: 1px solid white;margin-right: 50px;">

                                    <option style="color: black;" value="name"
                                            @if(Auth::user()->footer_name_username == "name") selected @endif>Name
                                    </option>
                                    <option style="color: black;" value="username"
                                            @if(Auth::user()->footer_name_username == "username") selected @endif>
                                        Username
                                    </option>

                                </select>
                                <button type="submit" class="save_btn"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">
                                    {{ __('content.save_button_cpanel') }}
                                </button>

                            </div>
                        </form>


                        <hr style="border-top: 6px solid #eeeeee;">
                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            NETWORKS:</h3>


                        {{-- <form action="{{ url('/user/footer_name_username') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                          <div class="custom-file" style="display: flex;">
                            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('content.footer_credits') }}</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="footer_name_username" style="color: white;border: 1px solid white;margin-right: 50px;">

                                <option style="color: black;" value="name" @if(Auth::user()->footer_name_username == "name") selected @endif>Name</option>
                                <option style="color: black;" value="username"  @if(Auth::user()->footer_name_username == "username") selected @endif>Username</option>

                            </select>
                            <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">{{ __('content.save_button_cpanel') }}</button>

                          </div>
                        </form> --}}


                        <form action="{{ url('/influencer/update_first_network') }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">
                            <div class="custom-file" style="display: flex;">
                                <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">First
                                    Network</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="first_network"
                                        style="color: white;border: 1px solid white;margin-right: 50px;">
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

                                        @foreach($Influencer_network_ids as $Influencer_network_id)

                                            @php
                                                $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();
                                                $socialnetwork_image = $socialnetwork->image;
                                                $socialnetwork_name = $socialnetwork->name;
                                            @endphp
                                            <option style="color: black;"
                                                    value="{{$socialnetwork->id}}">{{$socialnetwork_name}}</option>

                                        @endforeach

                                    @endif

                                </select>
                                <button type="submit" class="save_btn"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">
                                    {{ __('content.save_button_cpanel') }}
                                </button>

                            </div>
                        </form>


                        @php
                            $user = DB::table('users')->where('id',Auth::user()->id)->first();

                            $Influencer_networks = $user->Influencer_networks;

                            if($Influencer_networks != null) {


                                  $Influencer_network_ids = explode(",", $Influencer_networks);

                                  $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;
                                  $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);
                              }

                        @endphp

                        @php
                            $social_networks_count = 0;
                        @endphp

                        @if ($Influencer_networks != null)
                            <div>


                                @php
                                    $first_network = 1;
                                    $index = 0;
                                @endphp

                                @foreach($Influencer_network_ids as $Influencer_network_id)

                                    @php

                                        $social_networks_count = $social_networks_count + 1;

                                        $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();
                                        $socialnetwork_image = $socialnetwork->image;
                                        $socialnetwork_name = $socialnetwork->name;
                                    @endphp



                                    <button class="networkmodal" network_name="{{$socialnetwork_name}}"
                                            data-toggle="modal" data-target="#networkurl{{$socialnetwork_name}}"
                                            href="{{$Influencer_networks_profile_links[$index]}}"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;margin-top: 10px;margin-bottom: 10px;">{{$socialnetwork_name}}
                                        <i class="fa fa-edit" style="margin-left: 5px;font-size: 17px;"
                                           aria-hidden="true"></i></button>

                                    @php
                                        $first_network = 0;
                                        $index = $index + 1;
                                    @endphp

                                @endforeach


                            </div>
                        @endif


                        <form action="{{ url('/influencer/add_network') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                                {{ __('content.add_network') }}</h3>
                            <div class="custom-file" style="display: flex;">
                                <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">Choose
                                    Network: </label>
                                <select class="form-control" id="network_id" name="network_id"
                                        style="color: white;border: 1px solid white;margin-right: 50px;">

                                    @if ($social_networks_count < 3)

                                        @php
                                            $socialnetworks = DB::table('socialnetworks')->get();

                                            $user_auth = DB::table('users')->where("id",$user->id)->first();
                                            //echo "user_auth".$user_auth;
                                            $Influencer_networks = $user_auth->Influencer_networks;
                                            $Influencer_networks = explode(",",$Influencer_networks);

                                        @endphp

                                        @php
                                            $left_social_networks = 0;
                                        @endphp
                                        @foreach($socialnetworks as $socialnetwork)

                                            @if (!in_array($socialnetwork->id, $Influencer_networks))
                                                <option class="network_option" value="{{$socialnetwork->id}}"
                                                        networkurl="{{$socialnetwork->default_address}}"
                                                        style="color: black;">{{$socialnetwork->name}}</option>
                                                @php
                                                    $left_social_networks = $left_social_networks + 1;
                                                @endphp
                                            @endif

                                        @endforeach

                                    @else

                                        {{-- <option >You have already taken all social networks in standard account</option> --}}
                                        <option>Una cuenta standard esta limitada a 3 redes sociales</option>

                                    @endif


                                </select>
                                <button type="submit" class="save_btn"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;visibility: hidden;">
                                    {{ __('content.save_button_cpanel') }}
                                </button>

                            </div>

                            @if($social_networks_count < 3)

                                <div class="container-fluid " style="padding-left: 0px;">
                                    <div class="row pb-3">
                                        <div class="col-md-9">
                                            <div class="form-group" style="display: flex">


                                                <label for="email" style="color: white">{{ __('content.network_url') }} </label>
                                                <input type="text" class="form-control" id="network_url_input"
                                                       style="background: white;height: 40px;" name="network_url"
                                                       value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                            <button @if($social_networks_count >= 3) type="button" @else type="submit"
                                                    @endif class="save_btn"
                                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                                Add
                                            </button>
                                        </div>


                                    </div>
                                </div>

                            @endif

                        </form>


                         <hr style="border-top: 6px solid #eeeeee;">
                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.payments') }}</h3>
                            
<!--  START EARNINGS VIDEO VIEWS  -->


  <div class="container-fluid " style="padding-left: 0px;">
                        <div class="row pb-3">
                            <div class="col-xs-6">
                                <div class="form-group" style="display: flex">
                <span style="color: #fff; font-weight: 900;">
                    {{ __('content.earnings_video_views') }} $0.00
                </span>
            </div> 
        </div>

        <div class="col-xs-6" style="text-align: end; padding-right: 22px;">
            <button type="button" class=" launch_sub_modal save_btn"
                style="background: white; color: red; padding: 3px 15px; font-weight: bold; border: 0px; outline: 0px;"
                data-toggle="modal" data-target="#">
                {{ __('content.notavailable10k_button') }}
            </button>
        </div>
    </div>
</div>
<!--end VIDEO VIEWS -->

<!--
                        <form action="{{ url('/user/update_bank_account') }}" method="post"
                              enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.bank_account') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="bank_account"
                                                   value="{{Auth::user()->bank_account}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            Save
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/user/update_paypal_account') }}" method="post"
                              enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.paypal') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="paypal_account"
                                                   value="{{Auth::user()->paypal_account}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            Save
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form> -->


                        {{-- Account info section --}}
                        <hr style="border-top: 6px solid #eeeeee;">
                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.account_info') }}</h3>

                        <form action="{{ url('/user/update_email') }}" method="post" enctype="multipart/form-data"
                              style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.email') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="email"
                                                   value="{{Auth::user()->email}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/user/update_password') }}" method="post" enctype="multipart/form-data"
                              style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.password') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="password" value=""
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>


                        <form action="{{ url('/user/update_name') }}" method="post" enctype="multipart/form-data"
                              style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.name') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="name"
                                                   value="{{Auth::user()->name}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/user/update_surname') }}" method="post" enctype="multipart/form-data"
                              style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{Auth::user()->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.surname') }} </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="surname"
                                                   value="{{Auth::user()->surname}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/influencer/update_instagram_link') }}" method="post"
                              enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{$user->id}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">Instagram link: </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="instagram_link"
                                                   value="{{$user->instagram_link}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.save_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <div>
                            <hr style="border-top: 6px solid #eeeeee;">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                                {{ __('content.my_subscriptions') }}</h3>
                            @php
                                $id = Auth::user()->id;
                                $subscriptions = DB::table('subscriptions')->where('user_id',$id)->get();
                                $subscriptions_count = DB::table('subscriptions')->where('user_id',$id)->count();

                            @endphp

                            @if ($subscriptions_count > 0)
                                @foreach ($subscriptions as $subscription)

                                    @php
                                        $influencer_id = $subscription->influencer_id;
                                        $influencer = DB::table('users')->where('id',$influencer_id)->first();
                                    @endphp

                                    <div
                                        style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">
                                        @php
                                            $profile_picture = $influencer->profile_picture;
                                        @endphp
                                        <p style="margin: 0px;    color: #333333;
                  font-weight: bold;
                  font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
              "><img @if ($profile_picture != null)
                                                                          src="{{ asset('assets/images/'.$profile_picture.'') }}"
                     @else
                                                                          src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                     @endif style="max-width: 28px" alt=""> <span>@</span>{{$influencer->username_URL}}</p>
                                        <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                            <span href="/user/delete_subscription/{{$subscription->id}}" class="delete"
                                                  type="subscription"
                                                  warning_message="Confirm delete subscription? - Yes or No"><i
                                                    class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></span>
                                        </div>
                                    </div>

                                @endforeach
                            @else
                                <p style="margin: 0px;text-align: center;color: white;">No Subscriptions</p>
                            @endif


                            <div>
                                <hr style="border-top: 6px solid #eeeeee;">
                                <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                                    {{ __('content.my_followerships') }}</h3>
                                @php
                                    $id = Auth::user()->id;
                                    $followerships = DB::table('followerships')->where('follower_user_id',Auth::user()->id)->get();
                                    $followerships_count = DB::table('followerships')->where('follower_user_id',Auth::user()->id)->count();

                                @endphp

                                @if ($followerships_count > 0)
                                    @foreach ($followerships as $followership)

                                        @php
                                            $userFollowed_id = $followership->followed_user_id;
                                            $userFollowed = DB::table('users')->where('id',$userFollowed_id)->first();
                                        @endphp

                                        <div
                                            style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                            @php
                                                $profile_picture = $userFollowed->profile_picture;
                                            @endphp
                                            <p style="margin: 0px;    color: #333333;
                        font-weight: bold;
                        font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
                    "><img @if ($profile_picture != null)
                                                                                    src="{{ asset('assets/images/'.$profile_picture.'') }}"
                           @else
                                                                                    src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                           @endif style="max-width: 28px" alt=""> <span>@</span>{{$userFollowed->username_URL}}</p>
                                            <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                                <span href="/user/delete_followership/{{$followership->id}}"
                                                      class="delete" type="followership"
                                                      warning_message="Confirm delete followership? - Yes or No"><i
                                                        class="far fa-trash-alt"
                                                        style="cursor: pointer;color: black;"></i></span>
                                            </div>
                                        </div>

                                    @endforeach
                                @else
                                    <p style="margin: 0px;text-align: center;color: white;">No Followerships</p>
                                @endif






                                @php

                                    $user = DB::table('users')->where('id',Auth::user()->id)->first();
                                    $no_of_followers = $user->no_of_followers;
                                @endphp


                                 @if ($no_of_followers > 0)
                                    <hr style="border-top: 6px solid #eeeeee;">
                                     <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                                    {{ __('content.creator_transform') }}</h3>
                                       <p style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                                    {{ __('content.creator_info') }}</p>
                                    <center>
                                    <form action="{{ url('/user/request_creater_account') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <button class="btn save_btn"
                                                style="background: transparent;color: white;border: 2px solid white;" @if($no_of_followers < 10000) disabled @endif>
                                           {{ __('content.request_creator') }}
                                        </button>
                                        <br>
                                    </form>
                                    </center>
                                @endif




                                {{-- Mail Section --}}
                                <hr style="border-top: 6px solid #eeeeee;">
                                <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                                    {{ __('content.instagram_growth') }}</h3>

                                <center><a href="mailto:marketing@superfanss.app?subject=Hire%20a%20Manager&body=Hi,%20I'm%20{{ $user->username_URL }}%20and%20I%20want%20to%20hire%20a%20Manager%20of%20Social%20Networks%20that%20help%20me%20to%20fix%20my%20Influencer%20Career%20and%20help%20me%20to%20be%20famous." 
    class="btn save_btn"
                                           style="background: transparent;color: white;border: 2px solid white;">{{ __('content.contratar') }}</a>
                                </center>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
     @else
      <!-- Another Modal influencer settings for User pagesl --> 
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 123122;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="border-radius: 20px;background: red;">
                    <div class="modal-header" style="border: 0px">
                        <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div style="text-align: center;margin-top: 35px;">
                            <img src="{{ asset('assets/images/superman2.png') }}"
                                style="display: inline-block;height: 51px;" alt="">
                            <h5 class="modal-title" id="exampleModalCenterTitle"
                                style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('nav.control_panel') }}:</h5>
                        </div>
                    </div>
                    <div class="modal-body" style="border: 0px">
                        {{-- <form action="{{ url('/influencer/add_post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="influencer_id" value="{{$user->id}}">
            <h3  style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">{{ __('content.posts_label') }}</h3>
            <div class="custom-file" style="display: flex;">
              <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('nav.add_post') }}</label>
              <input type="file" class="custom-file-input" name="post_image_video" id="validatedCustomFile" style="color: white;margin-top: 3px;" required>
              <button type="submit" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.post') }}</button>

            </div>
          </form> --}} 

<form action="{{ url('/influencer/update_bio') }}" method="post" style="margin-top: 20px;" onsubmit="return validateBioLength();">
    @csrf
    <input type="hidden" name="influencer_id" value="{{ $user->id }}">
        <label for="bio" style="color: white">{{ __('content.bio') }}</label>
    <div class="container-fluid" style="padding-left: 0px;">
        <div class="row pb-3">
            <div class="col-md-9">
                <div class="form-group" style="display: flex; flex-direction: column;">
            
                    <textarea class="form-control" id="bio" name="bio" rows="3"
                              placeholder="{{ __('content.bio_placeholder') }}"
                              style="background: white;" required
                              maxlength="290">{{ Auth::user()->bio }}</textarea>
                    <small id="charCount" style="color: white; margin-top: 5px;">0 / 290</small>
                </div>
            </div>
            
            <div class="col-md-3" style="padding-right: 22px;">
                <button type="submit" class="save_btn"
                        style="background: white; color: red; padding: 3px 15px; font-weight: bold; border: 0px;">
                    {{ __('content.save_button_cpanel') }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    const bioTextarea = document.getElementById('bio');
    const charCount = document.getElementById('charCount');

    function updateCharCount() {
        const length = bioTextarea.value.length;
        charCount.textContent = `${length} / 290`;

        if (length > 290) {
            charCount.style.color = 'red';
        } else {
            charCount.style.color = 'white';
        }
    }

    bioTextarea.addEventListener('input', updateCharCount);

    function validateBioLength() {
        if (bioTextarea.value.length > 290) {
            alert("Bio must not exceed 290 characters.");
            return false;
        }
        return true;
    }

    updateCharCount();
</script>

<br />




                        <div>
                        </div>

                        @php
                            $user = DB::table('users')
                                ->where('id', Auth::user()->id)
                                ->first();
                        @endphp


                        <h3
                            style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.profile_info') }}</h3>

                        <form action="{{ url('/influencer/update_profile_image') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">
                            <div class="custom-file" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                            <label for="validatedCustomFile" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.profile_picture') }}</label>
                            <input type="file" class="custom-file-input profile_picture" name="profile_image"
                                   id="profile_picture" style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px; overflow: hidden; text-overflow: ellipsis;" accept="image/*" required>
                            <button type="submit" class="save_btn"
                                    style="padding: 8px 20px; background-color: white; color: red; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s ease; align-self: flex-start;">{{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                        </form>

                        <form action="{{ url('/influencer/update_cover_image') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">
                             <div class="custom-file" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                            <label for="validatedCustomFile" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.cover_picture') }}</label>
                            <input type="file" class="custom-file-input cover_picture" name="cover_image"
                                   id="validatedCustomFile"
                                   style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px;"
                                   accept="image/*"
                                   required>
                            <button type="submit" class="save_btn"
                                    style="padding: 8px 20px; background-color: white; color: red; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s ease; align-self: flex-start;">
                                {{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                        </form>

                        <form action="{{ url('/influencer/update_username_url') }}" method="post"
                            enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">



                                            <label for="email" style="color: white">{{ __('content.username_url') }}
                                            </label>
                                            <input type="text" class="form-control" id="email"
                                                style="background: white;height: 40px;" name="username_url"
                                                value="{{ $user?->username_URL }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/influencer/update_price_of_subscription') }}" method="post"
                            enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">



                                            <label for="email" style="color: white;white-space: nowrap;">{{ __('content.price_fee') }} </label>
                                            <input type="number" step="0.01" min="0.50" class="form-control"
                                                id="price_of_subscription" style="background: white;height: 40px;"
                                                name="price_of_subscription"
                                                value="{{ $user->price_of_subscription }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                                    </div>


                                </div>

                            </div>


                        </form>


                        <hr style="border-top: 6px solid #eeeeee;">
                        <h3
                            style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            NETWORKS:</h3>
                        <form action="{{ url('/influencer/update_profile_picture_border_status') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <label for=""
                                            style="margin-right: 10px;color: white;margin-top: 3px;">Profile picture
                                            border</label>
                                        <div class="form-check" style="display: inline-block">
                                            <input class="form-check-input" type="radio"
                                                name="profile_picture_border_status" value="1"
                                                id="flexRadioDefault1"
                                                @if (Auth::user()?->profile_picture_border_status == '1') checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault"
                                                style="color: white;">
                                                Yes
                                            </label>
                                        </div>
                                        <div class="form-check" style="display: inline-block">
                                            <input class="form-check-input" type="radio"
                                                name="profile_picture_border_status" value="0"
                                                id="flexRadioDefault2"
                                                @if (Auth::user()?->profile_picture_border_status == '0') checked @endif>
                                            <label class="form-check-label" for="flexCheckChecked"
                                                style="color: white;">
                                                No
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                                    </div>


                                </div>

                            </div>


                        </form>

                        <form action="{{ url('/influencer/footer_name_username') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="custom-file" style="display: flex;">
                                <label for=""
                                    style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('content.footer_credits') }}</label>
                                <select class="form-control" id="exampleFormControlSelect1"
                                    name="footer_name_username"
                                    style="color: white;border: 1px solid white;margin-right: 50px;">

                                    <option style="color: black;" value="name"
                                        @if (Auth::user()->footer_name_username == 'name') selected @endif>Name</option>
                                    <option style="color: black;" value="username"
                                        @if (Auth::user()->footer_name_username == 'username') selected @endif>Username</option>

                                </select>
                                <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">{{ __('content.save_button_cpanel') }}</button>

                            </div>
                        </form>


                        <form action="{{ url('/influencer/update_first_network') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">
                            <div class="custom-file" style="display: flex;">
                                <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">First
                                    Network</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="first_network"
                                    style="color: white;border: 1px solid white;margin-right: 50px;">
                                    @php
                                        $user = DB::table('users')
                                            ->where('id', Auth::user()->id)
                                            ->first();

                                        $Influencer_networks = $user->Influencer_networks;

                                        if ($Influencer_networks != null) {
                                            $Influencer_network_ids = explode(',', $Influencer_networks);

                                            $Influencer_networks_profile_links =
                                                $user->Influencer_networks_profile_links;
                                            $Influencer_networks_profile_links = explode(
                                                ',',
                                                $Influencer_networks_profile_links,
                                            );
                                        }

                                    @endphp
                                    @if ($Influencer_networks != null)

                                        @foreach ($Influencer_network_ids as $Influencer_network_id)
                                            @php
                                                $socialnetwork = DB::table('socialnetworks')
                                                    ->where('id', $Influencer_network_id)
                                                    ->first();
                                                $socialnetwork_image = $socialnetwork->image;
                                                $socialnetwork_name = $socialnetwork->name;
                                            @endphp
                                            <option style="color: black;" value="{{ $socialnetwork->id }}">
                                                {{ $socialnetwork_name }}</option>
                                        @endforeach

                                    @endif

                                </select>
                                <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">{{ __('content.save_button_cpanel') }}</button>

                            </div>
                        </form>



                        @php
                            $user = DB::table('users')
                                ->where('id', Auth::user()->id)
                                ->first();

                            $Influencer_networks = $user->Influencer_networks;

                            if ($Influencer_networks != null) {
                                $Influencer_network_ids = explode(',', $Influencer_networks);

                                $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;
                                $Influencer_networks_profile_links = explode(',', $Influencer_networks_profile_links);
                            }

                        @endphp

                        @if ($Influencer_networks != null)
                            <div>



                                @php
                                    $first_network = 1;
                                    $index = 0;
                                @endphp

                                @foreach ($Influencer_network_ids as $Influencer_network_id)
                                    @php
                                        $socialnetwork = DB::table('socialnetworks')
                                            ->where('id', $Influencer_network_id)
                                            ->first();
                                        $socialnetwork_image = $socialnetwork->image;
                                        $socialnetwork_name = $socialnetwork->name;
                                    @endphp



                                    <button class="networkmodal" network_name="{{ $socialnetwork_name }}"
                                        data-toggle="modal" data-target="#networkurl{{ $socialnetwork_name }}"
                                        href="{{ $Influencer_networks_profile_links[$index] }}"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;margin-top: 10px;margin-bottom: 10px;">{{ $socialnetwork_name }}
                                        <i class="fa fa-edit" style="margin-left: 5px;font-size: 17px;"
                                            aria-hidden="true"></i></button>

                                    @php
                                        $first_network = 0;
                                        $index = $index + 1;
                                    @endphp
                                @endforeach




                            </div>
                        @endif




                        <form action="{{ url('/influencer/add_network') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <h3
                                style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                                {{ __('content.add_network') }}</h3>
                            <div class="custom-file" style="display: flex;">
                                <label for=""
                                    style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('content.choose_network') }} </label>
                                <select class="form-control" id="network_id" name="network_id"
                                    style="color: white;border: 1px solid white;margin-right: 50px;">
                                    @php
                                        $socialnetworks = DB::table('socialnetworks')->get();

                                        $user_auth = DB::table('users')
                                            ->where('id', $user->id)
                                            ->first();
                                        //echo "user_auth".$user_auth;
                                        $Influencer_networks = $user_auth->Influencer_networks;
                                        $Influencer_networks = explode(',', $Influencer_networks);

                                    @endphp

                                    @php
                                        $left_social_networks = 0;
                                    @endphp
                                    @foreach ($socialnetworks as $socialnetwork)
                                        @if (!in_array($socialnetwork->id, $Influencer_networks))
                                            <option class="network_option" value="{{ $socialnetwork->id }}"
                                                networkurl="{{ $socialnetwork->default_address }}"
                                                style="color: black;">{{ $socialnetwork->name }}</option>
                                            @php
                                                $left_social_networks = $left_social_networks + 1;
                                            @endphp
                                        @endif
                                    @endforeach

                                    @if ($left_social_networks == 0)
                                        <option>You have already taken all social networks</option>
                                    @endif

                                </select>
                                <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;visibility: hidden;">{{ __('content.save_button_cpanel') }}</button>

                            </div>

                            @if ($left_social_networks != 0)

                                <div class="container-fluid " style="padding-left: 0px;">
                                    <div class="row pb-3">
                                        <div class="col-md-9">
                                            <div class="form-group" style="display: flex">



                                                <label for="email" style="color: white">{{ __('content.network_url') }} </label>
                                                <input type="text" class="form-control" id="network_url_input"
                                                    style="background: white;height: 40px;" name="network_url"
                                                    value="" required>
                                            </div>
                                        </div>

                                        <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                            <button
                                                @if ($left_social_networks == 0) type="button" @else type="submit" @endif
                                                class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">Add</button>
                                        </div>


                                    </div>
                                </div>

                            @endif

                        </form>

                        <hr style="border-top: 6px solid #eeeeee;">
                        <h3
                            style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.payments') }}</h3>

                        <form action="{{ url('/influencer/update_earnings') }}" method="post"
                            enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-xs-6">
                                        <div class="form-group" style="display: flex">


                                            @php
                                                $earnings = $user->earnings;
                                                $earnings = round($earnings, 2);

                                                //$earnings = (float)$earnings;

                                                if (!str_contains($earnings, '.')) {
                                                    $earnings = $earnings . '.00';
                                                }

                                            @endphp

                                            <label for="email" style="color: white">{{ __('content.earnings') }}
                                                ${{ $earnings }}</label>
                                            {{-- <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="earnings" value="{{$user->earnings}}" readonly> --}}
                                        </div>
                                    </div>

                                    <div class="col-xs-6" style="text-align: end;padding-right: 22px;">
                                        <button type="button" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;"
                                            data-toggle="modal"
                                            data-target="#withdraw_earnings_modal>Withdraw money</button>
                </div>


              </div>

            </div>


          </form>

          <!-- Button trigger modal -->

          <div class="container-fluid " style="padding-left: 0px;">
            <div class="row pb-3">
              <div class="col-xs-6">
                <div class="form-group" style="display: flex">



                  <label for="email" style="color: white">{{ __('content.subscriber_history') }}</label>
                  {{-- <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="earnings" value="{{$user->earnings}}" readonly> --}}
                </div>
              </div>

              <div class="col-xs-6" style="text-align: end;padding-right: 22px;">
                <button type="button" class="launch_subscriber_list_modal launch_sub_modal save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;" data-toggle="modal" data-target="#subcriberlistmodal">
                  See All
                </button>

              </div>


            </div>

          </div>


          <h3  style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">{{ __('content.payment_methods') }}</h3>



          <form action="{{ url('/influencer/update_bank_account') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">{{ __('content.bank_account') }} </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="bank_account" value="{{ $user->bank_account }}" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>

          <form action="{{ url('/influencer/update_paypal_account') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">{{ __('content.paypal') }} </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="paypal_account" value="{{ $user->paypal_account }}" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>


          {{-- Account info section --}}
          <hr style="border-top: 6px solid #eeeeee;">
          <h3  style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">{{ __('content.account_info') }}</h3>

          <form action="{{ url('/influencer/update_email') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">{{ __('content.email') }} </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="email" value="{{ $user->email }}" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>

          <form action="{{ url('/influencer/update_password') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">{{ __('content.password') }} </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="password" value="" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>



          <form action="{{ url('/influencer/update_name') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">{{ __('content.name') }} </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="name" value="{{ $user->name }}" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>

          <form action="{{ url('/influencer/update_surname') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">{{ __('content.surname') }} </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="surname" value="{{ $user->surname }}" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>

          <form action="{{ url('/influencer/update_instagram_link') }}" method="post" enctype="multipart/form-data" style="margin-top: 20px;">
            @csrf
            <input type="hidden" name="influencer_id" value="{{ $user->id }}">

            <div class="container-fluid " style="padding-left: 0px;">
              <div class="row pb-3">
                <div class="col-md-9">
                  <div class="form-group" style="display: flex">



                    <label for="email" style="color: white">Instagram link: </label>
                    <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="instagram_link" value="{{ $user->instagram_link }}" required>
                  </div>
                </div>

                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                  <button type="submit" class="save_btn" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.save_button_cpanel') }}</button>
                </div>


              </div>

            </div>


          </form>


          <div >
            <hr style="border-top: 6px solid #eeeeee;">
            <h3  style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">{{ __('content.my_subscriptions') }}</h3>
          @php
              $id = Auth::user()->id;
              $subscriptions = DB::table('subscriptions')->where('user_id', $id)->get();
              $subscriptions_count = DB::table('subscriptions')->where('user_id', $id)->count();

          @endphp

               @if ($subscriptions_count > 0)
                                            @foreach ($subscriptions as $subscription)
                                                @php
                                                    $influencer_id = $subscription->influencer_id;
                                                    $influencer = DB::table('users')
                                                        ->where('id', $influencer_id)
                                                        ->first();
                                                @endphp

                                                <div
                                                    style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                                    @php
                                                        $profile_picture = $influencer?->profile_picture;
                                                    @endphp
                                                    <p
                                                        style="margin: 0px;    color: #333333;
                  font-weight: bold;
                  font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
              ">
                                                        <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
                  @else
                  src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                                                            style="max-width: 28px" alt="">
                                                        <span>@</span>{{ $influencer?->username_URL }}
                                                    </p>
                                                    <div
                                                        style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                                        <span
                                                            href="/user/delete_subscription/{{ $subscription->id }}"
                                                            class="delete" type="subscription"
                                                            warning_message="Confirm delete subscription? - Yes or No"><i
                                                                class="far fa-trash-alt"
                                                                style="cursor: pointer;color: black;"></i></span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <p style="margin: 0px;text-align: center;color: white;">No Subscriptions
                                            </p>
@endif


<div>
    <hr style="border-top: 6px solid #eeeeee;">
    <h3
        style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
        {{ __('content.my_followerships') }}</h3>
    @php
        $id = Auth::user()->id;
        $followerships = DB::table('followerships')
            ->where('follower_user_id', Auth::user()->id)
            ->get();
        $followerships_count = DB::table('followerships')
            ->where('follower_user_id', Auth::user()->id)
            ->count();

    @endphp

    @if ($followerships_count > 0)
        @foreach ($followerships as $followership)
            @php
                $userFollowed_id = $followership->followed_user_id;
                $userFollowed = DB::table('users')->where('id', $userFollowed_id)->first();
            @endphp

            <div style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                @php
                    $profile_picture = $userFollowed?->profile_picture;
                @endphp
                <p
                    style="margin: 0px;    color: #333333;
                    font-weight: bold;
                    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
                ">
                    <img @if ($profile_picture != null) src="{{ asset('assets/images/' . $profile_picture . '') }}"
                    @else
                    src="{{ asset('assets/images/output-onlinepngtools (2).png') }}" @endif
                        style="max-width: 28px" alt=""> <span>@</span>{{ $userFollowed?->username_URL }}
                </p>
                <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                    <span href="/user/delete_followership/{{ $followership->id }}" class="delete"
                        type="followership" warning_message="Confirm delete followership? - Yes or No"><i
                            class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></span>
                </div>
            </div>
        @endforeach
    @else
        <p style="margin: 0px;text-align: center;color: white;">No Followerships</p>
    @endif

    
    {{-- SUPER ADS CENTER Section --}}
    <hr style="border-top: 6px solid #eeeeee;">
    <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
        {{ __('content.superadscenter') }}</h3>

    <center><span href="https://live.superfanss.app/super-ads/" TARGET="_BLANK"
                  class="btn save_btn redirect_solicitar"
                  style="background: transparent;color: white;border: 2px solid white;">{{ __('content.superadscenterbutton') }}</span>
    </center>
    

    {{-- Contact Section --}}
    <hr style="border-top: 6px solid #eeeeee;">
    <h3
        style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
        {{ __('content.supercalls_request') }}</h3>

    <center><span href="https://superfanss.app/superfanscalls/" TARGET="_BLANK"
            class="btn save_btn redirect_solicitar"
            style="background: transparent;color: white;border: 2px solid white;">{{ __('content.solicitar') }}</span></center>




    {{-- Mail Section --}}
    <hr style="border-top: 6px solid #eeeeee;">
    <h3
        style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
        {{ __('content.instagram_growth') }}</h3>

    <center><a href="mailto:marketing@superfanss.app" class="btn save_btn"
            style="background: transparent;color: white;border: 2px solid white;">{{ __('content.contratar') }}</a></center>




</div>

</div>
</div>
</div>

     @endif
        
   


@endif




















<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@if (session()->has('message'))
    <script type="text/javascript">
        $(window).on('load', function() {
        setTimeout(function () {
            $('#exampleModalCenter').modal('show');
        }, 500);
        });
    </script>
@endif

{{-- @if (session()->has('post_added'))
<script type="text/javascript">
  $(window).on('load', function() {
    setTimeout(function () {
      $('#add_post_modal').modal('show');
    }, 500);
  });
</script>
@endif --}}

@if (session()->has('post_added'))
    <script type="text/javascript">
        $(window).on('load', function() {
setTimeout(function () {
            $('#add_post_modal').modal('show');
  }, 500);
        });
    </script>
@endif

@if(session()->has('all_post'))
                <script type="text/javascript">
                    $(window).on('load', function () {
setTimeout(function () {
                        $('#all_post_modal').modal('show');
  }, 500);
                    });
                </script>
            @endif


<script>
    $(document).ready(function() {

        $('.js-example-basic-multiple').select2({
            dropdownParent: $("#register_fan_Modal")
        });
        // $('.js-example-basic-multiple2').select2();


    });
    
    $(document).ready(function() {
  $(".control_panel_item").click(function() {
    if ($(window).width() < 768) {
      $('body').removeClass('offcanvas');
      $('.js-fh5co-nav-toggle').removeClass('active');
      
      setTimeout(function() {
        $("#exampleModalCenter").modal('show');
      }, 300);
    } else {
      $("#exampleModalCenter").modal('show');
    }
  });
});



//   $(document).ready(function() {
//   $(".add_post_item").click(function() {
//     if ($(window).width() < 768) {
//       $('body').removeClass('offcanvas');
//       $('.js-fh5co-nav-toggle').removeClass('active');
      
//       setTimeout(function() {
//         $("#add_post_modal").modal('show');
//       }, 300);
//     } else {
//       $("#add_post_modal").modal('show');
//     }
//   });
// });
</script>

<script>
function validateImageSize(inputId, minWidth = 300, minHeight = 300) {
    const input = document.getElementById(inputId);
    const submitBtn = document.querySelector('button[type="submit"]');

    input.addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const img = new Image();
        img.onload = function () {
            if (img.width < minWidth || img.height < minHeight) {
                alert(`❌ Image size not accepted. Please upload an image at least ${minWidth}x${minHeight} pixels.`);
                e.target.value = ''; 
                submitBtn.disabled = true;
            } else {
                submitBtn.disabled = false;
                cropFunction(file);
            }
        };
        img.onerror = function () {
            alert('❌ Invalid image file.');
            e.target.value = '';
            submitBtn.disabled = true;
        };
        img.src = URL.createObjectURL(file);
    });
}

validateImageSize('profile_picture');
validateImageSize('validatedCustomFile');
</script>


<script>
    $(document).ready(function() {

        $('.js-fh5co-nav-toggle').on('click', function(event) {
            event.preventDefault();
            var $this = $(this);


            if ($('body').hasClass('offcanvas')) {
                $this.removeClass('active');
                $('body').removeClass('offcanvas');
            } else {
                $this.addClass('active');
                $('body').addClass('offcanvas');
            }
        });

        $(document).click(function(e) {
            var container = $("#fh5co-aside, .js-fh5co-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {

                if ($('body').hasClass('offcanvas')) {

                    $('body').removeClass('offcanvas');
                    $('.js-fh5co-nav-toggle').removeClass('active');

                }

            }
        });




        $(".js-example-basic-multiple").change(function() {
            var items = $(this).select2("data");
            console.log("items" + items);
            // console.log("items length"+items.length);

            // if(items.length > 3) {
            //     alert("You can add maximum 3 networks");
            //     return false;
            // }

            if (items.length > 2) {
                // Find every unselected option and disable them
                $(this).find('option').not(':selected').attr('disabled', 'disabled');
            } else {
                // Enable all options
                $(this).find('option').removeAttr('disabled');
            }


            $(".social_links").each(function(index, value) {
                $("#" + value.id).css("display", "none");
                $("#" + value.id).prop("disabled", true);
                $("#" + value.id).prop("required", false);
            });
            $.each(items, function(index, value) {
                $("#" + value.text).prop("disabled", false);
                $("#" + value.text).prop("required", true);
                $("#" + value.text).css("display", "block");
            });
        });



        $("#sendlogin").click(function() {


            if ($("#name").val() == "") {
                // alert("Name is required");
                Swal.fire(
                    'Name is required',
                )
                return false;
            }

            // if($("#surname").val() == "") {
            //
            //
            //     Swal.fire(
            //         'Surname is required',
            //     )
            //
            //     return false;
            // }

            if ($("#email").val() == "") {

                Swal.fire(
                    'Email is required',
                )
                return false;
            }

            // if($("#nationality").val() == "") {
            //
            //     Swal.fire(
            //         'Nationality is required',
            //     )
            //     return false;
            // }


            if ($("#Choose_username_or_URL").val() == "") {

                Swal.fire(
                    'Username is required',
                )
                return false;
            }

 if (!$('#termsCheckbox1').is(':checked')) {
                    Swal.fire(
                        'Please accept the Terms and Conditions to proceed.'
                    );

                    event.preventDefault(); // Prevent form submission
                    return false;
                }


            var password = $("#password").val();

            var password_confirm = $("#password-confirm").val();

            if (password != password_confirm) {

                Swal.fire(
                    'Password not matched',
                )
            } else if (password.length < 8) {

                Swal.fire(
                    'Password should be greater than 8 characters',
                )
            } else {

                var email = $("#email").val();



                $.ajax({
                    url: '{{ URL::to('/check_duplicate_email') }}',
                    type: 'GET',
                    data: {
                        'email': email
                    },
                    success: function(response) {
                        // if(response == "email not exists") {


                        //     $("#form_register").submit();
                        // } else {
                        //     alert("email already exists");
                        // }

                        if (response == "email exists") {

                            Swal.fire(
                                'email already exists',
                            )
                        } else {
                            $("#form_register").submit();
                        }


                    }
                });




            }


        });

    });
</script>

<script>
    $(document).ready(function() {

        $('.js-example-basic-multiple2').select2({
            dropdownParent: $("#register_influencer_Modal")
        });



    });
</script>


<script>
    $(document).ready(function() {


        $(".js-example-basic-multiple2").change(function() {
            var items = $(this).select2("data");
            $(".social_links2").each(function(index, value) {
                $("#" + value.id + "2").css("display", "none");
                $("#" + value.id + "2").prop("disabled", true);
                $("#" + value.id + "2").prop("required", false);
            });
            $.each(items, function(index, value) {
                $("#" + value.text + "2").prop("disabled", false);
                $("#" + value.text + "2").prop("required", true);
                $("#" + value.text + "2").css("display", "block");
            });
        });



        $("#sendlogin2").click(function() {


            if ($("#name2").val() == "") {

                Swal.fire(
                    'Name is required',
                )

                return false;
            }

            // if($("#surname2").val() == "") {
            //
            //     Swal.fire(
            //         'Surname is required',
            //     )
            //     return false;
            // }

            if ($("#email2").val() == "") {

                Swal.fire(
                    'Email is required',
                )
                return false;
            }

            // if($("#nationality2").val() == "") {
            //
            //     Swal.fire(
            //         'Nationality is required',
            //     )
            //     return false;
            // }

            if ($("#price_of_subscription2").val() == "") {

                Swal.fire(
                    'Price of subscription is required',
                )
                return false;
            }

            if ($("#Choose_username_or_URL2").val() == "") {

                Swal.fire(
                    'Username or URL is required',
                )
                return false;
            }
            
             if (!$('#termsCheckbox').is(':checked')) {
                Swal.fire(
                    'Please accept the Terms and Conditions to proceed.'
                );

                event.preventDefault(); // Prevent form submission
                return false;
            }
            

            // if($("#your_instagram_link2").val() == "" || $("#your_instagram_link2").val() == "www.instagram.com/") {
            //
            //     Swal.fire(
            //         'Instagram link is required',
            //     )
            //     return false;
            // }

            if ($("#social_networks2").val() == "") {

                Swal.fire(
                    'Social networks are required',
                )
                return false;
            }




            var password = $("#password2").val();

            var password_confirm = $("#password-confirm2").val();

            if (password != password_confirm) {

                Swal.fire(
                    'Password not matched',
                )
            } else if (password.length < 8) {
                Swal.fire(
                    'Password should be greater than 8 characters',
                )

            } else {

                var email = $("#email2").val();

                var Choose_username_or_URL = $("#Choose_username_or_URL2").val();



                $.ajax({
                    url: '{{ URL::to('/check_duplicate_email_username') }}',
                    type: 'GET',
                    data: {
                        'email': email,
                        'Choose_username_or_URL': Choose_username_or_URL
                    },
                    success: function(response) {
                        // if(response == "email not exists") {


                        //     $("#form_register").submit();
                        // } else {
                        //     alert("email already exists");
                        // }

                        if (response == "email exists") {

                            Swal.fire(
                                'email already exists',
                            )
                        } else if (response == "username exists") {

                            Swal.fire(
                                'username already exists',
                            )
                        } else if (response == "unique email and username") {
                            $("#form_register2").submit();
                        }


                    }
                });




            }


        });

    });
</script>









<script>
    $(document).ready(function() {

        $("#price_of_subscription").keyup(function() {
            var price_of_subscription = $("#price_of_subscription").val();

            if (price_of_subscription > 150) {
                $("#price_of_subscription").val(150);
            }

            if (price_of_subscription < 0) {
                $("#price_of_subscription").val(0);
            }

        });
    });
</script>



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
            if ($(".slider > .item").last().hasClass("active")) {
                $nextItem = $(".slider > .item").first();
            }
            if (time <= 0) {
                nextSlide();
            }
        }, 1000);

        // Build Slider Navigation
        $(".slider > .item").each(function(i) {
            $(this).attr("data-id", i);
            $(".slider-nav").append('<a href="#" data-id="' + i + '"></a>');
        });

        $('.slider-nav > a[data-id="' + $('.slider > .item.active').attr("data-id") + '"]').addClass('active');

        function setNav() {
            $('.slider-nav > a').removeClass('active');
            $('.slider-nav > a[data-id="' + $('.slider > .item.active').attr("data-id") + '"]').addClass(
                'active');
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
            if ($(this).hasClass('prev')) {
                if ($('.slider > .item').first().hasClass('active')) {
                    $(".slider > .item").first().removeClass("active");
                    $(".slider-nav > a").first().removeClass("active");
                    $('.slider > .item').last().addClass('active');
                    $('.slider-nav > a').last().addClass('active');
                } else {
                    $activeItem.removeClass('active');
                    $('.slider-nav > a').removeClass('active');
                    $prevItem.addClass('active');
                    $('.slider-nav a[data-id="' + $prevItem.attr("data-id") + '"]').addClass("active");
                }
            }
            if ($(this).hasClass('next')) {
                if ($('.slider > .item').last().hasClass('active')) {
                    $(".slider > .item").last().removeClass("active");
                    $(".slider-nav > a").last().removeClass("active");
                    $('.slider > .item').first().addClass('active');
                    $('.slider-nav > a').first().addClass('active');
                } else {
                    $activeItem.removeClass('active');
                    $('.slider-nav > a').removeClass('active');
                    $nextItem.addClass('active');
                    $('.slider-nav a[data-id="' + $nextItem.attr("data-id") + '"]').addClass("active");
                }
            }
            time = timeReset;
        });

    });
</script>






<script>
    $(document).ready(function() {

        setTimeout(function() {
            $(".alert").css("display", "none")
        }, 2000);

        $(".next").click(function() {
            $(".item").removeClass("active-right");
            $(".item").removeClass("active-left");
            $(".active").addClass("active-right");
        });

        $(".prev").click(function() {
            $(".item").removeClass("active-right");
            $(".item").removeClass("active-left");
            $(".active").addClass("active-left");
        });





        $(".modal").click(function(event) {
            event.stopPropagation();
            // Do something
        });


    });
</script>












{{-- feed slider javascript --}}
<script>
    $(document).ready(function() {
        var time = 600000000;
        var timeReset = time;

        setInterval(function() {
            time = time - 1000;
            var $activeitem_feed = $(".slider > .item_feed.active_feed");
            var $nextitem_feed = $activeitem_feed.next();
            var $previtem_feed = $activeitem_feed.prev();

            function nextSlide() {
                $activeitem_feed.removeClass("active_feed");
                $nextitem_feed.addClass("active_feed");
                setNav();
                time = timeReset;
            }

            function prevSlide() {
                $activeitem_feed.removeClass("active_feed");
                $previtem_feed.addClass("active_feed");
                setNav();
                time = timeReset;
            }
            if ($(".slider > .item_feed").last().hasClass("active_feed")) {
                $nextitem_feed = $(".slider > .item_feed").first();
            }
            if (time <= 0) {
                nextSlide();
            }
        }, 1000);

        // Build Slider Navigation
        $(".slider > .item_feed").each(function(i) {
            $(this).attr("data-id", i);
            $(".slider-nav").append('<a href="#" data-id="' + i + '"></a>');
        });

        $('.slider-nav > a[data-id="' + $('.slider > .item_feed.active_feed').attr("data-id") + '"]').addClass(
            'active_feed');

        function setNav() {
            $('.slider-nav > a').removeClass('active_feed');
            $('.slider-nav > a[data-id="' + $('.slider > .item_feed.active_feed').attr("data-id") + '"]')
                .addClass('active_feed');
        }

        $(".slider-nav > a").on("click", function(e) {
            e.preventDefault();
            $(".slider-nav > a").removeClass("active_feed");
            $(".slider .item_feed.active_feed").removeClass("active_feed");
            $('.slider-nav > a[data-id="' + $(this).attr("data-id") + '"]').addClass('active_feed')
            $('.slider .item_feed[data-id="' + $(this).attr("data-id") + '"]').addClass("active_feed");
            time = timeReset;
        });
        $(".slider-control").on("click", function() {
            var $activeitem_feed = $(".slider > .item_feed.active_feed");
            var $nextitem_feed = $activeitem_feed.next();
            var $previtem_feed = $activeitem_feed.prev();
            if ($(this).hasClass('prev_feed')) {
                if ($('.slider > .item_feed').first().hasClass('active_feed')) {
                    $(".slider > .item_feed").first().removeClass("active_feed");
                    $(".slider-nav > a").first().removeClass("active_feed");
                    $('.slider > .item_feed').last().addClass('active_feed');
                    $('.slider-nav > a').last().addClass('active_feed');
                } else {
                    $activeitem_feed.removeClass('active_feed');
                    $('.slider-nav > a').removeClass('active_feed');
                    $previtem_feed.addClass('active_feed');
                    $('.slider-nav a[data-id="' + $previtem_feed.attr("data-id") + '"]').addClass(
                        "active_feed");
                }
            }
            if ($(this).hasClass('next_feed')) {
                if ($('.slider > .item_feed').last().hasClass('active_feed')) {
                    $(".slider > .item_feed").last().removeClass("active_feed");
                    $(".slider-nav > a").last().removeClass("active_feed");
                    $('.slider > .item_feed').first().addClass('active_feed');
                    $('.slider-nav > a').first().addClass('active_feed');
                } else {
                    $activeitem_feed.removeClass('active_feed');
                    $('.slider-nav > a').removeClass('active_feed');
                    $nextitem_feed.addClass('active_feed');
                    $('.slider-nav a[data-id="' + $nextitem_feed.attr("data-id") + '"]').addClass(
                        "active_feed");
                }
            }
            time = timeReset;
        });

    });
</script>


<script>
    $(document).ready(function() {


        $(".next_feed").click(function() {
            $(".item_feed").removeClass("active-right");
            $(".item_feed").removeClass("active-left");
            $(".active_feed").addClass("active-right");
        });

        $(".prev_feed").click(function() {
            $(".item_feed").removeClass("active-right");
            $(".item_feed").removeClass("active-left");
            $(".active_feed").addClass("active-left");
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



{{-- @if (session()->has('post_added'))
<script type="text/javascript">
  $(window).on('load', function() {
      setTimeout(function () {
      $('#add_post_modal').modal('show');
      }, 500);
  });
</script>
@endif --}}

@if (session()->has('post_added'))
    <script type="text/javascript">
        $(window).on('load', function() {
setTimeout(function () {
            $('#add_post_modal').modal('show');
  }, 500);
        });
    </script>
@endif


{{-- <script type="text/javascript">
  $(window).on('load', function() {
      setTimeout(function () {
      $('#subcriberlistmodal').modal('show');
      }, 500);
  });
</script> --}}


<script>
    $(document).ready(function() {
        $(".launch_subscriber_list_modal").click(function() {
            setTimeout(function () {
            $('#subcriberlistmodal').modal('show');
            
            $('#exampleModalCenter').modal('hide');
            }, 500);
        });

        $(".back_control_panel").click(function() {
            $('.networkurlModal').modal('hide');
            $('#subcriberlistmodal').modal('hide');
            setTimeout(function () {
            $('#exampleModalCenter').modal('show');

            if ($(this).hasClass("update_network")) {


                setTimeout(function() {
                    var $foo = $("#exampleModalCenter");
                    $foo.scrollTop($foo.scrollTop() + 450);
                }, 500); //wait 2 seconds


            } else if ($(this).hasClass("history_of_subscribers")) {

                setTimeout(function() {
                    var $foo = $("#exampleModalCenter");
                    $foo.scrollTop($foo.scrollTop() + 1000);
                }, 500); //wait 2 seconds

            }

            //$('body').addClass("modal-open");
        });



        $(".open_all_post").click(function() {
            setTimeout(function () {
            $('#all_post_modal').modal('show');
            }, 500);
            $('#add_post_modal').modal('hide');
        });

        $(".back_add_post_modal").click(function() {
            setTimeout(function () {
            $('#all_post_modal').modal('hide');
            
            $('#add_post_modal').modal('show');
            }, 500);
        });



        $(".networkmodal").click(function() {

            var network_name = $(this).attr("network_name");

            $('.networkurlsdiv').hide();
            $('.networkurl' + network_name + '').show();
setTimeout(function () {
            $('.networkurlModal').modal('show');
            $('#exampleModalCenter').modal('hide');
}, 500);
        });



        $(".back_modal_event").click(function() {
            $("body").css("padding-right", "0px");
            setTimeout(function() {
                $("body").addClass("modal-open");
            }, 500); //wait 2 seconds

        });


        $(".launch_sub_modal").click(function() {

            setTimeout(function() {
                $("body").css("padding-right", "0px");
            }, 500); //wait 2 seconds
        });

        $(".close").click(function() {


            setTimeout(function() {
                $("body").css("padding-right", "0px");
            }, 500); //wait 2 seconds
        });





        $(".direct_subscriber_list").click(function() {

            $(".back_modal_event").css("display", "none");

        });

        $(".close").click(function() {

            $(".back_modal_event").css("display", "inline-block");

        });





        $(".indiviual_post_likes").click(function() {

            var post_id = $(this).attr("post_id");



            $(".post_div").hide();
            $(".post_div_" + post_id + "").show();

        });



        // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
        $('.dropdown').on('show.bs.dropdown', function(e) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
        });

        // ADD SLIDEUP ANIMATION TO DROPDOWN //
        $('.dropdown').on('hide.bs.dropdown', function(e) {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
        });

        // Closes the menu in the event of outside click
        window.onclick = function(event) {
            if (!event.target.matches('.dropbutton')) {



                // $(".dropdown").addClass("open");
                // $("#dropdownMenuButton").attr("aria-expanded","true");
                // $("#dropdown-menu").css("display","block");




            }
        }



    });
</script>




<script>
    $(document).ready(function() {
        var networkurl = $("#network_id").find("option:selected").attr("networkurl");
        $("#network_url_input").val(networkurl);

        $("#network_id").change(function() {
            var networkurl = $(this).find("option:selected").attr("networkurl");
            $("#network_url_input").val(networkurl);
        });

    });
</script>


<script>
    $(document).ready(function() {

        $("#add_post_form").submit(function() {
            $("#loading_bar").css("display", "block");
        });

    });
</script>

@error('email')
    <script>
        $(document).ready(function() {
            setTimeout(function () {
            $("#login_Modal").modal('show');
            }, 500);
        });
    </script>
@enderror

<script>
    $(document).ready(function() {


        $(".control_panel_item").click(function() {

            setTimeout(function() {
                $("#exampleModalCenter").modal('show');
            }, 100);

        });

        $("#dropdownMenuButton").click(function() {

            if ($(this).hasClass("activated_dropdown")) {
                $(this).removeClass("activated_dropdown")
            } else {
                $(this).addClass("activated_dropdown")
            }


        });

        $("#open_login_modal").click(function(event) {

            if ($(window).width() < 760) {
                event.stopPropagation();
                setTimeout(function() {
                    $("#register_Modal").modal('hide');
                    $("#login_Modal").modal('show');
                }, 300);
            } else {
                $("#register_Modal").modal('hide');
                $("#login_Modal").modal('show');
            }

        });

        $("#open_register_modal").click(function(event) {

            if ($(window).width() < 760) {
                event.stopPropagation();

                setTimeout(function() {
                    $("#login_Modal").modal('hide');
                    $("#register_Modal").modal('show');
                }, 300);
            } else {
                $("#login_Modal").modal('hide');
                $("#register_Modal").modal('show');

            }

        });


        $("#open_influencer_modal").click(function(event) {

            if ($(window).width() < 760) {
                event.stopPropagation();
                setTimeout(function() {
                    $("#register_Modal").modal('hide');
                    $("#register_influencer_Modal").modal('show');
                }, 300);
            } else {
                $("#register_Modal").modal('hide');
                $("#register_influencer_Modal").modal('show');
            }

        });

        $("#open_fan_modal").click(function(event) {
            if ($(window).width() < 760) {
                event.stopPropagation();
                setTimeout(function() {
                    $("#register_Modal").modal('hide');
                    $("#register_fan_Modal").modal('show');
                }, 300);
            } else {
                $("#register_Modal").modal('hide');
                $("#register_fan_Modal").modal('show');
            }

        });

        $("#open_fan_modal_directly").click(function(event) {
            if ($(window).width() < 760) {
                event.stopPropagation();
                setTimeout(function() {
                    $("#register_Modal").modal('hide');
                    $("#register_fan_Modal").modal('show');
                }, 300);
            } else {
                $("#register_Modal").modal('hide');
                $("#register_fan_Modal").modal('show');
            }

        });


        $(".back_register_modal").click(function() {

            $("#register_fan_Modal").modal('hide');
            $("#register_influencer_Modal").modal('hide');
            setTimeout(function () {
            $("#register_Modal").modal('show');
  }, 500);
        });


        $('span[data-toggle="modal"').add('a[data-toggle="modal"]').click(function(event) {

            if ($(window).width() < 760) {

                var data_target = $(this).attr("data-target");
                event.stopPropagation();

                setTimeout(function() {
                    $(data_target).modal('show');
                }, 300);

            }


        });





        // $(".btn-pay-stripe").click(function(event){
        //   event.preventDefault();
        //   if ($(window).width() < 550) {

        //     setTimeout(function(){
        //       // $(".stripe_payment_form").submit();
        //       $(".btn-pay-stripe").click();
        //     }, 300);

        //   } else {
        //     // $(".stripe_payment_form").submit();
        //     $(".btn-pay-stripe").click();
        //   }


        // });


        // $(".btn-pay-paypal").click(function(event){
        //   event.preventDefault();
        //   if ($(window).width() < 550) {

        //     setTimeout(function(){
        //       // $(".paypal_payment_form").submit();
        //       $(".btn-pay-paypal").click();
        //     }, 300);

        //   } else {
        //     // $(".paypal_payment_form").submit();
        //     $(".btn-pay-paypal").click();
        //   }


        // });




    });
</script>




















<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready(function() {


        $(".delete").click(function() {

            var type = $(this).attr("type");

            var href = $(this).attr("href");

            if (type == "post") {
                var title = 'Are you sure?';
            } else if (type == "network") {
                var title = 'Confirm delete network?';
            } else if (type == "followership") {
                var title = 'Confirm delete followership?';
            } else if (type == "subscription") {
                var title = 'Confirm delete Subscription?';
            }

            // Swal.fire({
            //   title: title,
            //   text: "You won't be able to revert this!",
            //   // icon: 'warning',
            //   showCancelButton: true,
            //   confirmButtonColor: '#3085d6',
            //   cancelButtonColor: '#d33',
            //   confirmButtonText: 'Yes, delete it!'
            // }).then((result) => {
            //   if (result.isConfirmed) {

            //     window.location = href;

            //   }
            // });


            if ($(window).width() < 760) {

                setTimeout(function() {



                    swal({
                            title: title,
                            text: "You won't be able to revert this!",
                            // buttons: true,
                            buttons: {


                                defeat: {
                                    text: "Yes, delete it!",
                                    value: "catch",
                                    closeModal: false,
                                },
                                cancel: "Cancel",
                            },
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                setTimeout(function() {
                                    window.location = href;
                                }, 300);
                            }
                        });

                }, 000);

            } else {

                swal({
                        title: title,
                        text: "You won't be able to revert this!",
                        // buttons: true,
                        buttons: {


                            defeat: {
                                text: "Yes, delete it!",
                                value: "catch",
                            },
                            cancel: "Cancel",
                        },
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            setTimeout(function() {
                                window.location = href;
                            }, 000);
                        }
                    });

            }



        });




        $(".redirect_solicitar").click(function(event) {
            href = $(this).attr("href");
            if ($(window).width() < 760) {

                setTimeout(function() {
                    window.open(href, '_blank');
                }, 300);
            } else {
                window.open(href, '_blank');
            }

        });


    });
</script>


@if (session()->has('message_subscription') || session()->has('message_follow') || session()->has('duplicate_error'))

    <script>
        $(document).ready(function() {

            var message = '<?php echo session()->get('message_follow'); ?> <?php echo session()->get('message_subscription'); ?> <?php echo session()->get('duplicate_error'); ?>';

            Swal.fire(

                message,

            )


        });
    </script>

@endif




{{-- Destroy all unnecessary sessions at the end --}}

@if (session()->has('subscribe_this_influencer'))


    <script type="text/javascript">
        $(window).on('load', function() {
         setTimeout(function () {
  $('#paymentModalCenter').modal('show');
}, 500);

        });
    </script>

    @php
        Session::forget('subscribe_this_influencer');
    @endphp

@endif


@if (session()->has('message_follow'))

    @php
        Session::forget('message_follow');
    @endphp

@endif


<script>
document.getElementById('post_image_video_input').addEventListener('change', async function (e) {
    const file = e.target.files[0];

    if (!file) return;

    const fileType = file.type;

    if (fileType === "image/heic" || file.name.toLowerCase().endsWith(".heic")) {
        try {
            const convertedBlob = await heic2any({
                blob: file,
                toType: "image/jpeg",
                quality: 0.8
            });

            const newFile = new File([convertedBlob], file.name.replace(/\.[^/.]+$/, ".jpg"), {
                type: "image/jpeg"
            });

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(newFile);

            document.getElementById('converted_file').files = dataTransfer.files;

        } catch (error) {
            alert("Error converting HEIC image: " + error.message);
            e.target.value = "";
        }
    } else {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('converted_file').files = dataTransfer.files;
    }
});
</script>


<script>
    $(document).ready(function() {
        // Code to get duration of audio /video file before upload - from: http://coursesweb.net/

        //register canplaythrough event to #audio element to can get duration
        var f_duration = 0; //store duration
        document.getElementById('audio').addEventListener('canplaythrough', function(e) {
            //add duration in the input field #f_du
            f_duration = Math.round(e.currentTarget.duration);

            if (f_duration > 61) {
                // alert("f_duration: " + f_duration);
                Swal.fire(
                    'The video you trying to upload is longer than 1 minute',
                )
                $("#post_image_video_input").val('');
            }

            URL.revokeObjectURL(obUrl);
        });

        //when select a file, create an ObjectURL with the file and add it in the #audio element
        var obUrl;
        document.getElementById('post_image_video_input').addEventListener('change', function(e) {
            var file = e.currentTarget.files[0];

            let filetype = file.type.toLowerCase();
            if (filetype === 'image/heic' || filetype === 'image/heif') {
                Swal.fire(
                    {
                        iconHtml: '<img style="width: 120px; border:none;" src="{{ asset('assets/images/Superfans_01.svg')}}">',
                        title: " Error al subir archivo :(",
                        html: `
                                    🇪🇸 Actualmente estamos teniendo errores con los archivos de Apple, te pedimos disculpas, nuestros desarrolladores están trabajando plenamente en arreglar este error gracias, por su paciencia.
                                    <br>
                                    <br>
                                    Puedes enviarnos los archivos que quieres subir a hello@superfanss.app
                                    <br>
                                    <br>
                                    Saludos cordiales,
                                    El equipo de Super Mundo🦸🏻‍♀️
                                    <br>
                                    <br>
                                    <br>
                                     🇺🇸 We are currently experiencing errors with Apple files, we apologize, our developers are fully working on fixing this error, thank you for your patience.
                                     <br>
                                     <br>
                                    You can send us the files you want to upload to hello@superfanss.app
                                    <br>
                                    <br>
                                    Best regards,
                                    The Super World team 🦸🏻‍♀
                                    `,
                        showCloseButton: true,
                    }
                )
                $("#post_image_video_input").val('');
                URL.revokeObjectURL(obUrl);
                modalShouldBeClosed = true;
            }
            //check file extension for audio/video type
            if (file.name.match(/\.(avi|mp3|mp4|mpeg|ogg|webm)$/i)) {
                obUrl = URL.createObjectURL(file);
                document.getElementById('audio').setAttribute('src', obUrl);
            }
        });

    });
</script>
<!-- JS -->
<script>
document.getElementById("streamForm").addEventListener("submit", async (e) => {
    e.preventDefault(); // stop form from reloading page

    const bio = e.target.bio.value.trim();
    const tags = e.target.tags.value.trim();

    if (!bio || !tags) {
        return alert("Please fill in bio and tags");
    }

    try {
        const res = await fetch("/create-room", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ bio, tags })
        });

        if (!res.ok) throw new Error("Failed to create room");
        const data = await res.json();

        if (data.roomName) {
            window.location.href = `/start-stream/${data.roomName}`;
        }
    } catch (err) {
        console.error("❌ Error creating room:", err);
        alert("Could not start stream.");
    }
});
</script>
<script>
$(document).ready(function () {
    $('.streaming_anchor').on('click', function () {
        const aside = document.querySelector('.js-fh5co-nav-toggle');
        console.log("classes asssssss", aside.classList)
        if (aside && aside.classList.contains('active')) {
            $('.js-fh5co-nav-toggle').click(); 
        }
    });
});
</script>
</section>
