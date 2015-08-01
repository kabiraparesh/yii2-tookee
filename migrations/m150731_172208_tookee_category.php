<?php

use yii\db\Schema;
use yii\db\Migration;

class m150731_172208_tookee_category extends Migration
{
    public function up()
    {
    	$this->createTable('tookee_category', [
    			'idcategory' => Schema::TYPE_PK,
    			'title'   	=> 	Schema::TYPE_STRING . '(510)' . ' NOT NULL',
    			'created'   => 	Schema::TYPE_TIMESTAMP . ' NULL',
    			'modified'  => 	Schema::TYPE_TIMESTAMP . ' NULL',
    			'published' =>  Schema::TYPE_BOOLEAN,
    			'trashed' 	=>  Schema::TYPE_BOOLEAN,
    			'owner'    => 	Schema::TYPE_INTEGER,
    	], 'ENGINE=InnoDB CHARSET=utf8');
    	$this->addForeignKey('fk_tookee_category_user_id', 'tookee_category', 'owner', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('tookee_category');
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
