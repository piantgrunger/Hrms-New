<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%penilaian}}`.
 */
class m211022_024151_create_penilaian_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penilaian}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' => $this->date()->notNull(),
            'id_indikator' => $this->integer()->notNull(),
            'nilai' => $this->integer()->notNull(),
            'FOREIGN KEY (id_indikator) REFERENCES indikator(id)',
            'FOREIGN KEY (id_pegawai) REFERENCES pegawai(id)'
    
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%penilaian}}');
    }
}
