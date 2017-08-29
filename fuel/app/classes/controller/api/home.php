<?php

class Controller_Api_Home extends Controller_Rest
{
	protected $format = 'json';

	public function get_index()
    {
        return $this->response([
            'key' => 'value'
        ]);
    }
}
