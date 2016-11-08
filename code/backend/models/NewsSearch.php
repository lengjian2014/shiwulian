<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\news\News;

/**
 * NewsSearch represents the model behind the search form about `common\models\news\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'classify_id', 'like', 'share', 'published', 'sort', 'top', 'status', 'addtime', 'updatetime'], 'integer'],
            [['title', 'summary', 'content', 'picture', 'source', 'sourceurl', 'author'], 'safe'],
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'classify_id' => $this->classify_id,
            'like' => $this->like,
            'share' => $this->share,
            'published' => $this->published,
            'sort' => $this->sort,
            'top' => $this->top,
            'status' => $this->status,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'source', $this->source])
            ->andFilterWhere(['like', 'sourceurl', $this->sourceurl])
            ->andFilterWhere(['like', 'author', $this->author]);

        return $dataProvider;
    }
}
