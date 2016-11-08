<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inquiry".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $seller_uid
 * @property string $title
 * @property string $content
 * @property string $email
 * @property string $phone
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class Inquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inquiry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'seller_uid', 'status', 'addtime', 'updatetime'], 'integer'],
            [['content'], 'string'],
            [['title', 'email'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', '询单人'),
            'goods_id' => Yii::t('app', '询单的产品'),
            'seller_uid' => Yii::t('app', '卖家uid'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
            'email' => Yii::t('app', '邮箱'),
            'phone' => Yii::t('app', '联系电话'),
            'status' => Yii::t('app', '0未操作'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
