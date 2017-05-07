<?php

namespace app\controllers;

use app\models\Doctor;
use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
use yii\filters\Cors;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\filters\VerbFilter;

class Meeting_backendController extends ActiveController
{
    public $modelClass = 'app\models\Meeting';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
            'cors' => [
                // restrict access to
                /*
                'Origin' => ['http://clinic_queue.loc', Url::base()],
                'Access-Control-Request-Methods' => ['GET', 'POST', 'OPTIONS', 'DELETE', 'PUT'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Request-Credentials' => ['*'],
                'Access-Control-Max-Age' => [ 1728000 ],
                "Content-Length" => [0],
                "Content-Type" => ['text/plain'],
                */
            ],
        ];

        return $behaviors;

    }

    public function actionDocs(){
        return Doctor::find()->all();
    }

}