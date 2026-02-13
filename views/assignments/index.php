<?php

use app\models\Assignments;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AssignmentsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignments-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Assignments'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
