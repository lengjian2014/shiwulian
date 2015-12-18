<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "user_goods".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $role
 * @property integer $goods_id
 * @property integer $status
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'role', 'goods_id', 'status', 'addtime', 'updatetime'], 'integer']
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
            'role' => Yii::t('app', '角色'),
            'goods_id' => Yii::t('app', '产品id'),
            'status' => Yii::t('app', '状态'),
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
	 * 创建产品时更新角色的产品
	 * @param unknown $uid
	 * @param unknown $goods_id
	 * @return number
	 */
	public static function createGoodsRole($uid, $goods_id)
	{
		$role = UserRole::getUserRoleByUid($uid);
		$data = [];
		foreach ($role as $k => $v)
		{
			$data[] = [$uid, $v->role, $goods_id, time(), time()];
		}
		$result = \Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['uid', 'role', 'goods_id', 'addtime', 'updatetime'], $data)->execute();
		
		return $result;
	}
	
	/**
	 * 根据产品id返回角色信息
	 * @param unknown $goods_id
	 * @return NULL|Ambigous <\yii\db\ActiveRecord, multitype:, NULL>
	 */
	public static function getUserRoleByGoodsId($goods_id)
	{
		if(empty($goods_id)) return null;
		$goods_id = !is_array($goods_id) ? [$goods_id] : $goods_id;
		$info = self::find()->where(['goods_id' => $goods_id, 'user_role.status' => 1])->leftJoin("user_role", "user_role.uid = " .self::tableName() . ".uid")->all();
		$data = [];
		if(!empty($info))
		{
			foreach ($info as $k => $v)
			{
				$data[$v->goods_id][$v->role][] = $v->uid;
			}
		}
		return $data;
	}
}
