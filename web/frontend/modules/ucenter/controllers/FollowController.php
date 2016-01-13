<?php

namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use yii\web\Response;
use frontend\models\UserFollow;

/**
 * 用户中心 - 我关注的
 * @author hs150304
 *
 */
class FollowController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	/**
	 * 关注列表
	 * @return Ambigous <string, string>
	 */
    public function actionIndex()
    {
    	list($model, $pages) = UserFollow::getAllByUid(\Yii::$app->user->id, "id desc");

        return $this->render('index', ['model' => $model]);
    }
    
    /**
     * 取消关注
     * @param unknown $id
     * @return Ambigous <string, string>
     */
    public function actionCancel($id)
    {
    	UserFollow::deleteAll(['id' => $id, 'uid' => \Yii::$app->user->id]);
    	
    	return $this->redirect(["index"]);
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