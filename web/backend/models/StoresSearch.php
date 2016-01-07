<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Stores;

/**
 * StoresSearch represents the model behind the search form about `frontend\models\Stores`.
 */
class StoresSearch extends Stores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'body', 'type', 'status', 'addtime', 'updatetime'], 'integer'],
            [['title', 'summary', 'contacts', 'company', 'credentials', 'apply', 'numbering', 'picture', 'logo', 'website', 'address', 'gps', 'phone', 'mobile', 'email', 'zipcode'], 'safe'],
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
        $query = Stores::find();

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
            'body' => $this->body,
            'type' => $this->type,
            'status' => $this->status,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'contacts', $this->contacts])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'credentials', $this->credentials])
            ->andFilterWhere(['like', 'apply', $this->apply])
            ->andFilterWhere(['like', 'numbering', $this->numbering])
            ->andFilterWhere(['like', 'picture', $this->picture])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'gps', $this->gps])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode]);

        return $dataProvider;
    }
}
