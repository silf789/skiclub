<?php

use yii\db\Schema;
use yii\db\Migration;

class m160221_095000_drop_user_table extends Migration
{
    public function up()
    {
        $this->dropTable('user');
    }

    public function down()
    {

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
