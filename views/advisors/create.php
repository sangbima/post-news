<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advisors */

$this->title = 'Create Advisors';
$this->params['breadcrumbs'][] = ['label' => 'Advisors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advisors-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
