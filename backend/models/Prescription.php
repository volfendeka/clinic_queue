<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prescription".
 *
 * @property integer $id
 * @property integer $patient_id
 * @property integer $doctor_id
 * @property string $diagnosis
 * @property string $pharmacy
 * @property integer $pills_number
 * @property integer $refills_number
 * @property string $instruction
 * @property string $start_period
 * @property string $end_period
 *
 * @property Doctor $doctor
 * @property Patient $patient
 */
class Prescription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prescription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_id', 'doctor_id'], 'required'],
            [['patient_id', 'doctor_id', 'pills_number', 'refills_number'], 'integer'],
            [['instruction'], 'string'],
            [['start_period', 'end_period'], 'safe'],
            [['diagnosis'], 'string', 'max' => 255],
            [['pharmacy'], 'string', 'max' => 11],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['doctor_id' => 'id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['patient_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'doctor_id' => 'Doctor ID',
            'diagnosis' => 'Diagnosis',
            'pharmacy' => 'Pharmacy',
            'pills_number' => 'Pills Number',
            'refills_number' => 'Refills Number',
            'instruction' => 'Instruction',
            'start_period' => 'Start Period',
            'end_period' => 'End Period',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['user_id' => 'patient_id']);
    }
}
