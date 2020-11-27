<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Advisors;
use app\models\search\SearchAdvisors;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * AdvisorsController implements the CRUD actions for Advisors model.
 */
class AdvisorsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advisors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchAdvisors();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advisors model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advisors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advisors();

        if ($model->load(Yii::$app->request->post())) {
            $avatar = UploadedFile::getInstance($model, 'photo');

            if(!is_null($avatar)) {
                $fileName = time() . preg_replace("/[\W_]+/u", '', strtolower($avatar->baseName)) . '.' . $avatar->extension;
                $dir = Yii::getAlias('@app/uploads/advisors/');

                if(!is_dir(dirname($dir . '.gitignore'))) {
                    FileHelper::createDirectory(dirname($dir . '.gitignore'));
                }
    
                $fileSaveTo = $dir . $fileName;
                $avatar->saveAs($fileSaveTo);
                $model->img = $fileName;
            }

            $model->save(false);

            Yii::$app->session->setFlash('success', 'Advisors created');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Advisors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $file = $model->img;

        if ($model->load(Yii::$app->request->post())) {
            $avatar = UploadedFile::getInstance($model, 'photo');

            if(!empty($model->photo) || !is_null($avatar)) {
                $fileName = time() . preg_replace("/[\W_]+/u", '', strtolower($avatar->baseName)) . '.' . $avatar->extension;
                $dir = Yii::getAlias('@app/uploads/advisors/');

                FileHelper::unlink($dir . '/' . $file);

                if(!is_dir(dirname($dir . '.gitignore'))) {
                    FileHelper::createDirectory(dirname($dir . '.gitignore'));
                }
    
                $fileSaveTo = $dir . $fileName;
                $avatar->saveAs($fileSaveTo);
                $model->img = $fileName;
            } else {
                $model->img = (string) $model->getOldAttribute('img');
            }
            
            $model->save();
            Yii::$app->session->setFlash('success', 'Advisors updated');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Advisors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $file = $model->img;
        $dir = Yii::getAlias('@app/uploads/advisors/');

        FileHelper::unlink($dir . '/' . $file);
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advisors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advisors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advisors::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
