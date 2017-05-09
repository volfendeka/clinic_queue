<?php

namespace app\controllers;

use app\models\Doctor;
use app\models\Meeting;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\filters\AccessControl;
use Yii;

class Meeting_backendController extends ActiveController
{

    public $modelClass = 'app\models\Meeting';


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
                    'actions' => ['index', 'logout', 'error', 'login', 'doctors', 'specialists', 'doctor_times'],
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

    public function actionDashboard()
    {
        $response = [
            'username' => Yii::$app->user->identity->username,
            'access_token' => Yii::$app->user->identity->getAuthKey(),
        ];
        return $response;
    }

    public function actionDoctors($specialist = ''){
        return $specialist ? Doctor::find()->where(['specialist' => $specialist])->all()
                            :Doctor::find()->all();
    }

    public function actionSpecialists(){
        return Doctor::find()->select('specialist')->distinct()->all();
    }
    public function actionDoctor_times($id){
        return Meeting::find()->select('date_time_meeting')->where(['doctor_id'=>$id])->all();
    }

}