<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hitung_gaji".
 *
 * @property int $id
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 * @property int $id_divisi
 *
 * @property DetailHitungGaji[] $detailHitungGajis
 * @property Divisi $divisi
 */
class HitungGaji extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hitung_gaji';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_awal', 'tanggal_akhir', 'id_divisi'], 'required'],
            [['tanggal_awal', 'tanggal_akhir'], 'safe'],
            [['id_divisi'], 'integer'],
            [['id_divisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['id_divisi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tanggal_awal' => Yii::t('app', 'Tanggal Awal'),
            'tanggal_akhir' => Yii::t('app', 'Tanggal Akhir'),
            'id_divisi' => Yii::t('app', 'Id Divisi'),
        ];
    }

    /**
     * Gets query for [[DetailHitungGajis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailHitungGajis()
    {
        return $this->hasMany(DetailHitungGaji::className(), ['id_hitung_gaji' => 'id']);
    }

    /**
     * Gets query for [[Divisi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDivisi()
    {
        return $this->hasOne(Divisi::className(), ['id' => 'id_divisi']);
    }

    public function ProsesHitung()
    {
        $dataPegawai = Payroll::find()->joinWith('pegawai')->where(['id_divisi' => $this->id_divisi])->all();
        foreach($dataPegawai as $pegawai)
        {
            $detail = new DetailHitungGaji();
            $detail->id_hitung_gaji = $this->id;

            $detail->gaji_pokok = $pegawai->gaji_pokok;
            $detail->id_pegawai = $pegawai->id_pegawai;

            //hitung lembur
            $query = SuratLembur::find()

            ->select(['tanggal', 'jam_lembur'=>"sum(jam_lembur)", 'l1'=>"sum(l1)", 'l2'=>"sum(l2)", 'l3'=>"sum(l3)", 'l1_libur'=>"sum(l1_libur)", 'l2_libur'=>"sum(l2_libur)", 'l3_libur'=>"sum(l3_libur)"])
            ->groupBy('tanggal')
            ->andWhere(['between','tanggal',$this->tanggal_awal,$this->tanggal_akhir])
            ->andWhere(['id_pegawai'=>$pegawai->id_pegawai])->all();
            $jumlah=0;
            foreach($query as $lembur)
            {
                $subDetail = new SubdetailHitungGaji();
                $subDetail->id_detail = $this->id;
                $subDetail->id_pegawai = $pegawai->id_pegawai;
                $subDetail->tanggal = $lembur->tanggal;
                $subDetail->jenis ='Lembur';
          

                $subDetail->jumlah = ($lembur)? ($lembur->l1*1.5*$pegawai->gaji_lembur)+($lembur->l2*2*$pegawai->gaji_lembur)
                                    +($lembur->l1_libur*2*$pegawai->gaji_lembur)
                                    +($lembur->l2_libur*3*$pegawai->gaji_lembur)
                                    +($lembur->l3_libur*4*$pegawai->gaji_lembur):0;

              $jumlah+= $subDetail->jumlah;
              $subDetail->save(false); 
            }
            $detail->gaji_lembur = $jumlah;
           //hitung tunjangan                          
           $jumlah=0;
           foreach($pegawai->detailPayrollTunjangans as $tunjangan) {
                
                $subDetail = new SubdetailHitungGaji();
                $subDetail->id_detail = $this->id;
                $subDetail->id_pegawai = $pegawai->id_pegawai;
                $subDetail->id_ref = $tunjangan->id_tunjangan;
                $subDetail->jenis ='Tunjangan';
                if($tunjangan->tunjangan->jenis == 'Tunjangan Tetap')
                {
                    $subDetail->jumlah = $tunjangan->jumlah;
                    $jumlah += $tunjangan->jumlah;
                }
                $subDetail->save(false); 

           }            
           $detail->tunjangan = $jumlah;               
           $jumlah=0;
           foreach($pegawai->detailPayrollPotongans as $potongan) {
                
                $subDetail = new SubdetailHitungGaji();
                $subDetail->id_detail = $this->id;
                $subDetail->id_pegawai = $pegawai->id_pegawai;
                $subDetail->id_ref = $potongan->id_potongan;
                $subDetail->jenis ='Potongan';
                if($potongan->potongan->jenis == 'Potongan Tetap')
                {
                    $subDetail->jumlah = $potongan->jumlah;
                    $jumlah += $potongan->jumlah;
                }
                $subDetail->save(false); 

           }            
           $detail->potongan = $jumlah;               
           $detail->bpjs_kesehatan_pegawai = 1/100*$this->divisi->umk;               
           $detail->bpjs_kesehatan_perusahaan = 4/100*$this->divisi->umk;               
           $detail->bpjs_tk_pegawai = 3/100*$this->divisi->umk;               
           $detail->bpjs_tk_perusahaan = 6.89/100*$this->divisi->umk;               
                                    


           $detail->save();                         
                                    


     
    
        }



    }
}
