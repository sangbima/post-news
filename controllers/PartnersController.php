<?php

namespace app\controllers;

use app\models\Posts;

class PartnersController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $partners = Posts::find()
            ->select('id, title, slug, content, image')
            ->partners()
            ->all();

        return $this->render('index', [
            'partners' => $partners
        ]);
    }

}
