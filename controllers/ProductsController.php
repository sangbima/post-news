<?php

namespace app\controllers;


use app\models\Posts;

class ProductsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $products = Posts::find()
            ->select('id, title, slug, content, image')
            ->products()
            ->all();

        return $this->render('index', [
            'products' => $products
        ]);
    }

}

