<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "user_expand".
 *
 * @property integer $uid
 * @property string $nickname
 * @property string $photo
 * @property integer $gender
 * @property string $birthday
 * @property integer $hometown
 * @property string $telephone
 * @property string $qq
 * @property string $address
 * @property integer $validemail
 * @property integer $validmobile
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserExpand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_expand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'gender', 'hometown', 'validemail', 'validmobile', 'addtime', 'updatetime', 'province', 'city', 'county'], 'integer'],
            [['nickname', 'photo', 'address', 'birthday'], 'string', 'max' => 250],
            [['qq'], 'string', 'max' => 20],
            [['telephone'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => Yii::t('app', 'Uid'),
            'nickname' => Yii::t('app', '昵称'),
            'photo' => Yii::t('app', '头像'),
            'gender' => Yii::t('app', '性别'),
            'birthday' => Yii::t('app', '出生年月'),
            'hometown' => Yii::t('app', '籍贯'),
            'telephone' => Yii::t('app', '电话'),
            'qq' => Yii::t('app', 'QQ'),
            'address' => Yii::t('app', '详细地址'),
            'validemail' => Yii::t('app', '邮箱是否有效，0没有1有效'),
            'validmobile' => Yii::t('app', '手机是否有效'),
            'addtime' => Yii::t('app', '添加时间'),
            'updatetime' => Yii::t('app', '更新时间'),
            'province' => Yii::t('app', '省、直辖市'),
            'city' => Yii::t('app', '市'),
            'county' => Yii::t('app', '县、区'),
        ];
    }

	/**
	 * 根据id返回对象
	 * @param unknown $id
	 * @return Ambigous <\yii\db\static, NULL, multitype:, boolean, \yii\db\ActiveRecord>
	 */
	public static function findById($uid)
	{
		return self::findOne(['uid' => $uid]);
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
