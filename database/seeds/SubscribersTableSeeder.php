<?php

use Illuminate\Database\Seeder;

class SubscribersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a single App\User instance...
 		// $user = factory(App\User::class)->create();

  		// Create three App\User instances...
        //$subscribers = factory(App\User::class, 3)->create();

	    factory(App\Subscribers::class, 10)->create();
    }
}
