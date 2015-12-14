<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use common\models\User;

class DefaultController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
    public function actionIndex()
    {
    	$user= User::findIdentity(\Yii::$app->user->id);
        return $this->render('index', ['model' => $user]);
    }
}
