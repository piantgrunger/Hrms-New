<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%potongan}}`.
 */
class m211006_091609_create_potongan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%potongan}}', [
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
        $this->dropTable('{{%potongan}}');
    }
}
