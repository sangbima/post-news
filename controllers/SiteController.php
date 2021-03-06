<?php

namespace app\controllers;

use app\models\Advisors;
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
use app\models\Wallet;
use yii\data\ActiveDataProvider;

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
            ->limit(3)
            ->orderBy(['id' => SORT_ASC])
            ->all();

        $wp = Posts::find()
            ->andWhere(['category_id' => 4])
            ->limit(3)
            ->orderBy(['id' => SORT_ASC])
            ->all();

        $partners = Posts::find()
            ->select('id, title, slug, image')
            ->partners()
            ->limit(3)
            ->all();
        
        
        $items = [];
        foreach ($pinPost as $key => $post) {
            if ($post->display_image == true || $post->rate_id == null) {
                $contentRight = '<img src="'. Url::to(['/site/view-image', 'name' => $post->image]) . '" alt="slider-1"/>';
            } else {
                $tableRate = '';
            
                $rateIds = explode(',', $post->rate_id);
                foreach($rateIds as $id) {
                    $rate = $post->getKurs($id);
        
                    $ico = $rate->ico ? 'ICO' : '';
                    $tableRate .= '
                        <table class="table table-rate">
                            <tr>
                                <th colspan="2"><i class="fas fa-chart-bar"></i> BUY RATE ' . $ico .' ' . $rate->to . ' (' . Yii::$app->formatter->asDate($rate->updated_at, 'php:Y-m-d') . ')</th>
                            </tr>
                            <tr>
                                <td>' . $rate->from . '</td>
                                <td class="text-right">' . $rate->rate . '</td>
                            </tr>
                        </table>
                    ';
                }
                $contentRight = $tableRate . '
                    <div class="buy">' . Html::a('Buy', ['#'], ['class' => 'btn btn-link btn-paper']) . '</div>
                ';
            }


            $items[] = '
                <div class="sliders"><div class="content content-left">
                    <h1>'. $post->title .'</h1>
                        <p>'.StringHelper::truncate($post->content, 250, '...').'</p> ' .
                        Html::a('Readmore', ['/site/view-post', 'slug' => $post->slug], $options = ['class' => 'btn btn-link btn-transparent']).'
                    </div>
                    <div class="content content-right">' .
                        $contentRight .
                    '</div>
                </div>
            ';
        }

        $mainPost = Posts::find(['title', 'content'])
            ->andWhere(['is_important' => 9])
            ->orderBy(['id' => SORT_ASC])
            ->one();

        $deadline = '12/31/2020 09:30 AM';

        $queryStageOneIndonesia = Wallet::find()
            ->select(['name', 'address', 'id_member', 'coin', 'buy_date'])
            ->stage1()
            ->indonesia();
        $queryStageOneSingapore = Wallet::find()
            ->select(['name', 'address', 'id_member', 'coin', 'buy_date'])
            ->stage1()
            ->singapore();
        $queryStageOneUsa = Wallet::find()
            ->select(['name', 'address', 'id_member', 'coin', 'buy_date'])
            ->stage1()
            ->usa();
        $queryStageOneUea = Wallet::find()
            ->select(['name', 'address', 'id_member', 'coin', 'buy_date'])
            ->stage1()
            ->uea();
        $queryStageOneHongkong = Wallet::find()
            ->select(['name', 'address', 'id_member', 'coin', 'buy_date'])
            ->stage1()
            ->hongkong();

        $queryStageTwoIndonesia = Wallet::find()
            ->select(['name', 'address', 'id_member', 'coin', 'buy_date'])
            ->stage2()
            ->indonesia();

        $advisors = Advisors::find()
            ->select(['img', 'name', 'title'])
            ->all();

        $dataProviderStageOneIndonesia = new ActiveDataProvider([
            'query' => $queryStageOneIndonesia,
        ]);
        $dataProviderStageOneSingapore = new ActiveDataProvider([
            'query' => $queryStageOneSingapore,
        ]);
        $dataProviderStageOneUsa = new ActiveDataProvider([
            'query' => $queryStageOneUsa,
        ]);
        $dataProviderStageOneUea = new ActiveDataProvider([
            'query' => $queryStageOneUea,
        ]);
        $dataProviderStageOneHongkong = new ActiveDataProvider([
            'query' => $queryStageOneHongkong,
        ]);

        $dataProviderStageTwoIndonesia = new ActiveDataProvider([
            'query' => $queryStageTwoIndonesia,
        ]);

        return $this->render('index', [
            'deadline' => $deadline,
            'items' => $items,
            'main' => $mainPost,
            'wp' => $wp,
            'partners' => $partners,
            'stageOneIndonesia' => $dataProviderStageOneIndonesia,
            'stageOneSingapore' => $dataProviderStageOneSingapore,
            'stageOneUsa' => $dataProviderStageOneUsa,
            'stageOneUea' => $dataProviderStageOneUea,
            'stageOneHongkong' => $dataProviderStageOneHongkong,
            'stageTwoIndonesia' => $dataProviderStageTwoIndonesia,
            'advisors' => $advisors
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

    public function actionViewImage($name = null, $type = null)
    {
        $type = !is_null($type) ? $type . '/' : 'articles/';
        $file = Yii::getAlias('@app/uploads/' . $type . $name, $throwException = true);

        if (!is_file($file) || $name == null) {
            return Yii::$app->response->sendFile(Yii::getAlias('@app/web/images/dummy.svg', true), NULL, ['inline' => true]);
        }
        
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
