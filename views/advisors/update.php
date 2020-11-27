<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advisors */

$this->title = 'Update Advisors: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Advisors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="advisors-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
