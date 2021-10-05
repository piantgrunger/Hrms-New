<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tukar_absen".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int $id_pengganti
 * @property string $keterangan
 *
 * @property Pegawai $pegawai
 * @property Pegawai $pengganti
 */
class TukarAbsen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tukar_absen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'id_pengganti', 'keterangan'], 'required'],
            [['id_pegawai', 'id_pengganti'], 'integer'],
            ['id_pegawai', 'compare', 'compareAttribute' => 'id_pengganti', 'operator' => '!=', 'message' => 'Pegawai Tidak Boleh Sama'],
            [['tanggal'], 'safe'],
            [['keterangan'], 'string'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
            [['id_pengganti'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pengganti' => 'id']],
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
            'id_pengganti' => Yii::t('app', 'Id Pengganti'),
            'keterangan' => Yii::t('app', 'Keterangan'),
            'pegawai.nama_lengkap'=>'Pegawai',
            
            'pengganti.nama_lengkap'=>'Pengganti',
   
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

    /**
     * Gets query for [[Pengganti]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPengganti()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_pengganti']);
    }
}
