<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\UserExpand;

/**
 * UserExpandSearch represents the model behind the search form about `frontend\models\UserExpand`.
 */
class UserExpandSearch extends UserExpand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'gender', 'hometown', 'validemail', 'validmobile', 'addtime', 'updatetime'], 'integer'],
            [['nickname', 'photo', 'birthday', 'telephone', 'qq', 'address'], 'safe'],
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
        $query = UserExpand::find();

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
            'uid' => $this->uid,
            'gender' => $this->gender,
            'hometown' => $this->hometown,
            'validemail' => $this->validemail,
            'validmobile' => $this->validmobile,
            'addtime' => $this->addtime,
            'updatetime' => $this->updatetime,
        ]);

        $query->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'birthday', $this->birthday])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'qq', $this->qq])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
