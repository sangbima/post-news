<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'basic'
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'category_id')->dropdownList(
                Yii::$app->datastatic->listCategory(),
                ['prompt'=>'Select Category']
            ) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'is_important')->dropdownList([10 => 'Yes', 9 => 'No']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'type')->dropdownList([9 => 'Article', 10 => 'Page']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'rate_id')->widget(Select2::class,
                [
                    'data' => ArrayHelper::map(\app\models\ExchangeRate::find()->asArray()->all(), 'id', function($d) {
                        return $d['from'] . ' - ' . $d['to'];
                    }),
                    'options' => [
                        'placeholder' => 'Select Rate ID ...',
                        'multiple' => true
                    ]
                ]
            ) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'display_image')->checkbox() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'image')->fileInput() ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
