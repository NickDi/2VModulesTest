<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mailchimp;

class Subscribers extends Model
{
    protected $fillable = [
        'name', 'surname', 'email',
    ];


    public static function Check ( $subscriber ){
        $listId = 'dbf40752bc';
        $emailAddress = $subscriber->email;
        $result = Mailchimp::check($listId, $subscriber->email); // Returns boolean
        if ( $result ){
            echo $subscriber->name. ' ' . $subscriber->surname. ' - in the list'. PHP_EOL;
        }else{
            echo $subscriber->name. ' ' . $subscriber->surname. ' - not in the list'. PHP_EOL;
        }
        // Check the staus of a subscriber:
        //Mailchimp::status($listId, $emailAddress); // Returns 'subscribed', 'unsubscribed', 'cleaned', 'pending', 'transactional' or 'not found'

    }
    public static function CheckAll (){
        $Subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($Subscribers as $subscriber) {
            self::Check( $subscriber );
        }
    }
    public static function Send (Subscribers $subscriber){
        // TODO add error exceptions, because subscribe function doesn't return anything

    	$listId = 'dbf40752bc';
        $emailAddress = $subscriber->email;

        Mailchimp::subscribe($listId, $emailAddress, ['FNAME' => $subscriber->name, 'LNAME' => $subscriber->surname], false);

    }
    public static function SendAll (){
        $Subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($Subscribers as $subscriber) {
            self::Send( $subscriber );
                # code...
        }
    }

    public static function SetStatusAll ($status){
        $Subscribers= \App\Subscribers::orderBy('name')->get();
        foreach ($Subscribers as $subscriber) {
            $subscriber->status=$status;
            $subscriber->save();
        }
        
    }
}
