<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lowongan}}`.
 */
class m210925_153200_create_lowongan_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lowongan}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->notNull()->unique(),
            'tanggal_pengajuan' =>  $this->date()->notNull(),
            'id_divisi' => $this->integer()->notNull(),
            'id_jabatan' => $this->integer()->notNull(),
            'jumlah' => $this->integer()->notNull(),
            'keterangan' => $this->text(),


        ]);
        // creates index for column `id_divisi`
        $this->createIndex(
            '{{%idx-lowongan-id_divisi}}',
            '{{%lowongan}}',
            'id_divisi'
        );

        // add foreign key for table `{{%divisi}}`
        $this->addForeignKey(
            '{{%fk-lowongan-id_divisi}}',
            '{{%lowongan}}',
            'id_divisi',
            '{{%divisi}}',
            'id',
            'CASCADE'
        );

                // creates index for column `id_jabatan`
                $this->createIndex(
                    '{{%idx-lowongan-id_jabatan}}',
                    '{{%lowongan}}',
                    'id_jabatan'
                );
        
                // add foreign key for table `{{%jabatan}}`
                $this->addForeignKey(
                    '{{%fk-lowongan-id_jabatan}}',
                    '{{%lowongan}}',
                    'id_jabatan',
                    '{{%jabatan}}',
                    'id',
                    'CASCADE'
                );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lowongan}}');
    }
}
