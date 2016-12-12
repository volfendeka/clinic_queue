<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patients".
 *
 * @property integer $patient_id
 * @property string $first_name
 * @property string $last_name
 * @property integer $age
 */
class Patients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'age'], 'required'],
            [['age'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_id' => 'Patient ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
        ];
    }
}
