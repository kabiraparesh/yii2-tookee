<?php

use yii\db\Schema;
use yii\db\Migration;

class m150731_172330_tookee_asset extends Migration
{
    public function up()
    {
    	$this->createTable('tookee_asset', [
    			'idasset' 	=> Schema::TYPE_PK,
    			'assetname' => 	Schema::TYPE_STRING . '(1024)' . ' NOT NULL',
    			'created'   => 	Schema::TYPE_TIMESTAMP . ' NULL',
    			'trashed' 	=>  Schema::TYPE_BOOLEAN,
    	], 'ENGINE=InnoDB CHARSET=utf8');
    }

    public function down()
    {
        $this->dropTable('tookee_asset');
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
