<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Registrieren';
?>
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card border-secondary p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Registrieren</h2>
        <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group mt-3 d-grid">
            <?= Html::submitButton('Registrieren', ['class' => 'btn btn-primary']) ?>
        </div>
        <p class="text-center mt-3">
            Bereits ein Konto? <?= Html::a('Login', ['site/index']) ?>
        </p>
        <?php ActiveForm::end(); ?>
    </div>
</div>