<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Goods;

/**
 * GoodsSearch represents the model behind the search form about `frontend\models\Goods`.
 */
class GoodsSearch extends Goods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'soldarea', 'weight', 'classify', 'inventory', 'sales', 'comments', 'score', 'scan', 'dynamic', 'trace', 'status', 'admin_id', 'addtime', 'updatetime'], 'integer'],
            [['barcode', 'title', 'summary', 'detail', 'picture', 'unit', 'brand', 'place', 'gps', 'keyword', 'description', 'reason'], 'safe'],
            [['price', 'market_price'], 'number'],
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
        $query = Goods::find();

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
            'soldarea' => $this->soldarea,
            'price' => $this->price,
            'market_price' => $this->market_price,
            'weight' => $this->weight,
            'classify' => $this->classify,
            'inventory' => $this->inventory,
            'sales' => $this->sales,
            'comments' => $this->comments,
            'score' => $this->score,
            'scan' => $this->scan,
            'dynamic' => $this->dynamic,
            'trace' => $this->trace,
            'status' => $this->status,
            'admin_id' => $this->admin_id,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'barcode', $this->barcode])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'brand', $this->brand])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'gps', $this->gps])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
