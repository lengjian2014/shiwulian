<?php

use yii\helpers\Html;
use yii\grid\GridView;
use devgroup\JsTreeWidget\widgets\TreeWidget;
use devgroup\JsTreeWidget\helpers\ContextMenuHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClassifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Classifies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classify-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Classify'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?//= GridView::widget([
//         'dataProvider' => $dataProvider,
//         'filterModel' => $searchModel,
//         'columns' => [
//             ['class' => 'yii\grid\SerialColumn'],

//             'id',
//             'title',
//             'pid',
//             'describe',
//             'order',

//             ['class' => 'yii\grid\ActionColumn'],
//         ],
//     ]); ?>
	<div class="alert alert-success">
	<?= TreeWidget::widget([
            'treeDataRoute' => ['gettree', 'selected_id' => 0],
            'reorderAction' => ['menureorder'],
            'changeParentAction' => ['menuchangeparent'],
            'treeType' => TreeWidget::TREE_TYPE_ADJACENCY,
            'contextMenuItems' => [
                'open' => [
                    'label' => '查看',
					'icon' => 'glyphicon glyphicon-eye-open',
                    'action' => ContextMenuHelper::actionUrl(
                        ['/classify/view'],
                        ['id']
                    ),
                ],
                'edit' => [
                    'label' => '编辑',
					'icon' => 'glyphicon glyphicon-pencil',
                    'action' => ContextMenuHelper::actionUrl(
                        ['/classify/update'],
						['id']
                    ),
                ],
// 				'delete' => [
// 					'label' => '删除',
// 					'icon' => 'glyphicon glyphicon-trash',
// 					'action' => ContextMenuHelper::actionUrl(
// 							['/classify/delete'],
// 							['id']
// 					),
// 				]
            ],
        ]) ?>
	</div>
</div>