<?php

namespace app\models;
use app\helpers\myhelpers;

use Yii;

/**
 * This is the model class for table "surat_lembur".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int|null $jam_lembur
 * @property int|null $l1
 * @property int|null $l2
 * @property int|null $l3
 * @property int|null $l1_libur
 * @property int|null $l2_libur
 * @property int|null $l3_libur
 */
class SuratLembur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'surat_lembur';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal'], 'required'],
            [['id_pegawai', 'jam_lembur', 'l1', 'l2', 'l3', 'l1_libur', 'l2_libur', 'l3_libur'], 'integer'],
            [['jam_lembur'],'hitungLembur'],
            [['tanggal'], 'safe'],
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
            'jam_lembur' => Yii::t('app', 'Jam Lembur'),
            'l1' => Yii::t('app', 'L1'),
            'l2' => Yii::t('app', 'L2'),
            'l3' => Yii::t('app', 'L3'),
            'l1_libur' => Yii::t('app', 'L1 Libur'),
            'l2_libur' => Yii::t('app', 'L2 Libur'),
            'l3_libur' => Yii::t('app', 'L3 Libur'),
        ];
    }

    public function hitunglembur($attribute, $params)
    {
        $this->l1=0;
        $this->l2=0;
        $this->l3=0;
        
        $this->l1_libur=0;
        $this->l2_libur=0;
        $this->l3_libur=0;
        
        
        $isLibur = myhelpers::isLibur($this->tanggal,$this->id_pegawai);
        if($isLibur)
        {
           $jam_lembur = $this->jam_lembur;
            $this->l1_libur = ($jam_lembur<8)?ceil($jam_lembur):8;
            $jam_lembur -=8;
            if($jam_lembur>0) {
                $this->l2_libur = ($jam_lembur<1)?ceil($jam_lembur):1;
                $jam_lembur -=1; 
            } 
            if($jam_lembur>0) 
            {
                $this->l3_libur = $jam_lembur;

            }
             

        }else{
            $jam_lembur = $this->jam_lembur;
            $this->l1 = ($jam_lembur<1)?ceil($jam_lembur):1;
            $jam_lembur -=1;
            if($jam_lembur>0) {
                $this->l2 =ceil($jam_lembur);
                //$jam_lembur -=1; 
            } 
   
        }

    } 

    public function getPegawai()
    {
        return $this->hasOne(Pegawai::className(), ['id' => 'id_pegawai']);
    }
}
