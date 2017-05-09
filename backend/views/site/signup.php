<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Register';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="my-form-title"><h2><?= Html::encode($this->title) ?></h2></div>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Login:') ?>

            <?= $form->field($model, 'password')->passwordInput()->label('Password:') ?>

            <?= $form->field($model, 'repeat_password')->passwordInput()->label('Repeat password:') ?>

            <div class="form-group">
                <?= Html::submitButton('Register', [
                    'class' => 'btn btn-primary',
                    'name' => 'signup-button',
                    'id' => 'my-btn-register',
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
