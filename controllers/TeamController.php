<?php

namespace app\controllers;

use app\models\Advisors;

class TeamController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $advisors = Advisors::find()
            ->select(['img', 'name', 'title'])
            ->all();

        return $this->render('index', [
            'advisors' => $advisors
        ]);
    }

}
