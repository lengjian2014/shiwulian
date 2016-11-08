<?php

namespace common\models\news;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $classify_id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $picture
 * @property string $source
 * @property string $sourceurl
 * @property string $author
 * @property integer $like
 * @property integer $share
 * @property integer $published
 * @property integer $sort
 * @property integer $top
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['classify_id', 'like', 'share', 'published', 'sort', 'top', 'status', 'addtime', 'updatetime'], 'integer'],
            [['content'], 'string'],
            [['title', 'source', 'sourceurl'], 'string', 'max' => 250],
            [['summary', 'picture'], 'string', 'max' => 500],
            [['author'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'classify_id' => Yii::t('app', '分类'),
            'title' => Yii::t('app', '标题'),
            'summary' => Yii::t('app', '摘要'),
            'content' => Yii::t('app', '内容'),
            'picture' => Yii::t('app', '图片'),
            'source' => Yii::t('app', '来源'),
            'sourceurl' => Yii::t('app', '来源地址'),
            'author' => Yii::t('app', '作者'),
            'like' => Yii::t('app', '点赞'),
            'share' => Yii::t('app', '分享'),
            'published' => Yii::t('app', '发布时间'),
            'sort' => Yii::t('app', '排序'),
            'top' => Yii::t('app', '是否置顶'),
            'status' => Yii::t('app', '状态0未审核1发布2审核未通过'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
}
