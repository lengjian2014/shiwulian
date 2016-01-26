<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Dynamic;
use frontend\models\Goods;
use frontend\models\User;

/**
 * Site controller
 */
class IndexController extends Controller
{
    /**
     * 动态列表
     * @return mixed
     */
    public function actionIndex()
    {
    	$condition = ['status' => 1];
    	list($model, $pages) = Dynamic::getAllByCondition($condition, "id desc", 20);
    	$goods_id = $goods = $user = $uid = [];
    	if(!empty($model))
    	{
    		foreach ($model as $k => $v)
    		{
    			$goods_id[] = $v['goods_id'];
    			$uid[] = $v['uid'];
    		}
    		$user = User::getUsersByUids($uid);
    		$goods = Goods::getGoodsByGoodsId($goods_id);
    	}
    	if(\Yii::$app->request->isAjax)
    		return $this->renderAjax('ajaxindex', ['model' => $model, 'goods' => $goods, 'user' => $user, 'pages' => $pages->getLinks()]);
    	else 
    		return $this->render('index', ['model' => $model, 'goods' => $goods, 'user' => $user, 'pages' => $pages->getLinks()]);
    }

}