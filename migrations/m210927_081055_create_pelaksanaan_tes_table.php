<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pelaksanaan_tes}}`.
 */
class m210927_081055_create_pelaksanaan_tes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pelaksanaan_tes}}', [
            'id' => $this->primaryKey(),
            'tanggal' => $this->date()->notNull(),
            'id_pelamar' => $this->integer()->notNull(),
            'id_tes' => $this->integer()->notNull(),
            'nilai' => $this->decimal(5,2)->notNull(),
            
        ]);

        
            // creates index for column `id_pelamar`
            $this->createIndex(
                '{{%idx-pelaksanaan_tes-id_pelamar}}',
                '{{%pelaksanaan_tes}}',
                'id_pelamar'
            );
    
            // add foreign key for table `{{%pelamar}}`
            $this->addForeignKey(
                '{{%fk-pelaksanaan_tes-id_pelamar}}',
                '{{%pelaksanaan_tes}}',
                'id_pelamar',
                '{{%pelamar}}',
                'id',
                'CASCADE'
            );
    

            
            // creates index for column `id_tes`
            $this->createIndex(
                '{{%idx-pelaksanaan_tes-id_tes}}',
                '{{%pelaksanaan_tes}}',
                'id_tes'
            );
    
            // add foreign key for table `{{%tes}}`
            $this->addForeignKey(
                '{{%fk-pelaksanaan_tes-id_tes}}',
                '{{%pelaksanaan_tes}}',
                'id_tes',
                '{{%tes}}',
                'id',
                'CASCADE'
            );
    
        

        

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pelaksanaan_tes}}');
    }
}
