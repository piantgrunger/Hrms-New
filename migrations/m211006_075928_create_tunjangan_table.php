<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tunjangan}}`.
 */
class m211006_075928_create_tunjangan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tunjangan}}', [
            'id' => $this->primaryKey(),

            'kode' => $this->string()->unique()->notNull(),
            'nama' => $this->string()->unique()->notNull(),
            'jenis' => $this->string()->notNull(),
        
             'jumlah' => $this->decimal(19,2)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tunjangan}}');
    }
}
