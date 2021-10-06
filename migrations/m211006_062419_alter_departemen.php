<?php

use yii\db\Migration;

/**
 * Class m211006_062419_alter_departemen
 */
class m211006_062419_alter_departemen extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-departemen-id_divisi', 'departemen');
    
        $this->dropIndex('idx-departemen-id_divisi', 'departemen');
        $this->dropColumn('departemen','id_divisi');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211006_062419_alter_departemen cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211006_062419_alter_departemen cannot be reverted.\n";

        return false;
    }
    */
}
