<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Dynamic;

/**
 * DynamicSearch represents the model behind the search form about `frontend\models\Dynamic`.
 */
class DynamicSearch extends Dynamic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'goods_id', 'series_id', 'classify_id', 'scan', 'like', 'comment', 'addtime', 'updatetime'], 'integer'],
            [['content', 'file', 'address', 'gps'], 'safe'],
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
        $query = Dynamic::find();

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
            'classify_id' => $this->classify_id,
            'scan' => $this->scan,
            'like' => $this->like,
            'comment' => $this->comment,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'gps', $this->gps]);

        return $dataProvider;
    }
}
