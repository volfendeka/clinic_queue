<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $age
 * @property string $city
 * @property string $street
 * @property integer $building
 * @property integer $family_doctor
 * @property integer $conversation_id
 * @property string $image
 * @property string $mail_index
 * @property string $home_phone
 * @property string $cell_phone
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
            [['age', 'building', 'family_doctor', 'conversation_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 20],
            [['mail_index', 'home_phone'], 'string', 'max' => 10],
            [['cell_phone'], 'string', 'max' => 15],
            [['city', 'street'], 'string', 'max' => 50],
            [['family_doctor'], 'exist', 'skipOnError' => true, 'targetClass' => Doctor::className(), 'targetAttribute' => ['family_doctor' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User_id',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
            'city' => 'City',
            'street' => 'Street',
            'building' => 'Building',
            'family_doctor' => 'Family Doctor',
            'conversation_id' => 'Conversation ID',
            'mail_index' => 'Mail index',
            'image' => 'Image',
            'home_phone' => 'Home phone',
            'cell_phone' => 'Cell phone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMeetings()
    {
        return $this->hasMany(Meeting::className(), ['patient_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyDoctor()
    {
        return $this->hasOne(Doctor::className(), ['id' => 'family_doctor']);
    }

    public function getUserId()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
