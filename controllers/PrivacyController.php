<?php

namespace app\controllers;

use app\models\Posts;

class PrivacyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Posts::find()
            ->privacy()
            ->one();

        return $this->render('index', [
            'model' => $model
        ]);
    }

}
