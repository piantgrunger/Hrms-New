<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indikator".
 *
 * @property int $id
 * @property string|null $kode
 * @property string|null $nama
 * @property int|null $bobot
 */
class Indikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'indikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bobot'], 'integer'],
            [['kode', 'nama'], 'string', 'max' => 255],
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
            'bobot' => Yii::t('app', 'Bobot'),
        ];
    }
}
