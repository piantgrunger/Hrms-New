<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lowongan;

/**
 * LowonganSearch represents the model behind the search form of `app\models\Lowongan`.
 */
class LowonganSearch extends Lowongan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_divisi', 'id_jabatan', 'jumlah'], 'integer'],
            [['kode', 'tanggal_pengajuan', 'keterangan'], 'safe'],
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
        $query = Lowongan::find();

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
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'id_divisi' => $this->id_divisi,
            'id_jabatan' => $this->id_jabatan,
            'jumlah' => $this->jumlah,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
