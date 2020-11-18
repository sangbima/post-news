<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchPosts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index container min-height">
    <div class="row">
        <?php foreach ($products as $key => $product) {?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            <?=Html::img(Url::to(['/site/view-image', 'name' => $product->image]), ['class' => 'img-responsive text-center', 'alt' => $product->title])?>
            <div class="caption">
                <h3><?=$product->title?></h3>
                <p><?=StringHelper::truncate($product->content, 250, '...')?></p>
                <p>
                    <?=Html::a('Detail', ['/site/view-post', 'slug' => $product->slug], $options = ['class' => 'btn btn-default']) ?>
                    <?=Html::a('Buy', ['/site/view-post', 'slug' => $product->slug], $options = ['class' => 'btn btn-primary']) ?>
                </p>
            </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
