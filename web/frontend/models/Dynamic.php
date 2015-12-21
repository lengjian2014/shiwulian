<?php

namespace frontend\models;

use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "dynamic".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $goods_id
 * @property integer $series_id
 * @property integer $classify_id
 * @property string $content
 * @property string $file
 * @property integer $scan
 * @property integer $like
 * @property integer $comment
 * @property string $address
 * @property string $gps
 * @property integer $addtime
 * @property integer $updatetime
 */
class Dynamic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dynamic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'goods_id'], 'required'],
            [['uid', 'goods_id', 'series_id', 'classify_id', 'scan', 'like', 'comment', 'addtime', 'updatetime', 'status'], 'integer'],
            
            [['file'], 'string'],
            [['file'], 'file', 'maxFiles' => 10],
            
            [['content'], 'string'],
            [['address', 'gps'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', '发布动态人'),
            'goods_id' => Yii::t('app', '产品'),
            'series_id' => Yii::t('app', '系列'),
            'classify_id' => Yii::t('app', '类别'),
            'content' => Yii::t('app', '内容'),
            'file' => Yii::t('app', '文件'),
            'scan' => Yii::t('app', '浏览'),
            'like' => Yii::t('app', '点赞'),
            'comment' => Yii::t('app', '评论数'),
            'address' => Yii::t('app', '发布位置'),
            'gps' => Yii::t('app', 'gsp'),
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
	 * 格式化图片音频等文件
	 * @param unknown $file
	 * @param string $class
	 * @return NULL|string
	 */
	public static function formatFile($file, $class = 'col-xs-4 col-sm-3')
	{
		if(empty($file)) return null;
		$file = explode("|", $file);
		$data = '';
		foreach ($file as $k => $v)
		{
			$ext = explode(".", $v);
			$html = '';
			if(in_array($ext[1], ['jpg', 'jpeg', 'png', 'gif']))
			{
				$html .= '<div class="'.$class.'">';
				$html .= '<a href="#"><img style="width: 100%; display: block;" src="'.IMGURL . $v .'"></a>';
				$html .= '</div>';
			}
			$data[] = $html;
		}
		
		return $data;
	}
}
