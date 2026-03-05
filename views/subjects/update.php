<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subjects $model */
/** @var array $teachersList */
/** @var app\models\Teachers[] $teachers */

$this->title = Yii::t('app', 'Update Subject: {name}', [
    'name' => $model->subjectname,
]);
?>
<div class="subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'teachersList' => $teachersList,
            'teachers' => $teachers,
    ]) ?>

</div>
