<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_hitung_gaji".
 *
 * @property int $id
 * @property int $id_hitung_gaji
 * @property int $id_pegawai
 * @property float $gaji_pokok
 * @property float $gaji_lembur
 * @property float $tunjangan
 * @property float $potongan
 * @property float $bpjs_kesehatan_pegawai
 * @property float $bpjs_kesehatan_perusahaan
 * @property float $bpjs_tk_pegawai
 * @property float $bpjs_tk_perusahaan
 *
 * @property HitungGaji $hitungGaji
 * @property SubdetailHitungGaji[] $subdetailHitungGajis
 */
class DetailHitungGaji extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_hitung_gaji';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_hitung_gaji', 'id_pegawai'], 'required'],
            [['id_hitung_gaji', 'id_pegawai'], 'integer'],
            [['gaji_pokok', 'gaji_lembur', 'tunjangan', 'potongan', 'bpjs_kesehatan_pegawai', 'bpjs_kesehatan_perusahaan', 'bpjs_tk_pegawai', 'bpjs_tk_perusahaan'], 'number'],
            [['id_hitung_gaji'], 'exist', 'skipOnError' => true, 'targetClass' => HitungGaji::className(), 'targetAttribute' => ['id_hitung_gaji' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_hitung_gaji' => Yii::t('app', 'Id Hitung Gaji'),
            'id_pegawai' => Yii::t('app', 'Id Pegawai'),
            'gaji_pokok' => Yii::t('app', 'Gaji Pokok'),
            'gaji_lembur' => Yii::t('app', 'Gaji Lembur'),
            'tunjangan' => Yii::t('app', 'Tunjangan'),
            'potongan' => Yii::t('app', 'Potongan'),
            'bpjs_kesehatan_pegawai' => Yii::t('app', 'Bpjs Kesehatan Pegawai'),
            'bpjs_kesehatan_perusahaan' => Yii::t('app', 'Bpjs Kesehatan Perusahaan'),
            'bpjs_tk_pegawai' => Yii::t('app', 'Bpjs Tk Pegawai'),
            'bpjs_tk_perusahaan' => Yii::t('app', 'Bpjs Tk Perusahaan'),
        ];
    }

    /**
     * Gets query for [[HitungGaji]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHitungGaji()
    {
        return $this->hasOne(HitungGaji::className(), ['id' => 'id_hitung_gaji']);
    }
    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_pegawai']);
    }
    /**
     * Gets query for [[SubdetailHitungGajis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubdetailHitungGajis()
    {
        return $this->hasMany(SubdetailHitungGaji::className(), ['id_detail' => 'id']);
    }
}
