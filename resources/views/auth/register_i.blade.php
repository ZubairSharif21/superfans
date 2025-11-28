<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{ __('auth.create_creator_account') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<meta name="theme-color" content="#ffc83d">

       <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">
    <style>
        .select2 {
            max-width: 100%;
        }
        input {
            height: 45px;
            border: 1px solid black !important;
            font-size: 20px !important;
    font-weight: 100 !important;
        }
        .btn-outline-primary {
            color: #da1212;
            border: 2px solid #da1212;
            border-radius: 0px;
        }
        .btn-outline-primary:hover {
            color: #fff;
            background-color: #da1212;
            border-color: #da1212;
        }
        .btn-outline-primary:active {
            color: #fff;
            background-color: #da1212 !important;
            border-color: #da1212 !important;
            outline: none;
            border: 0px;
        }
        .btn-outline-primary:focus {
            color: #fff;
            background-color: #da1212;
            border-color: #da1212;
            outline: none;
            box-shadow: none;
        }
        input {
            border-radius: 0px !important;
        }

        .swal2-popup {
					font-size: 0.7rem !important;
				}

        .swal2-modal {
					color: white !important;
					background: #8a2be2 !important;
				}

				.swal2-default-outline {
					border-radius: 0px !important;
				}

				.swal2-confirm {
					color: black !important;
					background: white !important;
				}

                .form-control:focus {
    border: 1px solid black !important;
        color: black;
    background-color: #fff;

    outline: 0;
    box-shadow: 0 0 0 0 rgb(0 0 0 / 0%) !important;
}

    </style>







<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
<script src="https://unpkg.com/dropzone"></script>
<script src="https://unpkg.com/cropperjs"></script>

<!-- Cropper CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet"/>

<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>


<style>

    .image_area {
      position: relative;
    }

    #sample_image, #uploaded_image {
          display: block;
          max-width: 100%;
    }

    .preview {
          overflow: hidden;
          width: 160px;
          height: 160px;
          margin: 10px;
          border: 1px solid red;
    }

    .modal-lg{
          max-width: 1000px !important;
    }

    .overlay {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      background-color: rgba(255, 255, 255, 0.5);
      overflow: hidden;
      height: 0;
      transition: .5s ease;
      width: 100%;
    }

    .image_area:hover .overlay {
      height: 50%;
      cursor: pointer;
    }

    .text {
      color: #333;
      font-size: 20px;
      position: absolute;
      top: 50%;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .cropper-bg {
        max-width: 100% !important;
    }

    .modal-header .close {
        position: absolute;
        right: 10px;
        margin-top: -22px;
    }

    @media only screen and (max-width: 767px) {
            .cropper_row {
                padding: 10px;
            }
        }

    /* .cropper-hide {
        width: 95% !important;
    } */

    </style>

<style>
.tooltip-container {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.tooltip-container .tooltip-text {
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
    white-space: nowrap;
}


.tooltip-container:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
}
</style>

    <style type="text/css">.btn-secondary{background-color: #fff !important; color: #000 !important;border: 3px solid #000 !important;} .btn-secondary:hover{background-color: #000 !important; color: #fff !important;}</style>

<style>
    input::placeholder {
        font-size: 16px; 
    }
    
    
    /* QUITAR COMPLETAMENTE EL GLOW AZUL EN CUALQUIER <a> O <button> */

a, a:focus, a:active, a:focus-visible,
button, button:focus, button:active, button:focus-visible,
.btn, .btn:focus, .btn:active, .btn:focus-visible {
    outline: none !important;
    box-shadow: none !important;
    -webkit-tap-highlight-color: transparent !important;
}

/* Bootstrap mete un foco azul EXCLUSIVO para .btn-outline-* */
.btn-outline-primary:focus,
.btn-outline-primary:active {
    outline: none !important;
    box-shadow: none !important;
}

/* Botón ID="sendlogin" */
#sendlogin,
#sendlogin:focus,
#sendlogin:active {
    outline: none !important;
    box-shadow: none !important;
    -webkit-tap-highlight-color: transparent !important;
}

/* Quitar highlight azul en iOS específicamente */
* {
    -webkit-tap-highlight-color: rgba(0,0,0,0) !important;
}.dropdown-menu {
    display: none;
}

.dropdown-menu.show {
    display: block;
}
</style>



  </head>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.querySelector(".language-dropdownz .dropdown-toggle");
    const menu   = document.querySelector(".language-dropdownz .dropdown-menu");

    toggle.addEventListener("click", function (e) {
        e.stopPropagation();     // evita que se cierre al hacer click en el botón
        menu.classList.toggle("show");
    });

    // cerrar si pulsan fuera
    document.addEventListener("click", function () {
        menu.classList.remove("show");
    });
});
</script>
  <body>

@php
    $currentLocale = app()->getLocale();
@endphp

<div class="language-dropdownz">
    <button class="dropdown-toggle">
        <img src="{{ 
            $currentLocale === 'en' ? asset('assets/images/euflag.png') :
            ($currentLocale === 'es' ? asset('assets/images/spainflag.png') :
            ($currentLocale === 'fr' ? asset('assets/images/fr.png') :
            ($currentLocale === 'de' ? asset('assets/images/de.png') :
            ($currentLocale === 'it' ? asset('assets/images/it.png') :
            ($currentLocale === 'pt' ? asset('assets/images/pt.png') :
            ($currentLocale === 'ca' ? asset('assets/images/ca.png') :
            asset('assets/images/cn.png'))))))) 
        }}" 
        alt="{{ $currentLocale }}" 
        style="width: 20px; height: 20px;">
    </button>
    <div class="dropdown-menu">
        @foreach(['en', 'es', 'fr', 'de', 'it', 'pt', 'ca', 'cn'] as $locale)
            @if($locale !== $currentLocale)
                <a href="{{ route('lang.switch', $locale) }}">
                    <img src="{{ 
                        $locale === 'en' ? asset('assets/images/euflag.png') :
                        ($locale === 'es' ? asset('assets/images/spainflag.png') :
                        ($locale === 'fr' ? asset('assets/images/fr.png') :
                        ($locale === 'de' ? asset('assets/images/de.png') :
                        ($locale === 'it' ? asset('assets/images/it.png') :
                        ($locale === 'pt' ? asset('assets/images/pt.png') :
                        ($locale === 'ca' ? asset('assets/images/ca.png') :
                        asset('assets/images/cn.png'))))))) 
                    }}" 
                    alt="{{ $locale }}" 
                    style="width: 20px; height: 20px;">
                </a>
            @endif
        @endforeach
    </div>
</div>



<style>
.language-dropdownz {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
    font-family: Arial, sans-serif;
}

.dropdown-toggle {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 6px 12px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    color: #333;
    display: flex;
    align-items: center;
}


.dropdown-menu {
    display: none;
    position: absolute;
    top: -260px;
    right: 0;
    min-width: 100%;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 6px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.dropdown-menu a {
    display: block;
    padding: 8px 12px;
    color: #333;
    text-decoration: none;
}

.dropdown-menu a:hover {
    /*background-color: #f0f0f0;*/
}




     
button#sendlogin:hover{
background-color: #4712a6 !important;
transition: 0.5s !important;
}

button#sendlogin:active{
    outline:none!important;
}
button#sendlogin:focus{
    outline:none!important;
}

</style>
    <!-- no additional media querie or css is required -->
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh">
        <div class="col-lg-5">
            <div class="card p-4 mb-5 mt-3" style="border-radius: 30px;border: 0;">
                <div class="card-body">
                    <form method="POST" id="form_register" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="role" value="influencer">
                        <div style="text-align: center">
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

<a href="https://superfans.world/">
    <img src="{{ url('assets/images/' . $logo) }}" style="width: 54%;margin-bottom: 14px;">
</a>

                        </div>
                        <h1 class="mb-3" style="text-align: center;color: #212529;margin-bottom: 0.5rem !important;">{{ __('auth.register_title') }}</h1>
                        <p style="color:black;text-align: center;">{{ __('auth.register_description') }}</p>

                        <div class="form-group">
                            <input id="name" style="border: 1px solid #000000;" type="text" placeholder="{{ __('auth.enter_name') }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <input id="email" style="border: 1px solid #000000;" type="email" placeholder="{{ __('auth.enter_email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

<div class="form-group">
    <input id="number" style="border: 1px solid #000000;" type="text" placeholder="{{ __('auth.enter_number') }}" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}">
    @error('number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password" style="border: 1px solid #000000;" type="password" placeholder="{{ __('auth.enter_pass') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input id="password-confirm" style="border: 1px solid #000000;" type="password" placeholder="{{ __('auth.confirm_password') }}" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group">
                            <input id="bank_account" style="border: 1px solid #000000;" type="text" placeholder="{{ __('auth.enter_bank_account') }}" class="form-control " name="bank_account">
                        </div>

                        <div class="form-group">
                            <input id="paypal_account" style="border: 1px solid #000000;" type="text" placeholder="{{ __('auth.paypal_account') }}" class="form-control " name="paypal_account">
                        </div>

                        <div class="form-group">
                            <input id="price_of_subscription" style="border: 1px solid #000000;" type="number" step="0.01" min="0.50" placeholder="{{ __('auth.enter_subscription_price') }}" class="form-control " name="price_of_subscription" required>
                        </div>

                      <div class="form-group">
    <div class="custom-file">
        <input type="file" style="border: 1px solid #000000;"
               class="custom-file-input profile_picture" id="profile_file_input">
        <label class="custom-file-label" for="profile_file_input">{{ __('auth.profile_picture') }}</label>
        <input type="hidden" name="profile_picture" id="profile_picture">
    </div>
</div>

<div class="form-group">
    <div class="custom-file">
        <input type="file" style="border: 1px solid #000000;"
               class="custom-file-input cover_picture" id="cover_file_input">
        <label class="custom-file-label" for="cover_file_input">{{ __('auth.cover_picture') }}</label>
        <input type="hidden" name="cover_picture" id="cover_picture">
    </div>
</div>

                        <div class="form-group">
                            <label for="">{{ __('auth.social_networks') }}</label>
                            <select class="js-example-basic-multiple custom-select" id="social_networks" style="border: 1px solid #000000;" name="networks[]" multiple="multiple">
                                @php
                                    $socialnetworks = DB::table('socialnetworks')->get();
                                @endphp
                                @foreach($socialnetworks as $socialnetwork)
                                    <option value="{{$socialnetwork->id}}">{{$socialnetwork->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group my-4">
                            @foreach($socialnetworks as $socialnetwork)
                                <input type="text" name="{{$socialnetwork->id}}" id="{{$socialnetwork->name}}" style="display: none; margin-top: 10px;border: 1px solid #000000;" class="form-control social_links" placeholder="{{ __('auth.enter_social_link', ['platform' => $socialnetwork->name]) }}" value="{{$socialnetwork->default_address}}" />
                            @endforeach
                        </div>

                        <div class="form-group">
                            <input id="Choose_username_or_URL" style="border: 1px solid #000000;" type="text" placeholder="{{ __('auth.choose_username_url') }}" class="form-control " name="Choose_username_or_URL" required>
                        </div>

                        <div class="form-group" style="position: relative;">
                            <label for="referred_influencer">{{ __('auth.invited_by') }}  <span class="tooltip-container" style="font-size: 18px; position: relative; top: 2.5px;">
        ⓘ
        <span class="tooltip-text">
  {!! __('auth.reg_info') !!}

        </span>
    </span></label>
                            
                            <input type="text" id="referred_influencer" name="referred_influencer" placeholder="{{ __('auth.influencer_username_placeholder') }}"
                                   style="width: 100%; padding: 5px; border: 1px solid lightgray; border-radius: 5px;">

                            <div id="influencer-suggestion-box" style="position: absolute; top: 100%; left: 0; right: 0; z-index: 10000;">
                                <ul id="influencer-suggestions"
                                    style="list-style: none; padding-left: 0; background: #fff; border: 1px solid #ccc; width: 100%; margin: 0; display: none; max-height: 150px; overflow-y: auto;">
                                </ul>
                            </div>
                        </div>

                        <div class="form-group d-flex align-items-center mb-3" style="padding-left: 20px">
                            <input class="form-check-input me-2" type="checkbox" id="termsCheckbox" name="termsCheckbox" required>
                            <label class="form-check-label" for="termsCheckbox">
                                {{ __('auth.agree_terms') }} <a style="color: purple" href="https://superfans.world/terminosdeuso" target="_blank">{{ __('auth.terms_and_conditions') }}</a>
                            </label>
                        </div>
                        <br>
                        <button type="button" id="sendlogin" class="btn" style="padding-right: 11px !important; padding-left: 11px !important; background-color: #724abb;border-color: #724abb ; color: #fff; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;text-decoration:none;border: 3px solid #4712a6;margin-left: auto;display: block;border-radius:0px !important;font-size: 1.1em !important;"><b>{{ __('auth.register_btn') }}</b>✨</button>
                    </form>

                    <div class="text-center mt-4">
                        <p><b>↖</b> {{ __('auth.back_text') }}
                            <a href="{{url('/register')}}" style="text-align: center;">
                                <span>{{ __('auth.back') }}</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session()->has('message_follow'))

  @php
    Session::forget('message_follow');
  @endphp

@endif

@if(session()->has('other_user_username'))

  @php
    Session::forget('other_user_username');
  @endphp

@endif


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#price_of_subscription").keyup(function(){
                var price_of_subscription = $("#price_of_subscription").val();

                if(price_of_subscription > 150) {
                    $("#price_of_subscription").val(150);
                }

                if(price_of_subscription < 0) {
                    $("#price_of_subscription").val(0);
                }

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

<script>
    const allUsers = @json($influencers);

    const influencerInput = document.getElementById('referred_influencer');
    const influencerSuggestionsBox = document.getElementById('influencer-suggestions');

    influencerInput.addEventListener('input', function () {
        const query = influencerInput.value.trim().toLowerCase();
        influencerSuggestionsBox.innerHTML = '';

        if (query.length > 0) {
            const matches = allUsers.filter(user =>
                user.username_URL.toLowerCase().includes(query)
            );

            matches.forEach(user => {
                const li = document.createElement('li');
                li.textContent = user.username_URL;
                li.style.padding = '5px 10px';
                li.style.cursor = 'pointer';

                li.addEventListener('click', function () {
                    influencerInput.value = user.username_URL;
                    influencerSuggestionsBox.style.display = 'none';
                });

                influencerSuggestionsBox.appendChild(li);
            });

            influencerSuggestionsBox.style.display = matches.length > 0 ? 'block' : 'none';
        } else {
            influencerSuggestionsBox.style.display = 'none';
        }
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('#influencer-suggestions') && !e.target.closest('#referred_influencer')) {
            influencerSuggestionsBox.style.display = 'none';
        }
    });
</script>



<script>
    $(document).ready(function() {


    $(".js-example-basic-multiple").change(function () {
                var items = $(this).select2("data");
                $(".social_links").each(function (index, value) {
                    $("#" + value.id).css("display", "none");
                    $("#" + value.id).prop("disabled", true);
                    $("#" + value.id).prop("required", false);
                });
                $.each(items, function (index, value) {
                    $("#" + value.text).prop("disabled", false);
                    $("#" + value.text).prop("required", true);
                    $("#" + value.text).css("display", "block");
                });
            });



            $("#sendlogin").click(function () {


                if($("#name").val() == "") {

                    Swal.fire(
                        'Name is required',
                    )

                    return false;
                }

                // if($("#surname").val() == "") {
                //
                //     Swal.fire(
                //         'Surname is required',
                //     )
                //     return false;
                // }

                if($("#email").val() == "") {

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

                if($("#price_of_subscription").val() == "") {

                    Swal.fire(
                        'Price of subscription is required',
                    )
                    return false;
                }

                if($("#Choose_username_or_URL").val() == "") {

                    Swal.fire(
                        'Username or URL is required',
                    )
                    return false;
                }

                if($("#your_instagram_link").val() == "" || $("#your_instagram_link").val() == "www.instagram.com/") {

                    Swal.fire(
                        'Instagram link is required',
                    )
                    return false;
                }

                if($("#social_networks").val() == "") {

                    Swal.fire(
                        'Social networks are required',
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




                var password = $("#password").val();

                var password_confirm = $("#password-confirm").val();

                if(password != password_confirm) {

                    Swal.fire(
                        'Password not matched',
                    )
                } else if(password.length < 8) {
                    Swal.fire(
                        'Password should be greater than 8 characters',
                    )

                } else {

                    var email = $("#email").val();

                    var Choose_username_or_URL = $("#Choose_username_or_URL").val();



                    $.ajax({
                        url: '{{URL::to('/check_duplicate_email_username')}}',
                        type: 'GET',
                        data: { 'email':email,'Choose_username_or_URL':Choose_username_or_URL},
                        success: function(response)
                        {
                            // if(response == "email not exists") {


                            //     $("#form_register").submit();
                            // } else {
                            //     alert("email already exists");
                            // }

                            if(response == "email exists") {

                                Swal.fire(
                                    'email already exists',
                                )
                            } else if (response == "username exists") {

                                Swal.fire(
                                    'username already exists',
                                )
                            } else if(response == "unique email and username") {
                                $("#form_register").submit();
                            }


                        }
                    });




                }


            });

    });
</script>






<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="z-index: 12121212121212;">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
          <div class="modal-header" style="display: block !important;">
              <button type="button" class="cropper_close" data-dismiss="modal" aria-label="Close" style="position: absolute;
				right: 10px;
				background: transparent;border: 0px;">
                  <span aria-hidden="true">—</span>
              </button>
              <h5 class="modal-title cropper-title" id="modalLabel" style="    color: #000;
    font-family: Montserrat, Arial, sans-serif ;
              font-weight: 700;
              font-size: 17px;">Recorta la imagen para subirla</h5>
              {{-- class="close   --}}

              <p class="cropper-subtitle" style="color: #666 !important; font-family: consolas ; font-size: 0.9em;margin-top: 10px;">Estamos en <i>Beta Phase</i>. Pronto estará disponible subir imágenes HD en tu cover o foto de perfil.</p>
          </div>
			<div class="modal-body">
			  <div class="img-container">
				  <div class="row cropper_row">
					  <div class="col-md-8" style="padding: 0px">
						<div>
						  <img src="" id="sample_image" />
						</div>
					  </div>
					  <div class="col-md-4">
						  <div class="preview"></div>
					  </div>
				  </div>
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-primary cropper_close" data-dismiss="modal" style="background: #ec1919 !important;
    border-color: #ec1919 !important;
        margin-right: 4px !important;
    margin-bottom: 4px !important;
    font-family: Roboto, Arial, sans-serif !important;
                font-size: 18px !important;
                font-weight: 400 !important;
                -webkit-border-radius: 0px !important;
                -moz-border-radius: 0px !important;
                -ms-border-radius: 0px !important;
                border-radius: 0px !important;
                -webkit-transition: 0.5s !important;
                -o-transition: 0.5s !important;
                transition: 0.5s !important;
                padding: 8px 20px !important;
    ">Cancel</button>
			  <button type="button" class="btn btn-secondary" id="crop" style="    margin-right: 4px;
    margin-bottom: 4px;
    font-family: Roboto, Arial, sans-serif;
                font-size: 18px;
                font-weight: 400;
                -webkit-border-radius: 0px;
                -moz-border-radius: 0px;
                -ms-border-radius: 0px;
                border-radius: 0px;
                -webkit-transition: 0.5s;
                -o-transition: 0.5s;
                transition: 0.5s;
                padding: 8px 20px !important;">Crop</button>
			</div>
	  </div>
	</div>
</div>

<script>
    $(document).ready(function () {
        var $modal = $('#modal');
        var image = document.getElementById('sample_image');
        var cropper;
        var current_picture_type = "";

        $('.profile_picture, .cover_picture').change(function (event) {
            if ($(this).hasClass("profile_picture")) {
                current_picture_type = "profile";
            } else if ($(this).hasClass("cover_picture")) {
                current_picture_type = "cover";
            }

            var files = event.target.files;
              if (files && files.length > 0) {
        var reader = new FileReader();
        reader.onload = function (event) {
            const tempImage = new Image();
            tempImage.onload = function () {
                if (tempImage.width < 590 || tempImage.height < 300) {
                    alert("❌ Image too small. Minimum size is 590x300 pixels.");
                } else {
                    image.src = event.target.result;
                    $modal.modal('show');
                }
            };
            tempImage.src = event.target.result;
        };
        reader.readAsDataURL(files[0]);
    }
        });

        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: current_picture_type === "profile" ? 1 : 3,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function () {
            var canvas = cropper.getCroppedCanvas({
                width: 1095,
                height: 1080,
            });

            canvas.toBlob(function (blob) {
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    var uploadUrl = current_picture_type === "profile"
                        ? "{{ URL::to('/upload_profile_image') }}"
                        : "{{ URL::to('/upload_cover_image') }}";

                    var inputSelector = current_picture_type === "profile"
                        ? "#profile_picture"
                        : "#cover_picture";

                    $.ajax({
                        url: uploadUrl,
                        method: "POST",
                        data: { image: base64data, "_token": "{{ csrf_token() }}" },
                        success: function (data) {
                            $modal.modal('hide');
                            $(inputSelector).val(data.filename);

                           
                           $('#' + (current_picture_type === "profile" ? "profile_file_input" : "cover_file_input")).siblings('.custom-file-label')
                              .text(data.filename);
                        }
                    });
                };
            });
        });
    });
</script>
<!-- <script> 

	$(document).ready(function(){

		/*function readURL(input)
		{
			  if(input.files && input.files[0])
			  {
				var reader = new FileReader();

				reader.onload = function(event) {
					  $('#uploaded_image').attr('src', event.target.result);
					  $('#uploaded_image').removeClass('img-circle');
					  $('#upload_image').after('<div align="center" id="crop_button_area"><br /><button type="button" class="btn btn-primary" id="crop">Crop</button></div>')
				}
				reader.readAsDataURL(input.files[0]); // convert to base64 string
			  }
		  }

		  $("#upload_image").change(function() {
			  readURL(this);
			  var image = document.getElementById("uploaded_image");
			  cropper = new Cropper(image, {
				aspectRatio: 1,
				viewMode: 3,
				preview: '.preview'
			});
		});*/

		setTimeout(function(){
			$(".cropper-hide").css("max-width","100% !important");
		}, 2000);//wait 2 seconds


		var $modal = $('#modal');
		var image = document.getElementById('sample_image');
		var cropper;

		var current_picture_type = "";

		//$("body").on("change", ".image", function(e){
		$('.profile_picture, .cover_picture').change(function(event){

			if($(this).hasClass("profile_picture")) {
				current_picture_type = "profile";
			} else if($(this).hasClass("cover_picture"))  {
				current_picture_type = "cover";
			}

			var files = event.target.files;
			var done = function (url) {
				  image.src = url;
				  $modal.modal('show');
			};
			//var reader;
			//var file;
			//var url;

			if (files && files.length > 0)
			{
				  /*file = files[0];
				  if(URL)
				  {
					done(URL.createObjectURL(file));
				  }
				  else if(FileReader)
				  {*/
					reader = new FileReader();
					reader.onload = function (event) {
						  done(reader.result);
					};
					reader.readAsDataURL(files[0]);
				  //}
			}
		});

		$modal.on('shown.bs.modal', function() {

			if(current_picture_type == "profile") {
				cropper = new Cropper(image, {
				aspectRatio:  1,
				viewMode: 3,
				preview: '.preview'
				});
			} else if(current_picture_type == "cover") {
				cropper = new Cropper(image, {
				aspectRatio:  3,
				viewMode: 3,
				preview: '.preview'
				});
			}

		}).on('hidden.bs.modal', function() {
			   cropper.destroy();
			   cropper = null;
		});

		$("#crop").click(function(){
			canvas = cropper.getCroppedCanvas({
				  width: 400,
				  height: 400,
			});

			canvas.toBlob(function(blob) {
				//url = URL.createObjectURL(blob);
				var reader = new FileReader();
				 reader.readAsDataURL(blob);
				 reader.onloadend = function() {
					var base64data = reader.result;

					$.ajax({
						url: "{{URL::to("/upload_image")}}",
						method: "POST",
						data: {image: base64data,  "_token": "{{ csrf_token() }}"},
						success: function(data){
							console.log(data);
							$modal.modal('hide');
							// $('#uploaded_image').attr('src', data);
							$('#profile_picture').val(data);
							//alert("success upload image");
						}
					  });
				 }
			});
		});

	});
</script> -->

</body>
</html>
