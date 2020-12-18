<?php

namespace app\controllers;

use app\models\Posts;
use yii\data\ActiveDataProvider;

class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Posts::find()
            ->articles();

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

}
