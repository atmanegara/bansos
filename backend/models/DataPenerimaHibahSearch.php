<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DataPenerimaHibah;

/**
 * DataPenerimaHibahSearch represents the model behind the search form of `backend\models\DataPenerimaHibah`.
 */
class DataPenerimaHibahSearch extends DataPenerimaHibah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_data_pemohon_hibah', 'setuju'], 'integer'],
            [['no_registrasi', 'catatan'], 'safe'],
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
        $query = DataPenerimaHibah::find();

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
            'id_data_pemohon_hibah' => $this->id_data_pemohon_hibah,
            'setuju' => $this->setuju,
        ]);

        $query->andFilterWhere(['like', 'no_registrasi', $this->no_registrasi])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}
