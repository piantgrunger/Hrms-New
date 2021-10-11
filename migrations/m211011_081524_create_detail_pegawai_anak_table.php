<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%detail_pegawai_anak}}`.
 */
class m211011_081524_create_detail_pegawai_anak_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pegawai', 'nama_pasangan', $this->string(100));
        $this->addColumn('pegawai', 'status', $this->string(100)->notNull()->defaultValue('Pegawai Tetap'));
        $this->addColumn('pegawai', 'tanggal_diterima', $this->date()->notNull()->defaultValue('2021-01-01'));

        
     
     
        $this->createTable('{{%detail_pegawai_anak}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'nama' => $this->string(100),
            'pendidikan' => $this->string(),
            'tempat_lahir' => $this->string()->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'status' => $this->string(),
            "FOREIGN KEY (id_pegawai) REFERENCES pegawai(id)     ON DELETE CASCADE
            ON UPDATE CASCADE"
      
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%detail_pegawai_anak}}');
    }
}
