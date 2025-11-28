<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Merchandasing 👕</title>
    <meta name="description" content="Best social network for influencers and fans.">
    <meta name="keywords" content="Superfans, Superfans World, Onlyfans, Social Network, fans, influencers, model, streamer, tiktoker">
    <meta name="author" content="D. MartÃƒÆ’Ã†â€™Ãƒâ€šÃ‚Â­n Herrada">
    
    <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">

	<!--Favicon-->
	{{-- <link rel="icon" href="images/SUPERHEROINA.svg" type="image/png"/> --}}
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



    <style>
    /* WebKit-based browsers (Chrome, Safari, Edge) */
::-webkit-scrollbar {
  height: 11px;
  width: 11px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1; /* optional: light background */
  border-radius: 20px;
}

::-webkit-scrollbar-thumb {
  background-color: #777;
  border-radius: 20px;
  border-right: 4px solid blueviolet; /* for horizontal scrollbars */
  /* border: 3px solid orange; */ /* optional alternative */
}

.container {
  width: 100% !important;
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
  font-size: 1rem;
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

.btn-back, .btn-confirm {
  padding: 12px 32px;
  font-size: 1.1rem;
  font-weight: 600;
  border-radius: 0;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-back {
  background-color: transparent;
  border: 3px solid #000;
  color: #000;
}

.btn-back:hover, .btn-back:focus {
  background-color: #000;
  color: #fff;
  text-decoration: none;
}

.btn-confirm {
    border: 3px solid #409c40 !important;
  
    display: inline-block;
    margin-left: 1px;
        background: #5cb85c;
    color: #fff;
}

.btn-confirm:hover, .btn-confirm:focus {
  background-color: #409c40 ;
  color: #fff;
}

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
   margin-bottom: 40px;
   flex-wrap: nowrap !important;
  }

  .btn-back, .btn-confirm {
    width: 100%;
    padding: 14px 0;
  }

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
    top: -50px;
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


</style>

<style>
    
.btn-group {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

.btn-rank {
    border: 3px solid black;
    background: white;
    color: black;
    padding: 6px 0;
    text-decoration: none;
    font-size: 1rem;
    font-weight: bold;
    text-align: center;
    box-sizing: border-box;
    transition: all 0.2s ease-in-out;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 90px;
}

.btn-dark {
    border: 3px solid black !important;
    outline: none;
    background: #000;
}
.btn-dark:hover {
    background: #fff;
    color: #000;
    border: 3px solid #000;
}
.btn-dark:focus {
    box-shadow: none !important;
}
/* Mobile tweaks */
@media (max-width: 600px) {
    .btn-rank {
        padding: 8px 0;
        font-size: 0.9rem;
        width: 90px; 
    }
}

.btn-rank:hover {
    background: black;
    color: white;
    text-decoration: none;
}

.btn-all {
    background: #232121;
    color: #fff;
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

<img src="{{ url('assets/images/' . $logo) }}" alt="Superfans Logo" class="logo" />

  </a>

    <h2 id="influencerTitle">Merchandasing...👕</h2>



<div class="btn-group" style="gap: 10px; margin-bottom: 10px;">
        <a href="#top" class="btn-rank btn-all">👙</a>
        <a href="#hoodies" class="btn-rank">🧥</a>
        <a href="#shirt" class="btn-rank">👕</a>
</div>

<div class="btn-group" style="gap: 10px;">
        <a href="#caps" class="btn-rank">🧢</a>
       <a href="#socks" class="btn-rank">🧦</a>
        <a href="#cups" class="btn-rank">☕</a>
       </div>
    
    
<div class="container py-5">
<h2 style="font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; text-align: left !important; font-size: 1.29em;">
    
 {!! __('content.mar_head') !!}

</h2>


<br><br>

<div class="d-flex flex-wrap justify-content-center">
    @foreach($products as $product)
    @php
    $seen = [];
@endphp

     @php
        $category = '';

        if (Str::contains(strtolower($product['name']), 'top')) $category = 'tops';
        elseif (Str::contains(strtolower($product['name']), 'cap')) $category = 'caps';
        elseif (Str::contains(strtolower($product['name']), 'hoodie')) $category = 'hoodies';
        elseif (Str::contains(strtolower($product['name']), 'shirt')) $category = 'shirt';
        elseif (Str::contains(strtolower($product['name']), 'cup')) $category = 'cups';
        elseif (Str::contains(strtolower($product['name']), 'suck')) $category = 'socks';
    @endphp
    
    
        <a href="{{ route('merchandising.show', $product['slug']) }}" target="_blank" style="text-decoration:none !important; color:#111;">
            <article id="influencerDestacado" style="display: inline-block; width: 247px; border: 1px solid #444; background-color: #f1f1f1; border-radius: 24px; padding: 9px; text-align: left; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; margin-bottom: 11px; margin-right: 11px; position: relative;">
                <img src="{{ asset('assets/images/merch/' . $product['image']) }}"
     alt="{{ $product['name'] }}"
     style="width: 100%;
            border-top-left-radius: 19px;
            border-top-right-radius: 19px;
            border: 1px solid #444;
            {{ isset($product['height']) ? 'height: ' . $product['height'] . ';' : '' }}">

                <div style="position: relative; width: 100%; margin: 0 auto;"  @if (!in_array($category, $seen)) 
            id="{{ $category }}" 
            @php $seen[] = $category; @endphp 
        @endif>
                    <div style="margin-top:15px">
                        <b style="font-size: 1.1em; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; color: #111;">{{ $product['name'] }}</b>
                        <font style="font-size:0.74em; color: #999;"> | {{ $product['color'] }}</font><br>
                        <b style="font-size: 0.80em; color: #999;  position: relative; bottom: 7px;">{{ $product['tag'] }}</b>
                    </div>
                    
                    <p style="margin-top: 10px !important; margin-bottom: 0px !important; width: fit-content; margin-left: auto; margin-right: auto; border: 5px solid black; color: #c3c3c3; background-color: #585858; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; padding-left: 4px; padding-right: 7px; padding-top: 9px; font-size: 14px; width: 75%; position: relative; overflow-x: hidden; overflow-y: hidden;">
                        <span style="width: 20px; height: 20px; background: #585858; position: absolute; z-index: 2; left: 0px;"></span>
                        <span style="width: 15px; height: 15px; display: inline-block; margin-right: 5px; z-index: 3; position: relative; left: 5px; top: -4px; font-size: 1.4em;">🛒</span>
                        <span style="display: inline-block; font-size:15px; width: 78%; position: relative; left: 4px;">
                            <marquee behavior="scroll" direction="left" scrollamount="5">
                                OFFER: {{ __('content.price') }}{{ $product['price'] }}.00{{ __('content.pricee') }}
                            </marquee>
                        </span>
                    </p>
                </div>
            </article>
        </a>
    @endforeach
</div>


</div>


   
   
 </div>





</body>
</html>