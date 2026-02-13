<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subjects $model */

$this->title = Yii::t('app', 'Update Subjects: {name}', [
    'name' => $model->subjectID,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subjectID, 'url' => ['view', 'subjectID' => $model->subjectID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
