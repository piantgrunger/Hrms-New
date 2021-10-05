<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TukarAbsen;

/**
 * TukarAbsenSearch represents the model behind the search form of `app\models\TukarAbsen`.
 */
class TukarAbsenSearch extends TukarAbsen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pegawai', 'id_pengganti'], 'integer'],
            [['tanggal', 'keterangan'], 'safe'],
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
        $query = TukarAbsen::find();

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
            'id_pegawai' => $this->id_pegawai,
            'tanggal' => $this->tanggal,
            'id_pengganti' => $this->id_pengganti,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
