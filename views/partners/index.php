<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchPosts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index container min-height">
    <div class="row">
        <?php foreach ($partners as $key => $partner) {?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <?=Html::img(Url::to(['/site/view-image', 'name' => $partner->image]), ['class' => 'img-responsive text-center', 'alt' => $partner->title])?>
            <div class="caption">
                <h3><?=$partner->title?></h3>
                <p><?=StringHelper::truncate($partner->content, 250, '...')?></p>
                <p>
                    <?=Html::a('Detail', ['/site/view-post', 'slug' => $partner->slug], $options = ['class' => 'btn btn-default']) ?>
                    <?=Html::a('Buy', ['/site/view-post', 'slug' => $partner->slug], $options = ['class' => 'btn btn-primary']) ?>
                </p>
            </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
