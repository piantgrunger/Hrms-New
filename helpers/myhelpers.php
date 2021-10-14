<?php

namespace app\helpers;

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\HariLibur;
use app\models\Pegawai;
use app\models\DetailShift;
use app\models\JadwalKerja;

class myhelpers
{
  public static function isLibur($tgl, $idPegawai)
    {
        $pegawai=Pegawai::findOne($idPegawai);
        $hari = date('w', strtotime($tgl)) -1;
       $jadwalKerja=JadwalKerja::find()->where(['id_pegawai'=> $pegawai->id , 'tanggal'=>$tgl])->one();
        if($pegawai->status_shift =='Shift') 
        {
            $id_shift_pegawai = $pegawai->id_shift;
        } else 
        {
            $shift = ($pegawai->group_shift)?$pegawai->group_shift->getShift($tgl) :null;
           // die(var_dump($shift->id_shift));
           $id_shift_pegawai = ($shift) ? (int)$shift->id_shift :"";
           // die(var_dump($id_shift_pegawai));
        }
        

        $id_shift = ($jadwalKerja)? $jadwalKerja->id_shift : $id_shift_pegawai;

        

        $shift = DetailShift::find()->where(['id_shift' => $id_shift, 'hari' => $hari])->one();
         if (is_null($shift)) {
            return true;
        }
        $libur=HariLibur::find()->where(['tanggal' =>$tgl])->one();
        return (!is_null($libur) || ($shift->masuk_kerja=="00:00:00" && $shift->pulang_kerja=="00:00:00"));
    }
}    