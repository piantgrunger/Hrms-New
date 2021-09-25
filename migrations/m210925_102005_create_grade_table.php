<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%grade}}`.
 */
class m210925_102005_create_grade_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%grade}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->notNull()->unique(),
            'nama' => $this->string()->notNull()->unique(),
            'gaji_pokok' => $this->decimal(19,2)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%grade}}');
    }
}
