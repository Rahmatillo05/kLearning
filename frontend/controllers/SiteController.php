<?php

namespace frontend\controllers;

use common\models\about\About;
use common\models\contact\Contact;
use common\models\course\Course;
use common\models\MainImg\MainImg;
use common\models\user\User;
use common\widgets\Detect;
use frontend\models\LoginForm;
use frontend\models\SignupForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use frontend\models\ContactForm;
use frontend\modules\teacher\Teacher;
use yii\helpers\VarDumper;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $courses = Course::find()->count();
        $model = About::find()->one();
        $teachers = User::find()->where(['role' => Detect::TEACHER, 'status' => Detect::STATUS_ACTIVE])->count();
        $pupils = User::find()->where(['role' => Detect::PUPIL, 'status' => Detect::STATUS_ACTIVE])->count();
        $datas = Contact::find()->where(['status' =>Detect::STATUS_ACTIVE])->limit(4)->all();
        $indexTeacher = User::find()->where(['role' => Detect::TEACHER, 'status' => Detect::STATUS_ACTIVE])->limit(3)->all();
        $indexCourse = Course::find()->limit(3)->all();
        return $this->render('index', compact('model', 'courses', 'teachers', 'pupils', 'datas', 'indexTeacher', 'indexCourse'));
    }

    /**
     * Logs in a user.
     *
     * @return Response|string
     */
    public function actionLogin(): Response|string
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect([Detect::detectRole(Yii::$app->user->identity->role)]);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect([Detect::detectRole(Yii::$app->user->identity->role)]);
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->email != '' && $model->save()) {
                Yii::$app->session->setFlash('success', 'Fikringiz uchun rahmat!');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Fikringiz saqlanmadi!');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Signs user up.
     *
     * @return string|Response
     */
    public function actionSignup(): string|Response
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionAbout(): string
    {
        $datas = Contact::find()->where(['status' =>Detect::STATUS_ACTIVE])->all();
        $model = About::find()->one();
        $teachers = User::find()->where(['role' => Detect::TEACHER, 'status' => Detect::STATUS_ACTIVE])->count();
        $pupils = User::find()->where(['role' => Detect::PUPIL, 'status' => Detect::STATUS_ACTIVE])->count();
        $courses = Course::find()->count();
        return $this->render('about',compact('datas', 'model', 'teachers', 'pupils', 'courses'));
    }
}
