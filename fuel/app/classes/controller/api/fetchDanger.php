<?php

class Controller_Api_FetchDanger extends Controller_Rest
{
    protected $format = 'json';

    public function get_fetch_tweet(){

        $tweet_mdl = new Model_tweet();
        $tweet_mdl->fetch_tweet();
        $tweet_mdl->save_tweet();
    }

}
