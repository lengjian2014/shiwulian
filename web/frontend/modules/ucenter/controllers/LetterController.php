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
use frontend\models\StationLetter;

/**
 * 用户中心 - 消息管理
 * @author hs150304
 *
 */
class LetterController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	/**
	 * 消息列表
	 * @return Ambigous <string, string>
	 */
    public function actionIndex()
    {
    	return $this->redirect(['inbox']);
    }
    
    /**
     * 收件箱
     * @return Ambigous <string, string>
     */
    public function actionInbox()
    {
    	//收件箱
    	list($inbox, $pages) = StationLetter::getAllByCondition(['to_uid' => \Yii::$app->user->id, 'pid' => 0, 'type' => 0], "id desc");
    	
    	return $this->render('index', ['model' => $inbox, 'pages' => $pages]);
    }
    
    /**
     * 发件箱
     * @return Ambigous <string, string>
     */
    public function actionOutbox()
    {
    	//发件箱
    	list($outbox, $pages) = StationLetter::getAllByCondition(['from_uid' => \Yii::$app->user->id, 'pid' => 0, 'type' => 0], "id desc");
    	
    	return $this->render('index', ['model' => $outbox, 'pages' => $pages]);
    }
    
    /**
     * 系统消息
     * @return Ambigous <string, string>
     */
	public function actionSystem()
    {
    	//发件箱
    	list($model, $pages) = StationLetter::getAllByCondition(['to_uid' => \Yii::$app->user->id, 'pid' => 0, 'type' => 1], "id desc");
    	
    	return $this->render('system', ['model' => $model, 'pages' => $pages]);
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