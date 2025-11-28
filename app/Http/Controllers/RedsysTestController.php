<?php

namespace App\Http\Controllers;

use App\Models\InfluencerPremium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Creagia\LaravelRedsys\RequestBuilder;
use Creagia\Redsys\Enums\Currency;
use Creagia\Redsys\Enums\PayMethod;
use Creagia\Redsys\Enums\TransactionType;
use Creagia\Redsys\Enums\CofType;
use Creagia\Redsys\Support\RequestParameters;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Payment;

class RedsysTestController extends Controller
{
    public function redirect(Request $request)
    {
        $request->validate([
            'amount'        => 'required|numeric|min:0.01',
            'influencer_id' => $request->verified ? 'nullable|integer' : 'required|integer',
            'payment_type'  => 'nullable|string|in:one_time,recurring',
            'verified'           => 'nullable|integer|in:0,1',
        ]);

        $user = Auth::user();


        if (!$user) {
            abort(403, 'You must be logged in to perform this action.');
        }

        // Default to recurring if not passed
        $payment_type = $request->input('payment_type', 'recurring');
        $verified = (int) $request->input('verified', 0);


        // Store type for success handler
        session([
            'package_id'   => $request->influencer_id,
            'amount'       => $request->amount,
            'payment_type' => $payment_type,
            'verified'          => $verified,
        ]);

        $amountInCents = (int) round($request->amount * 100);

        $params = new RequestParameters(
            amountInCents: $amountInCents,
            currency: Currency::EUR,
            productDescription: 'Superfan payment',
            payMethods: PayMethod::Card,
            transactionType: TransactionType::Autorizacion,
        );

        if ($payment_type === 'one_time') {
            // One-time — no card token
            $redsysRequest = RequestBuilder::newRequest($params)
                ->associateWithModel($user);
        } else {
            // Recurring — request and store card
            $redsysRequest = RequestBuilder::newRequest($params)
                ->associateWithModel($user)
                ->requestingCardToken(CofType::Recurring)
                ->storeCardOnModel($user);
        }

        return $redsysRequest->redirect();
    }
    
    
      public function callback(Request $request)
    {
        try {
            $notification = Redsys::handleNotification($request);

            // Example: get order id + amount
            $orderId = $notification->order();
            $amount  = $notification->amount() / 100; // Redsys sends cents
            $user    = User::find($notification->merchantData());

            if ($notification->isSuccessful() && $user) {
                // Save purchase to your DB
                $this->storePurchase($user, $amount, $orderId, $notification);

                return response('OK', 200);
            }

            return response('KO', 400);
        } catch (\Exception $e) {
            \Log::error('Redsys callback failed: ' . $e->getMessage());
            return response('KO', 500);
        }
    }

    /**
     * Save into product_purchases table
     */
    protected function storePurchase(User $user, float $amount, string $orderId, $notification)
    {
        \DB::table('product_purchases')->insert([
            'user_id'                => $user->id,
            'product_id'             => null, // if you want to attach product
            'referred_influencer_id' => null,
            'guest_email'            => $user->email,
            'influencer_username'    => null,
            'amount'                 => $amount,
            'stripe_charge_id'       => $orderId, // storing Redsys order id here
            'created_at'             => now(),
            'updated_at'             => now(),
            'shipping_country'       => null,
            'shipping_city'          => null,
            'shipping_zip'           => null,
            'shipping_address'       => null,
        ]);
    }

 public function redsysSuccess(Request $request)
{
    $package_id   = session('package_id');
    $amount       = session('amount');
    $payment_type = session('payment_type', 'recurring'); 
    $verified     = (int) session('verified', 0);

    $user = auth()->user();

    // VIP (verified) upgrade only
    if ($verified === 1 && $user) {
        $user->verified = 1; 
        $user->save();
        
        $subscription = new Subscription();
$subscription->user_id         = $user->id;
$subscription->influencer_id   = 0000; 
$subscription->amount          = $amount;
$subscription->next_payment_at = now()->addMonth();
$subscription->save();

        // Attach influencer_id to stored card
        $redsysCard = $user->redsysCards()->latest()->first();
        if ($redsysCard) {
            $redsysCard->influencer_id = $package_id;
            $redsysCard->save();
        }

        
            // redirect based on role
    if ($user->role === 'influencer') {
        return redirect('/influencer')->with('message', 'Verification subscription activated successfully!');
    } else {
        return redirect('/user')->with('message', 'Verification subscription activated successfully!');
    }
    
    
    }

    // Guard against missing session data
    if (!$package_id || !$amount) {
        return redirect('/')->with('error', 'Invalid payment session data.');
    }

    $influencer = User::find($package_id);

    if ($payment_type === 'recurring') {
        // Normal recurring subscription
        $subscription = new Subscription();
        $subscription->user_id         = $user->id;
        $subscription->influencer_id   = $package_id;
        $subscription->amount          = $amount;
        $subscription->next_payment_at = now()->addMonth();
        $subscription->save();

        $payment = new Payment();
        $payment->user_id = $user->id;
        $payment->amount  = $amount;
        $payment->method  = "redsys";
        $payment->save();

        if ($influencer) {
            $this_earned_amount = (80 / 100) * $amount;
            $influencer->earnings += $this_earned_amount;
            $influencer->save();
        }

        // Attach influencer_id to stored card
        $redsysCard = $user->redsysCards()->latest()->first();
        if ($redsysCard) {
            $redsysCard->influencer_id = $package_id;
            $redsysCard->save();
        }

        $message = 'Subscription purchased successfully';
    } else {
        // One-time premium payment
        InfluencerPremium::create([
            'user_id'         => $user->id,
            'influencer_id'   => $package_id,
            'amount'          => $amount,
            'stripe_charge_id'=> 0, 
        ]);

        if ($influencer) {
            $this_earned_amount = (80 / 100) * $amount;
            $influencer->earnings += $this_earned_amount;
            $influencer->save();
        }

        $message = 'Premium payment successful';
    }

    return redirect('/' . $influencer->username_URL)
        ->with('message_subscription', $message);
}

public function cancelVerification(Request $request)
{
    $user = auth()->user();

    if (! $user) {
        return redirect()->back()->with('error', 'Not authenticated');
    }

    // Reset verified flag
    $user->verified = 0;
    $user->save();

    Subscription::where('user_id', $user->id)
        ->where('influencer_id', 0000)
        ->delete();

    $redsysCard = $user->redsysCards()->latest()->first();
    if ($redsysCard) {
        $redsysCard->delete();
    }

    // Redirect back based on role
    if ($user->role === 'influencer') {
        return redirect('/influencer')->with('message', 'Verification cancelled successfully!');
    } else {
        return redirect('/user')->with('message', 'Verification cancelled successfully!');
    }
}



}
