

@if(Auth::check())



<div 
    class="header_div" id="safety-personal-protactive-equipment-builder" style="position: absolute;width: 100%;z-index: 2;">

    <div class="container-fluid" >
        <nav class="navbar navbar-expand-lg navbar-light navbar_heading"
            >



            <div class="" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" style="position: absolute;top: 10px;right: 0;list-style-type: none;">
                    

                    @if(Auth::check())
                    
{{--                    <li class="nav-item mx-2">--}}
{{--                        <a  class="btn btn-danger"--}}
{{--                            style="border-radius: 20px;padding-right: 22px;padding-left: 22px;padding: 6px !important;"--}}
{{--                            href="/logout"><i class="fa fa-power-off" aria-hidden="true"></i>--}}
{{--                            </a>--}}
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

@else 


<div 
    class="header_div" id="safety-personal-protactive-equipment-builder" style="position: absolute;width: 100%;z-index: 2;">

    <div class="container-fluid" >
        <nav class="navbar navbar-expand-lg navbar-light navbar_heading"
            >



           <div class="" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto" style="position: absolute; top: 10px; right: 0; list-style-type: none;">
        
        @isset($user)
            <li class="nav-item mx-2">
                @php
                    $username_URL = $user->username_URL;
                @endphp

                <a class="btn btn-danger login-btn-top"
                   style="border-radius: 20px; padding-right: 22px; padding-left: 22px; padding: 6px !important; background-color: #724abb; border-color: #724abb;"
                   href="{{ '/login?username=' . $username_URL }}">
                    <b>Login</b> | <i class="fa fa-power-off" aria-hidden="true"></i>
                </a>
            </li>
        @endisset

    </ul>
</div>

        </nav>
    </div>
  

</div>

@endif