<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%detail_pelamar_anak}}`.
 */
class m211010_122931_create_detail_pelamar_anak_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pelamar', 'nama_pasangan', $this->string(100));
        $this->createTable('{{%detail_pelamar_anak}}', [
            'id' => $this->primaryKey(),
            'id_pelamar' => $this->integer()->notNull(),
            'nama' => $this->string(100),
            'pendidikan' => $this->string(),
            'tempat_lahir' => $this->string()->notNull(),
            'tanggal_lahir' => $this->date()->notNull(),
            'status' => $this->string(),
            "FOREIGN KEY (id_pelamar) REFERENCES pelamar(id)     ON DELETE CASCADE
            ON UPDATE CASCADE"
       

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%detail_pelamar_anak}}');
    }
}
