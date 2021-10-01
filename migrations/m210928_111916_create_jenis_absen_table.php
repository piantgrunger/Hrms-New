<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jenis_absen}}`.
 */
class m210928_111916_create_jenis_absen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jenis_absen}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->notNull()->unique(),
            'nama' => $this->string()->notNull()->unique(),
            'status_hadir' => $this->string()->notNull(),
            
      
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jenis_absen}}');
    }
}
