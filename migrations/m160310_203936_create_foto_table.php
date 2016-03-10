<?php

use yii\db\Schema;
use yii\db\Migration;

class m160310_203936_create_foto_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('foto',[
            'id' => Schema::TYPE_PK,
            'alb_id' => Schema::TYPE_INTEGER,
            'ref' => Schema::TYPE_TEXT

        ]);
        $this->addForeignKey('foto_album','foto','alb_id','albums','id');

    }

    public function safeDown()
    {
        $this->dropForeignKey('foto_album','foto');
        $this->dropTable('foto');
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
