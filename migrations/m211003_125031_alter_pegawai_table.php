<?php

use yii\db\Migration;

/**
 * Class m211003_125031_alter_pegawai_table
 */
class m211003_125031_alter_pegawai_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pegawai', 'id_shift', $this->integer());
            // creates index for column `id_shift`
            $this->createIndex(
                '{{%idx-pegawai-id_shift}}',
                '{{%pegawai}}',
                'id_shift'
            );
    
            // add foreign key for table `{{%shift}}`
            $this->addForeignKey(
                '{{%fk-pegawai-id_shift}}',
                '{{%pegawai}}',
                'id_shift',
                '{{%shift}}',
                'id',
                'CASCADE'
            );
    

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211003_125031_alter_pegawai_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211003_125031_alter_pegawai_table cannot be reverted.\n";

        return false;
    }
    */
}
