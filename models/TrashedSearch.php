<?php

namespace vendor\kabira\tookee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\kabira\tookee\models\Trashed;

/**
 * TrashedSearch represents the model behind the search form about `vendor\kabira\tookee\models\Trashed`.
 */
class TrashedSearch extends Trashed
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtrashed', 'id'], 'integer'],
            [['tablename', 'created'], 'safe'],
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
        $query = Trashed::find();

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
            'idtrashed' => $this->idtrashed,
            'id' => $this->id,
            'created' => $this->created,
        ]);

        $query->andFilterWhere(['like', 'tablename', $this->tablename]);

        return $dataProvider;
    }
}
