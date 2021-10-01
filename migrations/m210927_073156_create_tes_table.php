<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tes}}`.
 */
class m210927_073156_create_tes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tes}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->unique() ,
            'nama' => $this->string()->unique() ,
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tes}}');
    }
}
