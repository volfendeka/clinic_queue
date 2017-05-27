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

    public function actionGet_patient($id = '', $date = false)
    {
        return Patient::find()
                        ->where(['user_id' => $id])
                        ->joinWith(['userId'=> function($query){$query->select(['email']);}])
                        ->joinWith(['familyDoctor'=> function($query){$query->select(['first_name', 'last_name']);}])
                        ->joinWith(['meetings'=> function($query) use (&$date){$query->with(['doctor'])->where(['>', 'date_time_meeting', $date ? date("Y-m-d H:i:s", time()) : '']);}])
                        ->asArray()
                        ->one();
    }

    public function actionPatient_id_pair()
    {
        return Patient::find()->select(['id', 'first_name', 'last_name'])->all();
    }
}