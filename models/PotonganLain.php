<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "potongan_lain".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int $id_potongan
 * @property float $jumlah
 *
 * @property Pegawai $pegawai
 * @property Potongan $potongan
 */
class PotonganLain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'potongan_lain';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'id_potongan', 'jumlah'], 'required'],
            [['id_pegawai', 'id_potongan'], 'integer'],
            [['tanggal'], 'safe'],
            [['jumlah'], 'number'],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
            [['id_potongan'], 'exist', 'skipOnError' => true, 'targetClass' => Potongan::className(), 'targetAttribute' => ['id_potongan' => 'id']],
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
            'id_potongan' => Yii::t('app', 'Id Potongan'),
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
     * Gets query for [[Potongan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPotongan()
    {
        return $this->hasOne(Potongan::className(), ['id' => 'id_potongan']);
    }
}
