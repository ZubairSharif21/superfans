<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Models\User;
use App\Http\Controllers\MerchandisingController;
use App\Helpers\LiveKitToken;
use App\Http\Controllers\RedsysTestController;
use App\Http\Controllers\StreamController;

use Creagia\LaravelRedsys\RequestBuilder;
use Creagia\Redsys\Support\RequestParameters;
use Creagia\Redsys\Enums\Currency;
use Creagia\Redsys\Enums\PayMethod;
use Creagia\Redsys\Enums\TransactionType;
use Creagia\Redsys\Enums\CofType;

use Illuminate\Support\Facades\Artisan;
use App\Models\Payment;
use App\Models\Subscription;
use App\Http\Controllers\AdCenterController;
use App\Http\Controllers\AdsPaymentController;

Route::get('/test-recurring', function () {
    Artisan::call('payments:process-recurring');
    return 'Recurring payments command executed!';
});



Route::get('/test-charge/{userId}', function ($userId) {
    $user = User::find($userId);
    if (!$user) {
        return "❌ No user found with ID {$userId}";
    }

    $redsysCard = $user->redsysCards()->latest()->first();
    if (!$redsysCard) {
        return "❌ No stored Redsys card found for user {$user->id}";
    }

    $amountInCents = (int) round(0.10 * 100);

    $params = new RequestParameters(
        amountInCents: $amountInCents,
        currency: Currency::EUR,
        transactionType: TransactionType::Autorizacion,
        productDescription: "Manual recurring test charge"
    );

    try {
        $redsysRequest = RequestBuilder::newRequest($params)
            ->associateWithModel($user)
            ->usingCard(CofType::Recurring, $redsysCard);

        $response = $redsysRequest->post();

        // 🔎 Debug everything Redsys gives back
   

        // Or if you prefer logging instead of killing the request:
        // dump($response);
        // logger()->info('Redsys raw response', (array) $response);
           $code = $response->merchantParametersArray['Ds_Response'] ?? null;

            if ($code === '0000') {
            // ✅ Record payment
            Payment::create([
                'user_id' => $user->id,
                'amount'  => 0.2,
                'method'  => 'redsys Test',
            ]);

            return "✅ Success: Charged user {$user->id}, payment saved, subscription updated.";
        } else {
            return "❌ Failed: Response code {$code}";
        }

    } catch (\Exception $e) {
        return "❌ Exception: " . $e->getMessage();
    }
});


Route::get('ads/check/{ad}', function ($ad) {
    $paid = \App\Models\AdPayment::where('user_id', auth()->id())
             ->where('ad_id', $ad)
             ->exists();

    return response()->json(['paid' => $paid]);
});
    Route::post('/payment', [AdsPaymentController::class, 'pay'])->name('ads.pay');
    Route::get('/payment/success', [AdsPaymentController::class, 'success'])->name('ads.pay.success');

Route::get('/test-redsys-link', function () {
    $params = new RequestParameters(
        amountInCents: 100, // 1.00 EUR
        currency: Currency::EUR,
        productDescription: 'Test payment',
        payMethods: PayMethod::Card,
        transactionType: TransactionType::Autorizacion,
    );

    $redsysRequest = RequestBuilder::newRequest($params);
    return $redsysRequest->redirect();
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Show the payment form
Route::view('/pay', 'redsys.pay')->name('pay');
Route::delete('/redsys/cancel-verification', [RedsysTestController::class, 'cancelVerification'])->name('redsys.cancelVerification');

// Handle the form and redirect to Redsys
Route::post('/pay/now', [RedsysTestController::class, 'redirect'])->name('redsys.now');
Route::post('/redsys/callback', [RedsysTestController::class, 'callback'])->name('redsys.callback');

Route::get('/redsys/success', [RedsysTestController::class, 'redsysSuccess'])
     ->name('redsys.success');
Route::get('/redsys/fail', fn() => '❌ Payment failed!')->name('redsys.fail');



Route::post('/create-room', [StreamController::class, 'createRoom']);
Route::get('/streamtoken', [StreamController::class, 'getStreamToken']);
Route::get('/start-stream/{room}', [StreamController::class, 'startStream']);



// Route::get('/get-token', function (\Illuminate\Http\Request $request) {
//     $room = $request->get('room', 'default-room');
//     $user = $request->get('user', 'guest');

//     $apiKey = env('LIVEKIT_API_KEY');
// $apiSecret = env('LIVEKIT_API_SECRET');
// $token = LiveKitToken::generate($room, $user, $apiKey, $apiSecret);

//     return response()->json(['token' => $token]);
// });

Route::get('/watch-live', function () {
    return view('watch-live');
});

Route::get('/livekit-test', function () {
    return view('livekit-test');
});

Route::post('/upload_profile_image', [App\Http\Controllers\UploadController::class, 'uploadProfileImage']);
Route::post('/upload_cover_image', [App\Http\Controllers\UploadController::class, 'uploadCoverImage']);


Route::get('/rankings', [App\Http\Controllers\RankingController::class, 'index'])->name('rankings');

Route::get('/bronze/load-more', [App\Http\Controllers\RankingController::class, 'loadMoreBronze']);

Route::middleware(['auth','not_business'])->group(function () {
    Route::post('/{user}/block', [App\Http\Controllers\BlockUserController::class, 'block'])->name('user.block');
    Route::post('/{user}/unblock', [App\Http\Controllers\BlockUserController::class, 'unblock'])->name('user.unblock');
});

//---Start SuperAds

Route::prefix('super-ads')->name('ads.')->middleware(['restrict_super_ads'])->group(function () {
    // Dashboard 
   Route::get('/', [AdCenterController::class, 'index'])->name('index');




    // Type-specific ads 
    Route::get('/{type}', [AdCenterController::class, 'type'])->name('type');
    Route::get('/{type}/create', [AdCenterController::class, 'create'])->name('create');
    Route::post('/{type}/store', [AdCenterController::class, 'store'])->name('store');
    Route::get('/{type}/{ad}/show', [AdCenterController::class, 'show'])->name('show');
    Route::get('/{type}/{ad}/edit', [AdCenterController::class, 'edit'])->name('edit');
    Route::put('/{type}/{ad}/update', [AdCenterController::class, 'update'])->name('update');
    Route::delete('/{type}/{ad}/delete', [AdCenterController::class, 'destroy'])->name('destroy');
    
    






});

// Route::middleware(['restrict_super_ads'])->group(function () {
    Route::get('/ads/instagram/preview', [AdCenterController::class, 'instagramPreview']);

    //   }); 

//---End SuperAds


Route::get('lang/{locale}', function ($locale) {
    session(['locale' => $locale]);
    app()->setLocale($locale);
    return redirect()->back();
})->name('lang.switch');

Route::post('/report-post', [App\Http\Controllers\ReportController::Class, 'send'])->name('report.post');
Route::post('/report-user', [App\Http\Controllers\ReportController::Class, 'reportUser'])->name('report.user');

Route::get('/autocomplete-influencer-search', [App\Http\Controllers\InfluencerController::Class, 'autocompleteInfluencerSearch']);

Route::get('/autocomplete-user-search', [App\Http\Controllers\InfluencerController::Class, 'autocompleteUserSearch']);

// Route::get('/', function () {
//      return view('index');
// });

Route::get('/creador', function () {
    $influencers = User::where('role', 'influencer')
        ->select('id', 'username_URL')
        ->get();

    return view('auth.register_i', compact('influencers'));
});

Route::get('/creador/confirm', function () {
    return view('auth/influencer_r');
});
// use App\Http\Controllers\BuisnessController;
 
Route::get('/business/register', [App\Http\Controllers\BuisnessController::class, 'showRegistrationForm'])->name('buisness.register.form');
Route::get('/business/login', [App\Http\Controllers\BuisnessController::class, 'showLoginForm'])->name('buisness.login.form');

Route::post('/business/register', [App\Http\Controllers\BuisnessController::class, 'register'])->name('buisness.register');
Route::post('/business/login', [App\Http\Controllers\BuisnessController::class, 'login'])->name('buisness.login');

Route::get('/business/logout', [App\Http\Controllers\BuisnessController::class, 'logout'])->name('buisness.logout');





Route::get('/fan', function () {
    return view('auth/register_u');
});

Route::get('/world', [App\Http\Controllers\WorldController::class, 'world']);

// Route::get('/', function () {
//      return redirect('/login');
//  });

Route::get('/', [App\Http\Controllers\UserController::Class, 'index']);

Route::fallback([App\Http\Controllers\UserController::Class, 'user_profile']);

Route::get('/posts/{username}', [App\Http\Controllers\UserController::Class, 'direct_user_posts']);

Route::get('/post/{id}', [App\Http\Controllers\UserController::Class, 'direct_user_post_detail']);

// Route:: prefix('/')->middleware(['access_allow'])->group(
//      function () {




Route::prefix('merchandising')->name('merchandising.')->group(function () {
    Route::get('/', [MerchandisingController::class, 'index'])->name('index');
    Route::get('/{slug}', [MerchandisingController::class, 'show'])->name('show');
        Route::post('/purchase', [MerchandisingController::class, 'purchase'])->name('purchase');
        
        Route::post('/purchase/confirm', [MerchandisingController::class, 'confirm'])->name('confirm.purchase');


});

Route:: prefix('/user')->middleware(['auth','not_business'])->group(
    function () {


        Route::get('/', [App\Http\Controllers\UserController::Class, 'index']);


    });


Route:: prefix('/admin')->middleware(['auth', 'admin','not_business'])->group(
    function () {

        // Route::get('/', function () {
        //      return view('admin.index');
        // });


        Route::get('/', [App\Http\Controllers\AdminController::Class, 'index']);


    });


Route:: prefix('/influencer')->middleware(['auth', 'influencer','not_business'])->group(
    function () {

        // Route::get('/', function () {
        //      return view('admin.index');
        // });


        Route::get('/', [App\Http\Controllers\InfluencerController::Class, 'index']);

        Route::get('/posts', [App\Http\Controllers\InfluencerController::Class, 'posts']);

        Route::get('/feed', [App\Http\Controllers\InfluencerController::Class, 'feed']);
        
        Route::get('/world', [App\Http\Controllers\InfluencerController::Class, 'world']);
        
        Route::post('/update_bio', [App\Http\Controllers\InfluencerController::Class, 'update_bio'])->name('influencer.update_bio');
        
        Route::get('/messages', [App\Http\Controllers\InfluencerController::Class, 'messages']);

        Route::post('/add_post', [App\Http\Controllers\InfluencerController::Class, 'add_post']);
        
        Route::post('/update-chat-toggle', [App\Http\Controllers\InfluencerController::Class, 'updateChatToggle'])->name('update.chat_toggle');

        Route::get('/delete_post/{id}', [App\Http\Controllers\InfluencerController::Class, 'delete_post']);
        
          Route::get('/delete_all_post/{id}', [App\Http\Controllers\InfluencerController::Class, 'delete_all_post']);
        
        Route::post('/visible_post/{id}', [App\Http\Controllers\InfluencerController::Class, 'visible_post']);
        
        Route::post('/toggle_all_visibility', [App\Http\Controllers\InfluencerController::Class, 'toggle_all_visibility']);

        Route::post('/update_username_url', [App\Http\Controllers\InfluencerController::Class, 'update_username_url']);

        Route::post('/update_price_of_subscription', [App\Http\Controllers\InfluencerController::Class, 'update_price_of_subscription']);

        Route::post('/update_earnings', [App\Http\Controllers\InfluencerController::Class, 'update_earnings']);

        Route::post('/toggle-vip-status', [App\Http\Controllers\InfluencerController::Class, 'toggleVipStatus'])->name('toggle_vip_status');

        Route::get('/post_detail/{id}', [App\Http\Controllers\InfluencerController::Class, 'post_detail']);


        Route::post('/update_profile_image', [App\Http\Controllers\InfluencerController::Class, 'update_profile_image']);

        Route::post('/update_cover_image', [App\Http\Controllers\InfluencerController::Class, 'update_cover_image']);
        
        Route::post('/update_cover_color', [App\Http\Controllers\InfluencerController::Class, 'updateCoverColor'])->name('influencer.updateCoverColor');

        Route::post('/update_bank_account', [App\Http\Controllers\InfluencerController::Class, 'update_bank_account']);

        // Route::post('/update_bank_account',[ App\Http\Controllers\InfluencerController::Class,'update_bank_account']);

        Route::post('/update_paypal_account', [App\Http\Controllers\InfluencerController::Class, 'update_paypal_account']);

        Route::post('/update_email', [App\Http\Controllers\InfluencerController::Class, 'update_email']);

        Route::post('/update_password', [App\Http\Controllers\InfluencerController::Class, 'update_password']);


        Route::post('/update_surname', [App\Http\Controllers\InfluencerController::Class, 'update_surname']);

        Route::post('/update_name', [App\Http\Controllers\InfluencerController::Class, 'update_name']);


        Route::get('/influencers', [App\Http\Controllers\InfluencerController::Class, 'influencers']);

        Route::get('/influencer/{username_URL}', [App\Http\Controllers\InfluencerController::Class, 'influencer_activity']);

        Route::get('/influencer_posts/{username_URL}', [App\Http\Controllers\InfluencerController::Class, 'influencer_posts']);

        Route::get('/user/{username_URL}', [App\Http\Controllers\InfluencerController::Class, 'user_activity']);

        Route::get('/user_posts/{username_URL}', [App\Http\Controllers\InfluencerController::Class, 'user_posts']);

        Route::post('/footer_name_username', [App\Http\Controllers\InfluencerController::Class, 'footer_name_username']);

        Route::post('/withdraw_earnings', [App\Http\Controllers\InfluencerController::Class, 'withdraw_earnings']);
        
        //ad management
        
        Route::get('/ads', [App\Http\Controllers\InfluencerController::Class, 'ads']);
        Route::post('/ads/add', [App\Http\Controllers\InfluencerController::Class, 'addAd']);
        Route::post('/ads/{id}/toggle', [App\Http\Controllers\InfluencerController::Class, 'toggleAd']);
        Route::post('/ads/{id}/delete', [App\Http\Controllers\InfluencerController::Class, 'deleteAd']);
        
        // News Routes
    Route::get('/news', [App\Http\Controllers\InfluencerController::class, 'newsIndex'])->name('news.index');
    Route::get('/news/create', [App\Http\Controllers\InfluencerController::class, 'newsCreate'])->name('news.create');
    Route::post('/news', [App\Http\Controllers\InfluencerController::class, 'newsStore'])->name('news.store');
    Route::get('/news/{news}/edit', [App\Http\Controllers\InfluencerController::class, 'newsEdit'])->name('news.edit');
    Route::post('/news/{news}/update', [App\Http\Controllers\InfluencerController::class, 'newsUpdate'])->name('news.update');
    Route::post('/news/{news}/delete', [App\Http\Controllers\InfluencerController::class, 'newsDestroy'])->name('news.delete');


        //verified influencers
        Route::post('/verify-influencer', [App\Http\Controllers\InfluencerController::Class, 'verifyInfluencer'])->name('verify_influencer');
        //gear Growth
        
        Route::post('/start-automatic-growth', [App\Http\Controllers\InfluencerController::Class, 'startAutomaticGrowth'])->name('start_automatic_growth');

         Route::get('/growth/process', [App\Http\Controllers\InfluencerController::Class, 'processGrowth']);

        // Followers Changes

        Route::get('/all_users', [App\Http\Controllers\InfluencerController::Class, 'all_users']);

        Route::post('/update_followers/{id}', [App\Http\Controllers\InfluencerController::Class, 'update_followers']);
//suspend and delete user 

Route::post('/suspend_user/{id}', [App\Http\Controllers\InfluencerController::class, 'suspendUser'])->name('suspend_user');
Route::post('/delete_user/{id}', [App\Http\Controllers\InfluencerController::class, 'deleteUser'])->name('delete_user');


        //   Likes Changes
        Route::post('/all_user_posts/{id}', [App\Http\Controllers\InfluencerController::Class, 'all_user_posts']);

        Route::post('/update_likes/{id}', [App\Http\Controllers\InfluencerController::Class, 'update_likes']);

    });

Route::get('/influencer/like_dislike_post', [App\Http\Controllers\InfluencerController::Class, 'like_dislike_post']);


Route::post('/networks_url', [App\Http\Controllers\InfluencerController::Class, 'networks_url']);

Route::get('/delete_network/{id}', [App\Http\Controllers\InfluencerController::Class, 'delete_network']);


Route::post('/influencer/update_first_network', [App\Http\Controllers\InfluencerController::Class, 'update_first_network']);

Route::post('/influencer/add_network', [App\Http\Controllers\InfluencerController::Class, 'add_network']);

Route::post('/influencer/update_instagram_link', [App\Http\Controllers\InfluencerController::Class, 'update_instagram_link']);


Route::post('/influencer/update_profile_picture_border_status', [App\Http\Controllers\InfluencerController::Class, 'update_profile_picture_border_status']);


// });
        Route::get('/user/world', [App\Http\Controllers\UserController::Class, 'world']);

Route:: prefix('/user')->middleware(['auth', 'User','not_business'])->group(
    function () {


        Route::get('/', [App\Http\Controllers\UserController::Class, 'index_user']);

        Route::get('/posts', [App\Http\Controllers\UserController::Class, 'posts']);

        Route::get('/feed', [App\Http\Controllers\UserController::Class, 'feed']); 
        
        Route::get('/world', [App\Http\Controllers\UserController::Class, 'world']);
        
        Route::post('/update_bio', [App\Http\Controllers\UserController::Class, 'updateBio'])->name('user.update_bio');
        
        Route::get('/messages', [App\Http\Controllers\InfluencerController::Class, 'messages']);

        Route::get('/influencers', [App\Http\Controllers\UserController::Class, 'influencers']);
        
        Route::post('/visible_post/{id}', [App\Http\Controllers\UserController::Class, 'visible_post']);
        
       Route::post('/toggle_all_visibility', [App\Http\Controllers\UserController::Class, 'toggle_all_visibility']);

        Route::get('/influencer/{username_URL}', [App\Http\Controllers\UserController::Class, 'influencer_activity']);

        Route::get('/influencer_posts/{username_URL}', [App\Http\Controllers\UserController::Class, 'influencer_posts']);

        Route::get('/user_posts/{username_URL}', [App\Http\Controllers\UserController::Class, 'user_posts']);

        Route::get('/user/{username_URL}', [App\Http\Controllers\UserController::Class, 'user_activity']);

        // Route::post('/stripe', [ App\Http\Controllers\UserController::Class,'stripePost'])->name('stripe.post');

        // Route::get('/delete_subscription/{id}',[ App\Http\Controllers\UserController::Class,'delete_subscription']);

        // Route::get('/delete_followership/{id}',[ App\Http\Controllers\UserController::Class,'delete_followership']);


        Route::post('/update_profile_image', [App\Http\Controllers\UserController::Class, 'update_profile_image']);

        Route::post('/update_cover_image', [App\Http\Controllers\UserController::Class, 'update_cover_image']);
        
        Route::post('/update_cover_color', [App\Http\Controllers\UserController::Class, 'updateCoverColor'])->name('user.updateCoverColor');

        Route::post('/add_post', [App\Http\Controllers\UserController::Class, 'add_post']);

        Route::get('/delete_post/{id}', [App\Http\Controllers\UserController::Class, 'delete_post']);
        
        Route::get('/delete_all_post/{id}', [App\Http\Controllers\UserController::Class, 'delete_all_post']);


        // Route::post('/follow',[ App\Http\Controllers\UserController::Class,'follow']);

        Route::post('/request_creater_account', [App\Http\Controllers\UserController::Class, 'request_creater_account']);

        Route::post('/charge', [App\Http\Controllers\UserController::Class, 'charge']);
        Route::get('/paymentsuccess', [App\Http\Controllers\UserController::Class, 'payment_success']);
        Route::get('/paymenterror', [App\Http\Controllers\UserController::Class, 'payment_error']);


        Route::get('/success_payment_paypal', [App\Http\Controllers\UserController::Class, 'success_payment_paypal']);

        Route::post('/footer_name_username', [App\Http\Controllers\UserController::Class, 'footer_name_username']);

        Route::get('/post_detail/{id}', [App\Http\Controllers\UserController::Class, 'post_detail']);

        Route::post('/update_username_url', [App\Http\Controllers\UserController::Class, 'update_username_url']);


        Route::post('/update_bank_account', [App\Http\Controllers\InfluencerController::Class, 'update_bank_account']);

        Route::post('/update_paypal_account', [App\Http\Controllers\InfluencerController::Class, 'update_paypal_account']);

        Route::post('/update_email', [App\Http\Controllers\InfluencerController::Class, 'update_email']);

        Route::post('/update_password', [App\Http\Controllers\InfluencerController::Class, 'update_password']);

        Route::post('/update_surname', [App\Http\Controllers\InfluencerController::Class, 'update_surname']);
        Route::post('/update_birth', [App\Http\Controllers\InfluencerController::Class, 'update_birth']);
Route::post('/update_country', [App\Http\Controllers\InfluencerController::Class, 'update_country']);
Route::post('/update_gender', [App\Http\Controllers\InfluencerController::Class, 'update_gender']);


        Route::post('/update_name', [App\Http\Controllers\InfluencerController::Class, 'update_name']);


    });


Route::get('/user/like_dislike_post', [App\Http\Controllers\UserController::Class, 'like_dislike_post']);

Route::post('/user/stripe', [App\Http\Controllers\UserController::Class, 'stripePost'])->name('stripe.post');

Route::post('/user/stripe-premium', [App\Http\Controllers\UserController::Class, 'stripePostPremium'])->name('stripe.premium');

Route::get('/user/delete_subscription/{id}', [App\Http\Controllers\UserController::Class, 'delete_subscription']);

Route::get('/user/delete_followership/{id}', [App\Http\Controllers\UserController::Class, 'delete_followership']);

Route::post('/user/follow', [App\Http\Controllers\UserController::Class, 'follow']);


Route::get('/check_duplicate_email_username', [App\Http\Controllers\InfluencerController::class, 'check_duplicate_email_username']);

Route::get('/check_duplicate_email', [App\Http\Controllers\UserController::class, 'check_duplicate_email']);

Route::post('/upload_image', [App\Http\Controllers\UserController::Class, 'upload_image']);


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);

// Route::get('/custom_logout', [App\Http\Controllers\HomeController::class, 'custom_logout']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'chat'], function () {
    Route::post('/', [ChatController::class, 'create'])->name('chat.create');
    Route::get('/{influencer_id}',[ChatController::class,'retrieveChat'])->name('chat.read');
    Route::group(['prefix' => 'chat/{chat}'], function ($chat) {
        Route::post('/message')->name('chat.message.create');
        Route::get('/message/{message}/set-ass-read')->name('chat.message.set-as-read');
    });
});

Route::get('/chats/messages', [ChatController::class, 'getMessages']);

Route::post('/chats/send', [ChatController::class, 'sendMessage']);


// Route::get('/login', function () {
//      return view('auth.login');}
// );

// Route::get('/register', function () {
//      return view('auth.register');}
// );
