<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchPosts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teams';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team container">
    <h1>Teams</h1>

    <?php if (!empty($advisors)):?>
        <div class="advisors">
            <?php foreach ($advisors as $key => $advisor): ?>
            <div class="advisor-item">
                <?=Html::img(Url::to(['/site/view-image', 'name' => $advisor->img, 'type' => 'advisors']), ['class' => 'img-circle advisor-img', 'alt' => $advisor->name])?>
                <h3><?=$advisor->name?></h3>
                <div class="advisor-title capitalize">
                    <?=$advisor->title?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <h1>No content</h1>
    <?php endif; ?>
</div>
