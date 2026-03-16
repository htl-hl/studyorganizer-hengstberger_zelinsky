<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Assignments $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="assignments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'style' => 'width: 600px;']) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true, 'style' => 'width: 600px; height: 150px;']) ?>

    <?= $form->field($model, 'due_date')->input('date', ['class' => 'form-control', 'style' => 'width: 600px;']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
