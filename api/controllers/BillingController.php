<?php

namespace api\controllers;

use common\models\Agent;
use common\models\Billing;

use Yii;
use yii\web\NotFoundHttpException;


class BillingController extends RestBaseController
{
    public $modelClass = 'common\models\Billing';


    
    //Set the methods that are allowed for certain agent types
    public function behaviors(){
        $behaviors = parent::behaviors();
        
        $behaviors['access']['rules'][] = [
            'allow' => true,
            'actions' => ['view'],
            'matchCallback' => function ($rule, $action) {
                return $this->authenticated_agent->type === Agent::TYPE_PARTNER;
            }
        ];

        return $behaviors;
    }

   
    //GET all records
    public function actionIndex(){
        return Billing::find()->all();
    }

    //GET one record
    public function actionView($id){ // Note: $id represents the SIN value ($id is used for compatibility with Yii2 default routing, although this can be changed via the URL manager; For simplicity, just leave the default
        return $this->findModel($id);
    }


    //POST: Create new record
    public function actionCreate(){
        $model = new Billing();

        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            Yii::$app->response->statusCode = 201; // HTTP Status Code 201: Created
            return $model;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $model->getErrors();
        }
    }

    //PATCH/PUT: Update an existing record
    public function actionUpdate($id){
             
        $model = $this->findModel($id);        
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->save()) {
            return $model;
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return $model->getErrors();
        }
    }

    //DELETE: Delete an existing record
    public function actionDelete($id){

        $model = $this->findModel($id);
        if ($model->delete() !== false) {
            Yii::$app->response->statusCode = 204; // HTTP Status Code 204: No Content
            return ['message' => 'Deleted successfully'];
        } else {
            Yii::$app->response->statusCode = 400; // HTTP Status Code 400: Bad Request
            return ['message' => 'Error in deletion'];
        }
    }

    
    //Utility method to fetch a record
    protected function findModel($sin){
        // Attempt to find the Billing model by joining with the Account model where Account.sin matches
        $model = Billing::find()
            ->joinWith('account') //'account' is the relation name in Billing model that refers to Account
            ->where(['account.sin' => $sin])
            ->orderBy("billing.date_period_to DESC")
            ->one();
    
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested billing does not exist.');
        }
    }   
   

    
}
