<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Classify;

/* @var $this yii\web\View */
/* @var $model common\models\Classify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classify-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'pid')->dropDownList(ArrayHelper::map( Classify::find()->where("pid=1")->all(),'id','title'),['prompt'=>'选择一级分类',])?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'describe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>