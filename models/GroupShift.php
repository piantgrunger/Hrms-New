<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "group_shift".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $tanggal_mulai
 * @property string $refresh_perbulan
 * @property string|null $keterangan
 *
 * @property DetailGroupShift[] $detailGroupShifts
 */
class GroupShift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    use \mdm\behaviors\ar\RelationTrait;
    
    public static function tableName()
    {
        return 'group_shift';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'tanggal_mulai'], 'required'],
            [['tanggal_mulai'], 'safe'],
            [['keterangan'], 'string'],
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
            'tanggal_mulai' => Yii::t('app', 'Tanggal Mulai'),
            'refresh_perbulan' => Yii::t('app', 'Refresh Perbulan'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * Gets query for [[DetailGroupShifts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailGroupShifts()
    {
        return $this->hasMany(DetailGroupShift::className(), ['id_shift' => 'id']);
    }

    public function setDetailGroupShifts($value)
    {
         $this->loadRelated('detailGroupShifts', $value);
    }

    
}
