<?php

namespace backend\controllers;

use Yii;
use common\models\Classify;
use backend\models\ClassifySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\phpQuery;
use common\widgets\AdjacencyList\FullTreeDataAction;
use common\widgets\AdjacencyList\TreeNodesReorderAction;
use common\widgets\AdjacencyList\TreeNodeMoveAction;

/**
 * ClassifyController implements the CRUD actions for Classify model.
 */
class ClassifyController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function actions()
    {
    	return [
	    	'gettree' => [
		    	'class' => FullTreeDataAction::className(),
		    	'className' => Classify::className(),
	    	],
	    	'menureorder' => [
		    	'class' => TreeNodesReorderAction::className(),
		    	'className' => Classify::className(),
	    	],
	    	'menuchangeparent' => [
		    	'class' => TreeNodeMoveAction::className(),
		    	'className' => Classify::className(),
	    	],
    	];
    }

    /**
     * Lists all Classify models.
     * @return mixed
     */
    public function actionIndex()
    {
    	//phpQuery::newDocumentFile('http://www.csc.edu.cn/laihua/universityprograms.aspx?collegeId=12');
    	//$nei_box = pq(".nei_box .content_C");
        $searchModel = new ClassifySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Classify model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Classify model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Classify();

        if ($model->load(Yii::$app->request->post())) 
        {
        	$model->pid = intval($model->pid);
        	$title = explode(" ", $model->title);
        	if(count($title) > 1)
        	{
        		foreach ($title as $k => $v)
        		{
        			$child = new Classify();
        			$child->pid = $model->pid;
        			$child->title = $v;
        			$child->save();
        		}
        	}
        	else 
        		$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Classify model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Classify model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Classify model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classify the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classify::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
