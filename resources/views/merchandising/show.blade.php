<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $product['name'] }} - Superfans Merch</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap CSS (optional if already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (required for carousel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f5f5;
        padding-top: 30px;
        color: #222;
      }
      
.swal2-show {
          border-radius:20px;
  background: #8a2be2;
  color: #fff !important;
  }
  .swal2-show button {
          border: 2px solid #409c40 !important;
    display: inline-block;
    margin-left: 10px;
        background: #5cb85c;
    color: #fff;
  }
   .swal2-show button:hover {
     background: #409c40 !important;
     border: 2px solid #409c40 !important;
  }
      .product-container {
        width: 55%;
        margin: auto;
        padding: 30px;
      }
      .product-image {
  width: 100%;
  max-width: 400px;
  border-radius: 10px;
  border: 1px solid #ccc;
  display: block;
  margin: 0 auto;
}

      .price-box {
        font-size: 1.5em;
        color: #fff;
        background: #333;
        border: 4px solid #000;
        padding: 12px;
        text-align: center;
        margin-top: 20px;
        position: relative;
      }
      .price-box span {
        font-size: 2rem;
      }
      .tag {
        font-size: 0.95em;
        color: #777;
        font-weight: 600;
      }
      .back-link {
        display: inline-block;
        margin-top: 30px;
        color: #000;
        border: 2px solid #000;
        padding: 10px 20px;
        text-decoration: none;
        transition: 0.3s;
      }
      .back-link:hover {
        background: #000;
        color: #fff;
      }
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
        
        
        /**SCROLLBAR COLOR **/
        
        	#fh5co-aside::-webkit-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-webkit-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-webkit-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-moz-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-moz-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-moz-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-o-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-o-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-o-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-ms-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-ms-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-ms-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}
      }
      
      @media (max-width: 600px) {
  .product-container {
    width: 90% ;
  }
  
  
        /**SCROLLBAR COLOR **/
        
        	#fh5co-aside::-webkit-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-webkit-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-webkit-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-moz-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-moz-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-moz-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-o-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-o-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-o-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-ms-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-ms-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-ms-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}
  
}
    </style>
    
    <style>
        .custom-carousel-icon {
    background-image: none !important;
    font-size: 40px;
    color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    border: 2px solid black;
    border-radius: 50%;
    background-color: white;
}

.carousel-control-prev .custom-carousel-icon::before {
    content: '‹'; 
    font-size: 30px;
}

.carousel-control-next .custom-carousel-icon::before {
    content: '›'; 
    font-size: 30px;
}

.btn-success:hover {
    background: green !important;
}



        /**SCROLLBAR COLOR **/
        
        	#fh5co-aside::-webkit-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-webkit-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-webkit-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-moz-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-moz-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-moz-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-o-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-o-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-o-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

			#fh5co-aside::-ms-scrollbar {
				width: 11px !important;
				/* width of the entire scrollbar */
			}

			#fh5co-aside::-ms-scrollbar-track {
				background: #f1f1f1 !important;
				/* color of the tracking area */
			}

			#fh5co-aside::-ms-scrollbar-thumb {
				background-color: #777;
				/* color of the scroll thumb */
				border-radius: 20px;
				/* roundness of the scroll thumb */
				/*border: 3px solid orange;*/
				/* creates padding around scroll thumb */
				border-right: 4px solid blueviolet;
			}

    </style>
    
    
	<style>
		.js-fullheight::-scrollbar {
			width: 11px;
			/* width of the entire scrollbar */
		}

		.js-fullheightl::-scrollbar-track {
			background: #f1f1f1;
			/* color of the tracking area */
		}

		.js-fullheight::-scrollbar-thumb {
			background-color: #777;
			/* color of the scroll thumb */
			border-radius: 20px;
			/* roundness of the scroll thumb */
			/*border: 3px solid orange;*/
			/* creates padding around scroll thumb */
			border-right: 4px solid blueviolet;
			height: 11px !important;
		}

		.js-fullheight::-webkit-scrollbar {
			width: 11px;
			/* width of the entire scrollbar */
		}

		.js-fullheight::-webkit-scrollbar-track {
			background: #f1f1f1;
			/* color of the tracking area */
		}

		.js-fullheight::-webkit-scrollbar-thumb {
			background-color: #777;
			/* color of the scroll thumb */
			border-radius: 20px;
			/* roundness of the scroll thumb */
			/*border: 3px solid orange;*/
			/* creates padding around scroll thumb */
			border-right: 4px solid blueviolet;
			height: 11px !important;
		}

		body::-scrollbar {
			width: 11px;
			/* width of the entire scrollbar */
		}

		body::-scrollbar-track {
			background: #f1f1f1;
			/* color of the tracking area */
		}

		body::-scrollbar-thumb {
			background-color: #777;
			/* color of the scroll thumb */
			border-radius: 20px;
			/* roundness of the scroll thumb */
			/*border: 3px solid orange;*/
			/* creates padding around scroll thumb */
			border-right: 4px solid blueviolet;
			height: 11px !important;
		}

		body::-webkit-scrollbar {
			width: 11px;
			/* width of the entire scrollbar */
		}

		body::-webkit-scrollbar-track {
			background: #f1f1f1;
			/* color of the tracking area */
		}

		body::-webkit-scrollbar-thumb {
			background-color: #777;
			/* color of the scroll thumb */
			border-radius: 20px;
			/* roundness of the scroll thumb */
			/*border: 3px solid orange;*/
			/* creates padding around scroll thumb */
			border-right: 4px solid blueviolet;
			height: 11px !important;
		}
	</style>
  </head>

  <body>
    <div class="product-container">
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
        <img src="{{ url('assets/images/' . $logo) }}" alt="Logo" class="mb-4" style="max-width: 200px; display: block; margin: 0 auto;" />
      </a>

      <h2 class="text-center mb-3">{{ $product['name'] }}</h2>
      <p class="text-center tag">Color: {{ $product['color'] }} | {{ $product['tag'] }}</p>

    @if(isset($product['extra_images']) && is_array($product['extra_images']) && count($product['extra_images']) > 0)
    <div id="carousel-{{ $product['slug'] }}" class="carousel slide mb-4">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/images/merch/' . $product['image']) }}" class="d-block w-100 product-image" alt="{{ $product['name'] }}">
            </div>
            @foreach($product['extra_images'] as $img)
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/merch/' . $img) }}" class="d-block w-100 product-image" alt="{{ $product['name'] }}">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $product['slug'] }}" data-bs-slide="prev">
    <span class="carousel-control-prev-icon custom-carousel-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $product['slug'] }}" data-bs-slide="next">
    <span class="carousel-control-next-icon custom-carousel-icon"></span>
</button>

    </div>
@else
    <img src="{{ asset('assets/images/merch/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image mt-3 mb-4" />
@endif

      <p style="margin-top: 10px !important; margin-bottom: 0px !important; width: fit-content; margin-left: auto; margin-right: auto; border: 5px solid black; color: #c3c3c3; background-color: #585858; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; padding-left: 4px; padding-right: 7px; padding-top: 9px; font-size: 14px; width: 100%; max-width: 400px; position: relative; overflow-x: hidden; overflow-y: hidden;">
                        <span style="width: 20px; height: 20px; background: #585858; position: absolute; z-index: 2; left: 0px;"></span>
                        <span style="width: 15px; height: 15px; display: inline-block; margin-right: 5px; z-index: 3; position: relative; left: 5px; top: -4px; font-size: 1.4em;">🛒</span>
                        <span style="display: inline-block; font-size:15px; width: 78%; position: relative; left: 4px;">
                            <marquee id="price-display" behavior="scroll" direction="left" scrollamount="5">
                          OFFER: {{ __('content.price') }}{{ $product['price'] }}.00{{ __('content.pricee') }}
                            </marquee>
                        </span>
                    </p>
      <input type="hidden" name="amount" id="amount" value="{{ $product['price'] * 100 }}" />
      
      <br /> <br />

      @if(!empty($product['description']))
      <div class="mt-4">
        <h5>Description</h5>
        <p>{{ $product['description'] }}</p>
      </div>
      @endif

<form id="payment-form" action="{{ route('merchandising.purchase') }}" method="post">
  @csrf
  <input type="hidden" id="amount" name="amount" value="{{ $product['price'] * 100 }}">
  <input type="hidden" name="product_id" value="{{ $product['slug'] }}" />

  @guest
  <div class="form-group required">
    <label for="email">Email Address</label>
    <input type="email" name="email" id="email" class="form-control" required />
  </div>
  @endguest

<div class="form-group required">
  <label for="country">Country</label>
  <select id="country" name="country" class="form-control country-select" required>
    <option value="">Select Country</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Brazil">Brazil</option>
    <option value="Brunei">Brunei</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cabo Verde">Cabo Verde</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Croatia">Croatia</option>
    <option value="Cuba">Cuba</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Eswatini">Eswatini</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Greece">Greece</option>
    <option value="Grenada">Grenada</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Honduras">Honduras</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran">Iran</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Laos">Laos</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libya">Libya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia">Micronesia</option>
    <option value="Moldova">Moldova</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montenegro">Montenegro</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar (Burma)">Myanmar (Burma)</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="North Korea">North Korea</option>
    <option value="North Macedonia">North Macedonia</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestine State">Palestine State</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Qatar">Qatar</option>
    <option value="Romania">Romania</option>
    <option value="Russia">Russia</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia">Saint Lucia</option>
    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia">Serbia</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Korea">South Korea</option>
    <option value="South Sudan">South Sudan</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syria">Syria</option>
    <option value="Taiwan">Taiwan</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania">Tanzania</option>
    <option value="Thailand">Thailand</option>
    <option value="Timor-Leste">Timor-Leste</option>
    <option value="Togo">Togo</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Vatican City">Vatican City</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Vietnam">Vietnam</option>
    <option value="Yemen">Yemen</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
  </select>
</div>

  <div class="form-group required">
    <label for="city">City</label>
    <input type="text" name="city" id="city" class="form-control" required />
  </div>

  <div class="form-group required">
    <label for="zip">ZIP Code</label>
    <input type="text" name="zip" id="zip" class="form-control" required />
  </div>

  <div class="form-group required">
    <label for="address">Shipping Address (with number and indications)</label>
    <input type="text" name="address" id="address" class="form-control"
      placeholder="e.g., 123 Main St, Apartment 4B, near Central Park" required />
  </div>

  <p>
    <img src="{{ asset('assets/images/cardesecurity.png') }}" style="width: 50px;" />
    Your payment will be processed securely through Redsys
  </p>

  <div class="form-group" style="position: relative;">
    <label>
      {{ __('auth.referrer') }}
      <span class="tooltip-container">
        ⓘ
        <span class="tooltip-text">{!! __('auth.referral_info') !!}</span>
      </span>
    </label>
    <input
      type="text"
      id="referred_influencer"
      name="referred_influencer"
      placeholder="{{ __('auth.referrer_username_placeholder') }}"
      class="form-control"
      autocomplete="off"
    />
    <input type="hidden" name="referred_influencer_id" id="referred_influencer_id" />
    <div id="influencer-suggestion-box"
      style="position: absolute; top: 100%; left: 0; right: 0; z-index: 10000;">
      <ul id="influencer-suggestions"
        style="list-style: none; padding: 0; background: #fff; display: none; max-height: 150px; overflow-y: auto;">
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="col-12 text-center">
      <button id="pay-button"
        class="btn btn-success"
        type="submit"
        style="padding-right: 22px !important; padding-left: 22px !important; background-color: limegreen;border-color: limegreen; color: #fff; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;font-size:1.17em;text-decoration:none;border: 3px solid green;border-radius: unset !important;">
        <span id="pay-text"><b>Pay {{ __('content.price') }}{{ $product['price'] }}.00{{ __('content.pricee') }} </b></span>
        <span id="pay-spinner"
          class="spinner-border spinner-border-sm ml-2 d-none"
          role="status"
          aria-hidden="true"></span>
      </button>
    </div>
  </div>
</form>


      <a href="{{ route('merchandising.index') }}" class="back-link" style="text-decoration:none !important;">← Back to Merchandising</a>
    </div>
    
<script>
  const allUsers = @json($influencers); 
</script>

<script>
  const influencerInput = document.getElementById('referred_influencer');
  const influencerSuggestionsBox = document.getElementById('influencer-suggestions');
  const influencerIdInput = document.getElementById('referred_influencer_id');

  influencerInput.addEventListener('input', function () {
    const query = influencerInput.value.trim().toLowerCase();
    influencerSuggestionsBox.innerHTML = '';
    influencerIdInput.value = ''; 

    if (query === "") {
      influencerIdInput.value = "";
      updatePriceBasedOnInfluencer(); 
    }

    if (query.length > 0) {
      const matches = allUsers.filter(user => user.username_URL.toLowerCase().includes(query));
      
      matches.forEach(user => {
        const li = document.createElement('li');
        li.style.padding = '5px 10px';
        li.style.cursor = 'pointer';
        li.style.display = 'flex';
        li.style.alignItems = 'center';
        li.style.gap = '6px';

        const nameSpan = document.createElement('span');
        nameSpan.textContent = user.username_URL;

        li.appendChild(nameSpan);

        if (user.verified) {
          const badge = document.createElement('img');
          badge.src = "https://live.superfanss.app/assets/images/verified.png";
          badge.alt = "Verified";
          badge.width = 18;
          badge.height = 18;
          badge.style.position = 'relative';
          badge.style.bottom = '0px';
          badge.style.marginLeft = '-5px';
          li.appendChild(badge);
        }

        li.addEventListener('click', function () {
          influencerInput.value = user.username_URL;
          influencerIdInput.value = user.id;
          influencerSuggestionsBox.style.display = 'none';
          updatePriceBasedOnInfluencer(); 
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
  const priceDisplay = document.getElementById('price-display');
  const amountInput = document.getElementById('amount');
  const originalPrice = {{ $product['price'] }};
  const originalAmount = {{ $product['price'] * 100 }};
  const payTxt = document.getElementById('pay-text'); 

  function updatePriceBasedOnInfluencer() {
    const influencerId = document.getElementById('referred_influencer_id').value;
       const discountedPrice = (originalPrice * 0.6).toFixed(2);  
   const discountedAmount = Math.round(originalAmount * 0.6);

    if (influencerId && influencerId !== "") {
      priceDisplay.innerText = `OFFER: {{ __('content.price') }}${discountedPrice}{{ __('content.price') }}`;
      amountInput.value = discountedAmount;
      payTxt.innerText = `Pay {{ __('content.price') }}${discountedPrice}{{ __('content.pricee') }}`;
    } else {
      priceDisplay.innerText = `OFFER: {{ __('content.price') }}${originalPrice.toFixed(2)}{{ __('content.price') }}`;
      amountInput.value = originalAmount;
     payTxt.innerText = `Pay {{ __('content.price') }}${originalPrice.toFixed(2)}{{ __('content.pricee') }}`;
    }
  }

  document.getElementById('referred_influencer').addEventListener('input', () => {
    setTimeout(updatePriceBasedOnInfluencer, 100);
  });
  document.getElementById('referred_influencer_id').addEventListener('change', updatePriceBasedOnInfluencer);
</script>

<script src="https://js.stripe.com/v3/"></script>
<script>
  const stripe = Stripe("{{ env('STRIPE_KEY') }}");
  const elements = stripe.elements();
  const cardElement = elements.create("card", { hidePostalCode: true });
  cardElement.mount("#card-element");

  const form = document.getElementById("payment-form");
  const cardHolderName = document.getElementById("card-holder-name");
  const payButton = document.getElementById("pay-button");
  const payText = document.getElementById("pay-text");
  const paySpinner = document.getElementById("pay-spinner");

//   cardHolderName.addEventListener("input", () => {
//     payButton.disabled = cardHolderName.value.trim() === "";
//   });

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    updatePriceBasedOnInfluencer();

    payButton.disabled = false;
    paySpinner.classList.remove("d-none");
    payText.textContent = "Processing...";

    const email = document.getElementById("email")?.value || "";

    const { paymentMethod, error } = await stripe.createPaymentMethod({
      type: "card",
      card: cardElement,
      billing_details: {
        name: cardHolderName.value,
        email,
      },
    });

    if (error) {
      Swal.fire("Payment Error", error.message, "error");
      resetPayButton();
      return;
    }

    const formData = new FormData(form);
    formData.append("payment_method_id", paymentMethod.id);
    formData.set("amount", amountInput.value); 

    try {
      const response = await fetch(form.action, {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: formData,
      });

      const data = await response.json();

      if (data.error) {
        Swal.fire("Server Error", data.error, "error");
        resetPayButton();
        return;
      }

      const result = await stripe.confirmCardPayment(data.client_secret, {
        payment_method: paymentMethod.id,
      });

      if (result.error) {
        Swal.fire("Card Confirmation Error", result.error.message, "error");
        resetPayButton();
        return;
      }

      if (result.paymentIntent?.status === "succeeded") {
        await confirmPurchase(result.paymentIntent.id);
      }
    } catch (err) {
      console.error(err);
      Swal.fire("Unexpected Error", err.message, "error");
      resetPayButton();
    }
  });

  async function confirmPurchase(paymentIntentId) {
    try {
      const body = {
        payment_intent_id: paymentIntentId,
        product_id: form.querySelector('input[name="product_id"]').value,
        user_id: form.querySelector('input[name="user_id"]')?.value || null,
        email: form.querySelector('input[name="email"]')?.value || null,
        amount: amountInput.value, // Current input
        referred_influencer: form.querySelector('input[name="referred_influencer"]')?.value || null,
        referred_influencer_id: form.querySelector('input[name="referred_influencer_id"]')?.value || null,
        shipping_country: form.querySelector('select[name="country"]')?.value || null,
        shipping_city: form.querySelector('input[name="city"]')?.value || null,
        shipping_zip: form.querySelector('input[name="zip"]')?.value || null,
        shipping_address: form.querySelector('input[name="address"]')?.value || null,
      };

      console.log("🛒 Sending to confirmPurchase:", body);

      const response = await fetch("{{ route('merchandising.confirm.purchase') }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}",
        },
        body: JSON.stringify(body),
      });

      const data = await response.json();

      if (data.success) {
        await Swal.fire({
          title: "Payment Successful!",
          text: "Thank you for your purchase! Check your email for details.",
          icon: "success",
          confirmButtonText: "OK",
          customClass: {
            popup: 'swal2-rounded',
            confirmButton: 'swal2-confirm'
          }
        });

        window.location.href = "{{ url('/merchandising') }}";
      } else {
        Swal.fire("Error", data.message || "Could not complete purchase.", "error");
        resetPayButton();
      }
    } catch (err) {
      Swal.fire("Error", "An error occurred during purchase confirmation.", "error");
      resetPayButton();
    }
  }

  function resetPayButton() {
    payButton.disabled = false;
    paySpinner.classList.add("d-none");
    payText.textContent = "Pay";
  }
</script>

    

  </body>
</html>
