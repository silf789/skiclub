<?php

use yii\db\Schema;
use yii\db\Migration;

class m160310_205235_create_content_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('content',[
            'id' => Schema::TYPE_PK,
            'cathegory' => Schema::TYPE_INTEGER.' NOT NULL',
            'date' => Schema::TYPE_DATE.' NOT NULL',
            'title' => Schema::TYPE_STRING.' NOT NULL',
            'text' => Schema::TYPE_TEXT.' NOT NULL',
            'metad' => Schema::TYPE_TEXT.' NOT NULL',
            'metak' => Schema::TYPE_TEXT.' NOT NULL'
        ]);
        $this->addForeignKey('content_cathegory','content','cathegory','cathegories','id');

    }

    public function down()
    {
        $this->dropForeignKey('content_cathegory','content');
        $this->dropTable('content');
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
