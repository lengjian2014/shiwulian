<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsLinks */

$this->title = Yii::t('app', 'Create Goods Links');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Goods Links'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-links-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
