<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\RefPemohon;

/**
 * RefPemohonSearch represents the model behind the search form of `backend\models\RefPemohon`.
 */
class RefPemohonSearch extends RefPemohon
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun', 'id_ref_jkel', 'rt', 'rw', 'id_ref_kec', 'id_ref_agama', 'id_ref_status_kawin', 'id_ref_pekerjaan', 'id_ref_warga'], 'integer'],
            [['nik', 'nama', 'tmp_lahir', 'tgl_lahir', 'alamat', 'desa', 'aktif', 'date_create'], 'safe'],
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
        $query = RefPemohon::find();

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
            'tahun' => $this->tahun,
            'id_ref_jkel' => $this->id_ref_jkel,
            'tgl_lahir' => $this->tgl_lahir,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'id_ref_kec' => $this->id_ref_kec,
            'id_ref_agama' => $this->id_ref_agama,
            'id_ref_status_kawin' => $this->id_ref_status_kawin,
            'id_ref_pekerjaan' => $this->id_ref_pekerjaan,
            'id_ref_warga' => $this->id_ref_warga,
            'date_create' => $this->date_create,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'desa', $this->desa])
            ->andFilterWhere(['like', 'aktif', $this->aktif]);

        return $dataProvider;
    }
}
