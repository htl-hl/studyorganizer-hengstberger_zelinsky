<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Assignments $model */

$this->title = Yii::t('app', 'Create Assignments');
?>
<div class="assignments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
