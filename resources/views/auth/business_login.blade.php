<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

       <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">
    <title>Login - Hello, {{ __('content.superfans_world') }}</title>
    <meta name="description" content="Best social network for influencers and fans.">
    <meta name="keywords" content="SUPER WORLD, Superfans, Superfans World, Onlyfans, Social Network, fans, influencers, model, streamer, tiktoker">
    <meta name="author" content="D. Martín Herrada">
<meta name="theme-color" content="#ffc83d">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=BBH+Sans+Bogle&display=swap" rel="stylesheet">

    <style>
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
        
.form-control {
    /*color: #495057;*/
    /*background-color: #fff;*/
    /*border-color: #80bdff;*/
    /*outline: 0;*/
    /*border: 2px solid black !important;*/
}
.form-control:focus {
    border: 1px solid black !important;
        color: black;
    background-color: #fff;
    
    outline: 0;
    box-shadow: 0 0 0 0 rgb(0 0 0 / 0%) !important;
}
   
   
   
   
   
   


    </style>
  </head>
  <body>


<div id="loader" style="
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
">@php
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
    <img src="{{ url('assets/images/' . $logo) }}" alt="Loading..." style="width: 59%;">
</div>



<script>
    window.addEventListener('load', function () {
        const loader = document.getElementById('loader');
        loader.style.transition = 'opacity 2.6s ease';
        loader.style.opacity = 0;
       setTimeout(() => loader.style.display = 'none', 400);
    });
</script>

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
    input::placeholder {
        font-size: 16px; 
    }
</style>

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
    top: -300px;
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

.language-dropdownz:hover .dropdown-menu {
    display: block;
    
}


button#register:hover{
background-color: #4712a6 !important;
transition: 0.5s !important;
}

button#sendlogin:hover{
background-color: green !important;
transition: 0.5s !important;
outline: none !important;
}
button#sendlogin:active{
    outline: none !important;
    box-shadow: none !important;
}
button#sendlogin:focus{
    outline: none !important;
    box-shadow: none !important;
}


/*BUTTON BUSINESS*/
   
    .btn-business {
    border: 3px solid #666 !important;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    display: inline-block;
    margin-left: 1px;
        background: #999;
    color: #fff;
  font-weight: 600;
}

.btn-business:hover {
  transition: 0.25s;
  background-color: #666;
  color: #fff;
}
.btn-business:focus {outline:none !important;}
.btn-business:active{
            outline: none !important;
            box-shadow: none !important;}
            
/* SUBTITULO SUPER ADS CENTER */        
a{
        text-decoration: none !important;}
h6 {
    font-family: "Anton", sans-serif !important;
    font-weight: 550 !important;
    font-style: normal !important;
    font-size: 19px;
        color: #333;
        margin-bottom: 21px;
        letter-spacing: -0.3;
        text-decoration: none !important;
}
h6:hover {
        display: block;
        text-decoration: none !important;
}


</style>
    <!-- no additional media querie or css is required -->
<div class="container">
    <div class="row justify-content-center align-items-center" style="height:90vh">
        <div class="col-lg-5">
            <div class="card p-4 " style="border-radius: 30px;border: 0;padding-top: 0px;">
                <div class="card-body" style="padding-top: 0px;">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        {{-- <h2 class="mb-3" style="text-align: center">{{ __('auth.Login_title') }} :</h2> --}}
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
    <img src="{{ url('assets/images/' . $logo) }}" style="width: 54%;margin-bottom: 2px;">
    <h6>SUPER ADS CENTER</h6>
</a>

                        </div>
                        <h1 class="mb-3" style="text-align: center;color: #212529;margin-bottom: 0.5rem !important;">{{ __('auth.Login_title') }}</h1>
                        <p style="color:black;text-align: center;">{{ __('auth.LoginBusiness_des') }}</p>
                        <div class="form-group">
                            <input id="email" type="email" placeholder="{{ __('auth.enter_email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @if ($errors->has('email'))
    <div class="invalid-feedback">
        {{ $errors->first('email') }}
    </div>
@endif

                        </div>
                        <div class="form-group">
                            
                            <input id="password" type="password" placeholder="{{ __('auth.enter_pass') }}" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <a href="https://live.superfanss.app/password/reset">{{ __('auth.Login_forgotpass') }}</a>

                        <button type="submit" class="btn btn-business" style="padding-right: 11px !important; padding-left: 11px !important; color: #fff; text-decoration:none;;margin-left: auto;display: block;font-size: 1.1em !important; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;margin-top: 10px;border-radius:0px !important;">{{ __('auth.Login_btn') }}<!--<font style="width:11px; height:11px;background:#00e172;border-radius:45px;color:#00e172;font-size:0.83em; margin-left: 4px;">..</font>--></button>
                    </form>
                    <div class="text-center mt-4">
                        <p>{{ __('auth.Login_have_account') }}
                        <a href="{{url('business/register')}}" style="text-align: center;">
                            <span>{{ __('auth.Login_create_btn') }}</span>
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

 
@if(isset($_GET['username']))
    {{-- @dd($_GET['username']) --}}
@else
    @if(session()->has('other_user_username'))
        @php
            Session::forget('other_user_username');
        @endphp
    @endif
@endif




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>