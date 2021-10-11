<?php

use yii\db\Migration;

/**
 * Class m211011_154331_alter_user_table
 */
class m211011_154331_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'id_pegawai', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211011_154331_alter_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211011_154331_alter_user_table cannot be reverted.\n";

        return false;
    }
    */
}
