<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $nip
 * @property int|null $id_pelamar
 * @property int $id_divisi
 * @property int|null $id_departemen
 * @property int $id_jabatan
 * @property int|null $id_grade
 * @property string $nama_lengkap
 * @property string $nama_panggilan
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $no_ktp
 * @property string|null $npwp
 * @property string|null $no_bpjs_kesehatan
 * @property string|null $no_bpjs_ketenagakerjaan
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
 * @property Departemen $departemen
 * @property Divisi $divisi
 * @property Grade $grade
 * @property Jabatan $jabatan
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nip', 'id_divisi', 'id_jabatan', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_ktp', 'agama', 'status_pernikahan', 'tingkat_pendidikan_terakhir'], 'required'],
            [['id_pelamar', 'id_divisi', 'id_departemen', 'id_jabatan', 'id_grade'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['alamat_ktp', 'alamat_domisili', 'riwayat_penyakit', 'nama_pendidikan_terakhir'], 'string'],
            [['nilai_pendidikan_terakhir'], 'number'],
            [['nip', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'jenis_kelamin', 'no_ktp', 'npwp', 'no_bpjs_kesehatan', 'no_bpjs_ketenagakerjaan', 'no_hp', 'email', 'agama', 'status_pernikahan'], 'string', 'max' => 255],
            [['golongan_darah'], 'string', 'max' => 1],
            [['tingkat_pendidikan_terakhir'], 'string', 'max' => 10],
            [['nip'], 'unique'],
            [['id_departemen'], 'exist', 'skipOnError' => true, 'targetClass' => Departemen::className(), 'targetAttribute' => ['id_departemen' => 'id']],
            [['id_divisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['id_divisi' => 'id']],
            [['id_grade'], 'exist', 'skipOnError' => true, 'targetClass' => Grade::className(), 'targetAttribute' => ['id_grade' => 'id']],
            [['id_jabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Jabatan::className(), 'targetAttribute' => ['id_jabatan' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nip' => Yii::t('app', 'Nip'),
            'id_pelamar' => Yii::t('app', 'Id Pelamar'),
            'id_divisi' => Yii::t('app', 'Id Divisi'),
            'id_departemen' => Yii::t('app', 'Id Departemen'),
            'id_jabatan' => Yii::t('app', 'Id Jabatan'),
            'id_grade' => Yii::t('app', 'Id Grade'),
            'nama_lengkap' => Yii::t('app', 'Nama Lengkap'),
            'nama_panggilan' => Yii::t('app', 'Nama Panggilan'),
            'tempat_lahir' => Yii::t('app', 'Tempat Lahir'),
            'tanggal_lahir' => Yii::t('app', 'Tanggal Lahir'),
            'jenis_kelamin' => Yii::t('app', 'Jenis Kelamin'),
            'no_ktp' => Yii::t('app', 'No Ktp'),
            'npwp' => Yii::t('app', 'Npwp'),
            'no_bpjs_kesehatan' => Yii::t('app', 'No Bpjs Kesehatan'),
            'no_bpjs_ketenagakerjaan' => Yii::t('app', 'No Bpjs Ketenagakerjaan'),
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
            'divisi.nama' =>'Divisi',
            'jabatan.nama'=>'Jabatan',
     
        ];
    }

    /**
     * Gets query for [[Departemen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartemen()
    {
        return $this->hasOne(Departemen::className(), ['id' => 'id_departemen']);
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

    /**
     * Gets query for [[Grade]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrade()
    {
        return $this->hasOne(Grade::className(), ['id' => 'id_grade']);
    }

    /**
     * Gets query for [[Jabatan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJabatan()
    {
        return $this->hasOne(Jabatan::className(), ['id' => 'id_jabatan']);
    }
}
