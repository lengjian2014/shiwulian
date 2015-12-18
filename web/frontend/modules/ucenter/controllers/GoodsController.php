<?php
namespace frontend\modules\ucenter\controllers;

use yii;
use common\components\FrontController;
use frontend\models\User;
use frontend\models\Goods;
use yii\web\UploadedFile;
use common\components\FileUploaded;
use frontend\models\GoodsTags;
use frontend\models\UserRole;
use frontend\models\UserGoods;
use frontend\models\GoodsLinks;
use frontend\models\Areas;

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
    	//排序属性
    	$param = \Yii::$app->request->get("param", "id");
    	//排序方式
    	$order = \Yii::$app->request->get("order", "desc");
    	$condition = ['uid' => \Yii::$app->user->id];
    	list($goods, $pages) = goods::getAllByCondition($condition, $param .' ' . $order, self::$PAGE_SIZE);
		$goodsrole = $this->formatUserRole(UserGoods::getUserRoleByGoodsId(array_keys($goods)));

        return $this->render('index', ['model' => $goods, 'role' => $goodsrole]);
    }

    /**
     * 列表中产品所有角色
     * @param unknown $goodsrole
     * @return string|multitype:string
     */
    public function formatUserRole($goodsrole)
    {
    	if(empty($goodsrole)) return '';
    	foreach ($goodsrole as $k => $v)
    	{
    		$data = [];
    		foreach ($v as $key => $val)
    		{
    			$userinfo = User::getUsersByUids($val);
    			if(empty($userinfo)) continue;
    			foreach ($userinfo as $ke => $user)
    			{
    				$data[] = '<a href="">'.$user['username'].'</a>';
    			}
    			
    			$goodsrole[$k][$key] = $data;
    		}
    	}
    	
    	return $goodsrole;
    }
    
    /**
     * 更新产品
     * @return Ambigous <\yii\web\Response, \yii\web\$this, \yii\web\Response>|Ambigous <string, string>
     */
    public function actionUpdate($id)
    {
    	$model = Goods::findById($id);
    	$model->place = $this->formatPlace($model->place);
    	$model->links = GoodsLinks::getLinksByGoodsId($model->id);
    	$model->tags = GoodsTags::getTagsByGoodsId($model->id);
    	$model->soldarea = !empty($model->soldarea) ? explode(",", $model->soldarea) : [];
    	if ($model->load(Yii::$app->request->post())) 
        {
        	$model->picture = FileUploaded::getInstances($model, "picture");
        	$model->soldarea = implode(",", $model->soldarea);
        	$place = $model->place;
        	$model->place = isset($place['county']) && !empty($place['county']) ? $place['county'] : (isset($place['city']) && !empty($place['city']) ? $place['city'] : $place['province']);
        	$model->links = json_encode($model->links);

            if($model->save())
            {
            	GoodsTags::createGoodsTags($model->id, $model->tags);
            	GoodsLinks::createGoodsLinks($model->id, json_decode($model->links, true));
            	return $this->redirect(['index']);
            }
            $model->links = json_decode($model->links, true);
            $model->place = $place;
        }

        $picture = [];
        if(!empty($model->picture))
        {
        	$picture = explode("|", $model->picture);
        	foreach ($picture as $k => $v)
        	{
        		$picture[$k] = FileUploaded::formatImges($v, "Goods[picture][]");
        	}
        }
    	return $this->render('form', ['model' => $model,'picture' => $picture]);
    }
    
    /**
     * 产地
     * @param unknown $place
     * @return NULL|multitype:NULL string
     */
    public function formatPlace($place)
    {
    	$areas = Areas::getParentBuChildId(110113);
    	if(empty($areas)) return null;
    	krsort($areas);
    	$areas = array_values($areas);
    	$data = [];
    	$data['province'] = $areas[0]['id'];
    	$data['city'] = isset($areas[1]) ? $areas[1]['id'] : '';
    	$data['county'] = isset($areas[2]) ? $areas[2]['id'] : '';
    	
    	return $data;
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
        	$model->links = json_encode($model->links);
            if($model->save())
            {
            	GoodsTags::createGoodsTags($model->id, $model->tags);
            	UserGoods::createGoodsRole(\Yii::$app->user->id, $model->id);
            	GoodsLinks::createGoodsLinks($model->id, json_decode($model->links, true));
            	return $this->redirect(['index']);
            }
            $model->links = json_decode($model->links, true);
            $model->place = $place;
        }

        $model->soldarea = !empty($model->soldarea) ? explode(",", $model->soldarea) : [];
      	return $this->render('form', [
                'model' => $model,
            ]);
    }
		
    public function actionPartner()
    {
    	$condition = ['uid' => \Yii::$app->user->id];
    	$model = UserRole::getAllByCondition($condition, "id desc");
    	
    	return $this->render("partner", ['model' => $model]);
    }
}
