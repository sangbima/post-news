<?php

/* @var $this yii\web\View */
/* @var $model app/model/Posts */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'View Post::' . $model->title;
$this->params['breadcrumbs'][] = $model->title;
?>
<div class="site-product container min-height">
    <h1><?= Html::encode($model->title) ?></h1>
    <div class="metadata">
        <code>By: <?=$model->createdBy->fullname?></code>
    </div>
    <div class="post-img my-3">
        <?=Html::img(Url::to(['/site/view-image', 'name' => $model->image]), ['class' => 'img-responsive text-center'])?>
    </div>
    <div class="post-content my-3">
        <?=$model->content?>
    </div>
</div>
