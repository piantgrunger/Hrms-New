<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%surat_cuti}}`.
 */
class m211005_083723_create_surat_cuti_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%surat_cuti}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' =>  $this->date()->notNull(),
            'id_jenis_absen' => $this->integer()->notNull(),
            'keterangan' => $this->text()->notNull(),"FOREIGN KEY (id_pegawai) REFERENCES pegawai(id) ",
            "FOREIGN KEY (id_jenis_absen) REFERENCES jenis_absen(id) ",
            

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%surat_cuti}}');
    }
}
