<?php

namespace common\models\user;

use Yii;

/**
 * This is the model class for table "user_goods".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $role
 * @property integer $goods_id
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'role', 'goods_id', 'status', 'addtime', 'updatetime'], 'integer'],
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
            'role' => Yii::t('app', '角色'),
            'goods_id' => Yii::t('app', '产品id'),
            'status' => Yii::t('app', '状态'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
