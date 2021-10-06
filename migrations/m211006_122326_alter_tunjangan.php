<?php

use yii\db\Migration;

/**
 * Class m211006_122326_alter_tunjangan
 */
class m211006_122326_alter_tunjangan extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tunjangan', 'id_shift', $this->integer());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211006_122326_alter_tunjangan cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211006_122326_alter_tunjangan cannot be reverted.\n";

        return false;
    }
    */
}
