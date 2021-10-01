<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tes".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $nama
 */
class Tes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }
}
