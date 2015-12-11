<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\GoodsComment;

/**
 * GoodsCommentSearch represents the model behind the search form about `frontend\models\GoodsComment`.
 */
class GoodsCommentSearch extends GoodsComment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'goods_id', 'series_id', 'dynamic_id', 'like', 'reply', 'top', 'status', 'addtime', 'updatetime'], 'integer'],
            [['content'], 'safe'],
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
        $query = GoodsComment::find();

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
            'dynamic_id' => $this->dynamic_id,
            'like' => $this->like,
            'reply' => $this->reply,
            'top' => $this->top,
            'status' => $this->status,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
