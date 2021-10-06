<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sekolah}}`.
 */
class m211006_053108_create_sekolah_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sekolah}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->unique()->notNull(),
            'nama' => $this->string()->unique()->notNull(),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sekolah}}');
    }
}
