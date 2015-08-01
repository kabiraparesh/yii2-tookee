<?php

use yii\db\Schema;
use yii\db\Migration;

class m150731_172244_tookee_news extends Migration
{
    public function up()
    {
    	$this->createTable('tookee_news', [
    			'idnews' => Schema::TYPE_PK,
    			'title'   	=> 	Schema::TYPE_STRING . '(510)' . ' NOT NULL',
    			'url'   	=> 	Schema::TYPE_TEXT . ' NOT NULL',
    			'imageurl'  => 	Schema::TYPE_TEXT . ' NOT NULL',
    			'matter'   	=> 	Schema::TYPE_TEXT . ' NOT NULL',
    			'idcategory'=> 	Schema::TYPE_INTEGER,
    			'created'   => 	Schema::TYPE_TIMESTAMP . ' NULL',
    			'modified'  => 	Schema::TYPE_TIMESTAMP . ' NULL',
    			'published' =>  Schema::TYPE_BOOLEAN,
    			'trashed' 	=>  Schema::TYPE_BOOLEAN,
    			'owner'    => 	Schema::TYPE_INTEGER,
    	], 'ENGINE=InnoDB CHARSET=utf8');

    	$this->addForeignKey('fk_tookee_news_user_id', 'tookee_news', 'owner', '{{%user}}', 'id', 'CASCADE', 'RESTRICT');
	    	$this->addForeignKey('fk_tookee_news_idcategory', 'tookee_news', 'idcategory', 'tookee_category', 'idcategory', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('tookee_news');
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
