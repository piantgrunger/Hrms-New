<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payroll".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property float|null $gaji_pokok
 * @property float|null $gaji_lembur
 *
 * @property DetailPayrollPotongan[] $detailPayrollPotongans
 * @property DetailPayrollTunjangan[] $detailPayrollTunjangans
 * @property Pegawai $pegawai
 */
class Payroll extends \yii\db\ActiveRecord
{
    use \mdm\behaviors\ar\RelationTrait;
   
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payroll';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai'], 'required'],
            [['id_pegawai'], 'integer'],
            [['gaji_pokok', 'gaji_lembur'], 'number'],
            [['id_pegawai'], 'unique'],
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
            'gaji_pokok' => Yii::t('app', 'Gaji Pokok'),
            'gaji_lembur' => Yii::t('app', 'Gaji Lembur'),
        ];
    }

    /**
     * Gets query for [[DetailPayrollPotongans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPayrollPotongans()
    {
        return $this->hasMany(DetailPayrollPotongan::className(), ['id_payroll' => 'id']);
    }

    public function setDetailPayrollPotongans($value)
    {
         $this->loadRelated('detailPayrollPotongans', $value);
    }
    /**
     * Gets query for [[DetailPayrollTunjangans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPayrollTunjangans()
    {
        return $this->hasMany(DetailPayrollTunjangan::className(), ['id_payroll' => 'id']);
    }

    
    public function setDetailPayrollTunjangans($value)
    {
         $this->loadRelated('detailPayrollTunjangans', $value);
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
