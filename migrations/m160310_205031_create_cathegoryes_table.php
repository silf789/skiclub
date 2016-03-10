<?php

use yii\db\Schema;
use yii\db\Migration;

class m160310_205031_create_cathegoryes_table extends Migration
{
    public function up()
    {
        $this->createTable('cathegories',[
            'id' => Schema::TYPE_PK,
            'cathegory' => Schema::TYPE_STRING.' NOT NULL'
        ]);

    }

    public function down()
    {
        $this->dropTable('cathegories');
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
