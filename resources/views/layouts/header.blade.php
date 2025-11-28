@php $currentPath = request()->path(); @endphp
 @php
    $themeColor = '#5e3af1'; // default: yellow
    if (auth()->check()) {
        switch (auth()->user()->cover_color) {
            case 'purple': $themeColor = '#5e3af1'; break;
            case 'yellow': $themeColor = '#ffc83d'; break;
        }
    }
@endphp


<meta name="theme-color" content="{{$themeColor}}">

    <!-- Link to PWA Manifest -->
    <link rel="manifest" href="/site.webmanifest">
@if ($currentPath !== 'user/posts')
  <div id="loader" style="
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: white;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999999;
  ">
      <img src="{{ url('assets/images/' . $logo) }}" alt="Loading..." style="width: 59%;">
  </div>

  @if ($currentPath === 'user/feed')
    <script>
      const loader = document.getElementById('loader');
      const hasSeenLoader = sessionStorage.getItem('seen_influencer_feed_loader');

      if (hasSeenLoader) {
        loader.style.display = 'none';
      } else {
        sessionStorage.setItem('seen_influencer_feed_loader', 'true');
        window.addEventListener('load', () => {
          loader.style.transition = 'opacity 2.6s ease';
          loader.style.opacity = 0;
          setTimeout(() => loader.style.display = 'none', 10);
        });
      }
    </script>
  @else
    <script>
      window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        loader.style.transition = 'opacity 2.6s ease';
        loader.style.opacity = 0;
        setTimeout(() => loader.style.display = 'none', 10);
      });
    </script>
  @endif
@endif


<div 
    class="header_div" id="safety-personal-protactive-equipment-builder" style="position: absolute;width: 100%;z-index: 2;">

    <div class="container-fluid" >
        <nav class="navbar navbar-expand-lg navbar-light navbar_heading"
            >
            {{-- <a class="navbar-brand" href="/#home_section"><img src="{{ asset('assets/images/pngtree-logo-company-design-png-image_3588263.jpg')}}" alt="logo" style="width: 183px;margin-top: -39px;position: absolute;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            {{-- collapse navbar-collapse --}}
            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style="position: absolute;top: 10px;right: 0;list-style-type: none;">
                    

                    @if(Auth::check())
                    {{-- href="/logout" --}}
{{--                    <li class="nav-item mx-2">--}}
{{--                        <a  class="btn btn-danger"--}}
{{--                            style="border-radius: 20px;padding-right: 22px;padding-left: 22px;padding: 6px !important;"--}}
{{--                            href="/logout"><i class="fa fa-power-off" aria-hidden="true"></i></a>--}}
{{--                    </li>--}}
                    @else
                    <li class="nav-item mx-2">
                        <a  class="btn btn-primary"
                            style="border-radius: 20px;padding-right: 22px;padding-left: 22px;background: #004dff;"
                            href="/login">Login</a>

                        <a  class="btn btn-primary"
                            style="border-radius: 20px;padding-right: 22px;padding-left: 22px;background: #004dff;"
                            href="/register">Sign Up</a>
                    </li>
                
                    @endif

                </ul>

            </div>
        </nav>
    </div>
  

</div>