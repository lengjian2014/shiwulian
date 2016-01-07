<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use common\behaviors\TimeBehavior;
/**
 * This is the model class for table "company".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $company
 * @property string $logo
 * @property string $introduction
 * @property string $website
 * @property string $address
 * @property string $gps
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['company', 'introduction', 'address'], 'required'],
            [['uid'], 'integer'],
            [['company', 'introduction', 'website', 'address', 'phone', 'mobile'], 'string', 'max' => 250],
            [['gps'], 'string', 'max' => 150],
            [['logo'], 'file', 'extensions' => 'gif, jpg, png'],
            ['uid', 'default', 'value' => \Yii::$app->user->id],
            ['email', 'email'],
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
            'company' => Yii::t('app', '公司名称'),
            'logo' => Yii::t('app', 'Logo'),
            'introduction' => Yii::t('app', '公司简介'),
            'website' => Yii::t('app', '公司官网'),
            'address' => Yii::t('app', '公司地址'),
            'gps' => Yii::t('app', '地图定位'),
            'email' => Yii::t('app', '企业邮箱'),
            'phone' => Yii::t('app', '座机电话'),
            'mobile' => Yii::t('app', '手机号'),
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
	public static function getAllByCondition($condition, $order, $limit, $pagesize = 10)
	{
		$query = self::find()->where($condition);
			
		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => $pagesize]);
		$models = $query->offset($pages->offset)
										->orderBy($order)
										->limit($limit)
										->indexBy("uniqid")
										->asArray()
										->all();
	
		return [$models, $pages];
	}
	
	/**
	 * 根据用户id返回公司信息
	 * @param unknown $uid
	 * @return Ambigous <\yii\db\ActiveRecord, multitype:, NULL>
	 */
	public static function findCompanyByUid($uid)
	{
		return self::find()->where(['uid' => $uid])->one();
	}
	
	/**
	 * 根据用户id返回公司信息
	 * @param unknown $uid
	 * @return Ambigous <\yii\db\ActiveRecord, multitype:, NULL>
	 */
	public static function getCompanyByUid($uid)
	{
		return self::find()->where(['uid' => $uid])->asArray()->one();
	}
}