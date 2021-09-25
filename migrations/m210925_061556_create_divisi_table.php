<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%divisi}}`.
 */
class m210925_061556_create_divisi_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%divisi}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string(20)->notNull()->unique(),
            'nama' => $this->string(20)->notNull()->unique(),
            'alamat' => $this->text()->notNull(),
            
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%divisi}}');
    }
}
