<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "user_follow".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserFollow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_follow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'addtime', 'updatetime'], 'integer'],
            [['goods_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'goods_id' => Yii::t('app', 'Goods ID'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
