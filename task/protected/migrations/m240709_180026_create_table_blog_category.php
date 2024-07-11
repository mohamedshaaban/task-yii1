<?php

class m240709_180026_create_table_blog_category extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_blog_category', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'is_visible' => 'integer NOT NULL',
        ));
	}

	public function down()
	{
		echo "m240709_180026_create_table_blog_category does not support migration down.\n";
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