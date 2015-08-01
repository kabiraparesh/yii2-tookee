<?php

namespace vendor\kabira\tookee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\kabira\tookee\models\News;

/**
 * NewsSearch represents the model behind the search form about `vendor\kabira\tookee\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnews', 'idcategory', 'published', 'trashed', 'owner'], 'integer'],
            [['title', 'url', 'matter', 'created', 'modified'], 'safe'],
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
        $query = News::find();

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
            'idnews' => $this->idnews,
            'idcategory' => $this->idcategory,
            'created' => $this->created,
            'modified' => $this->modified,
            'published' => $this->published,
            'trashed' => $this->trashed,
            'owner' => $this->owner,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'matter', $this->matter]);

        return $dataProvider;
    }
}
