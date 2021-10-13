<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Lpj;

/**
 * LpjSearch represents the model behind the search form of `backend\models\Lpj`.
 */
class LpjSearch extends Lpj
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_hibah', 'id_data_pemohon_hibah'], 'integer'],
            [['nm_barang'], 'safe'],
            [['harga_barang'], 'number'],
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
        $query = Lpj::find();

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
            'id_hibah' => $this->id_hibah,
            'id_data_pemohon_hibah' => $this->id_data_pemohon_hibah,
            'harga_barang' => $this->harga_barang,
        ]);

        $query->andFilterWhere(['like', 'nm_barang', $this->nm_barang]);

        return $dataProvider;
    }
}
