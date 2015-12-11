<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsEvaluate */

$this->title = Yii::t('app', 'Create Goods Evaluate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods Evaluates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-evaluate-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
