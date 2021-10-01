<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "shift".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string|null $keterangan
 *
 * @property DetailShift[] $detailShifts
 */
class Shift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    use \mdm\behaviors\ar\RelationTrait;
    public static function tableName()
    {
        return 'shift';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama'], 'required'],
            [['keterangan'], 'string'],
            [['kode'], 'string', 'max' => 50],
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
            'kode' => Yii::t('app', 'Kode'),
            'nama' => Yii::t('app', 'Nama'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * Gets query for [[DetailShifts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailShifts()
    {
        return $this->hasMany(DetailShift::className(), ['id_shift' => 'id']);
    }
    public function setDetailShifts($value)
    {
        return $this->loadRelated('detailShifts', $value);;
    }
    
}
