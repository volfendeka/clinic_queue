<?php


namespace app\controllers;

use app\models\Patient;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;

class Patient_backendController extends ActiveController
{
    public $modelClass = 'app\models\Patient';

    public function behaviors()
    {

        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
        ];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'only' => ['doctors', 'specialists', 'doctor_times'],
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

    public function actionView($id)
    {
        return Patient::findOne($id);
    }
}