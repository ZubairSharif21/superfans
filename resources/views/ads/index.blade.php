<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Super Ads Center</title>
    <meta name="description" content="Manage all your Superworld ads in one place.">
    <meta name="keywords" content="Superworld, Ads, Campaigns, Tools">
    <meta name="author" content="Super World">

      <link rel="icon" href="{{ url('assets/images/office_logo.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/office_logo.png')}}"/>
    <link rel="icon" type="image/svg+xml" href="{{url('assets/images/office_logo.png')}}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=BBH+Sans+Bogle&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=BBH+Sans+Bogle&display=swap" rel="stylesheet">



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- Popper (required for Bootstrap 4 modals) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">-->
<style>
    label {
        margin-right: 10px;
    }

    .custom-file {
        margin-top: 10px;
        margin-bottom: 10px;
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

    @media only screen and (max-width: 500px) {
        .post-modal input[type=file] {
            width: 50%;
        }

        /* .post-modal button{
            display: flex;
            padding: 5px;
            flex-wrap: wrap;
            visibility:visible;
        } */
    }
    .turn_btn:hover {
        background: #4712a6 !important;
        border: 3px solid #4712a6 !important;
    }
      body {
        background: #f9f9f9;
        font-family: Arial, sans-serif;
        margin: 0;
      }

      /* Sidebar */
      .sidebar {
        background: #fff;
        color: #000;
        /*padding: 20px;*/
        padding-top: 20px;
        border-right: 4px solid rgba(0, 0, 0, 0.65);
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        width: 256px;
        overflow-y: auto;
      }
      .sidebar h6 {
        margin-bottom: 15px;
        margin-top: 1px;
        text-align: center;
        letter-spacing: -0.3;
        font-size: 17px;
        color: #333;
        /*font-family:impact, Arial, sans-serif !important;*/
        font-family: "Anton", sans-serif !important;
        font-weight: 550 !important;
        font-style: normal !important;
        }
      .sidebar a {
        display: block;
        color: #777;
        padding: 12px 45px;
        text-decoration: none;
        border-bottom: 2px solid rgba(0, 0, 0, 0.65);
        font-weight: 700;
        font-size: 13.8pt;
        
        font-family:Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
      }
      .sidebar a:hover {
        background: #f0f2f5;
        border-radius: 5px;
      }
    

      /* Footer links in sidebar */
      .sidebar .footer-links {
        margin-top: 60px;
        font-size: 0.8em;
        padding: 0 20px;
      }
      
      .footer-links a {
        border-bottom: 0 !important;
        padding: 9px 17px !important;
        font-size: 0.92rem !important;
      }

      /* Main content */
      .main {
        padding: 30px;
        margin-left: 240px; /* offset for fixed sidebar */

      }
      h2#pageTitle {
        font-weight: 700;
        font-size: 1.8rem;
        margin-bottom: 20px;
      }
      
      
      .ad-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
      }
      .ad-card {
        border: 6px solid #c3c3c3;
        border-radius: 20px;
        background: #fff;
        padding: 20px;
        color: #111;
        cursor: pointer;
        transition: all 0.1s ease-in-out;
        height: 180px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        font-family:Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
      }
      .ad-card h4 {
        font-weight: bold;
        font-size: 1.1rem;

      }
      .ad-card p {
        margin-top: 8px;
        font-size: 0.9rem;
        color: #555;
        font-weight: 550;
        font-family: Helvetica, Arial, sans-serif !important;
      }
      .ad-card:hover {
        background: #000;
        color: #fff;
        text-decoration: none;
        border: 6px solid #000;
      }
      .ad-card:hover p {
        color: #fff;
      }
      a {
       text-decoration: none !important;
       
      }
      .ad-card {
          text-align: center;
      }
      
      .upper-links a:hover {
          padding-top: 20px;
          padding-bottom: 20px;
          color: #fff;
          background: #5C3DCC;
          border-radius: 0 !important;
      } 
      .side_logo:hover {
          background: #fff !important;
      }
      
      .redlabel{
          border: 2px solid #d91e33 !important;
          background: #fef4f3 !important;
          color: #d91e33;
          border-radius: 7px !important;
          padding: 11px 30px;
          font-family:Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
          font-weight: 600;
          display: flex;
          align-items: center; /* Centra los elementos verticalmente */
          /* Opcional: para centrar también horizontalmente */
          justify-content: center; 
          /* Necesario para que el centrado sea visible (por ejemplo, altura de la página) */
          /*height: 47px; */
          width:86.5%;
          margin-bottom: 47px !important;
              }
              
      .redlabel p{
          width:83%;
        }    
      .redlabel h2{
          width:2%;
          font-size: 2.3em;
          position: relative;
          top: -4px;
          left: -7px;
        }
      
      #redlabelButton{
        
        font-weight: 550;
        font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
        border: 3px solid #000;
        background: #fff;
        padding: 7px 11px;
        color: #111;
        margin-left:25px;
          }
        #redlabelButton:hover{
            background: #000;
            color: #fff;
            transition: 0.5s;
        }  
        .field {
  display: flex;
  align-items: center;
  gap: 16px;
}

input[type="range"] {
  width: 35%;
  background: linear-gradient(90deg, #4f46e5 0%, #4f46e5 var(--percent), #ddd var(--percent), #ddd 100%);
  border-radius: 6px;
  appearance: none;
  outline: none;
  
    padding-top: 6px;
}

input[type="range"]::-webkit-slider-thumb {
  appearance: none;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: white;
  border: 2px solid #4f46e5;
  cursor: pointer;
  margin-top: -5px;
}

/*.value {*/
/*  font-variant-numeric: tabular-nums;*/
/*  min-width: 80px;*/
/*}*/


.close-modal-btn {
    position: absolute;
    top: 12px;
    right: 16px;
    font-size: 26px;
    color: #aaa;
    background: none;
    border: none;
    cursor: pointer;
    z-index: 1000;
    transition: .2s;
}

.close-modal-btn:hover {
    color: #fff;
    transform: scale(1.12);
}
/*.close-modal-btn {*/
/*    border-radius: 50%;*/
/*    padding: 2px 10px;*/
/*}*/




.tooltip-container {
    position: relative;
    display: inline-block;
    cursor: help !important;
}

.tooltip-container:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
    background: #333;
    color: white;
    font-size: 12px;
    width: 350px;
    padding: 20px;
    border-radius: 10px;
}
.tooltip-container .tooltip-text {
    visibility: hidden;
    opacity: 0;
}

.tooltip-container.show .tooltip-text {
    visibility: visible;
    opacity: 1;
    background: #333;
    color: white;
    font-size: 12px;
    width: 350px;
    padding: 20px;
    border-radius: 10px;
}

@media screen and (max-width: 600px) {
  .tooltip-text {
    left: 80% !important;
    transform: translateX(-90%) !important;
    max-width: 300vw;
    min-width: unset;
    width: 200px;
  }
  h2#influencerTitle {
      font-size:25px !important;
  }
  .tooltip-container {
      bottom: 2px !important;
  }
}


/**/
.tooltip-container {
    position: relative;
    display: inline-block;
}

.tooltip-text {
    position: absolute;
   
}

/* Triangle pointer */
.tooltip-text::after {
    content: "";
    position: absolute;
   }
   
   
   
   /* PUTTON GREEN PAY*/
.continue-btn {
      padding: 11px !important; background-color: limegreen;border-color: limegreen; color: #fff; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;text-decoration:none;border: 3px solid green;margin:0 auto;display: block;font-size: 1.1em !important; margin-top: 10px;font-weight:900 !important;border-radius:0px !important;
}

.continue-btn:hover {
background-color: green !important;
transition: 0.11s !important;
outline: none !important;
cursor:pointer;
}

.continue-btn:active{
    outline: none !important;
    box-shadow: none !important;
}
.continue-btn:focus{
    outline: none !important;
    box-shadow: none !important;
}
.selectPost {
  width: 75px;
  height: 75px;
  background:white;
  border:5px solid #000;
  border-radius:8px;
  cursor:pointer;
  transition:.25s;
}
.selectPost:hover {
  background:#bbbbbb;
}
.selectPost.selected {
  border-color:#00ff3c;
  background:#9effb5;
}



.cancel-btn {
     padding-top: 7px !important;padding-bottom: 7px !important;padding-left: 14px !important;padding-right: 14px !important; background-color: #000;border-color: #fff; color: #fff; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;text-decoration:none;border: 2px solid #fff;margin:0 auto;display: block;font-size: 1.1em !important; margin-top: 10px;font-weight:900 !important;border-radius:0px !important;
}

.cancel-btn:hover {
    background: #b51628;
    border-color: #b51628;
    color: #fff;
    transition: 0.11s !important;
    
}
.cancel-btn:active{
    outline: none !important;
    box-shadow: none !important;
}
.cancel-btn:focus{
    outline: none !important;
    box-shadow: none !important;
}


    </style>
  </head>
  <body>

<div class="sidebar">
      <a class="side_logo" href="{{ url('#') }}">
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

<img src="{{ url('assets/images/' . $logo) }}" alt="Supermon Logo" class="logo" />
  <h6>SUPER ADS CENTER</h6>
  </a>

 <div class="upper-links">
  <a href="#"> Create Campaign</a>
  <a href="#"> My Ads</a>
  <a href="#"> Locations</a>
  <a href="#"> Potential Clients</a>
  <a href="#"> Inform Ads</a>
  <a href="#"> More Tools</a>
 </div>
  <div class="footer-links">
    <a href="#">🔍 Search</a>
    <a href="#">⚙️ Configuration</a>
    <a href="#">❓ Help</a>
<a href="{{ route('buisness.logout') }}">⏻ Logout
</a>
  </div>
</div>

<!-- Main Panel -->
<div class="main">
  @if ($errors->any())
    <div class="alert alert-danger mt-2" id="modalErrors">
        <ul style="margin:0; padding-left:18px; text-align:left;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <div class="redlabel">
          <h2>⚠</h2>
          <p>Para empezar una Campaña de Publicidad en SUPER ADS CENTER, deberás completar toda la información personal o de representación y fiscal. Declara si eres una persona física, empresa o agencia representante.</p>
          <a href="#" id="redlabelButton">Configuración</a>
      </div>
   
  
  
  <div class="ad-grid">
  <!--<a href="{{ route('ads.type', 'promote-post') }}" class="ad-card">-->
      <a href="#" class="ad-card" data-type="Post or Followers in SW" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'promote-post') }}" data-ad-id="1" data-audience="650000"
>

    📢🦸🏻‍♀️
    <h4>Promote a SUPERWORLD Post</h4>
    <p>Boost your SUPERWORLD Content to reach more fans.</p>
  </a>
<a href="#" class="ad-card" data-type="Post or Followers in SW" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'promote-post') }}" data-ad-id="2" data-audience="650000"
>
    🌐🦸🏻‍♀️
    <h4>More Followers on SUPERWORLD Profile</h4>
    <p>Boost your SUPERWORLD Profile to reach more fans.</p>
  </a>

<a href="#" class="ad-card" data-type="Cards in SW" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'messages') }}" data-ad-id="3" data-audience="150000"
>
    ✉️
    <h4>Receive More Cards</h4>
    <p>Button that drive users to message you in your SUPERWORLD inbox.</p>
  </a>
  


<a href="#" class="ad-card" data-type="Instagram / TikTok / Youtube" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'instagram') }}" data-ad-id="4" data-audience="560000"
>
    📷
    <h4>Promote Instagram Content</h4>
    <p>Boost your Instagram posts directly from Super Ads Center.</p>
  </a>
<a href="#" class="ad-card" data-type="Instagram / TikTok / Youtube" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'instagram') }}" data-ad-id="5" data-audience="560000"
>
    🎶
    <h4>Promote TikTok Content</h4>
    <p>Boost your Instagram posts directly from Super Ads Center.</p>
  </a>
<a href="#" class="ad-card" data-type="Twitch" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'instagram') }}" data-ad-id="6" data-audience="115000"
>
    👾
    <h4>Promote Twitch Content</h4>
    <p>Boost your Twitch streams posts directly from Super Ads Center.</p>
  </a>
<a href="#" class="ad-card" data-type="Instagram / TikTok / Youtube" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'instagram') }}"  data-ad-id="7" data-audience="560000"
>
    🔴
    <h4>Promote Youtube Content</h4>
    <p>Boost your Instagram posts directly from Super Ads Center.</p>
  </a>
  
<a href="#" class="ad-card" data-type="Website Ads" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'website-visits') }}" data-ad-id="8" data-audience="920000"
>
    🛒
    <h4>Get More Amazon Sales</h4>
    <p>Drive people to visit your Amazon list or landing page through ads.</p>
  </a>
  
  <a href="#" class="ad-card" data-type="Website Ads" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'website-visits') }}" data-ad-id="8" data-audience="920000"
>
    🎙️
    <h4>Get More Spotify Reproductions</h4>
    <p>Drive people to visit your Spotify music list through ads.</p>
  </a>
  
<a href="#" class="ad-card" data-type="Website Ads" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'website-visits') }}" data-ad-id="8" data-audience="920000"
>
    🌍
    <h4>Get More Website Visits</h4>
    <p>Drive people to visit your website or landing page through ads.</p>
  </a>

<a href="#" class="ad-card" data-type="Calls" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'calls') }}" data-ad-id="9" data-audience="75000"
>
    📞
    <h4>Receive More Calls</h4>
    <p>Create an ad that encourages your audience to call you directly.</p>
  </a>

<a href="#" class="ad-card" data-type="WhatsApp" data-min="15" data-max="5000" data-url="{{ route('ads.type', 'whatsapp') }}" data-ad-id="10" data-audience="92000">
    🟢
    <h4>Get More WhatsApp Messages</h4>
    <p>Run an ad with a button that lets users send you messages on WhatsApp.</p>
  </a>

 
<a href="#" class="ad-card" data-type="Formulary" data-min="75" data-max="25000" data-url="{{ route('ads.type', 'clients-form') }}" data-ad-id="11" data-audience="300000">
    
    📝
    <h4>Get More Potential Clients</h4>
    <p>Create a Formulary that collects contact details from potential clients.</p>
  </a>
  
<a href="#" class="ad-card" data-type="Super Video Banner" data-min="500" data-max="40000" data-url="{{ route('ads.type', 'website-visits') }}" data-ad-id="12" data-audience="1380000">
    🪄🎬
    <h4>Super Video</h4>
    <p>Reproduce a full screen video. Only for big companies.</p>
  </a>
</div>
</div>
<!-- ADS PRICE MODAL -->

<<!-- ADS PRICE MODAL -->
<div class="modal fade" id="priceModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
<div class="modal-content" style="background: #1f1d1d; border: 7px solid #111 !important; color:#fff; border-radius:18px; position:relative;">
  
  <button type="button" class="close-modal-btn" data-dismiss="modal" aria-label="Close">✖</button>

  <div class="modal-body px-5 py-5 text-center">


        <h2 id="priceTitle" style="font-weight:800; font-size:28px;"></h2>
        <!--<p id="priceRange" style="font-size:17px; color:#c9c9c9; margin-bottom:28px;"></p>-->

  <form action="{{ route('ads.pay') }}" method="POST" style="text-align:center; color:white;" id=ads_pay_form>
      
                                @csrf

       
<input type="hidden" name="amount" id="amountInput">
<input type="hidden" name="payment_type" value="one_time">


                   <input type="hidden" name="ad_id" id="adInput">

                                <input type="hidden" name="influencer_id" value="{{ $user->id }}">
                                
                                <br>
                                                                <div style="margin: 20px 0;">
                                    <p style="margin: 0; font-size: 1.1em;">
                                        {!!__('content.textAdsModal')!!}
                                    </p>
                                </div>
                                
       <!--                         <input type="number" id="userPrice" class="form-control text-center"-->
       <!--placeholder="Enter investment"-->
       <!--min="1" step="1"-->
       <!--style="font-size:20px; padding:16px; border-radius:10px;">-->
       <div class="field" style="justify-content:center; margin-bottom:25px;">
  <label for="amount" style="font-size:20px; margin-right:0px;">Amount</label>

<input
  id="amountSlider"
  type="range"
  step="1"
  aria-label="Selecciona la cantidad en dólares"
  style="width:35%;"
/>


  <div class="value" id="amountDisplay" style="font-size:22px; text-align:left;">
    $15
  </div>

    <span class="tooltip-container" 
            style="font-size:15px; cursor:pointer; font-weight: 400; color: #ffd335;position:relative;left:-7px;">
        ⓘ
        <span class="tooltip-text">
          {!! __('content.ads_price_text') !!}
        </span>
      </span>
        <div class="value" id="estimatedAudience" style="font-size:22px; text-align:left;">
    
  </div>
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
                                

                                <!-- Hidden URL -->
        
            <input type="hidden" name="ad_url" id="redirectURL">
<button class="continue-btn">
  Empezar campaña 📊
</button>


<button type="button" class="cancel-btn"
        data-dismiss="modal"
        style="font-size:18px;">
  CANCEL
</button>
        <!--<button class="btn btn-light font-weight-bold w-100 mt-4 py-3"-->
        <!--        style="font-size:18px; border-radius:10px;" -->
           
        <!--        >-->
        <!--  CONTINUE-->
        <!--</button>-->

        <!--<button type="button" class="btn mt-3 w-100"-->
        <!--        data-dismiss="modal"-->
        <!--        style="background:none; border:1px solid #555; color:#aaa; border-radius:10px;">-->
        <!--  CANCEL-->
        <!--</button>-->
                            </form>


       

      </div>
    </div>
  </div>
</div>

<!-- SUPERWORLD FOLLOWERS MODAL (100% FINAL VERSION) -->
<div class="modal " id="followersModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="
        background:#191516;
        border-radius:18px;
        border:7px solid #000;
        color:white;
        position:relative;
        font-family: Arial, sans-serif;
    ">

      <!-- CLOSE BUTTON -->
      <button type="button" class="close-modal-btn" data-dismiss="modal"
        style="position:absolute; right:18px; top:16px; font-size:28px; background:none; border:none; color:#ccc; cursor:pointer;">
        ✖
      </button>

      <div class="modal-body text-center px-4" style="padding-top:45px;">

        <!-- TITLE -->
        <h2 id="followersModalTitle" style="font-weight:900; font-size:29px; margin-bottom:22px;">
          📢 More Followers on SUPERWORLD Profile
        </h2>

        <form id="followersForm">

          <!-- AD NAME -->
          <input type="text" placeholder="Choose a name for your Ad" name="ad_name"
            id="adNameInput"
            style="width:85%; font-size:20px; border-radius:4px; border:2px solid #000; padding:10px 15px; margin-bottom:35px;">

          <!-- SELECT POST -->
          <h4 style="font-size:23px; font-weight:800; margin-bottom:18px;">Select a post:</h4>

          <div id="postList" style="display:flex; justify-content:center; gap:18px; margin-bottom:18px;">
            <div class="selectPost" data-id="1"></div>
            <div class="selectPost" data-id="2"></div>
            <div class="selectPost" data-id="3"></div>
            <div class="selectPost" data-id="4"></div>
            <div class="selectPost" data-id="5"></div>
          </div>

          <input type="hidden" name="post_id" id="selectedPost">

          <!-- SHOW POSTS BUTTON -->
          <button type="button"
            style="font-size:18px; font-weight:700; background:#ddd; color:#000; border:none;
                   padding:8px 22px; border-radius:4px; margin-bottom:10px;">
            Show + Posts
          </button>

          <p style="font-size:14px; margin-bottom:35px;">
            The post will show a Banner of<br> "Follow" or "Subscribe"
          </p>

          <!-- AMOUNT -->
          <div style="display:flex; align-items:center; justify-content:center; gap:12px; margin-bottom:15px;">
            <span style="font-size:21px; font-weight:900;">Amount</span>
            <input id="amountSlider" type="range" min="15" max="5000" value="15"
              style="width:34%; cursor:pointer;">
            <span id="amountDisplay" style="font-size:21px; font-weight:900;">$15</span>
            <span style="font-size:21px;">👥 : <span id="audienceDisplay">2250</span></span>
          </div>

          <input type="hidden" name="amount" id="amountInput">

          <p style="font-size:15px; margin-bottom:25px; color:#9ce89c;">
            <img src="assets/images/credit_card.png" style="width:40px; margin-right:4px;">
            Your credit card payments will always be safe.
          </p>

          <label style="font-size:15px; display:block; margin-bottom:20px;">
            <input type="checkbox" id="termsCheckbox" required style="margin-right:6px;">
            I agree to the <a href="#" style="color:#b30fff;">Terms and Conditions</a>
          </label>

          <button type="submit"
            style="padding:12px 32px; background:#00c12c; border:3px solid #007f1d; color:white;
                   font-size:20px; font-weight:900; cursor:pointer; margin-bottom:12px;">
            Empezar campaña 📊
          </button>

          <button data-dismiss="modal" type="button"
            style="background:#000; border:2px solid #fff; color:#fff;
                   padding:7px 18px; cursor:pointer; font-size:16px; font-weight:900;">
            CANCEL
          </button>

          <input type="hidden" name="ad_id" id="followersAdId">
          <input type="hidden" name="ad_url" id="followersRedirectURL">

        </form>
      </div>
    </div>
  </div>
</div>
<script>
    // open modal
function openFollowersModal(adId, title, url, min, max, audience) {
  $("#followersAdId").val(adId);
  $("#followersRedirectURL").val(url);
  $("#followersModalTitle").text("📢 " + title);

  $("#amountSlider").attr("min", min).attr("max", max).val(min);
  $("#amountDisplay").text("$" + min);
  $("#audienceDisplay").text(Math.round(min * (audience / 15)));
  $("#amountInput").val(min);

  $("#followersModal").modal("show");
}

// slider update
document.getElementById("amountSlider").addEventListener("input", function () {
  let val = this.value;
  document.getElementById("amountDisplay").textContent = "$" + val;
  document.getElementById("audienceDisplay").textContent = Math.round(val * 150);
  document.getElementById("amountInput").value = val;
});

// post selection
document.querySelectorAll(".selectPost").forEach(box => {
  box.addEventListener("click", function() {
    document.querySelectorAll(".selectPost").forEach(b => b.classList.remove("selected"));
    this.classList.add("selected");
    document.getElementById("selectedPost").value = this.dataset.id;
  });
});

// form submit (example redirect)
document.getElementById("followersForm").addEventListener("submit", function (e) {
  e.preventDefault();
  if (!document.getElementById("termsCheckbox").checked) return;
  console.log("Ad Name:", adNameInput.value);
  console.log("Post ID:", selectedPost.value);
  console.log("Amount:", amountInput.value);
});
openFollowersModal(2, "More Followers on SUPERWORLD Profile", "/ads/followers", 15, 5000, 2250);

</script>
<script>
let selectedMin = 0, selectedMax = 0, selectedTitle = "";

let selectedAudienceRate = 0;




$(".ad-card").click(function(e) {
    e.preventDefault();

    let adId = $(this).data("ad-id");
    let url  = $(this).data("url");

    selectedTitle = $(this).find("h4").text();
    selectedMin   = $(this).data("min");
    selectedMax   = $(this).data("max");
    selectedAudienceRate = $(this).data("audience");

    $("#adInput").val(adId);

    if (!adId) {
        console.error("❌ Missing data-ad-id on card");
        return;
    }




$.get("/ads/check/" + adId, function(response) {
    console.log("hasPaid", response.paid);

    if (response.paid) {
        window.location.href = url;
        return;
    }
$("#amountSlider")
    .attr("min", selectedMin)
    .attr("max", selectedMax)
    .val(selectedMin);

updateSlider(); // refresh formatting + gradient

    // show modal
    $("#priceTitle").text("📢 " + selectedTitle);
    $("#priceRange").html(`Allowed price range: <b>$${selectedMin}</b> — <b>$${selectedMax}</b>`);
    $("#userPrice").attr("min", selectedMin).attr("max", selectedMax).val("");
    $("#redirectURL").val(url);

    $("#priceModal").modal("show");
});

    // $.get("/super-ads/check/" + adId, function(hasPaid) {
    // console.log("hasPaid",hasPaid)
    //     if (hasPaid == true || hasPaid == 1) {
    //         // Already purchased → skip modal
    //         window.location.href = "/super-ads/create/" + adId;
    //         return;
    //     }

    //     // If NOT paid → show modal
    //     $("#priceTitle").text("📢 " + selectedTitle);
    //     $("#priceRange").html(`Allowed price range: <b>$${selectedMin}</b> — <b>$${selectedMax}</b>`);
    //     $("#userPrice").attr("min", selectedMin).attr("max", selectedMax).val("");
    //     $("#redirectURL").val(url);

    //     $("#priceModal").modal("show");
    // }).fail(function() {
    //     alert("Server error checking ad payment. Please try again.");
    // });

});

// function confirmPrice() {
//     let price = $("#userPrice").val();
//     let url = $("#redirectURL").val();

//     if (!price || price < selectedMin || price > selectedMax) {
//         alert("Price must be between $" + selectedMin + " and $" + selectedMax);
//     }
//         return;

//     // window.location.href = url + "?price=" + price;
// }
$("#userPrice").on("input", function () {
    $("#amountInput").val($(this).val());
});


</script>

<script>
    const slider = document.getElementById("amountSlider");
const display = document.getElementById("amountDisplay");
const hidden = document.getElementById("amountInput");

function formatCurrency(num) {
  return "$" + Number(num).toLocaleString("en-US");
}

function updateSlider() {
  const min = Number(slider.min);
  const max = Number(slider.max);
  const val = Number(slider.value);
  const percent = Math.round(((val - min) / (max - min)) * 100) + '%';

  slider.style.setProperty('--percent', percent);
  display.textContent = formatCurrency(val);
  hidden.value = val;
  slider.setAttribute("aria-valuenow", val);

  if (selectedAudienceRate > 0) {
      let estimated = Math.round((val / 1000) * selectedAudienceRate);
      document.getElementById("estimatedAudience").textContent =
          `👥: ${estimated.toLocaleString()} `;
  }
}


slider.addEventListener("input", updateSlider);
updateSlider();

</script>
        <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".tooltip-container").forEach(function (el) {
        el.addEventListener("click", function (e) {
            // close other tooltips
            document.querySelectorAll(".tooltip-container").forEach(function (other) {
                if (other !== el) other.classList.remove("show");
            });
            // toggle current
            el.classList.toggle("show");
            e.stopPropagation();
        });
    });

    // close if clicked outside
    document.addEventListener("click", function () {
        document.querySelectorAll(".tooltip-container").forEach(function (el) {
            el.classList.remove("show");
        });
    });
});
</script>
</body>
</html>