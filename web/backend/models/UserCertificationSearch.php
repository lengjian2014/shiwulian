<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserCertification;

/**
 * UserCertificationSearch represents the model behind the search form about `frontend\models\UserCertification`.
 */
class UserCertificationSearch extends UserCertification
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'uid', 'type', 'category', 'status', 'admin_id', 'addtime', 'updatetime'], 'integer'],
            [['number', 'pictrue', 'reason'], 'safe'],
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
        $query = UserCertification::find();

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
            'type' => $this->type,
            'category' => $this->category,
            'status' => $this->status,
            'admin_id' => $this->admin_id,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'pictrue', $this->pictrue])
            ->andFilterWhere(['like', 'reason', $this->reason]);

        return $dataProvider;
    }
}
