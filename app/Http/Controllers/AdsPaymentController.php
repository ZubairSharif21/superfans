<?php

namespace App\Http\Controllers;

use App\Models\AdPayment;
// use App\Models\AdsList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Creagia\LaravelRedsys\RequestBuilder;
use Creagia\Redsys\Enums\Currency;
use Creagia\Redsys\Enums\PayMethod;
use Creagia\Redsys\Enums\TransactionType;
use Creagia\Redsys\Enums\CofType;
use Creagia\Redsys\Support\RequestParameters;

class AdsPaymentController extends Controller
{
    public function pay(Request $request)
    {
        // dd($request);
        $request->validate([
            'ad_id' => 'required',
            'amount' => 'required|numeric|min:0.01',
            'payment_type'  => 'nullable|string|in:one_time,recurring',
            'ad_url'  => 'required',

        ]);
        $user = Auth::user();


        if (!$user) {
            abort(403, 'You must be logged in to perform this action.');
        }
        // $ad = AdsList::find($request->ad_id);
        $ad_id = $request->ad_id;
  

        $amountInCents = (int) round($request->amount * 100);

        $params = new RequestParameters(
            amountInCents: $amountInCents,
            currency: Currency::EUR,
            productDescription: 'Super Ads Payment',
            payMethods: PayMethod::Card,
            transactionType: TransactionType::Autorizacion,
        );

        $redsysRequest = RequestBuilder::newRequest($params)
            ->associateWithModel($user);
      session([
            'ad_id'  => $ad_id,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type,
            'ad_url' => $request->ad_url,
        ]);
        return $redsysRequest->redirect();
    }


    public function success(Request $request)
    {
        $ad_id = session('ad_id');
        $amount = session('amount');
        $user = auth()->user();
        $ad_url = session('ad_url');

        if (!$ad_id || !$amount) {
            return redirect('/super-ads')->with('error', 'Session expired');
        }

        // record payment
        AdPayment::create([
            'user_id' => $user->id,
            'ad_id'   => $ad_id,
            'amount'  => $amount,
            'method'  => 'redsys'
        ]);
return redirect($ad_url)->with('message', 'Payment completed successfully — Let’s build your ad!');

        // return redirect()->route('ads.create', $ad_id)
        //     ->with('message', 'Payment completed successfully — Let’s build your ad!');
    }
}
