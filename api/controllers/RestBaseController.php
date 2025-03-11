<?php

namespace api\controllers;

use common\models\Agent;
use Yii;
use yii\rest\ActiveController;


class RestBaseController extends ActiveController
{

    public $authenticated_agent = null;
    
    public function behaviors(){
        $apiKey = Yii::$app->request->headers->get('X-API-KEY'); //get the passed api key from the header

        if (!$apiKey){
            throw new \yii\web\UnauthorizedHttpException('API key is missing.');
        }

        
        $agent = Agent::findByApiKey($apiKey);
        

        if (!$agent) {
            throw new \yii\web\UnauthorizedHttpException('Invalid API key.');
        }

        //store the authenticated agent for later use, if ever
        $this->authenticated_agent = $agent;

        $behaviors = parent::behaviors();

        $behaviors['access'] = [
            'class' => \yii\filters\AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'matchCallback' => function ($rule, $action) use ($agent) {
                        return $agent->type === Agent::TYPE_ADMIN;
                    }
                ],
            ],
            'denyCallback' => function ($rule, $action) {
                throw new \yii\web\UnauthorizedHttpException('You are not authorized to access this resource.');
            }
        ];

        return $behaviors;
    }


    // Disable inherited actions to implement our own code
    public function actions(){
        $actions = parent::actions();        
        unset($actions['index'], $actions['view'], $actions['create'], $actions['update'], $actions['delete'], );

        return $actions;
    }
}
