<?php

use yii\db\Migration;

/**
 * Class m211012_103418_alter_detail_group_shift
 */
class m211012_103418_alter_detail_group_shift extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('detail_group_shift', 'urutan', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211012_103418_alter_detail_group_shift cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211012_103418_alter_detail_group_shift cannot be reverted.\n";

        return false;
    }
    */
}
