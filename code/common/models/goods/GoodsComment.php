<?php

namespace common\models\goods;

use Yii;

/**
 * This is the model class for table "goods_comment".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $series_id
 * @property integer $dynamic_id
 * @property string $content
 * @property integer $like
 * @property integer $reply
 * @property integer $top
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class GoodsComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'goods_id', 'series_id', 'dynamic_id', 'like', 'reply', 'top', 'status', 'addtime', 'updatetime'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', '评论人id'),
            'goods_id' => Yii::t('app', '产品id'),
            'series_id' => Yii::t('app', '系列id'),
            'dynamic_id' => Yii::t('app', '动态id'),
            'content' => Yii::t('app', '内容'),
            'like' => Yii::t('app', '点赞数'),
            'reply' => Yii::t('app', '回复数'),
            'top' => Yii::t('app', '置顶'),
            'status' => Yii::t('app', '默认都显示'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
