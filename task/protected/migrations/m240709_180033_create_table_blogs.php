<?php

class m240709_180033_create_table_blogs extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_blogs', array(
            'id' => 'pk',
            'title' => 'string NOT NULL',
            'category_id' => 'integer NOT NULL',
            'is_visible' => 'integer NOT NULL',
            'content' => 'text',
        ));
	}

	public function down()
	{
		echo "m240709_180033_create_table_blogs does not support migration down.\n";
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