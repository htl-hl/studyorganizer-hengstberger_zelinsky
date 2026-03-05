<?php

namespace app\controllers;

use app\models\Subjects;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => ['class' => 'yii\web\ErrorAction'],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/adminmain']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['site/adminmain']);
        }

        $model->password = '';
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionAdminmain()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/index']);
        }

        $subjects = Subjects::find()->with('teachers')->all();
        return $this->render('adminMain', [
            'subjects' => $subjects,
        ]);
    }

    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['site/adminmain']);
        }

        $model = new User();
        $model->scenario = 'register';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->password = Yii::$app->security->generatePasswordHash($model->password);
            $model->authKey = Yii::$app->security->generateRandomString();
            $model->accessToken = Yii::$app->security->generateRandomString();
            $model->role = 'user';

            if ($model->save(false)) {
                Yii::$app->user->login($model, 3600 * 24 * 30);
                return $this->redirect(['site/adminmain']);
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['site/index']);
    }
}
