<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $age
 * @property string $city
 * @property string $street
 * @property integer $building
 * @property integer $family_doctor
 * @property integer $conversation_id
 *
 * @property Meeting[] $meetings
 * @property Doctor $familyDoctor
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'age', 'city', 'street', 'building', 'conversation_id'], 'required'],
            [['age', 'building', 'family_doctor', 'conversation_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['city', 'street'], 'string', 'max' => 50],
            [['family_doctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['family_doctor' => 'id']],
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
            'age' => 'Age',
            'city' => 'City',
            'street' => 'Street',
            'building' => 'Building',
            'family_doctor' => 'Family Doctor',
            'conversation_id' => 'Conversation ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['patient_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'family_doctor']);
    }
}
