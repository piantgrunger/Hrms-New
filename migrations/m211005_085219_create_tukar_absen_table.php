<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tukar_absen}}`.
 */
class m211005_085219_create_tukar_absen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tukar_absen}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' =>  $this->date()->notNull(),
            'id_pengganti' => $this->integer()->notNull(),
            'keterangan' => $this->text()->notNull(),"FOREIGN KEY (id_pegawai) REFERENCES pegawai(id) ",
            "FOREIGN KEY (id_pengganti) REFERENCES pegawai(id) ",
        

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tukar_absen}}');
    }
}
