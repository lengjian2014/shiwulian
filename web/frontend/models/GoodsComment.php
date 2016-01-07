<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use common\behaviors\TimeBehavior;
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
	        [['content'], 'string'],
	        ['content', 'filter', 'filter' => 'trim'],
        	[['content'], 'required'],
        	
            [['uid', 'goods_id', 'series_id', 'dynamic_id', 'like', 'reply', 'top', 'status', 'addtime', 'updatetime'], 'integer'],
            ['uid', 'default', 'value' => \Yii::$app->user->id],
        ];
    }

    public function behaviors()
    {
    	return [
    		TimeBehavior::className()
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
		if(!empty($models))
		{
			foreach ($models as $k => $v)
			{
				$condition = ['comment_id' => $v['id'], 'status' => 1];
				list($replay, $pages) = GoodsCommentReply::getAllByCondition($condition, $order, 100);
				$models[$k]['replaycontent'] = $replay;
			}
		}
		return [$models, $pages];
	}
}
