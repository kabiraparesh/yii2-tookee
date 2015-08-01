<?php

use yii\db\Schema;
use yii\db\Migration;

class m150731_172341_tookee_trashed extends Migration
{
    public function up()
    {
    	$this->createTable('tookee_trashed', [
    			'idtrashed' => Schema::TYPE_PK,
    			'id'		=> 	Schema::TYPE_INTEGER,
    			'tablename' => 	Schema::TYPE_STRING . '(1024)' . ' NOT NULL',
    			'created'   => 	Schema::TYPE_TIMESTAMP . ' NULL',
    	], 'ENGINE=InnoDB CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable('tookee_trashed');
    }
    
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
