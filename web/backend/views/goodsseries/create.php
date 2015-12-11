<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsSeries */

$this->title = Yii::t('app', 'Create Goods Series');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods Series'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-series-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
