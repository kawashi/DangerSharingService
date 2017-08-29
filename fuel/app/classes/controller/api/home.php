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
        $tweets = Model_Tweet::forge()->fetch_tweet();

        foreach ( $tweets as $result ) {
            Model_Tweet::forge()->save_tweet(
                $result->text,
                $result->user->name,
                $result->user->screen_name,
                $result->user->profile_image_url,
                strtotime($result->created_at)
            );
        }

        return $this->response([
            "key" => "test"
        ]);
    }
}