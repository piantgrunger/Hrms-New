<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_payroll_potongan".
 *
 * @property int $id
 * @property int $id_payroll
 * @property int $id_potongan
 * @property float|null $jumlah
 *
 * @property Payroll $payroll
 * @property Potongan $potongan
 */
class DetailPayrollPotongan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_payroll_potongan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_payroll', 'id_potongan','jumlah'], 'required'],
            [['id_payroll', 'id_potongan'], 'integer'],
            [['jumlah'], 'number'],
            [['id_payroll'], 'exist', 'skipOnError' => true, 'targetClass' => Payroll::className(), 'targetAttribute' => ['id_payroll' => 'id']],
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
            'id_payroll' => Yii::t('app', 'Id Payroll'),
            'id_potongan' => Yii::t('app', 'Id Potongan'),
            'jumlah' => Yii::t('app', 'Jumlah'),
        ];
    }

    /**
     * Gets query for [[Payroll]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayroll()
    {
        return $this->hasOne(Payroll::className(), ['id' => 'id_payroll']);
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
