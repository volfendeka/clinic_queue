<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;

class Doctor_backendController extends ActiveController
{
    public $modelClass = 'app\models\Doctors';

    public function behaviors()
    {
        return
            ArrayHelper::merge(parent::behaviors(), [
                'corsFilter' => [
                    'class' => Cors::className(),
                ],
            ]);
    }

}