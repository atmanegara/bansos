<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DokSyaratHibah;

/**
 * DokSyaratHibahSearch represents the model behind the search form of `backend\models\DokSyaratHibah`.
 */
class DokSyaratHibahSearch extends DokSyaratHibah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_ref_hibah', 'tahun'], 'integer'],
            [['nm_dok', 'nm_file', 'aktif'], 'safe'],
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
        $query = DokSyaratHibah::find();

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
            'id_ref_hibah' => $this->id_ref_hibah,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'nm_dok', $this->nm_dok])
            ->andFilterWhere(['like', 'nm_file', $this->nm_file])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
