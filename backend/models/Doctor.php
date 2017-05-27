<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $specialist
 *
 * @property Meeting[] $meetings
 * @property Patient[] $patients
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'specialist'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['specialist'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'specialist' => 'Specialist',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['doctor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['family_doctor' => 'id']);
    }

    public function getPrescriptions()
    {
        return $this->hasMany(Prescription::className(), ['doctor_id' => 'id']);
    }

    public function getImages()
    {
        return $this->hasMany(Image::className(), ['doctor_id' => 'id']);
    }
}
