<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divisi".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $alamat
 */
class Divisi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'divisi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'alamat','umk'], 'required'],
            [['alamat'], 'string'],
            [['umk'],'number'],
            [['kode', 'nama'], 'string', 'max' => 20],
            [['kode'], 'unique'],
            [['nama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
        ];
    }
}
