<?php

class Controller_Api_Fetch_danger extends Controller_Rest
{
    protected $format = 'json';

    public function get_fetch_tweet(){
        if(Input::get('check') == 'joujou'){
            $tweet_mdl = new Model_tweet();
            $tweets = $tweet_mdl->fetch_tweet();
            foreach ($tweets as $value){
                $tweet_mdl = new Model_tweet();
                $tweet_mdl->save_tweet($value);
            }
        }else{
            throw new HttpNotFoundException;
        }

    }

}
