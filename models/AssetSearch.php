<?php

namespace vendor\kabira\tookee\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use vendor\kabira\tookee\models\Asset;

/**
 * AssetSearch represents the model behind the search form about `vendor\kabira\tookee\models\Asset`.
 */
class AssetSearch extends Asset
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idasset', 'trashed'], 'integer'],
            [['assetname', 'created'], 'safe'],
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
        $query = Asset::find();

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
            'idasset' => $this->idasset,
            'created' => $this->created,
            'trashed' => $this->trashed,
        ]);

        $query->andFilterWhere(['like', 'assetname', $this->assetname]);

        return $dataProvider;
    }
}
