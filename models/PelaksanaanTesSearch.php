<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PelaksanaanTes;

/**
 * PelaksanaanTesSearch represents the model behind the search form of `app\models\PelaksanaanTes`.
 */
class PelaksanaanTesSearch extends PelaksanaanTes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pelamar', 'id_tes'], 'integer'],
            [['tanggal'], 'safe'],
            [['nilai'], 'number'],
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
        $query = PelaksanaanTes::find();

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
            'tanggal' => $this->tanggal,
            'id_pelamar' => $this->id_pelamar,
            'id_tes' => $this->id_tes,
            'nilai' => $this->nilai,
        ]);

        return $dataProvider;
    }
}
