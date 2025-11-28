<div class="table-responsive">
<style>
    .profile_tag {
        display: block; 
    }

 
</style>

<style>
 .inline-m{
display: inline-block;
        }
    @media (max-width: 781px) {
        .hide-on-mobile {
            display: none !important;
        }
        .show-on-mobile {
            display: inline-block !important;
        }
    }

    @media (min-width: 781px) {
        .show-on-mobile {
            display: none !important;
        }
    }
    
     @media (max-width: 380px) {
       .mobile-p {
           position: relative;
           top: 13px !important;
           right: 27px;
       }
       .profile_tag{
           height: 120px !important;
       }
      .show-on-mobile {
            margin-top: 33px;
            position: relative;
            left: -25px;
        }
         .profile_tag img {
             margin-right: 30px !important;
         }
    }
</style>


    <table class="table table-striped text-center">
        <thead class="thead-light">
            <tr>
                <th>Rank</th>
                <th>Username</th>
                <th class="hide-on-mobile">Followers</th>
            </tr>
        </thead>
        <tbody>
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

            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a class="profile_tag" href="/{{ $user->username_URL }}">
                        <img 
                            src="{{ $user->profile_picture && $user->profile_picture !== 'none' 
                                    ? asset('/assets/images/' . $user->profile_picture) 
                                    : asset('/assets/images/output-onlinepngtools (2).png') }}" 
                            alt="Profile" 
                            width="40" 
                            height="40" 
                            style="border-radius: 50%; object-fit: cover;"
                        >
                                  <span class="mobile-p" style="margin-bottom: 0px !important; width: fit-content; margin-left: 10px; margin-right: auto; border: 5px solid black; color: #c3c3c3; background-color: #585858; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important; padding-left: 4px; padding-right: 7px; padding-top: 9px; padding-bottom: 9px; font-size: 14px; position: relative; overflow-x: hidden; overflow-y: hidden;">
                        @php
    $username = $user->username_URL;
@endphp


                        <span class="inline-m" style=" font-size:15px; width: 220px; position: relative; left: 4px;">
                         
                         
                                @if(strlen($username) > 26)
                                
        <marquee style="position: relative; top: 5px; width:99%" behavior="scroll" direction="left" scrollamount="5">{{ $username }}</marquee>
    @else
     <span style="width: 15px;height: 15px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;z-index: 3;position: relative;left: 5px;top: 1px;"></span>  
        {{ $username }}
    @endif
                        </span>
                
                              </span>
                  {{-- Followers for mobile --}}
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
