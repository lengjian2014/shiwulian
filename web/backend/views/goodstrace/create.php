<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsTrace */

$this->title = Yii::t('app', 'Create Goods Trace');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods Traces'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-trace-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
