<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail_group_shift".
 *
 * @property int $id
 * @property int $id_group_shift
 * @property int $id_shift
 * @property int|null $urutan
 *
 * @property GroupShift $shift
 * @property Shift $shift0
 */
class DetailGroupShift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_group_shift';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_shift'], 'required'],
            [['id_group_shift', 'id_shift', 'urutan'], 'integer'],
            [['id_shift'], 'exist', 'skipOnError' => true, 'targetClass' => GroupShift::className(), 'targetAttribute' => ['id_shift' => 'id']],
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
            'id_group_shift' => Yii::t('app', 'Id Group Shift'),
            'id_shift' => Yii::t('app', 'Id Shift'),
            'urutan' => Yii::t('app', 'Urutan'),
        ];
    }

    /**
     * Gets query for [[Shift]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShift()
    {
        return $this->hasOne(GroupShift::className(), ['id' => 'id_shift']);
    }

    /**
     * Gets query for [[Shift0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getShift0()
    {
        return $this->hasOne(Shift::className(), ['id' => 'id_shift']);
    }
}
