<?php

namespace app\controllers;

use app\models\Subjects;
use app\models\SubjectsSearch;
use app\models\Teachers;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * SubjectsController implements the CRUD actions for Subjects model.
 */
class SubjectsController extends Controller
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
     * Lists all Subjects models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SubjectsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subjects model.
     * @param int $subjectID Subject ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($subjectID)
    {
        return $this->render('view', [
            'model' => $this->findModel($subjectID),
        ]);
    }

    /**
     * Creates a new Subjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Subjects();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/site/main']);
            }
        } else {
            $model->loadDefaultValues();
        }

        $teachers = Teachers::find()->all();
        $teachersList = ArrayHelper::map($teachers, 'teacherID', 'teachername');

        return $this->render('create', [
            'model' => $model,
            'teachersList' => $teachersList,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Updates an existing Subjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $subjectID Subject ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($subjectID)
    {
        $model = $this->findModel($subjectID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/site/main']);
        }

        $teachers = Teachers::find()->all();
        $teachersList = ArrayHelper::map($teachers, 'teacherID', 'teachername');

        return $this->render('update', [
            'model' => $model,
            'teachersList' => $teachersList,
            'teachers' => $teachers,
        ]);
    }

    /**
     * Deletes an existing Subjects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $subjectID Subject ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($subjectID)
    {
        $this->findModel($subjectID)->delete();

        return $this->redirect(['/site/main']);
    }

    /**
     * Finds the Subjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $subjectID Subject ID
     * @return Subjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($subjectID)
    {
        if (($model = Subjects::findOne(['subjectID' => $subjectID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
