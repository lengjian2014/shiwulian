<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\UserExpand;
use common\models\ChangePasswordForm;
use yii\web\Response;
use frontend\models\Company;
use common\components\FileUploaded;
use frontend\models\Stores;

/**
 * 用户中心 - 店铺设置
 * @author hs150304
 *
 */
class StoresController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	/**
	 * 店铺信息
	 * @return Ambigous <string, string>
	 */
    public function actionIndex()
    {
    	$model= Stores::findStoresByUid(\Yii::$app->user->id);
    	if(empty($model))
    		return $this->redirect(['create']);
    	
        return $this->render('index', ['model' => $model]);
    }
    
    /**
     * 更新店铺信息
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionCreate()
    {
    	return $this->render('create');
    }
   
    /**
     * 企业店铺
     * @return Ambigous <string, string>
     */
    public function actionEnterprise()
    {
    	$model= Stores::findStoresByUid(\Yii::$app->user->id);
    	if(empty($model))
    		$model = new Stores();
    	$model->setScenario('enterprise');
    	$model->body = 1; //企业店铺
    	if ($model->load(Yii::$app->request->post()))
    	{
    		$model->logo = FileUploaded::getInstances($model, "logo");
    		$model->picture = FileUploaded::getInstances($model, "picture");
    		if($model->save())
    			return $this->redirect(['index']);
    	}
    	$picture = !empty($model->picture) ? FileUploaded::formatImges($model->picture, "Stores[picture]") : '';
    	$logo = !empty($model->logo) ? FileUploaded::formatImges($model->logo, "Stores[logo]") : '';
    	return $this->render('enterprise', [
	    			'model' => $model,
	    			'picture' => $picture,
    				'logo' => $logo,
    			]);
    }
    
    /**
     * 个人店铺
     * @return Ambigous <string, string>
     */
    public function actionPersonal()
    {
    	$model= Stores::findStoresByUid(\Yii::$app->user->id);
    	if(empty($model))
    		$model = new Stores();
    	$model->body = 0; //个人店铺
    	if ($model->load(Yii::$app->request->post()))
    	{
    		$model->picture = FileUploaded::getInstances($model, "picture");
    		if($model->save())
    			return $this->redirect(['index']);
    	}
    	$picture = !empty($model->picture) ? FileUploaded::formatImges($model->picture, "Stores[picture]") : '';
    	return $this->render('personal', [
			    			'model' => $model,
			    			'picture' => $picture,
    					]);
    }
    
    /**
     * Performs ajax validation.
     * @param Model $model
     * @throws \yii\base\ExitException
     */
    protected static function performAjaxValidation($model)
    {
    	if (\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
    		\Yii::$app->response->format = Response::FORMAT_JSON;
    		echo json_encode(\yii\widgets\ActiveForm::validate($model));
    		\Yii::$app->end();
    	}
    }
    
}