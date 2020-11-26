<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Wallet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'readonly' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'stage')->dropDownList(Yii::$app->datastatic->listStage(), ['prompt' => 'Stage ...']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'coin')->widget(MaskedInput::class, [
                'clientOptions' => [
                    'alias' => 'decimal'
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'country')->dropDownList(Yii::$app->datastatic->listCountry(), ['prompt' => 'Country ...']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'buy_date')->widget(DatePicker::class, [
                'options' => ['placeholder' => 'Buy date ...'],
                'pluginOptions' => [
                    'autoClose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
