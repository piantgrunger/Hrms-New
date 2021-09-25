<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lowongan".
 *
 * @property int $id
 * @property string $kode
 * @property string $tanggal_pengajuan
 * @property int $id_divisi
 * @property int $id_jabatan
 * @property int $jumlah
 * @property string|null $keterangan
 *
 * @property Divisi $divisi
 * @property Jabatan $jabatan
 */
class Lowongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lowongan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'tanggal_pengajuan', 'id_divisi', 'id_jabatan', 'jumlah'], 'required'],
            [['tanggal_pengajuan'], 'safe'],
            [['id_divisi', 'id_jabatan', 'jumlah'], 'integer'],
            [['keterangan'], 'string'],
            [['kode'], 'string', 'max' => 255],
            [['kode'], 'unique'],
            [['id_divisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['id_divisi' => 'id']],
            [['id_jabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['id_jabatan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'tanggal_pengajuan' => 'Tanggal Pengajuan',
            'id_divisi' => 'Id Divisi',
            'id_jabatan' => 'Id Jabatan',
            'jumlah' => 'Jumlah',
            'keterangan' => 'Keterangan',
            'divisi.nama' =>'Divisi',
            'jabatan.nama' =>'Jabatan',
      
        ];
    }

    /**
     * Gets query for [[Divisi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id' => 'id_divisi']);
    }

    /**
     * Gets query for [[Jabatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'id_jabatan']);
    }
}
