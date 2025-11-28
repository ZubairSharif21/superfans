<?php

namespace App\Http\Controllers;

use App\Models\InfluencerPremium;
use App\Models\Assets;
use App\Models\Followership;
use App\Models\Like;
use App\Models\Modal;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Post;
use App\Models\Product;
use App\Models\StripeSubscription;
use App\Models\Subscription;
use App\Models\User;
use App\Models\water_mark;
use Auth;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Redirect;
use Session;
use Stripe;
use Stripe\Stripe as StripeClient;
use Stripe\Subscription as StripeSubscriptionAPI;
use Stripe\Customer;
use Stripe\Charge;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use DB;
use Stripe\Exception\CardException;
use App\Models\EarningsLog;

class UserController extends Controller
{

    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }


    function index()
    {
        $Packages = Package::all();

        $Modals = Modal::all();

        $Assets_parents = Assets::where('parent', 0)->get();

        $Assets_childs = Assets::where('parent', '!=', 0)->get();

        $Assets_all = Assets::all();

        $water_mark = water_mark::all();


        return redirect('/world');

        // return view('index',['Packages'=>$Packages,'Modals'=>$Modals,'Assets_parents'=>$Assets_parents,'Assets_childs'=>$Assets_childs,'Assets_all'=>$Assets_all,'water_marks'=>$water_mark]);
    }


    public function charge(Request $request)
    {


        // Session::put('cart_id', $request->cart_id);

        Session::put('amount', $request->amount);

        Session::put('user_ID', $request->user_id);

        Session::put('influencer_ID', $request->influencer_id);

        if ($request->input('submit')) {

            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('/user/paymentsuccess'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function payment_success(Request $request)
    {

        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {


                // $cart_id = Session::get('cart_id');

                $amount = Session::get('amount');
                $user_ID = Session::get('user_ID');
                $influencer_ID = Session::get('influencer_ID');

                $Subscription = new Subscription();
                $Subscription->user_id = $user_ID;
                $Subscription->influencer_id = $influencer_ID;
                $Subscription->amount = $amount;
                $Subscription->save();


                $Influencer = User::find($influencer_ID);
                $Influencer_username = $Influencer->username_URL;


                return redirect('/user/influencer/' . $Influencer_username . '')->with('message', 'Subscription purchased successfully');
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    public function payment_error()
    {
        return 'User is canceled the payment.';
    }


    public function purchase_plan_stripe($id)
    {
        $Package = Package::find($id);

        return view('user.package_purchase_stripe', ['Package' => $Package]);
    }


    function payment_plan_stripe(Request $request)
    {
        //  payment success message controller
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);


        $Package = Package::find($request->package_id);

        if ($Package->duration_unit == "month") {
            $duration = $Package->duration;


            $current_date = strtotime(date("Y-m-d"));
            $expiry_date = date("Y-m-d", strtotime("+" . $duration . " month", $current_date));
        } elseif ($Package->duration_unit == "year") {


            $duration = $Package->duration;


            $current_date = strtotime(date("Y-m-d"));
            $expiry_date = date("Y-m-d", strtotime("+" . $duration . " year", $current_date));
        }


        $Subscription = new Subscription();
        $Subscription->user_id = Auth::user()->id;
        $Subscription->package_id = $request->package_id;
        $Subscription->amount = $request->amount;
        $Subscription->expiry_date = $expiry_date;

        $Subscription->save();


        $Payment = new Payment();
        $Payment->user_id = Auth::user()->id;
        $Payment->amount = $request->amount;
        $Payment->method = "stripe";
        $Payment->save();


        return redirect('/')->with('package_purchase_message', 'Package purchased successfully');
    }


    public function charge_package_amount_paypal(Request $request)
    {

        Session::put('package_id', $request->package_id);

        Session::put('amount', $request->amount);


        if ($request->input('submit')) {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => url('/user/paymentsuccess_package'),
                    'cancelUrl' => url('paymenterror'),
                ))->send();

                if ($response->isRedirect()) {
                    $response->redirect(); // this will automatically forward the customer
                } else {
                    // not successful
                    return $response->getMessage();
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function paymentsuccess_package(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {


                $package_id = Session::get('package_id');

                $amount = Session::get('amount');


                // $cart_pro = Cart::find($cart_id);
                // $cart_pro->payment_status = 1;
                // $cart_pro->save();

                $Subscription = new Subscription();
                $Subscription->user_id = Auth::user()->id;
                $Subscription->package_id = $package_id;
                $Subscription->amount = $amount;
                $Subscription->save();

                $Payment = new Payment();
                $Payment->user_id = Auth::user()->id;
                $Payment->amount = $amount;
                $Payment->method = "paypal";
                $Payment->save();


                $User = User::find($package_id);
                $earnings = $User->earnings;

                $this_earned_amount = (80 / 100) * $amount;

                $User->earnings = $earnings + $this_earned_amount;
                $User->save();


                return redirect('/')->with('package_purchase_message', 'Product purchased successfully');
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }


    function check_duplicate_email(Request $request)
    {

        $User_count = User::where('email', $request->email)->count();


        if ($User_count > 0) {
            return response("email exists");
        } else {
            return response("unique email");
        }
    }


    function index_user()
    {

        $user = User::find(Auth::user()->id);

        $influencers = User::where('role', 'influencer')->get();

        $Users = User::where('role', 'user')->get();

        $last_three_posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->limit(3)->get();


        // Subscription deletion logic

        // $Subscriptions = Subscription::where('user_id',Auth::user()->id)->get();
        // foreach($Subscriptions as $Subscription) {
        //     $created_at = $Subscription->created_at;

        //     $time = strtotime($created_at);
        //     $Subscription_limit = date("Y-m-d", strtotime("+1 month", $time));
        //     $Subscription_limit = strtotime($Subscription_limit);

        //     $current_date = date("Y-m-d");
        //     $current_date = strtotime($current_date);


        //     if($current_date > $Subscription_limit) {
        //         $Subscription->delete();
        //     }


        // }


        return view('user.index', ['user' => $user, 'influencers' => $influencers, 'last_three_posts' => $last_three_posts, 'Users' => $Users]);
    }

    function posts()
    {


        $posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        $influencers = User::where('role', 'influencer')->get();

        return view('user.posts', ['posts' => $posts, 'influencers' => $influencers]);
    }

    function feed()
    {


        $posts = Post::where('influencer_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


        $influencers = User::where('role', 'influencer')->get();

        return view('user.feed', ['posts' => $posts, 'influencers' => $influencers]);
    }

    public function world()
    {
        $cutoffDateRecent = Carbon::now()->subDays(290);
        $cutoffDateOldest = Carbon::now()->subDays(38);

        $recentPosts = Post::select('posts.id', 'posts.influencer_id', 'posts.no_of_likes', 'posts.tagged_profile_pictures', 'posts.image_video', 'posts.created_at', 'posts.visible', 'posts.tags', 'posts.thumbnail')
    ->join('users', 'posts.influencer_id', '=', 'users.id')
    ->where('users.status', 'active')
    ->where('posts.created_at', '>=', $cutoffDateRecent)
    ->orderByDesc('posts.no_of_likes')
    ->orderByDesc('posts.created_at')
    ->get();


    $users = User::select('id', 'role', 'no_of_followers', 'vip')
    ->where('status', 'active')
    ->get()
    ->keyBy('id');
    
        $groupedRecent = $recentPosts->groupBy('influencer_id');

        $finalPosts = collect();
        $userPostCount = [];

        $addPostIfAllowed = function ($post) use (&$finalPosts, &$userPostCount) {
            $uid = $post->influencer_id;
            if (!isset($userPostCount[$uid])) {
                $userPostCount[$uid] = 0;
            }
            if ($userPostCount[$uid] < 3) {
                $finalPosts->push($post);
                $userPostCount[$uid]++;
            }
        };

    $randomHighLikesPosts = Post::select('posts.*')
    ->join('users', 'posts.influencer_id', '=', 'users.id')
    ->where('users.status', 'active')
    ->where('posts.no_of_likes', '>', 500)
    ->inRandomOrder()
    ->get();

        $seenUsers = [];
        $seenPosts = [];
        $topPostsWith10K = collect();

        foreach ($randomHighLikesPosts as $post) {
            if (!isset($users[$post->influencer_id])) continue;
            if (in_array($post->id, $seenPosts)) continue;

            if ($post->no_of_likes > 7000) {
                if (!isset($seenUsers[$post->influencer_id])) {
                    $seenUsers[$post->influencer_id] = 0;
                }

                if ($seenUsers[$post->influencer_id] < 3) {
                    $topPostsWith10K->push($post);
                    $seenPosts[] = $post->id;
                    $seenUsers[$post->influencer_id]++;
                }

                if ($topPostsWith10K->count() >= 5) break;
            }
        }

        foreach ($topPostsWith10K as $post) {
            $addPostIfAllowed($post);
        }

        $remainingRandomPosts = $randomHighLikesPosts->diff($topPostsWith10K);

        foreach ($remainingRandomPosts as $post) {
            if ($finalPosts->count() >= 15) break;
            $addPostIfAllowed($post);
        }

        $addedPostIds = [];

        foreach ($groupedRecent as $userId => $group) {
            $user = $users->get($userId);
            if (!$user) continue;

            $group = $group->sortByDesc('no_of_likes');

            $safeAdd = function ($post) use (&$addedPostIds, $addPostIfAllowed) {
                if (!in_array($post->id, $addedPostIds)) {
                    $addPostIfAllowed($post);
                    $addedPostIds[] = $post->id;
                }
            };

            if ($user->role === 'influencer') {
                foreach ($group->take(2) as $post) {
                    $safeAdd($post);
                }
            } else {
                $topPosts = $group->values();
                if ($topPosts->isNotEmpty()) {
                    $top1 = $topPosts->first();
                    $likes = $top1->no_of_likes;
                    $followers = max($user->no_of_followers, 1);

                    if ($topPosts->count() > 1 && $likes > $followers * 1.38) {
                        foreach ($topPosts->take(2) as $post) {
                            $safeAdd($post);
                        }
                    } else {
                        $safeAdd($top1);
                    }
                }
            }
        }

        if (rand(1, 100) <= 30) {
            $olderPosts = Post::select('id', 'influencer_id', 'no_of_likes', 'tagged_profile_pictures', 'image_video', 'created_at', 'visible', 'tags')
                ->whereBetween('created_at', [$cutoffDateOldest, $cutoffDateRecent])
                ->orderByDesc('no_of_likes')
                ->orderByDesc('created_at')
                ->get();

            $groupedOlder = $olderPosts->groupBy('influencer_id');

            foreach ($groupedOlder as $group) {
                $lastPost = $group->last();
                if ($lastPost) {
                    $addPostIfAllowed($lastPost);
                }
            }
        }


        // Final deduplication and sorting
        $finalPosts = $finalPosts->unique('id')->values();

        $finalPosts = $finalPosts->sortByDesc(function ($post) {
            return $post->no_of_likes * 1000000 + $post->created_at->timestamp;
        })->values();

        // ==== VIP Logic Starts Here ====
        $vipUsers = $users->filter(function ($user) {
            return $user->vip == 1;
        });

        $vipPosts = collect();
        foreach ($vipUsers as $vipUser) {
            $userPosts = $finalPosts->filter(function ($post) use ($vipUser) {
                return $post->influencer_id == $vipUser->id;
            });

            if ($userPosts->isNotEmpty()) {
                $vipPosts->push($userPosts->random());
            }
        }

        $nonVipPosts = $finalPosts->reject(function ($post) use ($vipPosts) {
            return $vipPosts->pluck('id')->contains($post->id);
        })->values();

        $injected = $nonVipPosts->slice(0, 15)->values();

        foreach ($vipPosts as $vipPost) {
            $position = rand(0, $injected->count());
            $injected->splice($position, 0, [$vipPost]);
            $injected = $injected->slice(0, 15);
        }

        $remainingPosts = $nonVipPosts->slice(15)->values();
        $finalPosts = $injected->concat($remainingPosts)->unique('id')->values();
        // ==== VIP Logic Ends ====

        // === Inject Ads After Every 12 Posts ===
        $ads = DB::table('ads')
            ->where('status', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

        $adsIndex = 0;
        $withAds = collect();

        foreach ($finalPosts as $index => $post) {
            $withAds->push($post);

            if (($index + 1) % 12 === 0 && isset($ads[$adsIndex])) {
                $ad = (object)[
                    'id' => 'ad_' . $ads[$adsIndex]->id,
                    'is_ad' => true,
                    'content' => $ads[$adsIndex],
                ];
                $withAds->push($ad);
                $adsIndex++;
            }
        }

        // === Paginate ===
        $perPage = 15;
        $currentPage = LengthAwarePaginator::resolveCurrentPage('page');
        $currentItems = $withAds->slice(($currentPage - 1) * $perPage, $perPage)->values();

        $postsPaginated = new LengthAwarePaginator(
            $currentItems,
            $withAds->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query() + ['page' => $currentPage]]
        );

        $influencers = User::where('role', 'influencer')->get();

        return view('user.world', [
            'posts' => $postsPaginated,
            'postz' => $postsPaginated,
            'influencers' => $influencers
        ]);
    }



    function influencers()
    {

        $influencers = User::where('role', 'influencer')->get();

        $user = User::find(Auth::user()->id);

        return view('user.influencers', ['influencers' => $influencers, 'user' => $user]);
    }


    function influencer_activity($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $User = User::where('username_URL', $username_URL)->first();

        $id = $User->id;

        $last_three_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->limit(2)->get();

        $influencers = User::where('role', 'influencer')->get();


        Session::put('user_ID', Auth::user()->id);

        Session::put('influencer_ID', $id);

        Session::put('amount', $User->price_of_subscription);


        return view('user.influencer_activity', ['last_three_posts' => $last_three_posts, 'id' => $id, 'influencers' => $influeencers]);
    }


    function influencer_posts($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $User = User::where('username_URL', $username_URL)->first();

        $id = $User->id;


        $all_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->get();

        $influencers = User::where('role', 'influencer')->get();


        return view('user.influencer_posts', ['all_posts' => $all_posts, 'id' => $id, 'influencers' => $influencers]);
    }

    function user_posts($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $User = User::where('username_URL', $username_URL)->first();

        $id = $User->id;

        $another_user_id = $id;

        $all_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->get();

        $influencers = User::where('role', 'influencer')->get();


        return view('user.user_posts', ['all_posts' => $all_posts, 'id' => $id, 'influencers' => $influencers, 'another_user_id' => $another_user_id]);
    }


    function user_activity($username_URL)
    {

        // $last_three_posts = Post::where('influencer_id',$id)->orderBy('id', 'DESC')->limit(2)->get();

        $user = User::where('username_URL', $username_URL)->first();


        $id = $user->id;

        $another_user_id = $id;

        $last_three_posts = Post::where('influencer_id', $id)->orderBy('id', 'DESC')->limit(2)->get();

        $influencers = User::where('role', 'influencer')->get();


        return view('user.user_activity', ['last_three_posts' => $last_three_posts, 'id' => $id, 'influencers' => $influencers, 'user' => $user, 'another_user_id' => $another_user_id]);
    }



    public function stripePostPremium(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = auth()->user();

        try {
            $customer = Customer::create([
                'email' => $user->email,
                'source' => $request->stripeToken,
            ]);

            $user->external_customer_id = $customer->id;
            $user->save();

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $request->amount * 100, // cents
                'currency' => 'usd',
                'description' => 'VIP Access for user ID ' . $user->id,
            ]);

            // Save payment record
            InfluencerPremium::create([
                'user_id' => $user->id,
                'influencer_id' => $request->influencer_id,
                'amount' => $request->amount / 100, // store in dollars
                'stripe_charge_id' => $charge->id,
            ]);

            return back()->with('message_subscription', 'Premium payment successful');
        } catch (CardException $e) {
            // Card declined, insufficient funds, etc.
            return back()->withErrors(['error' => 'Card error: ' . $e->getError()->message]);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            return back()->withErrors(['error' => 'Stripe API error: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Payment failed: ' . $e->getMessage()]);
        }
    }


    function stripePost(Request $request)
    {
        $price = $request->amount * 100;

        $influencer = User::find((int)$request->influencer_id);
        $product = Product::whereInfluencerId((int)$request->influencer_id)->first();

        $api_error = '';
        $email = Auth::user()->email;

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        $customer = \Stripe\Customer::create([
            'email' => $email,
            'source' => $request->stripeToken
        ]);


        $user = auth()->user();
        $user->external_customer_id = $customer->id;
        $user->save();


        $stripeProduct = Stripe\Product::retrieve($product->external_product_id);

        try {

            $newPrice = \Stripe\Price::create([
                'unit_amount' => $price,
                'currency' => 'usd',
                'product' => $stripeProduct->id,
                'recurring' => ['interval' => 'month'],
            ]);


            $subscription = \Stripe\Subscription::create([
                "customer" => $customer->id,
                "off_session" => true,
                "items" => [
                    [
                        'price' => $newPrice->id
                    ],
                ],
            ]);




            $stripeSubscription = new StripeSubscription();
            $stripeSubscription->user_id = auth()->user()->id;
            $stripeSubscription->external_subscription_id = $subscription->id;
            $stripeSubscription->amount = $price;
            $stripeSubscription->save();
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }


        if (isset($subscription) && $subscription->status === 'incomplete') {
            return Redirect::back()->with('message_subscription', "The subscription has not proceeded successfully.");
        } else {
            if (empty($api_error)) {
                // 1. Create the subscription
                $Subscription = new Subscription();
                $Subscription->user_id = $request->user_id;
                $Subscription->influencer_id = $request->influencer_id;
                $Subscription->amount = $request->amount;
                $Subscription->save();

                // 2. Get influencer and calculate their earnings
                $influencer = User::find($request->influencer_id);
                $subscriptionAmount = $request->amount;
                $isReferred = !empty($influencer->referred_influencer);

                $influencerPercentage = $isReferred ? 0.80 : 0.75;
                $influencerEarnings = $subscriptionAmount * $influencerPercentage;

                // 3. Save influencer earnings
                $influencer->earnings += $influencerEarnings;
                $influencer->save();

                // 4. Handle referrer (if influencer was referred)
                if ($isReferred) {
                    $referrer = User::where('username_URL', $influencer->referred_influencer)->first();

                    if ($referrer) {
                        $referrerBonus = $subscriptionAmount * 0.05;
                        $referrer->earnings += $referrerBonus;
                        $referrer->save();

                        // Log referral bonus
                       EarningsLog::create([
                            'user_id' => $referrer->id,
                            'source_user_id' => $influencer->id,
                            'amount' => $referrerBonus,
                            'earning_type' => 'referral_bonus',
                        ]);
                    }
                }

                // 5. Redirect with success message
                return Redirect::back()->with('message_subscription', 'Subscription purchased successfully.');
            } else {
                dd("Payment not successful: $api_error");
            }
        }
    }



   public function delete_subscription($id)
{
    $Subscription = Subscription::find($id);
    if (!$Subscription) {
        return redirect()->back()->with('error_subscription', 'Subscription not found.');
    }

    // Delete stored card(s) for this subscriber
\DB::table('redsys_cards')
    ->where('model_id', $Subscription->user_id)
    ->where('influencer_id', $Subscription->influencer_id)
    ->delete();


    // Delete subscription
    $Subscription->delete();

    return redirect()->back()->with('message_subscription', 'Subscription deleted successfully');
}


    function delete_followership($id)
    {

        $Followership = Followership::find($id);
        $Followership->delete();

        return redirect()->back()->with('message_follow', 'Followership deleted successfully');
    }


    function update_profile_image(Request $request)
    {


        $User = User::find($request->user_id);

        // $imageName = rand(1,10).$request->profile_image->getClientOriginalName();
        //  $imagePath = $request->profile_image->move(public_path('assets/images'), $imageName);
        //$imagePath = $request->profile_image->move('assets/images', $imageName);

        $imageName = Session::get('image_name');
        $User->profile_picture = $imageName;

        $User->save();

        return Redirect::back()->with('message', 'Profile picture updated');
    }


    function update_cover_image(Request $request)
    {


        $User = User::find($request->user_id);

        // $imageName = rand(1,10).$request->cover_image->getClientOriginalName();
        //  $imagePath = $request->cover_image->move(public_path('assets/images'), $imageName);
        // $imagePath = $request->cover_image->move('assets/images', $imageName);
        $imageName = Session::get('image_name');
        $User->cover_picture = $imageName;

        $User->save();

        return Redirect::back()->with('message', 'Cover picture updated');
    }


    public function updateCoverColor(Request $request)
    {
        $User = User::find($request->user_id);

        if (!$User) {
            return Redirect::back()->with('error', 'User not found.');
        }

        if (!empty($User->cover_picture)) {
            $User->cover_picture = null;
        }

        $User->cover_color = $request->cover_color;
        $User->save();

        return Redirect::back()->with('message', 'Cover color updated');
    }



    function add_post(Request $request)
    {

        $Post_count = Post::where('influencer_id', Auth::user()->id)->count();
        $Post_count = 0;

        if ($Post_count < 3) {

            $Post = new Post();
            $Post->influencer_id = $request->influencer_id;
            
            $file = $request->post_image_video;

            $imageName = rand(1, 10) . $request->post_image_video->getClientOriginalName();
            
               if ($request->filled('tags')) {
        $Post->tags = $request->input('tags');
    }

    if ($request->filled('tagged_user_profiles')) {
        $taggedProfiles = json_decode($request->input('tagged_user_profiles'), true);

        $profilePictures = array_map(function ($user) {
            return $user['profile_picture'] ?? null;
        }, $taggedProfiles);

        $Post->tagged_profile_pictures = implode(',', array_filter($profilePictures));
    }
            
            $mimeType = $file->getMimeType();
            // $imagePath = $request->post_image_video->move(public_path('assets/images'), $imageName);
            $imagePath = $request->post_image_video->move('assets/images', $imageName);
            $Post->image_video = $imageName;

if (str_starts_with($mimeType, 'video/')) {

    $thumbnailName = pathinfo($imageName, PATHINFO_FILENAME) . '.jpg';
     $thumbnailFolder = "/home/ednqswmq/live.superfanss.app/assets/images/thumbnails";
    $thumbnailPath = "$thumbnailFolder/$thumbnailName";


      if (!file_exists($thumbnailFolder)) {
        mkdir($thumbnailFolder, 0755, true);
    }

    // Generate thumbnail using FFmpeg
     $ffmpegCommand = "ffmpeg -i " . escapeshellarg($imagePath) . " -ss 00:00:01.000 -vframes 1 " . escapeshellarg($thumbnailPath);
    exec($ffmpegCommand);
    $Post->thumbnail = $thumbnailName;
}

            $Post->visible = 1;
            $Post->save();

            return Redirect::back()->with('post_added', 'Post Added')->with('post_added', 'Post Added');
        } else {
            return Redirect::back()->with('post_limit_reached', 'Post not Added(Limit reached)');
        }
    }

    public function toggle_all_visibility()
    {
        $userId = Auth::user()->id;

        $anyVisible = Post::where('influencer_id', $userId)
            ->where('visible', 1)
            ->exists();

        $newVisibility = $anyVisible ? 0 : 1;

        Post::where('influencer_id', $userId)->update(['visible' => $newVisibility]);

        return redirect()->back()->with('success', 'All posts visibility toggled.');
    }




    public function visible_post($id)
    {
        $Post = Post::find($id);

        if (!$Post) {
            return redirect()->back()->with('error', 'Post not found.');
        }

        $Post->visible = $Post->visible == 1 ? 0 : 1;
        $Post->save();

        return redirect()->back()->with('post_added', true)->with('success', 'Post visibility updated.');
    }



    function delete_post($id)
    {
        $Post = Post::find($id);
        if ($Post != null) {
            $Post->delete();
        }


        return Redirect::back()->with('post_added', 'Post Deleted');
    }

    function delete_all_post($id)
    {
        $Post = Post::find($id);
        if ($Post != null) {
            $Post->delete();
        }


        return Redirect::back()->with('all_post', 'Post Deleted');
    }

    function follow(Request $request)
    {
        $followed_user_id = $request->followed_user_id;
        $follower_user_id = $request->follower_user_id;

        $Followership = new Followership();
        $Followership->followed_user_id = $followed_user_id;
        $Followership->follower_user_id = $follower_user_id;
        $Followership->save();

        // $Followed_user = User::find($request->followed_user_id);
        // $Followed_user->no_of_followers = $Followed_user->no_of_followers + 1;
        // $Followed_user->save();

        return Redirect::back()->with('message_follow', 'Followed Successfully');
    }


    function request_creater_account(Request $request)
    {
        $user_id = $request->user_id;

        $User = User::find($user_id);
        $User->role = "influencer";
        $User->save();

        return Redirect::back()->with('message', 'Congrats, You are creator now.');
    }


    function success_payment_paypal()
    {

        $amount = Session::get('amount');
        $user_ID = Session::get('user_ID');
        $influencer_ID = Session::get('influencer_ID');

        $Subscription = new Subscription();
        $Subscription->user_id = $user_ID;
        $Subscription->influencer_id = $influencer_ID;
        $Subscription->amount = $amount;
        $Subscription->save();


        $Influencer = User::find($influencer_ID);
        $Influencer_username = $Influencer->username_URL;


        return redirect('/user/influencer/' . $Influencer_username . '')->with('message_subscription', 'Subscription purchased successfully');
    }


    function footer_name_username(Request $request)
    {
        $User = User::find($request->user_id);
        $User->footer_name_username = $request->footer_name_username;
        $User->save();

        return Redirect::back()->with('message', 'Footer content editted successfully');
    }


    function post_detail($id)
    {
        $current_post = Post::find($id);

        $influencer_id = $current_post->influencer_id;

        $posts = Post::where('influencer_id', $influencer_id)->get(); // posts for showing in feed

        // dd($influencer_id);

        // if($influencer_id == Auth::user()->id) {

        // } else {

        // }

        $Posts = Post::where('influencer_id', $influencer_id)->get();

        $next = 0;
        $prev_post_id = null;
        $next_post_id = null;

        foreach ($Posts as $Post) {

            if ($Post->id < $current_post->id) {
                $prev_post_id = $Post->id;
            }


            if ($Post->id > $current_post->id) {
                if ($next == 0) {
                    $next_post_id = $Post->id;
                    $next = 1;
                }
            }
        }

        if (!isset($prev_post_id)) {
            $Post = Post::where('influencer_id', $influencer_id)->get()->last();
            $prev_post_id = $Post->id;
        }

        if (!isset($next_post_id)) {
            $Post = Post::where('influencer_id', $influencer_id)->first();
            $next_post_id = $Post->id;
        }

        $influencers = User::where('role', 'influencer')->get();
        // $posts = Post::where('influencer_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        return view('user.post_detail', ['current_post' => $current_post, 'prev_post_id' => $prev_post_id, 'next_post_id' => $next_post_id, 'influencers' => $influencers, 'posts' => $posts]);
    }


    function update_username_url(Request $request)
    {
        $User = User::find($request->influencer_id);

        $username_url_check = User::where('username_URL', $request->username_url)->count();

        if ($username_url_check == 0) {
            $User->username_URL = $request->username_url;
            $User->save();
            return Redirect::back()->with('message', 'Username/url editted successfully');
        } else {
            return Redirect::back()->with('duplicate_error', 'The username is already associated with an account');
        }


        //  return Redirect::back()->with('message', 'Username/url editted successfully');
    }


    function update_bank_account(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->bank_account = $request->bank_account;
        $User->save();

        return Redirect::back()->with('message', 'Bank account editted successfully');
    }

    function update_paypal_account(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->paypal_account = $request->paypal_account;
        $User->save();

        return Redirect::back()->with('message', 'Paypal account editted successfully');
    }


    function update_name(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->name = $request->name;
        $User->save();

        return Redirect::back()->with('message', 'Name editted successfully');
    }

    function update_surname(Request $request)
    {
        $User = User::find($request->influencer_id);
        $User->surname = $request->surname;
        $User->save();

        return Redirect::back()->with('message', 'Surname editted successfully');
    }

    function update_email(Request $request)
    {
        $User = User::find($request->influencer_id);


        $email_check = User::where('email', $request->email)->count();

        if ($email_check == 0) {
            $User->email = $request->email;
            $User->save();
            return Redirect::back()->with('message', 'Email editted successfully');
        } else {
            return Redirect::back()->with('duplicate_error', 'The email is already associated with an account');
        }
    }


    function update_password(Request $request)
    {
        $User = User::find($request->influencer_id);
        $password = Hash::make($request->password);
        $User->password = $password;
        $User->save();

        return Redirect::back()->with('message', 'Password editted successfully');
    }


    function like_dislike_post(Request $request)
    {
        $Like = Like::where("post_id", $request->post_id)->where("user_id", Auth::user()->id)->first();

        if ($Like === null) {

            $Post = Post::find($request->post_id);

            $influencer_id = $Post->influencer_id;

            $Like = new Like();
            $Like->post_id = $request->post_id;
            $Like->user_id = Auth::user()->id;
            $Like->influencer_id = $influencer_id;
            $Like->save();
            return response("post liked");
        } else {
            $Like->delete();
            return response("post disliked");
        }
    }


    function user_profile($username)
    {

        $user = User::where('username_URL', request()->path())->first();
    if ($user === null || !$user->status) {
            abort(404);
        }

    if ($user->status === 'suspended' || $user->status === 'deleted') {
        return response()->view('errors.custom_user_error', [
            'status' => $user->status
        ]);
    }  else {

            $influencers = User::where('role', 'influencer')->get();

            $Users = User::where('role', 'user')->get();

            $last_three_posts = Post::where('influencer_id', $user->id)->orderBy('id', 'DESC')->limit(2)->get();

            //            Followership::where('followed_user_id', $user->id)->delete();
            return view('user_profile', ['user' => $user, 'influencers' => $influencers, 'last_three_posts' => $last_three_posts, 'Users' => $Users]);
        }
    }


    public function direct_user_posts($username)
    {

        $user = User::where('username_URL', $username)->first();
        if ($user === null) {
            abort(404);
        } else {

            $influencers = User::where('role', 'influencer')->get();

            $Users = User::where('role', 'user')->get();

            $posts = Post::where('influencer_id', $user->id)->orderBy('id', 'DESC')->get();


        $ads = DB::table('ads')
            ->where('status', 1)
            ->inRandomOrder()
            ->take(5)
            ->get();

            return view('user_posts', ['user' => $user, 'influencers' => $influencers, 'posts' => $posts, 'Users' => $Users, 'ads' => $ads]);
        }
    }


    function direct_user_post_detail($id)
    {

        $current_post = Post::find($id);

        $influencer_id = $current_post->influencer_id;

        $user = User::find($influencer_id);

        $Posts = Post::where('influencer_id', $influencer_id)->get();

        $next = 0;
        $prev_post_id = null;
        $next_post_id = null;

        foreach ($Posts as $Post) {

            if ($Post->id < $current_post->id) {
                $prev_post_id = $Post->id;
            }


            if ($Post->id > $current_post->id) {
                if ($next == 0) {
                    $next_post_id = $Post->id;
                    $next = 1;
                }
            }
        }

        if (!isset($prev_post_id)) {
            $Post = Post::where('influencer_id', $influencer_id)->get()->last();
            $prev_post_id = $Post->id;
        }

        if (!isset($next_post_id)) {
            $Post = Post::where('influencer_id', $influencer_id)->first();
            $next_post_id = $Post->id;
        }

        $influencers = User::where('role', 'influencer')->get();
        //$posts = Post::where('influencer_id',Auth::user()->id)->orderBy('id', 'DESC')->get();
        // , 'posts'=>$posts
        return view('post_detail', ['current_post' => $current_post, 'prev_post_id' => $prev_post_id, 'next_post_id' => $next_post_id, 'influencers' => $influencers, 'user' => $user, 'posts' => $Posts]);
    }


    function upload_image(Request $request)
    {

        // if($request->image != "")
        // {

        //     $imageName = rand(1,10).$request->image->getClientOriginalName();
        //      $imagePath = $request->image->move(public_path('assets/images'), $imageName);
        //     //$imagePath = $request->image->move('assets/images', $imageName);


        // }

        // $response_var = $imageName;
        // return response($response_var);


        $data = $request->image;

        $image_array_1 = explode(";", $data);

        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);

        $time = time();

        $imageName = 'assets/images/image' . $time . '.png';

        file_put_contents($imageName, $data);

        // $imageName = rand(1,1000);
        //  $imagePath = move(public_path('assets/images'), $data);

        // echo $imageName;
        Session::put('image_name', 'image' . $time . '.png');
        return response('image' . $time . '.png');
    }

    public function updateBio(Request $request)
    {
        $request->validate([
            'bio' => 'required|string|max:500',
        ]);

        $user = auth()->user();
        $user->bio = $request->bio;
        $user->save();

        return redirect()->back()->with('success', 'Bio updated successfully.');
    }
}
