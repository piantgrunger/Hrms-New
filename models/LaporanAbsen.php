<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Absen;

/**
 * AbsenSearch represents the model behind the search form of `app\models\Absen`.
 */
class LaporanAbsen extends Absen
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
            [['id', 'id_pegawai', 'id_jenis_absen'], 'integer'],
            [['tanggal', 'masuk_kerja', 'pulang_kerja', 'keterangan'], 'safe'],
            [['terlambat', 'pulang_awal', 'lembur'], 'number'],
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
        $query = Absen::find()
        ->joinWith('pegawai')
        ->joinWith('jenisAbsen');

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
        $select = ['id_pegawai'];
        for($i=1;$i<=31;$i++){
            $select['h'.$i]= new \yii\db\Expression(" max(case when DAY(tanggal)=$i then jenis_absen.kode else null end )");
        }

        $query->select($select);
        $query->groupBy('id_pegawai');
        $query->andWhere(['between','tanggal',$this->tanggal_dari,$this->tanggal_sampai]);
        $query->andWhere(['id_divisi'=>$this->divisi]);
       return $dataProvider;
    }
}
