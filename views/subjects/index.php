<?php

use app\models\Subjects;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SubjectsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \app\models\Subjects[] $subjects */

$this->title = Yii::t('app', 'Subjects');
?>
<div class="subjects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
        <p>
            <?= Html::a(Yii::t('app', 'Create Subjects'), ['create'], ['class' => 'btn btn-outline-secondary']) ?>
        </p>
    <?php endif; ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">-</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($subjects as $index => $subject): ?>
            <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= Html::encode($subject->subjectname) ?></td>
                <td>
                    <?= \yii\bootstrap5\Html::a($subject->editIconUpdate(), Url::to(['update', 'subjectID' => $subject->subjectID]), ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                    <?= \yii\bootstrap5\Html::a($subject->deleteIconUpdate(), Url::to(['delete', 'subjectID' => $subject->subjectID]), ['class' => 'btn btn-outline-secondary btn-sm', 'data-confirm' => 'Möchtest du diesen Lehrer wirklich löschen?', 'data-method' => 'post',]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>
