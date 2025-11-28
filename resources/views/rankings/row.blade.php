<tr>
<td>{{ $index + ($offset - 1020) + 5 }}</td>

    <td>
        <a class="profile_tag" href="/{{ $user->username_URL }}">
            <img 
                src="{{ $user->profile_picture && $user->profile_picture !== 'none' 
                        ? asset('/assets/images/' . $user->profile_picture) 
                        : asset('/assets/images/output-onlinepngtools (2).png') }}" 
                width="40" height="40" style="border-radius: 50%; object-fit: cover;">

            <span class="mobile-p" style="margin-left: 10px; margin-right: auto; border: 5px solid black; background-color: #585858; color: #c3c3c3; padding: 9px 7px; font-size: 14px; font-family: monospace;">
                <span class="inline-m" style="font-size:15px; width: 220px; position: relative; left: 4px;">
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
                    @if(strlen($user->username_URL) > 26)
                        <marquee style="position: relative; top: 5px; width:99%" behavior="scroll" direction="left" scrollamount="5">{{ $user->username_URL }}</marquee>
                    @else
                        <span style="width: 15px;height: 15px;background-color: #0ed145;display: inline-block;margin-right: 5px;border-radius: 30px;position: relative;left: 5px;top: 1px;"></span>
                        {{ $user->username_URL }}
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
