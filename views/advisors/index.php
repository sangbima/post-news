<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SearchAdvisors */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Advisors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advisors-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Advisors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'title',
            'img',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
