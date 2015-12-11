<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\GoodsTrace;

/**
 * GoodsTraceSearch represents the model behind the search form about `frontend\models\GoodsTrace`.
 */
class GoodsTraceSearch extends GoodsTrace
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'goods_id', 'series_id', 'addtime'], 'integer'],
            [['gps'], 'safe'],
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
        $query = GoodsTrace::find();

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
            'series_id' => $this->series_id,
            'addtime' => $this->addtime,
        ]);

        $query->andFilterWhere(['like', 'gps', $this->gps]);

        return $dataProvider;
    }
}
