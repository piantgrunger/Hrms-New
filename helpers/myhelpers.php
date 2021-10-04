<?php

namespace app\helpers;

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\HariLibur;
use app\models\Pegawai;
use app\models\DetailShift;

class myhelpers
{
  public static function isLibur($tgl, $idPegawai)
    {
        $pegawai=Pegawai::findOne($idPegawai);
        $hari = date('w', strtotime($tgl)) -1;
        $shift = DetailShift::find()->where(['id_shift' => $pegawai->id_shift, 'hari' => $hari])->one();
        if (is_null($shift)) {
            return true;
        }
        $libur=HariLibur::find()->where(['tanggal_libur' =>$tgl])->one();
        return (!is_null($libur) || ($shift->jam_masuk=="00:00:00" && $shift->jam_pulang=="00:00:00"));
    }
}    