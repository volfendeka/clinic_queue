<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Patient;
use app\models\Doctor;
use \janisto\timepicker\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Prescription */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prescription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->dropDownList(
        ArrayHelper::map(Patient::find()->asArray()->all(), 'user_id', 'first_name', 'last_name')); ?>

    <?= $form->field($model, 'doctor_id')->dropDownList(
        ArrayHelper::map(Doctor::find()->asArray()->all(), 'id', 'first_name', 'last_name')); ?>


    <?= $form->field($model, 'diagnosis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pharmacy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pills_number')->textInput() ?>

    <?= $form->field($model, 'refills_number')->textInput() ?>

    <?= $form->field($model, 'instruction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'start_period')->widget(TimePicker::className(), [
        'mode' => 'datetime',
        'clientOptions'=>[
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showSecond' => true,
        ]
    ]);
    ?>

    <?= $form->field($model, 'end_period')->widget(TimePicker::className(), [
        'mode' => 'datetime',
        'clientOptions'=>[
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showSecond' => true,
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
