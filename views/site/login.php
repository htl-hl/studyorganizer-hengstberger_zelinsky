<?php
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card border-secondary p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Login</h2>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <div class="form-group mt-3 d-grid">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary']) ?>
        </div>
        <p class="text-center mt-3">
            Noch kein Konto? <?= Html::a('Registrieren', ['site/register']) ?>
        </p>
        <?php ActiveForm::end(); ?>
    </div>
</div>