<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchPosts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Features';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="features-index container min-height">
    <div class="row">
        <?php foreach ($features as $key => $feature) {?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <?=Html::img(Url::to(['/site/view-image', 'name' => $feature->image]), ['class' => 'img-responsive text-center', 'alt' => $feature->title])?>
            <div class="caption">
                <h3><?=$feature->title?></h3>
                <p><?=StringHelper::truncate($feature->content, 250, '...')?></p>
                <p>
                    <?=Html::a('Detail', ['/site/view-post', 'slug' => $feature->slug], $options = ['class' => 'btn btn-default']) ?>
                    <?=Html::a('Buy', ['/site/view-post', 'slug' => $feature->slug], $options = ['class' => 'btn btn-primary']) ?>
                </p>
            </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
