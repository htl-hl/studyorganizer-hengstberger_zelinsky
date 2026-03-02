<?php

use app\models\Assignments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AssignmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<div class="assignments-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Assignments'), ['create'], ['class' => 'btn btn-outline-secondary']) ?>
    </p>

    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'homeworkID',
                    'title',
                    'description',
                    'isCompleted',
                    'due_date',
                //'userID',
                //'subjectID',
                    [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Assignments $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'homeworkID' => $model->homeworkID]);
                            }
                    ],
            ],
    ]); ?>

</div>
