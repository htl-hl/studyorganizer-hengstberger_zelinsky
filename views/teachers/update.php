<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teachers $model */

$this->title = Yii::t('app', 'Update Teachers: {name}', [
    'name' => $model->teacherID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teachers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teacherID, 'url' => ['view', 'teacherID' => $model->teacherID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="teachers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
