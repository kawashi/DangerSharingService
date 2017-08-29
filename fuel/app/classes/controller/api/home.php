<?php
/**
 * Generated rest controller
 * 
 * Auto generated methods:
 * GET    /api/home(/:id) => get_index($id = 'all')
 * POST   /api/home       => post_index()
 * PUT    /api/home/:id   => put_index($id)
 * DELETE /api/home/:id   => delete_index($id)

 */

class Controller_Api_Home extends Controller_Rest
{
	// default format
	protected $format = 'json';
    
	public function get_index()
    {
        return $this->response([
            'key' => 'value'
        ]);
    }
}
