<?php

namespace Fuel\Migrations;

class Create_tweets
{
	public function up()
	{
		\DBUtil::create_table('tweets', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'text' => array('null' => false, 'type' => 'text'),
			'user_name' => array('null' => false, 'type' => 'text'),
			'screen_name' => array('null' => false, 'type' => 'text'),
			'icon' => array('null' => false, 'type' => 'text'),
			'time' => array('constraint' => 11, 'null' => false, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
			'updated_at' => array('constraint' => 11, 'null' => true, 'type' => 'int', 'unsigned' => true),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tweets');
	}
}