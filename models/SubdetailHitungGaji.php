<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subdetail_hitung_gaji".
 *
 * @property int $id
 * @property int $id_detail
 * @property string|null $jenis
 * @property float $jumlah
 *
 * @property DetailHitungGaji $detail
 */
class SubdetailHitungGaji extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subdetail_hitung_gaji';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_detail'], 'required'],
            [['id_detail','id_ref'], 'integer'],
            [['jumlah'], 'number'],
            [['tanggal'],'safe'],
            [['jenis'], 'string', 'max' => 255],
            [['id_detail'], 'exist', 'skipOnError' => true, 'targetClass' => DetailHitungGaji::className(), 'targetAttribute' => ['id_detail' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_detail' => Yii::t('app', 'Id Detail'),
            'jenis' => Yii::t('app', 'Jenis'),
            'jumlah' => Yii::t('app', 'Jumlah'),
        ];
    }

    /**
     * Gets query for [[Detail]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetail()
    {
        return $this->hasOne(DetailHitungGaji::className(), ['id' => 'id_detail']);
    }
}
