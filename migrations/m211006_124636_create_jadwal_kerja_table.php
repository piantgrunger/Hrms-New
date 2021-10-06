<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%jadwal_kerja}}`.
 */
class m211006_124636_create_jadwal_kerja_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%jadwal_kerja}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' => $this->date()->notNull(),
            'id_shift' => $this->integer()->notNull(),
            "FOREIGN KEY (id_pegawai) REFERENCES pegawai(id) ",
            "FOREIGN KEY (id_shift) REFERENCES shift(id) ",
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%jadwal_kerja}}');
    }
}
