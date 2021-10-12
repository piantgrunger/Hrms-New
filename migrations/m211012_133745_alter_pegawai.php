<?php

use yii\db\Migration;

/**
 * Class m211012_133745_alter_pegawai
 */
class m211012_133745_alter_pegawai extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('pegawai', 'status_shift', $this->string()->notNull()->defaultValue('Shift'));
        $this->addColumn('pegawai', 'id_group_shift', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211012_133745_alter_pegawai cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211012_133745_alter_pegawai cannot be reverted.\n";

        return false;
    }
    */
}
