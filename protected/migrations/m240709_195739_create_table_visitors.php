<?php

class m240709_195739_create_table_visitors extends CDbMigration
{
	public function up()
	{
        $this->createTable('tbl_visitors', array(
            'id' => 'pk',
            'email' => 'string NOT NULL',
            'name' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'content' => 'text',
        ));
	}

	public function down()
	{
		echo "m240709_175739_create_table_visitors does not support migration down.\n";
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