<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\VerifikasiTapd;

/**
 * VerifikasiTapdSearch represents the model behind the search form of `backend\models\VerifikasiTapd`.
 */
class VerifikasiTapdSearch extends VerifikasiTapd
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_data_pemohon_hibah', 'status_verifikasi', 'id_user'], 'integer'],
            [['catatan', 'create_date'], 'safe'],
            [['pagu_usulan'], 'number'],
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
        $query = VerifikasiTapd::find();

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
            'status_verifikasi' => $this->status_verifikasi,
            'pagu_usulan' => $this->pagu_usulan,
            'id_user' => $this->id_user,
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}
