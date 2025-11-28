<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>{{ __('auth.influencer_title') }}</title>
    <meta name="description" content="Best social and Streaming network for influencers and fans.">
    <meta name="keywords" content="Superfans, Super World, Onlyfans, Social Network, fans, influencers, model, streamer, tiktoker, youtuber">
    <meta name="author" content="D. Martín Herrada">

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

       <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">
    <style>
/* ---------------------------
  Reglas específicas para quitar "glow" / ring azul
  -- colocadas antes del resto para que sean fáciles de encontrar
----------------------------*/
a.btn {
  -webkit-tap-highlight-color: transparent; /* móvil */
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
  -webkit-appearance: none;
  appearance: none;
}

/* Forzar eliminación de outline/box-shadow de Bootstrap y UA */
a.btn,
a.btn:focus,
a.btn:active,
a.btn:visited,
a.btn:focus-visible,
a.btn:hover {
  outline: none !important;
  box-shadow: none !important;
  -webkit-box-shadow: none !important;
  border: none; /* si el glow viene de un border */
}

/* Si quieres mantener foco accesible solo para keyboard users,
   descomenta la regla siguiente y personaliza el estilo */
 /*
a.btn:focus-visible {
  outline: 3px solid rgba(255,153,0,0.95);
  outline-offset: 2px;
}
*/

/* ---------------------------
  Tu CSS original (copiado y ligeramente ajustado)
----------------------------*/
.container {
  width: 70%;
  margin-top: 40px;
  margin-bottom: 40px;
  padding: 30px 25px;
  border-radius: 6px;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #222;
}

.logo {
  display: block;
  max-width: 180px;
  margin: 0 auto 30px auto;
}

h2#influencerTitle {
  font-weight: 700;
  font-size: 2.2rem;
  text-align: center;
  margin-bottom: 20px;
  color: #000;
}

p {
  font-size: 1.1rem;
  line-height: 1.6;
  text-align: center;
  margin-bottom: 30px;
  color: #444;
}

p strong {
  color: #da1212;
  font-weight: 700;
}

.warning {
  display: flex;
  align-items: center;
  text-align: center;
  background-color: #fff4f4;
  border: 1px solid #da1212;
  padding: 12px 16px;
  border-radius: 4px;
  margin-bottom: 30px;
  color: #b71c1c;
  font-weight: 600;
}

.warning svg {
  fill: #da1212;
  width: 24px;
  height: 24px;
  margin-right: 10px;
  flex-shrink: 0;
}

.btn-group {
  display: flex;
  justify-content: center;
  gap: 15px;
}

.btn-back, .btn-confirm, .btn-business {
  padding: 12px 32px;
  font-size: 1.05rem;
  font-weight: 600;
  border-radius: 0;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-back {
  background-color: transparent;
  border: 3px solid #000 !important;
  color: #000;
}

.btn-back:hover{
  background-color: #000;
  color: #fff;
  text-decoration: none;
}
.btn-back:focus{outline:none !important;}
.btn-back:active{
            outline: none !important;
            box-shadow: none !important;}

.btn-confirm {
    border: 3px solid #409c40 !important;
  
    display: inline-block;
    margin-left: 1px;
        background: #5cb85c;
    color: #fff;
  font-size: 1.1rem !important;
    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;font-weight: 900 !important;
}

.btn-confirm:hover {
  background-color: #409c40 ;
  color: #fff;
}
.btn-confirm:focus {outline:none !important;}
.btn-confirm:active{
            outline: none !important;
            box-shadow: none !important;}

.btn-business {
    border: 3px solid #666 !important;
  
    display: inline-block;
    margin-left: 1px;
        background: #999;
    color: #fff;
}

.btn-business:hover {
    
  background-color: #666;
  color: #fff;
}
.btn-business:focus {outline:none !important;}
.btn-business:active{
            outline: none !important;
            box-shadow: none !important;}

/* Responsive tweaks */

@media (max-width: 776px) {

  .container {
  width: 90%;

}
}
@media (max-width: 576px) {
  .container {
    padding: 20px 15px;
  }

  .btn-group {
    flex-direction: column;
    gap: 12px;
  }

  .btn-back, .btn-confirm {
    width: 100%;
    padding: 14px 0;
  }

}

    </style>
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
  </head>
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
.dropdown-menu {
    display: none;
}

.dropdown-menu.show {
    display: block;
}

</style>
    <!-- no additional media querie or css is required -->
<div class="container">
  <a href="{{ url('/') }}">
       @php
    $locale = app()->getLocale(); // current app locale

    $logos = [
        'en' => 'Superworld-13.svg',
        'it' => 'Superworld-14.svg',
        'es' => 'Superworld-15.svg',
        'pt' => 'Superworld-15.svg',
        'ca' => 'Superworld-16.svg',
        'fr' => 'Superworld-17.svg',
        'de' => 'Superworld-18.svg',
    ];

    $logo = $logos[$locale] ?? 'Superworld-13.svg'; // fallback to English
@endphp

<img src="{{ url('assets/images/' . $logo) }}" alt="Superworld Logo" class="logo" />

  </a>

    <h2 id="influencerTitle">{{ __('auth.influencer_title') }}</h2>

    <p>
    {!! __('auth.influencer_subtitle') !!}

   
    </p>

    <div class="warning" role="alert" aria-live="polite" aria-atomic="true">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
        <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
      </svg>
      {{ __('auth.warning_message') }}
    </div>

    <div class="btn-group">
      <a href="{{ url('/creador') }}" class="btn btn-confirm">{{ __('auth.yes_im_popular') }}</a>
     <a href="{{ url('/business/register') }}" class="btn btn-business">{{ __('auth.soc_empresa') }}</a>
       <!--<a href="{{ url('/register') }}" class="btn btn-back">{{ __('auth.go_back') }}</a>-->
      
    </div>
   <div class="text-center mt-4">
                        <p style="color:#111 !important;font-size:0.9em !important;"><b>↖</b> {{ __('auth.back_text') }}
                            <a href="{{url('/register')}}" style="text-align: center;">
                                <span>{{ __('auth.back') }}</span>
                            </a>
                        </p>
                    </div>
 </div>





</body>
</html>
