<?php

namespace App\Console\Commands;

use App\Subscribers;
use Illuminate\Console\Command;

class SendSubscribersToMailchimp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailchimp:sendsubsribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send subscribers to Mail Chimp';

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
     * @return mixed
     */
    public function handle()
    {
    
        Subscribers::SendAll();
    }
}
