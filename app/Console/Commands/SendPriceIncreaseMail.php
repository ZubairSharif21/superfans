<?php

namespace App\Console\Commands;

use App\Mail\PriceIncreaseForSubscriptions;
use Illuminate\Console\Command;

class SendPriceIncreaseMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:increase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $priceIncreaseForSubscriptions = new PriceIncreaseForSubscriptions();
        \Mail::to(['m.kaddouri@live.com'])->send($priceIncreaseForSubscriptions);
        return 0;
    }
}
