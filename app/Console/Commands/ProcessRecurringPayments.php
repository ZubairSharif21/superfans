<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use App\Models\Payment;
use App\Models\User;
use Creagia\LaravelRedsys\RequestBuilder;
use Creagia\Redsys\Support\RequestParameters;
use Creagia\Redsys\Enums\Currency;
use Creagia\Redsys\Enums\TransactionType;
use Creagia\Redsys\Enums\CofType;

class ProcessRecurringPayments extends Command
{
    protected $signature = 'payments:process-recurring';
    protected $description = 'Charge recurring subscriptions via Redsys';

    public function handle()
    {

        $dueSubscriptions = Subscription::whereDate('next_payment_at', '<=', now())->get();

        foreach ($dueSubscriptions as $subscription) {
            $user = $subscription->user;

            if (!$user) {
                $this->error("No user found for subscription {$subscription->id}");
                continue;
            }

      $redsysCard = $user->redsysCards()->latest()->first();
        if (!$redsysCard) {
            $this->error("No stored Redsys card found for user {$userId}");
            return Command::SUCCESS;
        }

            // Redsys expects amounts in cents
            // $amountInCents = (int) round(0.10 * 100);

            $amountInCents = (int) round($subscription->amount * 100);

            $params = new RequestParameters(
                amountInCents: $amountInCents,
                currency: Currency::EUR,
                transactionType: TransactionType::Autorizacion,
                productDescription: "Recurring subscription renewal"
            );

            try {
                $redsysRequest = RequestBuilder::newRequest($params)
                    ->associateWithModel($user)
                    ->usingCard(CofType::Recurring, $redsysCard);
                    
                    $response = $redsysRequest->post();

                $code = $response->merchantParametersArray['Ds_Response'] ?? null;

                // Use same success check as TestChargeUser
                if ($code === '0000') {
                    Payment::create([
                        'user_id' => $user->id,
                        'amount' => $subscription->amount,
                        'method' => 'redsys',
                    ]);

                    $subscription->next_payment_at = now()->addMonth();
                    $subscription->save();

                    // $this->info("✅ Charged subscription {$subscription->id} successfully (Resp: {$response->responseCode})");
                } else {
                     $subscription->next_payment_at = now()->addDays(2);
                     $subscription->save();

                 //  $this->error("Failed to charge subscription {$subscription->id}. Will retry in a month.");
                }

            } catch (\Exception $e) {
                $this->error("⚠️ Error charging subscription {$subscription->id}: " . $e->getMessage());
            }
        }

        return Command::SUCCESS;
    }
}
