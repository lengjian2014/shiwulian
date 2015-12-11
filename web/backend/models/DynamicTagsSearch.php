<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\DynamicTags;

/**
 * DynamicTagsSearch represents the model behind the search form about `frontend\models\DynamicTags`.
 */
class DynamicTagsSearch extends DynamicTags
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dynamic_id', 'tags_id'], 'integer'],
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
        $query = DynamicTags::find();

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
            'dynamic_id' => $this->dynamic_id,
            'tags_id' => $this->tags_id,
        ]);

        return $dataProvider;
    }
}
