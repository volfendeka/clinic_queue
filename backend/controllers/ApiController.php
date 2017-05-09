<?php

namespace app\controllers;


use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\filters\Cors;
use app\models\LoginForm;
use app\models\SignupForm;
use Yii;

class ApiController extends ActiveController
{

    public $modelClass = 'app\models\Meeting';


    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::className(),
        ];

        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => ['login', 'logout', 'error', 'register'],
                    'allow' => true,
                    'roles' => ['?'],
                ],
                [
                    'actions' => ['login','logout', 'error', 'register', 'doctors', 'specialists', 'doctor_times'],
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

    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            return [
                'access_token' => Yii::$app->user->identity->getAuthKey(),
                'user_id' => Yii::$app->user->identity->getId(),
            ];
        } else {
            $model->validate();
            return $model;
        }
    }

    public function actionRegister()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->signup()) {
            return ['user' => Yii::$app->user];
        } else {
            return $model;
        }

    }

}