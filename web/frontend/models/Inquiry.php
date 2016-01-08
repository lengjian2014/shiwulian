<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use common\behaviors\TimeBehavior;

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
            [['uid', 'goods_id', 'seller_uid', 'addtime', 'updatetime', 'status'], 'integer'],
            [['content'], 'string'],
            [['title', 'email'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 30],
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
            'uid' => Yii::t('app', '询单人'),
            'goods_id' => Yii::t('app', '询单的产品'),
            'seller_uid' => Yii::t('app', '卖家uid'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
            'email' => Yii::t('app', '邮箱'),
            'phone' => Yii::t('app', '联系电话'),
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