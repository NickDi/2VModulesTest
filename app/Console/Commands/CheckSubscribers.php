<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Subscribers;

class CheckSubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mailchimp:checkall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'are subscribers  in the list or not';

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
       // Subscribers::checkAll();
        $subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($subscribers as $subscriber) {
            $result = \App\Subscribers::check( $subscriber );
            if ( $result ){
              $this->info( $subscriber->name. ' ' . $subscriber->surname. ' - in the list' ); 
             //echo $subscriber->name. ' ' . $subscriber->surname. ' - in the list'. PHP_EOL;
            }else{
                $this->info( $subscriber->name. ' ' . $subscriber->surname. ' - not in the list' );
              // echo $subscriber->name. ' ' . $subscriber->surname. ' - not in the list'. PHP_EOL;
            }
        }    
    }
}
