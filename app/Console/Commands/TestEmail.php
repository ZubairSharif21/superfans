<?php

namespace App\Console\Commands;

use App\Mail\TestMail;
use Illuminate\Console\Command;

class TestEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test-send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing the email integration';

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
        \Mail::to('m.kaddouri@live.com')->send(new TestMail());
        return 0;
    }
}
