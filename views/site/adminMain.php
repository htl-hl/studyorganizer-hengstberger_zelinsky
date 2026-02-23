<?php

/** @var yii\web\View $this */

/** @var \app\models\Subjects[] $subjects */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'AdminMain';
?>

<div class="site-adminmain">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Subject'), ['subjects/create'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Create Teacher'), ['teachers/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <?php foreach ($subjects as $subject): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $subject->subjectname?></h5>
                        <p class="card-text"> <?php foreach ($subject->teachers as $teacher): ?>
                        <p><?= $teacher->teachername ?></p>
                        <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <?= Html::a('To Subject', ['assignments/index', 'subjectID' => $subject->subjectID], ['class' => 'btn btn-primary']) ?>
                        <div class="d-flex gap-2">
                            <?= \yii\bootstrap5\Html::a($subject->editIconUpdate(), Url::to(['subjects/update', 'subjectID' => $subject->subjectID]), ['class' => 'btn btn-primary']) ?>
                            <?= \yii\bootstrap5\Html::a($subject->deleteIconUpdate(), Url::to(['subjects/delete', 'subjectID' => $subject->subjectID]),
                                    ['class' => 'btn btn-danger', 'data-method' => 'POST', 'data-confirm' => 'Möchtest du das Fach wirklich löschen']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
