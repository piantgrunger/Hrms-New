<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%indikator}}`.
 */
class m211022_021238_create_indikator_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%indikator}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string(),
            'nama' => $this->string(),
            'bobot' => $this->integer()
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%indikator}}');
    }
}
