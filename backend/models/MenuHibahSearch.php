<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MenuHibah;

/**
 * MenuHibahSearch represents the model behind the search form of `backend\models\MenuHibah`.
 */
class MenuHibahSearch extends MenuHibah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_menu', 'nourut'], 'integer'],
            [['label', 'icon', 'url', 'items', 'visible', 'id_user', 'kd_user'], 'safe'],
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
        $query = MenuHibah::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'key'=>'kd_menu',
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
            'kd_menu' => $this->kd_menu,
            'nourut' => $this->nourut,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'items', $this->items])
            ->andFilterWhere(['like', 'visible', $this->visible])
            ->andFilterWhere(['like', 'id_user', $this->id_user])
            ->andFilterWhere(['like', 'kd_user', $this->kd_user]);

        return $dataProvider;
    }
}
