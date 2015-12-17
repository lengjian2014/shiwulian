<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use common\behaviors\TimeBehavior;
/**
 * This is the model class for table "user_certification".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $type
 * @property integer $category
 * @property string $number
 * @property string $picture
 * @property integer $status
 * @property integer $admin_id
 * @property string $reason
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserCertification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_certification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'number'], 'required'],
            [['uid', 'type', 'category', 'status', 'admin_id', 'addtime', 'updatetime'], 'integer'],
            [['number'], 'string', 'max' => 50],
            
            [['picture'], 'file', 'extensions' => 'gif, jpg, png', 'maxFiles' => 4],
            ['uid', 'default', 'value' => \Yii::$app->user->id],
            [['reason', 'name'], 'string', 'max' => 250]
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
            'type' => Yii::t('app', '认证方式'),
            'name' => Yii::t('app', '名称'),
            'category' => Yii::t('app', '证件类别'),
            'number' => Yii::t('app', '证件号'),
            'picture' => Yii::t('app', '证件图'),
            'status' => Yii::t('app', '状态'),
            'admin_id' => Yii::t('app', '管理员id'),
            'reason' => Yii::t('app', '未通过原因'),
            'addtime' => Yii::t('app', '添加时间'),
            'updatetime' => Yii::t('app', '更新时间'),
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
	 * 获取用的认证
	 * @param unknown $uid
	 * @param unknown $type
	 * @return Ambigous <\yii\db\ActiveRecord, multitype:, NULL>
	 */
	public static function getInfoByUidAndType($uid, $type)
	{
		return self::find()->where(['uid' => $uid, 'type' => $type])->one();
	}
	
}
