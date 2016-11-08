<?php

namespace common\models\news;

use Yii;

/**
 * This is the model class for table "news_comment".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $news_id
 * @property string $content
 * @property integer $like
 * @property integer $reply
 * @property integer $top
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class NewsComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'news_id', 'like', 'reply', 'top', 'status', 'addtime', 'updatetime'], 'integer'],
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
            'news_id' => Yii::t('app', '资讯id'),
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
