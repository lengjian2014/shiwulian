<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GoodsEvaluateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-evaluate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'uid') ?>

    <?= $form->field($model, 'goods_id') ?>

    <?= $form->field($model, 'real') ?>

    <?= $form->field($model, 'fresh') ?>

    <?php // echo $form->field($model, 'satisfied') ?>

    <?php // echo $form->field($model, 'taste') ?>

    <?php // echo $form->field($model, 'package') ?>

    <?php // echo $form->field($model, 'addtime') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
