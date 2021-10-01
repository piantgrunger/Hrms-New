<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pegawai}}`.
 */
class m210927_144523_create_pegawai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        

        $this->createTable('{{%pegawai}}', [
            'id' => $this->primaryKey(),
            'nip'=> $this->string()->notNull()->unique(),
            'id_pelamar' => $this->integer(),
            'id_divisi' => $this->integer()->notNull(),
            'id_departemen' => $this->integer(),
            'id_jabatan' => $this->integer()->notNull(),
            'id_grade' => $this->integer(),
            
         
            'nama_lengkap'=> $this->string()->notNull(),
            'nama_panggilan'=> $this->string()->notNull(),
            
            'tempat_lahir'=> $this->string()->notNull(),
            'tanggal_lahir'=> $this->date()->notNull(),
            'jenis_kelamin'=> $this->string()->notNull(),
           
            'no_ktp'=> $this->string()->notNull(),
            'npwp'=> $this->string(),
            'no_bpjs_kesehatan'=> $this->string(),
            
            'no_bpjs_ketenagakerjaan'=> $this->string(),
            
            
            
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
            'foto' => $this->string(100),
            


        ]);

                // creates index for column `id_divisi`
                $this->createIndex(
                    '{{%idx-pegawai-id_divisi}}',
                    '{{%pegawai}}',
                    'id_divisi'
                );
        
                // add foreign key for table `{{%divisi}}`
                $this->addForeignKey(
                    '{{%fk-pegawai-id_divisi}}',
                    '{{%pegawai}}',
                    'id_divisi',
                    '{{%divisi}}',
                    'id',
                    'CASCADE'
                );
                // creates index for column `id_divisi`
                $this->createIndex(
                    '{{%idx-pegawai-id_departemen}}',
                    '{{%pegawai}}',
                    'id_departemen'
                );
        
                // add foreign key for table `{{%divisi}}`
                $this->addForeignKey(
                    '{{%fk-pegawai-id_departemen}}',
                    '{{%pegawai}}',
                    'id_departemen',
                    '{{%departemen}}',
                    'id',
                    'CASCADE'
                );
        
                        // creates index for column `id_jabatan`
                        $this->createIndex(
                            '{{%idx-pegawai-id_jabatan}}',
                            '{{%pegawai}}',
                            'id_jabatan'
                        );
                
                        // add foreign key for table `{{%jabatan}}`
                        $this->addForeignKey(
                            '{{%fk-pegawai-id_jabatan}}',
                            '{{%pegawai}}',
                            'id_jabatan',
                            '{{%jabatan}}',
                            'id',
                            'CASCADE'
                        );
        
                        // creates index for column `id_jabatan`
                        $this->createIndex(
                            '{{%idx-pegawai-id_grade}}',
                            '{{%pegawai}}',
                            'id_grade'
                        );
                
                        // add foreign key for table `{{%jabatan}}`
                        $this->addForeignKey(
                            '{{%fk-pegawai-id_grade}}',
                            '{{%pegawai}}',
                            'id_grade',
                            '{{%grade}}',
                            'id',
                            'CASCADE'
                        );
        
  }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pegawai}}');
    }
}
