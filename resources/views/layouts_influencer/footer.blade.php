<style>
    label {
        margin-right: 10px;
    }

    .custom-file {
        margin-top: 10px;
        margin-bottom: 10px;str
    }

    .payment_modal h1 {
        color: white;
    }

    .modal-body::-webkit-scrollbar {
        display: none; /* Hide scrollbar for Chrome, Safari, and Opera */
    }
    
    .form-control:focus {
       border-color: blueviolet !important;
    }

    .modal-content::-webkit-scrollbar {
        display: none; /* Hide scrollbar for Chrome, Safari, and Opera */
    }

    .payment_modal {
        background: #8a2be2;
        color: white !important;
        text-align: center;
        border-radius: 7px;
        border: none;
        box-shadow: none;
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
    
    
    
    
    <!-- PWA Install Modal -->

  #pwa-installModalOverlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9998;
    animation: pwa-fadeIn 0.3s ease;
  }

  #pwa-installModal {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    max-width: 500px;
    width: 90%;
    z-index: 9999;
    animation: pwa-slideUp 0.3s ease;
  }

  .pwa-modal-header {
    padding: 20px;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .pwa-modal-header h2 {
    margin: 0;
    font-size: 22px;
    color: #333;
  }

  .pwa-modal-close {
    background: none;
    border: none;
    font-size: 28px;
    cursor: pointer;
    color: #999;
    padding: 0;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .pwa-modal-close:hover {
    color: #333;
  }

  .pwa-modal-body {
    padding: 20px;
    color: #666;
    line-height: 1.6;
  }

  .pwa-modal-body p {
    margin: 0 0 15px 0;
    font-weight: 500;
  }

  .pwa-modal-body ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .pwa-modal-body li {
    padding: 8px 0;
    margin: 0;
  }

  .pwa-modal-footer {
    padding: 20px;
    border-top: 1px solid #eee;
    display: flex;
    gap: 10px;
    justify-content: flex-end;
  }

  .pwa-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .pwa-btn-primary {
    background: #007bff;
    color: white;
  }

  .pwa-btn-primary:hover {
    background: #0056b3;
  }

  .pwa-btn-secondary {
    background: #e9ecef;
    color: #333;
  }

  .pwa-btn-secondary:hover {
    background: #d9e0e7;
  }

  @keyframes pwa-fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  @keyframes pwa-slideUp {
    from {
      transform: translate(-50%, -60%);
      opacity: 0;
    }
    to {
      transform: translate(-50%, -50%);
      opacity: 1;
    }
  }

  @media (max-width: 600px) {
    #pwa-installModal {
      width: 95%;
      max-width: none;
    }

    .pwa-modal-header h2 {
      font-size: 18px;
    }

    .pwa-modal-body {
      padding: 15px;
    }

    .pwa-modal-footer {
      flex-direction: column;
    }

    .pwa-btn {
      width: 100%;
    }
  }


</style>


<!-- Referral Modal -->
<div class="modal fade" id="referralModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
<div class="modal-content" style="background:#8a2be2;  box-shadow:none;">

      <div class="modal-body payment_modal d-block"><br>
        <h2>🙋🏻‍♂️💰</h2>
        <h3 style="color:#fff;">{{ __('content.modal_invite_title') }} </h3>
        <p style="color:#fff;">{{ __('content.modal_invite_text') }} <strong>{{ session('referral_username_url') }}</strong></p>
        <!--<input type="text" class="form-control" value="{{ session('referral_username_url') }}" readonly>-->
        <button class="btn btn-secondary mt-2" onclick="copyReferralLink()">{{ __('content.modal_invite_button_copy') }}</button>
        <button type="button" class="btn btn-primary mt-3" data-dismiss="modal">{{ __('content.modal_invite_button_close') }}</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    @if(session('show_referral_modal'))
        $('#referralModal').modal('show');
    @endif
});

function copyReferralLink() {
    var copyText = document.querySelector('#referralModal input');
    copyText.select();
    document.execCommand('copy');
    alert('Username copied!');
}
</script>



{{-- Payment modal (Message Show) --}}
@if(Session::get('payment_message'))
    <div class="modal fade" id="payment_message" tabindex="-1" role="dialog" aria-labelledby="payment_modal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="background: transparent;box-shadow:none;margin-top:150px;">

                <div class="modal-body payment_modal d-block ">
                    <h2 style="color:#fff; padding-top:20px;">{{ Session::get('payment_message') }}</h2>
                    <p style="color:#fff;">Your salary will be sent to your bank or paypal account in the next
                        months</p>
                    <p style="color:#fff;">Tu salario será ingresado a tu cuenta bancaria o paypal en el próximos
                        mes</p>

                    <button type="button" class="btn" data-dismiss="modal" id="close_message">OK</button>

                </div>

            </div>
        </div>
    </div>

@endif
{{-- Payment Modal End --}}

<section>


    @php
        $user = DB::table('users')->where('id',Auth::user()->id)->first();

        $Influencer_networks = $user->Influencer_networks;

        if($Influencer_networks != null) {


              $Influencer_network_ids = explode(",", $Influencer_networks);

              $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;
              $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);
          }

    @endphp

    @if ($Influencer_networks != null)
        <div>


            <div class="modal fade networkurlModal" id="networkurlModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                 style="z-index: 123122123122123122123122;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 20px;background: red;">
                        <div class="modal-header" style="border: 0px">
                            <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                                    style="font-size: 45px;opacity: 1;color: white;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <button type="button" class="close d-block "
                                    style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                                <span aria-hidden="true"><i
                                        class="fas fa-arrow-left back_control_panel back_modal_event update_network"
                                        style="font-size: 27px;"></i></span>
                            </button>
                            <div style="text-align: center;margin-top: 35px;">
                                <img src="{{ asset('assets/images/superman2.png') }}"
                                     style="display: inline-block;height: 51px;" alt="">
                                <h5 class="modal-title" id="exampleModalCenterTitle"
                                    style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                                    Update Network</h5>
                            </div>
                        </div>
                        <div class="modal-body" style="border: 0px">
                            {{-- /influencer --}}
                            <form action="{{ url('/networks_url') }}" method="post" enctype="multipart/form-data"
                                  style="margin-top: 20px;">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">

                                @php
                                    $first_network = 1;
                                    $index = 0;
                                @endphp

                                @foreach($Influencer_network_ids as $Influencer_network_id)

                                    @php
                                        $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();
                                        $socialnetwork_image = $socialnetwork->image;
                                        $socialnetwork_name = $socialnetwork->name;
                                    @endphp


                                    <div class="container-fluid networkurlsdiv networkurl{{$socialnetwork_name}}"
                                         style="padding-left: 0px;">
                                        <div class="row pb-3">
                                            <div class="col-md-9">
                                                <div class="form-group" style="display: flex">


                                                    <label for="email"
                                                           style="color: white">{{$socialnetwork_name}} </label>
                                                    <input type="text" class="form-control" id="email"
                                                           style="background: white;height: 40px;" name="network_urls[]"
                                                           value="{{$Influencer_networks_profile_links[$index]}}">
                                                </div>
                                            </div>

                                            <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                                <button type="submit" class="save_btn"
                                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                                    {{ __('content.save_button_cpanel') }}
                                                </button>
                                            </div>


                                        </div>

                                        {{-- onclick ="return confirm('Confirm delete network? - Yes or No')"  --}}
                                        <span href="/delete_network/{{$Influencer_network_id}}" class="delete save_btn"
                                              type="network"
                                              style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;text-decoration: none;padding-top: 6px;padding-bottom: 6px;display: block;width: fit-content;margin-left: auto;margin-right: 5px;margin-top: 10px;">{{ __('content.delete_button_cpanel') }}</span>
                                    </div>




                                    @php
                                        $first_network = 0;
                                        $index = $index + 1;
                                    @endphp

                                @endforeach


                            </form>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    @endif

    <!-- Modal Withdraw earnings -->
    <div class="modal" id="withdraw_earnings_modal" tabindex="-1" role="dialog"
         aria-labelledby="withdraw_earnings_modalCenterTitle" aria-hidden="true" style="z-index: 1288912889212;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="close d-block "
                            style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                        <span aria-hidden="true"><i
                                class="fas fa-arrow-left back_control_panel back_modal_event history_of_subscribers"
                                style="font-size: 27px;"></i></span>
                    </button>
                    <div style="text-align: center;height: 20px;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title modal_earning_title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.withdraw_title_cpanel') }}</h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px">


                    @php
                        $earnings = $user->earnings;
                        $earnings = round($earnings, 2);

                        //$earnings = (float)$earnings;

                        if(!str_contains($earnings, ".")) {
                          $earnings = $earnings.".00";
                        }


                    @endphp

                    <label for="email" style="color: white;margin-top: 20px;">{{ __('content.earnings') }} ${{$earnings}}</label>

                    @if ($earnings < 50)
                        <p style="color: white">No puedes retirar dinero a tu cuenta aun. Debes alcanzar una cantidad de
                            ingresos superior a $50,00</p>

                    @elseif(empty($user->bank_account) || empty($user->paypal_account))
                        <p style="color: white">You can't withdraw money, first update a Payment Method.</p>
                    @else
                        <p style="color: white">Select an amount to withdraw <br>(maximum salary available to withdraw:
                            ${{$earnings}})</p>

                        <form action="{{ url('/influencer/withdraw_earnings') }}" method="post"
                              enctype="multipart/form-data" style="margin-top: 20px;">
                            @csrf
                            <input type="hidden" name="influencer_id" value="{{$user->id}}">
                            <input type="hidden" name="bank_account" value="{{$user->bank_account}}">
                            <input type="hidden" name="paypal_account" value="{{$user->paypal_account}}">
                            <input type="hidden" name="username" value="{{$user->username_URL}}">

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">Amount: </label>
                                            <input type="text" class="form-control" id="email"
                                                   style="background: white;height: 40px;" name="amount" value=""
                                                   max="{{$earnings}}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button type="submit" class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.withdraw_button1_cpanel') }}
                                        </button>
                                    </div>


                                </div>

                            </div>


                        </form>

                    @endif


                </div>

            </div>
        </div>
    </div>

   <!-- Modal influencer settings -->
<div class="modal" id="streamingModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true" style="z-index: 123112311231;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;background: blueviolet;">
            
            <!-- Header -->
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close d-block" data-dismiss="modal" aria-label="Close"
                        style="font-size: 45px;opacity: 1;color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="text-align: center;height: 20px;margin-top: 25px; margin-bottom: 20px">
                    <!--<img src="{{ asset('assets/images/superman2.png') }}"-->
                    <!--     style="display: inline-block;height: 51px;" alt="">-->
                    <h5 class="modal-title" id="exampleModalCenterTitle"
                        style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                      🎥 Streaming:
                    </h5>
                </div>
            </div>

            <!-- Body -->
            <div class="modal-body" style="border: 0px">
    <form id="streamForm">
        <div class="form-group" style="display: flex;">
            <label style="color: white; width: 50px;">{{ __('content.stream_bio') }}:</label>
            <textarea class="form-control" name="bio" rows="3" required
                placeholder="{{ __('content.stream_bio_placeholder') }}"
                style="background-color: white; color: black;"></textarea>
        </div>

        <div class="form-group mt-3" style="display: flex; margin-top: 20px;">
            <label style="color: white; width: 50px;">{{ __('content.stream_tags') }}:</label>
            <input type="text" class="form-control" name="tags" required
                placeholder="{{ __('content.stream_tags_placeholder') }}"
                style="background-color: white; color: black;">
        </div>

        <div style="display: flex; justify-content: center; margin-top: 20px;">
            <button type="submit" class="btn btn-light" style="padding: 10px 20px;">
                🔴 {{ __('content.stream_start_button') }} 
            </button>
        </div>
    </form>
</div>


        </div>
    </div>
</div>

<!-- JS -->
<script>
document.getElementById("streamForm").addEventListener("submit", async (e) => {
    e.preventDefault(); // stop form from reloading page

    const bio = e.target.bio.value.trim();
    const tags = e.target.tags.value.trim();

    if (!bio || !tags) {
        return alert("Please fill in bio and tags");
    }

    try {
        const res = await fetch("/create-room", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ bio, tags })
        });

        if (!res.ok) throw new Error("Failed to create room");
        const data = await res.json();

        if (data.roomName) {
            window.location.href = `/start-stream/${data.roomName}`;
        }
    } catch (err) {
        console.error("❌ Error creating room:", err);
        alert("Could not start stream.");
    }
});
</script>



    <!-- Modal Subscribers list -->
    <div class="modal" id="subcriberlistmodal" tabindex="-1" role="dialog"
         aria-labelledby="subcriberlistModalCenterTitle" aria-hidden="true" style="z-index: 1288912889;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="close d-block "
                            style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                        <span aria-hidden="true"><i
                                class="fas fa-arrow-left back_control_panel back_modal_event history_of_subscribers"
                                style="font-size: 27px;"></i></span>
                    </button>
                    <div style="text-align: center;height: 20px;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">
                            {{ __('content.followers') }}</h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px">


                    @php

                        if(isset($other_influencer_user)) {
                          $id = $influencer_user_id;
                        } else {
                          $id = Auth::user()->id;
                        }

                              $subscriptions = DB::table('subscriptions')->where('influencer_id',$id)->get();
                              $subscriptions_count = DB::table('subscriptions')->where('influencer_id',$id)->count();

                    @endphp

                    @if ($subscriptions_count > 0)
                        @foreach ($subscriptions as $subscription)

                            @php
                                $user_id = $subscription->user_id;
                                $user = DB::table('users')->where('id',$user_id)->first();
                            @endphp

                            <div style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                @php
                                    $profile_picture = $user->profile_picture;
                                @endphp
                                <p style="margin: 0px;display: flex;
              color: #333333;
              font-weight: bold;
              font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
          "><img @if ($profile_picture != null)
                                                              src="{{ asset('assets/images/'.$profile_picture.'') }}"
                 @else
                                                              src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                 @endif style="max-width: 32px;border-radius: 35px;" alt=""> {{$user->username_URL}}</p>
                                <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                    <span href="/user/delete_subscription/{{$subscription->id}}" class="delete"
                                          warning_message="Confirm delete subscription? - Yes or No"><i
                                            class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></span>
                                </div>
                            </div>

                        @endforeach
                    @else

                        @if (isset($other_influencer_user))
                            <p style="margin: 0px;text-align: center;color: white;">This user have no subscribers or
                                followers yet</p>
                        @else
                            <p style="margin: 0px;text-align: center;color: white;">You have no subscribers or followers
                                yet</p>
                        @endif

                    @endif


                </div>

            </div>
        </div>
    </div>


<!-- Modal: Referred Merch Purchases -->
<div class="modal fade" id="referralmerchmodal" tabindex="-1" role="dialog"
     aria-labelledby="referralMerchModalTitle" aria-hidden="true" style="z-index: 1288912889;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; background: red;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="font-size: 45px; opacity: 1; color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="close"
                        style="font-size: 45px; opacity: 1; color: white; position: absolute; left: 15px; top: 15px;">
                    <span aria-hidden="true">
                        <i class="fas fa-arrow-left back_control_panel back_modal_event history_of_subscribers"
                           style="font-size: 27px;"></i>
                    </span>
                </button>
            </div>

            <div class="text-center" style="margin-top: -25px;">
                <img src="{{ asset('assets/images/superman2.png') }}"
                     style="height: 51px;" alt="Superman">
                <h5 class="modal-title d-inline-block text-white ml-2" id="referralMerchModalTitle"
                    style="font-size: 30px; color: #fff;">
                    Merch Referrals
                </h5>
            </div>
            
            
            

            <div class="modal-body bg-white text-dark px-4 py-3" style="border-radius: 0 0 20px 20px;">
                @php
                     use App\Models\ProductPurchase as PP;

                    $user = Auth::user();

                    $referredPurchases = PP::where('referred_influencer_id', $user->id)
                        ->latest()
                        ->take(10)
                        ->get();
                @endphp

                @if ($referredPurchases->isNotEmpty())
                    <ul class="list-group" style= "display:flex; gap:10px">
                        @foreach ($referredPurchases as $purchase)
                            @php
                                $buyer = \App\Models\User::find($purchase->user_id);
                                $guest = $purchase->guest_email
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center" >
                                <a href="{{ $buyer ? '/' . $buyer->username_URL : 'mailto:' . $purchase->guest_email }}" style="text-decoration: none;">
                                    <strong> {{ $buyer->name ?? $guest }}:</strong>
                                </a>
                                <span>${{ number_format($purchase->amount * 0.30, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No merch referrals yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>


<!-- Modal Referral List -->
<div class="modal fade" id="referrallistmodal" tabindex="-1" role="dialog"
     aria-labelledby="referralListModalTitle" aria-hidden="true" style="z-index: 1288912889;">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; background: red;">
            <div class="modal-header" style="border: 0px">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="font-size: 45px; opacity: 1; color: white;">
                    <span aria-hidden="true">&times;</span>
                </button>
                <button type="button" class="close"
                        style="font-size: 45px; opacity: 1; color: white; position: absolute; left: 15px; top: 15px;">
                    <span aria-hidden="true">
                        <i class="fas fa-arrow-left back_control_panel back_modal_event history_of_subscribers"
                           style="font-size: 27px;"></i>
                    </span>
                </button>
            </div>

            <div class="text-center" style="margin-top: -25px;">
                <img src="{{ asset('assets/images/superman2.png') }}"
                     style="height: 51px;" alt="Superman">
                <h5 class="modal-title d-inline-block text-white ml-2" id="referralListModalTitle"
                    style="font-size: 30px; color: #fff;">
                    Referrals
                </h5>
            </div>

            <div class="modal-body bg-white text-dark px-4 py-3" style="border-radius: 0 0 20px 20px;">
                @php
                    use Illuminate\Support\Facades\Auth;
                    use App\Models\User;

                    $user = Auth::user();
                    $referrals = \App\Models\User::where('referred_influencer', $user->username_URL)->get();
                @endphp

                @if ($referrals->isNotEmpty())
                    <div class="referral-list">
                        <ul class="list-unstyled">
                           <div class="referral-list">
    <ul class="list-inline">
        @foreach ($referrals as $ref)
            @php
                $referralEarnings = \App\Models\EarningsLog::where('user_id', $user->id)
                    ->where('source_user_id', $ref->id)
                    ->where('earning_type', 'referral_bonus')
                    ->sum('amount');
            @endphp

            <li class="list-inline-item me-3" style="color: #fff;">
                <a href="/{{ $ref->username_URL }}" style="color: #fff; text-decoration: none;">
                    <strong>{{ $ref->name }}</strong> – ${{ number_format($referralEarnings, 2) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

                        </ul>
                    </div>
                @else
                    <p>No referrals yet.</p>
                @endif
            </div>
        </div>
    </div>
</div>


    <!-- Modal Likes list -->
    <div class="modal" id="LikesModalCenter" tabindex="-1" role="dialog" aria-labelledby="subcriberlistModalCenterTitle"
         aria-hidden="true" style="z-index: 1288912889;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{-- <button type="button" class="close d-block "  style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                      <span aria-hidden="true" ><i class="fas fa-arrow-left back_control_panel back_modal_event" style="font-size: 27px;"></i></span>
                    </button> --}}
                    <div style="text-align: center;height: 20px;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.likes') }} </h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px">


                    @php

                        if(isset($other_influencer_user)) {
                          $id = $influencer_user_id;
                          // echo $id;
                        } else {
                          $id = Auth::user()->id;

                        }





                              $likes = DB::table('likes')->where('influencer_id',$id)->get();
                              $likes_count = DB::table('likes')->where('influencer_id',$id)->count();
                              $influencer_user_ids = [];
                    @endphp

                    @if ($likes_count > 0)

                        <div class="container-fluid">
                            <div class="row" style="display: flex">


                                @foreach ($likes as $like)

                                    @php
                                        $influencer_id = $like->user_id;
                                        $user = DB::table('users')->where('id',$influencer_id)->first();
                                    @endphp

                                    @if (!in_array($influencer_id ,$influencer_user_ids))
                                        {{-- class="col-xs-3 "   --}}
                                        {{-- max-width: 225px; --}}
                                        <div style="padding-left: 5px;padding-right: 5px;display: inline-block;">
                                            <div
                                                style="background: white;padding: 10px 5px;margin-top: 10px;overflow-x: auto;max-width: 100%;">

                                                @php
                                                    $profile_picture = $user->profile_picture;
                                                @endphp
                                                <p style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                                    <img @if ($profile_picture != null)
                                                             src="{{ asset('assets/images/'.$profile_picture.'') }}"
                                                         @else
                                                             src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                                                         @endif style="max-width: 32px;border-radius: 35px;" alt="">
                                                    <span style="margin-left: 5px;">@</span>{{$user->username_URL}}</p>

                                            </div>
                                        </div>

                                    @endif

                                    @php
                                        array_push($influencer_user_ids, $influencer_id);
                                    @endphp

                                @endforeach
                            </div>
                        </div>
                    @else
                        @if (isset($other_influencer_user))
                            <p style="margin: 0px;text-align: center;color: white;">This user have not likes yet</p>
                        @else
                            <p style="margin: 0px;text-align: center;color: white;">You don't have likes yet</p>
                        @endif

                    @endif


                </div>

            </div>
        </div>
    </div>


    <div class="modal" id="PostLikesModalCenterindividual" tabindex="-1" role="dialog"
         aria-labelledby="subcriberlistModalCenterTitle" aria-hidden="true" style="z-index: 1288912889234;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{-- <button type="button" class="close d-block "  style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                      <span aria-hidden="true" ><i class="fas fa-arrow-left back_control_panel back_modal_event" style="font-size: 27px;"></i></span>
                    </button> --}}
                    <div style="text-align: center;height: 20px;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.likes') }} </h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px">

                    @php

                        $influencer_id = Auth::user()->id;

                        $posts = DB::table('posts')->where('influencer_id',$influencer_id)->get();

                        // $posts = DB::table('posts')->get();

                    @endphp

                    @foreach ($posts as $post)

                        <div class="post_div post_div_{{$post->id}}">
                            @php
                                $post_likes_count = DB::table('likes')->where('post_id',$post->id)->count();

                                $post_likes = DB::table('likes')->where('post_id',$post->id)->get();
                            @endphp


                            @if ($post_likes_count > 0)
                                @foreach ($post_likes as $post_like)

                                    @php



                                        $user_id = $post_like->user_id;
                                        $user = DB::table('users')->where('id',$user_id)->first();
                                        $profile_picture = $user->profile_picture;
                                    @endphp

                                    <div
                                        style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                        <p style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                            <img @if ($profile_picture != null)
                                                     src="{{ asset('assets/images/'.$profile_picture.'') }}"
                                                 @else
                                                     src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                                                 @endif style="max-width: 32px;border-radius: 35px;" alt=""> <span
                                                style="margin-left: 5px;">@</span>{{$user->username_URL}}</p>

                                    </div>

                                @endforeach
                            @else
                                <p style="margin: 0px;text-align: center;color: white;">Post don't have likes yet</p>
                            @endif


                        </div>

                    @endforeach



                    @php

                        $followerships = DB::table('followerships')->where('follower_user_id',Auth::user()->id)->get();

                        $subscriptions = DB::table('subscriptions')->where('user_id',Auth::user()->id)->get();

                    @endphp

                    @if(isset($followerships) && isset($subscriptions) )

                        @foreach ($followerships as $followership)

                            @php
                                $posts = DB::table('posts')->where('influencer_id',$followership->followed_user_id)->orderBy('id','Desc')->get();
                            @endphp


                            @foreach ($posts as $post)

                                <div class="post_div post_div_{{$post->id}}">
                                    @php
                                        $post_likes_count = DB::table('likes')->where('post_id',$post->id)->count();

                                        $post_likes = DB::table('likes')->where('post_id',$post->id)->get();
                                    @endphp


                                    @if ($post_likes_count > 0)
                                        @foreach ($post_likes as $post_like)

                                            @php



                                                $user_id = $post_like->user_id;
                                                $user = DB::table('users')->where('id',$user_id)->first();
                                                $profile_picture = $user->profile_picture;
                                            @endphp

                                            <div
                                                style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                                <p style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                                    <img @if ($profile_picture != null)
                                                             src="{{ asset('assets/images/'.$profile_picture.'') }}"
                                                         @else
                                                             src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                                                         @endif style="max-width: 32px;border-radius: 35px;" alt="">
                                                    <span style="margin-left: 5px;">@</span>{{$user->username_URL}}</p>

                                            </div>

                                        @endforeach
                                    @else
                                        <p style="margin: 0px;text-align: center;color: white;">Post don't have likes
                                            yet</p>
                                    @endif


                                </div>

                            @endforeach

                        @endforeach







                        @foreach ($subscriptions as $subscription)

                            @php
                                $posts = DB::table('posts')->where('influencer_id',$subscription->influencer_id)->orderBy('id','Desc')->get();
                            @endphp

                            @foreach ($posts as $post)

                                <div class="post_div post_div_{{$post->id}}">
                                    @php
                                        $post_likes_count = DB::table('likes')->where('post_id',$post->id)->count();

                                        $post_likes = DB::table('likes')->where('post_id',$post->id)->get();
                                    @endphp


                                    @if ($post_likes_count > 0)
                                        @foreach ($post_likes as $post_like)

                                            @php



                                                $user_id = $post_like->user_id;
                                                $user = DB::table('users')->where('id',$user_id)->first();
                                                $profile_picture = $user->profile_picture;
                                            @endphp

                                            <div
                                                style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                                <p style="margin: 0px;    color: #333333;
                    font-weight: bold;
                    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
                ">              @if ($profile_picture != null)
                                                        <img src="{{ asset('assets/images/'.$profile_picture.'') }}"
                                                             style="width: 34px; height: 34px; border-radius: 74px;">
                                                    @else
                                                        <img
                                                            src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                                                            style="width: 34px; height: 34px; border-radius: 74px;">
                                                    @endif <span>@</span>{{$user->username_URL}}</p>
                                                {{-- <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                                  <a href="/user/delete_subscription/{{$subscription->id}}"  onclick ="return confirm('Confirm delete subscription? - Yes or No')"><i class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></a>
                                                </div> --}}
                                            </div>

                                        @endforeach
                                    @else
                                        <p style="margin: 0px;text-align: center;color: white;">Post don't have likes
                                            yet</p>
                                    @endif


                                </div>

                            @endforeach

                        @endforeach

                    @endif


                </div>

            </div>
        </div>
    </div>

    <div class="modal" id="PostLikesModalCenterindividual_another_influencer_user" tabindex="-1" role="dialog"
         aria-labelledby="subcriberlistModalCenterTitle" aria-hidden="true" style="z-index: 1288912889234;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{-- <button type="button" class="close d-block "  style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                      <span aria-hidden="true" ><i class="fas fa-arrow-left back_control_panel back_modal_event" style="font-size: 27px;"></i></span>
                    </button> --}}
                    <div style="text-align: center;height: 20px;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.likes') }} </h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px">

                    @if(isset($other_influencer_user_id))
                        @php

                            //$influencer_id = Auth::user()->id;

                            $posts = DB::table('posts')->where('influencer_id',$other_influencer_user_id)->get();

                            // $posts = DB::table('posts')->get();

                        @endphp

                        @foreach ($posts as $post)

                            <div class="post_div post_div_{{$post->id}}">
                                @php
                                    $post_likes_count = DB::table('likes')->where('post_id',$post->id)->count();

                                    $post_likes = DB::table('likes')->where('post_id',$post->id)->get();
                                @endphp


                                @if ($post_likes_count > 0)
                                    @foreach ($post_likes as $post_like)

                                        @php



                                            $user_id = $post_like->user_id;
                                            $user = DB::table('users')->where('id',$user_id)->first();
                                            $profile_picture = $user->profile_picture;
                                        @endphp

                                        <div
                                            style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                            <p style="margin: 0px;display: flex;color: #333333;font-weight: bold;font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;">
                                                <img @if ($profile_picture != null)
                                                         src="{{ asset('assets/images/'.$profile_picture.'') }}"
                                                     @else
                                                         src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                                                     @endif style="max-width: 32px;border-radius: 35px;" alt=""> <span
                                                    style="margin-left: 5px;">@</span>{{$user->username_URL}}</p>
                                            {{-- <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                              <a href="/user/delete_subscription/{{$subscription->id}}"  onclick ="return confirm('Confirm delete subscription? - Yes or No')"><i class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></a>
                                            </div> --}}
                                        </div>

                                    @endforeach
                                @else
                                    <p style="margin: 0px;text-align: center;color: white;">Post don't have likes
                                        yet</p>
                                @endif


                            </div>

                        @endforeach

                    @endif


                </div>

            </div>
        </div>
    </div>


    <!-- Add post Modal-->
    <div class="modal @if(session()->has('post_added')) fade in @else fade @endif  " id="add_post_modal" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
         style="z-index: 123122;@if(session()->has('post_added')) display: block; @endif">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div style="text-align: center;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('nav.add_post') }}</h5>
                    </div>
                </div>
                <div class="modal-body post-modal" style="border: 0px">

                    <form action="{{ url('/influencer/add_post') }}" id="add_post_form" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">
                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.posts_label') }}</h3>
                        <div class="custom-file" style="display: flex;">
                            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('nav.add_post') }}</label>
                             <!-- <input type="file" class="custom-file-input" name="post_image_video"
                                       id="post_image_video_input" style="color: white;margin-top: 3px;" required> -->
                                       <input type="file" id="converted_file" name="post_image_video" style="display: none;" required>

<input type="file" class="custom-file-input" id="post_image_video_input"
       accept="image/*,video/*" style="color: white;margin-top: 3px;" required>
                            
 
                        </div>
                        <div style="margin-top: 10px; position: relative;">
         <label for="tagged_users" style="color: white; display: block;">{{ __('content.tag_people') }}</label>
            <small style="color: #ccc; display: block; margin-top: 4px;">
            {{ __('content.tag_instructions') }}
        </small>
        
       
        <br />

    <input type="text" id="tagged_users" name="tags" placeholder="{{ __('content.type_username_or_name') }}"
           style="width: 100%; padding: 5px; border: 1px solid lightgray; border-radius: 5px;">
     <input type="hidden" id="tagged_user_profiles" name="tagged_user_profiles"> 

    <div id="tag-suggestion-box" style="position: absolute; top: 100%; left: 0; right: 0;">
        <ul id="tag-suggestions"
            style="list-style: none; padding-left: 0; background: #fff; border: 1px solid #ccc; width: 100%; margin: 0; z-index: 1000; position:relative; display: none; max-height: 150px; overflow-y: auto;">
        </ul>
    </div>
</div>
<br />
 <center><button type="submit" class="save_btn turn_btn"
                                    style="background: #724abb; color: #fff;padding: 4px 35px;font-weight: 900;border: 0px;outline: 0px; font-size:1.1em; border: 3px solid #4712a6; font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif !important;">
                                <span>✎</span><span style="margin-left: 2px;">{{ __('content.post') }}</span>
                            </button></center>

                        <audio id="audio"></audio>
                    </form>


                    <img src="{{ asset('assets/images/loading2.gif') }}" id="loading_bar"
                         style="max-width: 100%;margin-left: auto;margin-right: auto;display: none;width: 50px;">
<!--wrong post here-->
<br />
                    <p style="color: white; font-weight: 600; margin: 0px; margin-top: 15px;">{{ __('content.my_posts') }}</p>

@php

    $anyVisible = DB::table('posts')
                    ->where('influencer_id', Auth::user()->id)
                    ->where('visible', 1)
                    ->exists();
@endphp


@php
    $posts = DB::table('posts')->where('influencer_id', Auth::user()->id)->orderBy('id', 'desc')->limit(6)->get();
@endphp

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            @foreach ($posts as $post)
                @php
                    $image_video = $post->image_video;
                    $file_extension = substr($image_video, strpos($image_video, ".") + 1);
                    $id = $post->id;
                    $visible = $post->visible ?? 0; 
                @endphp

                <div style="padding-left: 3%; padding-right: 3%; display: inline-block; margin-top: 15px;">
                    @php
                        $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
                        $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
                    @endphp

                    @if (in_array(strtolower($file_extension), $video_extensions))
                              
                               <video controlsList="nodownload"  style="max-width: 100%; max-width: 70px; border: 0px; border-radius: 0px !important; margin-bottom: -6px" controls loop @if ($post->thumbnail)
        poster="{{ asset('assets/images/thumbnails/' . $post->thumbnail) }}"
    @endif>

                                            <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    type="video/mp4">


                                        </video>
                              
                                    


                        <!--<video controlsList="nodownload"  style="max-width: 100%; max-width: 70px; border: 0px; border-radius: 0px !important; margin-bottom: -6px;">-->
                        <!--    <source src="{{ asset('assets/images/' . $image_video) }}" type="video/mp4">-->
                        <!--</video>-->
                    @else
                        <img src="{{ asset('assets/images/' . $image_video) }}"
                             style="max-width: 70px; display: inline-block;"
                             alt="Post Image" class="img-responsive">
                    @endif

                    <!-- Visibility Toggle Form This-->
                    <form action="{{ URL('/influencer/visible_post/' . $id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                            <i class="fa {{ $visible == 1 ? 'fa-eye' : 'fa-eye-slash' }}" style="position: absolute; font-size: 20px; color: blueviolet;"></i>
                        </button>
                    </form>
                   

                    <!-- Delete Postkk -->
                    <span href="{{ URL('/influencer/delete_post/' . $id) }}" class="delete" type="post">
                        <i class="fa fa-trash" style="position: absolute; margin-left: -8px; color: white;"></i>
                    </span>
                </div>
            @endforeach
        </div>

       
    </div>
     <!-- All Posts Button -->
        <center>
   <br />
            <div style="display: inline-block; vertical-align: super; background: white; color: black; padding-left: 10%; padding-right: 10%; cursor: pointer; color: red; padding-top: 5px; padding-bottom: 5px;" class="launch_sub_modal open_all_post save_btn">
                <span style="text-decoration: none;"><p style="margin: 0px; font-weight: bold;">{{ __('content.all_posts') }}</p></span>
            </div>
 
        </center>
    <br /><br />
   <p style="color: white; font-weight: 600; margin: 0px; margin-top: 20px;">{{ __('content.turn_all_on_off') }}</p>
   <br /> 
    <!-- Seen Button -->
<div class="col-md-3" style="text-align: end; padding-right: 22px;">
    <form method="POST" action="{{ url('/influencer/toggle_all_visibility') }}" style="display: inline;">
        @csrf
        <center>
            <button class="save_btn" type="submit"
                style="display: inline-block; vertical-align: super; background: white; color: red; padding: 2px 30px; font-weight: bold; border: none; cursor: pointer;">
         {{ $anyVisible ? 'Turn All Off 🔒' : 'Turn All On 👁️' }}
        </button>
        </center>
    </form>
</div>
</div>



                </div>

            </div>
        </div>
    </div>

    <!-- All post Modal-->
    <div class="modal  fade  " id="all_post_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true" style="z-index: 123122;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="close d-block "
                            style="font-size: 45px;opacity: 1;color: white;float: left;left: 10px;margin-top: -6px;right: auto;">
                        <span aria-hidden="true"><i class="fas fa-arrow-left back_add_post_modal back_modal_event"
                                                    style="font-size: 27px;"></i></span>
                    </button>
                    <div style="text-align: center;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('content.all_posts') }}</h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px; height: 450px; overflow-y: auto; scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* IE and Edge */">
<!--here-->

                    <p style="color: white;font-weight: 600;margin: 0px;margin-top: 20px;">{{ __('content.my_posts') }}</p>

                    @php
                        $posts = DB::table('posts')->where('influencer_id',Auth::user()->id)->orderBy('id', 'desc')->get();
                    @endphp

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($posts as $post)
                                    @php
                                        $image_video = $post->image_video;
                                        $file_extension = substr($image_video, strpos($image_video, ".") + 1);

                                        $id = $post->id;
                                    @endphp

                                    <div
                                            style="padding-left: 3%;padding-right: 3%;display: inline-block;margin-top: 15px;">
                                             @php
             $file_extension = pathinfo($image_video, PATHINFO_EXTENSION);
               $video_extensions = ['mp4', 'webm', 'mov', 'MOV'];
              @endphp

               @if (in_array(strtolower($file_extension), $video_extensions))
                                        <video controlsList="nodownload"  style="max-width: 100%;max-width: 70px;border: 0px;border-radius: 0px !important;margin-bottom: -6px;">

                                            <source src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    type="video/mp4">


                                        </video>
                                    @else
                                 
                                         <img src="{{ asset('assets/images/' . $image_video . '') }}"
                                                    style="max-width: 70px;display: inline-block;"
                                                    alt="Nueva Modelo - ¡Bienvenid@ a mi Portfolio!"
                                                    class="img-responsive">
                                    @endif
                                    <!-- Visibility Toggle Form -->
                    <form action="{{ URL('/influencer/visible_post/' . $id) }}" method="POST" style="display: inline;">
                        @csrf
                  
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                            <i class="fa {{ $post->visible == 1 ? 'fa-eye' : 'fa-eye-slash' }}" style="position: absolute;font-size: 20px; color: blueviolet;"></i>
                        </button>
                    </form>
                                            <span href="{{ URL('/influencer/delete_all_post/' . $id . '') }}"
                                                class="delete" type="post"><i class="fa fa-trash"
                                                    style="position: absolute;margin-left: -8px;color: white;"></i></span>
                                        </div>
                                @endforeach
                            </div>
                            <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                {{-- <div style="display: inline-block;vertical-align: super;background: white;color: black;padding-left: 10%;padding-right: 10%;">
                                  <a href="" style="text-decoration: none;"><p style="margin: 0px;font-weight: bold;" >{{ __('content.all_posts') }}</p></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <style>
        .swal2-icon {
            border:none;
        }
    </style>
    <!-- Modal influencer settings -->
    <div class="modal @if(session()->has('message')) fade in @else fade @endif " id="exampleModalCenter" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
         style="z-index: 123122;@if(session()->has('message')) display: block; @endif">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 20px;background: red;">
                <div class="modal-header" style="border: 0px">
                    <button type="button" class="close d-block " data-dismiss="modal" aria-label="Close"
                            style="font-size: 45px;opacity: 1;color: white;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div style="text-align: center;margin-top: 35px;">
                        <img src="{{ asset('assets/images/superman2.png') }}"
                             style="display: inline-block;height: 51px;" alt="">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="font-size: 30px;text-align: center;color: white;display: inline-block;">{{ __('nav.control_panel') }}:</h5>
                    </div>
                </div>
                <div class="modal-body" style="border: 0px">
                    {{-- <form action="{{ url('/influencer/add_post') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="influencer_id" value="{{$user->id}}">
                      <h3  style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">{{ __('content.posts_label') }}</h3>
                      <div class="custom-file" style="display: flex;">
                        <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('nav.add_post') }}</label>
                        <input type="file" class="custom-file-input" name="post_image_video" id="validatedCustomFile" style="color: white;margin-top: 3px;" required>
                        <button type="submit" style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">{{ __('content.post') }}</button>

                      </div>
                    </form> --}}


                    <div>
                    </div>


                    @php
                        $user = DB::table('users')->where('id',Auth::user()->id)->first();
                    @endphp


<form action="{{ url('/influencer/update_bio') }}" method="post" style="margin-top: 20px;" onsubmit="return validateBioLength();">
    @csrf
    <input type="hidden" name="influencer_id" value="{{ $user->id }}">
   <label for="bio" style="color: white">{{ __('content.bio') }}</label>
    <div class="container-fluid" style="padding-left: 0px;">
        <div class="row pb-3">
            <div class="col-md-9">
                <div class="form-group" style="display: flex; flex-direction: column;">
                    <textarea class="form-control" id="bio" name="bio" rows="3"
                              placeholder="{{ __('content.bio_placeholder') }}"
                              style="background: white;" required
                              maxlength="290">{{ $user->bio }}</textarea>
                    <small id="charCount" style="color: white; margin-top: 5px;">0 / 290</small>
                </div>
            </div>
            <div class="col-md-3" style="padding-right: 22px; text-align: end;">
                <button type="submit" class="save_btn"
                        style="background: white; color: red; padding: 3px 15px; font-weight: bold; border: 0px;">
                    {{ __('content.save_button_cpanel') }}
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    const bioTextarea = document.getElementById('bio');
    const charCount = document.getElementById('charCount');

    function updateCharCount() {
        const length = bioTextarea.value.length;
        charCount.textContent = `${length} / 290`;

        if (length > 290) {
            charCount.style.color = 'red';
        } else {
            charCount.style.color = 'white';
        }
    }

    bioTextarea.addEventListener('input', updateCharCount);

    function validateBioLength() {
        if (bioTextarea.value.length > 290) {
            alert("Bio must not exceed 290 characters.");
            return false;
        }
        return true;
    }

    // Initialize counter on load
    updateCharCount();
</script>


<br />
                    <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                        {{ __('content.profile_info') }}</h3>

                    <form action="{{ url('/influencer/update_profile_image') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">
                        <div class="custom-file" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                            <label for="validatedCustomFile" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.profile_picture') }}</label>
                            <input type="file" class="custom-file-input profile_picture" name="profile_image"
                                   id="profile_picture" style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px; overflow: hidden; text-overflow: ellipsis;" accept="image/*" required>
                            <button type="submit" class="save_btn"
                                    style="padding: 8px 20px; background-color: white; color: red; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s ease; align-self: flex-start;">{{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                    </form>

                    <script>
                        $(document).ready(function () {
                            var obUrl;
                            document.getElementById('profile_picture').addEventListener('change', function (e) {
                                var file = e.currentTarget.files[0];
                                console.log('file tpe is', file.type);
                                let filetype = file.type.toLowerCase();
                                
                            });
                        });
                    </script>

                    <form action="{{ url('/influencer/update_cover_image') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">
                        <div class="custom-file" style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">
                            <label for="validatedCustomFile" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.cover_picture') }}</label>
                            <input type="file" class="custom-file-input cover_picture" name="cover_image"
                                   id="validatedCustomFile"
                                   style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px;"
                                   accept="image/*"
                                   required>
                            <button type="submit" class="save_btn"
                                    style="padding: 8px 20px; background-color: white; color: red; font-weight: bold; border: none; cursor: pointer; transition: background-color 0.3s ease; align-self: flex-start;">
                                {{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                    </form>
                    
                 <form id="colorForm" action="{{ route('influencer.updateCoverColor') }}" method="post">
    @csrf
    <input type="hidden" name="influencer_id" value="{{ $user->id }}">

    <!-- Color Selection -->
    <label for="color_choice" style="margin-bottom: 10px; color: white; font-size: 14px;">{{ __('content.select_cover_color') }}</label>
  <select name="cover_color" id="color_choice"
        style="margin-bottom: 15px; padding: 8px; width: 100%; box-sizing: border-box; color: white; background-color: #333; border: 1px solid #ccc; border-radius: 4px;"
        required>
    <option value="" disabled
        {{ $user->cover_picture ? 'selected' : (!$user->cover_color ? 'selected' : '') }}>
        Select color
    </option>
    <option value="yellow"
        {{ $user->cover_color === 'yellow' && !$user->cover_picture ? 'selected' : '' }}>
        Yellow
    </option>
    <option value="purple"
        {{ $user->cover_color === 'purple' && !$user->cover_picture ? 'selected' : '' }}>
        Purple
    </option>
</select>

</form>


<script>
    document.getElementById('color_choice').addEventListener('change', function () {
        console.log("kk");
        document.getElementById('colorForm').submit();
    });
</script>


                    <form action="{{ url('/influencer/update_username_url') }}" method="post"
                          enctype="multipart/form-data" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.username_url') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="username_url"
                                               value="{{$user->username_URL}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <form action="{{ url('/influencer/update_price_of_subscription') }}" method="post"
                          enctype="multipart/form-data" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white;white-space: nowrap;">{{ __('content.price_fee') }} </label>
                                        <input type="number" step="0.01" min="0.50" class="form-control"
                                               id="price_of_subscription" style="background: white;height: 40px;"
                                               name="price_of_subscription" value="{{$user->price_of_subscription}}"
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <form action="{{ url('/influencer/update_profile_picture_border_status') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('content.profile_picture_border') }}</label>
                                    <div class="form-check" style="display: inline-block">
                                        <input class="form-check-input" type="radio"
                                               name="profile_picture_border_status" value="1" id="flexRadioDefault1"
                                               @if(Auth::user()->profile_picture_border_status == "1") checked @endif>
                                        <label class="form-check-label" for="flexCheckDefault" style="color: white;">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check" style="display: inline-block">
                                        <input class="form-check-input" type="radio"
                                               name="profile_picture_border_status" value="0" id="flexRadioDefault2"
                                               @if(Auth::user()->profile_picture_border_status == "0") checked @endif>
                                        <label class="form-check-label" for="flexCheckChecked" style="color: white;">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <form action="{{ url('/influencer/footer_name_username') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="custom-file" style="display: flex;">
                            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">Footer
                                Credits</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="footer_name_username"
                                    style="color: white;border: 1px solid white;margin-right: 50px;">

                                <option style="color: black;" value="name"
                                        @if(Auth::user()->footer_name_username == "name") selected @endif>Name
                                </option>
                                <option style="color: black;" value="username"
                                        @if(Auth::user()->footer_name_username == "username") selected @endif>Username
                                </option>

                            </select>
                            <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">
                                {{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                    </form>

                    <hr style="border-top: 6px solid #eeeeee;">
                    <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                        NETWORKS:</h3>


                    <form action="{{ url('/influencer/update_first_network') }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">
                        <div class="custom-file" style="display: flex;">
                            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">{{ __('content.first_network') }}</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="first_network"
                                    style="color: white;border: 1px solid white;margin-right: 50px;">
                                @php
                                    $user = DB::table('users')->where('id',Auth::user()->id)->first();

                                    $Influencer_networks = $user->Influencer_networks;

                                    if($Influencer_networks != null) {


                                    $Influencer_network_ids = explode(",", $Influencer_networks);

                                    $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;
                                    $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);
                                    }


                                @endphp
                                @if ($Influencer_networks != null)

                                    @foreach($Influencer_network_ids as $Influencer_network_id)

                                        @php
                                            $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();
                                            $socialnetwork_image = $socialnetwork->image;
                                            $socialnetwork_name = $socialnetwork->name;
                                        @endphp
                                        <option style="color: black;"
                                                value="{{$socialnetwork->id}}">{{$socialnetwork_name}}</option>

                                    @endforeach

                                @endif

                            </select>
                            <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;">
                                {{ __('content.save_button_cpanel') }}
                            </button>

                        </div>
                    </form>

                    @php
                        $user = DB::table('users')->where('id',Auth::user()->id)->first();

                        $Influencer_networks = $user->Influencer_networks;

                        if($Influencer_networks != null) {


                              $Influencer_network_ids = explode(",", $Influencer_networks);

                              $Influencer_networks_profile_links = $user->Influencer_networks_profile_links;
                              $Influencer_networks_profile_links = explode(",", $Influencer_networks_profile_links);
                          }

                    @endphp

                    @if ($Influencer_networks != null)
                        <div>


                            @php
                                $first_network = 1;
                                $index = 0;
                            @endphp

                            @foreach($Influencer_network_ids as $Influencer_network_id)

                                @php
                                    $socialnetwork = DB::table('socialnetworks')->where('id',$Influencer_network_id)->first();
                                    $socialnetwork_image = $socialnetwork->image;
                                    $socialnetwork_name = $socialnetwork->name;
                                @endphp



                                <button class="networkmodal" network_name="{{$socialnetwork_name}}" data-toggle="modal"
                                        data-target="#networkurl{{$socialnetwork_name}}"
                                        href="{{$Influencer_networks_profile_links[$index]}}"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;margin-top: 10px;margin-bottom: 10px;">{{$socialnetwork_name}}
                                    <i class="fa fa-edit" style="margin-left: 5px;font-size: 17px;"
                                       aria-hidden="true"></i></button>

                                @php
                                    $first_network = 0;
                                    $index = $index + 1;
                                @endphp

                            @endforeach


                        </div>
                    @endif




                    <form action="{{ url('/influencer/add_network') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.add_network') }}</h3>
                        <div class="custom-file" style="display: flex;">
                            <label for="" style="margin-right: 10px;color: white;margin-top: 3px;">Choose
                                Network: </label>
                            <select class="form-control" id="network_id" name="network_id"
                                    style="color: white;border: 1px solid white;margin-right: 50px;">
                                @php
                                    $socialnetworks = DB::table('socialnetworks')->get();

                                    $user_auth = DB::table('users')->where("id",$user->id)->first();
                                    //echo "user_auth".$user_auth;
                                    $Influencer_networks = $user_auth->Influencer_networks;
                                    $Influencer_networks = explode(",",$Influencer_networks);

                                @endphp

                                @php
                                    $left_social_networks = 0;
                                @endphp
                                @foreach($socialnetworks as $socialnetwork)

                                    @if (!in_array($socialnetwork->id, $Influencer_networks))
                                        <option class="network_option" value="{{$socialnetwork->id}}"
                                                networkurl="{{$socialnetwork->default_address}}"
                                                style="color: black;">{{$socialnetwork->name}}</option>
                                        @php
                                            $left_social_networks = $left_social_networks + 1;
                                        @endphp
                                    @endif

                                @endforeach

                                @if($left_social_networks == 0)
                                    <option>You have already taken all social networks</option>
                                @endif

                            </select>
                            <button type="submit" class="save_btn"
                                    style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;position: relative;height: fit-content;margin-right: 21px;visibility: hidden;">
                                {{ __('content.save_button_cpanel') }}
                            </button>

                        </div>

                        @if($left_social_networks != 0)

                            <div class="container-fluid " style="padding-left: 0px;">
                                <div class="row pb-3">
                                    <div class="col-md-9">
                                        <div class="form-group" style="display: flex">


                                            <label for="email" style="color: white">{{ __('content.network_url') }} </label>
                                            <input type="text" class="form-control" id="network_url_input"
                                                   style="background: white;height: 40px;" name="network_url" value=""
                                                   required>
                                        </div>
                                    </div>

                                    <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                        <button @if($left_social_networks == 0) type="button" @else type="submit"
                                                @endif  class="save_btn"
                                                style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                            {{ __('content.add_button_cpanel') }}
                                        </button>
                                    </div>


                                </div>
                            </div>

                        @endif

                    </form>


                    <hr style="border-top: 6px solid #eeeeee;">
                    <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                        {{ __('content.payments') }}</h3>

                    <form action="{{ url('/influencer/update_earnings') }}" method="post" enctype="multipart/form-data"
                          style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-xs-6">
                                    <div class="form-group" style="display: flex">


                                        @php
                                            $earnings = $user->earnings;
                                            $earnings = round($earnings, 2);

                                            //$earnings = (float)$earnings;

                                            if(!str_contains($earnings, ".")) {
                                              $earnings = $earnings.".00";
                                            }


                                        @endphp

                                        <label for="email" style="color: white">{{ __('content.earnings') }} ${{$earnings}}</label>
                                        <input type="hidden" class="earnings" value={{$earnings}} required>
                                        {{-- <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="earnings" value="{{$user->earnings}}" readonly> --}}
                                    </div>
                                </div>

                                <div class="col-xs-6" style="text-align: end;padding-right: 22px;">
                                    <button type="button" class="save_btn withdraw_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.withdraw_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <!-- Button trigger modal -->

                    <div class="container-fluid " style="padding-left: 0px;">
                        <div class="row pb-3">
                            <div class="col-xs-6">
                                <div class="form-group" style="display: flex">


                                    <label for="email" style="color: white">{{ __('content.subscriber_history') }}</label>
                                    {{-- <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="earnings" value="{{$user->earnings}}" readonly> --}}
                                </div>
                            </div>

                            <div class="col-xs-6" style="text-align: end;padding-right: 22px;">
                                <button type="button" class="launch_subscriber_list_modal launch_sub_modal save_btn"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;"
                                        data-toggle="modal" data-target="#referrallistmodal">
                                    {{ __('content.see_all_button_cpanel') }}
                                </button>

                            </div>


                        </div>

                    </div>
                    
                    <div class="container-fluid " style="padding-left: 0px;">
                        <div class="row pb-3">
                            <div class="col-xs-6">
                                <div class="form-group" style="display: flex">
@php
    use App\Models\EarningsLog;

    $user = Auth::user();
    $totalReferralEarnings = EarningsLog::where('user_id', $user->id)
        ->where('earning_type', 'referral_bonus')
        ->sum('amount');
@endphp

                                    <label for="email" style="color: white">{{ __('content.referrals') }}
                                    </label> <spann style="color: #fff; font-weight: 900;">${{ number_format($totalReferralEarnings, 2) }}</spann>
                                    {{-- <input type="text" class="form-control" id="email" style="background: white;height: 40px;" name="earnings" value="{{$user->earnings}}" readonly> --}}
                                </div> 
                                
                            </div>


                                <!-- start referrals -->
                    
                     <div class="col-xs-6" style="text-align: end;padding-right: 22px;">
                                <button type="button" class="launch_referrals_list_modal launch_sub_modal save_btn"
                                        style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;"
                                        data-toggle="modal" data-target="#subcriberlistmodal">
                                    {{ __('content.see_all_button_cpanel') }}
                                </button>

                            </div>
                    <!-- End referrals -->

                        </div>

                    </div>
                    
                      <!--start merch referrals-->
@php
 use App\Models\ProductPurchase;

    $user = Auth::user();

    $referredPurchases = ProductPurchase::with('user')
        ->where('referred_influencer_id', $user->id)
        ->get();

    // Total referred merch amount
    
   $merchReferralTotal = $referredPurchases->sum('amount') * 0.30;
@endphp

  <div class="container-fluid " style="padding-left: 0px;">
                        <div class="row pb-3">
                            <div class="col-xs-6">
                                <div class="form-group" style="display: flex">
                <span style="color: #fff; font-weight: 900;">
                    {{ __('content.merchandising_referrals') }} ${{ number_format($merchReferralTotal, 2) }}
                </span>
            </div> 
        </div>

        <div class="col-xs-6" style="text-align: end; padding-right: 22px;">
            <button type="button" class="launch_referrals_merch_modal launch_sub_modal save_btn"
                style="background: white; color: red; padding: 3px 15px; font-weight: bold; border: 0px; outline: 0px;"
                data-toggle="modal" data-target="#referralmerchmodal">
                {{ __('content.see_all_button_cpanel') }}
            </button>
        </div>
    </div>
</div>
<!--end merch referrals-->


<!--  START EARNINGS VIDEO VIEWS  -->


  <div class="container-fluid " style="padding-left: 0px;">
                        <div class="row pb-3">
                            <div class="col-xs-6">
                                <div class="form-group" style="display: flex">
                <span style="color: #fff; font-weight: 900;">
                    {{ __('content.earnings_video_views') }} $0.00
                </span>
            </div> 
        </div>

        <div class="col-xs-6" style="text-align: end; padding-right: 22px;">
            <button type="button" class=" launch_sub_modal save_btn"
                style="background: white; color: red; padding: 3px 15px; font-weight: bold; border: 0px; outline: 0px;"
                data-toggle="modal" data-target="#">
                {{ __('content.notavailable10k_button') }}
            </button>
        </div>
    </div>
</div>
<!--end VIDEO VIEWS -->

                    <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                        {{ __('content.payment_methods') }}</h3>

                    <form action="{{ url('/influencer/update_bank_account') }}" method="post"
                          enctype="multipart/form-data" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.bank_account') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="bank_account"
                                               value="{{$user->bank_account}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <form action="{{ url('/influencer/update_paypal_account') }}" method="post"
                          enctype="multipart/form-data" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.paypal') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="paypal_account"
                                               value="{{$user->paypal_account}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>


                    
                    
                    
                    <!-- SUBSCRIPCIONES Y SEGUIDOS -->

                    <div>
                        <hr style="border-top: 6px solid #eeeeee;">
                        <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                            {{ __('content.my_subscriptions') }}</h3>
                        @php
                            $id = Auth::user()->id;
                            $subscriptions = DB::table('subscriptions')->where('user_id',$id)->get();
                            $subscriptions_count = DB::table('subscriptions')->where('user_id',$id)->count();

                        @endphp

                        @if ($subscriptions_count > 0)
                            @foreach ($subscriptions as $subscription)

                                @php
                                    $influencer_id = $subscription->influencer_id;
                                    $influencer = DB::table('users')->where('id',$influencer_id)->first();
                                @endphp

                                <div style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                    @php
                                        $profile_picture = $influencer->profile_picture;
                                    @endphp
                                    <p style="margin: 0px;    color: #333333;
                  font-weight: bold;
                  font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
              "><img @if ($profile_picture != null)
                                                                      src="{{ asset('assets/images/'.$profile_picture.'') }}"
                     @else
                                                                      src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                     @endif style="max-width: 28px" alt=""> <span>@</span>{{$influencer->username_URL}}</p>
                                    <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                        <span href="/user/delete_subscription/{{$subscription->id}}" class="delete"
                                              type="subscription"
                                              warning_message="Confirm delete subscription? - Yes or No"><i
                                                class="far fa-trash-alt"
                                                style="cursor: pointer;color: black;"></i></span>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <p style="margin: 0px;text-align: center;color: white;">No Subscriptions</p>
                        @endif


                        <div>
                            <hr style="border-top: 6px solid #eeeeee;">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                                {{ __('content.my_followerships') }}</h3>
                            @php
                                $id = Auth::user()->id;
                                $followerships = DB::table('followerships')->where('follower_user_id',Auth::user()->id)->get();
                                $followerships_count = DB::table('followerships')->where('follower_user_id',Auth::user()->id)->count();

                            @endphp

                            @if ($followerships_count > 0)
                                @foreach ($followerships as $followership)

                                    @php
                                        $userFollowed_id = $followership->followed_user_id;
                                        $userFollowed = DB::table('users')->where('id',$userFollowed_id)->first();
                                    @endphp

                                    <div
                                        style="background: white;padding: 10px 5px;display: inline-block;margin: 10px;">

                                        @php
                                            $profile_picture = $userFollowed->profile_picture;
                                        @endphp
                                        <p style="margin: 0px;    color: #333333;
                    font-weight: bold;
                    font-family: Consolas, Menlo, Monaco, Lucida Console, Liberation Mono, DejaVu Sans Mono, Bitstream Vera Sans Mono, Courier New, monospace, serif;
                "><img @if ($profile_picture != null)
                                                                            src="{{ asset('assets/images/'.$profile_picture.'') }}"
                       @else
                                                                            src="{{ asset('assets/images/output-onlinepngtools (2).png') }}"
                       @endif style="max-width: 28px" alt=""> <span>@</span>{{$userFollowed->username_URL}}</p>
                                        <div style="text-align: right;margin-bottom: -25px;margin-right: -13px;">
                                            <span href="/user/delete_followership/{{$followership->id}}" class="delete"
                                                  type="followership"
                                                  warning_message="Confirm delete followership? - Yes or No"><i
                                                    class="far fa-trash-alt" style="cursor: pointer;color: black;"></i></span>
                                        </div>
                                    </div>

                                @endforeach
                            @else
                                <p style="margin: 0px;text-align: center;color: white;">No Followerships</p>
                            @endif

                            
                            {{-- SUPER ADS CENTER Section --}}
                            <hr style="border-top: 6px solid #eeeeee;">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                                {{ __('content.superadscenter') }}</h3>

                            <center><span href="https://live.superfanss.app/super-ads/" TARGET="_BLANK"
                                          class="btn save_btn redirect_solicitar"
                                          style="background: transparent;color: white;border: 2px solid white;">{{ __('content.superadscenterbutton') }}</span>
                            </center>
                            
                            
                            <!-- Supercalls section -->
                            {{-- Contact Section --}}
                            <hr style="border-top: 6px solid #eeeeee;">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                                {{ __('content.supercalls_request') }}</h3>

                            <center><span href="https://superfanss.app/superfanscalls/" TARGET="_BLANK"
                                          class="btn save_btn redirect_solicitar"
                                          style="background: transparent;color: white;border: 2px solid white;">{{ __('content.solicitar') }}</span>
                            </center>

                            <!-- MANAGER AUMENTAR FAMA SECTION -->
                            {{-- Mail Section --}}
                            <hr style="border-top: 6px solid #eeeeee;">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                                {{ __('content.instagram_growth') }}</h3>

                            <center><a href="mailto:marketing@superfanss.app?subject=Hire%20a%20Manager&body=Hi,%20I'm%20{{ $user->username_URL }}%20and%20I%20want%20to%20hire%20a%20Manager%20of%20Social%20Networks%20that%20help%20me%20to%20fix%20my%20Influencer%20Career%20and%20help%20me%20to%20be%20famous." 
    class="btn save_btn"
                                       style="background: transparent;color: white;border: 2px solid white;">{{ __('content.contratar') }}</a>
                            </center>
                            <!--VERIFIED BLUE -->
                              <hr style="border-top: 6px solid #eeeeee;">
                            <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;text-align: center;">
                           <img src="https://live.superfanss.app/assets/images/verified.png" width="24px" alt="Verified Badge" style="position:relative; bottom:2px;">
                            {{ __('content.verified_account_request') }}</h3>
                            <center>
                                
            @if(auth()->check() && auth()->user()->verified == 1)
    {{-- Cancel Verification --}}
    <form action="{{ route('redsys.cancelVerification') }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button 
            class="btn save_btn" 
            type="submit" 
            style="background: transparent;color: white;border: 2px solid white; padding:0 10px;"
        >
            {{ __('content.unsubscribe') }}
        </button>
    </form>
@else
    {{-- Request Verification --}}
    <form action="{{ route('redsys.now') }}" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="amount" value="37">
        <input type="hidden" name="verified" value="1">

        <button 
            class="btn save_btn" 
            type="submit" 
            style="background: transparent;color: white;border: 2px solid white; padding:0 10px;"
        >
            {{ __('content.subscribe') }}
        </button>
    </form>
@endif

                            {{-- Account info section --}}
                    <hr style="border-top: 6px solid #eeeeee;">
                    <h3 style="margin: 0px;color: white;font-family: 'Rockwell Nova';font-weight: 800;margin-top: 20px;margin-bottom: 10px;">
                        {{ __('content.account_info') }}</h3>

                    <form action="{{ url('/influencer/update_email') }}" method="post" enctype="multipart/form-data"
                          style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.email') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="email"
                                               value="{{$user->email}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <form action="{{ url('/influencer/update_password') }}" method="post" enctype="multipart/form-data"
                          style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.password') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="password" value=""
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>


                    <form action="{{ url('/influencer/update_name') }}" method="post" enctype="multipart/form-data"
                          style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.name') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="name"
                                               value="{{$user->name}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <form action="{{ url('/influencer/update_surname') }}" method="post" enctype="multipart/form-data"
                          style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">{{ __('content.surname') }} </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="surname"
                                               value="{{$user->surname}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>

                    <!--<form action="{{ url('/influencer/update_instagram_link') }}" method="post"
                          enctype="multipart/form-data" style="margin-top: 20px;">
                        @csrf
                        <input type="hidden" name="influencer_id" value="{{$user->id}}">

                        <div class="container-fluid " style="padding-left: 0px;">
                            <div class="row pb-3">
                                <div class="col-md-9">
                                    <div class="form-group" style="display: flex">


                                        <label for="email" style="color: white">Instagram link: </label>
                                        <input type="text" class="form-control" id="email"
                                               style="background: white;height: 40px;" name="instagram_link"
                                               value="{{$user->instagram_link}}" required>
                                    </div>
                                </div>

                                <div class="col-md-3" style="text-align: end;padding-right: 22px;">
                                    <button type="submit" class="save_btn"
                                            style="background: white;color: red;padding: 3px 15px;font-weight: bold;border: 0px;outline: 0px;">
                                        {{ __('content.save_button_cpanel') }}
                                    </button>
                                </div>


                            </div>

                        </div>


                    </form>-->
                                       
                                       
                            </center>


                          

                        </div>

                    </div>
                </div>
            </div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        const textarea = document.getElementById("bio");
        const form = textarea.closest("form");

        textarea.addEventListener("keydown", function (e) {
            if (e.key === "Enter" && !e.shiftKey) {
                  e.stopPropagation();
                // e.preventDefault(); 
                // form.submit(); 
            }
        });
    });
</script>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


            @if(session()->has('payment_message'))
                <script type="text/javascript">
                    $(window).on('load', function () {
                        $('#payment_message').modal('show');
                    });
                </script>
            @endif

            @if(session()->has('message'))
                <script type="text/javascript">
                    $(window).on('load', function () {
                        $('#exampleModalCenter').modal('show');
                    });
                </script>
            @endif


            <script>
                $(document).ready(function () {

                    $("#price_of_subscription").keyup(function () {
                        var price_of_subscription = $("#price_of_subscription").val();

                        if (price_of_subscription > 150) {
                            $("#price_of_subscription").val(150);
                        }

                        if (price_of_subscription < 0) {
                            $("#price_of_subscription").val(0);
                        }

                    });
                });
            </script>
<script>
    const allUsers = @json($influencers);

    const tagInput = document.getElementById('tagged_users');
    const tagSuggestionBox = document.getElementById('tag-suggestions');
    const hiddenInput = document.getElementById('tagged_user_profiles');

    let selectedUsers = []; 

    tagInput.addEventListener('input', function () {
        const input = tagInput.value;
        const parts = input.split(',');
        const lastPart = parts[parts.length - 1].trim().toLowerCase();
        tagSuggestionBox.innerHTML = '';

        if (lastPart.length > 0) {
            const matches = allUsers.filter(user =>
                user.username_URL.toLowerCase().includes(lastPart)
            );

            matches.forEach(user => {
                const li = document.createElement('li');
                li.textContent = user.username_URL;
                li.style.padding = '5px 10px';
                li.style.cursor = 'pointer';

                li.addEventListener('click', function () {
                    parts[parts.length - 1] = user.username_URL;
                    tagInput.value = parts.join(',') + '';

                    if (!selectedUsers.find(u => u.id === user.id)) {
                        selectedUsers.push(user);
                    }

                    hiddenInput.value = JSON.stringify(selectedUsers);

                    tagSuggestionBox.style.display = 'none';
                });

                tagSuggestionBox.appendChild(li);
            });

            tagSuggestionBox.style.display = matches.length > 0 ? 'block' : 'none';
        } else {
            tagSuggestionBox.style.display = 'none';
        }
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('#tag-suggestions') && !e.target.closest('#tagged_users')) {
            tagSuggestionBox.style.display = 'none';
        }
    });
</script>




            <script>
            
            
                $(document).ready(function () {
                    var time = 600000000;
                    var timeReset = time;

                    setInterval(function () {
                        time = time - 1000;
                        var $activeItem = $(".slider > .item.active");
                        var $nextItem = $activeItem.next();
                        var $prevItem = $activeItem.prev();

                        function nextSlide() {
                            $activeItem.removeClass("active");
                            $nextItem.addClass("active");
                            setNav();
                            time = timeReset;
                        }

                        function prevSlide() {
                            $activeItem.removeClass("active");
                            $prevItem.addClass("active");
                            setNav();
                            time = timeReset;
                        }

                        if ($(".slider > .item").last().hasClass("active")) {
                            $nextItem = $(".slider > .item").first();
                        }
                        if (time <= 0) {
                            nextSlide();
                        }
                    }, 1000);

                    // Build Slider Navigation
                    $(".slider > .item").each(function (i) {
                        $(this).attr("data-id", i);
                        $(".slider-nav").append('<a href="#" data-id="' + i + '"></a>');
                    });

                    $('.slider-nav > a[data-id="' + $('.slider > .item.active').attr("data-id") + '"]').addClass('active');

                    function setNav() {
                        $('.slider-nav > a').removeClass('active');
                        $('.slider-nav > a[data-id="' + $('.slider > .item.active').attr("data-id") + '"]').addClass('active');
                    }

                    $(".slider-nav > a").on("click", function (e) {
                        e.preventDefault();
                        $(".slider-nav > a").removeClass("active");
                        $(".slider .item.active").removeClass("active");
                        $('.slider-nav > a[data-id="' + $(this).attr("data-id") + '"]').addClass('active')
                        $('.slider .item[data-id="' + $(this).attr("data-id") + '"]').addClass("active");
                        time = timeReset;
                    });
                    $(".slider-control").on("click", function () {
                        var $activeItem = $(".slider > .item.active");
                        var $nextItem = $activeItem.next();
                        var $prevItem = $activeItem.prev();
                        if ($(this).hasClass('prev')) {
                            if ($('.slider > .item').first().hasClass('active')) {
                                $(".slider > .item").first().removeClass("active");
                                $(".slider-nav > a").first().removeClass("active");
                                $('.slider > .item').last().addClass('active');
                                $('.slider-nav > a').last().addClass('active');
                            } else {
                                $activeItem.removeClass('active');
                                $('.slider-nav > a').removeClass('active');
                                $prevItem.addClass('active');
                                $('.slider-nav a[data-id="' + $prevItem.attr("data-id") + '"]').addClass("active");
                            }
                        }
                        if ($(this).hasClass('next')) {
                            if ($('.slider > .item').last().hasClass('active')) {
                                $(".slider > .item").last().removeClass("active");
                                $(".slider-nav > a").last().removeClass("active");
                                $('.slider > .item').first().addClass('active');
                                $('.slider-nav > a').first().addClass('active');
                            } else {
                                $activeItem.removeClass('active');
                                $('.slider-nav > a').removeClass('active');
                                $nextItem.addClass('active');
                                $('.slider-nav a[data-id="' + $nextItem.attr("data-id") + '"]').addClass("active");
                            }
                        }
                        time = timeReset;
                    });

                });


            </script>



            <script>
                $(document).ready(function () {

                    setTimeout(function () {
                        $(".alert").css("display", "none")
                    }, 2000);

                    $(".next").click(function () {
                        $(".item").removeClass("active-right");
                        $(".item").removeClass("active-left");
                        $(".active").addClass("active-right");
                    });

                    $(".prev").click(function () {
                        $(".item").removeClass("active-right");
                        $(".item").removeClass("active-left");
                        $(".active").addClass("active-left");
                    });


                    $(".modal").click(function (event) {
                        event.stopPropagation();
                        // Do something
                    });


                });
            </script>


            {{-- feed slider javascript --}}
            <script>
                $(document).ready(function () {
                    var time = 600000000;
                    var timeReset = time;

                    setInterval(function () {
                        time = time - 1000;
                        var $activeitem_feed = $(".slider > .item_feed.active_feed");
                        var $nextitem_feed = $activeitem_feed.next();
                        var $previtem_feed = $activeitem_feed.prev();

                        function nextSlide() {
                            $activeitem_feed.removeClass("active_feed");
                            $nextitem_feed.addClass("active_feed");
                            setNav();
                            time = timeReset;
                        }

                        function prevSlide() {
                            $activeitem_feed.removeClass("active_feed");
                            $previtem_feed.addClass("active_feed");
                            setNav();
                            time = timeReset;
                        }

                        if ($(".slider > .item_feed").last().hasClass("active_feed")) {
                            $nextitem_feed = $(".slider > .item_feed").first();
                        }
                        if (time <= 0) {
                            nextSlide();
                        }
                    }, 1000);

// Build Slider Navigation
                    $(".slider > .item_feed").each(function (i) {
                        $(this).attr("data-id", i);
                        $(".slider-nav").append('<a href="#" data-id="' + i + '"></a>');
                    });

                    $('.slider-nav > a[data-id="' + $('.slider > .item_feed.active_feed').attr("data-id") + '"]').addClass('active_feed');

                    function setNav() {
                        $('.slider-nav > a').removeClass('active_feed');
                        $('.slider-nav > a[data-id="' + $('.slider > .item_feed.active_feed').attr("data-id") + '"]').addClass('active_feed');
                    }

                    $(".slider-nav > a").on("click", function (e) {
                        e.preventDefault();
                        $(".slider-nav > a").removeClass("active_feed");
                        $(".slider .item_feed.active_feed").removeClass("active_feed");
                        $('.slider-nav > a[data-id="' + $(this).attr("data-id") + '"]').addClass('active_feed')
                        $('.slider .item_feed[data-id="' + $(this).attr("data-id") + '"]').addClass("active_feed");
                        time = timeReset;
                    });
                    $(".slider-control").on("click", function () {
                        var $activeitem_feed = $(".slider > .item_feed.active_feed");
                        var $nextitem_feed = $activeitem_feed.next();
                        var $previtem_feed = $activeitem_feed.prev();
                        if ($(this).hasClass('prev_feed')) {
                            if ($('.slider > .item_feed').first().hasClass('active_feed')) {
                                $(".slider > .item_feed").first().removeClass("active_feed");
                                $(".slider-nav > a").first().removeClass("active_feed");
                                $('.slider > .item_feed').last().addClass('active_feed');
                                $('.slider-nav > a').last().addClass('active_feed');
                            } else {
                                $activeitem_feed.removeClass('active_feed');
                                $('.slider-nav > a').removeClass('active_feed');
                                $previtem_feed.addClass('active_feed');
                                $('.slider-nav a[data-id="' + $previtem_feed.attr("data-id") + '"]').addClass("active_feed");
                            }
                        }
                        if ($(this).hasClass('next_feed')) {
                            if ($('.slider > .item_feed').last().hasClass('active_feed')) {
                                $(".slider > .item_feed").last().removeClass("active_feed");
                                $(".slider-nav > a").last().removeClass("active_feed");
                                $('.slider > .item_feed').first().addClass('active_feed');
                                $('.slider-nav > a').first().addClass('active_feed');
                            } else {
                                $activeitem_feed.removeClass('active_feed');
                                $('.slider-nav > a').removeClass('active_feed');
                                $nextitem_feed.addClass('active_feed');
                                $('.slider-nav a[data-id="' + $nextitem_feed.attr("data-id") + '"]').addClass("active_feed");
                            }
                        }
                        time = timeReset;
                    });

                });


            </script>


            <script>
                $(document).ready(function () {


                    $(".next_feed").click(function () {
                        $(".item_feed").removeClass("active-right");
                        $(".item_feed").removeClass("active-left");
                        $(".active_feed").addClass("active-right");
                    });

                    $(".prev_feed").click(function () {
                        $(".item_feed").removeClass("active-right");
                        $(".item_feed").removeClass("active-left");
                        $(".active_feed").addClass("active-left");
                    });


                });
            </script>


            <script>
                $(document).ready(function () {

                    // $("#search_influencer").click(function(){
                    $("#influencer_select").change(function () {


                        if ($("#influencer_select").val() == "All influencers") {
                            $("#influencer_select").val("Buscar Influencer");
                            window.location.href = "/influencer/influencers";
                        } else if ($("#influencer_select").val() != "All influencers" && $("#influencer_select").val() != "Buscar Influencer") {
                            var current_value = $("#influencer_select").val();
                            $("#influencer_select").val("Buscar Influencer");
                            window.location.href = "/influencer/influencer/" + current_value + "";
                        }


                    });

                    //$("#search_user").click(function(){
                    $("#user_select").change(function () {


                        if ($("#user_select").val() == "All users") {
                            $("#user_select").val("Buscar User");
                            window.location.href = "/user/users";
                        } else if ($("#user_select").val() != "All Users" && $("#user_select").val() != "Buscar User") {
                            var current_value = $("#user_select").val();
                            $("#user_select").val("Buscar User");
                            window.location.href = "/influencer/user/" + current_value + "";
                        }


                    });
                });
            </script>


            {{-- @if(session()->has('post_added'))
          <script type="text/javascript">
            $(window).on('load', function() {
                $('#add_post_modal').modal('show');
            });
          </script>
          @endif --}}

            @if(session()->has('post_added'))
                <script type="text/javascript">
                    $(window).on('load', function () {

                        $('#add_post_modal').modal('show');

                    });
                </script>
            @endif
            
              @if(session()->has('all_post'))
                <script type="text/javascript">
                    $(window).on('load', function () {

                        $('#all_post_modal').modal('show');

                    });
                </script>
            @endif


            {{-- <script type="text/javascript">
              $(window).on('load', function() {
                  $('#subcriberlistmodal').modal('show');
              });
            </script> --}}


            <script>
                $(document).ready(function () {
                    $(".launch_subscriber_list_modal").click(function () {
                            setTimeout(function () {
                        $('#subcriberlistmodal').modal('show');
                        $('#exampleModalCenter').modal('hide');
                            }, 500);
                    });
                    
                      $(".launch_referrals_list_modal").click(function () {
                              setTimeout(function () {
                        $('#referrallistmodal').modal('show');
                        $('#exampleModalCenter').modal('hide');
                              }, 500);
                    });

                   $(".launch_referrals_merch_modal").click(function () {
                           setTimeout(function () {
                        $('#referralmerchmodal').modal('show');
                        $('#exampleModalCenter').modal('hide');
                           }, 500);
                    });
                    
                    $(".back_control_panel").click(function () {
                            setTimeout(function () {
                        $('.networkurlModal').modal('hide');
                        $('#subcriberlistmodal').modal('hide');
                        $('#referrallistmodal').modal('hide');
                        $('#referralmerchmodal').modal('hide');
                        $('#withdraw_earnings_modal').modal('hide');
                        $('#exampleModalCenter').modal('show');
  }, 500);
                        if ($(this).hasClass("update_network")) {


                            setTimeout(function () {
                                var $foo = $("#exampleModalCenter");
                                $foo.scrollTop($foo.scrollTop() + 450);
                            }, 500);//wait 2 seconds


                        } else if ($(this).hasClass("history_of_subscribers")) {

                            setTimeout(function () {
                                var $foo = $("#exampleModalCenter");
                                $foo.scrollTop($foo.scrollTop() + 1000);
                            }, 500);//wait 2 seconds

                        }

                        //$('body').addClass("modal-open");
                    });


                    $(".open_all_post").click(function () {
                        setTimeout(function () {
                        $('#all_post_modal').modal('show');
                        $('#add_post_modal').modal('hide');
                        }, 500);
                    });

                    $(".back_add_post_modal").click(function () {
                        setTimeout(function () {
                        $('#all_post_modal').modal('hide');
                        $('#add_post_modal').modal('show');
                        }, 500);
                    });


                    $(".networkmodal").click(function () {

                        var network_name = $(this).attr("network_name");
setTimeout(function () {
                        $('.networkurlsdiv').hide();
                        $('.networkurl' + network_name + '').show();

                        $('.networkurlModal').modal('show');
                        $('#exampleModalCenter').modal('hide');
}, 500);
                    });


                    $(".back_modal_event").click(function () {
                        $("body").css("padding-right", "0px");
                        setTimeout(function () {
                            $("body").addClass("modal-open");
                        }, 500);//wait 2 seconds

                    });


                    $(".launch_sub_modal").click(function () {

                        setTimeout(function () {
                            $("body").css("padding-right", "0px");
                        }, 500);//wait 2 seconds
                    });

                    $(".close").click(function () {


                        setTimeout(function () {
                            $("body").css("padding-right", "0px");
                        }, 500);//wait 2 seconds
                    });


                    $(".direct_subscriber_list").click(function () {

                        $(".back_modal_event").css("display", "none");

                    });

                    $(".close").click(function () {

                        $(".back_modal_event").css("display", "inline-block");

                    });


                    $(".indiviual_post_likes").click(function () {

                        var post_id = $(this).attr("post_id");


                        $(".post_div").hide();
                        $(".post_div_" + post_id + "").show();

                    });


                    // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
                    $('.dropdown').on('show.bs.dropdown', function (e) {
                        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
                    });

                    // ADD SLIDEUP ANIMATION TO DROPDOWN //
                    $('.dropdown').on('hide.bs.dropdown', function (e) {
                        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
                    });

                    // Closes the menu in the event of outside click
                    window.onclick = function (event) {
                        if (!event.target.matches('.dropbutton')) {


                            // $(".dropdown").addClass("open");
                            // $("#dropdownMenuButton").attr("aria-expanded","true");
                            // $("#dropdown-menu").css("display","block");


                        }
                    }


                });

            </script>


            <script>
                $(document).ready(function () {
                    var networkurl = $("#network_id").find("option:selected").attr("networkurl");
                    $("#network_url_input").val(networkurl);

                    $("#network_id").change(function () {
                        var networkurl = $(this).find("option:selected").attr("networkurl");
                        $("#network_url_input").val(networkurl);
                    });

                });

            </script>


            <script>
                $(document).ready(function () {

                    $("#add_post_form").submit(function () {
                        $("#loading_bar").css("display", "block");
                    });

                    // $( ".influencer_search" ).click(function( event ) {

                    //   $("#fh5co-aside").css("width","270px");

                    //   });


                });

            </script>

            <script>
                $(document).ready(function () {

                    $(".control_panel_item").click(function () {

                        setTimeout(function () {
                            $("#exampleModalCenter").modal('show');
                        }, 100);

                    });

                    $("#dropdownMenuButton").click(function () {

                        if ($(this).hasClass("activated_dropdown")) {
                            $(this).removeClass("activated_dropdown")
                        } else {
                            $(this).addClass("activated_dropdown")
                        }


                    });


                    $('span[data-toggle="modal"').add('a[data-toggle="modal"]').click(function (event) {

                        if ($(window).width() < 760) {

                            var data_target = $(this).attr("data-target");
                            event.stopPropagation();

                            setTimeout(function () {
                                $(data_target).modal('show');
                            }, 300);

                        }


                    });


                    $(".redirect_solicitar").click(function (event) {
                        href = $(this).attr("href");
                        if ($(window).width() < 760) {

                            setTimeout(function () {
                                window.open(href, '_blank');
                            }, 300);
                        } else {
                            window.open(href, '_blank');
                        }

                    });


                });

            </script>


            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


            <script>
                $(document).ready(function () {

                    $(".swal-button--defeat").click(function (event) {
                        event.stopPropagation();
                        $('.swal-overlay').addClass('swal-overlay--show-modal');
                    });
                });
            </script>


            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                $(document).ready(function () {

                    // $(".swal-button--defeat").click(function(event){
                    //   event.stopPropagation();
                    //   $('.swal-overlay').addClass('swal-overlay--show-modal');
                    // });

                    $(".delete").click(function (event) {

                        event.stopPropagation();

                        var type = $(this).attr("type");


                        var href = $(this).attr("href");

                        if (type == "post") {
                            var title = 'Are you sure?';
                        } else if (type == "network") {
                            var title = 'Confirm delete network?';
                        } else if (type == "followership") {
                            var title = 'Confirm delete followership?';
                        } else if (type == "subscription") {
                            var title = 'Confirm delete Subscription?';
                        }

                        // Swal.fire({
                        //   title: title,
                        //   text: "You won't be able to revert this!",
                        //   // icon: 'warning',
                        //   showCancelButton: true,
                        //   confirmButtonColor: '#3085d6',
                        //   cancelButtonColor: '#d33',
                        //   confirmButtonText: 'Yes, delete it!'
                        // }).then((result) => {
                        //   if (result.isConfirmed) {

                        //     window.location = href;

                        //   }
                        // });

                        if ($(window).width() < 760) {

                            setTimeout(function () {


                                swal({
                                    title: title,
                                    text: "You won't be able to revert this!",
                                    // buttons: true,


                                    buttons: {


                                        defeat: {
                                            text: "Yes, delete it!",
                                            value: "catch",
                                            closeModal: false,
                                        },
                                        cancel: "Cancel",
                                    },
                                    dangerMode: true,
                                })
                                    .then((willDelete) => {
                                        if (willDelete) {
                                            setTimeout(function () {
                                                window.location = href;
                                            }, 300);
                                        }
                                    });

                            }, 000);

                        } else {

                            swal({
                                title: title,
                                text: "You won't be able to revert this!",

                                // buttons: true,
                                buttons: {


                                    defeat: {
                                        text: "Yes, delete it!",
                                        value: "catch",


                                    },
                                    cancel: "Cancel",
                                },
                                dangerMode: true,
                            })
                                .then((willDelete) => {


                                    if (willDelete) {
                                        setTimeout(function () {
                                            window.location = href;
                                        }, 300);
                                    }
                                });

                        }


                    });


                });
            </script>


            @if(session()->has('message_subscription') || session()->has('message_follow') || session()->has('message_price_of_fee')|| session()->has('duplicate_error'))

                <script>
                    $(document).ready(function () {

                        var message = '<?php echo session()->get("message_follow") ?><?php echo session()->get("message_subscription") ?><?php echo session()->get("message_price_of_fee") ?><?php echo session()->get("duplicate_error") ?>';

                        Swal.fire(
                            message,
                        )


                    });
                </script>

            @endif


            {{-- Withdraw earning logic --}}
            <script>
                $(document).ready(function () {


                    $(".withdraw_btn").click(function () {

                        // earnings = $(".earnings").val();
                        // if(earnings < 50) {
                        //   var message = 'No puedes retirar dinero a tu cuenta aun. Debes alcanzar una cantidad de ingresos superior a $50,00';

                        //   Swal.fire(

                        //       message,

                        //     )
                        // }

                        $('#withdraw_earnings_modal').modal('show');
                        $('#exampleModalCenter').modal('hide');


                    });


                });
            </script>
<script>
document.getElementById('post_image_video_input').addEventListener('change', async function (e) {
    const file = e.target.files[0];

    if (!file) return;

    const fileType = file.type;

    if (fileType === "image/heic" || file.name.toLowerCase().endsWith(".heic")) {
        try {
            const convertedBlob = await heic2any({
                blob: file,
                toType: "image/jpeg",
                quality: 0.8
            });

            const newFile = new File([convertedBlob], file.name.replace(/\.[^/.]+$/, ".jpg"), {
                type: "image/jpeg"
            });

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(newFile);

            document.getElementById('converted_file').files = dataTransfer.files;

        } catch (error) {
            alert("Error converting HEIC image: " + error.message);
            e.target.value = "";
        }
    } else {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById('converted_file').files = dataTransfer.files;
    }
});
</script>
            <script>
                let modalShouldBeClosed = false;
                $(document).ready(function () {
                    // Code to get duration of audio /video file before upload - from: http://coursesweb.net/

                    //register canplaythrough event to #audio element to can get duration
                    var f_duration = 0;  //store duration
                    document.getElementById('audio').addEventListener('canplaythrough', function (e) {
                        //add duration in the input field #f_du
                        f_duration = Math.round(e.currentTarget.duration);

                        if (f_duration > 61) {
                        //   alert("f_duration: " + f_duration);
                            Swal.fire(
                                'The video you trying to upload is longer than 1 minute',
                            )
                            $("#post_image_video_input").val('');
                        }
                        URL.revokeObjectURL(obUrl);
                    });
                    //when select a file, create an ObjectURL with the file and add it in the #audio element
                    var obUrl;
                        document.getElementById('post_image_video_input').addEventListener('change', function (e) {
                        var file = e.currentTarget.files[0];
                        console.log('file tpe is', file.type);
                        let filetype = file.type.toLowerCase();
                       
                        //check file extension for audio/video type
                        if (file.name.match(/\.(avi|mp3|mp4|mpeg|ogg|webm|mov)$/i)) {
                            obUrl = URL.createObjectURL(file);
                            document.getElementById('audio').setAttribute('src', obUrl);
                        }
                    });

                    if ($('#modal').data('bs.modal').isShown) {
                        $('#modal').modal('hide');
                    }
                });
            </script>
            
          


</section>



<!-- PWA Modal HTML -->
<!--<div id="pwa-installModalOverlay"></div>-->

<!--<div id="pwa-installModal">-->
<!--  <div class="pwa-modal-header">-->
<!--    <h2>Install 🦸Super World</h2>-->
<!--    <button class="pwa-modal-close" onclick="closePwaInstallModal()">&times;</button>-->
<!--  </div>-->
<!--  <div class="pwa-modal-body">-->
<!--    <p><strong>Get the app on your device!</strong></p>-->
<!--    <ul>-->
<!--      <li>⚡ Faster Loading</li>-->
<!--      <li>🔔 Push Notifications</li>-->
<!--    </ul>-->
<!--  </div>-->
<!--  <div class="pwa-modal-footer">-->
<!--    <button class="pwa-btn pwa-btn-secondary" onclick="closePwaInstallModal()">Later</button>-->
<!--    <button class="pwa-btn pwa-btn-primary" id="pwa-installBtn">Install</button>-->
<!--  </div>-->
<!--</div>-->

<!-- PWA Script -->
<!--<script>-->
<!--let pwaDeferredPrompt;-->

<!--function isMobileWidth() {-->
<!--  return window.innerWidth <= 768;-->
<!--}-->

<!--function showPwaInstallModal() {-->
<!--  document.getElementById('pwa-installModal').style.display = 'block';-->
<!--  document.getElementById('pwa-installModalOverlay').style.display = 'block';-->
<!--}-->

<!--function closePwaInstallModal() {-->
<!--  document.getElementById('pwa-installModal').style.display = 'none';-->
<!--  document.getElementById('pwa-installModalOverlay').style.display = 'none';-->
<!--}-->

<!--document.getElementById('pwa-installModalOverlay').addEventListener('click', closePwaInstallModal);-->

<!--window.addEventListener('beforeinstallprompt', (e) => {-->
<!--  e.preventDefault();-->
<!--  if (isMobileWidth()) {-->
<!--    pwaDeferredPrompt = e;-->
<!--    showPwaInstallModal();-->
<!--  }-->
<!--});-->

<!--document.getElementById('pwa-installBtn').addEventListener('click', async () => {-->
<!--  if (pwaDeferredPrompt) {-->
<!--    pwaDeferredPrompt.prompt();-->
<!--    const { outcome } = await pwaDeferredPrompt.userChoice;-->
<!--    pwaDeferredPrompt = null;-->
<!--    closePwaInstallModal();-->
<!--  }-->
<!--});-->

<!--window.addEventListener('appinstalled', () => {-->
<!--  pwaDeferredPrompt = null;-->
<!--});-->

<!--window.addEventListener('resize', () => {-->
<!--  if (!isMobileWidth()) {-->
<!--    closePwaInstallModal();-->
<!--  }-->
<!--});-->
<!--</script>-->


<script>
$(document).ready(function () {
    $('.streaming_anchor').on('click', function () {
        const aside = document.querySelector('.js-fh5co-nav-toggle');
        console.log("classes asssssss", aside.classList)
        if (aside && aside.classList.contains('active')) {
            $('.js-fh5co-nav-toggle').click(); 
        }
    });
});
</script>



