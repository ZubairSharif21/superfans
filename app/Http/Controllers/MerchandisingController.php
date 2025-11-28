<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProductPurchase;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Creagia\Redsys\Facades\Redsys;
use App\Models\EarningsLog;
use Creagia\Redsys\RedsysClient;
use Creagia\Redsys\Support\RequestParameters;
use Creagia\Redsys\Enums\Currency;
use Creagia\Redsys\Enums\PayMethod;
use Creagia\Redsys\Enums\TransactionType;
use Creagia\Redsys\Enums\Environment;
use Creagia\LaravelRedsys\RequestBuilder;

class MerchandisingController extends Controller
{
        protected $products = [
 
    ['name' => 'SuperTop', 'color' => 'White', 'tag' => 'Small logo', 'price' => 45, 'image' => 'topBlanco_Small.jpg', 'slug' => 'topblanco-small'],
    ['name' => 'SuperTop', 'color' => 'White', 'tag' => 'Big logo', 'price' => 45, 'image' => 'topBlanco_Normal.jpg', 'slug' => 'topblanco-normal'],
    ['name' => 'SuperTop', 'color' => 'White + Red', 'tag' => '#Rich Without Porn', 'price' => 45, 'image' => 'topBlanco_Normal - Rich without porn_Red.jpg', 'slug' => 'topblanco-rich-without-porn-red'],
    ['name' => 'SuperTop', 'color' => 'White + Red', 'tag' => 'Rich Making Virals', 'price' => 45, 'image' => 'topBlanco_Normal - Rich making virals_Red.jpg', 'slug' => 'topblanco-rich-making-virals-red'],
    ['name' => 'SuperTop', 'color' => 'White', 'tag' => '#Rich Without Porn', 'price' => 45, 'image' => 'topBlanco - Rich Without Porn.jpg', 'slug' => 'topblanco-rich-without-porn'],
    ['name' => 'SuperTop', 'color' => 'White', 'tag' => 'Rich Making Virals', 'price' => 45, 'image' => 'topBlanco - Rich Making Virals.png', 'slug' => 'topblanco-rich-making-virals'],
    
    
      ['name' => 'SuperTop Galaxy', 'color' => 'Colores', 'tag' => '#Rich Without Porn', 'price' => 45, 'image' => 'topGalaxy - Rich Without Porn.jpg', 'slug' => 'topgalaxy-rich-without-porn'],
    ['name' => 'SuperTop Galaxy', 'color' => 'Colores', 'tag' => 'Small Logo', 'price' => 45, 'image' => 'topGalaxy_Small.jpg', 'slug' => 'topgalaxy-small'],
    ['name' => 'SuperTop Galaxy', 'color' => 'Colores', 'tag' => 'Rich Making Virals', 'price' => 45, 'image' => 'topGalaxy - Rich Making Virals.jpg', 'slug' => 'topgalaxy-rich-making-virals'],
     ['name' => 'SuperTop Galaxy', 'color' => 'Colores', 'tag' => 'Big Logo', 'price' => 45, 'image' => 'topGalaxy_BigL.jpeg', 'slug' => 'topgalaxy-big'],
    

    ['name' => 'SuperCap', 'color' => 'White cap', 'tag' => 'Big Logo + title', 'price' => 50, 'image' => 'SuperCap_Title.png', 'slug' => 'supercap-title'],
    ['name' => 'SuperCap', 'color' => 'White cap', 'tag' => 'Small Logo', 'price' => 50, 'image' => 'SuperCap_Logo.png', 'slug' => 'supercap-logo'],

    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => 'Big Logo', 'price' => 70, 'image' => 'sudadera_capucha.jpg', 'slug' => 'sudadera-capucha'],
    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => 'Small Logo', 'price' => 70, 'image' => 'sudadera_capucha_Small.jpg', 'slug' => 'sudadera-capucha-small'],
    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => '#Rich Without Porn', 'price' => 70, 'image' => 'sudadera_capucha_Small - Rich without porn.jpg', 'slug' => 'sudadera-capucha-small-rich-without-porn'],
    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => '#Rich Without Porn', 'price' => 70, 'image' => 'sudadera_capucha_Avatar - Rich without porn_Small.jpg', 'slug' => 'sudadera-capucha-avatar-small-rich-without-porn'],
    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => '#Rich Without Porn', 'price' => 70, 'image' => 'sudadera_capucha - Rich without porn.jpg', 'slug' => 'sudadera-capucha-rich-without-porn'],
    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => '#Rich Without Porn', 'price' => 70, 'image' => 'sudadera_capucha - Rich without porn_Small.jpg', 'slug' => 'sudadera-capucha-rich-without-porn-small'],
    ['name' => 'SuperHoodie', 'color' => 'White + Red', 'tag' => '#Rich Without Porn', 'price' => 70, 'image' => 'sudadera_capucha - Rich without porn_Red.jpg', 'slug' => 'sudadera-capucha-rich-without-porn-red'],
    ['name' => 'SuperHoodie', 'color' => 'White', 'tag' => 'Rich Making Virals', 'price' => 70, 'image' => 'sudadera_capucha - Rich making virals.jpg', 'slug' => 'sudadera-capucha-rich-making-virals'],
    ['name' => 'SuperHoodie', 'color' => 'White + Red', 'tag' => 'Rich Making Virals', 'price' => 70, 'image' => 'sudadera_capucha - Rich making virals_Red.jpg', 'slug' => 'sudadera-capucha-rich-making-virals-red'],
    ['name' => 'SuperHoodie', 'color' => 'White + Red', 'tag' => 'Logo Rich Making Virals', 'price' => 70, 'image' => 'hLogoRMakingV.jpeg', 'slug' => 'sudadera-capucha-rich-making-logo-hoodie'],

    ['name' => 'SuperShirt', 'color' => 'White', 'tag' => 'Small Logo', 'price' => 50, 'image' => 'camiseta small.png', 'slug' => 'camiseta-small'],
    ['name' => 'SuperShirt', 'color' => 'White', 'tag' => 'Big Logo', 'price' => 50, 'image' => 'camiseta normal.png', 'slug' => 'camiseta-normal'],
    ['name' => 'SuperShirt', 'color' => 'White + Red', 'tag' => '#Rich Without Porn', 'price' => 50, 'image' => 'camiseta - Rich without porn_Red.png', 'slug' => 'camiseta-rich-without-porn-red'],
    ['name' => 'SuperShirt', 'color' => 'White + Red', 'tag' => 'Rich Making Virals', 'price' => 50, 'image' => 'camiseta - Rich making virals_Red.png', 'slug' => 'camiseta-rich-making-virals-red'],
    ['name' => 'SuperCup', 'color' => 'White', 'tag' => 'Small Logo', 'price' => 35, 'image' => 'blob-6929187.png', 'extra_images' => ['blob-07d4f53.png'], 'slug' => 'supercup-small'],
    ['name' => 'SuperSocks', 'color' => 'White', 'tag' => 'Logo Mosaic', 'price' => 45, 'image' => 'supersocks.png', 'extra_images' => ['socks2.jpeg'], 'slug' => 'supersocks-normal', 'height' =>'228px'],
      ['name' => 'SuperSocks', 'color' => 'White', 'tag' => 'Big Logo + title', 'price' => 45, 'image' => 'supersocksn2.jpeg', 'slug' => 'supersocks-big-logo'],
     ['name' => 'Pack Socks + Cup ', 'color' => 'White', 'tag' => 'Set', 'price' => 75, 'image' => 'socksandcup.jpeg', 'slug' => 'supe-and-cup', 'height' =>'203px'],
];

    public function index()
    {
        $products = $this->products;
        return view('merchandising.index', compact('products'));
    }

    public function show($slug)
    {
        $product = $this->findProductBySlug($slug);

        if (!$product) {
            abort(404);
        }

        $influencers = User::select('id', 'username_URL', 'verified')
                   ->where('role', 'influencer')
                   ->get();

        return view('merchandising.show', compact('product', 'influencers'));
    }
    





public function purchase(Request $request)
{
    $request->validate([
        'product_id' => 'required|string',
        'amount'     => 'required|numeric|min:1',
        'address'    => 'required|string',
    ]);

    $product = $this->findProductBySlug($request->product_id);

    if (!$product) {
        return response()->json(['error' => 'Invalid product selected.'], 422);
    }

    $email   = auth()->check() ? auth()->user()->email : $request->email;
    $userId  = auth()->check() ? auth()->id() : null;
    $orderId = uniqid();

    // Save pending purchase
    $purchase = ProductPurchase::create([
        'user_id'              => $userId,
        'product_id'           => $request->product_id,
        'amount'               => $request->amount,
        'guest_email'          => $email,
        'referred_influencer'  => $request->referred_influencer ?? null,
        'referred_influencer_id'=> $request->referred_influencer_id ?? null,
        'shipping_address'     => $request->address,
        'status'               => 'pending',
        'order_id'             => $orderId,
    ]);


     $amount = $request->amount;

// Check if a referred influencer exists
if (!empty($request->referred_influencer_id)) {
    // Apply 40% discount
    $discountedAmount = $amount * 0.6;
} else {
    $discountedAmount = $amount;
}

// Convert to cents for Redsys
$amountInCents = (int) round($discountedAmount); // cents

 // Store orderId in session for success callback
    session(['order_id' => $orderId]);
    
    
    // Create RequestParameters
    $params = new RequestParameters(
        amountInCents: $amountInCents,
        currency: Currency::EUR,
        productDescription: 'Superfans Merch',
        payMethods: PayMethod::Card,
        transactionType: TransactionType::Autorizacion,
    );

    // Build request with params
    $requestBuilder = RequestBuilder::newRequest($params);
                
     return $requestBuilder->redirect();
}


public function confirm(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));


    $request->validate([
    'payment_intent_id' => 'required|string',
    'product_id' => 'required|string',
    'user_id' => 'nullable|integer',
    'amount' => 'required|numeric',
    'email' => 'nullable|email',
    'referred_influencer' => 'nullable|string',
    'referred_influencer_id' => 'nullable|integer',
    'shipping_country' => 'nullable|string',
    'shipping_city' => 'nullable|string',
    'shipping_zip' => 'nullable|string',
    'shipping_address' => 'nullable|string',
]);


    try {
        $intent = \Stripe\PaymentIntent::retrieve($request->payment_intent_id);
$email = auth()->check() ? auth()->user()->email : $request->email;
$userId = auth()->check() ? auth()->id() : null;
$amountInDollars = $request->amount / 100; 
        if ($intent->status === 'succeeded') {
            
        // Get influencer and calculate their earnings
        $influencer = User::find($request->referred_influencer_id);
        $subscriptionAmount = $request->amount;

            if ($influencer) {
        $isReferred = !empty($userId); 

        $influencerPercentage = $isReferred ? 0.30 : 1;
        $influencerEarnings = $subscriptionAmount * $influencerPercentage;

        $influencer->earnings += $influencerEarnings;
        $influencer->save();

        //  Log influencer earning
        \App\Models\EarningsLog::create([
            'user_id' => $influencer->id,  
            'source_user_id' => $userId,
            'amount' => $influencerEarnings,
            'earning_type' => 'product_sale', 
        ]);
    }

            ProductPurchase::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'amount' => $amountInDollars,
                'stripe_charge_id' => $intent->charges->data[0]->id ?? null,
                'referred_influencer' => $request->referred_influencer ?? null,
                'referred_influencer_id' => $request->referred_influencer_id ?? null,
                'guest_email' => $email,
                'shipping_country' => $request->shipping_country,
                'shipping_city' => $request->shipping_city,
                'shipping_zip' => $request->shipping_zip,
                'shipping_address' => $request->shipping_address,
            ]);

            return response()->json(['success' => true]);
        }

        return response()->json(['error' => 'Payment not completed.'], 400);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Confirmation failed: ' . $e->getMessage()], 500);
    }
}



    /**
     * Find a product by slug in the products array.
     */
    protected function findProductBySlug($slug)
    {
        return collect($this->products)->firstWhere('slug', $slug);
    }
}
