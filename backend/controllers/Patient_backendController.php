<?php


namespace app\controllers;

use app\models\Patient;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;

class Patient_backendController extends ActiveController
{
    public $modelClass = 'app\models\Patient';

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
        return Patient::findOne($id);
    }
}