<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
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
	public $nickname;
	public $gender;
	public $birthday;
	public $hometown;
	public $qq;
	public $address;
	public $telephone;
	public $province;
	public $city;
	public $county;
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
            'email' => Yii::t('app', '电子邮箱'),
            'mobile' => Yii::t('app', '手机号码'),
            'password' => Yii::t('app', '密码'),
            'password_reset_token' => Yii::t('app', '改密码'),
            'password_hash' => Yii::t('app', '密码加密'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'resettoken' => Yii::t('app', 'Resettoken'),
            'hash' => Yii::t('app', 'Hash'),
            'status' => Yii::t('app', '1开启0关闭'),
            'access_token' => Yii::t('app', '用户认证'),
            'role' => Yii::t('app', '0普通用户，1管理员'),
            'addtime' => Yii::t('app', '注册时间'),
            'updatetime' => Yii::t('app', 'Updatetime'),
            'nickname' => Yii::t('app', '昵称'),
            'gender' => Yii::t('app', '性别'),
            'birthday' => Yii::t('app', '出生年月'),
            'hometown' => Yii::t('app', '籍贯'),
            'qq' => Yii::t('app', 'QQ'),
            'address' => Yii::t('app', '联系地址'),
            'telephone' => Yii::t('app', '座机号码')
        ];
    }

	/**
	 * 根据id返回对象
	 * @param unknown $id
	 * @return Ambigous <\yii\db\static, NULL, multitype:, boolean, \yii\db\ActiveRecord>
	 */
	public static function findById($uid)
	{
		if (($model = User::findOne(['uid' => $uid])) !== null) 
		{
			$userexpand = UserExpand::findById($uid);
			if($userexpand)
			{
				foreach ($userexpand as $k => $v)
				{
					if(property_exists($model, $k))
						$model->$k = $v;
				}
			}
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
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
	 * 批量查询
	 * @param unknown $uids
	 * @return NULL|Ambigous <multitype:, multitype:\yii\db\ActiveRecord >
	 */
	public static function getUsersByUids($uids)
	{
		if(empty($uids)) return null;
		$uids = is_array($uids) ? $uids : [$uids];
		
		return self::find()->where(['uid' => $uids])->asArray()->all();
	}

}
