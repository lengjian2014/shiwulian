<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "goods_links".
 *
 * @property integer $id
 * @property integer $goods_id
 * @property string $title
 * @property string $url
 * @property integer $addtime
 * @property integer $updatetime
 */
class GoodsLinks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_links';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['goods_id'], 'required'],
            [['goods_id', 'addtime', 'updatetime'], 'integer'],
            [['title', 'url'], 'string', 'max' => 250],
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
            'title' => Yii::t('app', '链接题目'),
            'url' => Yii::t('app', '链接地址'),
            'addtime' => Yii::t('app', 'Addtime'),
            'updatetime' => Yii::t('app', 'Updatetime'),
        ];
    }
    
    /**
     * 创建产品外链
     * @param unknown $goods_id
     * @param unknown $links
     */
    public static function createGoodsLinks($goods_id, $links)
    {
    	if(empty($links['name'])) return null;
    	$data = [];
    	foreach ($links['name'] as $k => $v)
    	{
    		$data[] = [$goods_id, $v, isset($links['url'][$k]) ? $links['url'][$k] : '', time(), time()];
    	}
    	self::deleteAll(['goods_id' => $goods_id]);
    	$result = \Yii::$app->db->createCommand()->batchInsert(self::tableName(), ['goods_id', 'title', 'url', 'addtime', 'updatetime'], $data)->execute();
    }
    
    /**
     * 根据产品id返回外链信息
     * @param unknown $goods_id
     * @return NULL|Ambigous <multitype:, \yii\db\static, \yii\db\ActiveRecord>
     */
    public static function getLinksByGoodsId($goods_id)
    {
    	$info = self::findAll(['goods_id' => $goods_id]);
    	if(empty($info)) return null;
    	$data = [];
    	foreach ($info as $k => $v)
    	{
    		$data['name'][] = $v['title'];
    		$data['url'][] = $v['url'];
    	}
    	
    	return $data;
    }
}
