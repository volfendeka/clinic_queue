<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;


class Doctor_backendController extends ActiveController
{
    public $modelClass = 'app\models\Doctor';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
        ];

        $behaviors['access'] = [
            'only' => ['doctors', 'specialists', 'doctor_times'],
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['logout', 'error', 'login'],
                    'allow' => false,
                    'roles' => ['?'],
                ],
                [
                    'actions' => ['index', 'view', 'logout', 'error', 'login', 'doctors', 'specialists', 'doctor_times'],
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ];

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'only' => ['doctors', 'specialists', 'doctor_times'],
        ];
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];

        return $behaviors;
    }

}