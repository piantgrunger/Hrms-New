<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%potongan_lain}}`.
 */
class m211017_073637_create_potongan_lain_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
     
        $this->createTable('{{%potongan_lain}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' => $this->date()->notNull(),  
            'id_potongan' => $this->integer()->notNull(),
            'jumlah' => $this->decimal(19,2)->notNull(),
            "FOREIGN KEY (id_pegawai) REFERENCES pegawai(id)",
            "FOREIGN KEY (id_potongan) REFERENCES potongan(id)",
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%potongan_lain}}');
    }
}
