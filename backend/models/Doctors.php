<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $specialist
 * @property integer $experience
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'specialist', 'experience'], 'required'],
            [['experience'], 'integer'],
            [['first_name', 'last_name', 'specialist'], 'string', 'max' => 30],
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
            'experience' => 'Experience',
        ];
    }
}
