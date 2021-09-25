<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%departemen}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%divisi}}`
 */
class m210925_070159_create_departemen_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%departemen}}', [
            'id' => $this->primaryKey(),
            'id_divisi' => $this->integer()->notNull(),
            'kode' => $this->string(20)->unique()->notNull(),
            'nama' => $this->string(50)->unique()->notNull(),
            
        ]);

        // creates index for column `id_divisi`
        $this->createIndex(
            '{{%idx-departemen-id_divisi}}',
            '{{%departemen}}',
            'id_divisi'
        );

        // add foreign key for table `{{%divisi}}`
        $this->addForeignKey(
            '{{%fk-departemen-id_divisi}}',
            '{{%departemen}}',
            'id_divisi',
            '{{%divisi}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%divisi}}`
        $this->dropForeignKey(
            '{{%fk-departemen-id_divisi}}',
            '{{%departemen}}'
        );

        // drops index for column `id_divisi`
        $this->dropIndex(
            '{{%idx-departemen-id_divisi}}',
            '{{%departemen}}'
        );

        $this->dropTable('{{%departemen}}');
    }
}
