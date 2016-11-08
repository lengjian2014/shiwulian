<?php

namespace common\models\news;

use Yii;

/**
 * This is the model class for table "news_comment_reply".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $reply_id
 * @property integer $comment_id
 * @property string $content
 * @property integer $like
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class NewsCommentReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_comment_reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'reply_id', 'comment_id', 'like', 'status', 'addtime', 'updatetime'], 'integer'],
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
            'uid' => Yii::t('app', '回复人id'),
            'reply_id' => Yii::t('app', '被回复人'),
            'comment_id' => Yii::t('app', '回复的评论'),
            'content' => Yii::t('app', '内容'),
            'like' => Yii::t('app', '点赞'),
            'status' => Yii::t('app', 'Status'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
