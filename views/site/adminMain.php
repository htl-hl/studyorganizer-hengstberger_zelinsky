<?php

/** @var yii\web\View $this */

/** @var \app\models\Subjects[] $subjects */

use yii\helpers\Html;
use yii\helpers\Url;


$this->title = 'Home';
?>

<div class="site-adminmain">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
    <p>
        <?= Html::a(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
        <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
    </svg> Create Subject',
                ['subjects/create'],
                ['class' => 'btn btn-outline-secondary', 'encode' => false]
        ) ?>

        <?= Html::a(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
        <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
    </svg> ' . Yii::t('app', 'Create Teacher'),
                ['teachers/create'],
                ['class' => 'btn btn-outline-secondary', 'encode' => false]
        ) ?>

        <?php endif; ?>

        <?= Html::a(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-stacked" viewBox="0 0 16 16">
        <path d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
    </svg> ' . Yii::t('app', 'View All Teachers'),
                ['teachers/index'],
                ['class' => 'btn btn-outline-secondary', 'encode' => false]
        ) ?>
        <?= Html::a(
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-view-stacked" viewBox="0 0 16 16">
        <path d="M3 0h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm0 8h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
    </svg> ' . Yii::t('app', 'View All Assignments'),
                ['assignments/index'],
                ['class' => 'btn btn-outline-secondary', 'encode' => false]
        ) ?>
    </p>
    <div class="row">
        <?php foreach ($subjects as $subject): ?>
            <div class="col-lg-3 col-md-6 col-sm-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $subject->subjectname ?></h5>
                        <p class="card-text"> <?php foreach ($subject->teachers as $teacher): ?>
                        <p><?= $teacher->teachername ?></p>
                        <?php endforeach; ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-center align-items-center">
                        <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin'): ?>
                            <div class="d-flex gap-2">
                                <?= \yii\bootstrap5\Html::a($subject->editIconUpdate(), Url::to(['subjects/update', 'subjectID' => $subject->subjectID]), ['class' => 'btn btn-outline-secondary']) ?>
                                <?= \yii\bootstrap5\Html::a($subject->deleteIconUpdate(), Url::to(['subjects/delete', 'subjectID' => $subject->subjectID]),
                                        ['class' => 'btn btn-outline-secondary', 'data-method' => 'POST', 'data-confirm' => 'Möchtest du das Fach wirklich löschen']) ?>
                            </div>
                        <?php else: ?>
                            <?= Html::a('To Subject', ['assignments/index', 'subjectID' => $subject->subjectID], ['class' => 'btn btn-outline-secondary']) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
