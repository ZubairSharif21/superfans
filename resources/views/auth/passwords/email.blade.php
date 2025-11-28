<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password - Superfans World</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/jpg" href="{{ url('assets/images/SUPERHEROINA.svg') }}"/>
    <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">

    <style>
        input {
            height: 45px;
            border: 1px solid black !important;
            font-size: 20px !important;
            font-weight: 100 !important;
            border-radius: 0px !important;
        }
        .btn-outline-primary {
            color: #da1212;
            border: 2px solid #da1212;
            border-radius: 0px;
        }
        .btn-outline-primary:hover,
        .btn-outline-primary:focus,
        .btn-outline-primary:active {
            color: #fff !important;
            background-color: #da1212 !important;
            border-color: #da1212 !important;
            box-shadow: none !important;
        }
        .form-control:focus {
            border: 1px solid black !important;
            background-color: #fff;
            box-shadow: none !important;
        }
    </style>
  </head>
  <body>

@php
    $currentLocale = app()->getLocale();
@endphp

<div class="language-dropdownz">
    <button class="dropdown-toggle">
        <img src="{{ $currentLocale === 'en' ? asset('assets/images/euflag.png') : asset('assets/images/spainflag.png') }}" 
             alt="{{ $currentLocale }}" 
             style="width: 20px; height: 20px;">
    </button>
    <div class="dropdown-menu">
        @foreach(['en', 'es'] as $locale)
            @if($locale !== $currentLocale)
                <a href="{{ route('lang.switch', $locale) }}">
                    <img src="{{ $locale === 'en' ? asset('assets/images/euflag.png') : asset('assets/images/spainflag.png') }}" 
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

.language-dropdownz:hover .dropdown-menu {
    display: block;
}

.custom-status-message {
    background-color: #d4edda; 
    color: #155724; 
    border: 1px solid #c3e6cb;
    padding: 15px 20px;
    border-radius: 5px;
    margin: 15px auto;
    max-width: 600px;
    text-align: center;
    font-size: 16px;
    font-family: sans-serif;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}


</style>

<div class="container">
    <div class="row justify-content-center align-items-center" style="height:90vh">
        <div class="col-lg-5">
            <div class="card p-4" style="border-radius: 30px; border: 0;">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="text-center">
                            <a href="https://superfans.world/">
                                <img src="{{ url('assets/images/Superfans Titulo-01.svg') }}" style="width: 56%;">
                            </a>
                        </div>

                        <h1 class="mb-3 text-center" style="color: #212529;">{{ __('auth.Reset_title') }}</h1>
                        <p class="text-center" style="color:black;">{{ __('auth.Reset_des') }}</p>

                     @if (session('status'))
    <div class="custom-status-message">
        {{ session('status') }}
    </div>
@endif


                        <div class="form-group">
                            <input id="email" type="email" placeholder="{{ __('auth.enter_email') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-outline-primary btn-block" style="font-size: 20px;">
                            {{ __('auth.Reset_btn') }}
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <a href="{{ route('login') }}">{{ __('auth.Reset_back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
