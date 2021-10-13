<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DokPemohonHibah;

/**
 * DokPemohonHibahSearch represents the model behind the search form of `backend\models\DokPemohonHibah`.
 */
class DokPemohonHibahSearch extends DokPemohonHibah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_data_pemohon_hibah', 'id_dok_syarat_hibah', 'reupload', 'id_user'], 'integer'],
            [['nama_file', 'tgl_upload', 'catatan', 'create_date'], 'safe'],
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
        $query = DokPemohonHibah::find();

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
            'id_dok_syarat_hibah' => $this->id_dok_syarat_hibah,
            'tgl_upload' => $this->tgl_upload,
            'reupload' => $this->reupload,
            'id_user' => $this->id_user,
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'nama_file', $this->nama_file])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}
