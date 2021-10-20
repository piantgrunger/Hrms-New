<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HitungGaji;

/**
 * HitungGajiSearch represents the model behind the search form of `app\models\HitungGaji`.
 */
class HitungGajiSearch extends HitungGaji
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_divisi'], 'integer'],
            [['tanggal_awal', 'tanggal_akhir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = HitungGaji::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
            'id_divisi' => $this->id_divisi,
        ]);

        return $dataProvider;
    }
}
