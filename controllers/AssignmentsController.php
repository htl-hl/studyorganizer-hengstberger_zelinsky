<?php

namespace app\controllers;

use app\models\Assignments;
use app\models\AssignmentsSearch;
use app\models\Subjects;
use app\models\User;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssignmentsController implements the CRUD actions for Assignments model.
 */
class AssignmentsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Assignments models.
     *
     * @return string
     */
    public function actionIndex($subject_id = null)
    {
        $searchModel = new AssignmentsSearch();
        $queryParams = $this->request->queryParams;

        if ($subject_id !== null) {
            $queryParams['AssignmentsSearch']['subjectID'] = $subject_id;
        }

        $dataProvider = $searchModel->search($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assignments model.
     * @param int $homeworkID Homework ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($homeworkID)
    {
        return $this->render('view', [
            'model' => $this->findModel($homeworkID),
        ]);
    }

    /**
     * Creates a new Assignments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($subject_id = null)
    {
        $model = new Assignments();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->userID = Yii::$app->user->id;
                $model->subjectID = $_GET['subjectID'];
                if ($model->save()) {
                    return $this->redirect(['view', 'homeworkID' => $model->homeworkID]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Assignments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $homeworkID Homework ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($homeworkID)
    {
        $model = $this->findModel($homeworkID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'homeworkID' => $model->homeworkID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Assignments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $homeworkID Homework ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($homeworkID)
    {
        $this->findModel($homeworkID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Assignments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $homeworkID Homework ID
     * @return Assignments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($homeworkID)
    {
        if (($model = Assignments::findOne(['homeworkID' => $homeworkID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
