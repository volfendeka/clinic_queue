<?php


namespace app\controllers;

use app\models\Image;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\AccessControl;
use yii\filters\ContentNegotiator;
use Yii;

class Image_backendController extends ActiveController
{
    public $modelClass = 'app\models\Image';

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


    public function actionUpload_image()
    {
        if (!empty( $_FILES ) ) {
            $tempPath = $_FILES['file']['tmp_name'];
            $uploadPath = Yii::$app->getBasePath() . "/images/" . $_FILES['file']['name'];
            if (move_uploaded_file($tempPath, $uploadPath)) {
                $model = new Image();
                if ($model->load(['Image' => Yii::$app->request->post()])) {
                    $model->name = $_FILES['file']['name'];
                    if($model->save()){
                        return 'saved';
                    }
                }
            }
        }
    }
}