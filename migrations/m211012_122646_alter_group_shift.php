<?php

use yii\db\Migration;

/**
 * Class m211012_122646_alter_group_shift
 */
class m211012_122646_alter_group_shift extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('group_shift', 'refresh_perbulan');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211012_122646_alter_group_shift cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211012_122646_alter_group_shift cannot be reverted.\n";

        return false;
    }
    */
}
