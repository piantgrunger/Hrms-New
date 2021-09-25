<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * This is the model class for table "jabatan".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 */
class Jabatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */


    public static function tableName()
    {
        return 'jabatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'nama'], 'required'],
            [['kode', 'nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
        ];
    }
}
