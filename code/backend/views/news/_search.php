<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'classify_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'summary') ?>

    <?= $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <?php // echo $form->field($model, 'source') ?>

    <?php // echo $form->field($model, 'sourceurl') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'like') ?>

    <?php // echo $form->field($model, 'share') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'top') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <?php // echo $form->field($model, 'updatetime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
