<?php

namespace app\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "group_shift".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $tanggal_mulai
 * @property string $refresh_perbulan
 * @property string|null $keterangan
 *
 * @property DetailGroupShift[] $detailGroupShifts
 */
class GroupShift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    use \mdm\behaviors\ar\RelationTrait;
    
    public static function tableName()
    {
        return 'group_shift';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'nama', 'tanggal_mulai'], 'required'],
            [['tanggal_mulai'], 'safe'],
            [['keterangan'], 'string'],
            [['kode', 'nama'], 'string', 'max' => 255],
            [['kode'], 'unique'],
            [['nama'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'kode' => Yii::t('app', 'Kode'),
            'nama' => Yii::t('app', 'Nama'),
            'tanggal_mulai' => Yii::t('app', 'Tanggal Mulai'),
            'refresh_perbulan' => Yii::t('app', 'Refresh Perbulan'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * Gets query for [[DetailGroupShifts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailGroupShifts()
    {
        return $this->hasMany(DetailGroupShift::className(), ['id_group_shift' => 'id']);
    }

    public function setDetailGroupShifts($value)
    {
         $this->loadRelated('detailGroupShifts', $value);
    }

    public function getJumlah_shift()
    {
      return  DetailGroupShift::find()->where(['id_group_shift'=>$this->id])->count();
    }

    public function getShift($tanggal)
    {
        $tanggal_mulai = new DateTime($this->tanggal_mulai);
        $tanggal = new DateTime($tanggal);
        $interval = (int) $tanggal_mulai->diff($tanggal)->format("%a");
        $jml= (int)$this->getJumlah_shift();

        $posistion= ($interval+1) % ($jml);
     
        if($posistion==0)
        {
            
     
            $posistion = (int) $this->jumlah_shift;
        }
       $posistion--; 
       // die(var_dump($posistion-1));
        
        $shift = DetailGroupShift::find()->where(['id_group_shift'=>$this->id,'urutan'=>($posistion)])->one();

        return $shift; 
          
        

    }

    
}
