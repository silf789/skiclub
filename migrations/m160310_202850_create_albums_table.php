<?php

use yii\db\Schema;
use yii\db\Migration;

class m160310_202850_create_albums_table extends Migration
{
    public function up()
    {
        $this->createTable('albums',[
            'id' =>Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING.' NOT NULL',
            'thumb' => Schema::TYPE_TEXT
        ]);

    }

    public function down()
    {
        $this->dropTable('albums');
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
