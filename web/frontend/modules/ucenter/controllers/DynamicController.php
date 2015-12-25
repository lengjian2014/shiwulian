<?php
namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use common\components\FileUploaded;
use frontend\models\Dynamic;
use frontend\models\UserGoods;
use frontend\models\Goods;
use yii\helpers\ArrayHelper;

/**
 * 用户中心 - 动态管理
 * @author hs150304
 *
 */
class DynamicController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
    public function actionIndex()
    {
    	$goods_id = UserGoods::getGoodsByUserId(\Yii::$app->user->id);
    	$goods = Goods::getGoodsByGoodsId($goods_id);
    	$condition = ['and', 'status = 1', ['or', ['goods_id' => $goods_id], ['uid' => \Yii::$app->user->id]]];
    	list($model, $pages) = Dynamic::getAllByCondition($condition, "id desc");
        return $this->render('index', ['model' => $model, 'goods' => $goods]);
    }

    /**
     * 发布产品
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionCreate()
    {
    	$model = new Dynamic();

        if ($model->load(Yii::$app->request->post())) 
        {
        	$model->file = FileUploaded::getInstances($model, "file");
            if($model->save())
            {
            	Goods::updateDataByParam($model->goods_id, "dynamic");
            	return $this->redirect(['index']);
            }
        }
        $goods_id = UserGoods::getGoodsByUserId(\Yii::$app->user->id);
        $goods = Goods::getGoodsByGoodsId($goods_id);
        if(!empty($goods)) $goods = ArrayHelper::map($goods, 'id', 'title');
        $picture = [];
      	return $this->render('form', [ 'model' => $model, 'picture' => $picture, 'goods' => $goods]);
    }
	
}