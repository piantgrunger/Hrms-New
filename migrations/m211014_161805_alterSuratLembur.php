<?php

use yii\db\Migration;

/**
 * Class m211014_161805_alterSuratLembur
 */
class m211014_161805_alterSuratLembur extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

       $this->dropColumn('surat_cuti', 'tanggal');
        $this->addColumn('surat_cuti', 'tanggal_dari',$this->date()->notNull()->defaultValue(date('Y-m-d')));
        $this->addColumn('surat_cuti', 'tanggal_sampai',$this->date()->notNull()->defaultValue(date('Y-m-d')));
        $this->addColumn('absen', 'id_cuti',$this->integer());
                // creates index for column `id_divisi`
              $this->createIndex(
                    '{{%idx-absen-id_cuti}}',
                    '{{%absen}}',
                    'id_cuti'
                );
        
                // add foreign key for table `{{%divisi}}`
                $this->addForeignKey(
                    '{{%fk-absen-id_cuti}}',
                    '{{%absen}}',
                    'id_cuti',
                    '{{%surat_cuti}}',
                    'id',
                    'CASCADE',
                    'CASCADE'
                );
        



        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211014_161805_alterSuratLembur cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211014_161805_alterSuratLembur cannot be reverted.\n";

        return false;
    }
    */
}
