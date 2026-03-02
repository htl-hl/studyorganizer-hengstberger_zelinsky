<?php

use app\models\Teachers;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TeachersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var \app\models\Teachers[] $teachers */


$this->title = Yii::t('app', 'Teachers');
?>
<div class="teachers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teachers'), ['create'], ['class' => 'btn btn-outline-secondary']) ?>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">-</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teachers as $index => $teacher): ?>
            <tr class="<?= $teacher->isActive ? 'table-success' : 'table-danger' ?>">
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= Html::encode($teacher->teachername) ?></td>
                <td><?= $teacher->isActive ? 'active' : 'not active' ?></td>
                <td>
                    <?= \yii\bootstrap5\Html::a($teacher->editIconUpdate(), Url::to(['update', 'teacherID' => $teacher->teacherID]), ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                    <?= \yii\bootstrap5\Html::a($teacher->deleteIconUpdate(), Url::to(['delete', 'teacherID' => $teacher->teacherID]), ['class' => 'btn btn-outline-secondary btn-sm', 'data-confirm' => 'Möchtest du diesen Lehrer wirklich löschen?', 'data-method' => 'post',
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


</div>
