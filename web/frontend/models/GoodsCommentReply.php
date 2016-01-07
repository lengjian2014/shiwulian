<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "goods_comment_reply".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $reply_id
 * @property integer $comment_id
 * @property string $content
 * @property integer $type
 * @property integer $like
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class GoodsCommentReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_comment_reply';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'reply_id', 'comment_id', 'type', 'like', 'status', 'addtime', 'updatetime'], 'integer'],
            
            [['content'], 'string'],
            ['content', 'filter', 'filter' => 'trim'],
            [['content'], 'required'],
            
            ['uid', 'default', 'value' => \Yii::$app->user->id],
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
            'type' => Yii::t('app', '是否商家0否1是'),
            'like' => Yii::t('app', '点赞'),
            'status' => Yii::t('app', 'Status'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }

	/**
	 * 根据id返回对象
	 * @param unknown $id
	 * @return Ambigous <\yii\db\static, NULL, multitype:, boolean, \yii\db\ActiveRecord>
	 */
	public static function findById($id)
	{
		return self::findOne(['id' => $id]);
	}

	/**
	 * 根据id返回数组
	 * @param unknown $id
	 * @return Ambigous <\yii\db\static, NULL, multitype:, boolean, \yii\db\ActiveRecord>
	 */
	public static function getById($id)
	{
		return self::find()->where(['id' => $id])->asArray()->one();
	}
	
	/**
	 * 根据条件返回分页数据对象
	 * @param unknown $condition
	 * @param unknown $order
	 * @param unknown $limit
	 * @param number $pagesize
	 * @return multitype:\yii\data\Pagination Ambigous <multitype:, multitype:\yii\db\ActiveRecord >
	 */
	public static function findAllByCondition($condition, $order, $limit, $pagesize = 10)
	{
		$query = self::find()->where($condition);
			
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pagesize]);
		$models = $query->offset($pages->offset)
											->orderBy($order)
											->limit($limit)
											->indexBy("uniqid")
											->all();
		
		return [$models, $pages];
	}
	
	/**
	 * 根据条件返回分页数据数据
	 * @param unknown $condition
	 * @param unknown $order
	 * @param unknown $limit
	 * @param number $pagesize
	 * @return multitype:\yii\data\Pagination Ambigous <multitype:, multitype:\yii\db\ActiveRecord >
	 */
	public static function getAllByCondition($condition, $order, $pagesize = 10)
	{
		$query = self::find()->where($condition);
			
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pagesize]);
		$models = $query->offset($pages->offset)
										->orderBy($order)
										->indexBy("id")
										->asArray()
										->all();
	
		return [$models, $pages];
	}
}
