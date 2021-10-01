<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%shift}}`.
 */
class m211001_140356_create_shift_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%shift}}', [
            'id' => $this->primaryKey(),
            'kode' => $this->string(50)->notNull(),
            'nama' => $this->string(100)->notNull(),
            'keterangan' => $this->text(),
            
        ]);

        $this->createTable('{{%detail_shift}}', [
            'id' => $this->primaryKey(),
            'id_shift' => $this->integer()->notNull(),
            'hari' => $this->integer(),
            'masuk_kerja' => $this->string(5),
            'pulang_kerja' => $this->string(5),
            "FOREIGN KEY (id_shift) REFERENCES shift(id)     ON DELETE CASCADE
            ON UPDATE CASCADE"
            
        ]);
        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropTable('{{%detail_shift}}');
        $this->dropTable('{{%shift}}');
    }
}
