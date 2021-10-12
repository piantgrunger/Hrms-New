<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_pelamar_anak".
 *
 * @property int $id
 * @property int $id_pelamar
 * @property string|null $nama
 * @property string|null $pendidikan
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string|null $status
 *
 * @property Pelamar $pelamar
 */
class DetailPelamarAnak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pelamar_anak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tempat_lahir', 'tanggal_lahir'], 'required'],
            [['id_pelamar'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['pendidikan', 'tempat_lahir', 'status'], 'string', 'max' => 255],
            [['id_pelamar'], 'exist', 'skipOnError' => true, 'targetClass' => Pelamar::className(), 'targetAttribute' => ['id_pelamar' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pelamar' => Yii::t('app', 'Id Pelamar'),
            'nama' => Yii::t('app', 'Nama'),
            'pendidikan' => Yii::t('app', 'Pendidikan'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'status' => Yii::t('app', 'Status'),
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
}
