<?php

namespace Fuel\Tasks;

class FetchDanger
{

    public function run()
    {

        $this->send_get_request();
    }

    private function send_get_request(){
        $url = "http://localhost/DSS/public/api/fetch/danger/fetch_tweet?check=joujou";
        $ch = curl_init();

//オプション
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }
}