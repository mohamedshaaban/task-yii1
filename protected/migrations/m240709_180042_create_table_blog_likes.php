<?php

class m240709_180042_create_table_blog_likes extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_blog_likes', array(
            'id' => 'pk',
            'user_id' => 'integer NOT NULL',
            'blog_id' => 'integer NOT NULL'
        ));
	}

	public function down()
	{
		echo "m240709_180042_create_table_blog_likes does not support migration down.\n";
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