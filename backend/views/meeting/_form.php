<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \janisto\timepicker\TimePicker;
use yii\helpers\ArrayHelper;
use app\models\Patient;
use app\models\Doctor;

/* @var $this yii\web\View */
/* @var $model app\models\Meeting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="meeting-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->dropDownList(
        ArrayHelper::map(Patient::find()->asArray()->all(), 'user_id', 'first_name', 'last_name')); ?>

    <?= $form->field($model, 'doctor_id')->dropDownList(
        ArrayHelper::map(Doctor::find()->asArray()->all(), 'id', 'first_name', 'last_name')); ?>


    <?= $form->field($model, 'date_time_meeting')->widget(TimePicker::className(), [
        'mode' => 'datetime',
        'clientOptions'=>[
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showSecond' => true,
        ]
    ]);
    ?>

    <?= $form->field($model, 'reason')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
