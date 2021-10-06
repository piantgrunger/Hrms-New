<?php

use yii\db\Migration;

/**
 * Class m211006_121415_alter_absen
 */
class m211006_121415_alter_absen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('absen', 'id_shift', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211006_121415_alter_absen cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211006_121415_alter_absen cannot be reverted.\n";

        return false;
    }
    */
}
