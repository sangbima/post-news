<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use rmrevin\yii\fontawesome\FAS;

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-weco',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Products', 'url' => ['/site/products']],
            ['label' => 'Partners', 'url' => ['/site/partners']],
            ['label' => 'Features', 'url' => ['/site/features']],
            Yii::$app->user->isGuest ? (
                [
                    'label' => 'Sign In ' . FAS::icon('arrow-right'),
                    'encode' => false,
                    'url' => ['/site/login'],
                    'linkOptions'=>['class'=>'btn btn-login'],
                ]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
?>