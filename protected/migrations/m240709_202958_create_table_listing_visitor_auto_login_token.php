<?php

class m240709_202958_create_table_listing_visitor_auto_login_token extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_listing_visitor_auto_login_token', array(
            'id' => 'pk',
            'user_id' => 'string NOT NULL',
            'token_id' => 'string NOT NULL',
            'token' => 'string NOT NULL',
        ));
	}

	public function down()
	{
		echo "m240709_182958_create_table_listing_visitor_auto_login_token does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}