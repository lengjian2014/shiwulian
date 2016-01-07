<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use common\behaviors\TimeBehavior;

/**
 * This is the model class for table "stores".
 *
 * @property integer $id
 * @property integer $body
 * @property string $title
 * @property string $summary
 * @property string $contacts
 * @property string $company
 * @property integer $type
 * @property string $credentials
 * @property string $apply
 * @property string $numbering
 * @property string $picture
 * @property string $logo
 * @property string $website
 * @property string $address
 * @property string $gps
 * @property string $phone
 * @property string $mobile
 * @property string $email
 * @property string $zipcode
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class Stores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	//基本信息
        	[['body', 'title', 'address', 'summary', 'contacts', 'type', 'apply', 'numbering'], 'required'],
        	//企业必填信息
        	[['company', 'logo'], 'required', 'on' => 'enterprise'],
            [['body', 'type', 'status', 'addtime', 'updatetime', 'uid'], 'integer'],
            [['title', 'company', 'credentials', 'numbering', 'picture', 'website', 'address'], 'string', 'max' => 250],
            [['summary'], 'string', 'max' => 500],
            [['contacts', 'apply', 'gps', 'email'], 'string', 'max' => 150],
            [['phone', 'mobile', 'zipcode'], 'string', 'max' => 30],
            
            [['logo', 'picture'], 'file', 'extensions' => 'gif, jpg, png'],
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
            'body' => Yii::t('app', '店铺主体'),
            'title' => Yii::t('app', '店铺名称'),
            'summary' => Yii::t('app', '简介'),
            'contacts' => Yii::t('app', '联系人'),
            'company' => Yii::t('app', '公司名'),
            'type' => Yii::t('app', '证件类型'),
            'credentials' => Yii::t('app', '证件名'),
            'apply' => Yii::t('app', '申请人'),
            'numbering' => Yii::t('app', '证件编号'),
            'picture' => Yii::t('app', '证件照片'),
            'logo' => Yii::t('app', '企业logo'),
            'website' => Yii::t('app', '企业网址'),
            'address' => Yii::t('app', '地址'),
            'gps' => Yii::t('app', '地图定位'),
            'phone' => Yii::t('app', '固定电话'),
            'mobile' => Yii::t('app', '移动电话'),
            'email' => Yii::t('app', '邮箱'),
            'zipcode' => Yii::t('app', '邮编'),
            'status' => Yii::t('app', '状态0未审核1通过2未通过'),
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
    
    /**
     * 根据用户id返回店铺信息
     * @param unknown $uid
     * @return Ambigous <\yii\db\ActiveRecord, multitype:, NULL>
     */
    public static function findStoresByUid($uid)
    {
    	return self::find()->where(['uid' => $uid])->one();
    }
    
    /**
     * 根据用户id返回店铺信息
     * @param unknown $uid
     * @return Ambigous <\yii\db\ActiveRecord, multitype:, NULL>
     */
    public static function getStoresByUid($uid)
    {
    	return self::find()->where(['uid' => $uid])->asArray()->one();
    }
}
