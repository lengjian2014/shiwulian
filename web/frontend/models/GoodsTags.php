<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "goods_tags".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property integer $tags_id
 */
class GoodsTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id', 'tags_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'goods_id' => Yii::t('app', '产品id'),
            'tags_id' => Yii::t('app', '标签表id'),
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
	 * 创建产品的标签关联
	 * @param unknown $goods_id
	 * @param unknown $tags
	 * @return NULL
	 */
	public static function createGoodsTags($goods_id, $tags)
	{
		if($tags == '' || $goods_id == '') 
			return null;
		$data = [];
		if(!is_array($tags))
			$data = [$goods_id, $tags];
		else 
		{
			foreach ($tags as $k => $v)
			{
				$data[] = [$goods_id, $v];
			}
		}
		self::deleteAll(['goods_id' => $goods_id]);
		$result = \Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['goods_id','tags_id'], $data)->execute();
		return $result;
	}
	
	/**
	 * 根据产品id返回标签
	 * @param unknown $goods_id
	 * @return Ambigous <NULL, multitype:>
	 */
	public static function getTagsByGoodsId($goods_id)
	{
		$info = self::find()->where(['goods_id' => $goods_id])->indexBy("tags_id")->asArray()->all();
		
		return empty($info) ? null : array_keys($info);
	}
}
