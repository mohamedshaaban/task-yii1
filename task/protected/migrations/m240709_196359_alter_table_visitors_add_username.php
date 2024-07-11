<?php

class m240709_196359_alter_table_visitors_add_username extends CDbMigration
{
	public function up()
	{

        $this->addColumn('tbl_visitors', 'username', 'VARCHAR(150) AFTER `email`');
	}

	public function down()
	{
		echo "m240709_190359_alter_table_visitors_add_username does not support migration down.\n";
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