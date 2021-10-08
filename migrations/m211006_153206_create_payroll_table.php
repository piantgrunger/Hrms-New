<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payroll}}`.
 */
class m211006_153206_create_payroll_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        $this->createTable('{{%payroll}}', [
            'id' => $this->primaryKey(),
            'id_pegawai' => $this->integer()->notNull()->unique(),
            'gaji_pokok' => $this->decimal(19,2),
            'gaji_lembur' => $this->decimal(19,2),
            'FOREIGN KEY (id_pegawai) REFERENCES pegawai(id)'
        ]);

        $this->createTable('{{%detail_payroll_tunjangan}}', [
            'id' => $this->primaryKey(),
            'id_payroll' => $this->integer()->notNull(),
            'id_tunjangan' => $this->integer()->notNull(),
            'jumlah' => $this->decimal(19,2),
            'FOREIGN KEY (id_payroll) REFERENCES payroll(id)',
            'FOREIGN KEY (id_tunjangan) REFERENCES tunjangan(id)',
            
        ]);

        
        $this->createTable('{{%detail_payroll_potongan}}', [
            'id' => $this->primaryKey(),
            'id_payroll' => $this->integer()->notNull(),
            'id_potongan' => $this->integer()->notNull(),
            'jumlah' => $this->decimal(19,2),
            'FOREIGN KEY (id_payroll) REFERENCES payroll(id)',
            'FOREIGN KEY (id_potongan) REFERENCES potongan(id)',
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payroll}}');
    }
}
