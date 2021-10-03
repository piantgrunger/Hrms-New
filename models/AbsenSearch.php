<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absen;

/**
 * AbsenSearch represents the model behind the search form of `app\models\Absen`.
 */
class AbsenSearch extends Absen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pegawai', 'id_jenis_absen'], 'integer'],
            [['tanggal', 'masuk_kerja', 'pulang_kerja', 'keterangan'], 'safe'],
            [['terlambat', 'pulang_awal', 'lembur'], 'number'],
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
        $query = Absen::find();

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
            'id_jenis_absen' => $this->id_jenis_absen,
            'terlambat' => $this->terlambat,
            'pulang_awal' => $this->pulang_awal,
            'lembur' => $this->lembur,
        ]);

        $query->andFilterWhere(['like', 'masuk_kerja', $this->masuk_kerja])
            ->andFilterWhere(['like', 'pulang_kerja', $this->pulang_kerja])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
