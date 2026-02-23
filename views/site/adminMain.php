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
                    <div class="card-header"><?= $subject->subjectname?></div>
                    <div class="card-body">
                        <?php foreach ($subject->teachers as $teacher): ?>
                            <p><?= $teacher->teachername ?></p>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-footer">
                        <?= \yii\bootstrap5\Html::a($subject->editIconUpdate(), Url::to(['subjects/update', 'subjectID' => $subject->subjectID]), ['class' => 'btn btn-primary']) ?>
                        <?= \yii\bootstrap5\Html::a($subject->deleteIconUpdate(), Url::to(['subjects/delete', 'subjectID' => $subject->subjectID]),
                                ['class' => 'btn btn-danger', 'data-method' => 'POST', 'data-confirm' => 'Möchtest du das Fach wirklich löschen']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
