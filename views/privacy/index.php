<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Privacy';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="privacy container">
    <?php if ($model) : ?>
    <h1><?=Html::encode($model->title)?></h1>

    <?= HtmlPurifier::process($model->content) ?>
    <?php else: ?>
        <h1>No content to display</h1>
    <?php endif; ?>
</div>
