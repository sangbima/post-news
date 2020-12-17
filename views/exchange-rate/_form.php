<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\ExchangeRate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exchange-rate-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'from')->widget(Select2::class, [
                'data' => Yii::$app->datastatic->listCurrencys(),
                'language' => 'en',
                'options' => [
                    'placeholder' => 'Select Currency...',
                    ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-md-3">
        <?= $form->field($model, 'to')->widget(Select2::class, [
                'data' => Yii::$app->datastatic->listCurrencys(),
                'language' => 'en',
                'options' => [
                    'placeholder' => 'Select Currency...',
                    ],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'rate')->widget(MaskedInput::class, [
                'clientOptions' => [
                    'alias' => 'decimal',
                    'groupSeparator' => ',',
                    'removeMaskOnSubmit' => true,
                    'autoGroup' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ico')->checkbox(); ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
