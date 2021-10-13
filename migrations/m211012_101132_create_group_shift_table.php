<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group_shift}}`.
 */
class m211012_101132_create_group_shift_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group_shift}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string()->notNull()->unique(),
            'nama' => $this->string()->notNull()->unique(),
            
            'tanggal_mulai' => $this->date()->notNull(),
            'refresh_perbulan' => $this->string()->notNull(), 
            'keterangan' => $this->text(),
        ]);

        $this->createTable('{{%detail_group_shift}}', [
            'id' => $this->primaryKey(),
            'id_group_shift' => $this->integer()->notNull(),
            'id_shift' => $this->integer()->notNull(),
            "FOREIGN KEY (id_group_shift) REFERENCES group_shift(id)     ON DELETE CASCADE
            ON UPDATE CASCADE",
            "FOREIGN KEY (id_shift) REFERENCES shift(id)  ",
            
    
            
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%group_shift}}');
    }
}
