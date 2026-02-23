<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subjects $model */
/** @var array $teachersList */

$this->title = Yii::t('app', 'Update Subjects: {name}', [
    'name' => $model->subjectname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subjectname, 'url' => ['view', 'subjectID' => $model->subjectID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teachersList' => $teachersList,
    ]) ?>

</div>
