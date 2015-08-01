<?php

namespace vendor\kabira\tookee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\kabira\tookee\models\Category;

/**
 * CategorySearch represents the model behind the search form about `vendor\kabira\tookee\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategory', 'published', 'trashed', 'owner'], 'integer'],
            [['title', 'created', 'modified'], 'safe'],
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
        $query = Category::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idcategory' => $this->idcategory,
            'created' => $this->created,
            'modified' => $this->modified,
            'published' => $this->published,
            'trashed' => $this->trashed,
            'owner' => $this->owner,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
