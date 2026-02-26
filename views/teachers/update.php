<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teachers $model */

$this->title = Yii::t('app', 'Update Teachers: {name}', [
    'name' => $model->teacherID,
]);
?>
<div class="teachers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
