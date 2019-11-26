<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mailchimp;

class Subscribers extends Model
{
    protected $fillable = [
        'name', 'surname', 'email',
    ];


    public static function check ( $subscriber ){
        $listId = 'dbf40752bc';
        $emailAddress = $subscriber->email;
        $result = Mailchimp::check($listId, $subscriber->email); // Returns boolean
        return $result;
        // Check the staus of a subscriber:
        //Mailchimp::status($listId, $emailAddress); // Returns 'subscribed', 'unsubscribed', 'cleaned', 'pending', 'transactional' or 'not found'

    }
    public static function checkAll (){
        $subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($subscribers as $subscriber) {
            $result self::check( $subscriber );
            if ( $result ){
              echo $subscriber->name. ' ' . $subscriber->surname. ' - in the list'. PHP_EOL;
            }else{
              echo $subscriber->name. ' ' . $subscriber->surname. ' - not in the list'. PHP_EOL;
            }
        }
    }
    public static function send (Subscribers $subscriber){
        // TODO add error exceptions, because subscribe function doesn't return anything

    	$listId = 'dbf40752bc';
        $emailAddress = $subscriber->email;

        Mailchimp::subscribe($listId, $emailAddress, ['FNAME' => $subscriber->name, 'LNAME' => $subscriber->surname], false);

    }
    public static function sendAll (){
        $subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($subscribers as $subscriber) {
            self::send( $subscriber );
                # code...
        }
    }

    public static function setStatusAll ($status){
        $subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($subscribers as $subscriber) {
            $subscriber->status=$status;
            $subscriber->save();
        }
        
    }
}
