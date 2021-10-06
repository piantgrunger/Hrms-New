<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tunjangan".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $jenis
 * @property float $jumlah
 */
class Tunjangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tunjangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'jenis', 'jumlah'], 'required'],
            [['jumlah'], 'number'],
            [['id_shift'],'integer'],
            [['id_shift'],'required','when'=>function($model) {
                return $model->jenis == 'Tunjangan Premi Shift';
            },'enableClientValidation' => false ],
            [['kode', 'nama', 'jenis'], 'string', 'max' => 255],
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
            'jenis' => Yii::t('app', 'Jenis'),
            'jumlah' => Yii::t('app', 'Jumlah'),
        ];
    }
}
