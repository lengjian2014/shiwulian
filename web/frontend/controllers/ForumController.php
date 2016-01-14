<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Dynamic;
use frontend\models\Goods;
use frontend\models\User;

/**
 * 论团
 */
class ForumController extends Controller
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