<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_pegawai_anak".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string|null $nama
 * @property string|null $pendidikan
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string|null $status
 *
 * @property Pegawai $pegawai
 */
class DetailPegawaiAnak extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pegawai_anak';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['id_pegawai'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['nama'], 'string', 'max' => 100],
            [['pendidikan', 'tempat_lahir', 'status'], 'string', 'max' => 255],
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
            'nama' => Yii::t('app', 'Nama'),
            'pendidikan' => Yii::t('app', 'Pendidikan'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'status' => Yii::t('app', 'Status'),
        ];
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
