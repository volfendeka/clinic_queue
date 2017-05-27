<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting".
 *
 * @property integer $id
 * @property integer $doctor_id
 * @property integer $patient_id
 * @property string $date_time_meeting
 * @property string $date_time_request
 * @property string $reason
 *
 * @property Patient $patient
 * @property Doctor $doctor
 */
class Meeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_id', 'patient_id', 'date_time_meeting'], 'required'],
            [['doctor_id', 'patient_id'], 'integer'],
            [['date_time_meeting', 'date_time_request'], 'safe'],
            [['reason'], 'string'],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'user_id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'doctor_id' => 'Doctor ID',
            'patient_id' => 'Patient ID',
            'date_time_meeting' => 'Date Time Meeting',
            'date_time_request' => 'Date Time Request',
            'reason' => 'Reason',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['user_id' => 'patient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }
}
