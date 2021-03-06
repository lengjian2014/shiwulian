<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
use common\behaviors\TimeBehavior;
/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property integer $uid
 * @property string $barcode
 * @property string $title
 * @property string $summary
 * @property string $soldarea
 * @property string $detail
 * @property string $picture
 * @property string $price
 * @property string $market_price
 * @property string $unit
 * @property integer $weight
 * @property string $brand
 * @property integer $classify
 * @property integer $inventory
 * @property integer $sales
 * @property integer $comments
 * @property integer $score
 * @property integer $scan
 * @property integer $dynamic
 * @property integer $trace
 * @property integer $place
 * @property string $address
 * @property string $gps
 * @property string $keyword
 * @property string $description
 * @property integer $status
 * @property integer $admin_id
 * @property string $reason
 * @property integer $addtime
 * @property integer $updatetime
 */
class Goods extends \yii\db\ActiveRecord
{
	public $tags;
	public $links;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['barcode', 'title', 'summary', 'classify', 'picture', 'place', 'detail', 'soldarea', 'tags'], 'required'],
            [['uid', 'weight', 'classify', 'inventory', 'sales', 'comments', 'scan', 'dynamic', 'trace', 'status', 'admin_id', 'addtime', 'updatetime'], 'integer'],
            [['detail', 'place', 'links'], 'string'],
            [['price', 'market_price', 'score'], 'number'],
            [['barcode', 'title', 'summary', 'picture', 'brand', 'address', 'keyword', 'description', 'reason'], 'string', 'max' => 250],
            [['unit', 'gps'], 'string', 'max' => 100],
            
            [['picture'], 'file', 'extensions' => 'gif, jpg, png', 'maxFiles' => 6],
            ['barcode', 'unique', 'targetClass' => '\frontend\models\Goods', 'message' => '编号必须唯一.'],
            ['uid', 'default', 'value' => \Yii::$app->user->id],
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
            'uid' => Yii::t('app', '会员'),
            'barcode' => Yii::t('app', '条形码编号'),
            'title' => Yii::t('app', '产品标题'),
            'summary' => Yii::t('app', '简介'),
            'soldarea' => Yii::t('app', '销售区域'),
            'detail' => Yii::t('app', '产品详细'),
            'picture' => Yii::t('app', '产品图片'),
            'price' => Yii::t('app', '销售价格'),
            'market_price' => Yii::t('app', '市场价格'),
            'unit' => Yii::t('app', '计量单位'),
            'weight' => Yii::t('app', '重量'),
            'brand' => Yii::t('app', '品牌'),
            'classify' => Yii::t('app', '产品分类'),
            'inventory' => Yii::t('app', '库存数量'),
            'sales' => Yii::t('app', '销售数量'),
            'comments' => Yii::t('app', '评论次数'),
            'score' => Yii::t('app', '评分'),
            'scan' => Yii::t('app', '浏览次数'),
            'dynamic' => Yii::t('app', '产品动态数'),
            'trace' => Yii::t('app', '追溯次数'),
            'place' => Yii::t('app', '产品产地'),
            'address' => Yii::t('app', '详细地址'),
            'gps' => Yii::t('app', '产地gps'),
            'keyword' => Yii::t('app', 'seo关键词'),
            'description' => Yii::t('app', 'seo描述'),
            'links' => Yii::t('app', '友情链接'),
            'status' => Yii::t('app', '产品审核状态'),
            'admin_id' => Yii::t('app', '管理员'),
            'reason' => Yii::t('app', '审核原因'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
            'tags' => Yii::t('app', '标签'),
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
											->limit($pages->limit)
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
											->limit($pages->limit)
											->indexBy("id")
											->asArray()
											->all();
	
		return [$models, $pages];
	}
	
	/**
	 * 根据产品id返回产品信息
	 * @param unknown $goods_id
	 * @return NULL|Ambigous <multitype:, multitype:\yii\db\ActiveRecord >
	 */
	public static function getGoodsByGoodsId($goods_id)
	{
		if(empty($goods_id)) return null;
		$info = self::find()->where(['id' => $goods_id, 'status' => 1])->asArray()->indexBy("id")->all();
		
		return $info;
	}
	
	public static function updateDataByParam($goods_id, $param, $num = 1)
	{
		if(empty($goods_id)) return null;
		$num = intval($num);
		$goods_id = is_array($goods_id) ? implode(",", $goods_id) : $goods_id;
		$sql = "UPDATE `".self::tableName()."` SET `{$param}` = {$param}+{$num} WHERE `id` in ({$goods_id})";
		return \Yii::$app->db->createCommand($sql)->execute();
	}
}
