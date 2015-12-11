<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\GoodsEvaluate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-evaluate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uid')->textInput() ?>

    <?= $form->field($model, 'goods_id')->textInput() ?>

    <?= $form->field($model, 'real')->textInput() ?>

    <?= $form->field($model, 'fresh')->textInput() ?>

    <?= $form->field($model, 'satisfied')->textInput() ?>

    <?= $form->field($model, 'taste')->textInput() ?>

    <?= $form->field($model, 'package')->textInput() ?>

    <?= $form->field($model, 'addtime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
