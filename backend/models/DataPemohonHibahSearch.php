<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataPemohonHibah;

/**
 * DataPemohonHibahSearch represents the model behind the search form of `backend\models\DataPemohonHibah`.
 */
class DataPemohonHibahSearch extends DataPemohonHibah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ref_pemohon', 'id_hibah', 'no_telp'], 'integer'],
            [['nm_keg', 'lokasi'], 'safe'],
            [['lat', 'lang'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = DataPemohonHibah::find();

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
            'id_ref_pemohon' => $this->id_ref_pemohon,
            'id_hibah' => $this->id_hibah,
            'lat' => $this->lat,
            'lang' => $this->lang,
            'no_telp' => $this->no_telp,
        ]);

        $query->andFilterWhere(['like', 'nm_keg', $this->nm_keg])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi]);

        return $dataProvider;
    }
}
