<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_absen".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $status_hadir
 */
class JenisAbsen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_absen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'status_hadir'], 'required'],
            [['kode', 'nama', 'status_hadir'], 'string', 'max' => 255],
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
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'nama' => Yii::t('app', 'Nama'),
            'status_hadir' => Yii::t('app', 'Status Hadir'),
        ];
    }
}
