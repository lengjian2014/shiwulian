<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserGoods;

/**
 * UserGoodsSearch represents the model behind the search form about `frontend\models\UserGoods`.
 */
class UserGoodsSearch extends UserGoods
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'role', 'goods_id', 'status', 'addtime', 'updatetime'], 'integer'],
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
        $query = UserGoods::find();

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
            'role' => $this->role,
            'goods_id' => $this->goods_id,
            'status' => $this->status,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        return $dataProvider;
    }
}
