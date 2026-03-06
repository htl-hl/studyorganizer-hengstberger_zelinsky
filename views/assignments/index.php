<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var \app\models\Subjects[] $subjects */
/** @var int $userID */

$this->title = 'Assignments';
$isAdmin = !Yii::$app->user->isGuest && Yii::$app->user->identity->role === 'admin';

$iconCompleted = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/></svg>';
$iconPending = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hourglass-split" viewBox="0 0 16 16"><path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/></svg>';
?>
<div class="assignments-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($subjects as $subject): ?>
        <?php
        $visibleAssignments = $isAdmin
                ? $subject->assignments
                : array_filter($subject->assignments, fn($a) => $a->userID == $userID);
        ?>
        <div class="mb-4">
            <div class="d-flex align-items-center justify-content-between">
                <h3><?= Html::encode($subject->subjectname) ?></h3>
                <?php if (!Yii::$app->user->isGuest && !$isAdmin): ?>
                    <?= Html::a('+ Aufgabe', ['create', 'subjectID' => $subject->subjectID], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                <?php endif; ?>
            </div>
            <hr>
            <?php if (empty($visibleAssignments)): ?>
                <p class="text-muted">Keine Aufgaben vorhanden.</p>
            <?php else: ?>
                <ul class="list-group">
                    <?php foreach ($visibleAssignments as $assignment): ?>
                        <?php
                        $statusClass = $assignment->isCompleted
                                ? 'list-group-item-success'
                                : $assignment->getDueDateClass();
                        ?>
                        <li class="list-group-item <?= $statusClass ?>">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong><?= Html::encode($assignment->title) ?></strong>
                                    <?php if ($isAdmin): ?>
                                        <span class="badge bg-secondary ms-2"><?= Html::encode($assignment->user->username ?? 'Unbekannt') ?></span>
                                    <?php endif; ?>
                                    <p class="mb-1 text-muted"><?= Html::encode($assignment->description) ?></p>
                                    <small>
                                        Fällig: <?= $assignment->due_date ?>
                                        <?= $assignment->isCompleted ? $iconCompleted : $iconPending ?>
                                    </small>
                                </div>
                                <?php if ($assignment->userID == $userID && !$isAdmin): ?>
                                    <div class="d-flex gap-2 ms-3 flex-shrink-0">
                                        <?php if (!$assignment->isCompleted): ?>
                                            <?= \yii\bootstrap5\Html::a($assignment->editIconUpdate(), Url::to(['update', 'homeworkID' => $assignment->homeworkID]), ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                            <?= \yii\bootstrap5\Html::a($assignment->deleteIconUpdate(), Url::to(['delete', 'homeworkID' => $assignment->homeworkID]), ['class' => 'btn btn-outline-danger btn-sm', 'data-confirm' => 'Aufgabe wirklich löschen?', 'data-method'  => 'post',]) ?>
                                            <?= \yii\bootstrap5\Html::a('✓ Erledigt', Url::to(['complete', 'homeworkID' => $assignment->homeworkID]), ['class' => 'btn btn-success btn-sm', 'data-confirm' => 'Aufgabe als erledigt markieren?', 'data-method'  => 'post',]) ?>
                                        <?php else: ?>
                                            <span class="badge bg-success">Erledigt</span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>