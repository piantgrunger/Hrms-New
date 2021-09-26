<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelamar".
 *
 * @property int $id
 * @property string $kode
 * @property int $id_lowongan
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $no_ktp
 * @property string|null $npwp
 * @property string|null $alamat_ktp
 * @property string|null $alamat_domisili
 * @property string|null $no_hp
 * @property string|null $email
 * @property string $agama
 * @property string $status_pernikahan
 * @property string|null $golongan_darah
 * @property string|null $riwayat_penyakit
 * @property string $tingkat_pendidikan_terakhir
 * @property string|null $nama_pendidikan_terakhir
 * @property float|null $nilai_pendidikan_terakhir
 *
 * @property Lowongan $lowongan
 */
class Pelamar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelamar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'id_lowongan', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_ktp', 'agama', 'status_pernikahan', 'tingkat_pendidikan_terakhir'], 'required'],
            [['id_lowongan'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['alamat_ktp', 'alamat_domisili', 'riwayat_penyakit', 'nama_pendidikan_terakhir'], 'string'],
            [['nilai_pendidikan_terakhir'], 'number'],
            [['kode', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'jenis_kelamin', 'no_ktp', 'npwp', 'no_hp', 'email', 'agama', 'status_pernikahan'], 'string', 'max' => 255],
            [['golongan_darah'], 'string', 'max' => 1],
            [['tingkat_pendidikan_terakhir'], 'string', 'max' => 10],
            [['kode'], 'unique'],
            [['id_lowongan'], 'exist', 'skipOnError' => true, 'targetClass' => Lowongan::className(), 'targetAttribute' => ['id_lowongan' => 'id']],
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
            'id_lowongan' => Yii::t('app', 'Id Lowongan'),
            'nama_lengkap' => Yii::t('app', 'Nama Lengkap'),
            'nama_panggilan' => Yii::t('app', 'Nama Panggilan'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'no_ktp' => Yii::t('app', 'No Ktp'),
            'npwp' => Yii::t('app', 'Npwp'),
            'alamat_ktp' => Yii::t('app', 'Alamat Ktp'),
            'alamat_domisili' => Yii::t('app', 'Alamat Domisili'),
            'no_hp' => Yii::t('app', 'No Hp'),
            'email' => Yii::t('app', 'Email'),
            'agama' => Yii::t('app', 'Agama'),
            'status_pernikahan' => Yii::t('app', 'Status Pernikahan'),
            'golongan_darah' => Yii::t('app', 'Golongan Darah'),
            'riwayat_penyakit' => Yii::t('app', 'Riwayat Penyakit'),
            'tingkat_pendidikan_terakhir' => Yii::t('app', 'Tingkat Pendidikan Terakhir'),
            'nama_pendidikan_terakhir' => Yii::t('app', 'Nama Pendidikan Terakhir'),
            'nilai_pendidikan_terakhir' => Yii::t('app', 'Nilai Pendidikan Terakhir'),
        ];
    }

    /**
     * Gets query for [[Lowongan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLowongan()
    {
        return $this->hasOne(Lowongan::className(), ['id' => 'id_lowongan']);
    }
}
