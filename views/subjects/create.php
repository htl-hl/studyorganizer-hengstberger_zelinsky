<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Subjects $model */
/** @var array $teachersList */
/** @var app\models\Teachers[] $teachers */

$this->title = Yii::t('app', 'Create Subjects');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
            'model' => $model,
            'teachersList' => $teachersList,
            'teachers' => $teachers,
    ]) ?>

</div>
