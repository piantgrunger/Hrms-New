<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "surat_cuti".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int $id_jenis_absen
 * @property string $keterangan
 *
 * @property JenisAbsen $jenisAbsen
 * @property Pegawai $pegawai
 */
class SuratCuti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_cuti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'id_jenis_absen', 'keterangan'], 'required'],
            [['id_pegawai', 'id_jenis_absen'], 'integer'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
            [['id_jenis_absen'], 'exist', 'skipOnError' => true, 'targetClass' => JenisAbsen::className(), 'targetAttribute' => ['id_jenis_absen' => 'id']],
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
            'id_jenis_absen' => Yii::t('app', 'Id Jenis Absen'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'jenisAbsen.nama' =>'Jenis Absen'
        ];
    }

    /**
     * Gets query for [[JenisAbsen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisAbsen()
    {
        return $this->hasOne(JenisAbsen::className(), ['id' => 'id_jenis_absen']);
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
