<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Dynamic;
use frontend\models\Goods;

/**
 * Site controller
 */
class IndexController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	$condition = ['status' => 1];
    	list($model, $pages) = Dynamic::getAllByCondition($condition, "id desc");
    	$goods_id = $goods = [];
    	if(!empty($model))
    	{
    		foreach ($model as $k => $v)
    		{
    			$goods_id[] = $v['goods_id'];
    		}
    		$goods = Goods::getGoodsByGoodsId($goods_id);
    	}
    	return $this->render('index', ['model' => $model, 'goods' => $goods]);
    }

}