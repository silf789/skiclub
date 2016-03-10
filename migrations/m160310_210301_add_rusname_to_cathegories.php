<?php

use yii\db\Schema;
use yii\db\Migration;

class m160310_210301_add_rusname_to_cathegories extends Migration
{
    public function up()
    {
        $this->addColumn('cathegories','rusname',$this->string());

    }

    public function down()
    {
        $this->dropColumn('cathegories','rusname');
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
