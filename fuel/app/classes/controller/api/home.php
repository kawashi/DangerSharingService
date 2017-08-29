<?php

class Controller_Api_Home extends Controller_Rest
{
	protected $format = 'json';

	// JSONテスト
	public function get_index() {
        return $this->response([
            'key' => 'value'
        ]);
    }

    // ツイート取得テスト
    public function get_tweet() {
        // ライブラリの読み込み
        require_once (APPPATH.'vendor/twistOAuth.phar');

        $consumer_key        = $_SERVER['CONSUMER_KEY'];
        $consumer_secret     = $_SERVER['CONSUMER_SECRET'];
        $access_token        = $_SERVER['ACCESS_TOKEN'];
        $access_token_secret = $_SERVER['ACCESS_TOKEN_SECRET'];

        $connection = new TwistOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);

        // キーワードによるツイート検索
        $tweets_params = ['q' => 'jアラート -@ exclude:retweets' ,'count' => '100'];
        $tweets = $connection->get('search/tweets', $tweets_params)->statuses;

        var_dump($tweets);

        return $this->response([
            "key" => "test"
        ]);
    }
}