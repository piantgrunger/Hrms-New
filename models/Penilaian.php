<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int $id_indikator
 * @property int $nilai
 *
 * @property Indikator $indikator
 * @property Pegawai $pegawai
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'id_indikator', 'nilai'], 'required'],
            [['id_pegawai', 'id_indikator', 'nilai'], 'integer'],
            [['tanggal'], 'safe'],
            [['id_indikator'], 'exist', 'skipOnError' => true, 'targetClass' => Indikator::className(), 'targetAttribute' => ['id_indikator' => 'id']],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pegawai' => Yii::t('app', 'Id Pegawai'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'id_indikator' => Yii::t('app', 'Id Indikator'),
            'nilai' => Yii::t('app', 'Nilai'),
        ];
    }

    /**
     * Gets query for [[Indikator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndikator()
    {
        return $this->hasOne(Indikator::className(), ['id' => 'id_indikator']);
    }

    /**
     * Gets query for [[Pegawai]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_pegawai']);
    }
}
