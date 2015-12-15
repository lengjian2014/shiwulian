<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\User;

/**
 * 用户中心 - 账户设置
 * @author hs150304
 *
 */
class IndexController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
    public function actionIndex()
    {
    	$user= User::findById(\Yii::$app->user->id);
        return $this->render('index', ['model' => $user]);
    }
    
    public function actionUpdate()
    {print_r(1);exit;
    	$model = User::findById(\Yii::$app->user->id);
    	
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['index']);
    	} else {
    		return $this->render('update', [
    				'model' => $model,
    				]);
    	}
    }

}
