<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%surat_lembur}}`.
 */
class m211004_031722_create_surat_lembur_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%surat_lembur}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull(),
            'tanggal' =>  $this->date()->notNull(),
            'jam_lembur' => $this->integer(),
            'l1' => $this->integer(),
            'l2' => $this->integer(),
            'l3' => $this->integer(),
            'l1_libur' => $this->integer(),
            'l2_libur' => $this->integer(),
            'l3_libur' => $this->integer(),

            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%surat_lembur}}');
    }
}
