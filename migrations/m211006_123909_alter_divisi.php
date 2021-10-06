<?php

use yii\db\Migration;

/**
 * Class m211006_123909_alter_divisi
 */
class m211006_123909_alter_divisi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('divisi', 'umk', $this->decimal(19,4)->notNull()->defaultExpression('0'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211006_123909_alter_divisi cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211006_123909_alter_divisi cannot be reverted.\n";

        return false;
    }
    */
}
