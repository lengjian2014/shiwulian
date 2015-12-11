<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "user".
 *
 * @property integer $uid
 * @property string $username
 * @property string $email
 * @property string $mobile
 * @property string $password
 * @property string $password_reset_token
 * @property string $password_hash
 * @property string $auth_key
 * @property string $resettoken
 * @property string $hash
 * @property integer $status
 * @property string $access_token
 * @property integer $role
 * @property string $addtime
 * @property string $updatetime
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'role', 'addtime', 'updatetime'], 'integer'],
            [['addtime', 'updatetime'], 'required'],
            [['username', 'email'], 'string', 'max' => 250],
            [['mobile'], 'string', 'max' => 20],
            [['password', 'access_token'], 'string', 'max' => 150],
            [['password_reset_token', 'password_hash'], 'string', 'max' => 100],
            [['auth_key', 'resettoken', 'hash'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('app', 'Uid'),
            'username' => Yii::t('app', '用户名'),
            'email' => Yii::t('app', '邮箱'),
            'mobile' => Yii::t('app', '手机号'),
            'password' => Yii::t('app', 'Password'),
            'password_reset_token' => Yii::t('app', '改密码'),
            'password_hash' => Yii::t('app', '密码加密'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'resettoken' => Yii::t('app', 'Resettoken'),
            'hash' => Yii::t('app', 'Hash'),
            'status' => Yii::t('app', '1开启0关闭'),
            'access_token' => Yii::t('app', '用户认证'),
            'role' => Yii::t('app', '0普通用户，1管理员'),
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
}
