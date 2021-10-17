<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tunjangan_lain".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int $id_tunjangan
 * @property float $jumlah
 *
 * @property Pegawai $pegawai
 * @property Tunjangan $tunjangan
 */
class TunjanganLain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tunjangan_lain';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'id_tunjangan', 'jumlah'], 'required'],
            [['id_pegawai', 'id_tunjangan'], 'integer'],
            [['tanggal'], 'safe'],
            [['jumlah'], 'number'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
            [['id_tunjangan'], 'exist', 'skipOnError' => true, 'targetClass' => Tunjangan::className(), 'targetAttribute' => ['id_tunjangan' => 'id']],
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
            'id_tunjangan' => Yii::t('app', 'Id Tunjangan'),
            'jumlah' => Yii::t('app', 'Jumlah'),
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
     * Gets query for [[Tunjangan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTunjangan()
    {
        return $this->hasOne(Tunjangan::className(), ['id' => 'id_tunjangan']);
    }
}
