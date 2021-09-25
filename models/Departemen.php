<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departemen".
 *
 * @property int $id
 * @property int $id_divisi
 * @property string $kode
 * @property string $nama
 * @property string $alamat
 *
 * @property Divisi $divisi
 */
class Departemen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departemen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_divisi', 'kode', 'nama'], 'required'],
            [['id_divisi'], 'integer'],
            [['kode'], 'string', 'max' => 20],
            [['nama'], 'string', 'max' => 50],
            [['kode'], 'unique'],
            [['nama'], 'unique'],
            [['id_divisi'], 'exist', 'skipOnError' => true, 'targetClass' => Divisi::className(), 'targetAttribute' => ['id_divisi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_divisi' => 'Id Divisi',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'divisi.nama' => 'Divisi'
        ];
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
}
