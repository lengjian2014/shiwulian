<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Dynamic;
use frontend\models\Goods;
use frontend\models\User;

/**
 * 资讯
 */
class NewsController extends Controller
{
    /**
     * 动态列表
     * @return mixed
     */
    public function actionIndex()
    {
    		return $this->render('index');
    }

}