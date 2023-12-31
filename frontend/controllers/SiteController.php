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
use yii\data\ActiveDataProvider;
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
        $courses = new ActiveDataProvider([
            'query' => Course::find()
                ->where(['status' => Detect::STATUS_ACTIVE])
                ->limit(6)
                ->orderBy(['id' => SORT_DESC])
        ]);
        $about = About::find()->one();
        $pupils = User::find()->where(['role' => Detect::PUPIL])->count();
        $teacher = User::find()->where(['role' => Detect::TEACHER])->count();
        $comments = new ActiveDataProvider([
            'query' => Contact::find()
                ->where(['status' => Detect::STATUS_ACTIVE])
                ->orderBy(['id' => SORT_DESC])
                ->limit(6)
        ]);
        return $this->render('index', compact('courses', 'about', 'pupils', 'teacher', 'comments'));
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
    public function actionContact(): Response|string
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
        $comments = new ActiveDataProvider([
            'query' => Contact::find()
                ->where(['status' => Detect::STATUS_ACTIVE])
                ->orderBy(['id' => SORT_DESC])
                ->limit(6)
        ]);
        $model = About::find()->one();
        $teachers = User::find()->where(['role' => Detect::TEACHER, 'status' => Detect::STATUS_ACTIVE])->count();
        $pupils = User::find()->where(['role' => Detect::PUPIL, 'status' => Detect::STATUS_ACTIVE])->count();
        $courses = Course::find()->count();
        return $this->render('about', compact('comments', 'model', 'teachers', 'pupils', 'courses'));
    }
}
