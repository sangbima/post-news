<?php

use yii\helpers\Html;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchPosts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs & Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-article-index container">
    <h1>Article/Blog</h1>

    <?=ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
    ]);?>
</div>
