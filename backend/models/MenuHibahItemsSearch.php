<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MenuHibahItems;

/**
 * MenuHibahItemsSearch represents the model behind the search form of `backend\models\MenuHibahItems`.
 */
class MenuHibahItemsSearch extends MenuHibahItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kd_menu'], 'integer'],
            [['label', 'icon', 'url', 'items', 'visible', 'id_user'], 'safe'],
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
        $query = MenuHibahItems::find();

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
            'kd_menu' => $this->kd_menu,
        ]);

        $query->andFilterWhere(['like', 'label', $this->label])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'items', $this->items])
            ->andFilterWhere(['like', 'visible', $this->visible])
            ->andFilterWhere(['like', 'id_user', $this->id_user]);

        return $dataProvider;
    }
}
