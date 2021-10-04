<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hari_libur}}`.
 */
class m211004_035125_create_hari_libur_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hari_libur}}', [
            'id' => $this->primaryKey(),
            'tanggal' => $this->date()->notNull(),
            'nama' => $this->string(100),
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hari_libur}}');
    }
}
