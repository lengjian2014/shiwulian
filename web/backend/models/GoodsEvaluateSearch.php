<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\GoodsEvaluate;

/**
 * GoodsEvaluateSearch represents the model behind the search form about `frontend\models\GoodsEvaluate`.
 */
class GoodsEvaluateSearch extends GoodsEvaluate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'goods_id', 'real', 'fresh', 'satisfied', 'taste', 'package', 'addtime'], 'integer'],
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
        $query = GoodsEvaluate::find();

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
            'id' => $this->id,
            'uid' => $this->uid,
            'goods_id' => $this->goods_id,
            'real' => $this->real,
            'fresh' => $this->fresh,
            'satisfied' => $this->satisfied,
            'taste' => $this->taste,
            'package' => $this->package,
            'addtime' => $this->addtime,
        ]);

        return $dataProvider;
    }
}
