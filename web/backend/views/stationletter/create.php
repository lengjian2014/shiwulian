<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StationLetter */

$this->title = Yii::t('app', 'Create Station Letter');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Station Letters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="station-letter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
