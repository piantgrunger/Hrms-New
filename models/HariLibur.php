<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hari_libur".
 *
 * @property int $id
 * @property string $tanggal
 * @property string|null $nama
 */
class HariLibur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hari_libur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal'], 'required'],
            [['tanggal'], 'safe'],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'nama' => Yii::t('app', 'Nama'),
        ];
    }
}
