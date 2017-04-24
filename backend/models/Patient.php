<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string $first_name
 * @property integer $last_name
 * @property integer $age
 * @property string $city
 * @property string $street
 * @property integer $building
 * @property integer $conversation_id
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
            [['last_name', 'age', 'building', 'conversation_id'], 'integer'],
            [['first_name'], 'string', 'max' => 30],
            [['city', 'street'], 'string', 'max' => 50],
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
            'conversation_id' => 'Conversation ID',
        ];
    }
}
