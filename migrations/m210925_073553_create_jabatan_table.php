<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jabatan}}`.
 */
class m210925_073553_create_jabatan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jabatan}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->notNull(),
            'nama' => $this->string()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jabatan}}');
    }
}
