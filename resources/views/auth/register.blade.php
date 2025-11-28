<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>{{ __('auth.create_account_title') }}</title>
    <meta name="description" content="Best social network for influencers and fans.">
    <meta name="keywords" content="Super World, Superfans, Onlyfans, Social Network, fans, influencers, model, streamer, tiktoker">
    <meta name="author" content="D. Martín Herrada">
<meta name="theme-color" content="#ffc83d">

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
        .btn-outline-primary-fan {
            /*color: #222;
            border: 2px solid #222;
            border-radius: 0px;
            padding-bottom: 6px !important;
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;font-weight: 900 !important;*/
            padding-right: 11px !important; padding-left: 11px !important; background-color: #333;color: #fff; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;text-decoration:none;border: 3px solid #111;margin-left: auto;display: block;border-radius:0px !important;font-size: 1.1em !important;font-weight:900;
        }
        .btn-outline-primary-fan:hover {
            color: #fff !important;
            /*-webkit-background-color: #222;
            -moz-background-color: #222;
            background-color: #222;
            border-color: #222;*/
            background-color: #111 !important;
            transition: 0.5s !important;
        }
        .btn-outline-primary-fan:active {
            /*color: #fff;
            -webkit-background-color: #222 !important;
            -moz-background-color: #222 !important;
            background-color: #222 !important;
            border-color: #222 !important;
            border: 2px solid #222;*/
            outline: none !important;
        }
        .btn-outline-primary-fan:focus {
            /*color: #fff;
            -webkit-background-color: #222;
            -moz-background-color: #222;
            background-color: #222;
            border-color: #222;*/
            outline: none !important;
            box-shadow: none !important;
        }
        input {
            border-radius: 0px !important;
        }



        .btn-outline-primary-creator {
            /*color: #8a2be2;
            border: 2px solid #8a2be2;
            background: white;
            border-radius: 0px;
            padding-bottom: 6px !important;
            margin-bottom: 7px;
            font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;font-weight: 900 !important;*/
            padding-right: 11px !important; padding-left: 11px !important; background-color: #724abb;border-color: #724abb ; color: #fff; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;text-decoration:none;border: 3px solid #4712a6;margin-left: auto;display: block;border-radius:0px !important;font-size: 1.1em !important;font-weight:900;
        }
        .btn-outline-primary-creator:hover {
            color: #fff !important;
            /*-webkit-background-color: #8a2be2;
            -moz-background-color: #8a2be2;
            background-color: #8a2be2;
            border-color: #8a2be2;*/
            background-color: #4712a6 !important;
            transition: 0.5s !important;
        }
        .btn-outline-primary-creator:active {
            /*color: #fff;
            -webkit-background-color: #8a2be2 !important;
            -moz-background-color: #8a2be2 !important;
            background-color: #8a2be2 !important;
            border-color: #8a2be2 !important;*/
            outline: none !important;
            /*border: 2px solid #da1212;*/
        }
        .btn-outline-primary-creator:focus {
           /* color: #fff;
            -webkit-background-color: #8a2be2;
            -moz-background-color: #8a2be2;
            background-color: #8a2be2;
            border-color: #8a2be2;*/
            outline: none !important;
            box-shadow: none !important;
        }

        .form-control:focus {
            border: 1px solid rgb(0, 162, 255) !important;
                color: rgb(0, 162, 255);
            background-color: #fff;
            
            outline: 0;
            box-shadow: 0 0 0 0 rgb(0 0 0 / 0%) !important;
        }
        /* .btn:hover, .btn:focus,.btn:active {
            outline: none !important;
            box-shadow: none;
            padding-bottom: 6px !important;
        } */

@media (max-width: 500px) {
    .card-body {
        padding: 0 !important;
    }
    .p-4 {
       padding: 0 !important; 
    }
    .col-6 {
    padding-right: 8px !important;
    padding-left:  8px !important;
    }
}
.dropdown-menu {
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
    background-color: #f0f0f0;
}



</style>
    <!-- no additional media querie or css is required -->
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:90vh">
        <div class="col-lg-5">
            <div class="card p-4 mb-5 mt-3" style="border-radius: 30px;border: 0;">
                <div class="card-body">
              <form method="POST" id="form_register" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="role" value="user">
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
    <img src="{{ url('assets/images/' . $logo) }}" style="width: 50%;margin-bottom: 14px; ">
</a>

    </div>
    <h1 class="mb-3" style="text-align: center;color: #212529;margin-bottom: 0.5rem !important;">{{ __('auth.register_title') }}</h1>
    <p style="color:black;text-align: center;">{{ __('auth.choose_account_type') }}</p>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a type="button" href="{{url('/creador/confirm')}}" id="sendlogin" class="btn-outline-primary-creator btn " style="display: block;font-size: 20px;margin-left: auto;margin-right: auto;">{{ __('auth.creator') }}</a>
            </div>
            <div class="col-6">
                <a type="button" href="{{url('/fan')}}" id="sendlogin" class="btn-outline-primary-fan btn " style="display: block;font-size: 20px;padding-left: 20px;padding-right: 20px;margin-left: auto;margin-right: auto;">{{ __('auth.fan') }}</a>
            </div>                  
        </div>
    </div>

    <div class="text-center mt-4">
        <p>{{ __('auth.already_registered') }}
            <a href="{{url('/login')}}" style="text-align: center;">
                <span>{{ __('auth.Login_btn') }}</span>
            </a>
        </p>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    
<script>
    $(document).ready(function() {

    //    $(document).on("click", ".select2-results__option select2-results__option--selectable", function() {
    //         //alert(this.val());
    //         alert("hello");
    //     });


    $(".js-example-basic-multiple").change(function () {
                var items = $(this).select2("data");
                 console.log("items"+items);
                // console.log("items length"+items.length);

                // if(items.length > 3) {
                //     alert("You can add maximum 3 networks");
                //     return false;
                // }

                if (items.length > 2) {
                    // Find every unselected option and disable them
                    $(this).find('option').not(':selected').attr('disabled','disabled');
                } else {
                    // Enable all options
                    $(this).find('option').removeAttr('disabled');
                }
                

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
                    alert("Name is required");
                    return false;
                }

                if($("#surname").val() == "") {
                    alert("Surname is required");
                    return false;
                }

                if($("#email").val() == "") {
                    alert("Email is required");
                    return false;
                }

                if($("#nationality").val() == "") {
                    alert("Nationality is required");
                    return false;
                }


                if($("#Choose_username_or_URL").val() == "") {
                    alert("Username is required");
                    return false;
                }



                var password = $("#password").val();

                var password_confirm = $("#password-confirm").val();

                if(password != password_confirm) {
                    alert("Password not matched");
                } else if(password.length < 8) {
                    alert("Password should be greater than 8 characters");
                } else {
                    
                    var email = $("#email").val();

                    

                    $.ajax({
                        url: '{{URL::to('/check_duplicate_email')}}',
                        type: 'GET',
                        data: { 'email':email},
                        success: function(response)
                        {
                            // if(response == "email not exists") {


                            //     $("#form_register").submit();
                            // } else {
                            //     alert("email already exists");
                            // }

                            if(response == "email exists") {
                                alert("email already exists");
                            } else {
                                $("#form_register").submit();
                            }


                        }
                    });

                    


                }


            });

    });
</script>




</body>
</html>