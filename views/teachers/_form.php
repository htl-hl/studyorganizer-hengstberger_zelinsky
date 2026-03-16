<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Teachers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teachername')->textInput(['maxlength' => true, 'style' => 'width: 400px;']) ?>

    <?= $form->field($model, 'isActive')->checkbox(['style' => 'transform: scale(1.5);', 'checked' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
