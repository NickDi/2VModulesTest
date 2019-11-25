<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Subscribers;

class SetAllUserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribers:status1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'set all users status to 1';

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
        Subscribers::SetStatusAll(1);
    }
}
