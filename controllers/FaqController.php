<?php

namespace app\controllers;

use app\models\Posts;

class FaqController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $faqs = Posts::find()
            ->select(['id', 'title', 'content'])
            ->faq()
            ->limit(10)
            ->all();

        return $this->render('index', [
            'faqs' => $faqs
        ]);
    }

}
