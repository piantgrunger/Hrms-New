<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_payroll_tunjangan".
 *
 * @property int $id
 * @property int $id_payroll
 * @property int $id_tunjangan
 * @property float|null $jumlah
 *
 * @property Payroll $payroll
 * @property Tunjangan $tunjangan
 */
class DetailPayrollTunjangan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_payroll_tunjangan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_payroll', 'id_tunjangan','jumlah'], 'required'],
            [['id_payroll', 'id_tunjangan'], 'integer'],
            [['jumlah'], 'number'],
            [['id_payroll'], 'exist', 'skipOnError' => true, 'targetClass' => Payroll::className(), 'targetAttribute' => ['id_payroll' => 'id']],
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
            'id_payroll' => Yii::t('app', 'Id Payroll'),
            'id_tunjangan' => Yii::t('app', 'Id Tunjangan'),
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
     * Gets query for [[Tunjangan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTunjangan()
    {
        return $this->hasOne(Tunjangan::className(), ['id' => 'id_tunjangan']);
    }
}
