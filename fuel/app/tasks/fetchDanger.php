<?php

namespace Fuel\Tasks;

class FetchDanger
{

    public function run()
    {
        $this->send_get_request();
    }

    private function send_get_request()
    {
        $FECTH_TWEET_URL = "http://localhost/DSS/public/api/fetch/danger/fetch_tweet?token=" . $_SERVER['FETCH_ACCESS_TOKEN'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $FECTH_TWEET_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}