<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelamar;

/**
 * PelamarSearch represents the model behind the search form of `app\models\Pelamar`.
 */
class PelamarSearch extends Pelamar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_lowongan'], 'integer'],
            [['kode', 'nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'no_ktp', 'npwp', 'alamat_ktp', 'alamat_domisili', 'no_hp', 'email', 'agama', 'status_pernikahan', 'golongan_darah', 'riwayat_penyakit', 'tingkat_pendidikan_terakhir', 'nama_pendidikan_terakhir'], 'safe'],
            [['nilai_pendidikan_terakhir'], 'number'],
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
        $query = Pelamar::find();

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
            'id_lowongan' => $this->id_lowongan,
            'tanggal_lahir' => $this->tanggal_lahir,
            'nilai_pendidikan_terakhir' => $this->nilai_pendidikan_terakhir,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'nama_lengkap', $this->nama_lengkap])
            ->andFilterWhere(['like', 'nama_panggilan', $this->nama_panggilan])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'alamat_ktp', $this->alamat_ktp])
            ->andFilterWhere(['like', 'alamat_domisili', $this->alamat_domisili])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'status_pernikahan', $this->status_pernikahan])
            ->andFilterWhere(['like', 'golongan_darah', $this->golongan_darah])
            ->andFilterWhere(['like', 'riwayat_penyakit', $this->riwayat_penyakit])
            ->andFilterWhere(['like', 'tingkat_pendidikan_terakhir', $this->tingkat_pendidikan_terakhir])
            ->andFilterWhere(['like', 'nama_pendidikan_terakhir', $this->nama_pendidikan_terakhir]);

        return $dataProvider;
    }
}
