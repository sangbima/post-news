<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\StringHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
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
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $pinPost = Posts::find()
            ->important()
            ->limit(4)
            ->orderBy(['id' => SORT_DESC])
            ->all();

        foreach ($pinPost as $key => $post) {
            $items[] = '
                <div class="sliders"><div class="content content-left">
                    <h1>'. $post->title .'</h1>
                        <p>'.StringHelper::truncate($post->content, 250, '...').'</p> ' .
                        Html::a('Readmore', ['/site/view-post', 'slug' => $post->slug], $options = ['class' => 'btn btn-link btn-transparent']).'
                    </div>
                    <div class="content content-right">
                        <img src="'. Url::to(['/site/view-image', 'name' => $post->image]) . '" alt="slider-1"/>
                    </div>
                </div>
            ';
        }

        $mainPost = Posts::find(['title', 'content'])
            ->andWhere(['is_important' => 9])
            ->orderBy(['id' => SORT_ASC])
            ->one();

        $deadline = 15;

        return $this->render('index', [
            'deadline' => $deadline,
            'items' => $items,
            'main' => $mainPost
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
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

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays product page.
     *
     * @return string
     */
    public function actionProducts()
    {
        return $this->render('products');
    }

    /**
     * Displays partners page.
     *
     * @return string
     */
    public function actionPartners()
    {
        return $this->render('partners');
    }

    /**
     * Displays features page.
     *
     * @return string
     */
    public function actionFeatures()
    {
        return $this->render('features');
    }

    public function actionViewPost($slug) 
    {
        $model = $this->findModel($slug);

        return $this->render('view-post', [
            'model' => $model
        ]);
    }

    public function actionViewImage($name)
    {
        $file = Yii::getAlias('@app/uploads/articles/' . $name, $throwException = true);

        return Yii::$app->response->sendFile($file, NULL, ['inline' => true]);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($slug)
    {
        if (($model = Posts::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
