<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Classify */

$this->title = Yii::t('app', 'Create Classify');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Classifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
