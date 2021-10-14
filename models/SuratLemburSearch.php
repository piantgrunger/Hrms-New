<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratLembur;

/**
 * SuratLemburSearch represents the model behind the search form of `app\models\SuratLembur`.
 */
class SuratLemburSearch extends SuratLembur
{
    /**
     * @inheritdoc
     */
    
    public function rules()
    {
        return [
            [['id', 'id_pegawai', 'jam_lembur', 'l1', 'l2', 'l3', 'l1_libur', 'l2_libur', 'l3_libur'], 'integer'],
            [['tanggal'], 'safe'],
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
        $query = SuratLembur::find();

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
            'jam_lembur' => $this->jam_lembur,
            'l1' => $this->l1,
            'l2' => $this->l2,
            'l3' => $this->l3,
            'l1_libur' => $this->l1_libur,
            'l2_libur' => $this->l2_libur,
            'l3_libur' => $this->l3_libur,
        ]);

        return $dataProvider;
    }
}
