<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "absen".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property string $tanggal
 * @property int $id_jenis_absen
 * @property string|null $masuk_kerja
 * @property string|null $pulang_kerja
 * @property float|null $terlambat
 * @property float|null $pulang_awal
 * @property float|null $lembur
 * @property string|null $keterangan
 *
 * @property JenisAbsen $jenisAbsen
 * @property Pegawai $pegawai
 */
class Absen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'absen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'tanggal', 'id_jenis_absen'], 'required'],
            [['id_pegawai', 'id_jenis_absen'], 'integer'],
            [['tanggal'], 'safe'],
            [['terlambat', 'pulang_awal', 'lembur'], 'number'],
            [['keterangan'], 'string'],
            [['masuk_kerja', 'pulang_kerja'], 'string', 'max' => 5],
            [['id_pegawai'], 'exist', 'skipOnError' => true, 'targetClass' => Pegawai::className(), 'targetAttribute' => ['id_pegawai' => 'id']],
            [['id_jenis_absen'], 'exist', 'skipOnError' => true, 'targetClass' => JenisAbsen::className(), 'targetAttribute' => ['id_jenis_absen' => 'id']],
            [['masuk_kerja'], 'hitungJamTerlambat'],
            [['pulang_kerja'], 'hitungJamPulang'],

        ];
    }

    /**
     * {@inheritdoc}
     * 
     * 
     */

    public function hitungJamTerlambat($attribute, $params)
    {
        $hari = date('w', strtotime($this->tanggal)) -1;
        if ($this->jenisAbsen->status_hadir == 'Hadir') {
            $shift = DetailShift::find()->where(['id_shift' => $this->pegawai->id_shift, 'hari' => $hari])->one();


            if (!is_null($shift)) {
                 if (((strtotime($this->masuk_kerja) - strtotime($shift->masuk_kerja)) / 3600) > 0.001) {
                    $this->terlambat = ((strtotime($this->masuk_kerja) - strtotime($shift->masuk_kerja)) / 3600);
                } else {
                    $this->terlambat = 0;
                }
            } else {
                $this->terlambat =0;
            }
        } else {
            if ($this->scenario !== 'Cuti') {
                $this->masuk_kerja = '00:00';
                $this->terlambat = 0;
            }
        }

        return true;
    }

    public function hitungJamPulang($attribute, $params)
    {
        $hari = date('w', strtotime($this->tanggal))-1;
        if ($this->jenisAbsen->status_hadir == 'Hadir') {
            $shift = DetailShift::find()->where(['id_shift' => $this->pegawai->id_shift, 'hari' => $hari])->one();

            if (!is_null($shift)) {
                // if (((strtotime($this->pulang_kerja) - strtotime($shift->jam_pulang)) / 3600) >  $toleransi) {
                //     $this->alasan = "Pulang Melebihi Toleransi Pukul: ".$this->pulang_kerja;
                //     $this->pulang_kerja = null;
                //     $this->pulang_awal = 0;
                // } else

                
                if (((strtotime($this->pulang_kerja) - strtotime($shift->pulang_kerja)) / 3600) >0) {
                    $this->lembur = (abs(strtotime($this->pulang_kerja) - strtotime($shift->pulang_kerja)) / 3600);
                } else {
                    $this->lembur = 0;
                }
            

                if (((strtotime($this->pulang_kerja) - strtotime($shift->pulang_kerja)) / 3600) < 0) {
                    $this->pulang_awal = (abs(strtotime($shift->pulang_kerja) - strtotime($this->pulang_kerja)) / 3600);
                } else {
                    $this->pulang_awal = 0;
                }
            } else {
                $this ->pulang_awal=0;
            }
        } else {
            if ($this->scenario !== 'Cuti') {
                $this->pulang_kerja = '00:00';
                $this->pulang_awal = 0;
            }
        }

        return true;
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_pegawai' => Yii::t('app', 'Id Pegawai'),
            'tanggal' => Yii::t('app', 'Tanggal'),
            'id_jenis_absen' => Yii::t('app', 'Id Jenis Absen'),
            'masuk_kerja' => Yii::t('app', 'Masuk Kerja'),
            'pulang_kerja' => Yii::t('app', 'Pulang Kerja'),
            'terlambat' => Yii::t('app', 'Terlambat'),
            'pulang_awal' => Yii::t('app', 'Pulang Awal'),
            'lembur' => Yii::t('app', 'Lembur'),
            'keterangan' => Yii::t('app', 'Keterangan'),
        ];
    }

    /**
     * Gets query for [[JenisAbsen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisAbsen()
    {
        return $this->hasOne(JenisAbsen::className(), ['id' => 'id_jenis_absen']);
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