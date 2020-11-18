<?php

namespace app\controllers;


use app\models\Posts;

class FeaturesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $features = Posts::find()
            ->select('id, title, slug, content, image')
            ->features()
            ->all();

        return $this->render('index', [
            'features' => $features
        ]);
    }

}

