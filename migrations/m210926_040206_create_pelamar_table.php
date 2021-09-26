<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pelamar}}`.
 */
class m210926_040206_create_pelamar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pelamar}}', [
            'id' => $this->primaryKey(),
            'kode'=> $this->string()->notNull()->unique(),
            'id_lowongan' => $this->integer()->notNull(),
            'nama_lengkap'=> $this->string()->notNull(),
            'nama_panggilan'=> $this->string()->notNull(),
            
            'tempat_lahir'=> $this->string()->notNull(),
            'tanggal_lahir'=> $this->date()->notNull(),
            'jenis_kelamin'=> $this->string()->notNull(),
           
            'no_ktp'=> $this->string()->notNull(),
            'npwp'=> $this->string(),
            
            'alamat_ktp'=> $this->text(),
            'alamat_domisili'=> $this->text(),
            'no_hp'=> $this->string(),
            'email'=> $this->string(),
            'agama'=> $this->string()->notNull(),
            'status_pernikahan'=> $this->string()->notNull(),
            'golongan_darah'=> $this->string(1),
            'riwayat_penyakit'=> $this->text(),
            'tingkat_pendidikan_terakhir' => $this->string(10)->notNull(),
            'nama_pendidikan_terakhir' => $this->text(),
            'nilai_pendidikan_terakhir' => $this->decimal(10,2),
            


        ]);

            // creates index for column `id_lowongan`
            $this->createIndex(
                '{{%idx-pelamar-id_lowongan}}',
                '{{%pelamar}}',
                'id_lowongan'
            );
    
            // add foreign key for table `{{%lowongan}}`
            $this->addForeignKey(
                '{{%fk-pelamar-id_lowongan}}',
                '{{%pelamar}}',
                'id_lowongan',
                '{{%lowongan}}',
                'id',
                'CASCADE'
            );
    
        

        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pelamar}}');
    }
}
