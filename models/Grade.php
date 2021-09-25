<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property float $gaji_pokok
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'gaji_pokok'], 'required'],
            [['gaji_pokok'], 'number'],
            [['kode', 'nama'], 'string', 'max' => 255],
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
            'gaji_pokok' => 'Gaji Pokok',
        ];
    }
}
