<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hitung_gaji}}`.
 */
class m211020_103632_create_hitung_gaji_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hitung_gaji}}', [
            'id' => $this->primaryKey(),
            'tanggal_awal' => $this->date()->notNull(),
            'tanggal_akhir' => $this->date()->notNull(),
            'id_divisi' => $this->integer()->notNull(),
            'FOREIGN KEY (id_divisi) REFERENCES divisi(id)'
    
             
        ]);

        $this->createTable('detail_hitung_gaji',[
            'id' => $this->primaryKey(),
            'id_hitung_gaji' => $this->integer()->notNull(),
            'id_pegawai' => $this->integer()->notNull(),
            'gaji_pokok' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'gaji_lembur' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'tunjangan' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'potongan' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'gaji_lembur' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'bpjs_kesehatan_pegawai' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'bpjs_kesehatan_perusahaan' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'bpjs_tk_pegawai' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'bpjs_tk_perusahaan' => $this->decimal(19,2)->notNull()->defaultValue(0),
            'FOREIGN KEY (id_hitung_gaji) REFERENCES hitung_gaji(id) ON DELETE CASCADE ON UPDATE CASCADE',
       
            

        ]);

    

    $this->createTable('subdetail_hitung_gaji',[
        'id' => $this->primaryKey(),
        'id_detail' => $this->integer()->notNull(),
        'jenis' => $this->string(),
        'jumlah' => $this->decimal(19,2)->notNull()->defaultValue(0),
        'FOREIGN KEY (id_detail) REFERENCES hitung_gaji(id) ON DELETE CASCADE ON UPDATE CASCADE',
       
        

    ]);
    
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hitung_gaji}}');
    }
}
