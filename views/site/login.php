<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1><?= Html::encode($this->title) ?></h1> <small>Please fill out the following fields to login:</small>
                </div>
                <div class="panel-body" id="panel-login">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form'
                    ]); ?>

                    <?= $form->field($model, 'username', [
                        'inputTemplate' => '<div class="input-group"><div class="input-group-addon"><i class="fas fa-user"></i></div>{input}</div>'
                    ])->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password', [
                        'inputTemplate' => '<div class="input-group"><div class="input-group-addon"><i class="fas fa-lock"></i></div>{input}</div>'
                    ])->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
