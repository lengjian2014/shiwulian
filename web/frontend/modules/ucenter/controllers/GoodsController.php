<?php
namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\User;
use frontend\models\Goods;
use yii\web\UploadedFile;

/**
 * 用户中心 - 账户设置
 * @author hs150304
 *
 */
class GoodsController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
    public function actionIndex()
    {
    	$user= User::findById(\Yii::$app->user->id);
        return $this->render('index', ['model' => $user]);
    }
    
    public function actionUpdate()
    {
    	$model = User::findById(\Yii::$app->user->id);
    	
    	if ($model->load(Yii::$app->request->post())) 
    	{
    		if($model->save())
    			return $this->redirect(['index']);
    	}
    		
    	$model->soldarea = !empty($model->soldarea) ? explode(",", $model->soldarea) : [];
    	return $this->render('form', [
    					'model' => $model,
    				]);
    }
    
    public function actionCreate()
    {
    	$model = new Goods();

        if ($model->load(Yii::$app->request->post())) 
        {
        	$model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if($model->save())
        		return $this->redirect(['view', 'id' => $model->id]);
        }
      	
        $model->soldarea = [];
      	return $this->render('form', [
                'model' => $model,
            ]);
    }

}
