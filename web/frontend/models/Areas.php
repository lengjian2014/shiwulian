<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "areas".
 *
 * @property string $id
 * @property string $pid
 * @property string $name
 * @property string $sort
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'name'], 'required'],
            [['pid', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pid' => Yii::t('app', '上一级的id值'),
            'name' => Yii::t('app', '地区名称'),
            'sort' => Yii::t('app', '排序'),
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
	 * 根据父id返回所有子类
	 * @param unknown $pid
	 * @return Ambigous <multitype:\yii\db\static , multitype:, multitype:\yii\db\ActiveRecord >
	 */
	public static function getAreasByParentId($pid)
	{
		$info = self::findAll(['pid' => $pid]);
		return $info;
	}
	
	/**
	 * 根据id返回名称
	 * @param unknown $id
	 * @return string
	 */
	public static function getNameById($id)
	{
		$model = self::findById($id);
		return $model ? $model->name : '';
	}

	/**
	 * 返回子分类
	 * @return Ambigous <\yii\db\ActiveQueryInterface, \yii\db\ActiveQuery>
	 */
	public function getChildareas()
	{
		return $this->hasMany(Areas::className(), ['pid' => 'id']);
	}

	/**
	 * 根据id返回所有父分类
	 * @param unknown $id
	 * @return multitype:
	 */
	public static function getParentBuChildId($id)
	{
		$data = [];
		$info = self::find()->where(['id' => $id])->asArray()->one();
		if($info['pid'] != 0)
		{
			$data = self::getParentBuChildId($info['pid']);
		}
		$data = array_merge([$info], $data);
		
		return $data;
	}
}