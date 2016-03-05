<?php

use yii\db\Schema;
use yii\db\Migration;

class m160305_133526_create_video_table extends Migration
{
    public function up()
    {
        $this->createTable('video',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'ref' => Schema::TYPE_TEXT.' NOT NULL'
        ]);


    }

    public function down()
    {
        $this->dropTable('user');
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
