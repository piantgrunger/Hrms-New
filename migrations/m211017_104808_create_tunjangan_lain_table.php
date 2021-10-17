<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tunjangan_lain}}`.
 */
class m211017_104808_create_tunjangan_lain_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tunjangan_lain}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' => $this->date()->notNull(),  
            'id_tunjangan' => $this->integer()->notNull(),
            'jumlah' => $this->decimal(19,2)->notNull(),
            "FOREIGN KEY (id_pegawai) REFERENCES pegawai(id)",
            "FOREIGN KEY (id_tunjangan) REFERENCES tunjangan(id)",
           
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tunjangan_lain}}');
    }
}
