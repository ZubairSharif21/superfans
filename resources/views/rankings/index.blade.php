<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>Rankings</title>
    <meta name="description" content="Best social network for influencers and fans.">
    <meta name="keywords" content="Superfans, Superfans World, Onlyfans, Social Network, fans, influencers, model, streamer, tiktoker">
    <meta name="author" content="D. MartÃ­n Herrada">

    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

       <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">
	
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&family=BBH+Sans+Bogle&display=swap" rel="stylesheet">
    <style>
    
    ::-webkit-scrollbar {
  height: 11px;
  width: 11px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1; 
  border-radius: 20px;
  height: 110px !important;
}

::-webkit-scrollbar-thumb {
  background-color: #777;
  border-radius: 20px;
  border-right: 4px solid blueviolet; 
  height: 110px !important;
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
    padding: 20px 7px;
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




<style>
.language-dropdown {
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

.language-dropdown:hover .dropdown-menu {
    display: block;
}

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
    border: 3px solid #000 !important;
    outline: none;
    background: #fff;
    color:#000;
    border-radius: 0 !important;
}
.btn-dark:hover {
    background: #000;
    color: #fff;
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

<style>
.loader {
  display: inline-block;
  width: 16px;
  height: 16px;
  border: 2px solid #fff;
  border-top: 2px solid transparent;
  border-radius: 50%;
  animation: spin 0.6s linear infinite;
  margin-left: 8px;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
</style>

<style>
#scrollToTopBtn {
  position: fixed;
  bottom: 25px;
  left: 25px;
  z-index: 999;
  background-color: #000;
  color: #fff;
  border: 3px solid #000;
  padding: 2px 10px;
  font-size: 20px;
  cursor: pointer;
  display: none; /* Hidden by default */
  transition: opacity 0.3s ease-in-out;
}

#scrollToTopBtn:hover {
  background-color: #fff;
  color: #000;
}
</style>

<style>
.tooltip-container {
    position: relative;
    display: inline-block;
    cursor: help;
}

.tooltip-text {
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
    white-space: normal; 
    max-width: 350px;    
    width: max-content;  
    min-width: 200px;    
    word-wrap: break-word; 
}


.tooltip-container:hover .tooltip-text {
    visibility: visible;
    opacity: 1;
}
.tooltip-container .tooltip-text {
    visibility: hidden;
    opacity: 0;
}

.tooltip-container.show .tooltip-text {
    visibility: visible;
    opacity: 1;
}


@media screen and (max-width: 600px) {
  .tooltip-text {
    left: 80% !important;
    transform: translateX(-90%) !important;
    max-width: 300vw;
    min-width: unset;
    width: 200px;
    font-size: 12px;
  }
  h2#influencerTitle {
      font-size:25px !important;
  }
  .tooltip-container {
      bottom: 2px !important;
  }
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
</style>

<style>
    .modal_input::placeholder {
        color: white;
    }

    .modal_input,
    .modal_input:focus {
        border: 2px solid white;
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
    #tourModal .modal-dialog,
#tourModal .modal-content,
#tourModal .payment_modal {
    outline: none !important;
    border: none !important;
    box-shadow: none !important;
}

#tourModal *,
#tourModal *:focus,
#tourModal *:active {
    outline: none !important;
    box-shadow: none !important;
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



<div class="container">
    <h2 id="influencerTitle">🏆 {{ __('content.rankingtitle') }}<span class="tooltip-container" style="font-size: 20px; position: relative; bottom: 5px;">
        ⓘ
        <span class="tooltip-text">
  {!! __('content.rank_msg') !!}

        </span>
        
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
    </span> </h2>
<div class="btn-group" style="gap: 10px; margin-bottom: 10px;">
    <a href="#top" class="btn-rank btn-all">ALL</a>
    <a href="#superMagic" class="btn-rank">🦸🏻‍♀️</a>
    <a href="#superLeague" class="btn-rank">🪄</a>
    <a href="#diamondLeague" class="btn-rank">💎</a>
</div>

<div class="btn-group" style="gap: 10px;">
    <a href="#emeraldLeague" class="btn-rank">
        <img src="{{ url('assets/images/emerald.png') }}" alt="Emerald" style="width:24px;">
    </a>
    <a href="#goldLeague" class="btn-rank">🏅</a>
    <a href="#silverLeague" class="btn-rank">🥈</a>
    <a href="#bronzeLeague" class="btn-rank">🥉</a>
</div>
<br />

    <h2 id="superMagic">🦸🏻‍♀️ SUPER  LEAGUE <span style="font-size:0.38em;">(Top 11)</span></h2>
    @include('rankings.table', ['users' => $superMagic])
    <br>

    <h2 id="superLeague">🪄 MAGIC LEAGUE <span style="font-size:0.38em;">(1st – 50th)</span></h2>
    @include('rankings.table', ['users' => $superLeague])
    <br>

    <h2 id="diamondLeague">💎 DIAMOND LEAGUE <span style="font-size:0.38em;">(51st – 150th)</span></h2>
    @include('rankings.table', ['users' => $diamondLeague])
    <br>

    <h2 id="emeraldLeague">
        <img src="{{ url('assets/images/emerald.png') }}" alt="Emerald Icon" class="logo" style="width:42px;display:inline-block;position:relative; top: 11px;" />
        EMERALD LEAGUE <span style="font-size:0.38em;">(151st – 250th)</span>
    </h2>
    @include('rankings.table', ['users' => $emeraldLeague])
    <br>

    <h2 id="goldLeague">🏅 GOLD LEAGUE (251st – 500th)</h2>
    @include('rankings.table', ['users' => $goldLeague])
    <br>

    <h2 id="silverLeague">🥈 SILVER LEAGUE (501st – 1000th)</h2>
    @include('rankings.table', ['users' => $silverLeague])
    <br>

   <h2 id="bronzeLeague">🥉 BRONZE LEAGUE (1001st and beyond)</h2>
<div class="table-responsive">
    <table class="table table-striped text-center">
        <thead class="thead-light">
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th class="hide-on-mobile">Followers</th>
            </tr>
        </thead>
        <tbody id="bronze-table-body">
            @php
    if (!function_exists('formatFollowers')) {
        function formatFollowers($number) {
            $number = (int) $number;

            if ($number === 0) {
                return '0';
            } elseif ($number >= 1000000000) {
                return round($number / 1000000000, 1) . 'B';
            } elseif ($number >= 1000000) {
                return round($number / 1000000, 1) . 'M';
            } elseif ($number >= 1000) {
                return round($number / 1000, 1) . 'K';
            } else {
                return (string) $number;
            }
        }
    }
@endphp
            @foreach($bronzeLeague as $index => $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a class="profile_tag" href="/{{ $user->username_URL }}">
                            <img 
                                src="{{ $user->profile_picture && $user->profile_picture !== 'none' 
                                        ? asset('/assets/images/' . $user->profile_picture) 
                                        : asset('/assets/images/output-onlinepngtools (2).png') }}" 
                                alt="Profile" width="40" height="40" style="border-radius: 50%; object-fit: cover;">

                            <span class="mobile-p" style="margin-left: 10px; margin-right: auto; border: 5px solid black; background-color: #585858; color: #c3c3c3; padding: 9px 7px; font-size: 14px; font-family: monospace;">
                                @php $username = $user->username_URL; @endphp
                                <span class="inline-m" style="font-size:15px; width: 220px; position: relative; left: 4px;">
                                    @if(strlen($username) > 26)
                                        <marquee style="position: relative; top: 5px; width:99%" behavior="scroll" direction="left" scrollamount="5">{{ $username }}</marquee>
                                    @else
                                        <span style="width: 15px;height: 15px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;position: relative;left: 5px;top: 1px;"></span>  
                                        {{ $username }}
                                    @endif
                                </span>
                            </span>

                            <div class="show-on-mobile" style="display: block; font-size: 15px; color: gray; margin-left:10%;">
                                {{ formatFollowers($user->no_of_followers) }} Followers
                            </div>
                        </a>
                    </td>
                    <td class="hide-on-mobile">{{ formatFollowers($user->no_of_followers) }} Followers</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div style="text-align: center; margin-top: 10px;">
    <button id="load-more-bronze" data-offset="1020" class="btn btn-dark">SEE HIDDEN USERS</button>
</div>

</div>


</div>


   
   
 </div>

<!-- Tour Modal -->
<style>
    
    .hoverFlyer:hover{border:4px solid #000 !important;transition:0.5s;}
    .hoverFlyer:active{border:4px solid #000 !important;transition:0.5s;}
</style>
<div class="modal fade" id="tourModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

<div class="modal-content" style="background:#8a2be2;  box-shadow:none;">      <div class="modal-body payment_modal d-block"><br>
        <!--<img src="{{ url('assets/images/' . $logo) }}" alt="Superfans Logo" class="logo" />-->
        
        <h3 style="color:#fff;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;font-weight:900 !important;">✈️ {{  __('content.tourModalTitle') }}</h3>
        <p style="color:#fff;">{!!  __('content.tourModalDescription') !!} </p>
        
        <a href="#"><img src="{{ url('assets/images/VUELING_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" alt="Superfans Logo" class="logo hoverFlyer" style="display:inline-block; width:29%;margin-left:4px;margin-right:4px;border-radius:2px;border:4px solid #222;"/></a>
        <a href="#"><img src="{{ url('assets/images/American_Airlines_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" alt="Superfans Logo" class="logo hoverFlyer" style="display:inline-block; width:29%;margin-left:4px;margin-right:4px;border-radius:2px;border:4px solid #222;"/></a>
        <a href="#"><img src="{{ url('assets/images/IBERIA_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" alt="Superfans Logo" class="logo hoverFlyer" style="display:inline-block; width:29%;margin-left:4px;margin-right:4px;border-radius:2px;border:4px solid #222;"/></a>
        <!--<a href="#"><img src="{{ url('assets/images/RyanAir_Flyer_Aventura_para_ser_Famosos-SUPERMUNDO.png') }}" alt="Superfans Logo" class="logo hoverFlyer" style="display:inline-block; width:29%;margin-left:4px;margin-right:4px;border-radius:2px;border:4px solid #222;"/></a>-->
        
       
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function openTourModal() {
    $('#tourModal').modal('show');
}
</script>



<button id="scrollToTopBtn" title="Back to top">↑</button>

</body>

<script>
  const scrollBtn = document.getElementById("scrollToTopBtn");

  window.onscroll = function () {
    // Show button after scrolling down 200px
    scrollBtn.style.display = (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) 
      ? "block" : "none";
  };

  scrollBtn.addEventListener("click", function () {
    document.querySelector('.container').scrollIntoView({ behavior: 'smooth' });
  });
</script>



<script>
document.getElementById('load-more-bronze').addEventListener('click', function () {
    const btn = this;
    let offset = parseInt(btn.getAttribute('data-offset'));

    const originalText = btn.innerHTML;
    btn.innerHTML = `LOADING <span class="loader"></span>`;
    btn.disabled = true;

    fetch('/bronze/load-more?offset=' + offset)
        .then(response => {
            if (response.status === 204) {
                btn.style.display = 'none';
                return;
            }
            return response.text();
        })
        .then(html => {
            if (html) {
                document.querySelector('#bronze-table-body').insertAdjacentHTML('beforeend', html);
                offset += 20;
                btn.setAttribute('data-offset', offset);
            }
        })
        .finally(() => {
            btn.innerHTML = originalText;
            btn.disabled = false;
        });
});
</script>




</html>