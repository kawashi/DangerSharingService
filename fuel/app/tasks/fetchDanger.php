<?php

namespace Fuel\Tasks;

class FetchDanger
{

    public function run()
    {

        $this->send_get_request();
    }

    private function send_get_request(){
        $url = "http://localhost/DSS/public/api/fetchDanger";
        $ch = curl_init(); // はじめ

//オプション
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $html =  curl_exec($ch);
        var_dump($html);
        curl_close($ch); //終了
    }
}