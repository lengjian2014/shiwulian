<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "user_role".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $role
 * @property integer $type
 * @property string $number
 * @property string $content
 * @property string $picture
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'number'], 'required'],
            [['uid', 'role', 'type', 'status', 'addtime', 'updatetime'], 'integer'],
            [['number'], 'string', 'max' => 150],
            [['content', 'number'], 'string', 'max' => 250],
            
            [['picture'], 'string', 'max' => 500],
            [['picture'], 'file', 'extensions' => 'gif, jpg, png', 'maxFiles' => 4],
            
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
            'uid' => Yii::t('app', 'Uid'),
            'role' => Yii::t('app', '角色类别'),
            'type' => Yii::t('app', '证件类型'),
            'number' => Yii::t('app', '证件编号'),
            'content' => Yii::t('app', '认证内容'),
            'picture' => Yii::t('app', '证件照片'),
            'status' => Yii::t('app', '审核状态'),
            'addtime' => Yii::t('app', '添加时间'),
            'updatetime' => Yii::t('app', '更改时间'),
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
										->asArray()
										->all();
	
		return [$models, $pages];
	}
	
	/**
	 * 根据uid返回用户角色认证信息
	 * @param unknown $uid
	 * @return Ambigous <\yii\db\ActiveQueryInterface, \yii\db\$this, \yii\db\ActiveQuery>
	 */
	public static function getUserRoleByUid($uid)
	{
		return self::find()->where(['uid' => $uid])->indexBy("role")->all();
	}
	
	/**
	 * 根据uid及角色返回认证信息
	 * @param unknown $uid
	 * @return Ambigous <\yii\db\ActiveQueryInterface, \yii\db\$this, \yii\db\ActiveQuery>
	 */
	public static function getRoleByUidAndRole($uid, $role)
	{
		return self::find()->where(['uid' => $uid, 'role' => $role])->indexBy("type")->one();
	}

}
