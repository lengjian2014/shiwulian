<?php

namespace frontend\models;

use Yii;
use common\behaviors\TimeBehavior;
use yii\data\Pagination;

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
            'uid' => Yii::t('app', 'Uid'),
            'goods_id' => Yii::t('app', 'Goods ID'),
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
    public static function findAllByCondition($condition, $order, $pagesize = 10)
    {
    	$query = self::find()->where($condition);
    
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pagesize]);
    	$models = $query->offset($pages->offset)
									    	->orderBy($order)
									    	->indexBy("id")
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
    	$query = self::find()->select(self::tableName().".id, goods_id, goods.title, goods.barcode, goods.summary, goods.picture")->where($condition)->leftJoin("goods", "goods.id = ".self::tableName().".goods_id");
    
    	$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pagesize]);
    	$models = $query->offset($pages->offset)
									    	->orderBy($order)
									    	->indexBy("id")
									    	->asArray()
									    	->all();
    
    	return [$models, $pages];
    }
    
    /**
     * 返回用户所有的关注
     * @param int $uid
     * @param unknown $order
     * @param unknown $limit
     * @param number $pagesize
     * @return multitype:\yii\data\Pagination Ambigous <multitype:, multitype:\yii\db\ActiveRecord >
     */
    public static function getAllByUid($uid, $order, $pagesize = 10)
    {
    	$query = self::find()->select(self::tableName().".id, goods_id, goods.title, goods.barcode, goods.summary, goods.picture, goods.score")->where(self::tableName().".uid={$uid}")->leftJoin("goods", "goods.id = ".self::tableName().".goods_id");
    
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
