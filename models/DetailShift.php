<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_shift".
 *
 * @property int $id
 * @property int $id_shift
 * @property int|null $hari
 * @property string|null $masuk_kerja
 * @property string|null $pulang_kerja
 *
 * @property Shift $shift
 */
class DetailShift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_shift';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_shift', 'hari'], 'integer'],
            [['masuk_kerja', 'pulang_kerja'], 'string', 'max' => 5],
            [['id_shift'], 'exist', 'skipOnError' => true, 'targetClass' => Shift::className(), 'targetAttribute' => ['id_shift' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_shift' => Yii::t('app', 'Id Shift'),
            'hari' => Yii::t('app', 'Hari'),
            'masuk_kerja' => Yii::t('app', 'Masuk Kerja'),
            'pulang_kerja' => Yii::t('app', 'Pulang Kerja'),
        ];
    }

    /**
     * Gets query for [[Shift]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShift()
    {
        return $this->hasOne(Shift::className(), ['id' => 'id_shift']);
    }
}
