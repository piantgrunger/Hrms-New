<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%absen}}`.
 */
class m211002_041448_create_absen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%absen}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' => $this->date()->notNull(),
            'id_jenis_absen' => $this->integer()->notNull(),
            'masuk_kerja' => $this->string(5),
            'pulang_kerja' => $this->string(5),
            'terlambat' => $this->decimal(5,2),
            'pulang_awal' => $this->decimal(5,2),
            'lembur' => $this->decimal(5,2),
            'keterangan' => $this->text(),
            "FOREIGN KEY (id_pegawai) REFERENCES pegawai(id) ",
            "FOREIGN KEY (id_jenis_absen) REFERENCES jenis_absen(id) ",
            
     
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%absen}}');
    }
}
