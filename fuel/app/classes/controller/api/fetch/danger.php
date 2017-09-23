<?php

class Controller_Api_Fetch_danger extends Controller_Rest
{
    protected $format = 'json';

    public function get_fetch_tweet()
    {
        if (Input::get('token') == $_SERVER['FETCH_ACCESS_TOKEN']) {
            $tweets = Model_Tweet::fetch_tweet();
            foreach ($tweets as $value) {
                $tweet_mdl = new Model_tweet();
                $tweet_mdl->save_tweet($value);
            }
        } else {
            throw new HttpNotFoundException;
        }
    }
}
