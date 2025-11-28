
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Super World | {{Auth::user()->username_URL}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Superfans World - Best social network for influencers and fans" />
	<meta name="keywords" content="Superfans, Superfans World, Onlyfans, Social Network, fans, influencers, model, streamer, tiktoker" />
	<meta name="author" content="D. Martín Herrada" />

	    <link rel="icon" href="{{ url('assets/images/SUPERHEROINA.ico') }}" type="image/x-icon">
	<link rel="shortcut icon" type="image/jpg" href="{{url('assets/images/SUPERHEROINA.svg')}}"/>
	<link rel="icon" type="image/svg+xml" href="{{url('assets/images/SUPERHEROINA.svg')}}">

	<!--Favicon-->
	{{-- <link rel="icon" href="images/SUPERHEROINA.svg" type="image/png"/> --}}
  <!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	{{-- <link rel="shortcut icon" href="favicon.ico"> --}}

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('assets/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	<link rel="stylesheet" href="{{ asset('assets/css/rockwell_style.css') }}">

	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700;800;900&display=swap" rel="stylesheet">

	<!-- Modernizr JS -->
	<script src="{{ asset('assets/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	{{-- <style>
		#fh5co-aside .fh5co-footer {
			position: relative !important;
		}
	</style> --}}

	<link href='https://fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>

	<style>
		.streaming_anchor {
			/* color: rgba(0, 0, 0, 0.5) !important; */
			text-decoration: none !important;
			border: 0px !important;
			background-color: transparent !important;
		}
		.streaming_anchor:after {
			background-color: transparent !important;
		}

		@media screen and (max-width: 600px) {
			.username_li {
				font-size: 100% !important;	
			}
			
		}

		.row {
			/* display: flex; */
			flex-wrap: wrap;
		}



		.activated_dropdown {
			color: black;
		}

		.collapse.in {
			color: black;
		}
	
		#dropdownMenuButton.collapsed {
			color: rgba(0, 0, 0, 0.5);
		}
	

		.open {
			color: black;
		}


		@media only screen and (min-width: 767px) {

.modal::-scrollbar {
  width: 11px;               /* width of the entire scrollbar */
}

.modal::-scrollbar-track {
  background: #f1f1f1;        /* color of the tracking area */
}

.modal::-scrollbar-thumb {
  background-color: #777;    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  /*border: 3px solid orange;*/  /* creates padding around scroll thumb */
  border-right: 4px solid blueviolet;
  height: 11px !important;
}

.modal::-webkit-scrollbar {
  width: 11px;               /* width of the entire scrollbar */
}

.modal::-webkit-scrollbar-track {
  background: #f1f1f1;        /* color of the tracking area */
}

.modal::-webkit-scrollbar-thumb {
  background-color: #777;    /* color of the scroll thumb */
  border-radius: 20px;       /* roundness of the scroll thumb */
  /*border: 3px solid orange;*/  /* creates padding around scroll thumb */
  border-right: 4px solid blueviolet;
  height: 11px !important;
}

}
		
		.js-fullheight::-scrollbar {
				  width: 11px;               /* width of the entire scrollbar */
				}

				.js-fullheightl::-scrollbar-track {
				  background: #f1f1f1;        /* color of the tracking area */
				}

				.js-fullheight::-scrollbar-thumb {
				  background-color: #777;    /* color of the scroll thumb */
				  border-radius: 20px;       /* roundness of the scroll thumb */
				  /*border: 3px solid orange;*/  /* creates padding around scroll thumb */
				  border-right: 4px solid blueviolet;
				  height: 11px !important;
				}

				.js-fullheight::-webkit-scrollbar {
				  width: 11px;               /* width of the entire scrollbar */
				}

				.js-fullheight::-webkit-scrollbar-track {
				  background: #f1f1f1;        /* color of the tracking area */
				}

				.js-fullheight::-webkit-scrollbar-thumb {
				  background-color: #777;    /* color of the scroll thumb */
				  border-radius: 20px;       /* roundness of the scroll thumb */
				  /*border: 3px solid orange;*/  /* creates padding around scroll thumb */
				  border-right: 4px solid blueviolet;
				  height: 11px !important;
				}

				body::-scrollbar {
				  width: 11px;               /* width of the entire scrollbar */
				}

				body::-scrollbar-track {
				  background: #f1f1f1;        /* color of the tracking area */
				}

				body::-scrollbar-thumb {
				  background-color: #777;    /* color of the scroll thumb */
				  border-radius: 20px;       /* roundness of the scroll thumb */
				  /*border: 3px solid orange;*/  /* creates padding around scroll thumb */
				  border-right: 4px solid blueviolet;
				  height: 11px !important;
				}

				body::-webkit-scrollbar {
				  width: 11px;               /* width of the entire scrollbar */
				}

				body::-webkit-scrollbar-track {
				  background: #f1f1f1;        /* color of the tracking area */
				}

				body::-webkit-scrollbar-thumb {
				  background-color: #777;    /* color of the scroll thumb */
				  border-radius: 20px;       /* roundness of the scroll thumb */
				  /*border: 3px solid orange;*/  /* creates padding around scroll thumb */
				  border-right: 4px solid blueviolet;
				  height: 11px !important;
				}


				/* ::-webkit-scrollbar {
  
					background-color: #777;    
					border-radius: 20px;       
					border-bottom: 4px solid blueviolet;
					height: 11px !important;
				} */
				

				.control_panel_item:hover {
				    color: white !important;
					background: #da1212 !important;
					border: 2px solid #da1212 !important;
					transition: 0.3s;
				}

				.add_post_item:hover {
					color: white !important;
					background: #8a2be2 !important;
					border: 2px solid #8a2be2 !important;
					transition: 0.3s;
				}

				
				
				video {
					border-radius: 26px !important;
					border: 7px solid lightgray;
					width: 100%;
				}

				/* .dropdown {
					text-align: -webkit-center;
				} */

				.dropdown-menu {
					left: 0px !important;
					margin-left: auto !important;
					margin-right: auto !important;
				}

				@media only screen and (max-width: 500px){
					/*Small smartphones [325px -> 425px]*/
					.post_stats {
						font-size: 14px !important;
					}

				}
				

				.swal2-popup {
					font-size: 1.2rem !important;
				}
				.swal2-container {
					z-index: 100000000000000 !important;
				}

				.delete {
					cursor: pointer;			
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

				.swal2-confirm:hover {
					outline: 2px solid #7500A8 !important;
					color: white !important;
					background: transparent !important;
					transition: 0.3;
				}

				/* .swal2-confirm:hover */
				.swal2-confirm:hover.swal2-styled:hover.swal2-default-outline:hover {
					outline: 2px solid black !important;
					color: white !important;
					background: black !important;
					transition: 0.3;

				}



				
				.feed_posts_heading_p {
					width: fit-content;
					margin-left: auto;
					margin-right: auto;
					color: black !important;
					background: darkgray;
					padding: 5px;
					border-radius: 5px 5px 0px 0px !important;
					border: 7px solid lightgray;
					border-bottom: 3px solid lightgray;
					font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
					font-weight: bold;
				}

				.feed_posts_heading_img {
					max-width: 20px;
					border: 0px !important;
					margin: 0px;
					margin-right: 5px;
					border-radius: 35px;
    				background: white;
				}

				.swal2-styled {
					font-weight: bold !important;
				}

				.swal2-styled:hover {
					outline : 0px solid #6a0cc0 ;
					transition: 0.3;
				}




				.dropdown-item {
					padding: 6px 9px !important;
				}




/* 				
				::-scrollbar {
				  width: 11px;               
				  
				}

				::-scrollbar-track {
				  background: #f1f1f1;        
				  
				}

				::-scrollbar-thumb {
				  background-color: #777;    
				  border-radius: 20px;       
				  
				  border-bottom: 6px solid blueviolet;
				  height: 6px !important;
				  
				}

				::-webkit-scrollbar {
				  width: 11px;               
				  
				}

				::-webkit-scrollbar-track {
				  background: #f1f1f1;        
				  
				}

				::-webkit-scrollbar-thumb {
				  background-color: #777;    
				  border-radius: 20px;       
				  border-bottom: 6px solid blueviolet;
				  height: 6px !important;
				  
				} */


				
				


			.modal-open {
				padding-right: 0px !important;
			}

			.username_li:hover {
				color: black ;
			}

			#dropdownMenuButton:hover {
				color: black ;
				transition: 0.3s;
			}




			.influencer_search::-webkit-input-placeholder {
				color: black;
			}
			.influencer_search:-moz-placeholder {
				/* FF 4-18 */
				color: black;
				opacity: 1;
			}
			.influencer_search::-moz-placeholder {
				/* FF 19+ */
				color: black;
				opacity: 1;
			}
			.influencer_search:-ms-input-placeholder {
				/* IE 10+ */
				color: black;
			}
			.influencer_search::-ms-input-placeholder {
				/* Microsoft Edge */
				color: black;
			}
			.influencer_search::placeholder {
				/* modern browser */
				color: black;
			}






			@media screen and (max-width: 480px) {
				* {
					-webkit-user-select: none; 
					-moz-user-select: none; 
					-ms-user-select: none; 
					user-select: none; 
				}
			}
			
			
			.wrapper {
				color: black;
			}

			.collapse-div {
				margin-bottom: 2em !important;
			}

			#demo {
				margin-bottom: 2em !important;
			}
			
			.work-item {
				font-size: 1em !important;
			}



			.swal2-confirm:hover.swal2-styled:hover {
					outline: 2px solid #7500A8 !important;
					color: black !important;
					background: white !important;
					border: 0px !important;
				}




				


				.swal-modal {
					color: white !important;
					background: #8a2be2 !important;
					/* z-index: 17000000000 !important; */
				}

				.swal-overlay--show-modal {
					z-index: 17000000000 !important;
				}

				.swal-title {
					color: white !important;
				}

				.swal-text {
					color: white !important;
				}

				.swal-footer {
					text-align: center;
				}

				.swal-button--cancel {
					background: red;
					color: white;
					border-radius: 0px;
				}

				.swal-button--cancel:hover {
					background: #ed0c0c !important;
					color: white !important;
					transition: 0.3s;
				}

				.swal-button--defeat {
					background: white;
					color: black;
					border-radius: 0px;
				}

				.swal-button--defeat:hover {
					background: black !important;
					color: white !important;
					transition: 0.3s;
				}

				.swal-button--confirm {
					border-radius: 0px;
				}

				.swal-title {
					margin: 0px !important;
				}

				.swal-footer {
					margin: 0px !important;
				}
				
				.swal-modal {
					width: 400px;
				}

				@media only screen and (max-width: 550px){
					.swal-modal {
						width: calc(100% - 20px);
					}
				}


				.save_btn:hover {
					background: black !important;
					color: white !important;
					border-color: black !important;
					transition: 0.3s;
				}

				.swal-button__loader {
					display: none;
				}

				.fa-plus {
					-webkit-text-stroke: 1.2px;
				}

				@media only screen and (max-width: 767px) { 
					.network_icon {
						width: 24px !important;
						border: 3px solid transparent !important;
						margin-left: 8px;
					}

					.small_network_icon {
						width: 28px !important;
					}
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

.control_panel_item {
    margin-top: 10px !important;
}

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
		/* position: absolute;
		right: 10px;
		margin-top: -22px; */
	}

	@media only screen and (max-width: 767px) {
			.cropper_row {
				padding: 10px;
			}
		}

	/* .cropper-hide {
		width: 95% !important;
	} */


	@media only screen and (max-width: 767px) {
				.cropper-title {
					font-size: 1.5em !important;
				}

				.cropper-subtitle {
					font-size: 1em !important;
					font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;
				}

				.withdraw_btn {
					padding: 5px !important;
				}
			}

			


			@media only screen and (min-width: 767px) {
				.animated_username {
					width: 70% !important;
				}
			}

			@media only screen and (max-width: 767px) {
				.add_post_icon {
					right: 17px !important;
				}
			}

			.item .item-content a::after {
				display: none !important;
			}

			video:fullscreen{
				border: 0px !important;
			}
			
			.fa-plus {
				font-family: "Font Awesome 5 Free" !important;
				font-weight: 600 !important;
			}

	</style>

<style>
	.arrow {
		position: absolute;
		height: 2em;
		animation-duration: 7s;
		animation-timing-function: ease;
		animation-delay: 1.1s;
		animation-iteration-count: infinite;
		animation-direction: normal;
		animation-play-state: running;
		animation-name: arrows_animation;
		/* transform: translateX(55%); */
		transform: translateX(0%);
	}

	.arrow_small_username {
		position: absolute;
		height: 2em;
		animation-duration: 7s;
		animation-timing-function: ease;
		animation-delay: 1.1s;
		animation-iteration-count: infinite;
		animation-direction: normal;
		animation-play-state: running;
		animation-name: arrows_animation;
		/* transform: translateX(55%); */
		transform: translateX(0%);
	}
  
	@keyframes arrows_animation {
		0% {
			animation-timing-function: ease-out;
		padding-left: 24px !important;
		}
  
		100% {
			
			transform: translateX(-110%);
		padding-left: 24px !important;
		}
	}
	
		.world_after a {
  font-weight: 300 !important;
}

.world_after a:hover,
.world_after a:active {
  font-weight: 900 !important;
}

.fh5co-active.world_after a {
  font-weight: 900 !important;
}

  </style>

<style type="text/css">.btn-secondary{background-color: #fff !important; color: #000 !important; border: 3px solid #000 !important;} .btn-secondary:hover{background-color: #000 !important; color: #fff !important;}</style>

	</head>

<body>
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<!-- Stellar -->
	<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
	<!-- Counters -->
	<script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
	
	<script>
      document.addEventListener('DOMContentLoaded', function () {
        const dropdown = document.querySelector('.language-dropdown');
        if (dropdown) dropdown.remove();
      });
    </script>
	
	<!-- MAIN JS -->
	<script src="{{ asset('assets/js/main.js') }}"></script>

	

	<audio id="clickSound1" src="{{ asset('assets/music/open.mp3') }}"></audio>
	<script>
        document.querySelectorAll('.play-sound1').forEach(button => {
            button.addEventListener('click', () => {
                document.getElementById('clickSound1').play();
            });
        });
</script>

	<script>
		$(document).ready(function() {

			let touchstartX = 0
			let touchendX = 0

			const slider = document.getElementsByTagName("body")[0];

			function handleGesture() {

				var modal_opened = false;

				$('.modal').each(function(i, obj) {
					if($(this).hasClass('in')) {
						modal_opened = true;
					}
				});

			if (touchendX < touchstartX) {
				// alert('swiped left!')

				if ($(window).width() < 760 && modal_opened == false && (touchstartX - touchendX) > 100) {

				if ( $('body').hasClass('offcanvas') ) {

					$('body').removeClass('offcanvas');
					$('.js-fh5co-nav-toggle').removeClass('active');

				}

				}

			} 
			if (touchendX > touchstartX) {
				// alert('swiped right!')
				if ($(window).width() < 760 && modal_opened == false && (touchendX - touchstartX) > 100) {

					if ( !$('body').hasClass('offcanvas') ) {

						$('body').addClass('offcanvas');
						$('.js-fh5co-nav-toggle').addClass('active');
					}

				}

			} 
			}

			slider.addEventListener('touchstart', e => {
				touchstartX = e.changedTouches[0].screenX
			})

			slider.addEventListener('touchend', e => {
			touchendX = e.changedTouches[0].screenX
			handleGesture()
			})

		});
	</script>



<script>
	$(document).ready(function() {

		if (sessionStorage.getItem("scroll") === null) {
			// do nothing
			
		} else {
			
			setTimeout(function(){
				scroll = sessionStorage.getItem("scroll");
				$("#userModalCenter").animate({scrollTop:scroll},'50');
				sessionStorage.removeItem('scroll');
			}, 1000);
			
		}

		$('form').submit(function(e){
			
			if($("#userModalCenter").hasClass("in")) {
				e.preventDefault();

				var scroll = $("#userModalCenter").scrollTop();


				sessionStorage.setItem("scroll", scroll);


				e.currentTarget.submit();
			}

			if($("#networkurlModal").hasClass("in")) {
				e.preventDefault();

				// var scroll = $("#networkurlModal").scrollTop();


				sessionStorage.setItem("scroll", 500);


				e.currentTarget.submit();
			}


			
		});





		

		
		// $('.swal2-confirm').click(function(e){
			
		// 	e.preventDefault();
			
		// });


	});	
</script>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="z-index: 12121212121212;">
	<div class="modal-dialog modal-lg" role="document">
	  <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="cropper_close" data-dismiss="modal" aria-label="Close" style="position: absolute;
				right: 10px;
				background: transparent;
				border: 0px;">
					  <span aria-hidden="true">×</span>
				</button>
				<h5 class="modal-title cropper-title" id="modalLabel">Recorta la imagen para subirla</h5>
			  
			  <p class="cropper-subtitle" style="color: #666 !important; font-family: consolas !important; font-size: 0.7em;margin-top: 10px;">Estamos en <i>Beta Phase</i>. Pronto estará disponible subir imágenes HD en tu cover o foto de perfil.</p>
			</div>
			<div class="modal-body">
			  <div class="img-container">
				  <div class="row cropper_row">
					  <div class="col-md-8"  style="padding: 5px">
						  <img src="" id="sample_image" />
					  </div>
					  <div class="col-md-4">
						  <div class="preview"></div>
					  </div>
				  </div>
			  </div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-primary cropper_close" data-dismiss="modal">Cancel</button>
			  <button type="button" class="btn btn-secondary cropper_close" id="crop">Crop</button>
			</div>
	  </div>
	</div>
</div>



<script>

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
				  $("#userModalCenter").modal('hide');
				  $modal.modal('show');
				  setTimeout(function(){
						$("body").addClass("modal-open"); 
					}, 500);//wait 2 seconds
			};
			//var reader;
			//var file;
			//var url;
	
				if (files && files.length > 0) {
    reader = new FileReader();
    reader.onload = function (event) {
        const img = new Image();
        img.onload = function () {
            if (img.width < 250 || img.height < 250) {

                alert("❌ Image too small. Minimum size is 250x250.");
                return;
            }
            done(reader.result);
        };
        img.src = event.target.result;
    };
    reader.readAsDataURL(files[0]);
}
		});
	
		$modal.on('shown.bs.modal', function() {
   if (cropper) {
        cropper.destroy();
        cropper = null;
    }
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
				  width: 1095,
				  height: 1080,
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
		

		$(".cropper_close").click(function(){
			

			if ($(window).width() < 760) {
				
				setTimeout(function(){
					$("#modal").modal('hide');
					$("#userModalCenter").modal('show');
					
					setTimeout(function(){
						$("body").addClass("modal-open"); 
					}, 500);//wait 2 seconds

				}, 500);//wait 2 seconds
				
			} else {
			
				$("#modal").modal('hide');
				$("#userModalCenter").modal('show');
				
				setTimeout(function(){
					$("body").addClass("modal-open"); 
				}, 500);//wait 2 seconds
				
			}

			// $("#modal").modal('hide');
			// $("#userModalCenter").modal('show');
			
			// setTimeout(function(){
			// 	$("body").addClass("modal-open"); 
			// }, 500);//wait 2 seconds
			
		});


		setTimeout(function(){ 
			$('.arrow').css("transform","translateX(55%)");
			$('.arrow_small_username').css("transform","translateX(100%)"); 
		}, 7000);

	});
</script>

	</body>
</html>

