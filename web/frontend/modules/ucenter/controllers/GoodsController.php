<?php
namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\User;
use frontend\models\Goods;
use yii\web\UploadedFile;
use common\components\FileUploaded;
use frontend\models\GoodsTags;

/**
 * 用户中心 - 账户设置
 * @author hs150304
 *
 */
class GoodsController extends FrontController
{
	public $layout = '@app/views/layouts/main1.php';
	
	public function actions() {
		return [
			'upload' => [
				'class' => \xj\ueditor\actions\Upload::className(),
				'uploadBasePath' => '@webroot/uploads', //file system path
				'uploadBaseUrl' => '@web/uploads', //web path
				'csrf' => true, //csrf校验
				'configPatch' => [
					'imageMaxSize' => 500 * 1024, //图片
					'scrawlMaxSize' => 500 * 1024, //涂鸦
					'catcherMaxSize' => 500 * 1024, //远程
					'videoMaxSize' => 1024 * 1024, //视频
					'fileMaxSize' => 1024 * 1024, //文件
					'imageManagerListPath' => '/', //图片列表
					'fileManagerListPath' => '/', //文件列表
				],
				// OR Closure
				'pathFormat' => [
					'imagePathFormat' => 'images/{yyyy}/{mm}/{yyyy}{mm}{dd}{hh}{ii}{ss}{rand:6}',
					'filePathFormat' => 'file/{yyyy}/{mm}/{yyyy}{mm}{dd}{hh}{ii}{ss}{rand:6}',
					'videoPathFormat' => 'video/{yyyy}/{mm}/{yyyy}{mm}{dd}{hh}{ii}{ss}{rand:6}',
				],
			],
		];
	}
	
    public function actionIndex()
    {
    	$user= User::findById(\Yii::$app->user->id);
        return $this->render('index', ['model' => $user]);
    }
    
    /**
     * 更新产品
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionUpdate()
    {
    	$model = User::findById(\Yii::$app->user->id);
    	
    	if ($model->load(Yii::$app->request->post())) 
        {
        	$model->picture = FileUploaded::getInstances($model, "picture");
        	$model->soldarea = implode(",", $model->soldarea);
        	$model->links = json_encode($model->links);
        	$place = $model->place;
        	$model->place = isset($place['county']) && !empty($place['county']) ? $place['county'] : (isset($place['city']) && !empty($place['city']) ? $place['city'] : $place['province']);
            if($model->save())
            {
            	GoodsTags::createGoodsTags($model->id, $model->tags);
            	return $this->redirect(['index']);
            }
        }
    		
    	$model->soldarea = !empty($model->soldarea) ? explode(",", $model->soldarea) : [];
    	return $this->render('form', [
    					'model' => $model,
    				]);
    }
    
    /**
     * 发布产品
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionCreate()
    {
    	$model = new Goods();

        if ($model->load(Yii::$app->request->post())) 
        {
        	$model->picture = FileUploaded::getInstances($model, "picture");
        	$model->soldarea = implode(",", $model->soldarea);
        	$place = $model->place;
        	$model->place = isset($place['county']) && !empty($place['county']) ? $place['county'] : (isset($place['city']) && !empty($place['city']) ? $place['city'] : $place['province']);
            if($model->save())
            {
            	GoodsTags::createGoodsTags($model->id, $model->tags);
            	return $this->redirect(['index']);
            }	       		
        }
      	
        $model->soldarea = !empty($model->soldarea) ? explode(",", $model->soldarea) : [];
      	return $this->render('form', [
                'model' => $model,
            ]);
    }
		
    public function actionPartner()
    {
    	
    }
}
