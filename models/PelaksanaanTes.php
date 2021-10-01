<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelaksanaan_tes".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $id_pelamar
 * @property int $id_tes
 * @property float $nilai
 *
 * @property Pelamar $pelamar
 * @property Tes $tes
 */
class PelaksanaanTes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelaksanaan_tes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'id_pelamar', 'id_tes', 'nilai'], 'required'],
            [['tanggal'], 'safe'],
            [['id_pelamar', 'id_tes'], 'integer'],
            [['nilai'], 'number'],
            [['id_pelamar'], 'exist', 'skipOnError' => true, 'targetClass' => Pelamar::className(), 'targetAttribute' => ['id_pelamar' => 'id']],
            [['id_tes'], 'exist', 'skipOnError' => true, 'targetClass' => Tes::className(), 'targetAttribute' => ['id_tes' => 'id']],
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
            'id_pelamar' => Yii::t('app', 'Id Pelamar'),
            'id_tes' => Yii::t('app', 'Id Tes'),
            'nilai' => Yii::t('app', 'Nilai'),       
             'pelamar.nama_lengkap' =>'Pelamar',
            'tes.nama' => 'Tes',
    

        ];
    }

    /**
     * Gets query for [[Pelamar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPelamar()
    {
        return $this->hasOne(Pelamar::className(), ['id' => 'id_pelamar']);
    }

    /**
     * Gets query for [[Tes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTes()
    {
        return $this->hasOne(Tes::className(), ['id' => 'id_tes']);
    }
}
