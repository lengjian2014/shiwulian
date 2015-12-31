<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Goods;

/**
 * 产品
 * Site controller
 */
class GoodsController extends Controller
{
		static public $PAGE_SIZE = 10;
	 	public function actionIndex()
	   {
		   	//排序属性
		   	$param = \Yii::$app->request->get("param", "id");
		   	//排序方式
		   	$order = \Yii::$app->request->get("order", "desc");
		   	$condition = ['status' => 1];
		   	list($goods, $pages) = Goods::getAllByCondition($condition, $param .' ' . $order, self::$PAGE_SIZE);

		   	return $this->render('index', ['goods' => $goods]);
	   }
}
