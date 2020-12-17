<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Posts;
use app\models\search\SearchPosts;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * PostController implements the CRUD actions for Posts model.
 */
class PostController extends Controller
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
     * Lists all Posts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPosts();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Posts model.
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
     * Creates a new Posts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Posts();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->rate_id = empty($model->rate_id) ? null : implode(',', $model->rate_id);

            if ($model->validate()) {
                if(!is_null($model->image)) {
                    $fileName = time() . preg_replace("/[\W_]+/u", '', strtolower($model->image->baseName)) . '.' . $model->image->extension;
                    $dir = Yii::getAlias('@app/uploads/articles/');
    
                    if(!is_dir(dirname($dir . '.gitignore'))) {
                        FileHelper::createDirectory(dirname($dir . '.gitignore'));
                    }
        
                    $fileSaveTo = $dir . $fileName;
                    $model->image->saveAs($fileSaveTo);
                    $model->image = $fileName;
                }
    
                $model->save(false);

                Yii::$app->session->setFlash('success', 'Post created');
            }
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Posts model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $file = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            $model->rate_id = empty($model->rate_id) ? null : implode(',', $model->rate_id);

            if ($model->validate()) {
                if(!is_null($image)) {
                    $fileName = time() . preg_replace("/[\W_]+/u", '', strtolower($image->baseName)) . '.' . $image->extension;
                    $dir = Yii::getAlias('@app/uploads/articles/');
                    
                    FileHelper::unlink($dir . '/' . $file);
                    
                    if(!is_dir(dirname($dir . '.gitignore'))) {
                        FileHelper::createDirectory(dirname($dir . '.gitignore'));
                    }
        
                    $fileSaveTo = $dir . $fileName;
                    $image->saveAs($fileSaveTo);
                    $model->image = $fileName;
                } else {
                    $model->image = (string) $model->getOldAttribute('image');
                }

                $model->save();
                Yii::$app->session->setFlash('success', 'Post updated');
            } 
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->rate_id = explode(',', $model->rate_id);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Posts model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Posts model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Posts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Posts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
