<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SuratLembur;

/**
 * SuratLemburSearch represents the model behind the search form of `app\models\SuratLembur`.
 */
class LaporanLembur extends SuratLembur
{
    /**
     * @inheritdoc
     */
    public $tanggal_dari;
    public $tanggal_sampai;
    public $divisi;
    
    public function rules()
    {
        return [
            [['id', 'id_pegawai', 'jam_lembur', 'l1', 'l2', 'l3', 'l1_libur', 'l2_libur', 'l3_libur'], 'integer'],
            [['tanggal_dari','tanggal_sampai','divisi'], 'required'],
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
        $query = SuratLembur::find()
        ->joinWith('pegawai');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

       $query->andWhere(['between','tanggal',$this->tanggal_dari,$this->tanggal_sampai]);
       $query->andWhere(['id_divisi'=>$this->divisi]);

        return $dataProvider;
    }

    public function searchRekap($params)
    {
        $query = SuratLembur::find()
        ->joinWith('pegawai');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
             $query->where('0=1');
            return $dataProvider;
        }

       $query->select(['id_pegawai','jam_lembur'=>"sum(jam_lembur)", 'l1'=>"sum(l1)", 'l2'=>"sum(l2)", 'l3'=>"sum(l3)", 'l1_libur'=>"sum(l1_libur)", 'l2_libur'=>"sum(l2_libur)", 'l3_libur'=>"sum(l3_libur)"]);
       $query->groupBy('id_pegawai'); 
       $query->andWhere(['between','tanggal',$this->tanggal_dari,$this->tanggal_sampai]);
       $query->andWhere(['id_divisi'=>$this->divisi]);

        return $dataProvider;
    }
}
