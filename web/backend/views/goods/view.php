<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Goods */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uid',
            'barcode',
            'title',
            'summary',
            'soldarea',
            'detail:ntext',
            'picture',
            'price',
            'market_price',
            'unit',
            'weight',
            'brand',
            'classify',
            'inventory',
            'sales',
            'comments',
            'score',
            'scan',
            'dynamic',
            'trace',
            'place',
            'gps',
            'keyword',
            'description',
            'status',
            'admin_id',
            'reason',
            'addtime:datetime',
            'updatetime:datetime',
        ],
    ]) ?>

</div>
