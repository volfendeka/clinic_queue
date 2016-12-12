<?php


namespace app\controllers;

use app\models\Patients;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;

class Patient_backendController extends ActiveController
{
    public $modelClass = 'app\models\Patients';

    public function behaviors()
    {
        return
            ArrayHelper::merge(parent::behaviors(), [
                'corsFilter' => [
                    'class' => Cors::className(),
                ],
            ]);
    }

    public function actionView($id)
    {
        return Patients::findOne($id);
    }
}