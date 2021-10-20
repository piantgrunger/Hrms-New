<?php

use yii\db\Migration;

/**
 * Class m211020_152620_alter_sub_detail
 */
class m211020_152620_alter_sub_detail extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('subdetail_hitung_gaji', 'id_ref', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211020_152620_alter_sub_detail cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211020_152620_alter_sub_detail cannot be reverted.\n";

        return false;
    }
    */
}
